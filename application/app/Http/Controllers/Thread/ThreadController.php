<?php

namespace App\Http\Controllers\Thread;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic\Topic;
use App\Models\Thread\Thread;
use App\Models\Comment\Comment;
use Session;
use Auth;

class ThreadController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['except' => 'thread_detail']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::orderBy('name', 'asc')->pluck('name', 'id');
        return view('threads.home', get_defined_vars());
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
    public function store(Request $request, Thread $thread)
    {
        $this->validate($request, [
                'topic' => 'required',
                'title' => 'required',
                'body' => 'required',
                'image' => 'required|image'
            ]);

        $topic = Topic::find($request->topic);
        if(! $topic) {
            Session::flash('error_msg', 'Topic not found.');
            return redirect('threads');
        }

        if($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = time().'.'.$extension;
            $destinationPath = 'upload/';
            $request->file('image')->move($destinationPath, $imageName);

            $request['photo'] = $imageName;
        }

        $request['topic_id'] = $topic->id;
        $request['user_id'] = Auth::id();

        $thread->create($request->all());

        Session::flash('success_msg', 'Successfully added a new thread.');
        return redirect('threads');

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
    public function edit(Thread $thread)
    {
        if(Auth::id() == $thread->user_id ) {
            
            $threadInfo = $thread;
            $topics = Topic::orderBy('name', 'asc')->pluck('name', 'id');
            
            return view('threads.home', get_defined_vars());
            
        } else {
            Session::flash('error_msg', 'You are not able to edit this thread.');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        $this->validate($request, [
                'topic' => 'required',
                'title' => 'required',
                'body' => 'required',
                'image' => 'image'
            ]);

        $topic = Topic::find($request->topic);
        if(! $topic) {
            Session::flash('error_msg', 'Topic not found.');
            return redirect('threads');
        }

        if($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = time().'.'.$extension;
            $destinationPath = 'upload/';
            $request->file('image')->move($destinationPath, $imageName);

            $request['photo'] = $imageName;
        }

        $request['topic_id'] = $topic->id;
        // $request['user_id'] = Auth::id();

        $thread->update($request->all());

        Session::flash('success_msg', 'Successfully updated thread information.');
        return redirect('threads');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        if($thread) {
            if($thread->user_id == Auth::id()) {
                Comment::where('thread_id', $thread->id)->delete();

                $thread->delete();
                Session::flash('success_msg', 'Successfully deleted a thread.');
            } else {
                Session::flash('error_msg', 'You are not able to delete this thread.');
            }
        } else {
            Session::flash('error_msg', 'Thread not found.');
        }

        return redirect()->back();
    }

    public function thread_detail(Thread $thread) {

        if($thread) {
            $topics = Topic::all();
            $comments = Comment::where('comment_id', 0)->where('thread_id', $thread->id)->orderBy('created_at', 'desc')->get();

            return view('threads.detail', get_defined_vars());
        } else {
            Session::flash('error_msg', 'Thread not exist');
            return redirect()->back();
        }
    }
}
