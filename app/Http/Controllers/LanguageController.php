<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Language;
use DataTables;

class LanguageController extends Controller
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
        $data['languages'] = DB::table('languages')->get();        
        return view('language/language-listing',$data);
    }
    
    public function getLanguages()
    {
        
        if(request()->ajax()) {
            $datas = DB::table('languages')->get();
           
            
            return Datatables::of($datas)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" data="'.$row->id.'" class="deletedata" title="Delete"><i class="fa fa-trash-o action-icon"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)" data="'.$row->id.'" class="editdata" data-toggle="modal" data-target="#addForm" title="Edit"><i class="fa fa-edit action-icon"></i></a>';
                    return $actionBtn;
                })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('language/language-listing');
        
    }


    public function deleteLanguage(Request $request,$id)
    {
        
        
        $response = Language::where('id', $id)->delete();
        if($response=='1'){
            return response()->json(['message' => 'Deleted Successfully!','class' => 'success']);
        }else{
            return response()->json(['message' => 'Something Wrong!','class' => 'danger']);
        }
        
        
    }
    


    public function languageById(Request $request,$id)
    {
        
        $rolebyid = Language::where('id', $id)->first();
        
        
        
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


    public function addLanguage(Request $request)
    {
        if($request->isMethod('post')){
            
            $title = $request->input('title');
            
            $response = DB::table('languages')
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
    
    
    public function editLanguage(Request $request)
    {
        if($request->isMethod('post')){
            
            $title = $request->input('title');
            $id = $request->input('id');

            
            $response = DB::table('languages')
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
