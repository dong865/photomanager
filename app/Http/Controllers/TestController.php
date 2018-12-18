<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
        return view('photos.test');
    }
    public function test2(){
        return view('photos.page2');
    }
    public function page2(){
        return view('test.page2');
    }
    public function page1(){
        return view('test.page1');
    }
}
