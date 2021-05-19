<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('consumer/consumers-listing');
    }
    public function addConsumer()
    {
        return view('consumer/consumers-add');
    }
    public function consumerDetail()
    {
        return view('consumer/consumers-details');
    }
}
