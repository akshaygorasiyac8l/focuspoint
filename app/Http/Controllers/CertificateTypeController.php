<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\CertificateType;
use DataTables;

class CertificateTypeController extends Controller
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
        $data['certfication_types'] = DB::table('certfication_types')->get();        
        return view('certificate/certificate-type-listing',$data);
    }
    public function getCertificateTypes()
    {
        
        if(request()->ajax()) {
            $data = DB::table('certfication_types')->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" data="'.$row->id.'" class="deletedata" title="Delete"><i class="fa fa-trash-o action-icon"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)" data="'.$row->id.'" class="editdata" data-toggle="modal" data-target="#addForm" title="Edit"><i class="fa fa-edit action-icon"></i></a>';
                    return $actionBtn;
                })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('certificate/certificate-type-listing');
        
    }


    public function deleteCertificateType(Request $request,$id)
    {
        
        $response = CertificateType::where('id', $id)->delete();
        if($response=='1'){
            return response()->json(['message' => 'Deleted Successfully!','class' => 'success']);
        }else{
            return response()->json(['message' => 'Something Wrong!','class' => 'danger']);
        }
        
        
    }
    


    public function certificateTypeById(Request $request,$id)
    {
        
        $certificatetypebyid = CertificateType::where('id', $id)->first();
        
        
        if($certificatetypebyid){
            return response()->json(['data' => $certificatetypebyid]);
        }else{
            return response()->json(['data' => '0']);
        }
        
        
    }


    public function addCertificateType(Request $request)
    {
        if($request->isMethod('post')){
            
            $title = $request->input('title');
            
            $response = DB::table('certfication_types')
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
    
    
    public function editCertificateType(Request $request)
    {
        if($request->isMethod('post')){
            
            $title = $request->input('title');
            $id = $request->input('id');
            
            $response = DB::table('certfication_types')
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
