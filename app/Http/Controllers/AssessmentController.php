<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AssessmentController extends Controller
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
        return view('assessment/assessments-listing');
    }
    public function addAssessment()
    {
        return view('assessment/assessments-add');
    }
    public function assessmentDetail()
    {
        return view('assessment/assessments-details');
    }
    
    public function assessmentType()
    {
        $data = array();        
        $data['assessment_types'] = DB::table('assessment_types')->get();        
        return view('assessment_type/assessment-type-listing',$data);
        
    }
    public function addAssessmentType(Request $request)
    {
        if($request->isMethod('post')){
            
            
            
            //dd($request);
            $title = $request->input('title');
            
            
            DB::table('assessment_types')
            ->insert([
                'title' => $title,
                
            ]);
            
            return redirect('/assessment-types');

        }else{
            return view('assessment_type/assessment-type-add');
        }
    }
    public function editAssessmentType(Request $request,$id)
    {
        if($request->isMethod('post')){
            
            
            

            $title = $request->input('title');
            
            DB::table('assessment_types')
            ->where('id', $id)
            ->update([
                'title' => $title,
                
            ]);
            
            return redirect('/assessment-types');

        }else{
            $data = array();
            $data['assessment_type'] = DB::table('assessment_types')->where('id', $id)->first();
            return view('assessment_type/assessment-type-edit',$data);
        }
    }
    
    public function assessmentTypeDetail(Request $request,$id)
    {
        return view('assessment_type/assessment-type-details');
    }
    
    
}
