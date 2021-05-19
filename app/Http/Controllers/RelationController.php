<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Support\Facades\Auth;
use DB;

class RelationController extends Controller
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
        $data['relations'] = DB::table('relations')->get();        
        return view('relation/relation-listing',$data);
    }
    public function addRelation(Request $request)
    {
        if($request->isMethod('post')){
            
            
            
            //dd($request);
            $title = $request->input('title');
            
            
            DB::table('relations')
            ->insert([
                'title' => $title,
                
            ]);
            
            return redirect('/relations');

        }else{
            return view('relation/relation-add');
        }
        
    }
    
    public function editRelation(Request $request,$id)
    {
        if($request->isMethod('post')){
            
            
            

            $title = $request->input('title');
            
            DB::table('relations')
            ->where('id', $id)
            ->update([
                'title' => $title,
                
            ]);
            
            return redirect('/relations');

        }else{
            $data = array();
            $data['relation'] = DB::table('relations')->where('id', $id)->first();
            return view('relation/relation-edit',$data);
        }
        
    }
    
    
    public function relationDetail(Request $request,$id)
    {
        return view('relation/relation-details');
    }
    
    
    
}
