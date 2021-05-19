<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Support\Facades\Auth;
use DB;

class LocationController extends Controller
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
        $data['locations'] = DB::table('locations')->get();        
        return view('location/location-listing',$data);
    }
    public function addLocation(Request $request)
    {
        if($request->isMethod('post')){
            
            
            
            //dd($request);
            $title = $request->input('title');
            
            
            DB::table('locations')
            ->insert([
                'title' => $title,
                
            ]);
            
            return redirect('/locations');

        }else{
            return view('location/location-add');
        }
        
    }
    
    public function editLocation(Request $request,$id)
    {
        if($request->isMethod('post')){
            
            
            

            $title = $request->input('title');
            
            DB::table('locations')
            ->where('id', $id)
            ->update([
                'title' => $title,
                
            ]);
            
            return redirect('/locations');

        }else{
            $data = array();
            $data['location'] = DB::table('locations')->where('id', $id)->first();
            return view('location/location-edit',$data);
        }
        
    }
    
    
    public function locationDetail(Request $request,$id)
    {
        return view('location/location-details');
    }
    
    
    
}
