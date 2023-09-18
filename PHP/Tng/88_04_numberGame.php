<?php

echo "1에서 100까지의 숫자 중 하나의 숫자를 맞추는 게임입니다.
임의의 숫자를 하나 입력하시면 게임이 시작됩니다.";


$number = rand(1,100);
$i = 0;
while(true){
	
	$input = (int)(fgets(STDIN));
	
	if($number > $input){
		echo "더 작은 숫자를 입력하세요!";
	}
	else if($number < $input ){
		echo "더 큰 숫자를 입력하세요!";
	}
	else if($number = $input){
		echo "정답입니다!";
		break;
	}
	else {
		echo "잘못된 입력입니다.";
	}

	if( $i=== 5 ){
		echo "숫자맞추기에 실패하셨습니다....";
		break;
	}
	
}

//작동 안시켜봄 .. 오류 있을가능성 높음 

?>
<!-- D:\workspace\nim\PHP\Tng -->
<!-- php 88_04_numberGame.php -->