<?php

namespace App\Http\Controllers;

use App\Models\BannerPic;
use Illuminate\Http\Request;

class BannerPicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.banner.banner_pic');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.banner_pic_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:20',
            'designation'=>'required|max:20',
            'date'=>'required|date',
            'details'=>'required|max:150',
            'phone'=>'required|min:11|max:14',
            'email'=>'required|email:rfc,dns',
            'address'=>'required|max:60',
            'file'=>'required|mimes:jpg,bmp,png',
        ]);


        $file=$request->post('file');
        return $file;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BannerPic  $bannerPic
     * @return \Illuminate\Http\Response
     */
    public function show(BannerPic $bannerPic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BannerPic  $bannerPic
     * @return \Illuminate\Http\Response
     */
    public function edit(BannerPic $bannerPic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BannerPic  $bannerPic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BannerPic $bannerPic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BannerPic  $bannerPic
     * @return \Illuminate\Http\Response
     */
    public function destroy(BannerPic $bannerPic)
    {
        //
    }
}
