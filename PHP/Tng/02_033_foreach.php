<?php
$array = [
    [
        "id" => "meerkat1"
        ,"pw" => "php504"
    ]
    ,[
        "id" => "meerkat2"
        ,"pw" => "php504"
    ]
    ,[
        "id" => "meerkat3"
        ,"pw" => "php504"
    ]
    ];

// ID만 출력해주세요.
// ID List
// meerkat1
// meerkat2
// meerkat3

// echo "ID LIST";
// foreach ($array as $val){
//     echo $val["id"]."\n"; 
// }


echo "ID LIST";
foreach ($array as $item){
    echo $item["id"]."\n"; 
}

// var_dump($array); 로 확인해보면 좋음.

?>