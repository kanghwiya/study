<?php

// class는 동종의 객체들이 모여있는 집합을 정의한 것


class ClassRoom {
    // 멤버필드 : 멤버변수와 메소드가 정의되어있는 장소
    // 멤버 변수 : class내에 있는 변수
    // 접근제어 지시자 : public, private, protected
    // 
    public $computer; //어디에서나 접근 가능
    private $book; //class 안에서만 접근 가능
    protected $bag; //class와 나를 상속받은 자식 class 내에서만 접근 가능

    //메소드(method) : class 내에 있는 함수
    public function class_room_set_value(){
        $this -> computer = "컴퓨터";  //현재 내가 있는 클래스를 지정함
        $this -> book = "책";
        $this -> bag = "가방";
    }
    //컴퓨터, 북, 백의 값을 출력하는 메소드를 만들어 주세요.
    public function classRoomPrint() {
        $str = $this->computer."\n".
                $this->book."\n".
                $this->bag;
        echo $str;
    }
}

// class instance 생성 : 이 클래스를 사용하기 위해서 메모리에 올린다.
$objClassRoom = new ClassRoom();

// 클래스에 있는 메소드를 호출하는 방법
$objClassRoom -> class_room_set_value();

// computer라는 개(객?)체에 접근하기 때문에 computer에 $ 제거
// var_dump($objClassRoom -> computer);

$objClassRoom -> classRoomPrint();

