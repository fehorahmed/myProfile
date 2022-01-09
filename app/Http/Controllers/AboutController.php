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
            'about' => 'required|max:300',
            'donation' => 'required|numeric',
            'project' => 'required|numeric',
            'volunteers' => 'required|numeric',
            'web_design' => 'required|numeric|max:100',
            'web_development' => 'required|numeric|max:100',
            'laravel' => 'required|numeric|max:100',
            'wordpress' => 'required|numeric|max:100',
            'photoshop' => 'required|numeric|max:100',

        ]);




        $about = $request->post('about');
        $donation = $request->post('donation');
        $project = $request->post('project');
        $volunteers = $request->post('volunteers');
        $web_design = $request->post('web_design');
        $web_development = $request->post('web_development');
        $laravel = $request->post('laravel');
        $wordpress = $request->post('wordpress');
        $photoshop = $request->post('photoshop');

        // if ($request->hasFile('file')) {
        //     $imageName = time() . '.' . $request->file('file')->extension();
        //     // $request->file('file')->store('', $imageName);
        //     // $path = $request->file('file')->storeAs('profilePic',$imageName);
        //     $request->file('file')->move(public_path('profilePic'), $imageName);
        // }


        $model = new About();

        $model->about = $about;
        $model->donation = $donation;
        $model->project = $project;
        $model->volunteers = $volunteers;
        $model->web_design = $web_design;
        $model->web_development = $web_development;
        $model->laravel = $laravel;
        $model->wordpress = $wordpress;
        $model->photoshop = $photoshop;
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
            'donation' => 'required|numeric',
            'project' => 'required|numeric',
            'volunteers' => 'required|numeric',
            'web_design' => 'required|numeric|max:100',
            'web_development' => 'required|numeric|max:100',
            'laravel' => 'required|numeric|max:100',
            'wordpress' => 'required|numeric|max:100',
            'photoshop' => 'required|numeric|max:100',

        ]);


        $id = $request->post('id');

        $about = $request->post('about');
        $donation = $request->post('donation');
        $project = $request->post('project');
        $volunteers = $request->post('volunteers');
        $web_design = $request->post('web_design');
        $web_development = $request->post('web_development');
        $laravel = $request->post('laravel');
        $wordpress = $request->post('wordpress');
        $photoshop = $request->post('photoshop');

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
        $model->about = $about;
        $model->donation = $donation;
        $model->project = $project;
        $model->volunteers = $volunteers;
        $model->web_design = $web_design;
        $model->web_development = $web_development;
        $model->laravel = $laravel;
        $model->wordpress = $wordpress;
        $model->photoshop = $photoshop;
        $model->status = 0;
        $model->update();

        return redirect()->route('admin.about')->with('message', 'Successfully About Updated.');
    }


    public function destroy($id)
    {
        // $result = About::find($id);
        // $result->pic_name;
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
        $model->update();

        return redirect()->back()->with("message", "Status Updated..");


    }
}
