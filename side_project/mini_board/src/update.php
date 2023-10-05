<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
define("ERROR_MSG_PARAM", "%s은 필수 입력사항입니다.");
require_once(ROOT."lib/lib_db.php");

$conn = null; //DB 연결용 변수
$http_method = $_SERVER["REQUEST_METHOD"]; //Method 확인
$arr_err_msg = [];  // 에러 메세지 저장용

try {
	if(!my_db_conn($conn)) {
		throw new Exception("DB Error : PDO Instance");
	}

	if($http_method === "GET"){
		// Get Method의 경우
		//게시글 데이터 조회를 위한 파라미터 세팅
		$id = isset($_GET["id"]) ? trim($_GET["id"]) : $_POST["id"];
		$page = isset($_GET["page"]) ? trim($_GET["page"]) : $_POST["page"];
		
		if($id === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목");
		}
		if($page === ""){
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용");
		}
		if(count($arr_err_msg) >= 1){
			throw new Exception(implode("<br>", $arr_err_msg));
		}


	} else {
		$id = isset($_POST["id"]) ? $_POST["id"] : ""; // id 셋팅
		$page = isset($_POST["page"]) ? $_POST["page"] : ""; // page 셋팅
		$title = trim( isset($_POST["title"]) ? $_POST["title"] : "" ); // title 셋팅
		$content = trim( isset($_POST["content"]) ? $_POST["content"] : "" ); // content 셋팅

		if($id === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
		}
		if($page === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
		}
		if(count($arr_err_msg) >= 1) {
			throw new Exception(implode("<br>", $arr_err_msg));
		}
		if($title === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "title");
		}
		if($content === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "content");
		}
		if(count($arr_err_msg) === 0) {

		//Post Method의 경우
		//게시글 수정을 위해 파라미터 셋팅
		$arr_param = [
			"id" => $id
			,"title" => $_POST["title"]
			,"content" => $_POST["content"]
		];

		//게시글 수정 처리
		$conn->beginTransaction(); //트랜잭션 시작
		
		if(!db_update_boards_id($conn, $arr_param)){
			throw new Exception("DB Error : Update_boards_id");
		}
		$conn->commit(); //commit

		header("Location: detail.php/?id={$id}&page={$page}"); //디테일 페이지로 이동
		exit;
		}
	}
	$arr_param = [
		"id" => $id
	];
	// 게시글 데이터 조회
	$result = db_select_boards_id( $conn, $arr_param );

	//게시글 조회 예외처리
	if($result === false){
		throw new Exception("DB Error : PDO Select_id");
	//게시글 조회 에러
	} else if(!count($result) === 1){
	//게시글 조회 count 에러
	throw new Exception("DB Error : PDO Select_id count,".count($result));
	}
	
$item = $result[0];

} catch(Exception $e) {
	if($http_method === "POST") {
		$conn->rollBack();
	}
	header("Location: /mini_board/src/error.php/?err_msg={$e->getMessage()}");
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
	<title>수정페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
		<div class="error-main">
	<?php
		foreach($arr_err_msg as $val){
	?>
			<p class="container"><?php echo $val; ?></p></br>
	<?php		
		}
	?>
	<form action="/mini_board/src/update.php" method="POST">
		<table class="detail_table">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="page" value="<?php echo $page; ?>">
			<colgroup>
					<col width="20%">
					<col width="82%">
			</colgroup>
			
			<tr class="detail">
				<th >글 번호</th>
				<td><?php echo $item["id"]; ?></td>
			</tr>
			<tr class="detail">
				<th>제목</th>
				<td> <input type="text" name="title" value="<?php echo $item["title"]; ?>">
			</tr>
			<tr class="detail_cont" >
				<th>내용</th>
				<td style="word-break:break-all">
				<textarea name="content" id="content" cols="64" rows="17"><?php echo $item["content"]; ?></textarea>
				</td>
			</tr>
		</table>
		<div class="detail-btn detail-btn2">
			<button type="submit">수정확인</button>
			<a href="/mini_board/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">수정취소</a>
		</div>
	</form>
</body>
</html>