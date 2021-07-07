<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use DataTables;
use Illuminate\Support\Facades\Mail;
use PDF;
use Illuminate\Support\Facades\File; 

class AssessmentController extends Controller
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
        $data['assessments'] = DB::table('assessments')->get();        
        return view('assessment/assessments-listing',$data);
    }
    
    public function getAssessments()
    {
        
        if(request()->ajax()) {
            $datas = DB::table('assessments')->get();
            
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
                
                $payer_name = '';
                $payer = DB::table('consumer_payers')->where('consumer_id',$data->consumer_id)->first();
                if($payer){
                    $payer_data = DB::table('payers')->where('id',$payer->payer_id)->first();
                    if($payer_data){
                        $payer_name = $payer_data->title;
                    }
                }
                
                $assignee_name = 'Unassigned';
                $assignee = DB::table('users')->where('id',$data->assignee)->first();
                if($assignee){
                    $assignee_name = $assignee->fname.' '.$assignee->lname;
                }
                $dataarray[$i]= (object) array(
                                    'id'=>$data->id,       
                                    'assessment_no'=>$data->assessment_no,
                                    'location'=>$data->location,
                                    'consumer'=>$name,
                                    'communication'=>$data->communication,
                                    'payer_name'=>$payer_name,
                                    'assignee_name'=>$assignee_name,
                                    'assessment_date'=>$data->assessment_date,
                                    'total_hours'=>'0',
                                    'created_at'=>$data->created_date,
                                    'status'=>$status,
                                    );

                
                $i++;
            }
            
            $collection = collect($dataarray);
            
           
            
            return Datatables::of($collection)
            ->addColumn('assessment_no', function($row){
                    $actionBtn = '<a href="assessments-details/'.$row->id.'" data="'.$row->id.'" class="editdata" >'.$row->assessment_no.'</a>';
                    return $actionBtn;
                })
            ->addColumn('chkbox', function($row){
                    $actionBtn = '<input value="'.$row->id.'"  name="empids" type="checkbox" class="add-new-icon" />';
                    return $actionBtn;
                })
            ->rawColumns(['assessment_no','chkbox'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('assessment/assessments-listing');
        
    }
    
    public function deleteAssessments(Request $request)
    {
        
        if($request->isMethod('post')){
            //dd($request->delids_array);
            $delids_arrays = $request->delids_array;
            $total_array = sizeof($delids_arrays);
            
            for($i=0;$i<$total_array;$i++){

                

                $fileid = $delids_arrays[$i]['id'];
                
                $file = DB::table('assessment_documents')->where('assessment_id', $fileid)->first();
                if($file){
                    $path = public_path('files/'.$file->document);
                    $isExists = file_exists($path);
                    if($isExists){
                        File::delete($path);
                        DB::table('assessment_documents')->where('assessment_id', $fileid)->delete();
                    }
                }
                
                $assessment_assessors = DB::table('assessment_assessors')->where('assessment_id', $fileid)->first();
                if($assessment_assessors){
                    DB::table('assessment_assessors')->where('assessment_id', $fileid)->delete();
                }
                
                $assessment_behaviors = DB::table('assessment_behaviors')->where('assessment_id', $fileid)->first();
                if($assessment_behaviors){
                    DB::table('assessment_behaviors')->where('assessment_id', $fileid)->delete();
                }
                
                $assessment_functions = DB::table('assessment_functions')->where('assessment_id', $fileid)->first();
                if($assessment_functions){
                    DB::table('assessment_functions')->where('assessment_id', $fileid)->delete();
                }
                
                $assessment_persons = DB::table('assessment_persons')->where('assessment_id', $fileid)->first();
                if($assessment_persons){
                    DB::table('assessment_persons')->where('assessment_id', $fileid)->delete();
                }
                
                $assessment_problems = DB::table('assessment_problems')->where('assessment_id', $fileid)->first();
                if($assessment_problems){
                    DB::table('assessment_problems')->where('assessment_id', $fileid)->delete();
                }
                
                
                DB::table('assessments')->where('id', $fileid)->delete();
                
                
                
            }
            return response()->json(['message' => 'Deleted Successfully!','class' => 'success']);
        }
    }
    
    
    
    public function changeDateformate($date){
        $a = explode("-",$date);
        $b = $a[2].'-'.$a[0].'-'.$a[1];
        return $b;
    }
    
    
    public function addAssessment(Request $request)
    {
        
        if($request->isMethod('post')){
            $d = json_decode($request->options);
            //dd($d);
            $consumername = $d->consumername;
            $assessment_id = $d->assessment_id;
            $assessment_no = $d->assessment_no;
            $location_name = $d->location_name;
            $communication = $d->communication;
            $serviceslist = serialize($d->serviceslist);
            $record_no = $d->record_no;     
            $date_add = NULL;
            if($d->date_add!=NULL){
                $date_add = $this->changeDateformate($d->date_add);
            }
            $status = $d->status;    
            $assignee = 0;
            if($d->assignee!=NULL){
                $assignee = $d->assignee;
            }
            $spent_time = $d->spent_time;   
            
            $due_date = NULL;
            if($d->due_date!=NULL){
                $due_date = $this->changeDateformate($d->due_date);
            }
            
            $date = date('Y-m-d');
            //dd($request->TotalFiles);
            
            
            $id = DB::table('assessments')
            ->insertGetId([
                'consumer_id' => $consumername,
                'assessment_no' => $assessment_no,
                'location' => $location_name,
                'communication' => $communication,
                'services' => $serviceslist,
                'record_no' => $record_no,
                'assessment_date' => $date_add,
                'assignee' => $assignee,
                'spent_time' => $spent_time,
                'due_date' => $due_date,                
                'status' => $status,
                'created_date' => $date,
            ]);
            
            if($id){
                $contact_type_arrays = $d->contact_type_array;
                foreach($contact_type_arrays as $key => $val){
                    if($val->firstname!=''  && $val->salutation!=''){
                            DB::table('assessment_persons')
                                ->insert([
                                    'assessment_id' => $id,
                                    'salutation' => $val->salutation,
                                    'fname' => $val->firstname,
                                    'lname' => $val->lastname,
                                    'relation' => $val->relationship,
                                    'mobile' => $val->phonenumber,
                                    'created_date' => $date,
                                ]);
                        }
                        
                }

                $problem_arrays = $d->problem_array;
                foreach($problem_arrays as $key => $val){
                    if($val->author!=''  ){
                            DB::table('assessment_problems')
                                ->insert([
                                    'assessment_id' => $id,
                                    'author' => $val->author,
                                    'strength' => $val->pstrength,
                                    'score' => $val->pscore,
                                    'created_date' => $date,
                                ]);
                        }
                        
                }
                
                
                $behavior_arrays = $d->behavior_array;
                foreach($behavior_arrays as $key => $val){
                    if($val->author!=''  ){
                            DB::table('assessment_behaviors')
                                ->insert([
                                    'assessment_id' => $id,
                                    'author' => $val->author,
                                    'context' => $val->bcontext,
                                    'concern' => $val->bconcern,
                                    'intervention' => $val->bintervention,
                                    'created_date' => $date,
                                ]);
                        }
                        
                }
                
                $assessor_arrays = $d->assessor_array;
                foreach($assessor_arrays as $key => $val){
                    if($val->aproblem!=''  ){
                            DB::table('assessment_assessors')
                                ->insert([
                                    'assessment_id' => $id,
                                    'problem' => $val->aproblem,
                                    'context' => $val->acontext,
                                    'created_date' => $date,
                                ]);
                        }
                        
                }
                
                $function_arrays = $d->function_array;
                
                
                
                $vrd = 0;
                foreach($function_arrays as $key => $val){
                    if($val->medical!=''  ){
                            DB::table('assessment_functions')
                                ->insert([
                                    'assessment_id' => $id,
                                    'medical' => $val->medical,
                                    'mental' => $val->mental,
                                    'education' => $val->education,
                                    'leagal' => $val->leagal,
                                    'social' => $val->social,
                                    'selfharm' => $val->selfharm,
                                    'others' => $val->others,
                                    'type' => $vrd,
                                    'created_date' => $date,
                                ]);
                        }
                        
                        $vrd++;
                        
                }
                
                if($request->TotalFiles > 0)
                {
                    
                    for ($x = 0; $x < $request->TotalFiles; $x++) 
                    {
                       
                         
                        if ($request->hasFile('files'.$x)) 
                        { 
                            //echo "aaaa";

                            $file      = $request->file('files'.$x);
                            $destinationPath = 'public/files';

                            $ext = $file->getClientOriginalExtension();
                            $new_fileprefix = uniqid().'_'.time();
                            $filename = $new_fileprefix.'.'.$ext;

                            $file->move($destinationPath,$filename);
                            
                            DB::table('assessment_documents')
                            ->insert([
                                'assessment_id' => $id,
                                'document' => $filename,
                               
                                
                            ]);

                        }
                    }
                }
                
                
                
                
                

                
                return response()->json(['message' => 'Added Successfully!','class' => 'success']);
            }else{
                return response()->json(['message' => 'Something Wrong!','class' => 'danger']);
            }
            
            
        }else{
            $data = array();        
            $data['assessment_types'] = DB::table('assessment_types')->get();
            $data['consumers'] = DB::table('consumers')->get();
            $assessment_data= DB::table('assessments')->orderBy('id', 'DESC')->first();
            $data['assessment_id'] = $assessment_data->id +1;
            $data['services'] = DB::table('services')->get();
            $data['relations'] = DB::table('relations')->get();
            $data['users'] = DB::table('users')->where('role_id','!=',0)->get();
            return view('assessment/assessments-add',$data);
        }
    }
    
    
    public function editAssessment(Request $request,$id)
    {
        
        if($request->isMethod('post')){
            $d = json_decode($request->options);
            //dd($d);
            $consumername = $d->consumername;
            $assessment_id = $d->assessment_id;
            $assessment_no = $d->assessment_no;
            $location_name = $d->location_name;
            $communication = $d->communication;
            $serviceslist = serialize($d->serviceslist);
            $record_no = $d->record_no;     
            $date_add = NULL;
            if($d->date_add!=NULL){
                $date_add = $this->changeDateformate($d->date_add);
            }
            $status = $d->status;    
            $assignee = 0;
            if($d->assignee!=NULL){
                $assignee = $d->assignee;
            }
            $spent_time = $d->spent_time;   
            
            $due_date = NULL;
            if($d->due_date!=NULL){
                $due_date = $this->changeDateformate($d->due_date);
            }
            
            $date = date('Y-m-d');
            //dd($request->TotalFiles);
            
            
            DB::table('assessments')
            ->where('id',$id)
            ->update([
                'consumer_id' => $consumername,
                'assessment_no' => $assessment_no,
                'location' => $location_name,
                'communication' => $communication,
                'services' => $serviceslist,
                'record_no' => $record_no,
                'assessment_date' => $date_add,
                'assignee' => $assignee,
                'spent_time' => $spent_time,
                'due_date' => $due_date,                
                'status' => $status,
                'created_date' => $date,
            ]);
            
            if($id){
                
                
                $editcontacts_arrays = $d->editpersons_array;
                $get_existing_editpersons = DB::table('assessment_persons')->where('assessment_id',$id)->get();
                $conts = array();            
                foreach($get_existing_editpersons as $get_existing_editperson){
                    
                    array_push($conts,$get_existing_editperson->id);
                    
                }
                
                $new_conts = array();  
                foreach($editcontacts_arrays as $editcontacts_array){
                    array_push($new_conts,$editcontacts_array->editpersons);
                }
                $delete_conts = array_diff($conts,$new_conts);
                $delete_conts = array_values($delete_conts);
                $total_del_cont = sizeof($delete_conts);
                if($total_del_cont > 0 ){
                    for($crc=0;$crc<$total_del_cont;$crc++){
                        DB::table('assessment_persons')->where('id',$delete_conts[$crc])->delete();
                    }
                    
                }
                
                
                
                $contact_type_array = $d->contact_type_array;
                
                $count_contact_type = sizeof($contact_type_array);
                if($count_contact_type > 0 ){
                    for($i=0;$i<$count_contact_type;$i++){
                        
                        $contact_type = $contact_type_array[$i]->salutation;
                        $firstname = $contact_type_array[$i]->firstname;
                        $lastname = $contact_type_array[$i]->lastname;
                        $relationship = $contact_type_array[$i]->relationship;
                        $phonenumber = $contact_type_array[$i]->phonenumber;

                        
                        
                        if(isset($contact_type_array[$i]->id)){
                            DB::table('assessment_persons')
                            ->where("id",$contact_type_array[$i]->id)
                                    ->update([
                                        'assessment_id' => $id,
                                        'salutation' => $contact_type,
                                        'fname' => $firstname,
                                        'lname' => $lastname,
                                        'relation' => $relationship,
                                        'mobile' => $phonenumber,
                                        'updated_date' => $date,
                                        
                                    ]);
                        }else{

                            if($firstname!=''  && $lastname!=''){
                            
                                DB::table('assessment_persons')
                                    ->insert([
                                        'assessment_id' => $id,
                                        'salutation' => $contact_type,
                                        'fname' => $firstname,
                                        'lname' => $lastname,
                                        'relation' => $relationship,
                                        'mobile' => $phonenumber,                                     
                                        'created_date' => $date,
                                        
                                    ]);
                            }
                        }
                    }
                }
                
                
                
                
                
                $editproblems_arrays = $d->editproblems_array;
                $get_existing_editproblems = DB::table('assessment_problems')->where('assessment_id',$id)->get();
                $probs = array();            
                foreach($get_existing_editproblems as $get_existing_editproblem){
                    
                    array_push($probs,$get_existing_editproblem->id);
                    
                }
                
                $new_probs = array();  
                foreach($editproblems_arrays as $editproblems_array){
                    array_push($new_probs,$editproblems_array->editproblems);
                }
                $delete_probs = array_diff($probs,$new_probs);
                $delete_probs = array_values($delete_probs);
                $total_del_prob = sizeof($delete_probs);
                if($total_del_prob > 0 ){
                    for($crc=0;$crc<$total_del_prob;$crc++){
                        DB::table('assessment_problems')->where('id',$delete_probs[$crc])->delete();
                    }
                    
                }
                
                
                
                $problem_array = $d->problem_array;
                
                $count_problem_array = sizeof($problem_array);
                if($count_problem_array > 0 ){
                    for($i=0;$i<$count_problem_array;$i++){
                        
                        $author = $problem_array[$i]->author;
                        $pstrength = $problem_array[$i]->pstrength;
                        $pscore = $problem_array[$i]->pscore;
                       
                        
                        
                        if(isset($problem_array[$i]->id)){
                            DB::table('assessment_problems')
                            ->where("id",$problem_array[$i]->id)
                                    ->update([
                                        'assessment_id' => $id,
                                        'author' => $author,
                                        'strength' => $pstrength,
                                        'score' => $pscore,
                                        'updated_date' => $date,
                                        
                                    ]);
                        }else{

                            if($pstrength!=''  ){
                            
                                DB::table('assessment_problems')
                                    ->insert([
                                        'assessment_id' => $id,
                                        'author' => $author,
                                        'strength' => $pstrength,
                                        'score' => $pscore,                                     
                                        'created_date' => $date,
                                        
                                    ]);
                            }
                        }
                    }
                }
                
                
                
                
                $editbehaviors_arrays = $d->editbehaviors_array;
                $get_existing_editbehaviors = DB::table('assessment_behaviors')->where('assessment_id',$id)->get();
                $behavs = array();            
                foreach($get_existing_editbehaviors as $get_existing_editbehavior){
                    
                    array_push($behavs,$get_existing_editbehavior->id);
                    
                }
                
                $new_behavs = array();  
                foreach($editbehaviors_arrays as $editbehaviors_array){
                    array_push($new_behavs,$editbehaviors_array->editbehaviors);
                }
                $delete_behavs = array_diff($behavs,$new_behavs);
                $delete_behavs = array_values($delete_behavs);
                $total_del_behavs = sizeof($delete_behavs);
                if($total_del_behavs > 0 ){
                    for($crc=0;$crc<$total_del_behavs;$crc++){
                        DB::table('assessment_behaviors')->where('id',$delete_behavs[$crc])->delete();
                    }
                    
                }
                
                
                
                $behavior_array = $d->behavior_array;
                
                $count_behavior_array = sizeof($behavior_array);
                if($count_behavior_array > 0 ){
                    for($i=0;$i<$count_behavior_array;$i++){
                        
                        $author = $behavior_array[$i]->author;
                        $context = $behavior_array[$i]->bcontext;
                        $concern = $behavior_array[$i]->bconcern;
                        $intervention = $behavior_array[$i]->bintervention;
                        
                        
                        if(isset($behavior_array[$i]->id)){
                            DB::table('assessment_behaviors')
                            ->where("id",$behavior_array[$i]->id)
                                    ->update([
                                        'assessment_id' => $id,
                                        'author' => $author,
                                        'context' => $context,
                                        'concern' => $concern,
                                        'intervention' => $intervention,
                                        'updated_date' => $date,
                                        
                                    ]);
                        }else{

                            if($author!=''  ){
                            
                                DB::table('assessment_behaviors')
                                    ->insert([
                                        'assessment_id' => $id,
                                        'author' => $author,
                                        'context' => $context,
                                        'concern' => $concern,
                                        'intervention' => $intervention,                                     
                                        'created_date' => $date,
                                        
                                    ]);
                            }
                        }
                    }
                }
                
                
                
                
                $editassessors_arrays = $d->editassessors_array;
                $get_existing_editassessors = DB::table('assessment_assessors')->where('assessment_id',$id)->get();
                $asses = array();            
                foreach($get_existing_editassessors as $get_existing_editassessor){
                    
                    array_push($asses,$get_existing_editassessor->id);
                    
                }
                
                $new_asses = array();  
                foreach($editassessors_arrays as $editassessors_array){
                    array_push($new_asses,$editassessors_array->editassessors);
                }
                $delete_asses = array_diff($asses,$new_asses);
                $delete_asses = array_values($delete_asses);
                $total_del_asses = sizeof($delete_asses);
                if($total_del_asses > 0 ){
                    for($crc=0;$crc<$total_del_asses;$crc++){
                        DB::table('assessment_assessors')->where('id',$delete_asses[$crc])->delete();
                    }
                    
                }
                
                
                
                $assessor_array = $d->assessor_array;
                
                $count_assessor_array = sizeof($assessor_array);
                if($count_assessor_array > 0 ){
                    for($i=0;$i<$count_assessor_array;$i++){
                        
                        $problem = $assessor_array[$i]->aproblem;
                        $context = $assessor_array[$i]->acontext;
                        
                        
                        
                        if(isset($assessor_array[$i]->id)){
                            DB::table('assessment_assessors')
                            ->where("id",$assessor_array[$i]->id)
                                    ->update([
                                        'assessment_id' => $id,
                                        'problem' => $problem,
                                        'context' => $context,
                                        'updated_date' => $date,
                                        
                                    ]);
                        }else{

                            if($problem!=''  ){
                            
                                DB::table('assessment_assessors')
                                    ->insert([
                                        'assessment_id' => $id,
                                        'problem' => $problem,
                                        'context' => $context,                                     
                                        'created_date' => $date,
                                        
                                    ]);
                            }
                        }
                    }
                }
                
                
                
                
                
                
                $function_arrays = $d->function_array; 
                //dd($function_arrays);
                $vrd = 0;
                foreach($function_arrays as $key => $val){
                    

                    
                            DB::table('assessment_functions')
                                ->where('id',$val->idval)
                                //->where('type',$vrd)
                                ->update([
                                    'medical' => $val->medical,
                                    'mental' => $val->mental,
                                    'education' => $val->education,
                                    'leagal' => $val->leagal,
                                    'social' => $val->social,
                                    'selfharm' => $val->selfharm,
                                    'others' => $val->others,
                                    'created_date' => $date,
                                ]);
                        
                       
                        $vrd++;
                        
                }
              
                
                
                if($request->TotalFiles > 0)
                {
                    
                    for ($x = 0; $x < $request->TotalFiles; $x++) 
                    {
                       
                         
                        if ($request->hasFile('files'.$x)) 
                        { 
                            //echo "aaaa";

                            $file      = $request->file('files'.$x);
                            $destinationPath = 'public/files';

                            $ext = $file->getClientOriginalExtension();
                            $new_fileprefix = uniqid().'_'.time();
                            $filename = $new_fileprefix.'.'.$ext;

                            $file->move($destinationPath,$filename);
                            
                            DB::table('assessment_documents')
                            ->insert([
                                'assessment_id' => $id,
                                'document' => $filename,
                               
                                
                            ]);

                        }
                    }
                }
                
                
                
                
                
                

                
                return response()->json(['message' => 'Added Successfully!','class' => 'success']);
            }else{
                return response()->json(['message' => 'Something Wrong!','class' => 'danger']);
            }
            
            
        }else{
            $data = array();        
            $data['assessment_types'] = DB::table('assessment_types')->get();
            $data['consumers'] = DB::table('consumers')->get();
            $data['servicesdatas'] = DB::table('services')->get();
            $data['relations'] = DB::table('relations')->get();
            $data['users'] = DB::table('users')->where('role_id','!=',0)->get();
            $assessments = DB::table('assessments')->where('id',$id)->first();
            $services = array();
            if(isset($assessments->services)){
                if($assessments->services!=''){
                    
                    $servicesData = unserialize($assessments->services);
                    if(is_array($servicesData)){
                        foreach($servicesData as $service){
                            $service = DB::table('services')->where('id',$service->service)->first();
                            $services[$service->id] = $service->title;
                        }
                    }
                }
            }
            
            $data['services'] = $services;
            
            $assessments->assessment_date = date("m-d-Y",strtotime($assessments->assessment_date));
            $data['assessments'] = $assessments;
            $data['assessment_assessors'] = DB::table('assessment_assessors')->where('assessment_id',$id)->get();
            $data['assessment_assessor_notes'] = DB::table('assessment_assessor_notes')->where('assessment_id',$id)->get();
            $data['assessment_behaviors'] = DB::table('assessment_behaviors')->where('assessment_id',$id)->get();
            $data['assessment_persons'] = DB::table('assessment_persons')->where('assessment_id',$id)->get();
            $data['assessment_problems'] = DB::table('assessment_problems')->where('assessment_id',$id)->get();
            $data['assessment_documents'] = DB::table('assessment_documents')->where('assessment_id',$id)->get();
            $data['assessment_functions'] = DB::table('assessment_functions')->where('assessment_id',$id)->get();
        
            return view('assessment/assessments-edit',$data);
        }
    }
    



    public function mailAssessment(Request $request,$id)
    {
        $data = array();
       
        $assessmentdata = DB::table('assessments')->where('id',$id)->first();
        $data['assessment'] = $assessmentdata;
        
        $mailsend =  Mail::send('mails.assessment',
           $data, function($message)
               {
                   $message->from('sarvesh.patel@cre8ivelabs.com');
                   $message->to('sarvesh.patel@cre8ivelabs.com', 'Admin')->subject('Assessment ');
               });
               
               

        
        //dd($mailsend);
        
        
    }
    
    
    public function pdfAssessment(Request $request,$id)
    {

        $data = array();
        $assessmentdata = DB::table('assessments')->where('id',$id)->first();
        $data['assessment'] = $assessmentdata;

        $pdf = PDF::loadView('pdfs/assessment', $data);

        return  $pdf->download('Assessment.pdf');
    }
    
    
    public function pdfAssessmentAll(Request $request)
    {
    
        $data = array();
        if($request->isMethod('post')){
            $print_array = $request->print_array;
            $total_array = sizeof($print_array);
            $userData = array();
            for($i=0;$i<$total_array;$i++){
                
                
                $fileid = $print_array[$i]['id'];
                $assessment = DB::table('assessments')->where('id', $fileid)->first();
                if($assessment){
      
                    $data['assessments'][$i] = array(
                            'consumer_id' =>$assessment->consumer_id,
                            'assessment_no' =>$assessment->assessment_no,
                            'location' =>$assessment->location,
                            'communication' =>$assessment->communication,
                            'services' =>$assessment->services ,
                            'record_no' =>$assessment->record_no,
                            'assessment_date' =>$assessment->assessment_date,
                        );
                }
                
                
                
            }
            
            
            $pdf = PDF::loadView('pdfs/assessmentall', $data);

            $pdf->save('public/downloads/assessmentall.pdf');

            return response()->json(['success' => 1]);
        }
    }
    

    
    public function assessmentDetail(Request $request, $id)
    {
        $assessments = DB::table('assessments')->where('id',$id)->first();
        $services = array();
        if(isset($assessments->services)){
            if($assessments->services!=''){
                
                $servicesData = unserialize($assessments->services);
                
                if(is_array($servicesData)){
                    foreach($servicesData as $service){
                        if($service->service!=''){
                            $service = DB::table('services')->where('id',$service->service)->first();
                            array_push($services,$service->title);
                        }
                    }
                }
            }
        }
        $data['services'] = $services;
        $consumers = DB::table('consumers')->where('id',$assessments->consumer_id)->first();
        $assessments->consumer_id = $consumers->fname.' '.$consumers->lname;
        
        $assessments->assignee = 'Unassigned';
        if($assessments->assignee!=0){
            $users = DB::table('users')->where('id',$assessments->assignee)->first();
            $assessments->assignee = $users->fname.' '.$users->lname;
        }
        
        
        $data['assessments'] = $assessments;
        $data['assessment_assessors'] = DB::table('assessment_assessors')->where('assessment_id',$id)->get();
        $data['assessment_assessor_notes'] = DB::table('assessment_assessor_notes')->where('assessment_id',$id)->get();
        $data['assessment_behaviors'] = DB::table('assessment_behaviors')->where('assessment_id',$id)->get();
        $data['assessment_persons'] = DB::table('assessment_persons')->where('assessment_id',$id)->get();
        $data['assessment_problems'] = DB::table('assessment_problems')->where('assessment_id',$id)->get();
        $data['assessment_documents'] = DB::table('assessment_documents')->where('assessment_id',$id)->get();
        $data['assessment_functions'] = DB::table('assessment_functions')->where('assessment_id',$id)->get();
        
        
        
        return view('assessment/assessments-details',$data);
    }
    
    public function assessmentType()
    {
        $data = array();        
        $data['assessment_types'] = DB::table('assessment_types')->get();        
        return view('assessment_type/assessment-type-listing',$data);
        
    }
    public function addAssessmentType(Request $request)
    {
        if($request->isMethod('post')){
            
            
            
            //dd($request);
            $title = $request->input('title');
            
            
            DB::table('assessment_types')
            ->insert([
                'title' => $title,
                
            ]);
            
            return redirect('/assessment-types');

        }else{
            return view('assessment_type/assessment-type-add');
        }
    }
    public function editAssessmentType(Request $request,$id)
    {
        if($request->isMethod('post')){
            
            
            

            $title = $request->input('title');
            
            DB::table('assessment_types')
            ->where('id', $id)
            ->update([
                'title' => $title,
                
            ]);
            
            return redirect('/assessment-types');

        }else{
            $data = array();
            $data['assessment_type'] = DB::table('assessment_types')->where('id', $id)->first();
            return view('assessment_type/assessment-type-edit',$data);
        }
    }
    
    public function assessmentTypeDetail(Request $request,$id)
    {
        return view('assessment_type/assessment-type-details');
    }
    
    
}
