<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use App\Discussion;
use Auth;
use Session;
use App\Reply;
use App\Services\Slug;

class DiscussionsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $discussions = Discussion::orderBy('created_at','desc')->paginate(1);
        
        return view('home' ,compact('discussions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $channels = Channel::all();

        return view('discussions.create',compact('channels'));
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
                'title' => 'required',
                'channel_id' => 'required',
                'content' => 'required'
            ], [
                'title.required' => 'يجب أن يتوفر عنوان لموضوع النقاش',
                'content.required'=> 'يجب أن توفر محتوى للناقش'
            ]);

        $discuss = new Discussion;

        $discuss->title = $request->title;
        $discuss->content = $request->content;

        //invoking for default (e.g. \App\Post)
        $slugLibrary = new \App\Services\Slug();

        $discuss->slug = $slugLibrary->createSlug($request->title);



        $discuss->channel_id = $request->channel_id;
        $discuss->user_id = Auth::id();

        $discuss->save();

        Session::flash('success' , 'تم إنشاء النقاش بنجاح');

        return redirect()->back();



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $discussion = Discussion::where('slug' , $slug)->first();

        return view('discussions.show' ,compact('discussion') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function reply(Request $request,$id) {
        $this->validate($request,[
                'content' => 'required'
            ], [
                'content.required' => 'عذراً ! محتوى التعليق قصير جداً '
            ]);

        $reply = new Reply;
        $reply->content = $request->content;
        $reply->user_id = Auth::id();
        $reply->discussion_id = $id;
        $reply->save();

        Session::flash('success' ,'تمت إضافة التعليق بنجاح');
        return redirect()->back();

    }
}
