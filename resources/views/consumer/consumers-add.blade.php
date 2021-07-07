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
            <form id="form-consumer" action="" name="consumer-form">
               <div class="background-transperent">
                  <section class="content-header">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12 page-background">
                              <h1 class="page-title">New Consumer</h1>
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
                                       <label class="col-md-3 col-form-label ">Consumer Name<span class="required-mark">*</span></label>
                                       <div class="col-md-9">
                                          <div class="row salutions">
                                             <div class="col-md-3 short-col">
                                                <select class="form-control droupdown mobile-drop salutation" name="salutation" autocomplete="off">
                                                <option value="" selected="selected" >Salutation</option>
                                                <option value="Mr">Mr.</option>
                                                <option value="Mrs">Mrs.</option>
                                                <option value="Ms">Ms.</option>
                                                <option value="Miss">Miss.</option>
                                                <option value="Dr">Dr.</option>
                                             </select>                                             
                                             </div>
                                             <div class="col-md-4">
                                                <input type="text" name="firstname" class="form-control mobile-drop fname" placeholder="First Name" autocomplete="off">
                                             </div>
                                             <div class="col-md-4">
                                                <input type="text" name="lastname" class="form-control lname"  placeholder="Last Name" autocomplete="off">
                                             </div>
                                             <div class="col-md-1"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label ">Gender<span class="required-mark">*</span></label>
                                       <div class="col-md-9">
                                          <div class="row">
                                             <div class="col-md-3 short-col mobile-drop">
                                                <select class="form-control droupdown gender" name="gender" autocomplete="off">
                                                   <option value="" selected="selected" >Select</option>
                                                   <option value="Male">Male</option>
                                                   <option value="Female">Female</option>
                                                </select>
                                             </div>
                                             <div class="col-md-8 short-col">
                                                <select class="form-control droupdown identified" name="identified" autocomplete="off">
                                                   <option value="" selected="selected" >Identified As</option>
                                                   <option value="Male">Male</option>
                                                   <option value="Female">Female</option>
                                                </select>
                                             </div>
                                             <div class="col-md-3"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Date of Birth</label>
                                       <div class="col-md-9 time-add">
                                          <input type="text" name="dob" class="form-control date-select width-add dob" id="datetimepicker4" placeholder="mm-dd-yyyy" autocomplete="off">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label ">Email Address<span class="required-mark">*</span></label>
                                       <div class="col-md-9 time-add">
                                          <input type="email" name="email" class="form-control width-add email"  placeholder="" autocomplete="off">
                                       </div>
                                    </div>
                                    <div class="form-group row new-phone">
                                       <label class="col-md-3 col-form-label ">Phone<span class="required-mark">*</span></label>
                                       <div class="col-md-9 new-phone-add">
                                          <div class="row">
                                             <div class="col-md-3 short-col">
                                                <select class="form-control droupdown mobile-drop phonetype" name="celltype" autocomplete="off">
                                                   <option value="" >Select</option>
                                                   <option value="Home">Home</option>
                                                   <option value="Work">Work</option>
                                                   <option value="School">School</option>
                                                   <option value="Mobile" selected="selected">Mobile</option>
                                                   <option value="Main">Main</option>
                                                   <option value="Other">Other</option>
                                                </select>
                                             </div>
                                             <div class="col-md-8 short-col">
                                                <input type="tel" name="cellphone" class="form-control phone"  placeholder="Phone">
                                             </div>
                                             <div class="col-md-1"></div>
                                          </div>                                             
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label"></label>
                                       <div class="col-md-9 common-text short-col">
                                          <button class="add_phone common-button-addmore"><i class="fa fa-plus common-icons"></i>Add New Phone</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 active-tool-box">
                              <div class="active-tool">
                                 <div class="card-body">
                                    <div class="form-group row tool-box">
                                       <label class="col-md-5 col-form-label assigned-label">Record #</label>
                                       <div class="col-md-7">
                                          <input type="text" name="record" class="form-control date-select without-background record_no" value="RCNO_<?php echo rand('111111111','999999999'); ?>">
                                       </div>
                                    </div>
                                    <div class="form-group row tool-box">
                                       <label class="col-md-5 col-form-label assigned-label ">Status</label>
                                       <div class="col-md-7">
                                          <select class="form-control active-status apprroved statusval" name="status">
                                             <option value="0">Select Status</option>
                                             @foreach ($consumer_statuses as $consumer_status)
                                                <option value="{{$consumer_status->id}}">{{$consumer_status->title}}</option>
                                             @endforeach
                                             
                                             
                                             
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row tool-box">
                                       <label class="col-md-5 col-form-label assigned-label">Assignee</label>
                                       <div class="col-md-7">
                                         <select class="form-control active-status apprroved  assigneeval" name="assignee">
                                             <option value="">Unassigned</option>
                                             @foreach ($supervisors as $supervisor)
                                                <option value="{{$supervisor->id}}">{{$supervisor->fname}} {{$supervisor->lname}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row tool-box">
                                       <label class="col-md-5 col-form-label assigned-label">Service Date</label>
                                       <div class="col-md-7">
                                          <!-- <label class="services-date">9/15/20</label> -->
                                          <input type="text" name="services-date" class="form-control date-select without-background servicedate" placeholder="No Service Date" autocomplete="off">
                                       </div>
                                    </div>                                    
                                    <div class="form-group row tool-box">
                                       <label class="col-md-5 col-form-label assigned-label">Admission Date</label>
                                       <div class="col-md-7">
                                          <!-- <label class="services-date">9/15/20</label> -->
                                          <input type="text" name="admission-date" class="form-control date-select without-background admissiondate" placeholder="No Admission Date" autocomplete="off">
                                       </div>
                                    </div>
                                    <div class="form-group row tool-box">
                                       <label class="col-md-5 col-form-label assigned-label">Discharge Date</label>
                                       <div class="col-md-7">
                                         <input type="text" name="discharge-date" class="form-control date-select without-background dischargedate" placeholder="No Discharge Date" autocomplete="off">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="tab-section">
                        <div class="tab-bar">
                           <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                          <li class="nav-item active">
                            <a class="nav-link tabs active" id="custom-content-below-home-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-home" aria-selected="false" onclick="openTabs(event, 'address')">Address</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-profile-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-profile" aria-selected="false" onclick="openTabs(event, 'other-details')">Other Details</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-messages-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-messages" aria-selected="false" onclick="openTabs(event, 'payer-info')">Payer Info</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-settings-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'contact-persons')">Contact Persons</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-settings-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'team')">Team</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-settings-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'diagnosis')">Diagnosis</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-settings-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'medications')">Medications</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-settings-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'allergies')">Allergies</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-settings-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'account-notations')">Account Notations</a>
                          </li>
                        </ul>
                        </div>
                  </section>
                  <section class="contentsection" id="address">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-6">
                              <h5 class="small-sub-title">BILLING ADDRESS</h5>
                              <div class="card card-primary">
                                 <div class="card-body">
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label required-field">Address<span class="required-mark">*</span></label>
                                       <div class="col-md-8 common-textbox">
                                          <textarea name="address" class="form-control baddress" placeholder="Street 1"></textarea>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label"></label>
                                       <div class="col-md-8 common-textbox">
                                          <textarea class="form-control bstreet" placeholder="Street 2"></textarea>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">City</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="city" class="form-control bcity"  placeholder="City">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">State</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown bstate" name="state">
                                             <option value="" selected="selected" >Select</option>
                                             @foreach ($states as $state)
                                                <option value="{{$state->id}}">{{$state->name}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Zip Code</label>
                                       <div class="col-md-8 common-textbox">
                                          <input name="zip-code" type="text" class="form-control bzipcode"  placeholder="Zip Code">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Country</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown  bcountry" name="country">
                                             <option value="" selected="selected" >Select</option>
                                             @foreach ($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Type</label>
                                       <div class="col-md-8 common-textbox add-new-selectbox">
                                          <select id="multiple-checkboxes" class="btypes" multiple="multiple">
                                             <option value="mail">Mail</option>
                                             <option value="temporary address">Temporary Address</option>
                                             <option value="other">Other</option>
                                          </select>  
                                          <span class="icon-multiselect"></span> 
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Notes</label>
                                       <div class="col-md-8 common-textbox">
                                          <textarea name="notes" class="form-control bnotes" placeholder=""></textarea>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <h5 class="small-sub-title">ALTERNATE ADDRESS<span class="pull-right copybilladdress">Copy billing address<i class="fa fa-arrow-down" aria-hidden="true"></i></span></h5>
                              <div class="card card-primary">
                                 <div class="card-body">
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label required-field">Address<span class="required-mark">*</span></label>
                                       <div class="col-md-8 common-textbox">
                                          <textarea name="address1" class="form-control aaddress" placeholder="Street 1"></textarea>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label"></label>
                                       <div class="col-md-8 common-textbox">
                                          <textarea name="address-2" class="form-control astreet" placeholder="Street 2"></textarea>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">City</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="city" class="form-control acity"  placeholder="City">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">State</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown astate" name="state">
                                             <option value="" selected="selected" >Select</option>
                                             @foreach ($states as $state)
                                                <option value="{{$state->id}}">{{$state->name}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Zip Code</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="zip-code" class="form-control azipcode"  placeholder="Zip Code">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Country</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown acountry" name="country">
                                             <option value="" selected="selected" >Select</option>
                                             @foreach ($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Type</label>
                                       <div class="col-md-8 common-textbox">
                                          <select id="multiple-checkboxes-01" class="atypes" multiple="multiple">
                                             <option value="mail">Mail</option>
                                             <option value="temporary address">Temporary Address</option>
                                             <option value="other">Other</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Notes</label>
                                       <div class="col-md-8 common-textbox">
                                          <textarea name="notes" class="form-control anotes" placeholder=""></textarea>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="contentsection" id="other-details">
                     <div class="container-fluid">
                        <div class="row">
                           
                           <div class="col-md-12 errorbillingclass">
                           </div>
                           <div class="col-md-6">
                              <div class="card card-primary">
                                 <div class="card-body">
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Language</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown  language" name="language">
                                             <option value="" selected="selected" >Select</option>
                                             @foreach ($languages as $language)
                                                <option value="{{$language->id}}">{{$language->title}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Race</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown  race" name="race">
                                             <option value="" selected="selected" >Select</option>
                                             @foreach ($races as $race)
                                                <option value="{{$race->id}}">{{$race->title}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Marital Status</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown marital-status" name="marital-status">
                                             <option value="" selected="selected" >Select</option>
                                             @foreach ($marital_statuss as $marital_status)
                                                <option value="{{$marital_status->id}}">{{$marital_status->title}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Ethinicity</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown ethinicity" name="ethinicity">
                                             <option value="" selected="selected" >Select</option>
                                             @foreach ($ethnicities as $ethnicity)
                                                <option value="{{$ethnicity->id}}">{{$ethnicity->title}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label ">Case Name<span class="required-mark">*</span></label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="casename" class="form-control casename" placeholder="Case Name">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Lead Person</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown lead-person" name="lead-person">
                                             <option value="" selected="selected" >Select</option>
                                             @foreach ($supervisors as $supervisor)
                                                <option value="{{$supervisor->id}}">{{$supervisor->fname}} {{$supervisor->lname}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                   
                                    
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">In Crisis</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="in-crisis" class="form-control in-crisis" placeholder="In Crisis">
                                       </div>
                                    </div>                                                                           
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Ordering NPI #</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="ordering-npi" class="form-control npi" placeholder="Ordering NPI #">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Smoker Status</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown smoker-status" name="smoker-status">
                                             <option value="" selected="selected" >Select</option>
                                             @foreach ($smoker_statuss as $smoker_status)
                                                <option value="{{$smoker_status->id}}">{{$smoker_status->title}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Fall Risk</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown fall-risk" name="full-risk">
                                             <option value="" selected="selected" >Select</option>
                                             <option value="0">Yes</option>
                                             <option value="1">No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Hearing Impaired</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown hearing_impaired" name="impaired">
                                             <option value="" selected="selected" >Select</option>
                                             <option value="0">Yes</option>
                                             <option value="1">No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Seeing Impaired</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown seeing_impaired" name="seeing">
                                             <option value="" selected="selected" >Select</option>
                                             <option value="0">Yes</option>
                                             <option value="1">No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Preferred Hospital</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown preferred" name="preferred">
                                             <option value="" selected="selected" >Select</option>
                                             <option value="1">Select Preferred Hospital 1</option>
                                             <option value="2">Select Preferred Hospital 2</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Referral Source</label>
                                       <div class="col-md-8 common-textbox">
                                          <textarea name="referral-source" class="form-control referral-source" placeholder=""></textarea>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="contentsection" id="payer-info">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                              <form class="payer-form">
                                 <div class="table-scrollbar common-scroll">
                                    <table class="table-payer-info common-table-info">
                                       <tbody>
                                          <tr class="tr-payer-info common-tr-info">
                                             <td>
                                                <select class="form-control droupdown custom-payer-field common-text-box-new payerid" name="ahena">
                                                   <option value="" selected="selected" >Select Payer Name</option>
                                                   @foreach ($payers as $payer)
                                                      <option value="{{$payer->id}}">{{$payer->title}}</option>
                                                   @endforeach
                                                  
                                                </select>
                                             </td>
                                             <td>                                                
                                                <input type="text" name="policy" class="form-control custom-payer-field common-text-box-new payerpolicyno" placeholder="Policy #">
                                             </td>
                                             <td>
                                                <select class="form-control droupdown custom-payer-field common-text-box-new self-pay-text insurance-dropdown payerinsurancetype" name="insurance">
                                                   <option value="Select Insurance Type" selected="selected" >Select</option>
                                                   <option value="medicaid">Medicaid</option>
                                                   <option value="medicare">Medicare</option>
                                                   <option value="private insurance">Private Insurance</option>
                                                   <option value="self pay">Self Pay</option>
                                                </select>
                                             </td>
                                             <td>
                                                <input type="text" name="co-pay" class="form-control custom-payer-field common-text-box-new payercopay" placeholder="Co-pay Amount">
                                             </td>
                                          </tr>
                                          <tr>
                                             <td></td>
                                             <td></td>
                                             <td>
                                                <div class="dropdown-open">
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <label class="col-form-label user">Amount</label>
                                                      </div>
                                                      <div class="col-md-12">
                                                         <select name="select" class="form-control droupdown" name="user">
                                                           <option value="5">$5</option>
                                                           <option value="10">$10</option>
                                                           <option value="15">$15</option>
                                                           <option value="20">$20</option>
                                                           <option value="25">$25</option>
                                                           <option value="30">$30</option>
                                                           <option value="35">$35</option>
                                                           <option value="40">$40</option>
                                                           <option value="45">$45</option>
                                                           <option value="50" selected="selected">$50</option>
                                                         </select>
                                                         <div class="btn-section">
                                                            <button type="button" class="btn btn-primary btn-add common-btn-close" data-dismiss="modal">Update</button>
                                                            <button type="button" class="btn btn-default btn-cancle common-btn-close" data-dismiss="modal">Cancel</button>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </td>
                                             <td></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                                 <button class="add_form_field common-button"><i class="fa fa-plus common-icons"></i> Add New Payer</button> 
                                 <span class="note-only">Note: Only 3 payers are allowed.</span>                                                                
                              </form>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="contentsection" id="contact-persons">
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
                                                <option value="" selected="selected" >Select</option>
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
                                                <option value="" selected="selected" >Select</option>
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
                                                <option value="" selected="selected" >Select</option>
                                                @foreach ($states as $state)
                                                <option value="{{$state->id}}">{{$state->name}}</option>
                                                @endforeach
                                             </select>
                                          </td>
                                          <td>
                                             <select class="form-control droupdown custom-contact-field common-text-box-new country_id" name="country">
                                                <option value="" selected="selected" >Select</option>
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
                  <section class="contentsection" id="team">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                              <a href="#myModal" class="btn btn-primary add-member" data-toggle="modal">Add Members...</a>
                              <a id="remove-id" class="team-remove">Remove From Team</a>
                              <div class="check-sec">
                                 <div class="check-parts">
                                    <input type="checkbox" name="" class="check-input  teams">
                                    <label class="lbl-check">Chris Edwards</label>
                                 </div>
                                 <div class="check-parts">
                                    <input type="checkbox" name="" class="check-input teams">
                                    <label class="lbl-check">Ida Heidi</label>
                                 </div>
                                 <div class="check-parts">
                                    <input type="checkbox" name="" class="check-input teams">
                                    <label class="lbl-check">Williams Jackson</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="modal fade add-new-team-member" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-hidden="true">x</button> -->
                                  <i class="fa fa-close button-close" data-dismiss="modal" aria-hidden="true"></i>
                                  <h4 class="modal-title">Add Team Members</h4>
                                </div>
                                <div class="modal-body">
                                 <form class="team-form" id="submit-form">
                                    <div class="row model-row">
                                       <div class="col-md-4">
                                          <label class="col-form-label user">User to Employee</label>
                                       </div>
                                       <div class="col-md-8">
                                           <div class="common-textbox">
                                             <select name="select" class="form-control droupdown" name="user">
                                                <optgroup class="dropdown-title" label="Users">
                                                <option selected="selected" >Select</option>
                                                <option value="Stacy Owens">Stacy Owens<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;stacy.owens@focus</span></option>
                                                <option value="Stacy Owens">Stacy Owens<span class="email-address">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;stacy.owens@focus</span></option>
                                                </optgroup>
                                             </select>
                                          </div>
                                          <div class="btn-section">
                                             <button type="button" class="btn btn-primary btn-add" data-dismiss="modal">Add</button>
                                             <button type="button" class="btn btn-default btn-cancle" data-dismiss="modal">Cancel</button>
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                                </div>
                              </div>
                           </div>
                       </div>
                     </div>
                  </section>
                  <section class="contentsection" id="diagnosis">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="table-scrollbar common-scroll">
                                 <table class="table-diagnosis-notations common-table-info">
                                    <thead>
                                       <th>Primary</th>
                                       <th>Axis Level</th>
                                       <th>Date</th>
                                       <th>Problem Description</th>
                                       <th>ICD9</th>
                                       <th>ICD10</th>
                                       <th>Status</th>
                                    </thead>
                                    <tr class="tr-diagnosis-info common-tr-info">
                                       <td>
                                          <select class="form-control droupdown custom-diagnosis-field common-text-box-new primarytype" name="primary">
                                             <option value="" selected="selected" >Select</option>
                                             @foreach ($primaries as $primary)
                                                <option value="{{$primary->id}}">{{$primary->title}}</option>
                                             @endforeach
                                          </select>
                                       </td>
                                       <td>
                                          <select class="form-control droupdown custom-diagnosis-field common-text-box-new axisleveltype" name="axis-level">
                                             <option value="" selected="selected" >Select</option>
                                             @foreach ($axis_levels as $axis_level)
                                                <option value="{{$axis_level->id}}">{{$axis_level->title}}</option>
                                             @endforeach
                                          </select>
                                       </td>
                                       <td>
                                          <input type="text" name="date" class="form-control custom-diagnosis-field diagnosis-date common-text-box-new" placeholder="">
                                       </td>
                                       <td>
                                          <input type="text" name="problem-desc" class="form-control custom-diagnosis-field common-text-box-new primarydesc" placeholder="">
                                       </td>
                                       <td>
                                          <input type="text" name="icd9" class="form-control custom-diagnosis-field common-text-box-new icd9type" placeholder="">
                                       </td>
                                       <td>
                                          <input type="text" name="icd10" class="form-control custom-diagnosis-field common-text-box-new icd10type" placeholder="">
                                       </td>

                                       <td>
                                          <select class="form-control droupdown custom-diagnosis-field common-text-box-new primarystatus" name="status">
                                             <option value="" selected="selected" >Select</option>
                                             <option value="1">Active</option>
                                             <option value="2">Inactive</option>
                                             <option value="3">Resolved</option>
                                          </select>
                                       </td>
                                    </tr>
                                 </table>
                              </div>
                              <button type="button" class="add_form_diagnosis common-button"><i class="fa fa-plus common-icons"></i>Add New Diagnosis</button> 
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="contentsection" id="medications">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="table-scrollbar common-scroll">
                                 <table class="table-medications common-table-info">
                                    <thead>
                                       <th>Name</th>
                                       <th>Side Effects</th>
                                       <th>Pharmacy</th>
                                       <th>Reaction</th>
                                       <th>Severity</th>
                                    </thead>
                                    <tr class="tr-medications-info common-tr-info">
                                       <td>
                                          <input type="text" name="name" class="form-control custom-medications-field common-text-box-new midicationname" placeholder="">
                                       </td>
                                       <td>
                                          <input type="text" name="side-effacts" class="form-control custom-medications-field common-text-box-new  sideeffecttype" placeholder="">
                                       </td>
                                       <td>
                                          <input type="text" name="pharmacy" class="form-control custom-medications-field common-text-box-new pharmacytype" placeholder="">
                                       </td>
                                       <td>
                                          <select class="form-control droupdown custom-medications-field common-text-box-new reactiontype" name="reaction">
                                             <option value="" selected="selected" >Select</option>
                                             @foreach ($reactions as $reaction)
                                             <option value="{{$reaction->id}}">{{$reaction->title}}</option>
                                             @endforeach
                                          </select>
                                       </td>
                                       <td>
                                          <select class="form-control droupdown custom-medications-field common-text-box-new severitytype" name="severity">
                                             <option value="" selected="selected" >Select</option>
                                             <option value="1">Very Mild</option>
                                             <option value="2">Mild</option>
                                             <option value="3">Moderate</option>
                                             <option value="4">Severe</option>
                                          </select>
                                       </td>
                                    </tr>
                                 </table>
                              </div>                              
                              <button class="add_form_medications common-button"><i class="fa fa-plus common-icons"></i>Add New Medications</button> 
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="contentsection" id="allergies">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-1">
                                    <div class="form-group">
                                       <label class="col-form-label">Allergies</label>
                                    </div>
                                 </div>
                                 <div class="col-md-3 space-remove-left">
                                    <div class="form-group">
                                       <select class="form-control  allergies_val" name="allergies">
                                          <option value="0">Yes</option>
                                          <option value="1">No</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-8"></div>
                              </div>
                              <div class="table-scrollbar common-scroll table-scrollbar_allergy">
                                 <table class="table-allergies common-table-info">
                                    <thead>
                                       <th>Name</th>
                                       <th>Reaction</th>
                                       <th>Severity</th>
                                    </thead>
                                    <tr class="tr-allergies-info common-tr-info">
                                       <td>
                                          <input type="text" name="name" class="form-control custom-allergies-field common-text-box-new allerginame" placeholder="">
                                       </td>
                                       <td>
                                          <select class="form-control droupdown custom-allergies-field common-text-box-new reactiontype" name="reaction">
                                             <option value="" selected="selected" >Select</option>
                                             @foreach ($reactions as $reaction)
                                             <option value="{{$reaction->id}}">{{$reaction->title}}</option>
                                             @endforeach
                                          </select>
                                       </td>
                                       <td>
                                          <select class="form-control droupdown custom-allergies-field common-text-box-new seveitytype" name="severity">
                                             <option value="" selected="selected" >Select</option>
                                             <option value="1">Very Mild</option>
                                             <option value="2">Mild</option>
                                             <option value="3">Moderate</option>
                                             <option value="4">Severe</option>
                                          </select>
                                       </td>
                                    </tr>
                                 </table>
                              </div>                              
                              <button class="add_form_allergies common-button"><i class="fa fa-plus common-icons"></i>Add New Allergies</button> 
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="contentsection" id="account-notations">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="table-scrollbar common-scroll">
                                 <table class="table-account-notations common-table-info">
                                    <thead>
                                       <th>Type</th>
                                       <th>Notation</th>
                                       <th>By</th>
                                       <th>Date</th>
                                    </thead>
                                    <tr class="tr-account-info common-tr-info">
                                       <td>
                                          <select class="form-control droupdown custom-account-field common-text-box-new notationtype" name="type">
                                             <option value="" selected="selected" >Select</option>
                                             @foreach ($notation_types as $notation_type)
                                             <option value="{{$notation_type->id}}">{{$notation_type->title}}</option>
                                             @endforeach
                                          </select>
                                       </td>
                                       <td>
                                          <input name="notation" type="text" class="form-control custom-account-field common-text-box-new notationtitle" placeholder="">
                                       </td>
                                       <td>
                                          <select class="form-control droupdown custom-account-field common-text-box-new notationby" name="by">
                                             <option value="" selected="selected" >Select</option>
                                             <option value="1">Select 1</option>
                                             <option value="2">Select 2</option>
                                          </select>
                                       </td>
                                       <td>
                                          <input type="text" name="date" class="form-control custom-account-field date-type common-text-box-new notationdate" placeholder="">
                                       </td>
                                    </tr>
                                 </table>
                              </div>                              
                              <button class="add_form_account common-button"><i class="fa fa-plus common-icons"></i>Add New Notations</button> 
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="footer-section">
                     <div class="container-fluid">
                        <div class="card-footer">
                           <button type="button" class="btn btn-info saveconsumer">Save</button>
                           <a href="{{ route('consumers-listing') }}" class="btn btn-default float-right">Cancel</a>
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
    image.onload = function() {
      var n = file.name;
      $('#uploadPreview').append('<div class="image-section"><div class="row"><div class="col-md-8"><p class="file-name-image">' + n + '</p></div><div class="col-md-4"><span class="delete-image"><i class="fa fa-trash delete" aria-hidden="true"></i>Delete</span></div></div></div>');
      $('.delete-image').click(function(){
        $(this).parent().parent().parent().remove();
      });
    };

    image.onerror= function() {
      alert('Invalid file type: '+ file.type);
    };    
  };
}
$("#file-upload").change(function (e) {
  if(this.disabled) {
    return alert('File upload not supported!');
  }
  var F = this.files;
  if (F && F[0]) {
    for (var i = 0; i < F.length; i++) {
      readImage(F[i]);
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
        
        $('.dob,.servicedate,.admissiondate,.dischargedate,.diagnosis-date,.hasDatepicker,.date-type,.notationdate').datepicker({ changeMonth: true,changeYear: true,dateFormat: "mm-dd-yy" });
        
        $(document).on('focus','.dob,.servicedate,.admissiondate,.dischargedate,.diagnosis-date,.hasDatepicker,.date-type,.notationdate',function(){
           $('.dob,.servicedate,.admissiondate,.dischargedate,.diagnosis-date,.hasDatepicker,.date-type,.notationdate').datepicker({
               changeMonth: true,changeYear: true,
               dateFormat: 'mm-dd-yy',
               autoclose: true,
               todayHighlight: true
           });
        });
       
       
       
       function  renderData(validation_array){
           var errorhtmldata = '<ul>';
            $(validation_array).each(function(key,val){
                errorhtmldata += '<li>'+val+'</li>';
            });
            errorhtmldata += '</ul>';
            $('.errorclass').html(errorhtmldata);
       }
       
       function checkconsumeremail(email,validation_array){
            
            var url = "{{ url('checkconsumeremail') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: {email:email},
                success: function (data) {
                        
                        if(data.success=='1'){
                            //localStorage.setItem("logincheck", "1");
                            validation_array.push('Email already exist');          
                        }
                        renderData(validation_array);
                        
                        
                          


                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
            
            //return localStorage.getItem("logincheck");
            
            
      }
           
        
        $('html').on('click', '.saveconsumer', function (e) {
            
            
            var salutation = $('.salutation').val();
            var fname = $('.fname').val();
            var lname = $('.lname').val();
            var gender = $('.gender').val();
            var  identified = $('.identified').val();
            var dob = $('.dob').val();
            var email = $('.email').val();
            
            var record_no = $('.record_no').val();
            var statusval = $('.statusval').val();
            var assigneeval = $('.assigneeval').val();
            
            
            var servicedate = $('.servicedate').val();
            
            var admissiondate = $('.admissiondate').val();
            var dischargedate = $('.dischargedate').val();         
            
         
            
            var language = $('.language').val();
            var race = $('.race').val();
            var marital_status = $('.marital-status').val();
            var ethinicity = $('.ethinicity').val();
            var casename = $('.casename').val();
            var lead_person = $('.lead-person').val();
            
            var allergies_val = $('.allergies_val').val();
            
            
            
            //var nurse = $('.nurse').val();
            //var doctor = $('.doctor').val();
            var in_crisis = $('.in-crisis').val();
            
            var npi = $('.npi').val();
            var smoker_status = $('.smoker-status').val();
            var fall_risk = $('.fall-risk').val();
            var hearing_impaired = $('.hearing_impaired').val();
            var seeing_impaired = $('.seeing_impaired').val();
            
            var preferred = $('.preferred').val();
            var referral_source = $('.referral-source').val();
            
            
            var phonetype_array= [];
            $(".phonetype").each(function(i, value) {
               
               phonetype_array.push({
                  phonetype: $(this).val(), 
                  phone: $(this).parent().parent().children('.col-md-8').find('.phone').val(),

                  
              });
            });
            
            
            var payerid_array= [];
            $(".payerid").each(function(i, value) {
               
               payerid_array.push({
                  payerid: $(this).val(), 
                  payerpolicyno: $(this).parent().parent().children('td').find('.payerpolicyno').val(),
                  payerinsurancetype: $(this).parent().parent().children('td').find('.payerinsurancetype').val(),
                  payercopay: $(this).parent().parent().children('td').find('.payercopay').val(),

                  
              });
            });
            
            
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
            
            
            
            var primarytype_array= [];
            $(".primarytype").each(function(i, value) {
               
               primarytype_array.push({
                  primarytype: $(this).val(), 
                  axisleveltype: $(this).closest('tr').find('.axisleveltype').val(),
                  diagnosis_date: $(this).closest('tr').find('.diagnosis-date').val(),
                  primarydesc: $(this).closest('tr').find('.primarydesc').val(),
                  icd9type: $(this).closest('tr').find('.icd9type').val(),
                  icd10type: $(this).closest('tr').find('.icd10type').val(),
                  primarystatus: $(this).closest('tr').find('.primarystatus').val(),
                  
              });
            });
            
            
            var midicationname_array= [];
            $(".midicationname").each(function(i, value) {
               
               midicationname_array.push({
                  midicationname: $(this).val(), 
                  sideeffecttype: $(this).closest('tr').find('.sideeffecttype').val(),
                  pharmacytype: $(this).closest('tr').find('.pharmacytype').val(),
                  reactiontype: $(this).closest('tr').find('.reactiontype').val(),
                  severitytype: $(this).closest('tr').find('.severitytype').val(),
                  
                  
              });
            });
            
            
            var allerginame_array= [];
            if(allergies_val=='0'){
               $(".allerginame").each(function(i, value) {
                  
                  allerginame_array.push({
                     allerginame: $(this).val(), 
                     reactiontype: $(this).closest('tr').find('.reactiontype').val(),
                     seveitytype: $(this).closest('tr').find('.seveitytype').val(),
                     
                     
                     
                 });
               });
            }
            
            
            
            var notationtype_array= [];
            $(".notationtype").each(function(i, value) {
               
               notationtype_array.push({
                  notationtype: $(this).val(), 
                  notationtitle: $(this).closest('tr').find('.notationtitle').val(),
                  notationby: $(this).closest('tr').find('.notationby').val(),
                  notationdate : $(this).closest('tr').find('.notationdate ').val(),
                  
                  
                  
              });
            });
            
            

            $('.errorclass').html('');
            var validation_array= [];
            

            if(salutation==null ||  salutation==''){
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
            
            if(identified==null  ||  identified==''){
               validation_array.push('Please select identified');               
            }               
            
            if(dob==null   ||  dob==''){
               validation_array.push('Please select date of birth');               
            }               
            
            
           
            function IsEmail(email) {
               var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
               if(!regex.test(email)) {
                  return false;
               }else{
                  return true;
               }
            }
            
            
           
            
            if(IsEmail(email)==false || email==''  || email==null){
               validation_array.push('Please enter valid email address');               
            }
            
            checkconsumeremail(email,validation_array)
            
            
           
           
           
           
           

           
            
            if(servicedate==null   ||  servicedate==''){
               validation_array.push('Please service date');               
            }
            
            
            if(admissiondate==null   ||  admissiondate==''){
               validation_array.push('Please admissiondate date');               
            }
            
            if(dischargedate==null   ||  dischargedate==''){
               validation_array.push('Please discharge date');               
            }
            
            
       
            renderData(validation_array);
            


            var validation_billing_array= [];
            if(language==null   ||  language==''){
               othernfo();
                validation_billing_array.push('Please select language');
            }
            
            

            
            if(race==null   ||  race==''){
               othernfo();
               validation_billing_array.push('Please select race');
            }
            
            
            if(marital_status==null   ||  marital_status==''){
               othernfo();
               validation_billing_array.push('Please select marital status');
            }
            
            
            if(ethinicity==null   ||  ethinicity==''){
               othernfo();
               validation_billing_array.push('Please select ethinicity');
            }
            
            
            if(casename==null   ||  casename==''){
               othernfo();
               validation_billing_array.push('Please enter case name');
            }
            
            
            if(lead_person==null   ||  lead_person==''){
               othernfo();
               validation_billing_array.push('Please select lead person');
            }
            
            /*
            if(nurse==null   ||  nurse==''){
               othernfo();
               validation_billing_array.push('Please select nurse');
            }
            if(doctor==null   ||  doctor==''){
               othernfo();
               validation_billing_array.push('Please select doctor');
            }
            */
            
            if(in_crisis==null   ||  in_crisis==''){
               othernfo();
               validation_billing_array.push('Please select in crisis');
            }
            

            if(npi==null   ||  npi==''){
               othernfo();
               validation_billing_array.push('Please select npi');
            }
            
            
            
            if(smoker_status==null   ||  smoker_status==''){
               othernfo();
                validation_billing_array.push('Please select smoker status');
            }
            
            
            
            if(fall_risk==null   ||  smoker_status==''){
               othernfo();
               validation_billing_array.push('Please select fall risk');
            }
            
            
            
            
            if(hearing_impaired==null   ||  hearing_impaired==''){
               othernfo();
               validation_billing_array.push('Please select hearing impaired');
            }
            
            
            if(seeing_impaired==null   ||  seeing_impaired==''){
               othernfo();
               validation_billing_array.push('Please select seeing impaired');
            }
           
            
            if(preferred==null   ||  preferred==''){
               othernfo();
               validation_billing_array.push('Please select preferred');
            }
            
            
            
            if(referral_source==null   ||  referral_source==''){
               othernfo();
               validation_billing_array.push('Please select referral source');
            }
            
            function othernfo(){
               $('.tabs').removeClass('active');
               $('#address').hide();
               $('#custom-content-below-profile-tab').addClass('active');                
               $('#other-details').show();
               /*
               $('html, body').animate({
                  scrollTop: $("#other-details").offset().top
               }, 2000);
               */
            }
            
            var errorbillingdata = '<ul>';
            $(validation_billing_array).each(function(key,val){
                errorbillingdata += '<li>'+val+'</li>';
            });
            errorbillingdata += '</ul>';
            $('.errorbillingclass').html(errorbillingdata);
            
            
            if(validation_array.length > 0 || validation_billing_array.length > 0){
                return false;
            }
            
            
            
            
            
            
            var baddress = $('.baddress').val();
            var bstreet = $('.bstreet').val();
            var bcity = $('.bcity').val();
            var bstate = $('.bstate').val();
            var bzipcode = $('.bzipcode').val();
            var bcountry = $('.bcountry').val();
            var btypes = $('.btypes').val();
            var bnotes = $('.bnotes').val();

            
            var aaddress = $('.aaddress').val();
            var astreet = $('.astreet').val();
            var acity = $('.acity').val();
            var astate = $('.astate').val();
            var azipcode = $('.azipcode').val();
            var acountry = $('.acountry').val();
            var atypes = $('.atypes').val();
            var anotes = $('.anotes').val();
            
            
            
            

            
            var formData = new FormData();
            
              
            


            
            var dataValues = { 
                              baddress: baddress,
                              bstreet: bstreet,            
                              bcity: bcity,
                              bstate: bstate,            
                              bzipcode: bzipcode,
                              bcountry: bcountry,            
                              btypes: btypes,
                              bnotes: bnotes,            
                              
                              aaddress: aaddress,
                              astreet: astreet,            
                              acity: acity,
                              astate: astate,            
                              azipcode: azipcode,
                              acountry: acountry,            
                              atypes: atypes,
                              anotes: anotes,            

                              salutation: salutation,
                              fname: fname,
                              lname: lname,
                              gender: gender,
                              dob: dob,
                              email: email,
                              allergies_val:allergies_val,
                              

                              record_no: record_no,
                              statusval: statusval,
                              assigneeval: assigneeval,
                              servicedate: servicedate,
                              admissiondate: admissiondate,
                              
                              dischargedate: dischargedate,
                        
                              language: language,
                              race: race,
                              marital_status: marital_status,
                              ethinicity: ethinicity,
                              casename: casename,
                              lead_person: lead_person,
                              //nurse: nurse,
                              //doctor: doctor,
                              in_crisis: in_crisis,
                              npi: npi,
                              smoker_status: smoker_status,
                              fall_risk: fall_risk,
                              hearing_impaired: hearing_impaired,
                              seeing_impaired:seeing_impaired,
                              preferred: preferred,
                              referral_source: referral_source,
                              phonetype_array:phonetype_array,
                              payerid_array:payerid_array,
                              contact_type_array:contact_type_array,
                              primarytype_array:primarytype_array,
                              midicationname_array:midicationname_array,
                              allerginame_array:allerginame_array,
                              notationtype_array:notationtype_array,

                              
                              
                           };
           
           
           
            options = JSON.stringify(dataValues);
            formData.append('options', options);
            
            var url = "{{ url('consumers-add') }}";
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
                        window.location.href= "{{ url('consumers-listing') }}";
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
               '<option value="">Select</option>'+
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
               '<option value="">Select</option>';
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
               '<option value="">Select</option>';
               @foreach ($states as $state)      
               htmlData += '<option value="{{$state->id}}">{{$state->name}}</option> ';
               @endforeach
   
               htmlData += '</select>'+
               '</td>'+
               '<td>'+
               '<select class="form-control droupdown custom-contact-field common-text-box-new country_id">'+
               '<option value="">Select</option>';
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
                     '<input type="text" name="strength" class="form-control custom-problems-field common-text-box-new received_date" placeholder="">'+ 
                     '</td>'+
                     '<td>'+
                     '<input type="text" name="score" class="form-control custom-problems-field common-text-box-new expiry_date" placeholder="">'+ 
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
             var wrapper         = $(".new-phone-add"); 
             var add_button      = $(".add_phone"); 
             
             var x = 1; 
             $(add_button).click(function(e){ 
                 e.preventDefault();
                 if(x < max_fields){ 
                     x++; 
                     $(wrapper).append('<div class="row new-row-add"> <div class="col-md-3 short-col"> <select class="form-control droupdown mobile-drop phonetype" name="celltype"> <option value="">Select</option> <option value="home">Home</option> <option value="work">Work</option><option value="school">School</option><option value="mobile" selected="selected">Mobile</option><option value="main">Main</option><option value="other">Other</option> </select> </div><div class="col-md-8 short-col"> <input type="tel" name="cellphone" class="form-control mobile-drop phone" placeholder="Phone"> </div><div class="col-md-1 short-col"><i class="fa fa-close delete-button delete"></i></div></div>'); //add input box
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
       $('html').on("click",".copybilladdress",function(){
           $('.aaddress').val($('.baddress').val());
           $('.astreet').val($('.bstreet').val());
           $('.acity').val($('.bcity').val());
           $('.astate').val($('.bstate').val());
           $('.azipcode').val($('.bzipcode').val());
           $('.acountry').val($('.bcountry').val());
           $('.atypes').val($('.btypes').val());
            

           $('.anotes').val($('.bnotes').val());
       });
   });
   
 // Add Payer Info
   $(document).ready(function() {
       var max_fields      = 3;
       var wrapper         = $(".table-payer-info"); 
       var add_button      = $(".add_form_field"); 
       
       var x = 1; 
       
   $('html').on("click",".add_form_field",function(e){
           e.preventDefault();
           var clength = $('.tr-payer-info').length;
              if(clength < max_fields){
              x++; 
              var htmlData ='<tr class="tr-payer-info common-tr-info">'+
              '<td> '+
              '<select class="form-control droupdown custom-payer-field common-text-box-new payerid" name="ahena">'+
              '<option value=""  selected="selected">Select Payer Name</option>';    
              @foreach ($payers as $payer)      
               htmlData += '<option value="{{$payer->id}}">{{$payer->title}}</option> ';
               @endforeach              
              htmlData += '</select>'+
              '</td>'+
              '<td><input type="text" name="policy" class="form-control custom-payer-field common-text-box-new payerpolicyno" placeholder="Policy #"></td>'+
              '<td> '+
              '<select class="form-control droupdown custom-payer-field common-text-box-new self-pay-text insurance-dropdown-new payerinsurancetype" name="insurance">'+
              '<option value="">Select</option>'+
              '<option value="medicaid">Medicaid</option>'+
             ' <option value="medicare">Medicare</option>'+
              '<option value="private insurance">Private Insurance</option>'+
              '<option value="self pay">Self Pay</option> '+
              '</select>'+
              '</td>'+
             ' <td> '+
              '<input type="text" name="co-pay" class="form-control custom-payer-field common-text-box-new payercopay" placeholder="Co-pay Amount"></td>'+
              '<td class="delete-section"><i class="fa fa-close delete-button delete"></i></td>'+
              '</tr>'+
              '<tr><td></td><td></td>'+
              '<td>'+
              '<div class="new-dropdown-open">'+
              '<div class="row"><div class="col-md-12"> <label class="col-form-label user">Amount</label>'+
              '</div>'+
              '<div class="col-md-12"> '+
              '<select name="select" class="form-control droupdown" name="user">'+
              '<option value="5">$5</option>'+
              '<option value="10">$10</option>'+
             ' <option value="15">$15</option>'+
              '<option value="20">$20</option>'+
              '<option value="25">$25</option>'+
              '<option value="30">$30</option>'+
              '<option value="35">$35</option>'+
             ' <option value="40">$40</option>'+
             ' <option value="45">$45</option>'+
             ' <option value="50" selected="selected">$50</option>'+
              '</select>'+
              '<div class="btn-section"> '+
             ' <button type="button" class="btn btn-primary btn-add common-btn-close" data-dismiss="modal">Update</button> '+
              '<button type="button" class="btn btn-default btn-cancle common-btn-close" data-dismiss="modal">Cancel</button>'+
              '</div>'+
              '</div>'+
              '</div></div></td><td></td></tr>';
              
              $(wrapper).append(htmlData); //add input box
              
              $('html').on('change','.insurance-dropdown-new', function(){
                $('.new-dropdown-open').slideUp();
                 $('#' + $(this).val()).slideDown();
                 if($(this).val() == 'self pay') {
                   $('.new-dropdown-open').slideDown();
                 }
              });
              
              $('.common-btn-close').click(function(){
                $('.new-dropdown-open').slideUp();
             });
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
      

   // Add Contact Diagnosis
   $(document).ready(function() {
       var max_fields      = 100;
       var wrapper         = $(".table-diagnosis-notations"); 
       var add_button      = $(".add_form_diagnosis"); 
       
       var x = 1; 
       $('html').on("click",".add_form_diagnosis",function(e){
          var clength = $('.tr-diagnosis-info').length;
              if(clength < max_fields){
               x++; 
               var htmlData= '<tr class="tr-diagnosis-info common-tr-info">'+
               '<td>'+
               '<select class="form-control droupdown custom-diagnosis-field common-text-box-new primarytype">'+
               '<option value="">Select</option>';
               @foreach ($primaries as $primary)      
               htmlData += '<option value="{{$primary->id}}">{{$primary->title}}</option> ';
               @endforeach
               htmlData +='</select>'+
               '</td>'+
               '<td>'+
               '<select class="form-control droupdown custom-diagnosis-field common-text-box-new axisleveltype">'+
               '<option value="">Select</option>';
               @foreach ($axis_levels as $axis_level)      
               htmlData += '<option value="{{$axis_level->id}}">{{$axis_level->title}}</option> ';
               @endforeach
               htmlData += '</select>'+
               '</td>'+
               '<td>'+
               '<input class="form-control custom-diagnosis-field diagnosis-date common-text-box-new" placeholder="">'+
               '</td>'+
               '<td><input class="form-control custom-diagnosis-field common-text-box-new primarydesc" placeholder=""></td>'+
               '<td><input class="form-control custom-diagnosis-field common-text-box-new icd9type" placeholder=""></td>'+
               '<td><input class="form-control custom-diagnosis-field common-text-box-new icd10type" placeholder=""></td>'+
               '<td>'+
               '<select class="form-control droupdown custom-diagnosis-field common-text-box-new primarystatus">'+
               '<option value="">Select</option>'+
               '<option value="1">Active</option>'+
               '<option value="2">InActive</option>'+
               '<option value="3">Resolved</option>'+
               '</select>'+
               '</td>'+
               '<td class="delete-section"><i class="fa fa-close delete-button delete"></i></td></tr>';
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
   
   
      // Add Medications
   $(document).ready(function() {
       var max_fields      = 100;
       var wrapper         = $(".table-medications"); 
       var add_button      = $(".add_form_medications"); 
       
       var x = 1; 
     $('html').on("click",".add_form_medications",function(e){
           e.preventDefault();
         var clength = $('.tr-medications-info').length;
              if(clength < max_fields){
               x++; 
               var htmlData = '<tr class="tr-medications-info common-tr-info">'+
               '<td><input class="form-control custom-medications-field common-text-box-new midicationname" placeholder=""></td>'+
               '<td><input class="form-control custom-medications-field common-text-box-new sideeffecttype" placeholder=""></td>'+
               '<td><input class="form-control custom-medications-field common-text-box-new pharmacytype" placeholder=""></td>'+
               '<td><select class="form-control droupdown custom-medications-field common-text-box-new reactiontype">'+
               '<option value="">Select</option>';
               @foreach ($reactions as $reaction)      
               htmlData += '<option value="{{$reaction->id}}">{{$reaction->title}}</option> ';
               @endforeach
               htmlData += '</select></td>'+
               '<td>'+
               '<select class="form-control droupdown custom-medications-field common-text-box-new severitytype">'+
               '<option value="">Select</option>'+
               '<option value="1">Very Mild</option>'+
               '<option value="2">Mild</option>'+
               '<option value="3">Moderate</option>'+
               '<option value="4">Severe</option>'+
               '</select>'+
               '</td><td class="delete-section"><i class="fa fa-close delete-button delete"></i></td></tr>'; 
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
   
   
   
      // Add Contact Allergies
   $(document).ready(function() {
       var max_fields      = 100;
       var wrapper         = $(".table-allergies"); 
       var add_button      = $(".add_form_allergies"); 
       
       var x = 1; 
       $('html').on("click",".add_form_allergies",function(e){
           e.preventDefault();
         var clength = $('.tr-allergies-info').length;
              if(clength < max_fields){
               x++; 
               
               
               var htmlData = '<tr class="tr-allergies-info common-tr-info">'+
               '<td><input class="form-control custom-allergies-field common-text-box-new allerginame" placeholder=""></td>'+
               '<td><select class="form-control droupdown custom-allergies-field common-text-box-new reactiontype">'+
               '<option value="">Select</option>';
               @foreach ($reactions as $reaction)      
               htmlData += '<option value="{{$reaction->id}}">{{$reaction->title}}</option> ';
               @endforeach
               htmlData += '</select></td><td>'+
               '<select class="form-control droupdown custom-allergies-field common-text-box-new severitytype">'+
               '<option value="">Select</option>'+
               '<option value="1">Very Mild</option>'+
               '<option value="2">Mild</option>'+
               '<option value="3">Moderate</option>'+
               '<option value="4">Severe</option>'+
               '</select>'+
               '</td><td class="delete-section"><i class="fa fa-close delete-button delete"></i></td></tr>'; 
               $(wrapper).append(htmlData);
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
   
   
   
   
   // Add Account Notations
   $(document).ready(function() {
       var max_fields      = 100;
       var wrapper         = $(".table-account-notations"); 
       var add_button      = $(".add_form_account"); 
       
       var x = 1; 
       $('html').on("click",".add_form_account",function(e){
           e.preventDefault();
         var clength = $('.tr-account-info').length;
              if(clength < max_fields){
               x++;
               var htmlData = '<tr class="tr-account-info common-tr-info">'+
               '<td><select class="form-control droupdown custom-account-field common-text-box-new notationtype">'+
               '<option>Select</option>';
               @foreach ($notation_types as $notation_type)      
               htmlData += '<option value="{{$notation_type->id}}">{{$notation_type->title}}</option> ';
               @endforeach
               htmlData += '</select>'+
               '</td><td><input class="form-control custom-account-field common-text-box-new notationtitle" placeholder=""></td>'+
               '<td><select class="form-control droupdown custom-account-field common-text-box-new notationby">'+
               '<option value="">Select</option>'+
               '<option value="1">Select 1</option>'+
               '<option value="2">Select 2</option>'+
               '</select></td>'+
               '<td><input class="form-control custom-account-field common-text-box-new notationdate" placeholder=""></td>'+
               '<td class="delete-section"><i class="fa fa-close delete-button delete"></i></td></tr>'; 
               $(wrapper).append(htmlData);
           }
         else
         {
         alert('You Reached the limits')
         }
       });
       
       $(wrapper).on("click",".delete", function(e){ 
           e.preventDefault(); $(this).parent().parent().remove(); x--;
       })
       
       
       $('.table-scrollbar_allergy').show();
       $('.add_form_allergies').show();
             
       $('html').on("change",".allergies_val", function(e){ 
         var selval = $(this).val();
         if(selval=='0'){
             $('.table-scrollbar_allergy').show();
             $('.add_form_allergies').show();
         }else{
             $('.table-scrollbar_allergy').hide();
             $('.add_form_allergies').hide();
         }
       });
       
       
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

