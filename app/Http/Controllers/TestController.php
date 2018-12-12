<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
        return view('photos.test');
    }
    public function page2(){
        return view('photos.page2');
    }
}
