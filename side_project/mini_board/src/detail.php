<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
	define("FILE_HEADER", ROOT."header.php");
	require_once(ROOT."lib/lib_db.php");

$conn = null;
my_db_conn($conn);

// $page_name = $_SERVER["PHP_SELF"];
// $chk_detail = isset($_GET["page"]) ? $_GET["test"] : "update"; //한 페이지에 수정 구현하는 법
// 제목 td에 가서 
// if($chk_detail =--= "detail") {
// 	echo $item["title"];
// } else {
// 	<input type="text" name "title">}

try{
	$id="";

	// id 확인
	if(!isset($_GET["id"]) || $_GET["id"] === ""){
		throw new Exception("Parameter ERROR : no id");
	}

	$id = $_GET["id"]; //id 세팅
	$page = $_GET["page"]; //page 세팅

	if(!my_db_conn($conn)){
		throw new Exception("DB ERROR : PDO INSTANCE");
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

} catch (Exception $e){
	echo $e->getMessage(); //예외 메세지 출력
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
	<title>상세페이지</title>
</head>
<body>
	<?php 
		require_once(FILE_HEADER);
	?>
	<table class="detail_table">
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
			<td><?php echo $item["title"]; ?></td>
		</tr>
		<tr class="detail">
			<th>작성일자</th>
			<td><?php echo $item["create_at"]; ?></td>
		</tr>
		<tr class="detail_cont" >
			<th>내용</th>
			<td style="word-break:break-all"><?php echo $item["content"]; ?></td>
		</tr>
	</table>
	<div class="detail-btn">
			<a href="/mini_board/src/update.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">수정</a>
			<a href="/mini_board/src/list.php/?page=<?php echo $page; ?>">취소</a>
			<a href="#">삭제</a>
	</div>
</body>
</html>