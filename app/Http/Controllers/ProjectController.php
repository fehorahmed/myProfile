<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $result['data'] = Project::all();
        return view('backend.project.project', $result);
    }


    public function create()
    {
        return view('backend.project.project_add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'group_name' => 'required|max:30',
            'about' => 'required|max:200',
            'link' => 'required|max:200',
            'file' => 'required|image|max:200|mimes:jpg,bmp,png|dimensions:ratio=100/100',
        ]);

        $name = $request->post('name');
        $group_name = $request->post('group_name');
        $about = $request->post('about');
        $link = $request->post('link');
        if ($request->hasFile('file')) {
            $imageName = time() . '.' . $request->file('file')->extension();
            // $request->file('file')->store('', $imageName);
            // $path = $request->file('file')->storeAs('profilePic',$imageName);
            $request->file('file')->move(public_path('projectPic'), $imageName);
        }




        //asdsaaaaaaaaaaasaddddddddd

        $model = new Project();

        $model->service = $service;
        $model->details = $details;
        $model->file = $imageName;
        $model->status = 0;
        $model->save();

        return redirect()->route('admin.service')->with('message', 'Successfully Service Added.');
    }

    public function edit($id)
    {
        $result['data'] = Service::findOrFail($id);
        return view('backend.service.service_edit', $result);
    }


    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'service' => 'required|max:30',
            'details' => 'required|max:200',

        ]);


        $id = $request->post('id');

        $service = $request->post('service');
        $details = $request->post('details');
        if ($request->hasFile('file')) {

            $request->validate([
                'file' => 'required|image|max:200|mimes:jpg,bmp,png|dimensions:ratio=100/100',
            ]);
            $model = Service::find($id);

            if (file_exists(public_path('servicePic\\' . $model->file))) {
                unlink(public_path('servicePic\\' . $model->file));
                $model->file = "";
            }

            $imageName = time() . '.' . $request->file('file')->extension();
            $request->file('file')->move(public_path('servicePic'), $imageName);
        }

        // $request->file('file')->store('', $imageName);
        // $path = $request->file('file')->storeAs('profilePic',$imageName);


        $model = Service::find($id);

        $model->service = $service;
        $model->details = $details;
        if ($request->hasFile('file')) {
            $model->file = $imageName;
        }
        $model->status = 0;
        $model->update();

        return redirect()->route('admin.service')->with('message', 'Successfully Service Updated.');
    }


    public function destroy($id)
    {

        $result = Service::find($id);

        // $path = public_path('profilePic\\' . $result->pic_name);
        if (file_exists(public_path('servicePic\\' . $result->file))) {
            unlink(public_path('servicePic\\' . $result->file));
        }

        Service::destroy($id);

        return redirect()->back()->with('message', 'Successfully Service Deleted.');
    }



    public function active($id)
    {

        // Service::query()->update(['status' => 0]);
        $model = Service::find($id);
        $model->status = 1;
        $model->update();

        return redirect()->back()->with("message", "Status Updated..");


    }
}
