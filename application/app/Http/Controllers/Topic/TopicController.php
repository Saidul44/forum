<?php

namespace App\Http\Controllers\Topic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic\Topic;
use App\Models\Thread\Thread;
use Session;

class TopicController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::orderBy('created_at', 'asc')->get();
        return view('topics.home', get_defined_vars());
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
    public function store(Request $request, Topic $topic)
    {
        $this->validate($request, [
                'name' => 'required',
            ]);

        $topic = $topic->create($request->all());

        if($request->ajax()) {
            return response()->json($topic);
        } else {
            Session::flash('success_msg', 'Successfully added a new topic');
            return redirect('topic');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        $threads = Thread::where('topic_id', $topic->id)->get();
        $topics = Topic::all();

        $title = $topic->name;

        return view('landing', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        $topicInfo = $topic;
        $topics = Topic::orderBy('created_at', 'asc')->get();
        return view('topics.home', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $this->validate($request, [
                'name' => 'required',
            ]);

        $topic->update($request->all());

        Session::flash('success_msg', 'Successfully updated topic information.');
        return redirect('topic');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        if($topic) {
            $topic->delete();
            Session::flash('success_msg', 'Successfully deleted a topic');
        } else {
            Session::flash('error_msg', 'Topic not found.');
        }

        return redirect('topic');
    }
}
