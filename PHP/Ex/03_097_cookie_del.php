<?php
//쿠키를 직접적으로 삭제는 불가능. 그런 함수는 존재하지 않음.
// cookie 삭제방법 : 쿠키를 다시 세팅
setcookie("myCookie", "홍길동", time());


