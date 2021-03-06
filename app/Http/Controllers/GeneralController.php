<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Support\Facades\Auth;
use DB;
use Hash;
use Illuminate\Support\Facades\File; 
use App\Models\User;

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
            ]);
            
			//dd(Hash::make('admim123'));
			

			
			
			$user = User::find($id);
			$user->salutation = $request->input('salution');
			$user->fname = $request->input('fname');
			$user->lname = $request->input('lname');
			if($request->input('password')!=''){
				$user->password = Hash::make($request->input('password'));
			}
			$user->save();
				
			/*
            //dd($request);
            $salution = $request->input('salution');
            $fname = $request->input('fname');
            $lname = $request->input('lname');
			if($request->input('password')!=''){
				$password = Hash::make($request->input('password'));
				DB::table('users')
				->where('id', $id)
				->update(['salutation' => $salution,'fname' => $fname,'lname' => $lname,'password' => $password]);
			}else{
				DB::table('users')
				->where('id', $id)
				->update(['salutation' => $salution,'fname' => $fname,'lname' => $lname]);
			}
			*/
            
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
