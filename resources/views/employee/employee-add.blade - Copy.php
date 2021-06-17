@extends('layouts.app')
@section('script1')
@endsection
@section('add_layout')
   @parent
   
   <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.css') }}">

@endsection
@section('listing_layout')
@endsection
@section('detail_layout')
@endsection
@section('content')
	@section('header')
		@parent
	@endsection

	@section('sidebar')
		@parent
	@endsection 
    
         <div class="content-wrapper">
            <form id="form-consumer" name="employee-form" action=""  method="post" enctype="multipart/form-data">
            @csrf
               <div class="background-transperent">
                  <section class="content-header">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12 page-background">
                              <h1 class="page-title">New Employee</h1>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="content">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12 errorclass">
                           </div>
                           <div class="col-md-8 consumer-section">
                              <div class="card card-primary">
                                 <div class="card-body">
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Employee Name</label>
                                       <div class="col-md-9">
                                          <div class="row salutions">
                                             <div class="col-md-3 time-add">
                                                <select class="form-control droupdown mobile-drop salution" name="salution">
                                                <option value="">Salutation</option>
                                                <option value="Mr">Mr.</option>
                                                <option value="Mrs">Mrs.</option>
                                                <option value="Ms">Ms.</option>
                                                <option value="Miss">Miss.</option>
                                                <option value="Dr">Dr.</option>
                                             </select>                                             
                                             </div>
                                             <div class="col-md-4">
                                                <input type="text" name="fname" class="form-control mobile-drop fname" placeholder="First Name"  required>
                                             </div>
                                             <div class="col-md-4">
                                                <input type="text" name="lname" class="form-control lname"  placeholder="Last Name">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Gender</label>
                                       <div class="col-md-9 common-text">
                                          <select class="form-control droupdown width-add gender" name="gender">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="Male">Male</option>
                                             <option value="Female">Female</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Date of Birth</label>
                                       <div class="col-md-9 time-add">
                                          <input type="text" name="dob" class="form-control date-select width-add dob" id="datetimepicker4" placeholder="mm-dd-yyyy">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Email Address</label>
                                       <div class="col-md-9 common-text short-col">
                                          <input type="email" name="email" class="form-control width-add email"  placeholder="">
                                          <p style="color:#f00;" class="emaildata"></p>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Phone</label>
                                       <div class="col-md-9">
                                          <div class="row">
                                             <div class="col-md-3 time-add">
                                                <input type="tel" name="workphone" class="form-control mobile-drop workphone"  placeholder="Work Phone">
                                             </div>
                                             <div class="col-md-8 time-add">
                                                <input type="tel" name="mobile" class="form-control mobile"  placeholder="Mobile">
                                             </div>
                                          </div>                                             
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Role</label>
                                       <div class="col-md-9 common-text short-col">
                                          <select class="form-control droupdown width-add role_id" name="role_id">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             @foreach ($roles as $role)
                                                <option value="{{$role->id}}">{{$role->role}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Supervisor</label>
                                       <div class="col-md-9 common-text short-col">
                                          <select class="form-control droupdown width-add supervisor" name="supervisor">
                                             <option value="0" selected="selected" disabled="disabled">Select</option>
                                             @foreach ($supervisors as $supervisor)
                                                <option value="{{$supervisor->id}}">{{$supervisor->fname}} {{$supervisor->lname}}</option>
                                             @endforeach
                                             
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="tab-section">
                     <div class="tab-bar">
                        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                           <li class="nav-item active">
                            <a class="nav-link tabs active" id="custom-content-below-home-tab1" data-toggle="pill" role="tab" aria-controls="custom-content-below-home" aria-selected="false" onclick="openTabs(event, 'services-employee-add')">Services</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-home-tab2" data-toggle="pill" role="tab" aria-controls="custom-content-below-home" aria-selected="false" onclick="openTabs(event, 'logins')">Logins</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-profile-tab3" data-toggle="pill" role="tab" aria-controls="custom-content-below-profile" aria-selected="false" onclick="openTabs(event, 'address-details')">Address</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-messages-tab4" data-toggle="pill" role="tab" aria-controls="custom-content-below-messages" aria-selected="false" onclick="openTabs(event, 'other-details-user')">Other Details</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-settings-tab5" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'contact-persons-user')">Contact Persons</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-settings-tab6" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'certifications')">Certifications</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-settings-tab7" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'documents')">Documents</a>
                          </li>
                        </ul>
                     </div>
                  </section>
                  <section class="contentsection" id="services-employee-add">
                     <div class="container-fluid">

                        
                     
                        
                        <div class="row">
                           <div class="col-md-4">
                              <?php $ic = 0;?>
                              @foreach ($services as $service)
                              
                                               
                                 <div class="checkbox-parts">
                                    <label for="services{{$service->id}}" class="emp-label-add">
                                    <input  type="checkbox" name="services" class="services" id="services{{$service->id}}" value="{{$service->id}}">
                                    {{$service->title}}</label>
                                 </div>
                              <?php 
                              $ic++;
                              if($ic%16 == 0){
                                  echo '</div><div class="col-md-4">';
                              }else{
                              }
                              ?>
                              @endforeach
                   
                           
                           </div>
                
                        
                        </div>
                     </div>
                  </section>
                  <section class="contentsection" id="logins">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12 errorbillingclass">
                           </div>
                           <div class="col-md-6">
                              <h5 class="small-sub-title">ADD CREDENTIALS</h5>
                              <div class="card card-primary">
                                 <div class="card-body">
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Email Address</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="email" name="emailaddress" class="form-control emailaddress"  placeholder="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Password</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="password" name="password" id="password" class="form-control password"  placeholder="">
                                          <p style="color:#f00;" class="passworddata"></p>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Confirm Password</label>
                                       <div class="col-md-8 common-textbox">
                                          <input name="confirmpassword" type="password" class="form-control confirmpassword"  placeholder="">
                                          <p style="color:#f00;" class="confirmpassworddata"></p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                           <!--
                              <h5 class="small-sub-title">CHANGE PASSWORD</h5>
                              <div class="card card-primary">
                                 <div class="card-body">
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Old Password</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="password" name="oldpass" class="form-control oldpass"  placeholder="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">New Password</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="password" name="newpass" class="form-control newpass"  placeholder="" id="newpassword">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Confirm Password</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="password" name="confirmpass" class="form-control confirmpass"  placeholder="">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              
                              -->
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="contentsection" id="address-details">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="card card-primary">
                                 <div class="card-body">
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Address</label>
                                       <div class="col-md-8 common-textbox">
                                          <textarea name="address" class="form-control address" placeholder=""></textarea>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label required-field"></label>
                                       <div class="col-md-8 common-textbox">
                                          <textarea name="address-1" class="form-control address-1" placeholder=""></textarea>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">City</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="city" class="form-control city" placeholder="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">State</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown state" name="state">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             @foreach ($states as $state)
                                             <option value="{{$state->id}}">{{$state->name}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Zip code</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="zip-code" class="form-control zipcode" placeholder="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Country</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown country" name="country">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             @foreach ($countries as $country)
                                             <option value="{{$country->id}}">{{$country->name}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="contentsection" id="other-details-user">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="card card-primary">
                                 <div class="card-body">
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Date of Birth</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="dob-other" class="form-control date-of-birth" placeholder="mm-dd-yyyy">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">SSN</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="ssn" class="form-control ssn" placeholder="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Hire Date</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="hire-date" class="form-control hire-date" placeholder="mm-dd-yyyy">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Termination Date</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="termination-date" class="form-control termination-date" placeholder="mm-dd-yyyy">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Qualification</label>
                                       <div class="col-md-8 common-textbox">
                                          <select id="multiple-checkboxes" class="qualification" multiple="multiple">
                                          @foreach ($qualifications as $qualification)
                                             <option value="{{$qualification->title}}">{{$qualification->title}}</option>
                                          @endforeach
                                          </select> 
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">NPI #</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="npi" class="form-control npi" placeholder="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Taxonomy #</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="taxonomy" class="form-control taxonomy" placeholder="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Background Check</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="back-check" class="form-control back-check" placeholder="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Last TB Shot</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="last-shot" class="form-control last-shot" placeholder="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">DL #</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="dl" class="form-control dl" placeholder="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">DL Expiration</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="dl-expiration" class="form-control dl-expiration" placeholder="mm-dd-yyyy">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">DL State</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="dl-state" class="form-control dl-state" >
                                       </div>
                                    </div>                                    
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="contentsection" id="contact-persons-user">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="table-scrollbar">
                                 <table class="table-contact-user common-table-info">
                                    <thead>
                                     <tr>
                                       <th>Contact Type</th>
                                       <th>First Name</th>
                                       <th>Last Name</th>
                                       <th>Relationship</th>
                                       <th>Phone</th>
                                       <th>Mobile</th>
                                       <th>Email Address</th>
                                       <th>Address 1</th>
                                       <th>Address 2</th>
                                       <th>City</th>
                                       <th>State</th>
                                       <th>Country</th>
                                     </tr>
                                    </thead>
                                    <tbody>
                                       <tr class="tr-contact-person common-tr-info">
                                          <td>
                                             <select class="form-control droupdown custom-contact-field common-text-box-new contact_type" name="contact-type">
                                                <option value="" selected="selected" disabled="disabled">Select</option>
                                                <option value="Mr">Mr.</option>
                                                <option value="Mrs">Mrs.</option>
                                                <option value="Ms">Ms.</option>
                                                <option value="Miss">Miss.</option>
                                                <option value="Dr">Dr.</option>
                                             </select>
                                          </td>
                                          <td>
                                             <input type="text" name="first-name" class="form-control custom-contact-field common-text-box-new firstname" placeholder="">
                                          </td>
                                          <td>
                                             <input type="text" name="last-name" class="form-control custom-contact-field common-text-box-new lastname" placeholder="">
                                          </td>
                                          <td>
                                             <select class="form-control droupdown custom-contact-field common-text-box-new relationship" name="relationship">
                                                <option value="" selected="selected" disabled="disabled">Select</option>
                                                @foreach ($relations as $relation)
                                                <option value="{{$relation->id}}">{{$relation->title}}</option>
                                                @endforeach
                                             </select>
                                          </td>
                                          <td>
                                             <input type="text" name="phone" class="form-control custom-contact-field common-text-box-new phonenumber" placeholder="">
                                          </td>
                                          <td>
                                             <input type="text" name="mobile" class="form-control custom-contact-field common-text-box-new mobilenumber" placeholder="">
                                          </td>
                                          <td>
                                             <input type="email" name="emailperson" class="form-control custom-contact-field common-text-box-new emailid" placeholder="">
                                          </td>
                                          <td>
                                             <input type="text" name="address-1" class="form-control custom-contact-field common-text-box-new address_1" placeholder="">
                                          </td>
                                          <td>
                                             <input type="text" name="address-2" class="form-control custom-contact-field common-text-box-new address_2" placeholder="">
                                          </td>
                                          <td>
                                             <input type="text" name="city" class="form-control custom-contact-field common-text-box-new city_id" placeholder="">
                                          </td>
                                          <td>
                                             <select class="form-control droupdown custom-contact-field common-text-box-new state_id" name="state">
                                                <option value="" selected="selected" disabled="disabled">Select</option>
                                                @foreach ($states as $state)
                                                <option value="{{$state->id}}">{{$state->name}}</option>
                                                @endforeach
                                             </select>
                                          </td>
                                          <td>
                                             <select class="form-control droupdown custom-contact-field common-text-box-new country_id" name="country">
                                                <option value="" selected="selected" disabled="disabled">Select</option>
                                                @foreach ($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach
                                             </select>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <button class="add_form_contact_user_new common-button"><i class="fa fa-plus common-icons"></i>Add New Contact</button> 
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="contentsection" id="certifications">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="table-scrollbar common-scroll">
                                 <table class="table-contact-certification common-table-info">
                                    <thead>
                                     <tr>
                                       <th>Certification</th>
                                       <th>Received Date</th>
                                       <th>Expiry Date</th>
                                     </tr>
                                    </thead>
                                    <tbody>
                                       <tr class="tr-certification-person common-tr-info">
                                          <td>
                                             <select class="form-control droupdown custom-contact-field common-text-box-new certificate_type" name="certification">
                                                <option value="" selected="selected" disabled="disabled">Select</option>
                                                @foreach ($certfication_types as $certfication_type)
                                                <option value="{{$certfication_type->id}}">{{$certfication_type->title}}</option>
                                                @endforeach
                                             </select>
                                          </td>
                                          <td>
                                             <input type="text" name="received-date" class="form-control custom-contact-field received-date common-text-box-new received_date" placeholder="mm-dd-yyyy">
                                          </td>
                                          <td>
                                             <input type="text" name="expiry-date" class="form-control custom-contact-field expiry-date common-text-box-new expiry_date" placeholder="mm-dd-yyyy">
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>                              
                              <button class="add_form_certification common-button"><i class="fa fa-plus common-icons"></i>Add New Certification</button> 
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="contentsection" id="documents">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-7">
                              <div class="card-body">
                                 <div class="form-group row">
                                    <div class="col-md-6">
                                       <label class="attach-file-lbl attach-file-label">Attach Files</label>
                                       <div class="file-upload-multiple">
                                          <label class="lbl-multiple-files">Select Multiple Files</label>
                                          <input type="file" name="filenames[]" class="form-control multiple-image-upload" id="file-upload" multiple="" accept=".jpg, .jpeg, .png, .txt">
                                          <p class="image-note-title">You can upload a maximum of 5 files, 5MB each</p>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div id="uploadPreview" class="employee-image"></div>
                                    </div>
                                 </div>
                              </div>   
                           </div>
                           <div class="col-md-5"></div>
                        </div>
                     </div>
                  </section>
                  <section class="footer-section">
                     <div class="container-fluid">
                        <div class="card-footer">
                           <button type="button" class="btn btn-info  saveemp">Save</button>
                           <a href="{{ route('employee-listing') }}" class="btn btn-default float-right">Cancel</a>
                         </div>
                     </div>
                  </section>
               </div>
            </form>
         </div>

   

@endsection
@section('script2')
@endsection
@section('end_add_layout')
<script src="https://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/angular.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript">
   $('.nav-sidebar').on('click', 'li', function() {
     $('.nav-sidebar li.active-menu').removeClass('active-menu');
     $(this).addClass('active-menu');
   });
</script>
<script type="text/javascript">
   
   $(document).ready(function() {
       $('.diagnosis-date').datepicker({ format: "mm/dd/yyyy" });
   }); 
   $(document).ready(function() {
       $('.date-type').datepicker({ format: "mm/dd/yyyy" });
   }); 


   // Scroolbar scroll
   var $hs = $('.table-scrollbar');
   var $sLeft = 0;
   var $hsw = $hs.outerWidth(true);
   $( window ).resize(function() {
     $hsw = $hs.outerWidth(true);
   });
   function scrollMap($sLeft) {
     $hs.scrollLeft($sLeft);
   }
   $hs.on('mousewheel', function(e) {
     var $max = $hsw * 2 + (-e.originalEvent.wheelDeltaY);
     if ($sLeft > -1){
       $sLeft = $sLeft + (-e.originalEvent.wheelDeltaY);
     } else {
       $sLeft = 0;
     }
     if ($sLeft > $max) {
       $sLeft = $max;
     }
     if(($sLeft > 0) && ($sLeft < $max)) {
       e.preventDefault();
       e.stopPropagation(); 
     }
     scrollMap($sLeft);
   });

   $('#user-add-icon').click(function(){
      $("#drop-down-profile").toggleClass('show');
   });

    $('#user-mobile-icon').click(function(){
      $("#mobile-dropdown").toggleClass('show-add');
   });
   
   $("#spent-time-add").timepicker();


// Spent Time Add
$(document).ready(function() {
   $('.start-date').datepicker({ format: "mm/dd/yyyy" });
});
$(document).ready(function() {
   $('.end-date').datepicker({ format: "mm/dd/yyyy" });
});
$("#start-time").timepicker();
$("#end-time").timepicker(); 
 

</script>

<script type="text/javascript">


// Images Preview JS
function readImage(file) {
  var reader = new FileReader();
  var image  = new Image();

  reader.readAsDataURL(file);  
  reader.onload = function(_file) {
    image.src = _file.target.result;
    //image.onload = function() {
      if(file.size > 5242880){
         return alert('You can upload file size maximum of 5MB.');
      } 
      var n = file.name;
      //$('#uploadPreview').append('<div class="image-section"><div class="row"><div class="col-md-8"><p class="file-name-image">' + n + '</p></div><div class="col-md-4"><span class="delete-image"><i class="fa fa-trash delete" aria-hidden="true"></i>Delete</span></div></div></div>');
      $('#uploadPreview').append('<div class="image-section"><div class="row"><div class="col-md-10 image-show-name"><i class="fa fa-paperclip attach-icon-add" aria-hidden="true"></i><p class="file-name-image">' + n + '</p></div><div class="col-md-2"><span class="delete-image"><i class="fa fa-trash delete" aria-hidden="true"></i></span></div></div></div>');
      $('.delete-image').click(function(){
        $(this).parent().parent().parent().remove();
      });
    //};
    /*
    image.onerror= function() {
      alert('Invalid file type: '+ file.type);
    };    
    */
  };
}
$("#file-upload").change(function (e) {
  if(this.disabled) {
    return alert('File upload not supported!');
  }
  var F = this.files;
  if (F && F[0]) {
      if(F.length > 5){
         return alert('You can upload a maximum of 5 files.');
      }else{
          for (var i = 0; i < F.length; i++) {
            readImage(F[i]);
          }
      }
  }
});

$('.common-selectbox').click(function(){
   $('.common-selectbox').toggleClass('add-down-arrow-show');
});

// Date and Time Picker
$(function () {
   $('#startdatetimepicker').datetimepicker({ 
      allowInputToggle: true,
      format: 'YYYY-MMM-DD HH:mm',
      inline: false,
      sideBySide: true
   }); 
});
$(function () {
   $('#enddatetimepicker').datetimepicker({ 
      allowInputToggle: true,
      format: 'YYYY-MMM-DD HH:mm',
      inline: false,
      sideBySide: true
   }); 
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('#csrf_token').val()
          }
        });
        
        $('.dob').datepicker({ changeMonth: true,changeYear: true,dateFormat: "mm-dd-yy" });
        $('.date-of-birth').datepicker({ changeMonth: true,changeYear: true,dateFormat: "mm-dd-yy" });
        $('.hire-date').datepicker({ changeMonth: true,changeYear: true,dateFormat: "mm-dd-yy" });
        $('.termination-date').datepicker({ changeMonth: true,changeYear: true,dateFormat: "mm-dd-yy" });
        $('.dl-expiration').datepicker({ changeMonth: true,changeYear: true,dateFormat: "mm-dd-yy" });
        $('.expiry_date').datepicker({ changeMonth: true,changeYear: true,dateFormat: "mm-dd-yy" });
        $('.received_date').datepicker({ changeMonth: true,changeYear: true,dateFormat: "mm-dd-yy" });
        
        $('html').on('focus', '.custom-problems-field', function (e) {
            $('.expiry_date').datepicker({ changeMonth: true,changeYear: true,dateFormat: "mm-dd-yy" });
            $('.received_date').datepicker({ changeMonth: true,changeYear: true,dateFormat: "mm-dd-yy" });
        });
        
        
        function  renderData(validation_array){
           var errorhtmldata = '<ul>';
            $(validation_array).each(function(key,val){
                errorhtmldata += '<li>'+val+'</li>';
            });
            errorhtmldata += '</ul>';
            $('.errorclass').html(errorhtmldata);
       }
       
      function loginnfo(){
         $('.tabs').removeClass('active');               
         $('#custom-content-below-home-tab2').addClass('active');
         $('.contentsection').hide();
         $('#logins').show();
      }
        
        
        
        
        $('html').on('click', '.saveemp', function (e) {
            
            
            var salution = $('.salution').val();
            var fname = $('.fname').val();
            var lname = $('.lname').val();
            var gender = $('.gender').val();
            var dob = $('.dob').val();
            var email = $('.email').val();
            var workphone = $('.workphone').val();
            var mobile = $('.mobile').val();
            var role_id = $('.role_id').val();
            var supervisor = $('.supervisor').val();
            
            var login = $('.emailaddress').val();
            var password = $('.password').val();
            var confirmpassword = $('.confirmpassword').val();
            
            //var oldpass = $('.oldpass').val();
            //var newpass = $('.newpass').val();
            //var confirmpass = $('.confirmpass').val();
            
            
            var address = $('.address').val();
            var address_1 = $('.address-1').val();
            var city = $('.city').val();
            var state = $('.state').val();
            var zipcode = $('.zipcode').val();
            var country = $('.country').val();
            
            var dob_2 = $('.date-of-birth').val();
            var ssn = $('.ssn').val();
            var hire_date = $('.hire-date').val();
            
            var termination_date = $('.termination-date').val();
            var qualification = $('.qualification').val();
            var npi = $('.npi').val();
            var taxonomy = $('.taxonomy').val();
            var back_check = $('.back-check').val();
            
            var last_tb_shot = $('.last-shot').val();
            var dl = $('.dl').val();
            var dl_expiration = $('.dl-expiration').val();
            var dl_state = $('.dl-state').val();
            
            var contact_type_length = $('.contact_type').length;
            var certificate_type_length = $('.certificate_type').length;
            
           
            var contact_type_array= [];
            $(".contact_type").each(function(i, value) {
               
               contact_type_array.push({
                  contact_type: $(this).val(), 
                  firstname: $(this).closest('tr').find('.firstname').val(),
                  lastname: $(this).closest('tr').find('.lastname').val(),
                  relationship: $(this).closest('tr').find('.relationship').val(),
                  phonenumber: $(this).closest('tr').find('.phonenumber').val(),
                  mobilenumber: $(this).closest('tr').find('.mobilenumber').val(),
                  emailid: $(this).closest('tr').find('.emailid').val(),
                  address_1: $(this).closest('tr').find('.address_1').val(),
                  address_2: $(this).closest('tr').find('.address_2').val(),
                  city_id: $(this).closest('tr').find('.city_id').val(),
                  state_id: $(this).closest('tr').find('.state_id').val(),
                  country_id: $(this).closest('tr').find('.country_id').val(),
              });
            });
            
            var certificate_type_array= [];
            $(".certificate_type").each(function(i, value) {
               
               certificate_type_array.push({
                  certificate_type: $(this).val(), 
                  received_date: $(this).closest('tr').find('.received_date').val(),
                  expiry_date: $(this).closest('tr').find('.expiry_date').val(),
                  
              });
            });
            
            var services_array= [];
            $(".services").each(function(i, value) {
               
               services_array.push({
                  services: $(this).val(), 
                  
                  
              });
            });
            
            
            
            function checkEmail(email,validation_array){
               var url = "{{ url('checkemail') }}";
               $.ajax({
                   url: url,
                   type: "POST",
                   data: {email:email},
                   success: function (data) {
                           if(data.success=='1'){
                               validation_array.push('Email already exist'); 
                           }
                           renderData(validation_array);
                             
                             


                   },
                   error: function (data) {
                       console.log('Error:', data);
                   }
               });
               
           }
            
            $('.errorclass').html('');
            var validation_array= [];
            
            if(salution==null ||  salution==''){
               validation_array.push('Please select salutation');
               
            }
            
            if(fname==null ||  fname==''){
               validation_array.push('Please enter first name');
               
            }

            
            if(lname==null  ||  lname==''){
               validation_array.push('Please enter last name');
               
            }
            
            
            if(gender==null  ||  gender==''){
               validation_array.push('Please select gender');
               
            }  
            
            
            if(dob==null   ||  dob==''){
               validation_array.push('Please select date of birth');               
            } 
            
            
            
            
            if(IsEmail(email)==false || email==''  || email==null){
               validation_array.push('Please enter valid email address'); 
            }
            $('.email').css('border','0.5px solid #ced4da');
            
            function IsEmail(email) {
               var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
               if(!regex.test(email)) {
                  return false;
               }else{
                  return true;
               }
            }
            checkEmail(email,validation_array);
            
            
            
            if(role_id=='' || role_id==null){
                validation_array.push('Please select role'); 
            }
            
            if(supervisor=='' || supervisor==null){
                validation_array.push('Please select supervisor'); 
            }
            
            
            renderData(validation_array);
            
            
            var validation_login_array= [];
            
            if(IsEmail(login)==false || login=='' || login==null){
               loginnfo();
               validation_login_array.push('Please email address');
            } 
           
 
            var pswlen = password.length;
            if (pswlen < 8) {

                loginnfo();
                validation_login_array.push('Please enter password and length should be 8');
                
            }
            else {
               if (password != confirmpassword) {
                   loginnfo();
                   validation_login_array.push('confirm password does not match');
                   
                }               

            }
            


            var errorbillingdata = '<ul>';
            $(validation_login_array).each(function(key,val){
                errorbillingdata += '<li>'+val+'</li>';
            });
            errorbillingdata += '</ul>';
            $('.errorbillingclass').html(errorbillingdata);
            
            
            if(validation_array.length > 0 || validation_login_array.length > 0){
                return false;
            }
            
         
            
            var file_upload = $('#file-upload').val();

            
            var formData = new FormData();
            let TotalFiles = $('#file-upload')[0].files.length; //Total files
            let files = $('#file-upload')[0];
            for (let i = 0; i < TotalFiles; i++) {
                     formData.append('files' + i, files.files[i]);
            }
            formData.append('TotalFiles', TotalFiles);
              
            
            

            
            var dataValues = { 
                              salution: salution,
                              fname: fname,
                              lname: lname,
                              gender: gender,
                              dob: dob,
                              email: email,
                              workphone: workphone,
                              mobile: mobile,
                              role_id: role_id,
                              supervisor: supervisor,
                              address: address,
                              login: login,
                              password: password,
                              confirmpassword: confirmpassword,
                              
                              address: address,
                              address_1: address_1,
                              city: city,
                              state: state,
                              zipcode: zipcode,
                              country: country,
                              dob_2: dob_2,
                              ssn: ssn,
                              hire_date: hire_date,
                              termination_date: termination_date,
                              qualification: qualification,
                              npi: npi,
                              taxonomy: taxonomy,
                              back_check: back_check,
                              last_tb_shot:last_tb_shot,
                              dl: dl,
                              dl_expiration: dl_expiration,
                              dl_state: dl_state,
                              contact_type_array:contact_type_array,
                              certificate_type_array:certificate_type_array,
                              services:services_array,
                              //file_upload:file_array,
                              
                              
                           };
                              


            options = JSON.stringify(dataValues);
            formData.append('options', options);
            
            var url = "{{ url('employee-add') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType    : 'json',
                success: function (data) {
                          console.log(data);
                          if(data.class='success'){
                              window.location.href= "{{ url('employee-listing') }}";
                          }else{
                              alert('Something wrong');
                              return false;
                          }


                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
            
            
            
            
            

        });
        
        
   });
   
   $(document).ready(function() {
       var max_fields      = 100;
       var wrapper         = $(".table-contact-user"); 
       var add_button      = $(".add_form_contact_user"); 
       
       $('html').on("click",".add_form_contact_user_new",function(e){
           
           e.preventDefault();
            var clength = $('.tr-contact-person').length;
           if(clength < max_fields){ 
               var htmlData = '<tr class="tr-contact-person common-tr-info">'+
               '<td>'+
               '<select class="form-control droupdown custom-contact-field common-text-box-new contact_type">'+
               '<option>Select</option>'+
               '<option value="Mr">Mr.</option>'+
               '<option value="Mrs">Mrs.</option>'+
               '<option value="Ms">Ms.</option>'+
               '<option value="Miss">Miss.</option>'+
               '<option value="Dr">Dr.</option>'+
               '</select>'+
               '</td>'+
               '<td><input class="form-control custom-contact-field common-text-box-new firstname" placeholder=""></td>'+
               '<td><input class="form-control custom-contact-field common-text-box-new lastname" placeholder=""></td>'+
               '<td>'+
               '<select class="form-control droupdown custom-contact-field common-text-box-new relationship">'+
               '<option>Select</option>';
               @foreach ($relations as $relation)      
               htmlData += '<option value="{{$relation->id}}">{{$relation->title}}</option> ';
               @endforeach
   
               htmlData += '</select>'+
               '</td>'+
               '<td><input class="form-control custom-contact-field common-text-box-new phonenumber" placeholder=""></td>'+
               '<td><input class="form-control custom-contact-field common-text-box-new mobilenumber" placeholder=""></td>'+
               '<td><input class="form-control custom-contact-field common-text-box-new emailid" placeholder=""></td>'+
               '<td><input class="form-control custom-contact-field common-text-box-new address_1" placeholder=""></td>'+
               '<td><input class="form-control custom-contact-field common-text-box-new address_2" placeholder=""></td>'+
               '<td><input class="form-control custom-contact-field common-text-box-new city_id" placeholder=""></td>'+
               '<td>'+
               '<select class="form-control droupdown custom-contact-field common-text-box-new state_id">'+
               '<option>Select</option>';
               @foreach ($states as $state)      
               htmlData += '<option value="{{$state->id}}">{{$state->name}}</option> ';
               @endforeach
   
               htmlData += '</select>'+
               '</td>'+
               '<td>'+
               '<select class="form-control droupdown custom-contact-field common-text-box-new country_id">'+
               '<option>Select</option>';
               @foreach ($countries as $country)      
               htmlData += '<option value="{{$country->id}}">{{$country->name}}</option> ';
               @endforeach
   
               htmlData += '</select>'+
               '</td>'+
               '<td class="delete-section"><i class="fa fa-close delete-button delete"></i></td>'+
               '</tr>';
               
               $(wrapper).append(htmlData); //add input box
           }
         else
         {
         alert('You Reached the limits')
         }
       });
       
       $(wrapper).on("click",".delete", function(e){ 
           e.preventDefault(); $(this).parent().parent().remove(); x--;
       })
   });
   

       $(document).ready(function() {
          var max_fields      = 100;
          var wrapper         = $(".table-contact-certification"); 

          
          var x = 1; 
          $('html').on("click",".add_form_certification",function(e){ 
              e.preventDefault();
              var clength = $('.tr-problems-person').length;
              if(clength < max_fields){
              
                     x++; 
                     var htmlData = '<tr class="tr-problems-person common-tr-info">'+
                     '<td> '+
                     '<select class="form-control droupdown custom-contact-field common-text-box-new certificate_type" name="place"> '
                     '<option value="">Select</option>';
                     @foreach ($certfication_types as $certfication_type)      
                     htmlData += '<option value="{{$certfication_type->id}}">{{$certfication_type->title}}</option> ';
                     @endforeach
                     htmlData += '</select>'+ 
                     '</td>'+
                     '<td>'+ 
                     '<input type="text" name="strength" class="form-control custom-problems-field common-text-box-new received_date" placeholder="mm-dd-yyyy">'+ 
                     '</td>'+
                     '<td>'+
                     '<input type="text" name="score" class="form-control custom-problems-field common-text-box-new expiry_date" placeholder="mm-dd-yyyy">'+ 
                     '</td>'+
                     '<td class="delete-section"><i class="fa fa-close delete-button delete"></i></td>'+
                     '</tr>';
                     $(wrapper).append(htmlData); //add input box
               }
               else
               {
               alert('You Reached the limits')
               }
          });
          
          $(wrapper).on("click",".delete", function(e){ 
              e.preventDefault(); $(this).parent().parent().remove(); x--;
          })
          
          
      });
      

   

</script>
<style>
.errorclass,.errorbillingclass{color:#f00;}
.errorclass ul li,.errorbillingclass ul li {   list-style: inherit;}
</style>
@endsection
@section('end_listing_layout')
@endsection
@section('end_detail_layout')
@endsection
