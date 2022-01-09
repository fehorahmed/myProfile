<?php

namespace App\Http\Controllers;

use App\Models\experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $result['data'] = experience::all();
        return view('backend.experience.experience', $result);
    }


    public function create()
    {
        return view('backend.experience.experience_add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|max:120',
            'designation' => 'required|max:60',
            'address' => 'required|max:150',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',

        ]);

        $company_name = $request->post('company_name');
        $designation = $request->post('designation');
        $address = $request->post('address');
        $start_date = $request->post('start_date');
        $end_date = $request->post('end_date');

        $model = new experience();

        $model->company_name = $company_name;
        $model->designation = $designation;
        $model->address = $address;
        $model->start_date = $start_date;
        $model->end_date = $end_date;
        $model->status = 0;
        $model->save();

        return redirect()->route('admin.experience')->with('message', 'Successfully Experience Added.');
    }

    public function edit($id)
    {
        $result['data'] = experience::findOrFail($id);
        return view('backend.experience.experience_edit', $result);
    }


    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'company_name' => 'required|max:120',
            'designation' => 'required|max:60',
            'address' => 'required|max:150',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',

        ]);


        $id = $request->post('id');

        $company_name = $request->post('company_name');
        $designation = $request->post('designation');
        $address = $request->post('address');
        $start_date = $request->post('start_date');
        $end_date = $request->post('end_date');

        $model = experience::find($id);
        $model->company_name = $company_name;
        $model->designation = $designation;
        $model->address = $address;
        $model->start_date = $start_date;
        $model->end_date = $end_date;
        $model->status = 0;
        $model->update();

        return redirect()->route('admin.experience')->with('message', 'Successfully Experience Updated.');
    }


    public function destroy($id)
    {

        experience::destroy($id);
        return redirect()->back()->with('message', 'Successfully Experience Deleted.');
    }



    public function active($id)
    {

       // experience::query()->update(['status' => 0]);
        $model = experience::find($id);
        $model->status = 1;
        $model->update();

        return redirect()->back()->with("message", "Status Updated..");


    }
}
