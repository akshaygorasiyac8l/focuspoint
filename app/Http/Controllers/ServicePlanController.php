<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicePlanController extends Controller
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
        return view('serviceplan/serviceplan-listing');
    }
    public function addServicePlan()
    {
        return view('serviceplan/serviceplan-add');
    }
    public function servicePlanDetail()
    {
        return view('serviceplan/serviceplan-details');
    }
}
