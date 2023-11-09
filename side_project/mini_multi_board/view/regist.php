<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>회원가입 페이지</title>
	<link rel="stylesheet" href="./css/common.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="vh-100 vw-100">
<?php require_once("view/inc/header.php"); ?>

	<main class="d-flex justify-content-center align-items-center h-75">
		<form class="" action="/user/regist" method="POST" style="width: 300px">
			<div id="emailHelp" class="form-text text-danger">
				<?php echo count($this->arrErrorMsg) > 0 ? implode("<br>", $this->arrErrorMsg) : "" ?>
			</div>
			<div class="mb-3" id="idchk">
			  <label for="u_id" class="form-label">아이디</label>
			  <input type="text" class="form-control" id="u_id" name="u_id">
			  <button type="button" class="btn btn-light" onclick="idChk(); return false;" >아이디 중복 확인</button>
			  <span id = "idChkMsg"></span>
			</div>
			<div class="mb-3">
			  <label for="u_pw" class="form-label">비밀번호</label>
			  <input type="password" class="form-control" id="u_pw" name="u_pw">
			</div>
			<div class="mb-3">
			  <label for="u_pw_chk" class="form-label">비밀번호 확인</label>
			  <input type="password" class="form-control" id="u_pw_chk" name="u_pw_chk">
			</div>
			<div class="mb-3">
			  <label for="u_name" class="form-label">이름</label>
			  <input type="text" class="form-control" id="u_name" name="u_name">
			</div>
			<a href="/user/login" type="button" class="btn btn-outline-dark">취소</a>
			<button type="submit" class="btn btn-dark float-end" >가입</button>
		</form>
	</main>
	<footer class="bg-dark fixed-bottom text-light text-center p-3">저작권 by.바나나공장</footer>
	<script src="/view/js/common.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>