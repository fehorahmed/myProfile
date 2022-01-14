<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $result['data'] = SocialLink::all();
        return view('backend.link.link', $result);
    }


    public function create()
    {
        return view('backend.link.link_add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'link' => 'required|max:60',

        ]);

        $name = $request->post('name');
        $link = $request->post('link');


        $model = new SocialLink();

        $model->name = $name;
        $model->link = $link;

        $model->status = 0;
        $model->save();

        return redirect()->route('admin.link')->with('message', 'Successfully Link Added.');
    }

    public function edit($id)
    {
        $result['data'] = SocialLink::findOrFail($id);
        return view('backend.link.link_edit', $result);
    }


    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'name' => 'required|max:30',
            'link' => 'required|max:60',

        ]);


        $id = $request->post('id');

        $name = $request->post('name');
        $link = $request->post('link');

        $model = SocialLink::find($id);
        $model->name = $name;
        $model->link = $link;
        $model->status = 0;
        $model->update();

        return redirect()->route('admin.link')->with('message', 'Successfully Link Updated.');
    }


    public function destroy($id)
    {

        SocialLink::destroy($id);
        return redirect()->back()->with('message', 'Successfully Link Deleted.');
    }



    public function active($id)
    {

       // experience::query()->update(['status' => 0]);
        $model = SocialLink::find($id);
        $model->status = 1;
        $model->update();

        return redirect()->back()->with("message", "Status Updated..");


    }
}
