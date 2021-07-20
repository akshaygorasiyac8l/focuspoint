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
    
    
    public function getAssessmentList()
    {
        if(request()->ajax()) {
            $datas = DB::table('assessments')->where('parent_assessment_id',0)->get();

            $dataarray =  array();
            $i=0;
            
            foreach($datas as $data){

                
                $name = $data->assessment_no;

               
                $dataarray[$i]= (object) array(
                                    'id'=>$data->id,       
                                    'name'=>$name,


                                    );

                
                $i++;
            }
            
            $collection = collect($dataarray);
            return $collection;
        }
        
    }
    
    

    public function getOtherassessments(Request $request)
    {
        
		
        if(request()->ajax()) {
            $datas = DB::table('assessments')->where('parent_assessment_id',$request->assessment_id)->where('parent_assessment_id','!=',0)->get();
            
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
				
				
				if($data->subtype_id=='1'){
                    $subtype = 'Annual Assessment';
                }else if($data->subtype_id=='2'){
                    $subtype = 'Reassessment';
                }else{
                    $subtype = '-';
                }
                
                $consumer = DB::table('consumers')->where('id',$data->consumer_id)->first();
                $name = $consumer->fname.' '.$consumer->lname;
                
                $payer_name = '-';
                $payer = DB::table('consumer_payers')->where('consumer_id',$data->consumer_id)->where('makeasprimary',1)->first();
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
									'subtype'=>$subtype,
                                    'consumer'=>$name,
                                    'communication'=>$data->communication,
                                    'payer_name'=>$payer_name,
                                    'assignee_name'=>$assignee_name,
                                    'assessment_date'=>date('m/d/Y',strtotime($data->assessment_date)),
                                    'total_hours'=>$this->getTotalSpendtimeByAssessmentId($data->id),
                                    'created_at'=>date('m/d/Y',strtotime($data->created_date)),
                                    'status'=>$status,
                                    );

                
                $i++;
            }
            
            //$collection = collect($dataarray);
			
			
            return response()->json(['suceess' => '1','data' => $dataarray]);
            

		}	
	}		
	
    public function getAssessments()
    {
        
        if(request()->ajax()) {
            $datas = DB::table('assessments')->where('parent_assessment_id',0)->get();
            
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
                $payer = DB::table('consumer_payers')->where('consumer_id',$data->consumer_id)->where('makeasprimary',1)->first();
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
                                    'assessment_date'=>date('m/d/Y',strtotime($data->assessment_date)),
                                    'total_hours'=>$this->getTotalSpendtimeByAssessmentId($data->id),
                                    'created_at'=>date('m/d/Y',strtotime($data->created_date)),
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
			->addColumn('arrow', function($row){
				$actionBtn = '<a href="javascript:;" value="'.$row->id.'"   class="showDatas" >>></a>';
				return $actionBtn;
			})
            ->rawColumns(['assessment_no','chkbox','arrow'])
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
    
    
    public function searchAssessments(Request $request)
    {
        if(request()->ajax()) {
           
            
            $search_name = '';
            if($request->search_name!=''){
                $search_name = " and c.`fname` like "."'%".$request->search_name."%'";
            }
            
            $emp_name = '';
            if($request->emp_name!=''){
                $emp_name = " and c.`lname` like "."'%".$request->emp_name."%'";
            }
            
            /*
            $start_date = '';
            if($request->start_date!=''){
                $start_date = " and c.dob= '".$this->changeDateformate($request->start_date)."' ";
            }
            
            $end_date = '';
            if($request->end_date!=''){
                $end_date = " and c.dob= '".$this->changeDateformate($request->end_date)."' ";
            }
            */
            
            $created_date = '';
            if($request->created_date!=''){
                $created_date = " and c.created_date= '".$this->changeDateformate($request->created_date)."' ";
            }
            

            
            $status_query = '';
            if($request->status!=''){
                $status_query = " and a.status= '".$request->status."' ";
            }
            
           
            $consumer_query_a = ',c.*';
            $consumer_query = 'left join consumers as c on   c.id = a.consumer_id  ';
            $consumer_query_new = '';
            if($request->search_name){
                $consumer_query_a = ',c.*';
                $consumer_query  = ' left join consumers as c on   c.id = a.consumer_id ';  
                $consumer_query_new = " and c.fname like '%".$request->search_name."%' ";
            }
            
            $emp_query_a = '';
            $emp_query = '';
            $emp_query_new = '';
            if($request->emp_name){
                $emp_query_a = ',u.*';
                $emp_query  = ' left join users as u on   u.id = a.assignee ';  
                $emp_query_new = " and u.fname like '".$request->emp_name."' ";
            }

            
            $sql = "select a.*, a.status as assessment_status, a.id as assessment_id  ".$consumer_query_a." ".$emp_query_a." from assessments as a 

            ".$consumer_query."
            ".$emp_query."
            
            where 1=1 
			and a.parent_assessment_id = 0
            
            ".$created_date."
            ".$status_query."

            ".$consumer_query_new."
            ".$emp_query_new."

            ";
            //echo $sql;
            $datas = DB::select($sql);
            //dd($datas);
            $dataarray =  array();
            $i=0;
            //dd($sql);
            foreach($datas as $data){
                
                
                if($data->assessment_status=='0'){
                    $status = 'Open';
                }else if($data->assessment_status=='1'){
                    $status = 'Fixed';
                }else if($data->assessment_status=='2'){
                    $status = 'Completed';
                }else if($data->assessment_status=='3'){
                    $status = 'In-Progress';
                }else{
                    $status = '-';
                }
                
                $name = $data->fname.' '.$data->lname;
                
                $consumers = DB::table('consumers')->where('id',$data->consumer_id)->first();
                $consumer_name =  '';
                if($consumers){
                    $consumer_name = $consumers->fname.' '.$consumers->lname;
                }
                
                
                $consumer_payers = DB::table('consumer_payers')->where('consumer_id',$data->consumer_id)->first();
                if($consumer_payers){
                    $payers = DB::table('payers')->where('id',$consumer_payers->payer_id)->first();
                    $consumer_payer = $payers->title;
                }else{
                    $consumer_payer = '--';
                }
                
                $assignees = DB::table('users')->where('id',$data->assignee)->first();
                if($assignees){
                    
                    $assignee = $assignees->fname.' '.$assignees->lname;
                }else{
                    $assignee = 'Unassigned';
                }
                

               $dataarray[$i]= (object) array(
                                    'id'=>$data->assessment_id,       
                                    'consumer_name'=>$consumer_name,
                                    'assessment_no'=>$data->assessment_no,
                                    'payer_name'=>$consumer_payer,
                                    'assignee'=>$assignee,
                                    'created_date'=>date('m/d/Y',strtotime($data->created_date)),
                                    'status'=>$status,
                                    'assessment_date'=>date('m/d/Y',strtotime($data->assessment_date)),
                                    'total_hours'=>$this->getTotalSpendtimeByAssessmentId($data->id),
                                    );
                                    
               

                
                $i++;
            }
            
            $collection = collect($dataarray);
            return $collection;
        }
        
    }
    
    
    
    public function changeDateformate($date){
        $a = explode("/",$date);
        $b = $a[2].'-'.$a[0].'-'.$a[1];
        return $b;
    }
    
    
    public function addAssessment(Request $request,$type_id,$consumer_id)
    {
        
        if($request->isMethod('post')){
            $d = json_decode($request->options);
            //dd($d);
            $type_id = $d->type_id;
			if($type_id=='1'){
				$type_name ='Behavioral';
			}else{
				$type_name ='Child';
			}
            $assessment_type = $d->assessment_type;
            $consumername = $d->consumername;
            //$assessment_id = $d->assessment_id;
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
            
            $person_desc = NULL;
            if($d->person_desc!=NULL){
                $person_desc = $d->person_desc;
            }
            $behavior_desc = NULL;
            if($d->behavior_desc!=NULL){
                $behavior_desc = $d->behavior_desc;
            }
            $assessor_desc = NULL;
            if($d->assessor_desc!=NULL){
                $assessor_desc = $d->assessor_desc;
            }
			
			
			$sname = NULL;
            if($d->sname!=NULL){
                $sname = $d->sname;
            }
			$district = NULL;
            if($d->district!=NULL){
                $district = $d->district;
            }
			
			if($type_id=='1'){
				$grade = NULL;
				$teacher = NULL;
				$designation = NULL;
				if($d->designation!=NULL){
					$designation = $d->designation;
				}
				$sphone = NULL;
				if($d->sphone!=NULL){
					$sphone = $d->sphone;
				}
				
				
			}else{
				$designation = NULL;
				$sphone = NULL;
				$grade = NULL;
				if($d->designation!=NULL){
					$grade = $d->designation;
				}
				$teacher = NULL;
				if($d->sphone!=NULL){
					$teacher = $d->sphone;
				}
			}
			
            
            
            $id = DB::table('assessments')
            ->insertGetId([
				'parent_assessment_id' => 0,
				'subtype_id' => 0,
                'type_id' => $type_name,
                'assessment_type' => $assessment_type,
                'consumer_id' => $consumername,
                'assessment_no' => $assessment_no,
                'location' => $location_name,
                'communication' => $communication,
                'services' => $serviceslist,
                'record_no' => $record_no,
                'assessment_date' => $date_add,
                'assignee' => $assignee,
                'sname' => $sname,
                'district' => $district,
                'grade' => $grade,
                'teacher' => $teacher,
                'designation' => $designation,
                'sphone' => $sphone,
                'spent_time' => $spent_time,
                'due_date' => $due_date,                
                'status' => $status,
                'created_date' => $date,
            ]);
            
            if($id){
                
                DB::table('assessment_person_desc')
                ->insert([
                     'assessment_id' => $id,
                     'description' => $person_desc,
                    'created_date' => $date,
                ]);
                
                DB::table('assessment_behavior_desc')
                ->insert([
                     'assessment_id' => $id,
                     'description' => $behavior_desc,
                    'created_date' => $date,
                ]);
                
                DB::table('assessment_assessor_desc')
                ->insert([
                     'assessment_id' => $id,
                     'description' => $assessor_desc,
                    'created_date' => $date,
                ]);
            
            
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
            $data['type_id'] = $type_id;            
            $data['consumer_id'] = $consumer_id;  
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
	
	public function getAssessmentById(Request $request)
    {
        $assessments = DB::table('assessments')->where('id',$request->assessment_id)->first();
        if($assessments){
            return response()->json(['success' => 1, 'assessments' => $assessments]);
        }else{
            return response()->json(['success' => 0]);
        }
    }
	
	
	public function addSubAssessment(Request $request,$assessment_id,$subtype_id)
    {
        
        if($request->isMethod('post')){
            $d = json_decode($request->options);
            //dd($d);
            $subtype_id = $subtype_id;
            $parent_assessment_id = $assessment_id;
			$assessments = DB::table('assessments')->where('id', $parent_assessment_id)->first();
            $consumer_id = $assessments->consumer_id;
            $type_id = $assessments->type_id;

			
            $assessment_type = $assessments->assessment_type;
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
            
            $person_desc = NULL;
            if($d->person_desc!=NULL){
                $person_desc = $d->person_desc;
            }
            $behavior_desc = NULL;
            if($d->behavior_desc!=NULL){
                $behavior_desc = $d->behavior_desc;
            }
            $assessor_desc = NULL;
            if($d->assessor_desc!=NULL){
                $assessor_desc = $d->assessor_desc;
            }
			
			
			$sname = NULL;
            if($d->sname!=NULL){
                $sname = $d->sname;
            }
			$district = NULL;
            if($d->district!=NULL){
                $district = $d->district;
            }
			
			if($type_id=='1'){
				$grade = NULL;
				$teacher = NULL;
				$designation = NULL;
				if($d->designation!=NULL){
					$designation = $d->designation;
				}
				$sphone = NULL;
				if($d->sphone!=NULL){
					$sphone = $d->sphone;
				}
				
				
			}else{
				$designation = NULL;
				$sphone = NULL;
				$grade = NULL;
				if($d->designation!=NULL){
					$grade = $d->designation;
				}
				$teacher = NULL;
				if($d->sphone!=NULL){
					$teacher = $d->sphone;
				}
			}
			
			
            
            
            $id = DB::table('assessments')
            ->insertGetId([
				'subtype_id' => $subtype_id,
				'parent_assessment_id' => $parent_assessment_id,
                'type_id' => $type_id,
                'assessment_type' => $assessment_type,
                'consumer_id' => $consumer_id,
                'assessment_no' => $assessment_no,
                'location' => $location_name,
                'communication' => $communication,
                'services' => $serviceslist,
                'record_no' => $record_no,
                'assessment_date' => $date_add,
                'assignee' => $assignee,
				'sname' => $sname,
                'district' => $district,
                'grade' => $grade,
                'teacher' => $teacher,
                'designation' => $designation,
                'sphone' => $sphone,
                'spent_time' => $spent_time,
                'due_date' => $due_date,                
                'status' => $status,
                'created_date' => $date,
            ]);
            
            if($id){
                
                DB::table('assessment_person_desc')
                ->insert([
                     'assessment_id' => $id,
                     'description' => $person_desc,
                    'created_date' => $date,
                ]);
                
                DB::table('assessment_behavior_desc')
                ->insert([
                     'assessment_id' => $id,
                     'description' => $behavior_desc,
                    'created_date' => $date,
                ]);
                
                DB::table('assessment_assessor_desc')
                ->insert([
                     'assessment_id' => $id,
                     'description' => $assessor_desc,
                    'created_date' => $date,
                ]);
            
            
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
            $data['assessment_id'] = $assessment_id;   
			$assessments = DB::table('assessments')->where('id', $assessment_id)->first();

            
			$data['type_id'] = $assessments->type_id; 			
            $data['subtype_id'] = $subtype_id;            
            $data['assessment_types'] = DB::table('assessment_types')->get();
            $data['consumers'] = DB::table('consumers')->get();
            $assessment_data= DB::table('assessments')->orderBy('id', 'DESC')->first();
            $data['sub_assessment_id'] = $assessment_data->id +1;
            $data['services'] = DB::table('services')->get();
            $data['relations'] = DB::table('relations')->get();
            $data['users'] = DB::table('users')->where('role_id','!=',0)->get();
            return view('assessment/assessments-add-sub',$data);
        }
    }
    
    
    public function editAssessment(Request $request,$id)
    {
        
        if($request->isMethod('post')){
            $d = json_decode($request->options);
            //dd($d);
            $assessments = DB::table('assessments')->where('id', $id)->first();
            $type_id = $assessments->type_id;
            
            $assessment_type = $d->assessment_type;
            $consumername = $d->consumername;
            //$assessment_id = $d->assessment_id;
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
            
            $person_desc = NULL;
            if($d->person_desc!=NULL){
                $person_desc = $d->person_desc;
            }
            $behavior_desc = NULL;
            if($d->behavior_desc!=NULL){
                $behavior_desc = $d->behavior_desc;
            }
            $assessor_desc = NULL;
            if($d->assessor_desc!=NULL){
                $assessor_desc = $d->assessor_desc;
            }
			
			
			$sname = NULL;
            if($d->sname!=NULL){
                $sname = $d->sname;
            }
			$district = NULL;
            if($d->district!=NULL){
                $district = $d->district;
            }
			
			if($type_id=='1'){
				$grade = NULL;
				$teacher = NULL;
				$designation = NULL;
				if($d->designation!=NULL){
					$designation = $d->designation;
				}
				$sphone = NULL;
				if($d->sphone!=NULL){
					$sphone = $d->sphone;
				}
				
				
			}else{
				$designation = NULL;
				$sphone = NULL;
				$grade = NULL;
				if($d->designation!=NULL){
					$grade = $d->designation;
				}
				$teacher = NULL;
				if($d->sphone!=NULL){
					$teacher = $d->sphone;
				}
			}
            
            
            DB::table('assessments')
            ->where('id',$id)
            ->update([
                'assessment_type'=> $assessment_type,
                'consumer_id' => $consumername,
                'assessment_no' => $assessment_no,
                'location' => $location_name,
                'communication' => $communication,
                'services' => $serviceslist,
                'record_no' => $record_no,
                'assessment_date' => $date_add,
                'assignee' => $assignee,
				'sname' => $sname,
                'district' => $district,
                'grade' => $grade,
                'teacher' => $teacher,
                'designation' => $designation,
                'sphone' => $sphone,
                'spent_time' => $spent_time,
                'due_date' => $due_date,                
                'status' => $status,
                'created_date' => $date,
            ]);
            
            if($id){
                
                
                DB::table('assessment_person_desc')
                ->where('assessment_id',$id)
                ->update([
                     
                     'description' => $person_desc,
                    'updated_date' => $date,
                ]);
                
                DB::table('assessment_behavior_desc')
                ->where('assessment_id',$id)
                ->update([
                    
                     'description' => $behavior_desc,
                    'updated_date' => $date,
                ]);
                
                DB::table('assessment_assessor_desc')
                ->where('assessment_id',$id)
                ->update([
                     
                     'description' => $assessor_desc,
                    'updated_date' => $date,
                ]);
                
                
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
                            if($service){
                                $services[$service->id] = $service->title;
                            }
                        }
                    }
                }
            }
            
            $data['services'] = $services;
            
            $assessments->assessment_date = date("m/d/Y",strtotime($assessments->assessment_date));
            $assessments->spent_time = $this->getTotalSpendtimeByAssessmentId($assessments->id);
            $assessment_person_desc = DB::table('assessment_person_desc')->where('assessment_id',$id)->first();
            $assessments->person_desc =  '';
            if($assessment_person_desc){
                $assessments->person_desc = $assessment_person_desc->description;
            }
            $assessment_behavior_desc = DB::table('assessment_behavior_desc')->where('assessment_id',$id)->first();
            $assessments->behavior_desc =  '';
            if($assessment_behavior_desc){
                $assessments->behavior_desc = $assessment_behavior_desc->description;
            }
            $assessment_assessor_desc = DB::table('assessment_assessor_desc')->where('assessment_id',$id)->first();
            $assessments->assessor_desc =  '';
            if($assessment_assessor_desc){
                $assessments->assessor_desc = $assessment_assessor_desc->description;
            }
            
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
		
		
        $consumer_data = DB::table('consumers')->where('id',$assessmentdata->consumer_id)->first();
		if($consumer_data){
			//dd($consumer_data->email);
			
        $data['assessment'] = $assessmentdata;
        $to = $consumer_data->email;
		$subject = 'Assessment';
        $mailsend =  Mail::send('mails.assessment',
           $data, function($message)use($to,$subject)
               {
                   $message->from('sarvesh.patel@cre8ivelabs.com');
                   $message->to($to, 'Admin')->subject($subject);
               });
		}
               

        
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
        
        $assessments->spent_time = $this->getTotalSpendtimeByAssessmentId($assessments->id);
        
        $assessment_type = DB::table('assessment_types')->where('id',$assessments->assessment_type)->first();
        $assessments->assessment_type = '';
        if($assessment_type){
            $assessments->assessment_type = $assessment_type->title;
        }
        
        $data['services'] = $services;
        $consumers = DB::table('consumers')->where('id',$assessments->consumer_id)->first();
        $assessments->consumer_name = $consumers->fname.' '.$consumers->lname;
        
        if($assessments->assessment_date!=null){
            $assessments->assessment_date = date('m/d/Y',strtotime($assessments->assessment_date));
        }
        if($assessments->due_date!=null){
            $assessments->due_date = date('m/d/Y',strtotime($assessments->due_date));
        }
        
        if($assessments->assignee!=0){
            $users = DB::table('users')->where('id',$assessments->assignee)->first();
            if($users){
                $assessments->assignee = $users->fname.' '.$users->lname;
            }else{
                $assessments->assignee = 'Unassigned';
            }
        }else{
            $assessments->assignee = 'Unassigned';
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
    
    
    public function  getUpdateSpendtimes(Request $request){
        if($request->isMethod('post')){
            $start_date_time = date('Y-m-d H:i:s',strtotime($request->start_date_time));
            $end_date_time = date('Y-m-d H:i:s',strtotime($request->end_date_time));
            $assignee = $request->assignee;
            $comment = $request->comment;
            $date = date('Y-m-d H:i:s');
            $id = $request->id;
            
            DB::table('assessment_spend_times')
            ->where("id",$id)
            ->update([
                //'assignee_id' => $assignee,
                'start_date_time' => $start_date_time,
                'end_date_time' => $end_date_time,
                'comment' => $comment,
                'updated_date' => $date,
            ]);
            
            
            if($id){
              return response()->json(['message' => 'Updated Successfully!','class' => 'success']);
            }else{
                return response()->json(['message' => 'Something Wrong!','class' => 'danger']);
            }
            
            
        }
    }
    
    public function  spendTime(Request $request){
        if($request->isMethod('post')){
            $start_date_time = date('Y-m-d H:i:s',strtotime($request->start_date_time));
            $end_date_time = date('Y-m-d H:i:s',strtotime($request->end_date_time));
            $assignee = $request->assignee;
            $assessment_id = $request->assessment_id;
            $comment = $request->comment;
            $date = date('Y-m-d H:i:s');
            
            $id = DB::table('assessment_spend_times')
            ->insertGetId([
                'assessment_id' => $assessment_id,
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
    
    
    function getTotalSpendtime($start,$end){
        $date1 = strtotime($start);
        $date2 = strtotime($end);
        $diff = abs($date2 - $date1);
        return $diff;
            
    }
    function getTotalSpendtimeByAssessmentId($id){
        
        $diff = 0;
        $assessment_spend_times = DB::table('assessment_spend_times')
            ->where('assessment_id',$id)
            ->get();
            foreach($assessment_spend_times as $assessment_spend_time){

                
                $totalspendtime = $this->getTotalSpendtime($assessment_spend_time->start_date_time,$assessment_spend_time->end_date_time);
                $diff  += $totalspendtime;

            }
            
            // To get the year divide the resultant date into
        // total seconds in a year (365*60*60*24)
        $years = floor($diff / (365*60*60*24));


        // To get the month, subtract it with years and
        // divide the resultant date into
        // total seconds in a month (30*60*60*24)
        $months = floor(($diff - $years * 365*60*60*24)
                                    / (30*60*60*24));


        // To get the day, subtract it with years and
        // months and divide the resultant date into
        // total seconds in a days (60*60*24)
        $days = floor(($diff - $years * 365*60*60*24 -
                    $months*30*60*60*24)/ (60*60*24));


        // To get the hour, subtract it with years,
        // months & seconds and divide the resultant
        // date into total seconds in a hours (60*60)
        $hours = floor(($diff - $years * 365*60*60*24
            - $months*30*60*60*24 - $days*60*60*24)
                                        / (60*60));


        // To get the minutes, subtract it with years,
        // months, seconds and hours and divide the
        // resultant date into total seconds i.e. 60
        $minutes = floor(($diff - $years * 365*60*60*24
                - $months*30*60*60*24 - $days*60*60*24
                                - $hours*60*60)/ 60);


        // To get the minutes, subtract it with years,
        // months, seconds, hours and minutes
        $seconds = floor(($diff - $years * 365*60*60*24
                - $months*30*60*60*24 - $days*60*60*24
                        - $hours*60*60 - $minutes*60));

                $data = '0h 0m';
                    
                    if($years > 0){
                       
                        $data = $years.'y '.$months.'m '.$days.'d '.$hours.'h '.$minutes.'m '.$seconds.'s ';
                        
                    }else if($months > 0){
                        
                        $data = $months.'m '.$days.'d '.$hours.'h '.$minutes.'m '.$seconds.'s ';
                    }else if($days > 0){
                        
                       $data = $days.'d '.$hours.'h '.$minutes.'m '.$seconds.'s ';
                    }else if($hours > 0){
                        
                        $data = $hours.'h '.$minutes.'m '.$seconds.'s ';
                    }else if($minutes > 0){
                       
                       $data = $minutes.'m '.$seconds.'s ';
                    
                    }else if($seconds > 0){
                       
                        $data = $seconds.'s ';
                    }
                    
                    return $data;
                    
    }
    
    
    
    function getTotaltime($start,$end){

        
        $date1 = strtotime($start);
        $date2 = strtotime($end);

        // Formulate the Difference between two dates
        $diff = abs($date2 - $date1);


        // To get the year divide the resultant date into
        // total seconds in a year (365*60*60*24)
        $years = floor($diff / (365*60*60*24));


        // To get the month, subtract it with years and
        // divide the resultant date into
        // total seconds in a month (30*60*60*24)
        $months = floor(($diff - $years * 365*60*60*24)
                                    / (30*60*60*24));


        // To get the day, subtract it with years and
        // months and divide the resultant date into
        // total seconds in a days (60*60*24)
        $days = floor(($diff - $years * 365*60*60*24 -
                    $months*30*60*60*24)/ (60*60*24));


        // To get the hour, subtract it with years,
        // months & seconds and divide the resultant
        // date into total seconds in a hours (60*60)
        $hours = floor(($diff - $years * 365*60*60*24
            - $months*30*60*60*24 - $days*60*60*24)
                                        / (60*60));


        // To get the minutes, subtract it with years,
        // months, seconds and hours and divide the
        // resultant date into total seconds i.e. 60
        $minutes = floor(($diff - $years * 365*60*60*24
                - $months*30*60*60*24 - $days*60*60*24
                                - $hours*60*60)/ 60);


        // To get the minutes, subtract it with years,
        // months, seconds, hours and minutes
        $seconds = floor(($diff - $years * 365*60*60*24
                - $months*30*60*60*24 - $days*60*60*24
                        - $hours*60*60 - $minutes*60));


                    
                    if($years > 0){
                       
                        $data = $years.'y '.$months.'m '.$days.'d '.$hours.'h '.$minutes.'m '.$seconds.'s ';
                        
                    }else if($months > 0){
                        
                        $data = $months.'m '.$days.'d '.$hours.'h '.$minutes.'m '.$seconds.'s ';
                    }else if($days > 0){
                        
                       $data = $days.'d '.$hours.'h '.$minutes.'m '.$seconds.'s ';
                    }else if($hours > 0){
                        
                        $data = $hours.'h '.$minutes.'m '.$seconds.'s ';
                    }else if($minutes > 0){
                       
                       $data = $minutes.'m '.$seconds.'s ';
                    
                    }else if($seconds > 0){
                       
                        $data = $seconds.'s ';
                    }
                    
                    return $data;


    }

    public function  getSpendtimes(Request $request){
        if($request->isMethod('post')){
            
            
            $assessment_spend_times = DB::table('assessment_spend_times')
            ->where('assessment_id',$request->assessment_id)
            ->get();
            foreach($assessment_spend_times as $assessment_spend_time){
                $users = DB::table('users')->where('id',$assessment_spend_time->assignee_id)->first();
                $username = 'Unassigned';
                if($users){
                    $username = $users->fname.' '.$users->lname;
                }
                $assessment_spend_time->assignee_id = $username;
                $assessment_spend_time->created_date = date('d M Y',strtotime($assessment_spend_time->created_date));
                $assessment_spend_time->created_date_val = date('d M Y H:i',strtotime($assessment_spend_time->created_date));
                $assessment_spend_time->start_time = date('Y-M-d H:i',strtotime($assessment_spend_time->start_date_time));
                $assessment_spend_time->end_time = date('Y-M-d H:i',strtotime($assessment_spend_time->end_date_time));
                
                $totalspendtime = $this->getTotaltime($assessment_spend_time->start_date_time,$assessment_spend_time->end_date_time);
                $assessment_spend_time->totalspendtime = $totalspendtime;
                if($assessment_spend_time->comment==null){
                    $assessment_spend_time->comment = '';
                }
            }
            
            if($assessment_spend_times){
              return response()->json(['message' => 'Added Successfully!','class' => 'success','data' => $assessment_spend_times]);
            }else{
                return response()->json(['message' => 'Something Wrong!','class' => 'danger','data' => 'none']);
            }
            
            
        }
    }
    
    
}
