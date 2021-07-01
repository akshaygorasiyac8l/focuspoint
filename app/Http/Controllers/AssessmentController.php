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
                
                
                $dataarray[$i]= (object) array(
                                    'id'=>$data->id,       
                                    'assessment_no'=>$data->assessment_no,
                                    'location'=>$data->location,
                                    'consumer'=>$name,
                                    'communication'=>$data->communication,
                                    'payer_name'=>'payer_name',
                                    'employee_name'=>'employee_name',
                                    'assessment_date'=>$data->assessment_date,
                                    'total_hours'=>'total_hours',
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
                
                /*
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
                */
                
                
                
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
              
                /*
                
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
                */
                
                
                
                
                

                
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
