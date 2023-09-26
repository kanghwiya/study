<?php
// 1. 설정 정보
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");


try {
	// 2.DB호출
	// 2-1. connection 함수 호출
	$conn = null; //PDO 객체 저장
	if(!my_db_conn( $conn )){
		// 2-2. 예외처리
		throw new Exception("DB Error : PDO Instance");
	}
	
	//Method 획득
	$http_method = $_SERVER["REQUEST_METHOD"];
	// 메소드의 형식이 Get인지 확인
	if( $http_method === "GET") {
	//  3-1. Get일 경우 (상세페이지에서 삭제 버튼 클릭)
	//  3-1-1. 파라미터에서 id 획득
		$id = isset($_GET["id"]) ? $_GET["id"] : "";
		$page = isset($_GET["page"]) ? $_GET["page"] : "";
		$arr_err_msg = [];
		if($id === "") {
			$arr_err_msg[] = "Parameter Error : ID";
	//Exception 개체를 새로 생성하겠다는 의미.
		}
		if($page === "") {
			$arr_err_msg[] =  "Parameter Error : Page";
		}
		if(count($arr_err_msg) >= 1 ){
			throw new Exception(implode("<br>",$arr_err_msg));
		}

		$arr_param = [
			"id" => $id
		];
		$result = db_select_boards_id( $conn, $arr_param );
	// 3-1-3. 예외처리
		if($result === false) {
			throw new Exception("DB Error : Select id");
		}
		else if(!(count($result) === 1)){
			throw new Exception("DB Error : Select id count");
		}
		$item = $result[0];

	} else {
	//3-2. POST일 경우 (삭제 페이지의 동의 버튼 클릭)
	//3-2-1. 파라미터에서 id 획득
		$id = isset($_POST["id"]) ? $_POST["id"] : "" ;
		$arr_err_msg = [];
		if($id === "") {
			$arr_err_msg[] = "Parameter Error : ID";
	//Exception 개체를 새로 생성하겠다는 의미.
		}
		if(count($arr_err_msg) >= 1 ){
			throw new Exception(implode("<br>",$arr_err_msg));
		}
	//3-2-2. Transaction 시작
	$conn->beginTransaction();
	$arr_param = [
		"id" => $id
	];
	

	// 3-2-3. 예외 처리
	if(!db_delete_boards_id($conn, $arr_param)) {  //boolean값으로 오기 때문에 바로 삽입
		throw new Exception("DB Error : Delete Boards id");
	}

	$conn->commit();
	header("Location: list.php"); //DB파기
	exit;

	}
} catch (Exception $e) {
	if($http_method === "POST") {
		$conn->rollBack();
	}
	echo $e->getmessage();
	exit;
} finally {
	db_destroy_conn($conn);
}


?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>삭제 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
	<main>
		<table>
			<caption>
				삭제하면 영구적으로 복구할 수 없습니다.
				<br>
				정말로 삭제하시겠습니까?
				<br><br>
			</caption>
			<colgroup>
				<col width="20%">
				<col width="82%">
			</colgroup>
			<tr>
				<th>게시글 번호</th>
				<td><?php echo $item["id"]; ?></td>
			</tr>
			<tr>
				<th>작성일</th>
				<td><?php echo $item["create_at"]; ?></td>
			</tr>
			<tr>
				<th>제목</th>
				<td><?php echo $item["title"]; ?></td>
			</tr>
			<tr>
				<th>내용</th>
				<td><?php echo $item["content"]; ?></td>
			</tr>
		</table>
	</main>
	<section>
		<div class="detail-btn">
			<form action="/mini_board/src/delete.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id; ?>"> <!--form태그에서 name은 슈퍼글로벌 변수의 키가 된다. -->
				<button type="submit">동의</button>
				<a href="/mini_board/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">취소</a>
			</form>
		</div>
	</section>
</body>
</html>