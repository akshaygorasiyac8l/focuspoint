<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use DataTables;
use Illuminate\Support\Facades\Mail;
use PDF;
use Illuminate\Support\Facades\File; 
use Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $email = $request->email; 
            $password = $request->password;            
            $user = DB::table('users')->where('email',$email)->first();
            
            if($user){
				if($user->status=='1'){
					if(Hash::check($password ,$user->password)){
						Auth::loginUsingId($user->id, TRUE);
						//redirect('home');
						return response()->json(['message' => 'login Successfully!','class' => 'success']);
					}else{
						return response()->json(['message' => 'Please enter correct Details!','class' => 'error']);
					}
				}else if($user->status=='3'){
						return response()->json(['message' => 'User are Suspended!','class' => 'error']);
				}else{
						return response()->json(['message' => 'User are Inactive!','class' => 'error']);
				}
            }else{
                return response()->json(['message' => 'User not found!','class' => 'error']);
            }
            
            

            
        }
    }
    
    
}
