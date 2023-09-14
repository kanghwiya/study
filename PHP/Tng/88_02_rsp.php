<?php

$in_str = fgets(STDIN);


// 1가위
// 2주먹
// 3보

echo "가위바위보 게임\n
    가위는 1, 바위는 2, 보는 3을 입력해주세요.\n";

$random = rand(1,3);

if($in_str == 1 || $in_str == 2 || $in_str == 3){
    if ($random == $in_str){
        echo " Computer : {$random}\n
            You : {$in_str}\n
            Drawn";
        }
        else if($random == 1 && $in_str == 3){
            echo " Computer : {$random}\n
                You : {$in_str}\n
                You Lose";
        }
        else if($random == 3 && $in_str == 1){
            echo " Computer : {$random}\n
                You : {$in_str}\n
                You Win";
        }
        else if($random == 1 && $in_str == 2){
            echo " Computer : {$random}\n
                You : {$in_str}\n
                You Win";
        }
        else if($random == 2 && $in_str == 3){
            echo " Computer : {$random}\n
                You : {$in_str}\n
                You Win";
        }
        else {
            echo " Computer : {$random}\n
                You : {$in_str}\n
                You Lose";
        }
}
else {
    echo "1, 2, 3만 입력해주세요.";
}

echo "입력값 : {$in_str}";

// }









// echo "입력값 : {$in_str}";
