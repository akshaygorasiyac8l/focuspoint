<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Reaction;
use DataTables;

class ReactionController extends Controller
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
        $data['reactions'] = DB::table('reactions')->get();        
        return view('reaction/reaction-listing',$data);
    }
    public function getReactions()
    {
        
        if(request()->ajax()) {
            $datas = DB::table('reactions')->get();
           
            
            return Datatables::of($datas)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" data="'.$row->id.'" class="deletedata" title="Delete"><i class="fa fa-trash-o action-icon"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)" data="'.$row->id.'" class="editdata" data-toggle="modal" data-target="#addForm" title="Edit"><i class="fa fa-edit action-icon"></i></a>';
                    return $actionBtn;
                })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('reaction/reaction-listing');
        
    }


    public function deleteReaction(Request $request,$id)
    {
        
        
        $response = Reaction::where('id', $id)->delete();
        if($response=='1'){
            return response()->json(['message' => 'Deleted Successfully!','class' => 'success']);
        }else{
            return response()->json(['message' => 'Something Wrong!','class' => 'danger']);
        }
        
        
    }
    


    public function reactionById(Request $request,$id)
    {
        
        $rolebyid = Reaction::where('id', $id)->first();
        
        
        
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


    public function addReaction(Request $request)
    {
        if($request->isMethod('post')){
            
            $title = $request->input('title');
            
            $response = DB::table('reactions')
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
    
    
    public function editReaction(Request $request)
    {
        if($request->isMethod('post')){
            
            $title = $request->input('title');
            $id = $request->input('id');

            
            $response = DB::table('reactions')
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
