<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use DataTables;

class EmployeeController extends Controller
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
        $data['employees'] = DB::table('users')->where('role_id','!=',0)->get();
        $data['roles'] = DB::table('roles')->get();
        return view('employee/employee-listing',$data);
    }
    
    
    public function getEmployees()
    {
        
        if(request()->ajax()) {
            $datas = DB::table('users')->where('role_id','!=',0)->get();
            
            $dataarray =  array();
            $i=0;
            
            foreach($datas as $data){
                $status = '';
                if($data->status=='0'){
                    $status = 'Disable';
                }else{
                    $status = 'Enable';
                }
                
                $name = $data->fname.' '.$data->lname;
                $type = DB::table('roles')->where('id',$data->role_id)->first();
               
                $dataarray[$i]= (object) array(
                                    'id'=>$data->id,       
                                    'fname'=>$data->fname,
                                    'lname'=>$data->lname,
                                    'login'=>$data->login,
                                    'email'=>$data->email,
                                    'phone'=>$data->phone,
                                    'type'=>$type->role,
                                    'created_at'=>$data->created_at,
                                    'status'=>$status,
                                    );

                
                $i++;
            }
            
            $collection = collect($dataarray);
            
           
            
            return Datatables::of($collection)
            ->addColumn('name', function($row){
                    $actionBtn = '<a href="employee-details/'.$row->id.'" data="'.$row->id.'" class="deletedata" >'.$row->fname.' '.$row->lname.'</a>';
                    return $actionBtn;
                })
            ->addColumn('chkbox', function($row){
                    $actionBtn = '<input value="'.$row->id.'"  name="empids" type="checkbox"/>';
                    return $actionBtn;
                })
            ->rawColumns(['name','chkbox'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('employee/employee-listing');
        
    }
    
    
    public function addEmployee(Request $request)
    {
        if($request->isMethod('post')){
            $d = json_decode($request->options);
            
            //dd($request->TotalFiles);
            
            
            
            $salution = $d->salution;
            $fname = $d->fname;
            $lname = $d->lname;
            $gender = $d->gender;
            $dob = $d->dob;
            $email = $d->email;
            $workphone = $d->workphone;
            $mobile = $d->mobile;
            $role_id = $d->role_id;
            $supervisor = $d->supervisor;
            
            $address = $d->address;
            $login = $d->login;
            
            $password = $d->password;
            $confirmpassword = $d->confirmpassword;
            
            
            $final_password = Hash::make($password);
            
            $address_1 = $d->address_1;
            $city = $d->city;
            $state = $d->state;
            $zipcode = $d->zipcode;
            
            
            
            $country = $d->country;
            $time = '12';
            
            
            $ssn = $d->ssn;
            $hire_date = $d->hire_date;
            if($hire_date==''){
                $hire_date = NULL;
            }
            $termination_date = $d->termination_date;
            if($termination_date==''){
                $termination_date = NULL;
            }
            $qualification = serialize($d->qualification);
            $npi = $d->npi;
            $taxonomy = $d->taxonomy;
            $back_check = $d->back_check;
            $last_tb_shot = $d->back_check;
            $dl = $d->dl;
            $dl_expiration = $d->dl_expiration;
            if($dl_expiration==''){
                $dl_expiration = NULL;
            }
            $dl_state = $d->dl_state;        
            
            
            $id = DB::table('users')
            ->insertGetId([
                'salutation' => $salution,
                'fname' => $fname,
                'lname' => $lname,
                'gender' => $gender,
                'bod' => $dob,
                'email' => $email,
                'phone' => $workphone,
                'mobile' => $mobile,
                'role_id' => $role_id,
                'supervisor' => $supervisor,
                'address' => $address,
                'login' => $login,
                'password' => $final_password,
                'address_1' => $address_1,
                'city' => $city,
                'state' => $state,
                'zipcode' => $zipcode,
                'country' => $country,
                'ssn' => $ssn,
                'hire_date' => $hire_date,
                'termination_date' => $termination_date,
                'qualification' => $qualification,
                'npi' => $npi,
                'taxonomy' => $taxonomy,
                'back_check' => $back_check,
                'last_tb_shot' => $last_tb_shot,
                'dl' => $dl,
                'dl_expiration' => $dl_expiration,
                'dl_state' => $dl_state,
                'time' => $time,

                'status' => 1,
            ]);
            
            
            if($id){
            
                $contact_type_array = $d->contact_type_array;
                //dd($contact_type_array[0]->contact_type);
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

                        if($firstname!=''  && $lastname!=''){
                        
                            DB::table('employee_emergency_contact')
                                ->insert([
                                    'employee_id' => $id,
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
                                    
                                ]);
                        }
                    }
                }
                
                $certificate_type_array = $d->certificate_type_array;
                $count_certificate_type = sizeof($certificate_type_array);
                if($count_certificate_type > 0 ){
                    for($i=0;$i<$count_certificate_type;$i++){
                        $certificate_type = $certificate_type_array[$i]->certificate_type;
                        $received_date = $certificate_type_array[$i]->received_date;
                        if($received_date==''){
                            $received_date = NULL;
                        }

                        $expiry_date = $certificate_type_array[$i]->expiry_date;
                        if($expiry_date==''){
                            $expiry_date = NULL;
                        }

                        if($certificate_type!=''){
                            DB::table('employee_certifications')
                                ->insert([
                                    'employee_id' => $id,
                                    'certfication_type_id' => $certificate_type,
                                    'receive_date' => $received_date,
                                    'expiry_date' => $expiry_date,
                                   
                                    
                                ]);
                        }
                        
                    }
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
                            
                            DB::table('user_documents')
                            ->insert([
                                'user_id' => $id,
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
            $data['roles'] = DB::table('roles')->get();
            $data['services'] = DB::table('services')->get();
            $data['qualifications'] = DB::table('qualifications')->get();
            $data['certfication_types'] = DB::table('certfication_types')->get();
            $data['relations'] = DB::table('relations')->get();
            $data['countries'] = DB::table('countries')->get();
            $data['states'] = DB::table('states')->get();
            return view('employee/employee-add',$data);
        }
        
    }


    public function editEmployee(Request $request,$id)
    {
        if($request->isMethod('post')){
            $d = json_decode($request->options);
            
            //dd($request->TotalFiles);
            
            
            
            $salution = $d->salution;
            $fname = $d->fname;
            $lname = $d->lname;
            $gender = $d->gender;
            $dob = $d->dob;
            $email = $d->email;
            $workphone = $d->workphone;
            $mobile = $d->mobile;
            $role_id = $d->role_id;
            $supervisor = $d->supervisor;
            
            $address = $d->address;
            $login = $d->login;
            
            $password = $d->password;
            $confirmpassword = $d->confirmpassword;
            
            
            $final_password = Hash::make($password);
            
            $address_1 = $d->address_1;
            $city = $d->city;
            $state = $d->state;
            $zipcode = $d->zipcode;
            
            
            
            $country = $d->country;
            $time = '12';
            
            
            $ssn = $d->ssn;
            $hire_date = $d->hire_date;
            if($hire_date==''){
                $hire_date = NULL;
            }
            $termination_date = $d->termination_date;
            if($termination_date==''){
                $termination_date = NULL;
            }
            $qualification = serialize($d->qualification);
            $npi = $d->npi;
            $taxonomy = $d->taxonomy;
            $back_check = $d->back_check;
            $last_tb_shot = $d->back_check;
            $dl = $d->dl;
            $dl_expiration = $d->dl_expiration;
            if($dl_expiration==''){
                $dl_expiration = NULL;
            }
            $dl_state = $d->dl_state;        
            
            
            $id = DB::table('users')
            ->insertGetId([
                'salutation' => $salution,
                'fname' => $fname,
                'lname' => $lname,
                'gender' => $gender,
                'bod' => $dob,
                'email' => $email,
                'phone' => $workphone,
                'mobile' => $mobile,
                'role_id' => $role_id,
                'supervisor' => $supervisor,
                'address' => $address,
                'login' => $login,
                'password' => $final_password,
                'address_1' => $address_1,
                'city' => $city,
                'state' => $state,
                'zipcode' => $zipcode,
                'country' => $country,
                'ssn' => $ssn,
                'hire_date' => $hire_date,
                'termination_date' => $termination_date,
                'qualification' => $qualification,
                'npi' => $npi,
                'taxonomy' => $taxonomy,
                'back_check' => $back_check,
                'last_tb_shot' => $last_tb_shot,
                'dl' => $dl,
                'dl_expiration' => $dl_expiration,
                'dl_state' => $dl_state,
                'time' => $time,

                'status' => 1,
            ]);
            
            
            if($id){
            
                $contact_type_array = $d->contact_type_array;
                //dd($contact_type_array[0]->contact_type);
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

                        if($firstname!=''  && $lastname!=''){
                        
                            DB::table('employee_emergency_contact')
                                ->insert([
                                    'employee_id' => $id,
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
                                    
                                ]);
                        }
                    }
                }
                
                $certificate_type_array = $d->certificate_type_array;
                $count_certificate_type = sizeof($certificate_type_array);
                if($count_certificate_type > 0 ){
                    for($i=0;$i<$count_certificate_type;$i++){
                        $certificate_type = $certificate_type_array[$i]->certificate_type;
                        $received_date = $certificate_type_array[$i]->received_date;
                        if($received_date==''){
                            $received_date = NULL;
                        }

                        $expiry_date = $certificate_type_array[$i]->expiry_date;
                        if($expiry_date==''){
                            $expiry_date = NULL;
                        }

                        if($certificate_type!=''){
                            DB::table('employee_certifications')
                                ->insert([
                                    'employee_id' => $id,
                                    'certfication_type_id' => $certificate_type,
                                    'receive_date' => $received_date,
                                    'expiry_date' => $expiry_date,
                                   
                                    
                                ]);
                        }
                        
                    }
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
                            
                            DB::table('user_documents')
                            ->insert([
                                'user_id' => $id,
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
            $data['roles'] = DB::table('roles')->get();
            $data['services'] = DB::table('services')->get();
            $data['qualifications'] = DB::table('qualifications')->get();
            $data['certfication_types'] = DB::table('certfication_types')->get();
            $data['relations'] = DB::table('relations')->get();
            $data['countries'] = DB::table('countries')->get();
            $data['states'] = DB::table('states')->get();
            
            $data['contacts'] = DB::table('employee_emergency_contact')->where('employee_id',$id)->get();
            
            $employeedata = DB::table('users')->where('id',$id)->first();
            $employeedata->qualification = unserialize($employeedata->qualification);
            $employeedata->hire_date = date("Y-m-d",strtotime($employeedata->hire_date));
            $employeedata->termination_date  = date("Y-m-d",strtotime($employeedata->termination_date));
            $employeedata->dl_expiration  = date("Y-m-d",strtotime($employeedata->dl_expiration));
            $data['employee'] = $employeedata;
            return view('employee/employee-edit',$data);
        }
        
    }


    public function employeeDetail(Request $request,$id)
    {
        $data = array();
        $employeeData = DB::table('users')->where('id',$id)->first();
        $employeeData->supervisor_name = $employeeData->supervisor;
         
        $states_data = DB::table('states')->where('id',$employeeData->state)->first();
        $employeeData->state = $states_data->name;
        $country_data = DB::table('countries')->where('id',$employeeData->country)->first();
        $employeeData->country = $country_data->name;
        
        $employeeData->supervisor_name = $employeeData->supervisor;        
        $data['employee'] = $employeeData;
        
        
        //$persons = DB::table('employee_emergency_contact')->get();
        $persons = DB::table('employee_emergency_contact')->where('employee_id',$id)->get();
        $personsData =  array();
        $i=0;
        foreach($persons  as $person){
            $relations = DB::table('relations')->where('id',$person->id)->first();
            $states = DB::table('states')->where('id',$person->state_id)->first();
            $countries = DB::table('countries')->where('id',$person->country_id)->first();
            $personsData[$i] = array(
                'id' =>$person->id,
                'employee_id' =>$person->employee_id,
                'fname' =>$person->fname,
                'lname' =>$person->lname,
                'relation' =>$relations->title,
                'phone' =>$person->phone,
                'mobile' =>$person->mobile,
                'email' =>$person->email,
                'address1' =>$person->address1,
                'address2' =>$person->address2,
                'city' =>$person->city,
                'state_id' =>$states->name,
                'country_id' =>$countries->name,
            );
            $i++;
        }
        
        $certifications = DB::table('employee_certifications')->where('employee_id',$id)->get();
        $certificationsData =  array();
        $j=0;
        foreach($certifications  as $certification){
            $certfication_types = DB::table('certfication_types')->where('id',$certification->certfication_type_id)->first();
            
            $certificationsData[$j] = array(
                'id' =>$certification->id,
                'employee_id' =>$certification->employee_id,
                'certfication_type_id' =>$certfication_types->title,
                'receive_date' =>$certification->receive_date,
                'expiry_date' =>$certification->expiry_date,
                'certificate_file' =>$certification->certificate_file,
                
            );
            $j++;
        }
        $data['persons'] = $personsData;
        $data['certifications'] = $certificationsData;
        $data['documents'] = DB::table('user_documents')->where('user_id',$id)->get();
        return view('employee/employee-details',$data);
    }
}
