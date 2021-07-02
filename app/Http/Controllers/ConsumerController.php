<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use DataTables;
use Illuminate\Support\Facades\Mail;
use PDF;
use Storage;
use Illuminate\Support\Facades\File; 

class ConsumerController extends Controller
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
        $data = array();        
        $consumers = DB::table('consumers')->get();
        foreach($consumers as $consumer){
            $consumer_payers = DB::table('consumer_payers')->where('consumer_id',$consumer->id)->first();
            if($consumer_payers){
                $payers = DB::table('payers')->where('id',$consumer_payers->payer_id)->first();
                $consumer->payer = $payers->title;
            }else{
                $consumer->payer = '--';
            }
        }
        $data['consumers'] = $consumers;
        $data['payers'] = DB::table('payers')->get();
        $data['coordinators'] = DB::table('users')->where('role_id','!=','0')->get();
        $data['leaders'] = DB::table('users')->where('role_id','!=','0')->get();
        $data['consumer_statuses'] = DB::table('consumer_status')->get();
        return view('consumer/consumers-listing',$data);
    
    }
    
    public function getConsumers()
    {
        
        if(request()->ajax()) {
            $datas = DB::table('consumers')->get();
            
            $dataarray =  array();
            $i=0;
            
            foreach($datas as $data){
                $status = '';
                if($data->status=='0'){
                    $status = '-';
                }else{
                    $statusData = DB::table('consumer_status')->where('id',$data->status)->first();
                    $status = $statusData->title;
                }
                
                $name = $data->fname.' '.$data->lname;
                
                $consumer_payers = DB::table('consumer_payers')->where('consumer_id',$data->id)->first();
                if($consumer_payers){
                    $payers = DB::table('payers')->where('id',$consumer_payers->payer_id)->first();
                    $consumer_payer = $payers->title;
                }else{
                    $consumer_payer = '--';
                }
                
                $consumer_phones = DB::table('consumer_phones')->where('consumer_id',$data->id)->first();
                if($consumer_phones){
                    
                    $consumer_phone = $consumer_phones->phone;
                }else{
                    $consumer_phone = '--';
                }
            
            
                
                $cordinate = DB::table('users')->where('id',$data->lead_person)->first();
                $cordinate_name = $cordinate->fname.' '.$cordinate->lname;
               
                $dataarray[$i]= (object) array(
                                    'id'=>$data->id,       
                                    'fname'=>$data->fname,
                                    'lname'=>$data->lname,
                                    'consumer_payer'=>$consumer_payer,
                                    'consumer_phone'=>$consumer_phone,
                                    'cordinate_name'=>$cordinate_name,
                                    'email'=>$data->email,
                                    'created_at'=>$data->created_date,
                                    'status'=>$status,
                                    );

                
                $i++;
            }
            
            $collection = collect($dataarray);
            
           
            
            return Datatables::of($collection)
            ->addColumn('name', function($row){
                    $actionBtn = '<a href="consumers-details/'.$row->id.'" data="'.$row->id.'" class="editdata" >'.$row->fname.' '.$row->lname.'</a>';
                    return $actionBtn;
                })
            ->addColumn('chkbox', function($row){
                    $actionBtn = '<input value="'.$row->id.'"  name="empids" type="checkbox" class="add-new-icon" />';
                    return $actionBtn;
                })
            ->rawColumns(['name','chkbox'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('employee/employee-listing');
        
    }
    
    
    public function deleteConsumers(Request $request)
    {
        
        if($request->isMethod('post')){
            //dd($request->delids_array);
            $delids_arrays = $request->delids_array;
            $total_array = sizeof($delids_arrays);
            
            for($i=0;$i<$total_array;$i++){
                //delete all data for consumers
                //consumer_phones
                //consumer_persons
                //consumer_payers
                //consumer_medications
                //consumer_diagnosis
                //consumer_allergies
                //consumer_addresses
                //consumer_account_notations
                

                $fileid = $delids_arrays[$i]['id'];
                
                
                
                $consumer_phones = DB::table('consumer_phones')->where('consumer_id', $fileid)->first();
                if($consumer_phones){
                    DB::table('consumer_phones')->where('consumer_id', $fileid)->delete();
                }
                
                $consumer_persons = DB::table('consumer_persons')->where('consumer_id', $fileid)->first();
                if($consumer_persons){
                    DB::table('consumer_persons')->where('consumer_id', $fileid)->delete();
                }
                
                $consumer_payers = DB::table('consumer_payers')->where('consumer_id', $fileid)->first();
                if($consumer_payers){
                    DB::table('consumer_payers')->where('consumer_id', $fileid)->delete();
                }
                
                $consumer_medications = DB::table('consumer_medications')->where('consumer_id', $fileid)->first();
                if($consumer_medications){
                    DB::table('consumer_medications')->where('consumer_id', $fileid)->delete();
                }
                
                $consumer_diagnosis = DB::table('consumer_diagnosis')->where('consumer_id', $fileid)->first();
                if($consumer_diagnosis){
                    DB::table('consumer_diagnosis')->where('consumer_id', $fileid)->delete();
                }
                
                $consumer_allergies = DB::table('consumer_allergies')->where('consumer_id', $fileid)->first();
                if($consumer_allergies){
                    DB::table('consumer_allergies')->where('consumer_id', $fileid)->delete();
                }
                
                $consumer_addresses = DB::table('consumer_addresses')->where('consumer_id', $fileid)->first();
                if($consumer_addresses){
                    DB::table('consumer_addresses')->where('consumer_id', $fileid)->delete();
                }
                
                $consumer_account_notations = DB::table('consumer_account_notations')->where('consumer_id', $fileid)->first();
                if($consumer_account_notations){
                    DB::table('consumer_account_notations')->where('consumer_id', $fileid)->delete();
                }
                

                
                DB::table('consumers')->where('id', $fileid)->delete();
                
                
                
            }
            return response()->json(['message' => 'Deleted Successfully!','class' => 'success']);
        }
    }
    
    
    public function searchConsumers(Request $request)
    {
        if(request()->ajax()) {
            /*
            $datas = DB::table('users')
            ->where('fname', 'like', '%'.$request->fname.'%')
            ->where('lname', 'like', '%'.$request->lname.'%');
            
            
            $datas->where('status', $request->status);
            $datas->where('supervisor', $request->supervisor);
            $datas->where('role_id','!=',0)->get();
            */
            
            $fname_query = '';
            if($request->fname!=''){
                $fname_query = " and c.`fname` like "."'%".$request->fname."%'";
            }
            
            $lname_query = '';
            if($request->lname!=''){
                $lname_query = " and c.`lname` like "."'%".$request->lname."%'";
            }
            
            $case_query = '';
            if($request->searchcasename!=''){
                $case_query = " and c.`case_name` like "."'%".$request->searchcasename."%'";
            }
            
            $dob_query = '';
            if($request->date_of_birth!=''){
                $dob_query = " and c.dob= '".$this->changeDateformate($request->date_of_birth)."' ";
            }
            
            $insuranceid_query = '';
            if($request->insuranceid!=''){
                $insuranceid_query = " and c.npi= '".$request->insuranceid."' ";
            }
            
            $status_query = '';
            if($request->status!=''){
                $status_query = " and c.status= '".$request->status."' ";
            }
            
            $selrecordno_query = '';
            if($request->selrecordno!=''){
                $selrecordno_query = " and c.record_no= '".$request->selrecordno."' ";
            }
            
            $searchcoordinator_query = '';
            if($request->searchcoordinator!=''){
                $searchcoordinator_query = " and c.lead_person= '".$request->searchcoordinator."' ";
            }
            
            $sellead_query = '';
            if($request->sellead!=''){
                $sellead_query = " and c.lead_person= '".$request->sellead."' ";
            }
            
            
            $admission_date_query = '';
            if($request->admission_discharge_date!=''  && $request->admission_to_date!=''){
                $admission_date_query = " and c.admission_date >= '".$this->changeDateformate($request->admission_discharge_date)."'   and c.admission_date <= '".$this->changeDateformate($request->admission_to_date)."'";
            }
            
            $discharge_date_query = '';
            if($request->discharge_from_date!=''  && $request->discharge_to_date!=''){
                $discharge_date_query = " and c.discharge_date >= '".$this->changeDateformate($request->discharge_from_date)."'   and c.discharge_date <= '".$this->changeDateformate($request->discharge_to_date)."'";
            }
            $payer_query_a = '';
            $payer_query = '';
            $payer_query_new = '';
            if($request->searchpayer){
                $payer_query_a = ',cp.*';
                $payer_query  = ' left join consumer_payers as cp on   cp.consumer_id = c.id ';  
                $payer_query_new = " and cp.payer_id = '".$request->searchpayer."' ";
            }

            
            $sql = "select c.*  ".$payer_query_a." from consumers as c 

            ".$payer_query."
            
            where 1=1 
            
            ".$fname_query."
            ".$lname_query."
            ".$case_query."
            ".$dob_query."
            ".$insuranceid_query."
            ".$searchcoordinator_query."
            ".$status_query."
            ".$selrecordno_query."
            ".$sellead_query."
            ".$admission_date_query."
            ".$discharge_date_query."
            ".$payer_query_new."

            ";
            //echo $sql;
            $datas = DB::select($sql);
            //dd($datas);
            $dataarray =  array();
            $i=0;
            
            foreach($datas as $data){
                $status = '';
                if($data->status=='0'){
                    $status = '-';
                }else{
                    $statusData = DB::table('consumer_status')->where('id',$data->status)->first();
                    $status = $statusData->title;
                }
                
                $name = $data->fname.' '.$data->lname;
                
                $cordinate = DB::table('users')->where('id',$data->lead_person)->first();
                $cordinate_name = $cordinate->fname.' '.$cordinate->lname;
                
                $consumer_payers = DB::table('consumer_payers')->where('consumer_id',$data->id)->first();
                if($consumer_payers){
                    $payers = DB::table('payers')->where('id',$consumer_payers->payer_id)->first();
                    $consumer_payer = $payers->title;
                }else{
                    $consumer_payer = '--';
                }
                
                $consumer_phones = DB::table('consumer_phones')->where('consumer_id',$data->id)->first();
                if($consumer_phones){
                    
                    $consumer_phone = $consumer_phones->phone;
                }else{
                    $consumer_phone = '--';
                }
                
               
               $dataarray[$i]= (object) array(
                                    'id'=>$data->id,       
                                    'fname'=>$data->fname,
                                    'lname'=>$data->lname,
                                    'consumer_payer'=>$consumer_payer,
                                    'consumer_phone'=>$consumer_phone,
                                    'cordinate_name'=>$cordinate_name,
                                    'email'=>$data->email,
                                    'created_at'=>$data->created_date,
                                    'status'=>$status,
                                    );
                                    
               

                
                $i++;
            }
            
            $collection = collect($dataarray);
            return $collection;
        }
        
    }
    
    
    public function changeDateformate($date){
        $a = explode("-",$date);
        $b = $a[2].'-'.$a[0].'-'.$a[1];
        return $b;
    }
    
    public function addConsumer(Request $request)
    {
        
        if($request->isMethod('post')){
            $d = json_decode($request->options);
            
            //dd($request);
            
            
            
            $salutation = $d->salutation;
            $fname = $d->fname;
            $lname = $d->lname;
            $gender = $d->gender;
            $dob = $d->dob;
            $email = $d->email;

            $record_no = $d->record_no;            
            $statusval = $d->statusval;
            $assigneeval = $d->assigneeval;            
            $servicedate = $d->servicedate;
 

            $servicedate = $this->changeDateformate($servicedate);

            $admissiondate = $d->admissiondate;
            $admissiondate = $this->changeDateformate($admissiondate);
            
            $dischargedate = $d->dischargedate;  
            $dischargedate = $this->changeDateformate($dischargedate);
            
            $language = $d->language;
            $race = $d->race;
            $marital_status = $d->marital_status;
            $ethinicity = $d->ethinicity;
            $casename = $d->casename;
            $lead_person = $d->lead_person;
            
            $allergies_val = $d->allergies_val;
            
            
            
            //$nurse = $d->nurse;
            //$doctor = $d->doctor;
            $in_crisis = $d->in_crisis;
            $npi = $d->npi;
            $smoker_status = $d->smoker_status;
            $fall_risk = $d->fall_risk;
            $hearing_impaired = $d->hearing_impaired;
            $seeing_impaired = $d->seeing_impaired;
            $preferred = $d->preferred;
            $referral_source = $d->referral_source;
            //$ab = $dob.'-'.$servicedate.'-'.$admissiondate.'-'.$dischargedate.'-';
            //dd($ab);
            $date = date('Y-m-d');
            
            $id = DB::table('consumers')
            ->insertGetId([
                'salutation' => $salutation,
                'fname' => $fname,
                'lname' => $lname,
                'gender' => $gender,
                'dob' => $dob,
                'email' => $email,
                'identified_as' => '1',
                'teams' => 'teams',
                'record_no' => $record_no,
                'status' => $statusval,
                'assignee' => $assigneeval,
                'service_date' => $servicedate,
                'admission_date' => $admissiondate,
                'discharge_date' => $dischargedate,
                'language' => $language,
                'race' => $race,
                'marital_status' => 1,
                'ethnicity' => $ethinicity,
                'case_name' => $casename,
                'lead_person' => $lead_person,
                'allergy' => $allergies_val,
                //'nurse' => $nurse,
                //'doctor' => $doctor,
                'in_crisis' => $in_crisis,
                'npi' => $npi,
                'smoker_status' => 1,
                'fall_risk' => $fall_risk,
                'hearing_impaired' => $hearing_impaired,
                'seeing_impaired' => $seeing_impaired,
                'preferred_hospital' => $preferred,
                'referral_source' => $referral_source,
                'created_date' => $date,

            ]);
            
            
            
            
            $phonetype_arrays = $d->phonetype_array; 
            
            
            
            
            
            if($id){
                
                $baddress = $d->baddress;
                $bstreet = $d->bstreet;
                $bcity = $d->bcity;
                $bstate = '0';
                if($d->bstate!=''){
                    $bstate = $d->bstate;
                }
                $bzipcode = $d->bzipcode;
                $bcountry = '0';
                if($d->bcountry!=''){
                    $bcountry = $d->bcountry;
                }
                $btypes = $d->btypes;
                $bnotes = $d->bnotes;

                $aaddress = $d->aaddress;
                $astreet = $d->astreet;
                $acity = $d->acity;
                $astate = '0';
                if($d->bstate!=''){
                    $astate = $d->astate;
                }
                $azipcode = $d->azipcode;
                $acountry = '0';
                if($d->acountry!=''){
                    $acountry = $d->acountry;
                }
                $atypes = $d->atypes;
                $anotes = $d->anotes;
                
                
                
                DB::table('consumer_addresses')
                        ->insert([
                            'consumer_id' => $id,
                            'address1' => $baddress,
                            'address2' => $bstreet,
                            'city' => $bcity,
                            'state' => $bstate,
                            'zipcode' => $bzipcode,
                            'country' => $bcountry,
                            'types' => serialize($btypes),
                            'notes' => $bnotes,
                            'a_address1' => $aaddress,
                            'a_address2' => $astreet,
                            'a_city' => $acity,
                            'a_state' => $astate,
                            'a_zipcode' => $azipcode,
                            'a_country' => $acountry,
                            'a_types' => serialize($atypes),
                            'a_notes' => $anotes,
                            'created_date' => $date,

                        ]);
            
                
                
                foreach($phonetype_arrays as $key => $val){
                    
                    if($val->phone!=''  && $val->phonetype!=''){
                        
                            DB::table('consumer_phones')
                                ->insert([
                                    'consumer_id' => $id,
                                    'phonetype' => $val->phonetype,
                                    'phone' => $val->phone,
                                    'created_date' => $date,
                                    
                                ]);
                        }
                        
                }
                
                $payerid_array = $d->payerid_array; 
                foreach($payerid_array as $key => $val){
                    
                    if($val->payerid!=''  && $val->payerid!=null){
                        
                            DB::table('consumer_payers')
                                ->insert([
                                    'consumer_id' => $id,
                                    'payer_id' => $val->payerid,
                                    'policy_no' => $val->payerpolicyno,
                                    'medical_id' => $val->payerinsurancetype,
                                    'co_payment' => $val->payercopay,
                                    'created_date' => $date,
                                    
                                ]);
                        }
                        
                }
                
                $contact_type_array = $d->contact_type_array; 
                foreach($contact_type_array as $key => $val){
                    
                    if($val->firstname!=''  && $val->lastname!=''){
                        
                            DB::table('consumer_persons')
                                ->insert([
                                    'consumer_id' => $id,
                                    'salutation' => $val->contact_type,
                                    'fname' => $val->firstname,
                                    'lname' => $val->lastname,
                                    'relation' => $val->relationship,
                                    'phone' => $val->phonenumber,
                                    'mobile' => $val->mobilenumber,
                                    'email' => $val->emailid,
                                    'address1' => $val->address_1,
                                    'address2' => $val->address_2,
                                    'city' => $val->city_id,
                                    'state_id' => $val->state_id,
                                    'country_id' => $val->country_id,
                                    'created_date' => $date,
                                    
                                ]);
                        }
                        
                }
                
                $primarytype_array = $d->primarytype_array; 
                foreach($primarytype_array as $key => $val){
                    
                    if($val->primarytype!=''  && $val->primarytype!=null){
                            
                            $diagnosis_date=$val->diagnosis_date;
                            $diagnosis_date = $this->changeDateformate($diagnosis_date);
                            
                            DB::table('consumer_diagnosis')
                                ->insert([
                                    'consumer_id' => $id,
                                    'd_primary' => $val->primarytype,
                                    'axis_level' => $val->axisleveltype,
                                    'd_date' => $diagnosis_date,
                                    'description' => $val->primarydesc,
                                    'icd9' => $val->icd9type,
                                    'icd10' => $val->icd10type,
                                    'status' => $val->primarystatus,
                                    'created_date' => $date,
                                    
                                ]);
                        }
                        
                }
                
                $midicationname_array = $d->midicationname_array; 
                foreach($midicationname_array as $key => $val){
                    
                    if($val->midicationname!=''  && $val->midicationname!=null){
                        
                            DB::table('consumer_medications')
                                ->insert([
                                    'consumer_id' => $id,
                                    'name' => $val->midicationname,
                                    'side_effects' => $val->sideeffecttype,
                                    'pharmacy' => $val->pharmacytype,
                                    'reaction' => $val->reactiontype,
                                    'severity' => $val->severitytype,                                    
                                    'created_date' => $date,
                                    
                                ]);
                        }
                        
                }
                
                $allerginame_array = $d->allerginame_array; 
                foreach($allerginame_array as $key => $val){
                    
                    if($val->allerginame!=''  && $val->allerginame!=null){
                        
                            DB::table('consumer_allergies')
                                ->insert([
                                    'consumer_id' => $id,
                                    'name' => $val->allerginame,
                                    'reaction' => $val->reactiontype,
                                    'severity' => $val->seveitytype,                                                                    
                                    'created_date' => $date,
                                    
                                ]);
                        }
                        
                }
                
                
                $notationtype_array = $d->notationtype_array; 
                foreach($notationtype_array as $key => $val){
                    
                    if($val->notationtype!=''  && $val->notationtype!=null){
                            $notationdate=$val->notationdate;
                            $notationdate = $this->changeDateformate($notationdate);
                            
                            DB::table('consumer_account_notations')
                                ->insert([
                                    'consumer_id' => $id,
                                    'type_id' => $val->notationtype,
                                    'notation' => $val->notationtitle,
                                    'notation_by' => $val->notationby,      
                                    'notation_date' => $notationdate,                                       
                                    'created_date' => $date,
                                    
                                ]);
                        }
                        
                }
                
                

            
            
            
                return response()->json(['message' => 'Added Successfully!','class' => 'success']);
            }else{
                return response()->json(['message' => 'Something Wrong!','class' => 'danger']);
            }
            
            
        }else{
            
            $data = array();
            $data['roles'] = DB::table('roles')->get();
            $data['races'] = DB::table('races')->get();
            $data['axis_levels'] = DB::table('axis_levels')->get();
            $data['primaries'] = DB::table('primaries')->get();
            $data['marital_statuss'] = DB::table('marital_status')->get();
            $data['smoker_statuss'] = DB::table('smoker_status')->get();
            $data['ethnicities'] = DB::table('ethnicities')->get();
            $data['services'] = DB::table('services')->get();
            $data['languages'] = DB::table('languages')->get();
            $data['qualifications'] = DB::table('qualifications')->get();
            $data['certfication_types'] = DB::table('certfication_types')->get();
            $data['relations'] = DB::table('relations')->get();
            $data['notation_types'] = DB::table('notation_types')->get();
            $data['reactions'] = DB::table('reactions')->get();
            $data['countries'] = DB::table('countries')->get();
            $data['states'] = DB::table('states')->get();
            $data['payers'] = DB::table('payers')->get();
            $data['consumer_statuses'] = DB::table('consumer_status')->get();
            $data['supervisors'] = DB::table('users')->where('role_id','!=','0')->get();
            return view('consumer/consumers-add',$data);
        }
        
    }
    
    
    
    public function editConsumer(Request $request,$id)
    {
        
        
        
        
        if($request->isMethod('post')){
            
            $d = json_decode($request->options);
            
            
            
            function changeDateformate($date){
                $a = explode("-",$date);
                $b = $a[2].'-'.$a[0].'-'.$a[1];
                return $b;
            }
            
            $salutation = $d->salutation;
            $fname = $d->fname;
            $lname = $d->lname;
            $gender = $d->gender;
            $dob = $d->dob;
            //$email = $d->email;

            $record_no = $d->record_no;            
            $statusval = $d->statusval;
            $assigneeval = $d->assigneeval;            
            $servicedate = $d->servicedate;
 

            $servicedate = changeDateformate($servicedate);

            $admissiondate = $d->admissiondate;
            $admissiondate = changeDateformate($admissiondate);
            
            $dischargedate = $d->dischargedate;  
            $dischargedate = changeDateformate($dischargedate);
            
            $language = $d->language;
            $race = $d->race;
            $marital_status = $d->marital_status;
            $ethinicity = $d->ethinicity;
            $casename = $d->casename;
            $lead_person = $d->lead_person;
            
            
            
            $allergies_val = $d->allergies_val;
            //$nurse = $d->nurse;
            //$doctor = $d->doctor;
            $in_crisis = $d->in_crisis;
            $npi = $d->npi;
            $smoker_status = $d->smoker_status;
            $fall_risk = $d->fall_risk;
            $hearing_impaired = $d->hearing_impaired;
            $seeing_impaired = $d->seeing_impaired;
            $preferred = $d->preferred;
            $referral_source = $d->referral_source;
            //$ab = $dob.'-'.$servicedate.'-'.$admissiondate.'-'.$dischargedate.'-';
            //dd($ab);
            $date = date('Y-m-d');
            
            DB::table('consumers')
            ->where("id",$id)
            ->update([
                'salutation' => $salutation,
                'fname' => $fname,
                'lname' => $lname,
                'gender' => $gender,
                'dob' => $dob,
                //'email' => $email,
                'identified_as' => '1',
                'teams' => 'teams',
                'record_no' => $record_no,
                'status' => $statusval,
                'assignee' => $assigneeval,
                'service_date' => $servicedate,
                'admission_date' => $admissiondate,
                'discharge_date' => $dischargedate,
                'language' => $language,
                'race' => $race,
                'marital_status' => 1,
                'ethnicity' => $ethinicity,
                'case_name' => $casename,
                'lead_person' => $lead_person,
                'allergy' => $allergies_val,
                //'nurse' => $nurse,
                //'doctor' => $doctor,
                'in_crisis' => $in_crisis,
                'npi' => $npi,
                'smoker_status' => 1,
                'fall_risk' => $fall_risk,
                'hearing_impaired' => $hearing_impaired,
                'seeing_impaired' => $seeing_impaired,
                'preferred_hospital' => $preferred,
                'referral_source' => $referral_source,
                'created_date' => $date,

            ]);
            
                $baddress = $d->baddress;
                $bstreet = $d->bstreet;
                $bcity = $d->bcity;
                $bstate = '0';
                if($d->bstate!=''){
                    $bstate = $d->bstate;
                }
                $bzipcode = $d->bzipcode;
                $bcountry = '0';
                if($d->bcountry!=''){
                    $bcountry = $d->bcountry;
                }
                $btypes = $d->btypes;
                $bnotes = $d->bnotes;

                $aaddress = $d->aaddress;
                $astreet = $d->astreet;
                $acity = $d->acity;
                $astate = '0';
                if($d->bstate!=''){
                    $astate = $d->astate;
                }
                $azipcode = $d->azipcode;
                $acountry = '0';
                if($d->acountry!=''){
                    $acountry = $d->acountry;
                }
                $atypes = $d->atypes;
                $anotes = $d->anotes;
                
            DB::table('consumer_addresses')
            ->where("consumer_id",$id)
                        ->update([
                            
                            'address1' => $baddress,
                            'address2' => $bstreet,
                            'city' => $bcity,
                            'state' => $bstate,
                            'zipcode' => $bzipcode,
                            'country' => $bcountry,
                            'types' => serialize($btypes),
                            'notes' => $bnotes,
                            'a_address1' => $aaddress,
                            'a_address2' => $astreet,
                            'a_city' => $acity,
                            'a_state' => $astate,
                            'a_zipcode' => $azipcode,
                            'a_country' => $acountry,
                            'a_types' => serialize($atypes),
                            'a_notes' => $anotes,
                            'created_date' => $date,

                        ]);
            
            
            $editphones_arrays = $d->editphones_array;
            $get_existing_phones = DB::table('consumer_phones')->where('consumer_id',$id)->get();
            $phones = array(); 
            foreach($get_existing_phones as $get_existing_phone){
                array_push($phones,$get_existing_phone->id);
            }
            
            $new_phones = array();
            foreach($editphones_arrays as $editphones_array){
                array_push($new_phones,$editphones_array->editphones);
            }
            $delete_phones = array_diff($phones,$new_phones);
            $delete_phones = array_values($delete_phones);
            $total_del_phones = sizeof($delete_phones);
            
            if($total_del_phones > 0 ){
                for($crc=0;$crc<$total_del_phones;$crc++){
                    DB::table('consumer_phones')->where('id',$delete_phones[$crc])->delete();
                }                
            }
            
            $phonetype_array = $d->phonetype_array;            
            $count_phonetype_array = sizeof($phonetype_array);
            if($count_phonetype_array > 0 ){
                for($i=0;$i<$count_phonetype_array;$i++){
                    
                    $phonetype = $phonetype_array[$i]->phonetype;
                    $phone = $phonetype_array[$i]->phone;
                    
                    
                    
                    if(isset($phonetype_array[$i]->id)){
                        DB::table('consumer_phones')
                        ->where("id",$phonetype_array[$i]->id)
                                ->update([
                                    'consumer_id' => $id,
                                    'phonetype' => $phonetype,
                                    'phone' => $phone,                                    
                                    
                                    
                                ]);
                    }else{

                        if($phonetype!='' ){
                        
                            DB::table('consumer_phones')
                                ->insert([
                                    'consumer_id' => $id,
                                    'phonetype' => $phonetype,
                                    'phone' => $phone, 

                                    
                                ]);
                        }
                    }
                }
            }
            
            
            
            
            
            $editpayers_arrays = $d->editpayers_array;
            $get_existing_payers = DB::table('consumer_payers')->where('consumer_id',$id)->get();
            $payers = array(); 
            foreach($get_existing_payers as $get_existing_payer){
                array_push($payers,$get_existing_payer->id);
            }
            
            $new_payers = array();
            foreach($editpayers_arrays as $editpayers_array){
                array_push($new_payers,$editpayers_array->editpayers);
            }
            $delete_payers = array_diff($payers,$new_payers);
            $delete_payers = array_values($delete_payers);
            $total_del_payers = sizeof($delete_payers);
            
            if($total_del_payers > 0 ){
                for($crc=0;$crc<$total_del_payers;$crc++){
                    DB::table('consumer_payers')->where('id',$delete_payers[$crc])->delete();
                }                
            }
            
            $payerid_array = $d->payerid_array;            
            $count_payerid_array = sizeof($payerid_array);
            if($count_payerid_array > 0 ){
                for($i=0;$i<$count_payerid_array;$i++){
                    
                    $payerid = $payerid_array[$i]->payerid;
                    $payerpolicyno = $payerid_array[$i]->payerpolicyno;
                    $payerinsurancetype = $payerid_array[$i]->payerinsurancetype;
                    $payercopay = $payerid_array[$i]->payercopay;
                    
                    
                    if(isset($payerid_array[$i]->id)){
                        DB::table('consumer_payers')
                        ->where("id",$payerid_array[$i]->id)
                                ->update([
                                    'consumer_id' => $id,
                                    'payer_id' => $payerid,
                                    'policy_no' => $payerpolicyno,
                                    'medical_id' => $payerinsurancetype,
                                    'co_payment' => $payercopay,
                                    'updated_date' => $date,
                                    
                                ]);
                    }else{

                        if($payerpolicyno!='' ){
                        
                            DB::table('consumer_payers')
                                ->insert([
                                    'consumer_id' => $id,
                                    'payer_id' => $payerid,
                                    'policy_no' => $payerpolicyno,
                                    'medical_id' => $payerinsurancetype,
                                    'co_payment' => $payercopay,
                                    'created_date' => $date,
                                    
                                ]);
                        }
                    }
                }
            }
            
            
            
            $editpersons_arrays = $d->editpersons_array;
            $get_existing_persons = DB::table('consumer_persons')->where('consumer_id',$id)->get();
            $persons = array(); 
            foreach($get_existing_persons as $get_existing_person){
                array_push($persons,$get_existing_person->id);
            }
            
            $new_persons = array();
            foreach($editpersons_arrays as $editpersons_array){
                array_push($new_persons,$editpersons_array->editpersons);
            }
            $delete_persons = array_diff($persons,$new_persons);
            $delete_persons = array_values($delete_persons);
            $total_del_persons = sizeof($delete_persons);
            
            if($total_del_persons > 0 ){
                for($crc=0;$crc<$total_del_persons;$crc++){
                    DB::table('consumer_persons')->where('id',$delete_persons[$crc])->delete();
                }                
            }
 
            $contact_type_array = $d->contact_type_array;            
            $count_contact_type = sizeof($contact_type_array);
            if($count_contact_type > 0 ){
                for($i=0;$i<$count_contact_type;$i++){
                    
                    $contact_type = $contact_type_array[$i]->contact_type;
                    $firstname = $contact_type_array[$i]->firstname;
                    $lastname = $contact_type_array[$i]->lastname;
                    $relationship = $contact_type_array[$i]->relationship;
                    $phonenumber = $contact_type_array[$i]->phonenumber;
                    $mobilenumber = $contact_type_array[$i]->mobilenumber;
                    $emailid = $contact_type_array[$i]->emailid;
                    $address_1 = $contact_type_array[$i]->address_1;
                    $address_2 = $contact_type_array[$i]->address_2;
                    $city_id = $contact_type_array[$i]->city_id;
                    $state_id = $contact_type_array[$i]->state_id;
                    $country_id = $contact_type_array[$i]->country_id;
                    
                    if(isset($contact_type_array[$i]->id)){
                        DB::table('consumer_persons')
                        ->where("id",$contact_type_array[$i]->id)
                                ->update([
                                    'consumer_id' => $id,
                                    'salutation' => $contact_type,
                                    'fname' => $firstname,
                                    'lname' => $lastname,
                                    'relation' => $relationship,
                                    'phone' => $phonenumber,
                                    'mobile' => $mobilenumber,
                                    'email' => $emailid,
                                    'address1' => $address_1,
                                    'address2' => $address_2,
                                    'city' => $city_id,
                                    'state_id' => $state_id,
                                    'country_id' => $country_id,
                                    'updated_date' => $date,
                                    
                                ]);
                    }else{

                        if($firstname!=''  && $lastname!=''){
                        
                            DB::table('consumer_persons')
                                ->insert([
                                    'consumer_id' => $id,
                                    'salutation' => $contact_type,
                                    'fname' => $firstname,
                                    'lname' => $lastname,
                                    'relation' => $relationship,
                                    'phone' => $phonenumber,
                                    'mobile' => $mobilenumber,
                                    'email' => $emailid,
                                    'address1' => $address_1,
                                    'address2' => $address_2,
                                    'city' => $city_id,
                                    'state_id' => $state_id,
                                    'country_id' => $country_id,
                                    'created_date' => $date,
                                    
                                ]);
                        }
                    }
                }
            }
            
            
            
            
            $editdiags_arrays = $d->editdiags_array;
            $get_existing_diags = DB::table('consumer_diagnosis')->where('consumer_id',$id)->get();
            $diags = array(); 
            foreach($get_existing_diags as $get_existing_diag){
                array_push($diags,$get_existing_diag->id);
            }
            
            $new_diags = array();
            foreach($editdiags_arrays as $editdiags_array){
                array_push($new_diags,$editdiags_array->editdiags);
            }
            $delete_diags = array_diff($diags,$new_diags);
            $delete_diags = array_values($delete_diags);
            $total_del_diags = sizeof($delete_diags);
            
            if($total_del_diags > 0 ){
                for($crc=0;$crc<$total_del_diags;$crc++){
                    DB::table('consumer_diagnosis')->where('id',$delete_diags[$crc])->delete();
                }                
            }
            
            $primarytype_array = $d->primarytype_array;            
            $count_primarytype_array = sizeof($primarytype_array);
            if($count_primarytype_array > 0 ){
                for($i=0;$i<$count_primarytype_array;$i++){
                    
                    $d_primary = $primarytype_array[$i]->primarytype;
                    $axis_level = $primarytype_array[$i]->axisleveltype;
                    $d_date = $this->changeDateformate($primarytype_array[$i]->diagnosis_date);
                    $description = $primarytype_array[$i]->primarydesc;
                    $icd9 = $primarytype_array[$i]->icd9type;
                    $icd10 = $primarytype_array[$i]->icd10type;
                    $status = $primarytype_array[$i]->primarystatus;
                    
                    
                    if(isset($primarytype_array[$i]->id)){
                        DB::table('consumer_diagnosis')
                        ->where("id",$primarytype_array[$i]->id)
                                ->update([
                                    'consumer_id' => $id,
                                    'd_primary' => $d_primary,
                                    'axis_level' => $axis_level,
                                    'd_date' => $d_date,
                                    'description' => $description,
                                    'icd9' => $icd9,
                                    'icd10' => $icd10,
                                    'status' => $status,
                                    'updated_date' => $date,
                                    
                                ]);
                    }else{

                        if($d_primary!='' ){
                        
                            DB::table('consumer_diagnosis')
                                ->insert([
                                    'consumer_id' => $id,
                                    'd_primary' => $d_primary,
                                    'axis_level' => $axis_level,
                                    'd_date' => $d_date,
                                    'description' => $description,
                                    'icd9' => $icd9,
                                    'icd10' => $icd10,
                                    'status' => $status,
                                    'created_date' => $date,
                                    
                                ]);
                        }
                    }
                }
            }
            
            
            
            $editmedications_arrays = $d->editmedications_array;
            $get_existing_medications = DB::table('consumer_medications')->where('consumer_id',$id)->get();
            $medications = array(); 
            foreach($get_existing_medications as $get_existing_medication){
                array_push($medications,$get_existing_medication->id);
            }
            
            $new_medications = array();
            foreach($editmedications_arrays as $editmedications_array){
                array_push($new_medications,$editmedications_array->editmedications);
            }
            $delete_medications = array_diff($medications,$new_medications);
            $delete_medications = array_values($delete_medications);
            $total_del_medications = sizeof($delete_medications);
            
            if($total_del_medications > 0 ){
                for($crc=0;$crc<$total_del_medications;$crc++){
                    DB::table('consumer_medications')->where('id',$delete_medications[$crc])->delete();
                }                
            }
            
            
            
            
            $midicationname_array = $d->midicationname_array;            
            $count_midicationname_array = sizeof($midicationname_array);
            if($count_midicationname_array > 0 ){
                for($i=0;$i<$count_midicationname_array;$i++){
                    
                    $midicationname = $midicationname_array[$i]->midicationname;
                    $sideeffecttype = $midicationname_array[$i]->sideeffecttype;                    
                    $pharmacytype = $midicationname_array[$i]->pharmacytype;
                    $reactiontype = $midicationname_array[$i]->reactiontype;
                    $severitytype = $midicationname_array[$i]->severitytype;
                    
                    
                    
                    if(isset($midicationname_array[$i]->id)){
                        DB::table('consumer_medications')
                        ->where("id",$midicationname_array[$i]->id)
                                ->update([
                                    'consumer_id' => $id,
                                    'name' => $midicationname,
                                    'side_effects' => $sideeffecttype,
                                    'pharmacy' => $pharmacytype,
                                    'reaction' => $reactiontype,
                                    'severity' => $severitytype,                                    
                                    'updated_date' => $date,
                                    
                                ]);
                    }else{

                        if($d_primary!='' ){
                        
                            DB::table('consumer_medications')
                                ->insert([
                                    'consumer_id' => $id,
                                    'name' => $midicationname,
                                    'side_effects' => $sideeffecttype,
                                    'pharmacy' => $pharmacytype,
                                    'reaction' => $reactiontype,
                                    'severity' => $severitytype, 
                                    'created_date' => $date,
                                    
                                ]);
                        }
                    }
                }
            }
            
            //remaining from here            
            $editallergies_arrays = $d->editallergies_array;
            $get_existing_allergies = DB::table('consumer_allergies')->where('consumer_id',$id)->get();
            $allergies = array(); 
            foreach($get_existing_allergies as $get_existing_allergy){
                array_push($allergies,$get_existing_allergy->id);
            }
            
            $new_allergies = array();
            foreach($editallergies_arrays as $editallergies_array){
                array_push($new_allergies,$editallergies_array->editallergies);
            }
            $delete_allergies = array_diff($allergies,$new_allergies);
            $delete_allergies = array_values($delete_allergies);
            $total_del_allergies = sizeof($delete_allergies);
            
            if($total_del_allergies > 0 ){
                for($crc=0;$crc<$total_del_allergies;$crc++){
                    DB::table('consumer_allergies')->where('id',$delete_allergies[$crc])->delete();
                }                
            }
            
            
            $allerginame_array = $d->allerginame_array;            
            $count_allerginame_array = sizeof($allerginame_array);
            if($count_allerginame_array > 0 ){
                for($i=0;$i<$count_allerginame_array;$i++){
                    
                    $allerginame = $allerginame_array[$i]->allerginame;
                    $reactiontype = $allerginame_array[$i]->reactiontype;                    
                    $seveitytype = $allerginame_array[$i]->seveitytype;
                    
                    
                    
                    
                    if(isset($allerginame_array[$i]->id)){
                        DB::table('consumer_allergies')
                        ->where("id",$allerginame_array[$i]->id)
                                ->update([
                                    'consumer_id' => $id,
                                    'name' => $allerginame,
                                    'reaction' => $reactiontype,
                                    'severity' => $seveitytype,                                                                       
                                    'updated_date' => $date,
                                    
                                ]);
                    }else{

                        if($d_primary!='' ){
                        
                            DB::table('consumer_allergies')
                                ->insert([
                                    'consumer_id' => $id,
                                    'name' => $allerginame,
                                    'reaction' => $reactiontype,
                                    'severity' => $seveitytype,  
                                    'created_date' => $date,
                                    
                                ]);
                        }
                    }
                }
            }
            
            
            
            
            
            $editnotations_arrays = $d->editnotations_array;
            $get_existing_notations = DB::table('consumer_account_notations')->where('consumer_id',$id)->get();
            $notations = array(); 
            foreach($get_existing_notations as $get_existing_notation){
                array_push($notations,$get_existing_notation->id);
            }
            
            $new_notations = array();
            foreach($editnotations_arrays as $editnotations_array){
                array_push($new_notations,$editnotations_array->editnotations);
            }
            $delete_notations = array_diff($notations,$new_notations);
            $delete_notations = array_values($delete_notations);
            $total_del_notations = sizeof($delete_notations);
            
            if($total_del_notations > 0 ){
                for($crc=0;$crc<$total_del_notations;$crc++){
                    DB::table('consumer_account_notations')->where('id',$delete_notations[$crc])->delete();
                }                
            }
            
            
            
            
            $notationtype_array = $d->notationtype_array;            
            $count_notationtype_array = sizeof($notationtype_array);
            if($count_notationtype_array > 0 ){
                for($i=0;$i<$count_notationtype_array;$i++){
                    
                    $type_id = $notationtype_array[$i]->notationtype;
                    $notation = $notationtype_array[$i]->notationtitle;                    
                    $notation_by = $notationtype_array[$i]->notationby;
                    $notation_date = $this->changeDateformate($notationtype_array[$i]->notationdate);
                    
                    
                    
                    
                    if(isset($notationtype_array[$i]->id)){
                        DB::table('consumer_account_notations')
                        ->where("id",$notationtype_array[$i]->id)
                                ->update([
                                    'consumer_id' => $id,
                                    'type_id' => $type_id,
                                    'notation' => $notation,
                                    'notation_by' => $notation_by,  
                                    'notation_date' => $notation_date, 
                                    'updated_date' => $date,
                                    
                                ]);
                    }else{

                        if($type_id!='' ){
                        
                            DB::table('consumer_account_notations')
                                ->insert([
                                    'consumer_id' => $id,
                                    'type_id' => $type_id,
                                    'notation' => $notation,
                                    'notation_by' => $notation_by,  
                                    'notation_date' => $notation_date,   
                                    'created_date' => $date,
                                    
                                ]);
                        }
                    }
                }
            }
            
            
            
            
            
            
            
            
                
            
            
            



            return response()->json(['message' => 'Updated Successfully!','class' => 'success']);
            
            
            
            
        }else{
            
            $data = array();
            $data['roles'] = DB::table('roles')->get();
            $data['races'] = DB::table('races')->get();
            $data['axis_levels'] = DB::table('axis_levels')->get();
            $data['primaries'] = DB::table('primaries')->get();
            $data['reactions'] = DB::table('reactions')->get();
            $data['notation_types'] = DB::table('notation_types')->get();
            $data['marital_statuss'] = DB::table('marital_status')->get();
            $data['smoker_statuss'] = DB::table('smoker_status')->get();
            $data['ethnicities'] = DB::table('ethnicities')->get();
            $data['services'] = DB::table('services')->get();
            $data['languages'] = DB::table('languages')->get();
            $data['qualifications'] = DB::table('qualifications')->get();
            $data['certfication_types'] = DB::table('certfication_types')->get();
            $data['relations'] = DB::table('relations')->get();
            $data['countries'] = DB::table('countries')->get();
            $data['states'] = DB::table('states')->get();
            $data['payers'] = DB::table('payers')->get();
            $data['supervisors'] = DB::table('users')->where('role_id','!=','0')->get();
            $consumer = DB::table('consumers')->where('id',$id)->first();
            $consumer->service_date = date_format(date_create($consumer->service_date), 'm-d-Y');
            $consumer->admission_date = date_format(date_create($consumer->admission_date), 'm-d-Y');
            $consumer->discharge_date = date_format(date_create($consumer->discharge_date), 'm-d-Y');
            $data['consumer'] = $consumer;
            $consumer_addresses = DB::table('consumer_addresses')->where('consumer_id',$id)->first();
            $consumer_addresses->types = unserialize($consumer_addresses->types);
            $consumer_addresses->a_types = unserialize($consumer_addresses->a_types);
            
            $data['consumer_addresses'] = $consumer_addresses;
            
            $data['consumer_persons'] = DB::table('consumer_persons')->where('consumer_id',$id)->get();   
            $data['consumer_payers'] = DB::table('consumer_payers')->where('consumer_id',$id)->get();  
            $data['consumer_phones'] = DB::table('consumer_phones')->where('consumer_id',$id)->get();
            $consumer_diagnosis = DB::table('consumer_diagnosis')->where('consumer_id',$id)->get();
            foreach($consumer_diagnosis as $consumer_diagn){
                $consumer_diagn->d_date = date_format(date_create($consumer_diagn->d_date), 'm-d-Y');
            }
            $data['consumer_diagnosis']  = $consumer_diagnosis;
            $data['consumer_medications'] = DB::table('consumer_medications')->where('consumer_id',$id)->get();
            $data['consumer_allergies'] = DB::table('consumer_allergies')->where('consumer_id',$id)->get();
            $consumer_account_notations = DB::table('consumer_account_notations')->where('consumer_id',$id)->get();
            foreach($consumer_account_notations as $consumer_account_notation){
                $consumer_account_notation->notation_date = date_format(date_create($consumer_account_notation->notation_date), 'm-d-Y');
            }
            $data['consumer_account_notations'] = $consumer_account_notations;
            $data['consumer_statuses'] = DB::table('consumer_status')->get();
            return view('consumer/consumers-edit',$data);
        }
        
    }
    
    
    public function pdfConsumerAll(Request $request)
    {
    
        $data = array();
        if($request->isMethod('post')){
            $print_array = $request->print_array;
            $total_array = sizeof($print_array);
            $userData = array();
            for($i=0;$i<$total_array;$i++){
                
                
                $fileid = $print_array[$i]['id'];
                $consumer = DB::table('consumers')->where('id', $fileid)->first();
                if($consumer){
      
                    $data['consumers'][$i] = array(
                            'salutation' =>$consumer->salutation,
                            'fname' =>$consumer->fname,
                            'lname' =>$consumer->lname,
                            'gender' =>$consumer->gender,
                            'dob' =>$consumer->dob ,
                            'email' =>$consumer->email,
                            'status' =>$consumer->status,
                            'record_no' =>$consumer->record_no,
                            'service_date' =>$consumer->service_date,
                            'created_date' =>$consumer->created_date,
  
                        );
                }
                
                
                
            }
            
            
            $pdf = PDF::loadView('pdfs/consumerall', $data);

            $pdf->save('public/downloads/consumerall.pdf');

            return response()->json(['success' => 1]);
        }
    }
    
    
    
    public function consumerDetail($id)
    {
        $data['consumer'] = DB::table('consumers')->where('id',$id)->first();
        
        return view('consumer/consumers-details',$data);
    }
    
    public function checkConsumerEmail(Request $request)
    {
        if($request->isMethod('post')){
            $email = $request->email;
            $emailEsist = DB::table('consumers')->where('email',$email)->first();
            
            if($emailEsist){
                return response()->json(['success' => 1]);
            }else{
                return response()->json(['success' => 0]);
            }
        }
    }
}
