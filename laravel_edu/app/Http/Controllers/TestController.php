<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function index() {
        $arr =[ '휘야', '강휘야', '클론강휘야'];
        return view('test')->with('name', '배열은 형태를 바꿔서 넣어야하는구나');
    }
}
// with를 계속 추가하거나, 항목에 배열을 넣는 것도 가능
