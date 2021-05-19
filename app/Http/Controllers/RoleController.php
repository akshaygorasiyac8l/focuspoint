<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Role;
use DataTables;

class RoleController extends Controller
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
        $data['roles'] = DB::table('roles')->get();        
        return view('role/role-listing',$data);
    }
    
    public function getRoles()
    {
        
        if(request()->ajax()) {
            $datas = DB::table('roles')->get();
 
            $dataarray =  array();
            $i=0;
            
            foreach($datas as $data){
                $status = '';
                if($data->status=='0'){
                    $status = 'Disable';
                }else{
                    $status = 'Enable';
                }
               
                $dataarray[$i]= (object) array(
                                    'id'=>$data->id,
                                    'role'=>$data->role,
                                    'status'=>$status,
                                    );

                
                $i++;
            }
            
            $collection = collect($dataarray);
            
            
            return Datatables::of($collection)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" data="'.$row->id.'" class="deletedata" title="Delete"><i class="fa fa-trash-o action-icon"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)" data="'.$row->id.'" class="editdata" data-toggle="modal" data-target="#addForm" title="Edit"><i class="fa fa-edit action-icon"></i></a>';
                    return $actionBtn;
                })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('role/role-type-listing');
        
    }


    public function deleteRole(Request $request,$id)
    {
        
        $response = Role::where('id', $id)->delete();
        if($response=='1'){
            return response()->json(['message' => 'Deleted Successfully!','class' => 'success']);
        }else{
            return response()->json(['message' => 'Something Wrong!','class' => 'danger']);
        }
        
        
    }
    


    public function roleById(Request $request,$id)
    {
        
        $rolebyid = Role::where('id', $id)->first();
        
        
        
        if($rolebyid){
            //dd($rolebyid);
            $data = array();
            $data['id'] = $rolebyid->id;
            $data['role'] = $rolebyid->role;
            $data['status'] = $rolebyid->status;
            $data['permissions'] = unserialize($rolebyid->permissions);
            return response()->json(['data' => $data]);
        }else{
            return response()->json(['data' => '0']);
        }
        
        
    }


    public function addRole(Request $request)
    {
        if($request->isMethod('post')){
            
            $title = $request->input('title');
            $status = $request->input('status');
            
            $role_array = $request->input('role_array');
            if(!$role_array){
                $role_array_final = array();
            }else{
                $role_array_final = array();
                foreach($role_array as $k=>$v){
                    $role_array_final['role'][$k] = $v;
                }
            }
                
            $notation_type_array = $request->input('notation_type_array');
            if(!$notation_type_array){
                $notation_type_array_final = array();
            }else{
                $notation_type_array_final = array();
                foreach($notation_type_array as $k=>$v){
                    $notation_type_array_final['notation_type'][$k] = $v;
                }
            }
            $certificate_type_array = $request->input('certificate_type_array');
            if(!$certificate_type_array){
                $certificate_type_array_final = array();
            }else{
                $certificate_type_array_final = array();
                foreach($certificate_type_array as $k=>$v){
                    $certificate_type_array_final['certificate_type'][$k] = $v;
                }
            }
            $permissions =array_merge($role_array_final,$notation_type_array_final,$certificate_type_array_final);
            //dd(serialize($permissions));
            
            $response = DB::table('roles')
                            ->insert([
                                'role' => $title,
                                'status' => $status,
                                'permissions' => serialize($permissions),
                                
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
    
    
    public function editRole(Request $request)
    {
        if($request->isMethod('post')){
            
            $title = $request->input('title');
            $id = $request->input('id');
            $status = $request->input('status');
                        $role_array = $request->input('role_array');
            if(!$role_array){
                $role_array_final = array();
            }else{
                $role_array_final = array();
                foreach($role_array as $k=>$v){
                    $role_array_final['role'][$k] = $v;
                }
            }
                
            $notation_type_array = $request->input('notation_type_array');
            if(!$notation_type_array){
                $notation_type_array_final = array();
            }else{
                $notation_type_array_final = array();
                foreach($notation_type_array as $k=>$v){
                    $notation_type_array_final['notation_type'][$k] = $v;
                }
            }
            $certificate_type_array = $request->input('certificate_type_array');
            if(!$certificate_type_array){
                $certificate_type_array_final = array();
            }else{
                $certificate_type_array_final = array();
                foreach($certificate_type_array as $k=>$v){
                    $certificate_type_array_final['certificate_type'][$k] = $v;
                }
            }
            $permissions =array_merge($role_array_final,$notation_type_array_final,$certificate_type_array_final);
            
            
            $response = DB::table('roles')
                            ->where('id',$id)
                            ->update([
                                'role' => $title,
                                'status' => $status,
                                'permissions' => serialize($permissions),
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
