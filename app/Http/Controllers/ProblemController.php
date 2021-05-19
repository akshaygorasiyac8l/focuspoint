<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Support\Facades\Auth;
use DB;

class ProblemController extends Controller
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

    use DispatchesJobs, ValidatesRequests;

    /**
     * {@inheritdoc}
     */
    protected function formatValidationErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
    
    
    public function index()
    {
        $data = array();        
        $data['problems'] = DB::table('problems')->get();        
        return view('problem/problem-listing',$data);
    }
    public function addProblem(Request $request)
    {
        if($request->isMethod('post')){
            
            
            
            //dd($request);
            $title = $request->input('title');
            
            
            DB::table('problems')
            ->insert([
                'title' => $title,
                
            ]);
            
            return redirect('/problems');

        }else{
            return view('problem/problem-add');
        }
        
    }
    
    public function editProblem(Request $request,$id)
    {
        if($request->isMethod('post')){
            
            
            

            $title = $request->input('title');
            
            DB::table('problems')
            ->where('id', $id)
            ->update([
                'title' => $title,
                
            ]);
            
            return redirect('/problems');

        }else{
            $data = array();
            $data['problem'] = DB::table('problems')->where('id', $id)->first();
            return view('problem/problem-edit',$data);
        }
        
    }
    
    
    public function problemDetail(Request $request,$id)
    {
        return view('problem/problem-details');
    }
    
    
    
}
