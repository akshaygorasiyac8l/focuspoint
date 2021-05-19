<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorizationController extends Controller
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
        return view('authorization/authorizations-listing');
    }
    public function addAuthorization()
    {
        return view('authorization/authorizations-add');
    }
    public function authorizationDetail()
    {
        return view('authorization/authorizations-details');
    }
}
