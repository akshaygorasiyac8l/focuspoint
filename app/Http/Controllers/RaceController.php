<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Race;
use DataTables;

class RaceController extends Controller
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
        $data['races'] = DB::table('races')->get();        
        return view('race/race-listing',$data);
    }
    
    
    public function getRaces()
    {
        
        if(request()->ajax()) {
            $datas = DB::table('races')->get();
           
            
            return Datatables::of($datas)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" data="'.$row->id.'" class="deletedata" title="Delete"><i class="fa fa-trash-o action-icon"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)" data="'.$row->id.'" class="editdata" data-toggle="modal" data-target="#addForm" title="Edit"><i class="fa fa-edit action-icon"></i></a>';
                    return $actionBtn;
                })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('race/race-listing');
        
    }


    public function deleteRace(Request $request,$id)
    {
        
        
        $response = Race::where('id', $id)->delete();
        if($response=='1'){
            return response()->json(['message' => 'Deleted Successfully!','class' => 'success']);
        }else{
            return response()->json(['message' => 'Something Wrong!','class' => 'danger']);
        }
        
        
    }
    


    public function raceById(Request $request,$id)
    {
        
        $rolebyid = Race::where('id', $id)->first();
        
        
        
        if($rolebyid){
            //dd($rolebyid);
            $data = array();
            $data['id'] = $rolebyid->id;
            $data['title'] = $rolebyid->title;
            return response()->json(['data' => $data]);
        }else{
            return response()->json(['data' => '0']);
        }
        
        
    }


    public function addRace(Request $request)
    {
        if($request->isMethod('post')){
            
            $title = $request->input('title');
            
            $response = DB::table('races')
                            ->insert([
                                'title' => $title,
                               
                                
                            ]);
            
                            
                            
                            
            if($response=='1'){
                return response()->json(['message' => 'Added Successfully!','class' => 'success']);
            }else{
                return response()->json(['message' => 'Something Wrong!','class' => 'danger']);
            }
        }else{
            return response()->json(['message' => 'Critical Error!','class' => 'danger']);
        }
            
    }
    
    
    public function editRace(Request $request)
    {
        if($request->isMethod('post')){
            
            $title = $request->input('title');
            $id = $request->input('id');

            
            $response = DB::table('races')
                            ->where('id',$id)
                            ->update([
                                'title' => $title,
                                
                            ]);
            
            if($response=='1'){
                return response()->json(['message' => 'Updated Successfully!','class' => 'success']);
            }else{
                return response()->json(['message' => 'Something Wrong!','class' => 'danger']);
            }
        }else{
            return response()->json(['message' => 'Critical Error!','class' => 'danger']);
        }
            
    }
    
    
    
}
