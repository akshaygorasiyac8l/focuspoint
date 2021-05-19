@extends('layouts.app')
@section('script1')
@endsection
@section('add_layout')
   @parent
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
                           <div class="col-md-8 consumer-section">
                              <div class="card card-primary">
                                 <div class="card-body">
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label required-field">Consumer Name<span class="required-mark">*</span></label>
                                       <div class="col-md-9">
                                          <div class="row salutions">
                                             <div class="col-md-3 short-col">
                                                <select class="form-control droupdown mobile-drop" name="salutation">
                                                <option value="" selected="selected" disabled="disabled">Salutation</option>
                                                <option value="">Mr.</option>
                                                <option value="">Mrs.</option>
                                                <option value="">Ms.</option>
                                                <option value="">Miss.</option>
                                                <option value="">Dr.</option>
                                             </select>                                             
                                             </div>
                                             <div class="col-md-4">
                                                <input type="text" name="firstname" class="form-control mobile-drop" placeholder="First Name">
                                             </div>
                                             <div class="col-md-4">
                                                <input type="text" name="lastname" class="form-control"  placeholder="Last Name">
                                             </div>
                                             <div class="col-md-1"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label required-field">Gender<span class="required-mark">*</span></label>
                                       <div class="col-md-9">
                                          <div class="row">
                                             <div class="col-md-3 short-col mobile-drop">
                                                <select class="form-control droupdown" name="gender">
                                                   <option value="" selected="selected" disabled="disabled">Select</option>
                                                   <option value="">Male</option>
                                                   <option value="">Female</option>
                                                </select>
                                             </div>
                                             <div class="col-md-8 short-col">
                                                <select class="form-control droupdown" name="identified">
                                                   <option value="" selected="selected" disabled="disabled">Identified As</option>
                                                   <option value="">Male</option>
                                                   <option value="">Female</option>
                                                </select>
                                             </div>
                                             <div class="col-md-3"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Date of Birth</label>
                                       <div class="col-md-9 time-add">
                                          <input type="text" name="dob" class="form-control date-select width-add" id="datetimepicker4" placeholder="mm-dd-yyyy">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label required-field">Email Address<span class="required-mark">*</span></label>
                                       <div class="col-md-9 time-add">
                                          <input type="email" name="email" class="form-control width-add"  placeholder="">
                                       </div>
                                    </div>
                                    <div class="form-group row new-phone">
                                       <label class="col-md-3 col-form-label required-field">Phone<span class="required-mark">*</span></label>
                                       <div class="col-md-9 new-phone-add">
                                          <div class="row">
                                             <div class="col-md-3 short-col">
                                                <select class="form-control droupdown mobile-drop" name="celltype">
                                                   <option value="" disabled="disabled">Select</option>
                                                   <option value="Home">Home</option>
                                                   <option value="Work">Work</option>
                                                   <option value="School">School</option>
                                                   <option value="Mobile" selected="selected">Mobile</option>
                                                   <option value="Main">Main</option>
                                                   <option value="Other">Other</option>
                                                </select>
                                             </div>
                                             <div class="col-md-8 short-col">
                                                <input type="tel" name="cellphone" class="form-control"  placeholder="Phone">
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
                                          <input type="text" name="record" class="form-control date-select without-background" placeholder="?">
                                       </div>
                                    </div>
                                    <div class="form-group row tool-box">
                                       <label class="col-md-5 col-form-label assigned-label">Status</label>
                                       <div class="col-md-7">
                                          <select class="form-control active-status apprroved" name="status">
                                             <option value="">Active - Approved</option>
                                             <option value="">Active</option>
                                             <option value="">Approved</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row tool-box">
                                       <label class="col-md-5 col-form-label assigned-label">Assignee</label>
                                       <div class="col-md-7">
                                         <select class="form-control active-status apprroved" name="assignee">
                                             <option value="">Unassigned</option>
                                             <option value="">Assigned</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row tool-box">
                                       <label class="col-md-5 col-form-label assigned-label">Service Date</label>
                                       <div class="col-md-7">
                                          <!-- <label class="services-date">9/15/20</label> -->
                                          <input type="text" name="services-date" class="form-control date-select without-background" placeholder="No Service Date">
                                       </div>
                                    </div>                                    
                                    <div class="form-group row tool-box">
                                       <label class="col-md-5 col-form-label assigned-label">Admission Date</label>
                                       <div class="col-md-7">
                                          <!-- <label class="services-date">9/15/20</label> -->
                                          <input type="text" name="admission-date" class="form-control date-select without-background" placeholder="No Admission Date">
                                       </div>
                                    </div>
                                    <div class="form-group row tool-box">
                                       <label class="col-md-5 col-form-label assigned-label">Discharge Date</label>
                                       <div class="col-md-7">
                                         <input type="text" name="discharge-date" class="form-control date-select without-background" placeholder="No Discharge Date">
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
                                          <textarea name="address" class="form-control" placeholder="Street 1"></textarea>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label"></label>
                                       <div class="col-md-8 common-textbox">
                                          <textarea class="form-control" placeholder="Street 2"></textarea>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">City</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="city" class="form-control"  placeholder="City">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">State</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown" name="state">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">State 1</option>
                                             <option value="">State 2</option>
                                             <option value="">State 3</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Zip Code</label>
                                       <div class="col-md-8 common-textbox">
                                          <input name="zip-code" type="text" class="form-control"  placeholder="Zip Code">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Country</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown" name="country">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">Country 1</option>
                                             <option value="">Country 2</option>
                                             <option value="">Country 3</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Type</label>
                                       <div class="col-md-8 common-textbox add-new-selectbox">
                                          <select id="multiple-checkboxes" multiple="multiple">
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
                                          <textarea name="notes" class="form-control" placeholder=""></textarea>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <h5 class="small-sub-title">ALTERNATE ADDRESS<span class="pull-right">Copy billing address<i class="fa fa-arrow-down" aria-hidden="true"></i></span></h5>
                              <div class="card card-primary">
                                 <div class="card-body">
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label required-field">Address<span class="required-mark">*</span></label>
                                       <div class="col-md-8 common-textbox">
                                          <textarea name="address1" class="form-control" placeholder="Street 1"></textarea>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label"></label>
                                       <div class="col-md-8 common-textbox">
                                          <textarea name="address-2" class="form-control" placeholder="Street 2"></textarea>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">City</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="city" class="form-control"  placeholder="City">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">State</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown" name="state">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">State 1</option>
                                             <option value="">State 2</option>
                                             <option value="">State 3</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Zip Code</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="zip-code" class="form-control"  placeholder="Zip Code">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Country</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown" name="country">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">Country 1</option>
                                             <option value="">Country 2</option>
                                             <option value="">Country 3</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Type</label>
                                       <div class="col-md-8 common-textbox">
                                          <select id="multiple-checkboxes-01" multiple="multiple">
                                             <option value="mail">Mail</option>
                                             <option value="temporary address">Temporary Address</option>
                                             <option value="other">Other</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Notes</label>
                                       <div class="col-md-8 common-textbox">
                                          <textarea name="notes" class="form-control" placeholder=""></textarea>
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
                           <div class="col-md-6">
                              <div class="card card-primary">
                                 <div class="card-body">
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Language</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown" name="language">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">Language 1</option>
                                             <option value="">Language 2</option>
                                             <option value="">Language 3</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Race</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown" name="race">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">Race 1</option>
                                             <option value="">Race 2</option>
                                             <option value="">Race 3</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Marital Status</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown" name="marital-status">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">Married</option>
                                             <option value="">Un Married</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Ethinicity</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown" name="ethinicity">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">Ethinicity 1</option>
                                             <option value="">Ethinicity 2</option>
                                             <option value="">Ethinicity 3</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label required-field">Case Name<span class="required-mark">*</span></label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="casename" class="form-control" placeholder="Case Name">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Lead Person</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown" name="lead-person">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">Person 1</option>
                                             <option value="">Person 2</option>
                                             <option value="">Person 3</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Nurse</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown" name="nurse">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">Nurse 1</option>
                                             <option value="">Nurse 2</option>
                                             <option value="">Nurse 3</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label required-field">Doctor<span class="required-mark">*</span></label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown" name="doctor">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">Doctor 1</option>
                                             <option value="">Doctor 2</option>
                                             <option value="">Doctor 3</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">In Crisis</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="in-crisis" class="form-control" placeholder="In Crisis">
                                       </div>
                                    </div>                                                                           
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Ordering NPI #</label>
                                       <div class="col-md-8 common-textbox">
                                          <input type="text" name="ordering-npi" class="form-control" placeholder="Ordering NPI #">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Smoker Status</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown" name="smoker-status">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">Smoker Status 1</option>
                                             <option value="">Smoker Status 2</option>
                                             <option value="">Smoker Status 3</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Fall Risk</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown" name="full-risk">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="Yes">Yes</option>
                                             <option value="No">No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Hearing Impaired</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown" name="impaired">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="Yes">Yes</option>
                                             <option value="No">No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Seeing Impaired</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown" name="seeing">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="Yes">Yes</option>
                                             <option value="No">No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Preferred Hospital</label>
                                       <div class="col-md-8 common-textbox">
                                          <select class="form-control droupdown" name="preferred">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">Select Preferred Hospital 1</option>
                                             <option value="">Select Preferred Hospital 2</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label">Referral Source</label>
                                       <div class="col-md-8 common-textbox">
                                          <textarea name="referral-source" class="form-control" placeholder=""></textarea>
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
                                                <select class="form-control droupdown custom-payer-field common-text-box-new" name="ahena">
                                                   <option value="" selected="selected" disabled="disabled">Select Payer Name</option>
                                                   <option value="">Ahena</option>
                                                   <option value="">Ahena 1</option>
                                                   <option value="">Ahena 2</option>
                                                </select>
                                             </td>
                                             <td>                                                
                                                <input type="text" name="policy" class="form-control custom-payer-field common-text-box-new" placeholder="Policy #">
                                             </td>
                                             <td>
                                                <select class="form-control droupdown custom-payer-field common-text-box-new self-pay-text insurance-dropdown" name="insurance">
                                                   <option value="Select Insurance Type" selected="selected" disabled="disabled">Select</option>
                                                   <option value="medicaid">Medicaid</option>
                                                   <option value="medicare">Medicare</option>
                                                   <option value="private insurance">Private Insurance</option>
                                                   <option value="self pay">Self Pay</option>
                                                </select>
                                             </td>
                                             <td>
                                                <input type="text" name="co-pay" class="form-control custom-payer-field common-text-box-new" placeholder="Co-pay Amount">
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
                                 <table class="table-contact-person common-table-info">
                                    <thead>
                                     <tr>
                                       <th>Contact Type</th>
                                       <th>First Name</th>
                                       <th>Last Name</th>
                                       <th>Relationship</th>
                                       <th>Phone</th>
                                       <th>Type</th>
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
                                             <select class="form-control droupdown custom-contact-field common-text-box-new" name="contact-type">
                                                <option value="" selected="selected" disabled="disabled">Select</option>
                                                <option value="mr">Mr.</option>
                                                <option value="mrs">Mrs.</option>
                                                <option value="ms">Ms.</option>
                                                <option value="miss">Miss.</option>
                                                <option value="dr">Dr.</option>
                                             </select>
                                          </td>
                                          <td>
                                             <input type="text" name="first-name-contact" class="form-control custom-contact-field common-text-box-new" placeholder="">
                                          </td>
                                          <td>
                                             <input type="text" name="last-name-contact" class="form-control custom-contact-field common-text-box-new" placeholder="">
                                          </td>
                                          <td>
                                             <select class="form-control droupdown custom-contact-field common-text-box-new" name="relationship">
                                                <option value="" selected="selected" disabled="disabled">Select</option>
                                                <option value="">Select 1</option>
                                                <option value="">Select 2</option>
                                             </select>
                                          </td>
                                          <td>
                                             <input type="text" name="phone" class="form-control custom-contact-field common-text-box-new" placeholder="">
                                          </td>
                                          <td>
                                             <select class="form-control droupdown custom-contact-field common-text-box-new" name="contact-type">
                                                <!-- <option>Home</option>
                                                <option>Work</option>
                                                <option>School</option>
                                                <option>Mobile</option>
                                                <option>Main</option>
                                                <option>Other</option> -->
                                                <option selected="selected" disabled="disabled">Select</option>
                                                <option value="mail">Mail</option>
                                                <option value="temporary tddress">Temporary Address</option>
                                                <option value="other">Other</option>
                                             </select>
                                          </td>
                                          <td>
                                             <input type="email" name="email" class="form-control custom-contact-field common-text-box-new" placeholder="">
                                          </td>
                                          <td>
                                             <input type="text" name="addresscontact" class="form-control custom-contact-field common-text-box-new" placeholder="">
                                          </td>
                                          <td>
                                             <input type="text" name="address-2" class="form-control custom-contact-field common-text-box-new" placeholder="">
                                          </td>
                                          <td>
                                             <input type="text" name="city" class="form-control custom-contact-field common-text-box-new" placeholder="">
                                          </td>
                                          <td>
                                             <select class="form-control droupdown custom-contact-field common-text-box-new" name="state">
                                                <option value="" selected="selected" disabled="disabled">Select</option>
                                                <option value="">Gujarat</option>
                                                <option value="">Rajasthan</option>
                                             </select>
                                          </td>
                                          <td>
                                             <select class="form-control droupdown custom-contact-field common-text-box-new" name="country">
                                                <option value="" selected="selected" disabled="disabled">Select</option>
                                                <option value="">India</option>
                                                <option value="">UK</option>
                                             </select>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <button class="add_form_contact common-button"><i class="fa fa-plus common-icons"></i>Add New Contact</button> 
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
                                    <input type="checkbox" name="" class="check-input">
                                    <label class="lbl-check">Chris Edwards</label>
                                 </div>
                                 <div class="check-parts">
                                    <input type="checkbox" name="" class="check-input">
                                    <label class="lbl-check">Ida Heidi</label>
                                 </div>
                                 <div class="check-parts">
                                    <input type="checkbox" name="" class="check-input">
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
                                                <option selected="selected" disabled="disabled">Select</option>
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
                                          <select class="form-control droupdown custom-diagnosis-field common-text-box-new" name="primary">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">Select 1</option>
                                             <option value="">Select 2</option>
                                          </select>
                                       </td>
                                       <td>
                                          <select class="form-control droupdown custom-diagnosis-field common-text-box-new" name="axis-level">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">Select 1</option>
                                             <option value="">Select 2</option>
                                          </select>
                                       </td>
                                       <td>
                                          <input type="text" name="date" class="form-control custom-diagnosis-field diagnosis-date common-text-box-new" placeholder="">
                                       </td>
                                       <td>
                                          <input type="text" name="problem-desc" class="form-control custom-diagnosis-field common-text-box-new" placeholder="">
                                       </td>
                                       <td>
                                          <input type="text" name="icd9" class="form-control custom-diagnosis-field common-text-box-new" placeholder="">
                                       </td>
                                       <td>
                                          <input type="text" name="icd10" class="form-control custom-diagnosis-field common-text-box-new" placeholder="">
                                       </td>

                                       <td>
                                          <select class="form-control droupdown custom-diagnosis-field common-text-box-new" name="status">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="Active">Active</option>
                                             <option value="Inactive">Inactive</option>
                                          </select>
                                       </td>
                                    </tr>
                                 </table>
                              </div>
                              <button class="add_form_diagnosis common-button"><i class="fa fa-plus common-icons"></i>Add New Diagnosis</button> 
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
                                          <input type="text" name="name" class="form-control custom-medications-field common-text-box-new" placeholder="">
                                       </td>
                                       <td>
                                          <input type="text" name="side-effacts" class="form-control custom-medications-field common-text-box-new" placeholder="">
                                       </td>
                                       <td>
                                          <input type="text" name="pharmacy" class="form-control custom-medications-field common-text-box-new" placeholder="">
                                       </td>
                                       <td>
                                          <select class="form-control droupdown custom-medications-field common-text-box-new" name="reaction">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">Select 1</option>
                                             <option value="">Select 2</option>
                                          </select>
                                       </td>
                                       <td>
                                          <select class="form-control droupdown custom-medications-field common-text-box-new" name="severity">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">Select 1</option>
                                             <option value="">Select 2</option>
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
                                       <select class="form-control" name="allergies">
                                          <option value="Yes">Yes</option>
                                          <option value="No">No</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-8"></div>
                              </div>
                              <div class="table-scrollbar common-scroll">
                                 <table class="table-allergies common-table-info">
                                    <thead>
                                       <th>Name</th>
                                       <th>Reaction</th>
                                       <th>Severity</th>
                                    </thead>
                                    <tr class="tr-allergies-info common-tr-info">
                                       <td>
                                          <input type="text" name="name" class="form-control custom-allergies-field common-text-box-new" placeholder="">
                                       </td>
                                       <td>
                                          <select class="form-control droupdown custom-allergies-field common-text-box-new" name="reaction">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">Select 1</option>
                                             <option value="">Select 2</option>
                                          </select>
                                       </td>
                                       <td>
                                          <select class="form-control droupdown custom-allergies-field common-text-box-new" name="severity">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">Select 1</option>
                                             <option value="">Select 2</option>
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
                                          <select class="form-control droupdown custom-account-field common-text-box-new" name="type">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">Select 1</option>
                                             <option value="">Select 2</option>
                                          </select>
                                       </td>
                                       <td>
                                          <input name="notation" type="text" class="form-control custom-account-field common-text-box-new" placeholder="">
                                       </td>
                                       <td>
                                          <select class="form-control droupdown custom-account-field common-text-box-new" name="by">
                                             <option value="" selected="selected" disabled="disabled">Select</option>
                                             <option value="">Select 1</option>
                                             <option value="">Select 2</option>
                                          </select>
                                       </td>
                                       <td>
                                          <input type="text" name="date" class="form-control custom-account-field date-type common-text-box-new" placeholder="">
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
                           <button type="submit" class="btn btn-info">Save</button>
                           <button type="submit" class="btn btn-default float-right">Cancel</button>
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
   @parent
@endsection
@section('end_listing_layout')
@endsection
@section('end_detail_layout')
@endsection

