<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $result['data'] = About::all();
        return view('backend.about.about', $result);
    }


    public function create()
    {
        return view('backend.about.about_add');
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
            'file' => 'required|image|mimes:jpg,bmp,png|dimensions:ratio=668/690',
        ]);




        $name = $request->post('name');
        $designation = $request->post('designation');
        $date = $request->post('date');
        $details = $request->post('details');
        $phone = $request->post('phone');
        $email = $request->post('email');
        $address = $request->post('address');

        // if ($request->hasFile('file')) {
        //     $imageName = time() . '.' . $request->file('file')->extension();
        //     // $request->file('file')->store('', $imageName);
        //     // $path = $request->file('file')->storeAs('profilePic',$imageName);
        //     $request->file('file')->move(public_path('profilePic'), $imageName);
        // }


        $model = new About();

        $model->name = $name;
        $model->designation = $designation;
        $model->date = $date;
        $model->details = $details;
        $model->phone = $phone;
        $model->email = $email;
        $model->address = $address;
       // $model->pic_name = $imageName;
        $model->status = 0;
        $model->save();

        return redirect()->route('admin.about')->with('message', 'Successfully About Added.');
    }

    public function edit($id)
    {
        $result['data'] = About::findOrFail($id);
        return view('backend.about.about_edit', $result);
    }


    public function update(Request $request)
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

        // if ($request->hasFile('file')) {

        //     $request->validate([
        //         'file' => 'required|image|mimes:jpg,bmp,png|dimensions:ratio=668/690',
        //     ]);


        //     $model = BannerPic::find($id);
        //     if (!empty($model->pic_name)) {
        //         unlink(public_path('profilePic\\' . $model->pic_name));
        //         $model->pic_name = "";
        //     }

        //     $imageName = time() . '.' . $request->file('file')->extension();
        //     $request->file('file')->move(public_path('profilePic'), $imageName);
        // }

        // $request->file('file')->store('', $imageName);
        // $path = $request->file('file')->storeAs('profilePic',$imageName);


        $model = About::find($id);

        $model->name = $name;
        $model->designation = $designation;
        $model->date = $date;
        $model->details = $details;
        $model->phone = $phone;
        $model->email = $email;
        $model->address = $address;
       // $model->pic_name = $imageName;
        $model->status = 0;
        $model->update();

        return redirect()->route('admin.banner')->with('message', 'Successfully About Updated.');
    }


    public function destroy($id)
    {

        $result = About::find($id);
        $result->pic_name;

       // $path = public_path('profilePic\\' . $result->pic_name);
        // if (file_exists( public_path('profilePic\\' . $result->pic_name))) {
        //     unlink(public_path('profilePic\\' . $result->pic_name));
        //   }

        About::destroy($id);

        return redirect()->back()->with('message', 'Successfully About Deleted.');
    }



    public function active($id)
    {

        About::query()->update(['status' => 0]);
        $model = About::find($id);
        $model->status = 1;
        $model->save();

        return redirect()->back()->with("message", "Status Updated..");
        // $model= BannerPic::findOrFail($id);

    }
}
