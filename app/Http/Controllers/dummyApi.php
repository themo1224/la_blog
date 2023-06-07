<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyApi extends Controller
{
    public function getdata(){
        return [
            "name"=>"ali",
            "last_name"=>"baba",
        ];
    }
}
