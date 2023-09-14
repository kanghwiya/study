<?php
echo "가위바위보 게임\n
가위바위보를 입력해주세요.\n\n";

$user_str = fgets(STDIN);


// 1가위
// 바위
// 3보


// echo "입력값 : {$user_str}";

$random = rand(1,3);

$user_str = array("가위" => 1, "바위" => 2, "보" => 3);

//배열값 출력하는 함수를 대입하기..

if($random === 1){
    $rand = "가위";
}
if($random === 2){
    $rand = "바위";
}
if($random === 3){
    $rand = "보";
}

echo "컴퓨터 : {$rand}";

if($user_str == 1 || $user_str == 2 || $user_str == 3){
if ($random == $user_str){
echo " 
    Drawn";
}
else if($random == 1 && $user_str == 3){
echo " 
You Lose";
}
else if($random == 3 && $user_str == 1){
echo " 
You Win";
}
else if($random == 1 && $user_str == 2){
echo " 
You Win";
}
else if($random == 2 && $user_str == 3){
echo " 
You Win";
}
else {
echo " 
You Lose";
}

        
}
else {
    echo "잘못된 입력입니다.";
}

// str_replace(1, "가위", $random);
// str_replace(2, "바위", $random);
// str_replace(3, "보", $random);

// str_replace(1, "가위", $user_str);
// str_replace(2, "바위", $user_str);
// str_replace(3, "보", $user_str);


// switch($random){
//     case 1 :
//         $user_str = "가위";
//         break;
//     case 2 :
//         $user_str = "바위";
//         break;
//     case 3 :
//         $user_str = "보";
//         break;
// }

switch($user_str){
    case 1 :
        $user_str = "가위";
        break;
    case 2 :
        $user_str = "바위";
        break;
    case 3 :
        $user_str = "보";
        break;
}        



// }









// echo "입력값 : {$in_str}";