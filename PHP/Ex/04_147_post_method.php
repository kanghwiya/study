<?php
//post method
// request할 때의 데이터를 외부에서 볼 수가 없다

print_r($_POST);


?>

 <!DOCTYPE html>
 <html lang="ko">
 <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
 </head>
 <body>
	<form action="/04_147_post_method.php" method="post">
		<fieldset>
			<label for="id">id</label>
			<input type="text" id="id" name="id">
			<label for="password">password</label>
			<input type="password" id="password" name="pw">
			<button type="submit">전송</button>
		</fieldset>
	</form>
 </body>
 </html>