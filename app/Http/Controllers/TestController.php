<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        // return 'its working';
        return response()->json([
            'msg' => 'some error occured'
        ],422);
    }
}
