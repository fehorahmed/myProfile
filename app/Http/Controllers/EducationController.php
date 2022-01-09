<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $result['data'] = Education::all();
        return view('backend.education.education', $result);
    }


    public function create()
    {
        return view('backend.education.education_add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'exam' => 'required|max:70',
            'college' => 'required|max:60',
            'result' => 'required|max:50',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',

        ]);

        $exam = $request->post('exam');
        $college = $request->post('college');
        $result = $request->post('result');
        $start_date = $request->post('start_date');
        $end_date = $request->post('end_date');

        $model = new Education();

        $model->exam = $exam;
        $model->college = $college;
        $model->result = $result;
        $model->start_date = $start_date;
        $model->end_date = $end_date;
        $model->status = 0;
        $model->save();

        return redirect()->route('admin.education')->with('message', 'Successfully Education Added.');
    }

    public function edit($id)
    {
        $result['data'] = Education::findOrFail($id);
        return view('backend.education.education_edit', $result);
    }


    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'exam' => 'required|max:70',
            'college' => 'required|max:60',
            'result' => 'required|max:50',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',


        ]);


        $id = $request->post('id');

        $exam = $request->post('exam');
        $college = $request->post('college');
        $result = $request->post('result');
        $start_date = $request->post('start_date');
        $end_date = $request->post('end_date');

        $model = Education::find($id);
        $model->exam = $exam;
        $model->college = $college;
        $model->result = $result;
        $model->start_date = $start_date;
        $model->end_date = $end_date;
        $model->status = 0;
        $model->update();

        return redirect()->route('admin.education')->with('message', 'Successfully Education Updated.');
    }


    public function destroy($id)
    {

        Education::destroy($id);
        return redirect()->back()->with('message', 'Successfully Education Deleted.');
    }



    public function active($id)
    {

       // experience::query()->update(['status' => 0]);
        $model = Education::find($id);
        $model->status = 1;
        $model->update();

        return redirect()->back()->with("message", "Status Updated..");


    }
}
