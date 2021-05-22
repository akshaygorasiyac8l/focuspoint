<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\File; 

class GeneralController extends Controller
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
    
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile(Request $request)
    {
        
         $id = Auth::id();
        if($request->isMethod('post')){
            
            $this->validate($request, [
                'salution' => 'required',
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required',
                'country' => 'required',
                'time' => 'required',
            ]);
            
            //dd($request);
            $salution = $request->input('salution');
            $fname = $request->input('fname');
            $lname = $request->input('lname');
            $email = $request->input('email');
            $country = $request->input('country');
            $time = $request->input('time');
            DB::table('users')
            ->where('id', $id)
            ->update(['salution' => $salution,'fname' => $fname,'lname' => $lname,'email' => $email,'country' => $country,'time' => $time,]);
            
            return redirect('/profile');

        }else{
            //$users = DB::table('users')->where('email', strtolower($email))->where('password', md5($password))->get();
             
            
            $data = array();
            
            //echo $fname = Auth::user()->fname;
            $data['user'] = DB::table('users')->where('id', $id)->first();
            
            return view('profile',$data);
        }
    }
    
    public static function getRoleById($role_id)
    {
        $role = DB::table('roles')->where('id', $role_id)->first();
        return $role->role;
    }
    
    public static function deleteFile($fileid)
    {
        $file = DB::table('user_documents')->where('id', $fileid)->first();
        if($file){
            $path = public_path('files/'.$file->document);
            $isExists = file_exists($path);
            if($isExists){
                File::delete($path);
                DB::table('user_documents')->where('id', $fileid)->delete();
                return response()->json(['message' => 'Deleted Successfully!','class' => 'success']);
            }else{
                DB::table('user_documents')->where('id', $fileid)->delete();
                return response()->json(['message' => 'File Not Exist!','class' => 'success']);
            }
            
            
        }else{
            return response()->json(['message' => 'Something Wrong!','class' => 'danger']);
        }
    }
}
