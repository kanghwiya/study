<?php
echo "가위바위보 게임\n
가위는 1, 바위는 2, 보는 3을 입력해주세요.\n\n
******0을 누르면 종료됩니다.******";



// 1가위
// 바위
// 3보


// echo "입력값 : {$user_str}";



// $result = array("가위" => 1, "바위" => 2, "보" => 3);
// $result[1];

//배열값 출력하는 함수를 대입하기..

// if($random === 1){
//     $rand = "가위";
// }
// if($random === 2){
//     $rand = "바위";
// }
// if($random === 3){
//     $rand = "보";
// }

while(true){
        $user_str = (int)(fgets(STDIN));
        $random = rand(1,3);


if($user_str === 1 || $user_str === 2 || $user_str === 3){
    if ($random === $user_str){
        echo " 
        computer : {$random}\n
        You : {$user_str}\n
        ♥♡♥♡비겼음♥♡♥♡\n";
        }

        else if(($random === 1 && $user_str === 2)||
        ($random === 2 && $user_str === 3)||
        ($random === 3 && $user_str === 1)){
        echo " 
        computer : {$random}\n
        You : {$user_str}\n
        ♥♡♥♡승리♥♡♥♡\n";
        }
        else if(($random === 2 && $user_str === 1)||
        ($random === 3 && $user_str === 2)
        ||($random === 3 && $user_str == 1)){
        echo " 
        computer : {$random}\n
        You : {$user_str}\n
        ♥♡♥♡패배♥♡♥♡\n";
        }
                
        }
        else if (($user_str > 3)||($user_str < 0)) {
        echo "잘못된 입력입니다.";
        }
            else if($user_str === 0){
        break;

    }
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

// function rsp_num_to_str(int $num) {
// 	$user_str = "";
// switch ($user_str){
//     case 1 :
//         $user_str = "가위";
//         break;
//     case 2 :
//         $user_str = "바위";
//         break;
//     default :
//         $user_str = "보";
//         break;
//     }
//     return $user_str;
// }

// function rsp_num_to_str(int $num) {
// 	$random = "";
// switch ($random){
//     case 1 :
//         $random = "가위";
//         break;
//     case 2 :
//         $random = "바위";
//         break;
//     default :
//         $random = "보";
//         break;
    
//     }
//     return $random;
// }



// }









// echo "입력값 : {$in_str}";