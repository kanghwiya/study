<?php

// session : 데이터를  웹서버에 저장, 쿠키보다는 보안성이 좋음. cash메모리에 저장되기 때문에 속도도 빠름
// *** 주의사항 ***
//  개인정보, 민감한 정보들은 되도록 저장하지 말아야한다.


// session 시작
session_name("login"); //특정 세션명으로 시작하는 방법. 한 번 썼으면 계속 써줘야함
session_start();
$_SESSION["green"] = "PHP";
$_SESSION["green2"] = "JAVA";

//array에서 특정 세션 삭제
unset($_SESSION["green"]);

// 모든 session 삭제
// session_destroy(); //웹서버에 있는 session 은 삭제되었으나 php에 있는 session은 삭제되지 않음

//session 확인
print_r($_SESSION);