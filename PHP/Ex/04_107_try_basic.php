<?php

try{
	//예외상황이 발생할만한 소스코드(우리가 처리하고 싶은 소스코드)
	echo "Try 실행\n";
	throw new Exception("강제 예외 발생"); //예외상황이 발동하면 그 즉시 try를 중지하고 catch로 넘어감
	//Exception들을 Throwable로 변경해서 사용 가능.7버전 미만. Exception은 7버전 이상
	echo "Try 종료";

} catch( Exception $e) {//$e :파라미터. Exception : 타입힌트
//$e는 Exception 타입의 파라미터를 받겠다는 뜻
	//예외상황 발생 시 실행
	echo "Catch 실행\n";
	echo $e->getmessage(),"\n"; //throw new Exceptin("강제 예외 발생)"을 출력
} finally {
	// 정상이든, 예외발생이든 무조건 실행
	echo "Finally 실행\n";
}