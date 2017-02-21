<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread\Thread;
use App\Models\Topic\Topic;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::all();
        $topics = Topic::all();
        $title = 'All Threads';

        return view('landing', get_defined_vars());
    }

    public function search(Request $request) {
        $this->validate($request, [
                'value' => 'required',
            ]);

        $search = $request->value;

        $threads = DB::table('threads')
                        ->where('title', 'like', '%' . $search . '%')
                        ->orWhere('body', 'like', '%' . $search . '%')
                        ->join('users', 'threads.user_id', '=', 'users.id')
                        ->orWhere('name', 'like', '%' . $search . '%')
                        ->get();

        $title = 'Searched Threads';

        $topics = Topic::all(); 

        return view('landing', get_defined_vars()); 

    }
}
