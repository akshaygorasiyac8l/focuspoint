<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use DataTables;
use Illuminate\Support\Facades\Mail;
use PDF;
use Illuminate\Support\Facades\File; 

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
    
    public function deleteEmployees(Request $request)
    {
        
        if($request->isMethod('post')){
            //dd($request->delids_array);
            $delids_arrays = $request->delids_array;
            $total_array = sizeof($delids_arrays);
            
            for($i=0;$i<$total_array;$i++){
                //delete all data for employeees
                //employee_certifications
                //employee_emergency_contact
                //user_documents
                //delete documents as well
                

                $fileid = $delids_arrays[$i]['id'];
                
                $file = DB::table('user_documents')->where('id', $fileid)->first();
                if($file){
                    $path = public_path('files/'.$file->document);
                    $isExists = file_exists($path);
                    if($isExists){
                        File::delete($path);
                        DB::table('user_documents')->where('id', $fileid)->delete();
                    }
                }
                
                $employee_certifications = DB::table('employee_certifications')->where('employee_id', $fileid)->first();
                if($employee_certifications){
                    DB::table('employee_certifications')->where('employee_id', $fileid)->delete();
                }
                
                $employee_emergency_contact = DB::table('employee_emergency_contact')->where('employee_id', $fileid)->first();
                if($employee_emergency_contact){
                    DB::table('employee_emergency_contact')->where('employee_id', $fileid)->delete();
                }
                
                DB::table('users')->where('id', $fileid)->delete();
                
                
                
            }
            return response()->json(['message' => 'Deleted Successfully!','class' => 'success']);
        }
    }
    
    
    public function getEmployeeList()
    {
        if(request()->ajax()) {
            $datas = DB::table('users')->where('role_id','!=',0)->get();

            $dataarray =  array();
            $i=0;
            
            foreach($datas as $data){
                $status = '';
                if($data->status=='0'){
                    $status = 'Disable';
                }else if($data->status=='3'){
                    $status = 'Ban';
                }else if($data->status=='1'){
                    $status = 'Enable';
                }else{
                    $status = '';
                }
                
                $name = $data->fname.' '.$data->lname;
                $type = DB::table('roles')->where('id',$data->role_id)->first();
               
                $dataarray[$i]= (object) array(
                                    'id'=>$data->id,       
                                    'fname'=>$data->fname,
                                    'lname'=>$data->lname,
                                    'email'=>$data->email,
                                    'phone'=>$data->phone,
                                    'created_at'=>$data->created_at,

                                    );

                
                $i++;
            }
            
            $collection = collect($dataarray);
            return $collection;
        }
        
    }
    
    public function searchEmployees(Request $request)
    {
        if(request()->ajax()) {
            $datas = DB::table('users')
            ->where('fname', 'like', '%'.$request->fname.'%')
            ->where('lname', 'like', '%'.$request->lname.'%')
            ->where('role_id','!=',0)->get();

            $dataarray =  array();
            $i=0;
            
            foreach($datas as $data){
                $status = '';
                if($data->status=='0'){
                    $status = 'Disable';
                }else if($data->status=='3'){
                    $status = 'Ban';
                }else if($data->status=='1'){
                    $status = 'Enable';
                }else{
                    $status = '';
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
                                    'created_at'=>date('d-m-Y', strtotime($data->created_at)),
                                    'status'=>$status,

                                    );

                
                $i++;
            }
            
            $collection = collect($dataarray);
            return $collection;
        }
        
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
                }else if($data->status=='3'){
                    $status = 'Ban';
                }else if($data->status=='1'){
                    $status = 'Enable';
                }else{
                    $status = '';
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
                                    'created_at'=>date('d-m-Y', strtotime($data->created_at)),
                                    'status'=>$status,
                                    );

                
                $i++;
            }
            
            $collection = collect($dataarray);
            
           
            
            return Datatables::of($collection)
            ->addColumn('name', function($row){
                    $actionBtn = '<a href="employee-details/'.$row->id.'" data="'.$row->id.'" class="deletedata1" >'.$row->fname.' '.$row->lname.'</a>';
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
    
    
    public function changeDateformate($date){
        $a = explode("-",$date);
        $b = $a[2].'-'.$a[0].'-'.$a[1];
        return $b;
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
            
            $dob = $this->changeDateformate($d->dob);
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
            $dob_2 = $this->changeDateformate($d->dob_2);
            
            
            $ssn = $d->ssn;
            $hire_date = $this->changeDateformate($d->hire_date);
            if($hire_date==''){
                $hire_date = NULL;
            }
            $termination_date = $this->changeDateformate($d->termination_date);
            if($termination_date==''){
                $termination_date = NULL;
            }
            $qualification = serialize($d->qualification);
            $npi = $d->npi;
            $taxonomy = $d->taxonomy;
            $back_check = $d->back_check;
            $last_tb_shot = $d->back_check;
            $dl = $d->dl;
            $dl_expiration = $this->changeDateformate($d->dl_expiration);
            if($dl_expiration==''){
                $dl_expiration = NULL;
            }
            $dl_state = $d->dl_state;

            $services = serialize($d->services);            
            $date = date('Y-m-d');
            
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
                'dob_2' => $dob_2,
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
                'services' => $services,
                'status' => 1,
                'created_at' => $date,
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
                
                $certificate_type_array = $d->certificate_type_array;
                $count_certificate_type = sizeof($certificate_type_array);
                if($count_certificate_type > 0 ){
                    for($i=0;$i<$count_certificate_type;$i++){
                        $certificate_type = $certificate_type_array[$i]->certificate_type;
                        $received_date = $certificate_type_array[$i]->received_date;
                        if($received_date==''){
                            $received_date = NULL;
                        }else{
                            $received_date = $this->changeDateformate($certificate_type_array[$i]->received_date);
                        }

                        $expiry_date = $certificate_type_array[$i]->expiry_date;
                        if($expiry_date==''){
                            $expiry_date = NULL;
                        }else{
                            $expiry_date = $this->changeDateformate($certificate_type_array[$i]->expiry_date);
                        }

                        if($certificate_type!=''){
                            DB::table('employee_certifications')
                                ->insert([
                                    'employee_id' => $id,
                                    'certification_type_id' => $certificate_type,
                                    'receive_date' => $received_date,
                                    'expiry_date' => $expiry_date,
                                    'created_date' => $date,
                                    
                                   
                                    
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
            $data['services'] = DB::table('services')->get();
            $data['supervisors'] = DB::table('users')->where('role_id','!=','0')->get();
            return view('employee/employee-add',$data);
        }
        
    }


    public function editEmployee(Request $request,$id)
    {
        if($request->isMethod('post')){
            
            $d = json_decode($request->options);
            
            
            
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
            
            
            $password = $d->password;         
            
            
            $final_password = Hash::make($password);
            
            $address_1 = $d->address_1;
            $city = $d->city;
            $state = $d->state;
            $zipcode = $d->zipcode;
            
            
            
            $country = $d->country;
            $dob_2 = $d->dob_2;
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

            $services = serialize($d->services); 
            $date = date('Y-m-d');
            
            
            $response =  DB::table('users')
            ->where('id',$id)
            ->update([
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
                'password' => $final_password,
                'address_1' => $address_1,
                'city' => $city,
                'state' => $state,
                'zipcode' => $zipcode,
                'country' => $country,
                'dob_2' => $dob_2,
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
                'services' => $services,
                'time' => $time,
                'updated_at' => $date,
            ]);
            
            
            
            
            if($id){
                
                $editcontacts_arrays = $d->editcontacts_array;
                $get_existing_contacts = DB::table('employee_emergency_contact')->where('employee_id',$id)->get();
                $conts = array();            
                foreach($get_existing_contacts as $get_existing_contact){
                    
                    array_push($conts,$get_existing_contact->id);
                    
                }
                
                $new_conts = array();  
                foreach($editcontacts_arrays as $editcontacts_array){
                    array_push($new_conts,$editcontacts_array->editcontacts);
                }
                $delete_conts = array_diff($conts,$new_conts);
                $delete_conts = array_values($delete_conts);
                $total_del_cont = sizeof($delete_conts);
                if($total_del_cont > 0 ){
                    for($crc=0;$crc<$total_del_cont;$crc++){
                        DB::table('employee_emergency_contact')->where('id',$delete_conts[$crc])->delete();
                    }
                    
                }
                
                
                
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
                        
                        if(isset($contact_type_array[$i]->id)){
                            DB::table('employee_emergency_contact')
                            ->where("id",$contact_type_array[$i]->id)
                                    ->update([
                                        'employee_id' => $id,
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
                            
                                DB::table('employee_emergency_contact')
                                    ->insert([
                                        'employee_id' => $id,
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
                


                $editpersons_arrays = $d->editpersons_array;
                $get_existing_certificates = DB::table('employee_certifications')->where('employee_id',$id)->get();
                $certs = array();            
                foreach($get_existing_certificates as $get_existing_certificate){
                    
                    array_push($certs,$get_existing_certificate->id);
                    
                }
                
                $new_certs = array();  
                foreach($editpersons_arrays as $editpersons_array){
                    array_push($new_certs,$editpersons_array->editpersons);
                }
                $delete_certi = array_diff($certs,$new_certs);
                $delete_certi = array_values($delete_certi);
                $total_del_cert = sizeof($delete_certi);
                if($total_del_cert > 0 ){
                    for($cr=0;$cr<$total_del_cert;$cr++){
                        DB::table('employee_certifications')->where('id',$delete_certi[$cr])->delete();
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
                        
                        
                        if(isset($certificate_type_array[$i]->id)){
                            
                            DB::table('employee_certifications')
                            ->where('id',$certificate_type_array[$i]->id)
                                    ->update([
                                        'employee_id' => $id,
                                        'certification_type_id' => $certificate_type,
                                        'receive_date' => $received_date,
                                        'expiry_date' => $expiry_date,
                                        'updated_date' => $date,
                                       
                                        
                                    ]);

                            
                        }else{
                            
                            if($certificate_type!=''){
                                DB::table('employee_certifications')
                                    ->insert([
                                        'employee_id' => $id,
                                        'certification_type_id' => $certificate_type,
                                        'receive_date' => $received_date,
                                        'expiry_date' => $expiry_date,
                                        'created_date' => $date,
                                       
                                        
                                    ]);
                            }
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
            
            
            
                return response()->json(['message' => 'Updated Successfully!','class' => 'success']);
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
            
            $data['documents'] = DB::table('user_documents')->where('user_id',$id)->get();
            $certificates = DB::table('employee_certifications')->where('employee_id',$id)->get();
            foreach($certificates  as $certificate){
                $certificate->receive_date = date("m-d-Y",strtotime($certificate->receive_date));
                $certificate->expiry_date = date("m-d-Y",strtotime($certificate->expiry_date));
            }
            $data['certificates'] = $certificates;
            
            
            $employeedata = DB::table('users')->where('id',$id)->first();
            $employeedata->qualification = unserialize($employeedata->qualification);
            if($employeedata->qualification==null){
                $employeedata->qualification =  array();
            }
            $data['services'] = DB::table('services')->get();
            
            
            $services = unserialize($employeedata->services);
            $serviceData = array();
            if($services){
                foreach($services as $service){
                    
                    array_push($serviceData,$service->services);
                }
            }
            
            $data['serviceData'] = $serviceData;
            
            $employeedata->bod = date("m-d-Y",strtotime($employeedata->bod));
            $employeedata->dob_2 = date("m-d-Y",strtotime($employeedata->dob_2));
            $employeedata->hire_date = date("m-d-Y",strtotime($employeedata->hire_date));
            $employeedata->termination_date  = date("m-d-Y",strtotime($employeedata->termination_date));
            $employeedata->dl_expiration  = date("m-d-Y",strtotime($employeedata->dl_expiration));
            $data['employee'] = $employeedata;
            $data['supervisors'] = DB::table('users')->where('role_id','!=','0')->where('id','!=',$id)->get();
            return view('employee/employee-edit',$data);
        }
        
    }
    
    public function banEmployee(Request $request,$id)
    {
        $employeedata = DB::table('users')->where('id',$id)->first();
        if($employeedata){
            if($employeedata->status=='3'){
                $status = 1;
            }else{
                $status = 3;
            }
            
            DB::table('users')
            ->where('id',$id)
            ->update([
                'status' => $status,
            ]);
            
            return response()->json(['message' => 'Updated Successfully!','class' => 'success','show' => $status]);
        }else{
            return response()->json(['message' => 'No User Found!','class' => 'danger']);
        }
    }
    
    public function mailEmployee(Request $request,$id)
    {
        $data = array();
        $data['roles'] = DB::table('roles')->get();
        $data['services'] = DB::table('services')->get();
        $data['qualifications'] = DB::table('qualifications')->get();
        $data['certfication_types'] = DB::table('certfication_types')->get();
        $data['relations'] = DB::table('relations')->get();
        $data['countries'] = DB::table('countries')->get();
        $data['states'] = DB::table('states')->get();
        
        $data['contacts'] = DB::table('employee_emergency_contact')->where('employee_id',$id)->get();
        $data['certificates'] = DB::table('employee_certifications')->where('employee_id',$id)->get();
        $data['documents'] = DB::table('user_documents')->where('user_id',$id)->get();
        
        $employeedata = DB::table('users')->where('id',$id)->first();
        $employeedata->qualification = unserialize($employeedata->qualification);
        $employeedata->hire_date = date("Y-m-d",strtotime($employeedata->hire_date));
        $employeedata->termination_date  = date("Y-m-d",strtotime($employeedata->termination_date));
        $employeedata->dl_expiration  = date("Y-m-d",strtotime($employeedata->dl_expiration));
        $data['employee'] = $employeedata;
        
       $mailsend =  Mail::send('mails.employee',
           $data, function($message)
               {
                   $message->from('sarvesh.patel@cre8ivelabs.com');
                   $message->to('sarvesh.patel@cre8ivelabs.com', 'Admin')->subject('Employee ');
               });
               
               

        
        //dd($mailsend);
        
        
    }
    
    public function pdfEmployee(Request $request,$id)
    {
    
        $data = array();
        $data['roles'] = DB::table('roles')->get();
        $data['services'] = DB::table('services')->get();
        $data['qualifications'] = DB::table('qualifications')->get();
        $data['certfication_types'] = DB::table('certfication_types')->get();
        $data['relations'] = DB::table('relations')->get();
        $data['countries'] = DB::table('countries')->get();
        $data['states'] = DB::table('states')->get();
        
        $data['contacts'] = DB::table('employee_emergency_contact')->where('employee_id',$id)->get();
        $data['certificates'] = DB::table('employee_certifications')->where('employee_id',$id)->get();
        $data['documents'] = DB::table('user_documents')->where('user_id',$id)->get();
        
        $employeedata = DB::table('users')->where('id',$id)->first();
        $employeedata->qualification = unserialize($employeedata->qualification);
        $employeedata->hire_date = date("Y-m-d",strtotime($employeedata->hire_date));
        $employeedata->termination_date  = date("Y-m-d",strtotime($employeedata->termination_date));
        $employeedata->dl_expiration  = date("Y-m-d",strtotime($employeedata->dl_expiration));
        $data['employee'] = $employeedata;
        
        
              
        $pdf = PDF::loadView('pdfs/employee', $data);

        return  $pdf->download('Employee.pdf');
    }


    public function employeeDetail(Request $request,$id)
    {
        $data = array();
        $employeeData = DB::table('users')->where('id',$id)->first();
        $employeeData->supervisor_name = $employeeData->supervisor;
         
        $states_data = DB::table('states')->where('id',$employeeData->state)->first();
        $employeeData->state = '';
        if($states_data){
            $employeeData->state = $states_data->name;
        }
        $country_data = DB::table('countries')->where('id',$employeeData->country)->first();
        $employeeData->country = '';
        if($country_data){
            $employeeData->country = $country_data->name;
        }
        
        $services = unserialize($employeeData->services);
        $serviceData = array();
        if($services){
            foreach($services as $service){
                $serviceGet = DB::table('services')->where('id',$service->services)->first();
                array_push($serviceData,$serviceGet->title);
            }
        }

        $employeeData->serviceData = $serviceData;
        $supervisor = DB::table('users')->where('id',$employeeData->supervisor)->first();
        $employeeData->supervisor_name = $supervisor->fname.' '.$supervisor->lname;
            
        
        $employeeData->hire_date = date('m-d-Y',strtotime($employeeData->hire_date));     
        $employeeData->termination_date = date('m-d-Y',strtotime($employeeData->termination_date));
        $employeeData->dl_expiration = date('m-d-Y',strtotime($employeeData->dl_expiration));
        $employeeData->bod = date('m-d-Y',strtotime($employeeData->bod));   
        $employeeData->dob_2 = date('m-d-Y',strtotime($employeeData->dob_2)); 
        
        $data['employee'] = $employeeData;
        
        
        //$persons = DB::table('employee_emergency_contact')->get();
        $persons = DB::table('employee_emergency_contact')->where('employee_id',$id)->get();
        $personsData =  array();
        $i=0;
        foreach($persons  as $person){
            $relations = DB::table('relations')->where('id',$person->relation)->first();
            $states = DB::table('states')->where('id',$person->state_id)->first();
            $countries = DB::table('countries')->where('id',$person->country_id)->first();
            $personsData[$i] = array(
                'id' =>$person->id,
                'salutation' =>$person->salutation,
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
            $certfication_types = DB::table('certfication_types')->where('id',$certification->certification_type_id)->first();
            
            $certificationsData[$j] = array(
                'id' =>$certification->id,
                'employee_id' =>$certification->employee_id,
                'certification_type_id' =>$certfication_types->title,
                'receive_date' =>date('m-d-Y',strtotime($certification->receive_date)),
                'expiry_date' =>date('m-d-Y',strtotime($certification->expiry_date)),
                'certificate_file' =>$certification->certificate_file,
                
            );
            $j++;
        }
        $data['persons'] = $personsData;
        $data['certifications'] = $certificationsData;
        $data['documents'] = DB::table('user_documents')->where('user_id',$id)->get();
        return view('employee/employee-details',$data);
    }
    
    public function checkEmail(Request $request)
    {
        if($request->isMethod('post')){
            $email = $request->email;
            $emailEsist = DB::table('users')->where('email',$email)->first();
            
            if($emailEsist){
                return response()->json(['success' => 1]);
            }else{
                return response()->json(['success' => 0]);
            }
        }
    }
}
