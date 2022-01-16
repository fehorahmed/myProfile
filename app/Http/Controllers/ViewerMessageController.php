<?php

namespace App\Http\Controllers;

use App\Models\ViewerMessage;
use Illuminate\Http\Request;

class ViewerMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']= ViewerMessage::all();
        return view('backend.viewermessage.viewer_message',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name'=>'required|max:40',
            'email'=>'required|email|max:60',
            'subject'=>'required|max:60',
            'message'=>'required|max:300',
        ]);

        $name= $request->post('name');
        $email= $request->post('email');
        $subject= $request->post('subject');
        $message= $request->post('message');

        $model= new ViewerMessage();
        $model->name=$name;
        $model->email=$email;
        $model->subject=$subject;
        $model->message=$message;
        $model->status=0;
        $model->save();

        return redirect()->back()->with("message","Thanks for your Message");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ViewerMessage  $viewerMessage
     * @return \Illuminate\Http\Response
     */
    public function show(ViewerMessage $viewerMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ViewerMessage  $viewerMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(ViewerMessage $viewerMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ViewerMessage  $viewerMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ViewerMessage $viewerMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ViewerMessage  $viewerMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ViewerMessage::destroy($id);
        return redirect()->back()->with('message', 'Successfully Message Deleted.');
    }
}
