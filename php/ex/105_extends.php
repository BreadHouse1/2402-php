<?php
// 상속 : 부모클래스의 자원을 자식클래스가 물려받아 사용하거나 재정의 하는 것
class Parents {

    protected $name;

    public function __construct() {
        echo "부모클래스 생성자 실행\n";
    }

    private function home() {
        echo "집은 부모님 겁니다.\n";
    }

    public function car() {
        echo "차는 부모님 자식 다 씁니다.\n";
    }
}

class Child extends Parents {

    public function __construct($name) {
        $this->name = $name;
        echo "자식클래스 생성자 실행\n";
    }

    public function dog() {
        echo "강아지는 제겁니다.";
    }

    public function getName() {
        echo $this->name;
    }

    // 오버라이딩 : 부모요소의 메소드를 재정의
    public function car() {
        echo "이 자동차는 이제 제겁니다.\n";
    }
}

// 자식요소에 찾는 메소드가 없을 경우 부모요소로 넘어가서 있으면 부모요소의 메소드를 가져온다

$obj=new Child("홍길동"); 
$obj->car();
$obj->getName();