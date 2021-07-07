<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use DataTables;
use Illuminate\Support\Facades\Mail;
use PDF;
use Illuminate\Support\Facades\File; 
use DateTime;

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
                
                
                $payer_name = '-';
                $payer = DB::table('consumer_payers')->where('consumer_id',$data->consumer_id)->first();
                if($payer){
                    $payer_data = DB::table('payers')->where('id',$payer->payer_id)->first();
                    if($payer_data){
                        $payer_name = $payer_data->title;
                    }
                }
                
                $service_name = '-';
                $services = DB::table('services')->where('id',$data->services)->first();
                if($services){
                    $service_name = $services->title;
                }
                
                $spend_times = '0';
                $spend_times_h = 0;
                $spend_times_m = 0;
                $authorization_spend_times = DB::table('authorization_spend_times')->where('authorization_id',$data->id)->get();
                //dd($authorization_spend_times);
                if($authorization_spend_times){
                    
                    foreach($authorization_spend_times as $authorization_spend_time){
                        $datetime1 = new DateTime($authorization_spend_time->start_date_time);
                        $datetime2 = new DateTime($authorization_spend_time->end_date_time);

                        $difference = $datetime1->diff($datetime2);

                        //$spend_times_h  = $difference->format('%R%h %R%i');
                        $spend_times_h  += $difference->format('%h');
                        $spend_times_m  += $difference->format('%i');
                    }
                }
                
                
                $dataarray[$i]= (object) array(
                                    'id'=>$data->id,       
                                    'auth_no'=>$data->auth_no,
                                    'intan'=>$data->intan,
                                    'consumer'=>$name,
                                    'insan'=>$data->insan,
                                    'services'=>$service_name,
                                    'unit_per_week'=>$data->unit_per_week,
                                    'unit_per_day'=>$data->unit_per_day,
                                    'total_approved_units'=>$data->total_approved_units,
                                    'total_approved_hours'=>$data->total_approved_hours,
                                    'bill_without_unit'=>$data->bill_without_unit,
                                    'record_no'=>$data->record_no,
                                    'approve_date'=>date("m/d/Y",strtotime($data->approve_date)),
                                    'expiry_date'=>date("m/d/Y",strtotime($data->expiry_date)),
                                    'status'=>$data->status,
                                    'assignee'=>$data->assignee,
                                    'spend_times_h'=>$spend_times_h,
                                    'spend_times_m'=>$spend_times_m,
                                    'payer_name'=>$payer_name,
                                    'spend_time'=>$data->spend_time,
                                    'discharge_date'=>date("m/d/Y",strtotime($data->discharge_date)),
                                    'created_date'=>date("m/d/Y",strtotime($data->created_date)),
                                    'status'=>$status,
                                    );

                
                $i++;
            }
            
            $collection = collect($dataarray);
            
           
            
            return Datatables::of($collection)
            ->addColumn('auth_no', function($row){
                    $actionBtn = '<a href="authorizations-details/'.$row->id.'" data="'.$row->id.'" class="editdata" >'.$row->auth_no.'</a>';
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
            $authorization_data= DB::table('authorizations')->orderBy('id', 'DESC')->first();
            $data['authorization_id'] = $authorization_data->id +1;
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
            
            
            $authorization->spend_times_h = '0';
            $authorization->spend_times_m = '0';
            
            $authorization_spend_times = DB::table('authorization_spend_times')->where('authorization_id',$id)->get();
            //dd($authorization_spend_times);
            if($authorization_spend_times){
                
                foreach($authorization_spend_times as $authorization_spend_time){
                    $datetime1 = new DateTime($authorization_spend_time->start_date_time);
                    $datetime2 = new DateTime($authorization_spend_time->end_date_time);

                    $difference = $datetime1->diff($datetime2);

                    //$spend_times_h  = $difference->format('%R%h %R%i');
                    //$authorization->spend_times_h  += $difference->format('%h');
                    //$authorization->spend_times_m  += $difference->format('%i');
                    
                    //$authorization->spend_times_h  += (strtotime($authorization_spend_time->start_date_time) - time()) / 60;
                    $authorization->spend_times_m  += ((strtotime($authorization_spend_time->end_date_time) - time()) / 60) - ((strtotime($authorization_spend_time->start_date_time) - time()) / 60);
                }
            }
            //dd($authorization->spend_times_m);    

            $data['authorization']  = $authorization;
            return view('authorization/authorizations-edit',$data);
        }
        
    }
    
    
    public function authorizationDetail($id)
    {
        $authorization = DB::table('authorizations')->where("id",$id)->first();
        $consumer = DB::table('consumers')->where('id',$authorization->consumer_id)->first();
        $authorization->consumer_name = $consumer->fname.' '.$consumer->lname;
        
        $authorization->service_name = '-';
        $services = DB::table('services')->where('id',$authorization->services)->first();
        if($services){
            $authorization->service_name = $services->title;
        }
        
        if($authorization->bill_without_unit=='1'){
            $authorization->bill_without_unit = 'Yes';
        }else{
            $authorization->bill_without_unit = 'No';
        }
        
        
        if($authorization->status=='0'){
            $authorization->status = 'Open';
        }else if($authorization->status=='1'){
            $authorization->status = 'Fixed';
        }else if($authorization->status=='2'){
            $authorization->status = 'Completed';
        }else if($authorization->status=='3'){
            $authorization->status = 'In-Progress';
        }else{
            $authorization->status = '-';
        }
                
        
        
        $assignee = DB::table('users')->where('id',$authorization->assignee)->first();
        $authorization->assignee = $assignee->fname.' '.$assignee->lname;
                
        $authorization->approve_date = date("m-d-Y",strtotime($authorization->approve_date));
        $authorization->expiry_date = date("m-d-Y",strtotime($authorization->expiry_date));
        $authorization->discharge_date = date("m-d-Y",strtotime($authorization->discharge_date));
        $data['authorization']  = $authorization;
        return view('authorization/authorizations-details',$data);
    }
    
    
    public function mailAuthorization(Request $request,$id)
    {
        $data = array();
        $data = array();
        $authorizationdata = DB::table('authorizations')->where('id',$id)->first();
        $status = '';
        if($authorizationdata->status=='0'){
            $status = 'Open';
        }else if($authorizationdata->status=='1'){
            $status = 'Fixed';
        }else if($authorizationdata->status=='2'){
            $status = 'Completed';
        }else if($authorizationdata->status=='3'){
            $status = 'In-Progress';
        }else{
            $status = '-';
        }
        
        $consumer = DB::table('consumers')->where('id',$authorizationdata->consumer_id)->first();
        $authorizationdata->consumer_name = $consumer->fname.' '.$consumer->lname;
        
        
        $authorizationdata->payer_name = '-';
        $payer = DB::table('consumer_payers')->where('consumer_id',$authorizationdata->consumer_id)->first();
        if($payer){
            $payer_data = DB::table('payers')->where('id',$payer->payer_id)->first();
            if($payer_data){
                $authorizationdata->payer_name = $payer_data->title;
            }
        }
        
        $authorizationdata->service_name = '-';
        $services = DB::table('services')->where('id',$authorizationdata->services)->first();
        if($services){
            $authorizationdata->service_name = $services->title;
        }
                

        
        
        
        $authorizationdata->approve_date = date("Y-m-d",strtotime($authorizationdata->approve_date));
        $authorizationdata->expiry_date  = date("Y-m-d",strtotime($authorizationdata->expiry_date));
        $authorizationdata->discharge_date  = date("Y-m-d",strtotime($authorizationdata->discharge_date));
        $data['authorization'] = $authorizationdata;

        
       $mailsend =  Mail::send('mails.authorization',
           $data, function($message)
               {
                   $message->from('sarvesh.patel@cre8ivelabs.com');
                   $message->to('sarvesh.patel@cre8ivelabs.com', 'Admin')->subject('Authorization ');
               });
               
               

        
        //dd($mailsend);
        
        
    }
    
    public function  spendTime(Request $request){
        if($request->isMethod('post')){
            $start_date_time = date('Y-m-d H:i:s',strtotime($request->start_date_time));
            $end_date_time = date('Y-m-d H:i:s',strtotime($request->end_date_time));
            $assignee = $request->assignee;
            $authorization_id = $request->authorization_id;
            $comment = $request->comment;
            $date = date('Y-m-d H:i:s');
            
            $id = DB::table('authorization_spend_times')
            ->insertGetId([
                'authorization_id' => $authorization_id,
                'assignee_id' => $assignee,
                'start_date_time' => $start_date_time,
                'end_date_time' => $end_date_time,
                'comment' => $comment,
                'created_date' => $date,
            ]);
            
            
            if($id){
              return response()->json(['message' => 'Added Successfully!','class' => 'success']);
            }else{
                return response()->json(['message' => 'Something Wrong!','class' => 'danger']);
            }
            
            
        }
    }

    public function  getSpendtimes(Request $request){
        if($request->isMethod('post')){
            
            
            $authorization_spend_times = DB::table('authorization_spend_times')
            ->where('authorization_id',$request->authorization_id)
            ->get();
            foreach($authorization_spend_times as $authorization_spend_time){
                $users = DB::table('users')->where('id',$authorization_spend_time->assignee_id)->first();
                $authorization_spend_time->assignee_id = $users->fname.' '.$users->lname;
                $authorization_spend_time->created_date = date('d M Y',strtotime($authorization_spend_time->created_date));
                $authorization_spend_time->created_date_val = date('d M Y H:i',strtotime($authorization_spend_time->created_date));
                $authorization_spend_time->totalspendtime = '1h 20m';
                if($authorization_spend_time->comment==null){
                    $authorization_spend_time->comment = '';
                }
            }
            
            if($authorization_spend_times){
              return response()->json(['message' => 'Added Successfully!','class' => 'success','data' => $authorization_spend_times]);
            }else{
                return response()->json(['message' => 'Something Wrong!','class' => 'danger','data' => 'none']);
            }
            
            
        }
    }
    
    public function pdfAuthorization(Request $request,$id)
    {
    
        $data = array();
        $authorizationdata = DB::table('authorizations')->where('id',$id)->first();
        $status = '';
        if($authorizationdata->status=='0'){
            $status = 'Open';
        }else if($authorizationdata->status=='1'){
            $status = 'Fixed';
        }else if($authorizationdata->status=='2'){
            $status = 'Completed';
        }else if($authorizationdata->status=='3'){
            $status = 'In-Progress';
        }else{
            $status = '-';
        }
        
        $consumer = DB::table('consumers')->where('id',$authorizationdata->consumer_id)->first();
        $authorizationdata->consumer_name = $consumer->fname.' '.$consumer->lname;
        
        
        $authorizationdata->payer_name = '-';
        $payer = DB::table('consumer_payers')->where('consumer_id',$authorizationdata->consumer_id)->first();
        if($payer){
            $payer_data = DB::table('payers')->where('id',$payer->payer_id)->first();
            if($payer_data){
                $authorizationdata->payer_name = $payer_data->title;
            }
        }
        
        $authorizationdata->service_name = '-';
        $services = DB::table('services')->where('id',$authorizationdata->services)->first();
        if($services){
            $authorizationdata->service_name = $services->title;
        }
                

        
        
        
        $authorizationdata->approve_date = date("Y-m-d",strtotime($authorizationdata->approve_date));
        $authorizationdata->expiry_date  = date("Y-m-d",strtotime($authorizationdata->expiry_date));
        $authorizationdata->discharge_date  = date("Y-m-d",strtotime($authorizationdata->discharge_date));
        $data['authorization'] = $authorizationdata;
        
        
              
        $pdf = PDF::loadView('pdfs/authorization', $data);

        return  $pdf->download('Authorization.pdf');
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
