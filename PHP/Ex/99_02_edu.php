<?php
//함수 선언 : 함수를 만들어 두는 것
// function my_sum($num1, $num2, &$sum){
// 	$sum = $num1 + $num2;
// }

// $t = 0;
// my_sum(2, 5, $t);

// echo $t;



//함수 호출 : 미리 만들어둔 함수를 부르는 것

// function my_sum2($num1, $num2, &$sum){
// 	$sum = $num1 + $num2;
// 	echo $sum;
// 	return true;
// }

// $result = my_sum2(2,6);
// if(!$result){
// 	echo "Error";
// }


// 3개의 숫자를 빼기하는 함수를 만들어주세요.
// function my_minus($num1, $num2, $num3){
// 	$result = $num1 - $num2 - $num3;
// 	return $result;
// }

// $number = my_minus(1, 2, 3);
// echo $number;



//가변 파라미터
function my_all_sum(...$numbers){
	$sum=0;
	foreach($numbers as $num => $val){
		$sum+= $val;
	}
	return $sum;
}

echo my_all_sum(2, 3, 6, 7, 8, -6);


//레퍼런스 파라미터
// pass by reference;