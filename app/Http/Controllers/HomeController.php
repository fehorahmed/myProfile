<?php

namespace App\Http\Controllers;

use App\Models\BannerPic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $result['data'] = BannerPic::where(['status' => 1])->get();


        // if ($result([])->isNotEmpty()) {
        //     return "not empty";
        // }else{
        //     return "is empty";
        // }

        return view('index', $result);
    }
}
