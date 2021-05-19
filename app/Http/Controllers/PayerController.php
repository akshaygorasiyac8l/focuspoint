<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Support\Facades\Auth;
use DB;

class PayerController extends Controller
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
        $data['payers'] = DB::table('payers')->get();        
        return view('payer/payer-listing',$data);
    }
    public function addPayer(Request $request)
    {
        if($request->isMethod('post')){
            
            
            
            //dd($request);
            $title = $request->input('title');
            
            
            DB::table('payers')
            ->insert([
                'title' => $title,
                
            ]);
            
            return redirect('/payers');

        }else{
            return view('payer/payer-add');
        }
        
    }
    
    public function editPayer(Request $request,$id)
    {
        if($request->isMethod('post')){
            
            
            

            $title = $request->input('title');
            
            DB::table('payers')
            ->where('id', $id)
            ->update([
                'title' => $title,
                
            ]);
            
            return redirect('/payers');

        }else{
            $data = array();
            $data['payer'] = DB::table('payers')->where('id', $id)->first();
            return view('payer/payer-edit',$data);
        }
        
    }
    
    
    public function payerDetail(Request $request,$id)
    {
        return view('payer/payer-details');
    }
    
    
    public function payType()
    {
        $data = array();        
        $data['pay_types'] = DB::table('pay_types')->get();        
        return view('pay_type/pay-type-listing',$data);
        
    }
    public function addPayType(Request $request)
    {
        if($request->isMethod('post')){
            
            
            
            //dd($request);
            $title = $request->input('title');
            
            
            DB::table('pay_types')
            ->insert([
                'title' => $title,
                
            ]);
            
            return redirect('/pay-types');

        }else{
            return view('pay_type/pay-type-add');
        }
    }
    public function editPayType(Request $request,$id)
    {
        if($request->isMethod('post')){
            
            
            

            $title = $request->input('title');
            
            DB::table('pay_types')
            ->where('id', $id)
            ->update([
                'title' => $title,
                
            ]);
            
            return redirect('/pay-types');

        }else{
            $data = array();
            $data['pay_type'] = DB::table('pay_types')->where('id', $id)->first();
            return view('pay_type/pay-type-edit',$data);
        }
    }
    
    public function payTypeDetail(Request $request,$id)
    {
        return view('pay_type/pay-type-details');
    }
    
    
    
    
    
}
