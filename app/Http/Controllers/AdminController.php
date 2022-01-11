<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{



    public function index(){
        $result['viewer_message_count']=DB::table('viewer_messages')->count();
        // return $result['viewer_message_count'];
        return view('backend.index',$result);
    }
}
