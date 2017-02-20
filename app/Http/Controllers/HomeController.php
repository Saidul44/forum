<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread\Thread;
use App\Models\Topic\Topic;

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

        return view('landing', get_defined_vars());
    }
}
