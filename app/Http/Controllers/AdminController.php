<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{



    public function index(){
        $result['viewer_message_count']=DB::table('viewer_messages')->count();
        $result['project_count']=DB::table('projects')->count();
        $result['service_count']=DB::table('services')->count();
        $result['experience_count']=DB::table('experiences')->count();
        // return $result['viewer_message_count'];
        return view('backend.index',$result);
    }
}
