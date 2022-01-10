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

        $model->name = $name;
        $model->group_name = $group_name;
        $model->about = $about;
        $model->link = $link;
        $model->file = $imageName;
        $model->status = 0;
        $model->save();

        return redirect()->route('admin.project')->with('message', 'Successfully Project Added.');
    }

    public function edit($id)
    {
        $result['data'] = Project::findOrFail($id);
        return view('backend.project.project_edit', $result);
    }


    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'group_name' => 'required|max:30',
            'about' => 'required|max:200',
            'link' => 'required|max:200',

        ]);


        $id = $request->post('id');

        $name = $request->post('name');
        $group_name = $request->post('group_name');
        $about = $request->post('about');
        $link = $request->post('link');
        if ($request->hasFile('file')) {

            $request->validate([
                'file' => 'required|image|max:200|mimes:jpg,bmp,png|dimensions:ratio=100/100',
            ]);
            $model = Project::find($id);

            if (file_exists(public_path('projectPic\\' . $model->file))) {
                unlink(public_path('projectPic\\' . $model->file));
                $model->file = "";
            }

            $imageName = time() . '.' . $request->file('file')->extension();
            $request->file('file')->move(public_path('projectPic'), $imageName);
        }

        // $request->file('file')->store('', $imageName);
        // $path = $request->file('file')->storeAs('profilePic',$imageName);


        $model = Project::find($id);

        $model->name = $name;
        $model->group_name = $group_name;
        $model->about = $about;
        $model->link = $link;
        if ($request->hasFile('file')) {
            $model->file = $imageName;
        }
        $model->status = 0;
        $model->update();

        return redirect()->route('admin.project')->with('message', 'Successfully Project Updated.');
    }


    public function destroy($id)
    {

        $result = Project::find($id);

        // $path = public_path('profilePic\\' . $result->pic_name);
        if (file_exists(public_path('projectPic\\' . $result->file))) {
            unlink(public_path('projectPic\\' . $result->file));
        }

        Project::destroy($id);

        return redirect()->back()->with('message', 'Successfully Project Deleted.');
    }



    public function active($id)
    {

        // Service::query()->update(['status' => 0]);
        $model = Project::find($id);
        $model->status = 1;
        $model->update();

        return redirect()->back()->with("message", "Status Updated..");


    }
}
