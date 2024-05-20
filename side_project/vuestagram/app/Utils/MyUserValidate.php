<?php

namespace App\Utils;

use App\Utils\MyValidate;

class MyUserValidate extends myValidate {
    protected $validateList = [
        'account' => ['required', 'min:5', 'max:20', 'regex:/^[a-zA-Z0-9]+$/']
        ,'password' =>  ['required', 'min:5', 'max:20', 'regex:/^[a-zA-Z0-9!@]+$/']
        // same:password를 쓰면 password와 동일한지 알아서 체크해줌
        ,'password_chk' => ['same:password']
        ,'name' => ['required', 'min:2', 'max:20', 'regex:/^$[가-힣]+/u']
        ,'gender' => ['required', 'regex: /^[0-9]{1}$/']
        ,'profile' => ['image']
    ];
}