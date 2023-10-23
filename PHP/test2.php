<?php
//19단 출력
$file - fopen();

for($i = 2; $i <= 19; $i++){
	echo $i."단\n";
	for($d = 1; $d <= 19; $d++){
		$result = $i * $d;
		echo "{$i} x {$d} = {$result}\n"; 
	}
}


echo "\n\n\n";

$dan = 1;
$num = 1;
while($num <= 19){
	echo "{$num}단\n";
	while($dan <= 9){
		$result = $num * $dan;
		echo "{$num} x {$dan} = {$result}\n";
		$dan++;
	}
	$dan = 1;
	$num++;
}

?>