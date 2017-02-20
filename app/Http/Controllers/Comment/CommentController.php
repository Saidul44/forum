<?php

namespace App\Http\Controllers\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment\Comment;
use App\Models\Thread\Thread;
use App\Models\Topic\Topic;
use Auth;
use User;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, Comment $comment)
    {
        $this->validate($request, [
                'comment' => 'required',
                'thread_id' => 'required'
            ]);

        $request['user_id'] = Auth::id();

        $comment = $comment->create($request->all());

        $comment->user_info = Auth::user();

        return response()->json(['error' => false, 'data' => $comment]);

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

    public function load_reply(Request $request) {
        $this->validate($request, [
                'comment_id' => 'required',
                'thread_id' => 'required',
            ]);
        
        $reply_comments = Comment::where('thread_id', $request->thread_id)->where('comment_id', $request->comment_id)->get();

        return response()->json(['error' => false, 'data' => $reply_comments]);
    }
}
