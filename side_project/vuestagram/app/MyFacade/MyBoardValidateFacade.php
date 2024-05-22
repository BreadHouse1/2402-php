<?php

namespace App\MyFacade;

use Illuminate\Support\Facades\Facade;

class MyBoardValidateFacade extends Facade {
    //  getFacadeAccessor()이름 정해져 있음
    protected static function getFacadeAccessor() {
        // Facade로 만들 클래스 지정
        return 'MyBoardValidate';
    }
}