<?php

namespace App\Http\Controllers;

use App\Models\BannerPic;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;

class BannerPicController extends Controller
{

    public function index()
    {
        $result['data'] = BannerPic::all();
        return view('backend.banner.banner_pic', $result);
    }


    public function create()
    {
        return view('backend.banner.banner_pic_add');
    }


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
            'file' => 'required|image|max:500|mimes:jpg,bmp,png|dimensions:ratio=668/690',
        ]);




        $name = $request->post('name');
        $designation = $request->post('designation');
        $date = $request->post('date');
        $details = $request->post('details');
        $phone = $request->post('phone');
        $email = $request->post('email');
        $address = $request->post('address');

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

    public function edit($id)
    {
        $result['data'] = BannerPic::findOrFail($id);
        return view('backend.banner.banner_pic_edit', $result);
    }


    public function update(Request $request, BannerPic $bannerPic)
    {
        $request->validate([
            'id' => 'required|numeric',
            'name' => 'required|max:20',
            'designation' => 'required|max:20',
            'date' => 'required|date',
            'details' => 'required|max:150',
            'phone' => 'required|min:11|max:14',
            'email' => 'required|email:rfc,dns',
            'address' => 'required|max:60',

        ]);


        $id = $request->post('id');

        $name = $request->post('name');
        $designation = $request->post('designation');
        $date = $request->post('date');
        $details = $request->post('details');
        $phone = $request->post('phone');
        $email = $request->post('email');
        $address = $request->post('address');

        if ($request->hasFile('file')) {

            $request->validate([
                'file' => 'required|image|max:500|mimes:jpg,bmp,png|dimensions:ratio=668/690',
            ]);


            $model = BannerPic::find($id);

            if (file_exists(public_path('profilePic\\' . $model->pic_name))) {
                unlink(public_path('profilePic\\' . $model->pic_name));
                $model->pic_name = "";
            }

            $imageName = time() . '.' . $request->file('file')->extension();
            $request->file('file')->move(public_path('profilePic'), $imageName);
        }

        // $request->file('file')->store('', $imageName);
        // $path = $request->file('file')->storeAs('profilePic',$imageName);


        $model = BannerPic::find($id);

        $model->name = $name;
        $model->designation = $designation;
        $model->date = $date;
        $model->details = $details;
        $model->phone = $phone;
        $model->email = $email;
        $model->address = $address;
        if ($request->hasFile('file')) {
            $model->pic_name = $imageName;
        }
        $model->status = 0;
        $model->update();

        return redirect()->route('admin.banner')->with('message', 'Successfully Profile Updated.');
    }


    public function destroy($id)
    {

        $result = BannerPic::find($id);
        $result->pic_name;

        // $path = public_path('profilePic\\' . $result->pic_name);
        if (file_exists(public_path('profilePic\\' . $result->pic_name))) {
            unlink(public_path('profilePic\\' . $result->pic_name));
        }

        BannerPic::destroy($id);

        return redirect()->back()->with('message', 'Successfully Profile Deleted.');
    }



    public function active($id)
    {

        BannerPic::query()->update(['status' => 0]);
        $model = BannerPic::find($id);
        $model->status = 1;
        $model->save();

        return redirect()->back()->with("message", "Status Updated..");
        // $model= BannerPic::findOrFail($id);

    }
}
