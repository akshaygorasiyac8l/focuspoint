<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Support\Facades\Auth;
use DB;

class RouteController extends Controller
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
        $data['routes'] = DB::table('routes')->get();        
        return view('route/route-listing',$data);
    }
    public function addRoute(Request $request)
    {
        if($request->isMethod('post')){
            
            
            
            //dd($request);
            $title = $request->input('title');
            
            
            DB::table('routes')
            ->insert([
                'title' => $title,
                
            ]);
            
            return redirect('/route-listing');

        }else{
            return view('route/route-add');
        }
        
    }
    
    public function editRoute(Request $request,$id)
    {
        if($request->isMethod('post')){
            
            
            

            $title = $request->input('title');
            
            DB::table('routes')
            ->where('id', $id)
            ->update([
                'title' => $title,
                
            ]);
            
            return redirect('/route-listing');

        }else{
            $data = array();
            $data['route'] = DB::table('routes')->where('id', $id)->first();
            return view('route/route-edit',$data);
        }
        
    }
    
    
    public function routeDetail(Request $request,$id)
    {
        return view('route/route-details');
    }
    
    
    
}
