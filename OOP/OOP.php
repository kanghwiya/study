<?php

interface 수영 {
    // 인터페이스는 추상화 메소드만 구현 가능
    public function 수영();
}

interface 기름 {
    // 인터페이스는 추상화 메소드만 구현 가능
    public function 기름();
}
abstract class 포유류 implements 수영, 기름 {
    protected $이름;

    public function __construct (string $이름) {
        $this->이름 = $이름;
    }

    public function 출산() {
        echo $this->이름."출산한다.";
    }

    // 추상화할 때 필수로 abstract를 사용. 포유류를 상속받은 자식 class들은 모두 호흡() 메소드를 생성해야함.
    abstract public function 호흡();
}
class 날다람쥐 extends 포유류 {

    public function 호흡() {
        echo $this->이름."폐호흡한다.";
    }


    public function 비행() {
        echo $this->이름."날아간다";
    }

}

class 고래 extends 포유류 {
    protected $이름;

    public function __construct (string $이름) {
        $this->이름 = $이름;
    }
    public function 호흡() {
        echo $this->이름."바다에서 폐호흡한다.";
    }

    public function 수영() {
        echo $this->이름."헤엄친다.";
    }
}

class 고등어 {
    public function 수영() {
        echo "고등어 헤엄친다.";
    }
}


$obj = new 고래('고래');
echo $obj->수영();

$obj = new 고등어();
echo $obj->수영();
