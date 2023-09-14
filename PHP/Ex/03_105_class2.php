<?php


// namespace : 클래스를 구분해주기 위해 설정. 보통 해당 파일의 패스로 작성됨(폴더경로)
namespace up;

class Class1{

    public function __construct(){
        echo "위의 클래스 1";
    }
}



namespace down;

class Class1{

    public function __construct(){
        echo "아래 클래스 1";
    }
}
// namespace를 이용해서 객체를 지정
// $obj_class1 = new \up\Class1();
// $obj_class1 = new \down\Class1();

namespace test;

use \up\class1;

$obj_class1 = new Class1();
