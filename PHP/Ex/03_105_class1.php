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
    private $now;

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
    public function __construct(){
        echo "컨스트럭트 실행",
        $this->now = date("Y-m-d H:i:s");
    }

    // getter 메소드
    public function get_now() {
        return $this->now;
    }
    // setter 메소드
    public function set_now() {
        $this->now = "9999-01-01 00:00:00";
    }
    // static
    public static function static_test(){
        echo "스테틱 메소드";
    } //$objClassRoom = new ClassRoom();를 안써도 적용이 됨.. 
    // 기본적으로 메모리에 자동으로 올라가 있음
}

// 생성자(constructor):
//      클래스를 이용하여 객체를 생성할 때 사용
//      생성자를 정의 하지 않을 때는 디폴트 생성자가 선언 됨
//      무조건 public으로 선언. 한 개


// class instance 생성 : 이 클래스를 사용하기 위해서 메모리에 올린다.
$objClassRoom = new ClassRoom();

// 클래스에 있는 메소드를 호출하는 방법
// $objClassRoom -> class_room_set_value();

// computer라는 객체에 접근하기 때문에 computer에 $ 제거
// var_dump($objClassRoom -> computer);

// $objClassRoom -> classRoomPrint();
$objClassRoom->set_now();
echo $objClassRoom->get_now(); //


//static 객체 사용 방법
ClassRoom::static_test();