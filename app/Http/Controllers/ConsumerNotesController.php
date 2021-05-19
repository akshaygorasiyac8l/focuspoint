<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\ConsumerNoteType;
use DataTables;

class ConsumerNotesController extends Controller
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
        return view('consumernote/consumer-notes-listing');
    }
    public function addConsumerNote()
    {
        return view('consumernote/consumer-notes-add');
    }
    public function consumerNoteDetail()
    {
        return view('consumernote/consumer-notes-details');
    }


    public function consumerNoteType()
    {
        $data = array();        
        $data['consumer_note_types'] = DB::table('consumer_note_types')->get();        
        return view('consumer_note_type/consumer-note-type-listing',$data);
    }
    public function getConsumerNoteTypes()
    {
        
        if(request()->ajax()) {
            $datas = DB::table('consumer_note_types')->get();
           
            
            return Datatables::of($datas)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" data="'.$row->id.'" class="deletedata" title="Delete"><i class="fa fa-trash-o action-icon"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)" data="'.$row->id.'" class="editdata" data-toggle="modal" data-target="#addForm" title="Edit"><i class="fa fa-edit action-icon"></i></a>';
                    return $actionBtn;
                })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('consumer_note_type/consumer-note-type-listing');
        
    }


    public function deleteConsumerNoteType(Request $request,$id)
    {
        
        
        $response = ConsumerNoteType::where('id', $id)->delete();
        if($response=='1'){
            return response()->json(['message' => 'Deleted Successfully!','class' => 'success']);
        }else{
            return response()->json(['message' => 'Something Wrong!','class' => 'danger']);
        }
        
        
    }
    


    public function consumerNoteTypeById(Request $request,$id)
    {
        
        $rolebyid = ConsumerNoteType::where('id', $id)->first();
        
        
        
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


    public function addConsumerNoteType(Request $request)
    {
        if($request->isMethod('post')){
            
            $title = $request->input('title');
            
            $response = DB::table('consumer_note_types')
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
    
    
    public function editConsumerNoteType(Request $request)
    {
        if($request->isMethod('post')){
            
            $title = $request->input('title');
            $id = $request->input('id');

            
            $response = DB::table('consumer_note_types')
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
