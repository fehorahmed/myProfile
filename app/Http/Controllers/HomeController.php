<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\BannerPic;
use App\Models\Education;
use App\Models\experience;
use App\Models\Project;
use App\Models\Service;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $result['banner'] = BannerPic::where(['status' => 1])->get();
        $result['about'] = About::where(['status' => 1])->get();
        $result['experience'] = experience::where(['status' => 1])->get();
        $result['education'] = Education::where(['status' => 1])->get();
        $result['service'] = Service::where(['status' => 1])->get();
        $result['project'] = Project::where(['status' => 1])->get();
        $result['social'] = SocialLink::where(['status' => 1])->get();


        // return $result['experience'][0];
        // if ($result([])->isNotEmpty()) {
        //     return "not empty";
        // }else{
        //     return "is empty";
        // }

        return view('index', $result);
    }
}
