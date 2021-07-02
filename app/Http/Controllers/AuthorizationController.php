<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use DataTables;
use Illuminate\Support\Facades\Mail;
use PDF;
use Illuminate\Support\Facades\File; 

class AuthorizationController extends Controller
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
        return view('authorization/authorizations-listing');
    }
    
    
    public function changeDateformate($date){
        $a = explode("-",$date);
        $b = $a[2].'-'.$a[0].'-'.$a[1];
        return $b;
    }
    

    public function getauthorizations()
    {
        
        if(request()->ajax()) {
            $datas = DB::table('authorizations')->get();
            
            $dataarray =  array();
            $i=0;
            
            foreach($datas as $data){
                $status = '';
                if($data->status=='0'){
                    $status = 'Open';
                }else if($data->status=='1'){
                    $status = 'Fixed';
                }else if($data->status=='2'){
                    $status = 'Completed';
                }else if($data->status=='3'){
                    $status = 'In-Progress';
                }else{
                    $status = '-';
                }
                
                $consumer = DB::table('consumers')->where('id',$data->consumer_id)->first();
                $name = $consumer->fname.' '.$consumer->lname;
                
                
                $dataarray[$i]= (object) array(
                                    'id'=>$data->id,       
                                    'auth_no'=>$data->auth_no,
                                    'intan'=>$data->intan,
                                    'consumer'=>$name,
                                    'insan'=>$data->insan,
                                    'services'=>'services',
                                    'unit_per_week'=>$data->unit_per_week,
                                    'unit_per_day'=>$data->unit_per_day,
                                    'total_approved_units'=>$data->total_approved_units,
                                    'total_approved_hours'=>$data->total_approved_hours,
                                    'bill_without_unit'=>$data->bill_without_unit,
                                    'record_no'=>$data->record_no,
                                    'approve_date'=>$data->approve_date,
                                    'expiry_date'=>$data->expiry_date,
                                    'status'=>$data->status,
                                    'assignee'=>$data->assignee,
                                    'spend_time'=>$data->spend_time,
                                    'discharge_date'=>$data->discharge_date,
                                    'created_date'=>$data->created_date,
                                    'status'=>$status,
                                    );

                
                $i++;
            }
            
            $collection = collect($dataarray);
            
           
            
            return Datatables::of($collection)
            ->addColumn('auth_no', function($row){
                    $actionBtn = '<a href="authorizations-edit/'.$row->id.'" data="'.$row->id.'" class="editdata" >'.$row->auth_no.'</a>';
                    return $actionBtn;
                })
            ->addColumn('chkbox', function($row){
                    $actionBtn = '<input value="'.$row->id.'"  name="empids" type="checkbox" class="add-new-icon" />';
                    return $actionBtn;
                })
            ->rawColumns(['auth_no','chkbox'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('authorization/authorizations-listing');
        
    }
    
    
    public function deleteAuthorizations(Request $request)
    {
        
        if($request->isMethod('post')){
            //dd($request->delids_array);
            $delids_arrays = $request->delids_array;
            $total_array = sizeof($delids_arrays);
            
            for($i=0;$i<$total_array;$i++){

                

                $fileid = $delids_arrays[$i]['id'];
                DB::table('authorizations')->where('id', $fileid)->delete();
                
                
                
            }
            return response()->json(['message' => 'Deleted Successfully!','class' => 'success']);
        }
    }
    
    
    public function addAuthorization(Request $request)
    {
        if($request->isMethod('post')){
            $d = json_decode($request->options);
            //dd($d);
            $consumername = $d->consumername;
            $authno = $d->authno;
            $intan = $d->intan;
            $insan = $d->insan;
            $service = $d->service;
            $per_week = $d->per_week;
            $per_day = $d->per_day;
            $tot_units = $d->tot_units;
            $tot_hours = $d->tot_hours;
            $bill_units = $d->bill_units;
            $record_no = $d->record_no;
            $approval_date = $this->changeDateformate($d->approval_date);
            $expiry_date = $this->changeDateformate($d->expiry_date);
            $status = $d->status;
            $assignee = $d->assignee;
            $spent_time = $d->spent_time;
            $discharge_date = $this->changeDateformate($d->discharge_date);  
            
            $date = date('Y-m-d');
           
            $id = DB::table('authorizations')
            ->insertGetId([
                'consumer_id' => $consumername,
                'auth_no' => $authno,
                'intan' => $intan,
                'insan' => $insan,
                'services' => $service,
                'unit_per_week' => $per_week,
                'unit_per_day' => $per_day,
                'total_approved_units' => $tot_units,
                'total_approved_hours' => $tot_hours,
                'bill_without_unit' => $bill_units,                
                'record_no' => $record_no,
                'approve_date' => $approval_date,
                'expiry_date' => $expiry_date,
                'status' => $status,
                'assignee' => $assignee,
                'spend_time' => $spent_time,
                'discharge_date' => $discharge_date,
                'created_date' => $date,

            ]);
            
            if($id){
              return response()->json(['message' => 'Added Successfully!','class' => 'success']);
            }else{
                return response()->json(['message' => 'Something Wrong!','class' => 'danger']);
            }
            
            
        }else{
            $data = array();        
            
            $data['consumers'] = DB::table('consumers')->get();
            $data['services'] = DB::table('services')->get();
            $data['users'] = DB::table('users')->where('role_id','!=',0)->get();
            return view('authorization/authorizations-add',$data);
        }
        
    }
    
    public function editAuthorization(Request $request,$id)
    {
        if($request->isMethod('post')){
            $d = json_decode($request->options);
            //dd($d);
            $consumername = $d->consumername;
            $authno = $d->authno;
            $intan = $d->intan;
            $insan = $d->insan;
            $service = $d->service;
            $per_week = $d->per_week;
            $per_day = $d->per_day;
            $tot_units = $d->tot_units;
            $tot_hours = $d->tot_hours;
            $bill_units = $d->bill_units;
            $record_no = $d->record_no;
            $approval_date = $this->changeDateformate($d->approval_date);
            $expiry_date = $this->changeDateformate($d->expiry_date);
            $status = $d->status;
            $assignee = $d->assignee;
            $spent_time = $d->spent_time;
            $discharge_date = $this->changeDateformate($d->discharge_date);  
            
            $date = date('Y-m-d');
           
            $id = DB::table('authorizations')
            ->where("id",$id)
            ->update([
                'consumer_id' => $consumername,
                'auth_no' => $authno,
                'intan' => $intan,
                'insan' => $insan,
                'services' => $service,
                'unit_per_week' => $per_week,
                'unit_per_day' => $per_day,
                'total_approved_units' => $tot_units,
                'total_approved_hours' => $tot_hours,
                'bill_without_unit' => $bill_units,                
                'record_no' => $record_no,
                'approve_date' => $approval_date,
                'expiry_date' => $expiry_date,
                'status' => $status,
                'assignee' => $assignee,
                'spend_time' => $spent_time,
                'discharge_date' => $discharge_date,
                'created_date' => $date,

            ]);
            
            if($id){
              return response()->json(['message' => 'Added Successfully!','class' => 'success']);
            }else{
                return response()->json(['message' => 'Something Wrong!','class' => 'danger']);
            }
            
            
        }else{
            $data = array();        
            
            $data['consumers'] = DB::table('consumers')->get();
            $data['services'] = DB::table('services')->get();
            $data['users'] = DB::table('users')->where('role_id','!=',0)->get();
            $authorization = DB::table('authorizations')->where("id",$id)->first();
            $authorization->approve_date = date("m-d-Y",strtotime($authorization->approve_date));
            $authorization->expiry_date = date("m-d-Y",strtotime($authorization->expiry_date));
            $authorization->discharge_date = date("m-d-Y",strtotime($authorization->discharge_date));

            $data['authorization']  = $authorization;
            return view('authorization/authorizations-edit',$data);
        }
        
    }
    
    
    public function authorizationDetail()
    {
        return view('authorization/authorizations-details');
    }
    public function pdfauthorizationAll(Request $request)
    {
    
        $data = array();
        if($request->isMethod('post')){
            $print_array = $request->print_array;
            $total_array = sizeof($print_array);
            $userData = array();
            for($i=0;$i<$total_array;$i++){
                
                
                $fileid = $print_array[$i]['id'];
                $authorization = DB::table('authorizations')->where('id', $fileid)->first();
                if($authorization){
      
                    $data['authorizations'][$i] = array(
                            'consumer_id' =>$authorization->consumer_id,
                            'auth_no' =>$authorization->auth_no,
                            'services' =>$authorization->services,
                            'approve_date' =>$authorization->approve_date,
                            'expiry_date' =>$authorization->expiry_date ,
                            'record_no' =>$authorization->record_no,
                            'status' =>$authorization->status,
                        );
                }
                
                
                
            }
            
            
            $pdf = PDF::loadView('pdfs/authorizationall', $data);

            $pdf->save('public/downloads/authorizationall.pdf');

            return response()->json(['success' => 1]);
        }
    }
    
}
