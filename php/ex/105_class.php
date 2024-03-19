<?php
// class : 동종의 객체들을 모아 정의한 것
// 보통 클래스마다 파일을 따로 만들고 include로 가져옴
// 관습적으로 파일명과 클래스명을 동일하게 지어준다.
// 클래스명의 첫 글자는 대문자로 작성
class Whale {
    // 프로퍼티 (변수)

    // 접근 제어 지시자
    // public : class 외부, 내부 어디에서 접근 가능
    public $str;
    // private : class 내부에서만 접근 가능, 외부는 접근 불가능
    private $i;
    // protected : class 내부에서만 접근 가능, 외부에서는 접근 불가능, 단, 상속관계에서는 접근이 가능
    protected $boo;

    private $name;

    // 생성자 메소드
    public function __construct($name) {
        // $this : $this가 있는 영역 내의 요소를 선택함
        $this->name = $name;
    }

    // 메소드 getter / setter (private나 protected의 소스를 가져오고 싶을 때 사용)
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }

    // 메소드 (함수)

    public function swim($opt) {
        echo $opt.$this->name." 헤엄 칩니다.";
    }
    
    public function breathe() {
        echo $this->name." 호흡 한다.\n";    
    }

    // static 메소드 : 인스턴스 생성 없이 사용할 수 있는 메소드
    public static function big() {
        echo "매우 크다.";
    } 
}

//클래스 인스턴스 생성
//new Whale();

// 인스턴스를 변수에 저장
$obj_whale = new Whale("고래");

// 클래스 내에 있는 원하는 소스를 불러옴 public일 경우에만 불러 올 수있음
// 관습적으로 띄어쓰기는 생략 
$obj_whale->swim("흰수염");
echo $obj_whale->getName()."\n";
$obj_whale->breathe();

$obj_whale->setName("참새");
$obj_whale->swim("흰수염");
$obj_whale->breathe();

// static 메소드 호출 (인스턴스이름 :: 필요한메소드)
Whale::big();

echo "\n";

// Shark 클래스를 만들어 주세요
// 프로퍼티 : private $name
// 생성자 메소드 : Whale 클래스랑 동일하게
// 메소드 : public swim, public breathe

class Shark {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function swim() {
        echo $this->name."헤엄친다.\n";
    }

    public function breathe() {
        echo $this->name."호흡한다.\n";
    }
}

$obj_Shark=new Shark("상어"); //class 안의 __construct($name)에 $name에 상어를 대입

$obj_Shark->swim();
$obj_Shark->breathe();

$obj_Shark->setName("고등어"); //setName에서 $name을 고등어로 변경
$obj_Shark->swim();
$obj_Shark->breathe();

echo $obj_Shark->getName();