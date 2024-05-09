<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() {
        return 'TestController -> index()';
    }

    public function create() {
        return view('/test');
    }

}
