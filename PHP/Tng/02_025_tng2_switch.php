<?php

// switch를 이용하여 작성
// 1등이면 금상, 2등이면 은상, 3등이면 동상, 4등이면 장려상, 그 외는 노력상
//  을 출력해주세요.

$num = 3;

// switch( $num ) {
//     case "1":
//         echo "금상";
//         break;
//     case "2":
//         echo "은상";
//         break;
//     case "3":
//         echo "동상";
//         break;
//     case "4":
//         echo "장려상";
//         break;
//     default:
//         echo "노력상";
//         break;
// }

// echo 대신에 변수 적용 가능. 이쪽이 좋음.

if ( $num === 1 ) {
    $award = "금상!!";
}
else if ( $num === 2 ){
    $award = "은상!!";
}
else if ( $num === 3 ){
    $award = "동상!!";
}
else if ( $num === 4 ){
    $award = "장려상!!";
}
else {
    $award = "노력상";
}

echo $award;
