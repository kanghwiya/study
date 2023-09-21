<?php
// Get method
// 		-url에 대한 설명
//https://search.naver.com/search.naver?where=nexearch&sm=top
//  여기서 http는 프로토콜이라고 한다. 통신을 할 때의 약속.  그 이후 .com/까지는 도메인
//  search.naver~ 어쩌고저쩌고는 쿼리스트림 = 파라미터
//		 where=nexearch&sm=top 에서 where은 key고 nexearch는 value, &는 and, sm은 key,top은 value.
// 				ㄴ배열로 구성되어있다는 뜻임

// http://localhost/mini_board/src/list.php 
// 에서 localhost까지는 도메인 이후 mini_ ~ .php 까지는 패스라고 한다.

// 프로토콜->도메인->패스->파라미터 순
// 프로토콜 : 통신을 하기 위한 규약, 규칙, 약속
// 도메인 : 접속하고자 하는 서버의 IP 또는 별칭
// 패스 : 실행시키고자 하는 처리의 주소
// 쿼리스트림(파라미터): Get Method로 통신할 때 유저가 보내주는 데이터



print_r($_GET); //슈퍼글로벌 변수는 읽기만 해야함. 값을 넣으면 x
?>
