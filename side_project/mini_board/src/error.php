<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");


$err_msg = isset($_GET["err_msg"]) ? $_GET["err_msg"] : "";
?>


<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>에러페이지</title>
</head>
<body>
	
	<?php
		require_once(FILE_HEADER);
	?>

		<p class="container">죄송합니다. 저희는 구제불능입니다.</p>
		<br>
		<p class="container">빠른 시일 내로 폐업하겠습니다.</p>
		<br>
		<p class="container"> <?php echo $err_msg; ?> </p>
		<br>
		<a class="button-a" href="/mini_board/src/list.php">메인으로 이동</a>
	</main>
</body>
</html>