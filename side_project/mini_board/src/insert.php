<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
	define("FILE_HEADER", ROOT."header.php");
	define("ERROR_MSG_PARAM", "%s은 필수 입력사항입니다.");
	require_once(ROOT."lib/lib_db.php");

	$conn = null; // DB Coneection 함수
	$http_method = $_SERVER["REQUEST_METHOD"]; //Method 확인
	$arr_post = $_POST;
	$arr_err_msg = [];  // 에러 메세지 저장용
	$title = "";
	$content = "";

//post로 request가 왔을 때 처리
if($http_method === "POST"){
	try {
		$title = isset($_POST["title"]) ? trim($_POST["title"]) : "";
		$content = isset($_POST["content"]) ? trim($_POST["content"]) : "";
		
		if($title === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목");
		}
		if($content === ""){
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용");
		}
		if(count($arr_err_msg) >= 1){
			throw new Exception(implode("<br>", $arr_err_msg));
		}

		if(count($arr_err_msg) === 0 ){

			if(!my_db_conn($conn)){
				// DB instance 에러
				throw new Exception("DB Error : PDO Istance");
				// 강제로 새로운 예외상황을 발생시키겠다
			}
			$conn->beginTransaction(); //트랜잭션 시작
	
			//게시글 작성을 위해 파라미터 셋팅
			$arr_param = [
				"title" => $_POST["title"]
				,"content" => $_POST["content"]
			];
	
			if(!db_insert_boards($conn, $arr_post)){
				//DB insert 에러
				throw new Exception("DB Error : Insert boards");
			}
	
			$conn->commit(); //모든 처리 완료 시 커밋
	
			//리스트 페이지로 이동
			header("Location: list.php");
			exit;
		}
	}catch(Exception $e){
		if($conn !== null){
		$conn->rollBack();
		}
		header("Location: error.php/?err_msg={$e->getMessage()}");
		exit;
	}finally{
		db_destroy_conn($conn); //DB파기
	}

};

?>


<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>작성페이지</title>
</head>
<body>
	
	<?php
		require_once(FILE_HEADER);
	?>
	<div class="error-main">
	<?php
		foreach($arr_err_msg as $val){
	?>
			<p class="container"><?php echo $val; ?></p><br>
	<?php		
		}
	?>
	</div>
	<div class="form-div">
		<form class="form" action="/mini_board/src/insert.php" method="post">
			<label for="title">제목</label>
			<input type="text" id="title" name="title" require  placeholder="제목을 입력해주세요" value = "<?php echo $title; ?>">
		<br><br>
			<label for="content">내용</label>
			<textarea name="content" id="content" cols="70" rows="18" require placeholder="내용을 입력해주세요"> <?php echo $content; ?></textarea>
		<br>
			<div class="form-submit">
				<button type="submit">확인</button>
				<a href="/mini_board/src/list.php">취소</a>
			</div>
	</div>
	</div>
</body>
</html>