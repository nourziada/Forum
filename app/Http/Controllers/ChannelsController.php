<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;
use Session;

class ChannelsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $channels = Channel::all();

        return view('channels.index', compact('channels'));
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

        $this->validate($request,[
            'name' => 'required',
        ],[
            'name.required' => 'حقل اسم القسم مطلوب',
        ]);

        $cahnnel = new Channel;

        $cahnnel->title = $request->name;
        $cahnnel->save();

        Session::flash('success','تم إضافة القسم بنجاح');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $channel = Channel::find($id);

        return view('channels.edit' , compact('channel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' => 'required',
        ],[
            'name.required' => 'حقل اسم القسم مطلوب',
        ]);

        $channel = Channel::find($id);

        $channel->title = $request->name;
        $channel->save();

        Session::flash('success','تم تعديل القسم بنجاح');

        return redirect()->route('channel.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Channel::find($id)->delete();
        Session::flash('success','تم حذف القسم بنجاح');

        return redirect()->route('channel.index');

    }
}
