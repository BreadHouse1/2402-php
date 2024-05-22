<?php

namespace App\Utils;

use App\Utils\MyValidate;

class MyBoardValidate extends myValidate {
    protected $validateList = [
        'id' => ['regex:/^[0-9]+$/']
        ,'content' => ['require', 'max:200']
        ,'profile' => ['image']
    ];
}