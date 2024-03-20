<?php
// namespace : 해당 파일의 주소를 할당
// 일반적으로 해당파일의 패스(경로)를 적어줌
namespace php\ex;

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