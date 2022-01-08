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
        $result['data'] = BannerPic::all();
        return view('backend.banner.banner_pic', $result);
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
            'name' => 'required|max:20',
            'designation' => 'required|max:20',
            'date' => 'required|date',
            'details' => 'required|max:150',
            'phone' => 'required|min:11|max:14',
            'email' => 'required|email:rfc,dns',
            'address' => 'required|max:60',
            'file' => 'required|image|mimes:jpg,bmp,png|dimensions:ratio=668/690',
        ]);




        $name = $request->post('name');
        $designation = $request->post('designation');
        $date = $request->post('date');
        $details = $request->post('details');
        $phone = $request->post('phone');
        $email = $request->post('email');
        $address = $request->post('address');
        $status = $request->post('status');

        if ($request->hasFile('file')) {
            $imageName = time() . '.' . $request->file('file')->extension();
            // $request->file('file')->store('', $imageName);
            // $path = $request->file('file')->storeAs('profilePic',$imageName);
            $request->file('file')->move(public_path('profilePic'), $imageName);
        }


        $model = new BannerPic();

        $model->name = $name;
        $model->designation = $designation;
        $model->date = $date;
        $model->details = $details;
        $model->phone = $phone;
        $model->email = $email;
        $model->address = $address;
        $model->pic_name = $imageName;
        $model->status = 0;
        $model->save();

        return redirect()->route('admin.banner')->with('message', 'Successfully Profile Added.');
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



    public function active($id){

        $model= BannerPic::all()->update(['status'=>0]);
        $model->update();


        return $model;
        $model= BannerPic::findOrFail($id);

    }


    //Flight::destroy(1);
}
