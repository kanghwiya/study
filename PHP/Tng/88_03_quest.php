<?php

// 1. 반복문을 이용하여 숫자를 1~10까지 출력해주세요.
// 2. 구구단 8단을 출력해 주세요.
// 3. 19단을 출력해 주세요.
// 4. 두 숫자를 더해주는 함수를 만들어 주세요.
// 5. 짜장면이면 중식, 비빔밥이면 한식, 그외는 양식으로 출력해 주세요.


// 1.
for($i = 1; $i <=10; $i++){
	echo $i;
}


// 2.
echo "8단\n";
for($i = 1; $i <=9; $i++){
	$result = $i*8;
	echo "8 x {$i} = {$result}\n";
}

// 3.
for($i = 2; $i <= 19; $i++){
	echo "{$i} 단\n";
		for($num = 1; $num <= 9; $num++){
		$result = $num*$i;
		echo "{$i} x {$num} = {$result}\n";
		}
}

//4.
function my_sum($a,$b){
	return $a + $b;
}

echo my_sum(1,6);

//5.

$str = "짜장면";

if( $str === "짜장면" ){
	echo "중식";
}
else if( $str === "비빔밥" ){
	echo "한식";
}
else {
	echo "양식";
}
