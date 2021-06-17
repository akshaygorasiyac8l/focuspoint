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
            <form id="form-consumer" action="" name="assessment-form">
               <div class="background-transperent">
                  <section class="content-header">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12 page-background">
                              <h1 class="page-title">New Assessments</h1>
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
                                    <div class="form-group">
		                     				<select class="form-control assessment_id" name="assessment">
                                                <option value="">Select assessment</option>
                                                @foreach($assessment_types  as $assessment_type)
			                                    <option value="{{$assessment_type->id}}">{{$assessment_type->title}}</option>
                                                @endforeach
			                                    
			                                </select>
		                     			</div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Consumer Name</label>
                                       <div class="col-md-9">
                                          <select class="form-control droupdown mobile-drop common-selectbox consumername" name="consumername">
                                             <option value="">Select Consumer</option>
                                             @foreach($consumers  as $consumer)
                                             <option value="{{$consumer->id}}">{{$consumer->fname}} {{$consumer->lname}}</option>
                                             @endforeach
                                         </select>
                                         <div class="view-part-consumer">
                                             <button class="common-button-addmore"><i class="fa fa-user view-user"></i>View Consumer Details</button>
                                             <span>|</span>
                                             <button class="common-button-addmore"><i class="fa fa-cogs view-user"></i>View Authorizations</button>
                                         </div>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Assessment #</label>
                                       <div class="col-md-9">
                                          <input type="text" name="assessment" class="form-control assessment_no" placeholder="ASMT-000500">
                                       </div>
                                    </div>                              
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Location</label>
                                       <div class="col-md-9">
                                          <select class="form-control droupdown location_name" name="location_name">
                                            <option value="community">Community</option>
                                            <option value="home">Home</option>
                                            <option value="hospital">Hospital</option>
                                            <option value="office">Office</option>
                                            <option value="residential facility">Residential Facility</option>
                                            <option value="school">School</option>
                                         </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Communication</label>
                                       <div class="col-md-9">
                                          <select class="form-control droupdown communication" name="communication">
                                            <option value="collateral">Collateral</option>
                                            <option value="in-person">In-Person</option>
                                            <option value="phone">Phone</option>
                                            <option value="telehealth">Telehealth</option>
                                         </select>
                                       </div>
                                    </div>
                                    <div class="form-group row new-phone">
                                       <label class="col-md-3 col-form-label">Service</label>
                                       <div class="col-md-9 add-more-services-dropdown">
                                          <select class="form-control droupdown" name="assessmenttype">
                                            <option value="">Select Service</option>
                                             @foreach($services  as $service)
                                             <option value="{{$service->id}}">{{$service->title}}</option>
                                             @endforeach
                                         </select>                                         
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <div class="col-md-3"></div>
                                       <div class="col-md-9">
                                          <button class="add-more-services common-button-addmore add-space-top"><i class="fa fa-plus common-icons"></i>Add More Service</button>
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
                                          <label class="col-md-5 col-form-label assigned-label">Date</label>
                                          <div class="col-md-7">
                                             <input type="text" name="date" class="form-control date-select without-background date-add" placeholder="No Date">
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box add-new-selectbox">
                                          <label class="col-md-5 col-form-label assigned-label">State</label>
                                          <div class="col-md-7">
                                             <select class="form-control active-status apprroved" name="state">
                                                <option value="0">Open</option>
                                                <option value="1">Fixed</option>
                                                <option value="2">Completed</option>
                                                <option value="3">In-Progress</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box add-new-selectbox">
                                          <label class="col-md-5 col-form-label assigned-label">Assignee</label>
                                          <div class="col-md-7">
                                            <select class="form-control active-status assignee apprroved" name="assignee">
                                                <option value="">Select assignee</option>
                                                @foreach($users  as $user)
                                                <option value="{{$user->id}}">{{$user->fname}} {{$user->lname}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Spent Time</label>
                                          <div class="col-md-7">
                                             <input type="text" name="spent-time" class="form-control without-background date-add" id="spent-time-add" placeholder="?">
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Due Date</label>
                                          <div class="col-md-7">
                                             <input type="text" name="due-date" class="form-control date-select without-background date-add" placeholder="No Due Date">
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
                            <a class="nav-link tabs active" id="custom-content-below-home-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-home" aria-selected="false" onclick="openTabs(event, 'contact-persons-assessments')">Contact Persons</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-profile-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-profile" aria-selected="false" onclick="openTabs(event, 'problems')">Problems</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-settings-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'behaviors')">Behaviors</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-messages-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-messages" aria-selected="false" onclick="openTabs(event, 'life-functions')">Life Functions</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-settings-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'assessor-notes')">Assessor Notes</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-settings-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'document-assessment')">Documents</a>
                          </li>
                        </ul>
                     </div>
                  </section>
                  <section class="contentsection" id="contact-persons-assessments">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                           <div class="table-scrollbar common-scroll">
                             <table class="assessments-details-table common-table-info">
                               <thead>
                                 <tr class="common-tr-info contact-person">
                                      <th>Contact Type</th>
                                      <th>First Name</th>
                                      <th>Last Name</th>
                                      <th>Relationship</th>
                                      <th>Mobile</th>
                                  </tr>
                               </thead>
                               <tbody>
                                    <tr class="tr-contact-person common-tr-info">
                                       <td>
                                          <select class="form-control droupdown mobile-drop salutation" name="salutation" autocomplete="off">
                                             <option value="" selected="selected" >Salutation</option>
                                             <option value="Mr">Mr.</option>
                                             <option value="Mrs">Mrs.</option>
                                             <option value="Ms">Ms.</option>
                                             <option value="Miss">Miss.</option>
                                             <option value="Dr">Dr.</option>
                                          </select>
                                       </td>
                                       <td>
                                          <input type="text" name="strength" class="form-control custom-problems-field common-text-box-new" placeholder="">
                                       </td>
                                       <td>
                                          <input type="text" name="score" class="form-control custom-problems-field common-text-box-new" placeholder="">
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
                                          <input type="text" name="strength" class="form-control custom-problems-field common-text-box-new" placeholder="">
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                              </div>
                              <button class="add_form_contact_user_new common-button"><i class="fa fa-plus common-icons"></i>Add New Person</button> 
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="contentsection" id="problems">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="row dropdown-row">
                                 <div class="col-md-4">
                                    <label class="col-form-label">Presenting Problems As Described By</label>
                                 </div>
                                 <div class="col-md-3 time-add-left">
                                    <select class="form-control droupdown" name="caregiver">
                                       <option value="" selected="selected" disabled="disabled">Select</option>
                                       <option value="">Select Caregiver 1</option>
                                       <option value="">Select Caregiver 2</option>
                                    </select>
                                 </div>
                                 <div class="col-md-5"></div>
                              </div>
                              <div class="table-scrollbar common-scroll">
                                 <table class="table-problems-person common-table-info">
                                    <thead>
                                     <tr>
                                       <th>Author</th>
                                       <th>Strength / Challenge</th>
                                       <th>Score</th>
                                     </tr>
                                    </thead>
                                    <tbody>
                                       <tr class="tr-problems-person common-tr-info">
                                          <td>
                                             <select class="form-control droupdown custom-contact-field common-text-box-new" name="place">
                                                <option value="caregiver">Caregiver</option>
                                                <option value="youth">Youth</option>
                                                <option value="sibling">Sibling</option>
                                             </select>
                                          </td>
                                          <td>
                                             <input type="text" name="strength" class="form-control custom-problems-field common-text-box-new" placeholder="">
                                          </td>
                                          <td>
                                             <input type="text" name="score" class="form-control custom-problems-field common-text-box-new" placeholder="">
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <button class="add_form_problems common-button"><i class="fa fa-plus common-icons"></i>Add New Item</button> 
                           </div>                           
                        </div>
                        <div class="row">
                           <div class="col-md-6"></div>
                           <div class="col-md-6">
                              <div class="box-total">
                                 <label class="total-label">Total Score</label>
                                 <span class="score-total">3</span>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <span class="additional-notes">Additional Notes</span>
                              <div class="form-group">
                                 <textarea name="" rows="4" class="form-control"></textarea>
                              </div>
                              <span class="client-word">Use Client Words</span>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="contentsection" id="life-functions">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                              <table class="table-life-functions-person">
                                 <thead>
                                  <tr>
                                    <th>Functions</th>
                                    <th>Current Concerns</th>
                                    <th>Past/Present Interventions</th>
                                  </tr>
                                 </thead>
                                 <tbody>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Medical</label>
                                       </td>
                                       <td>
                                          <input type="text" name="copy1" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="copy-paste" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Mental Health</label>
                                       </td>
                                       <td>
                                          <input type="text" name="mental-copy-paste" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="mental-copy" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Education</label>
                                       </td>
                                       <td>
                                          <input type="text" name="edu-copy-paste" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="edu-copy" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Legal</label>
                                       </td>
                                       <td>
                                          <input type="text" name="legal-copy-paste" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="legal-copy" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Social</label>
                                       </td>
                                       <td>
                                          <input type="text" name="social-copy-paste" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="social-copy" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Self Harm</label>
                                       </td>
                                       <td>
                                          <input type="text" name="self-copy-paste" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="self-copy" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Others</label>
                                       </td>
                                       <td>
                                          <input type="text" name="other-copy-paste" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="other-copy" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Medical</label>
                                       </td>
                                       <td>
                                          <input type="text" name="copy1" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="copy-paste" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Mental Health</label>
                                       </td>
                                       <td>
                                          <input type="text" name="mental-copy-paste" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="mental-copy" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Education</label>
                                       </td>
                                       <td>
                                          <input type="text" name="edu-copy-paste" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="edu-copy" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Legal</label>
                                       </td>
                                       <td>
                                          <input type="text" name="legal-copy-paste" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="legal-copy" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Social</label>
                                       </td>
                                       <td>
                                          <input type="text" name="social-copy-paste" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="social-copy" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Self Harm</label>
                                       </td>
                                       <td>
                                          <input type="text" name="self-copy-paste" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="self-copy" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Others</label>
                                       </td>
                                       <td>
                                          <input type="text" name="other-copy-paste" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="other-copy" class="form-control custom-life-functions-field common-text-box-new" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="contentsection" id="behaviors">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="row dropdown-row">
                                 <div class="col-md-4">
                                    <label class="col-form-label">Presenting Problems As Described By</label>
                                 </div>
                                 <div class="col-md-3 time-add-left">
                                    <select class="form-control droupdown" name="caregiver">
                                       <option selected="selected" disabled="disabled">Select</option>
                                       <option value="Select Domain1 1">Select Domain1 1</option>
                                       <option value="Select Domain1 2">Select Domain1 2</option>
                                    </select>
                                 </div>
                                 <div class="col-md-5"></div>
                              </div>
                              <div class="table-scrollbar common-scroll">
                                 <table class="table-behaviors-person common-table-info">
                                    <thead>
                                     <tr>
                                       <th>Author</th>
                                       <th>Context</th>
                                       <th>Current Concerns</th>
                                       <th>Past/Present Interventions</th>
                                     </tr>
                                    </thead>
                                    <tbody>
                                       <tr class="tr-behaviors-person common-tr-info">
                                          <td>
                                             <select class="form-control droupdown custom-contact-field common-text-box-new" name="place">
                                                <option value="caregiver">Caregiver</option>
                                                <option value="youth">Youth</option>
                                                <option value="sibling">Sibling</option>
                                             </select>
                                          </td>
                                          <td>
                                             <select class="form-control droupdown custom-contact-field common-text-box-new" name="place">
                                               <option value="Describe specifics of behavior">Describe specifics of behavior</option>
                                                <option value="Identify triggers">Identify triggers</option>
                                                <option value="What has been tried & results">What has been tried & results</option>
                                                <option value="Impact on family">Impact on family</option>
                                                <option value="Behavior to be replaced">Behavior to be replaced</option>
                                             </select>
                                          </td>
                                          <td>
                                             <input type="text" name="concerns" class="form-control custom-behaviors-field common-text-box-new" placeholder="Type or copy-paste">
                                          </td>
                                          <td>
                                             <input type="text" name="present" class="form-control custom-behaviors-field common-text-box-new" placeholder="Type or copy-paste">
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>                              
                              <button class="add_form_behaviors common-button"><i class="fa fa-plus common-icons"></i>Add New Item</button> 
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <span class="additional-notes behaviors">Additional Notes</span>
                              <div class="form-group">
                                 <textarea name="" rows="4" class="form-control"></textarea>
                              </div>
                              <span class="client-word">Use Client Words</span>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="contentsection" id="assessor-notes">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="row dropdown-row">
                                 <div class="col-md-4">
                                    <label class="col-form-label">Presenting Problems As Described By</label>
                                 </div>
                                 <div class="col-md-3 time-add-left">
                                    <select class="form-control droupdown" name="caregiver">
                                       <option value="" selected="selected" disabled="disabled">Select</option>
                                       <option value="">Select Domain1 1</option>
                                       <option value="">Select Domain1 2</option>
                                    </select>
                                 </div>
                                 <div class="col-md-5"></div>
                              </div>
                              <div class="table-scrollbar common-scroll">
                                 <table class="table-assessor-notes-person common-table-info">
                                    <thead>
                                     <tr>
                                       <th>Problem</th>
                                       <th>Current Context</th>
                                     </tr>
                                    </thead>
                                    <tbody>
                                       <tr class="tr-assessor-notes-person common-tr-info">
                                          <td>
                                             <select class="form-control droupdown custom-contact-field common-text-box-new" name="place">
                                                <option value="Caregiver characteristics">Caregiver characteristics</option>
                                                <option value="Executive Functions">Executive Functions</option>
                                                <option value="Initial Treatment Reccommendations">Initial Treatment Reccommendations</option>
                                                <option value="Readiness for Change">Readiness for Change</option>
                                             </select>
                                          </td>
                                          <td>
                                             <input type="text" name="concerns" class="form-control custom-assessor-notes-field common-text-box-new" placeholder="Type or copy-paste">
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>                              
                              <button class="add_form_assessor-notes common-button"><i class="fa fa-plus common-icons"></i>Add New Item</button> 
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <span class="additional-notes behaviors">Additional Notes</span>
                              <div class="form-group">
                                 <textarea name="" rows="4" class="form-control"></textarea>
                              </div>
                              <span class="client-word">Use Client Words</span>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="contentsection" id="document-assessment">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-8">
                              <div class="card-body">
                                 <div class="form-group row">
                                    <div class="col-md-6">
                                       <label class="attach-file-lbl attach-file-label">Attach Files</label>
                                       <div class="file-upload-multiple">
                                          <label class="lbl-multiple-files">Select Multiple Files</label>
                                          <input type="file" name="attach-file" class="form-control multiple-image-upload" id="file-upload" multiple="">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div id="uploadPreview" class="employee-image"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4"></div>
                        </div>
                     </div>
                  </section>
                  <div class="modal add-spent-time-popup fade" id="myModal" role="dialog">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <i class="fa fa-close delete-button close-model" data-dismiss="modal"></i>
                           </div>
                           <div class="modal-body">
                              <div class="row">
                                 <div class="col-md-12">
                                    <table class="add-spent-tabel common-table-info">
                                       <tr>
                                          <th>Employee Name</th>
                                          <th>Spent Time</th>
                                          <th>Comment</th>
                                          <th>Created Date</th>
                                       </tr>
                                       <tr>
                                          <td>Edward Gao</td>
                                          <td>1h 35m</td>
                                          <td></td>
                                          <td>12/22/2020 13:35</td>
                                       </tr>
                                       <tr>
                                          <td>Gregory-Harris, Tracee</td>
                                          <td>2h 20m</td>
                                          <td>Went to office</td>
                                          <td>12/25/2020 13:35</td>
                                       </tr>
                                    </table>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4 short-col">
                                    <div class="form-group">
                                       <div class="starttime" id='startdatetimepicker'>
                                          <input type="text" placeholder="Start Date And Start Time" class="form-control" />   
                                          <span class="input-group-addon calendar">
                                          </span>
                                      </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4 short-col">
                                    <div class="form-group">
                                       <div class="starttime" id='enddatetimepicker'>
                                          <input type="text" placeholder="End Date And End Time" class="form-control" />   
                                          <span class="input-group-addon calendar">
                                          </span>
                                      </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <input type="text" name="" class="form-control" placeholder="Write a comment">
                                    </div>
                                 </div>
                                 
                              </div> 
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <button class="add-new-btn">Add Spent Time</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <section class="footer-section">
                     <div class="container-fluid">
                        <div class="card-footer">
                           <button type="submit" class="btn btn-info">Save</button>
                           <a href="{{ route('assessments-listing') }}" class="btn btn-default float-right">Cancel</a>
                           <a href="#myModal" class="spent-time common-button space-remove-btn" data-toggle="modal"><i class="fa fa-hourglass common-icons"></i>Add Spent Time</a>
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
        
        $('.dob,.servicedate,.admissiondate,.dischargedate,.diagnosis-date,.hasDatepicker,.date-type,.notationdate,.date-select').datepicker({ changeMonth: true,changeYear: true,dateFormat: "mm-dd-yy" });
        
        $(document).on('focus','.dob,.servicedate,.admissiondate,.dischargedate,.diagnosis-date,.hasDatepicker,.date-type,.notationdate,.date-select',function(){
           $('.dob,.servicedate,.admissiondate,.dischargedate,.diagnosis-date,.hasDatepicker,.date-type,.notationdate,.date-select').datepicker({
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
            $(".allerginame").each(function(i, value) {
               
               allerginame_array.push({
                  allerginame: $(this).val(), 
                  reactiontype: $(this).closest('tr').find('.reactiontype').val(),
                  seveitytype: $(this).closest('tr').find('.seveitytype').val(),
                  
                  
                  
              });
            });
            
            
            
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
   

   
   
   
   // Add Account Notations
   $(document).ready(function() {
       var max_fields      = 100;
       var wrapper         = $(".assessments-details-table"); 
       var add_button      = $(".add_form_contact_user_new"); 
       
       var x = 1; 
       $('html').on("click",".add_form_contact_user_new",function(e){
           e.preventDefault();
         var clength = $('.tr-contact-person').length;
              if(clength < max_fields){
               x++;
               var htmlData = '<tr class="tr-contact-person common-tr-info">'+
                     '<td>'+
                        '<select class="form-control droupdown mobile-drop salutation" name="salutation" autocomplete="off">'+
                           '<option value="" selected="selected" >Salutation</option>'+
                           '<option value="Mr">Mr.</option>'+
                           '<option value="Mrs">Mrs.</option>'+
                           '<option value="Ms">Ms.</option>'+
                           '<option value="Miss">Miss.</option>'+
                           '<option value="Dr">Dr.</option>'+
                        '</select>'+
                     '</td>'+
                     '<td>'+
                        '<input type="text" name="strength" class="form-control custom-problems-field common-text-box-new" placeholder="">'+
                     '</td>'+
                     '<td>'+
                        '<input type="text" name="score" class="form-control custom-problems-field common-text-box-new" placeholder="">'+
                     '</td>'+
                     '<td>'+
                        '<select class="form-control droupdown custom-contact-field common-text-box-new relationship" name="relationship">'+
                              '<option value="" selected="selected" >Select</option>';
                              @foreach ($relations as $relation)
                              htmlData += '<option value="{{$relation->id}}">{{$relation->title}}</option>';
                              @endforeach
                           htmlData += '</select>'+
                     '</td>'+
                     '<td>'+
                        '<input type="text" name="strength" class="form-control custom-problems-field common-text-box-new" placeholder="">'+
                     '</td>'+
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
       });
    
   
   });
   
   
$(document).ready(function() {
   var max_fields      = 100;
   var wrapper         = $(".table-problems-person"); 
   var add_button      = $(".add_form_problems"); 

   var x = 1; 
   $('html').on("click",".add_form_problems",function(e){ 
     e.preventDefault();
     var clength = $('.table-problems-person').length;
              if(clength < max_fields){
               x++;
               
                 var htmlData = '';  
             htmlData +='<tr class="tr-problems-person common-tr-info"> '+
             '<td> '+
             '<select class="form-control droupdown custom-contact-field common-text-box-new" name="place"> '+
             '<option value="">Select</option> <option value="caregiver">Caregiver</option>'+
             '<option value="youth">Youth</option><option value="sibling">Sibling</option> '+
             '</select> </td><td> '+
             '<input type="text" name="strength" class="form-control custom-problems-field common-text-box-new" placeholder=""> </td>'+
             '<td> <input type="text" name="score" class="form-control custom-problems-field common-text-box-new" placeholder=""> </td>'+
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
   

    $(document).ready(function() {
       var max_fields      = 100;
       var wrapper         = $(".table-behaviors-person"); 
       var add_button      = $(".add_form_behaviors"); 
       
       var x = 1; 
       $('html').on("click",".add_form_behaviors",function(e){ 
           e.preventDefault();
           var clength = $('.table-behaviors-person').length;
              if(clength < max_fields){
               x++; 
               var htmlData = '';  
             htmlData +='<tr class="tr-behaviors-person common-tr-info"><td> '+
             '<select class="form-control droupdown custom-contact-field common-text-box-new" name="place">'+
             '<option value="">Select</option>'+
             '<option value="caregiver">Caregiver</option>'+
             '<option value="youth">Youth</option>'+
             '<option value="sibling">Sibling</option> </select></td>'+
             '<td> <select class="form-control droupdown custom-contact-field common-text-box-new" name="place">'+
            ' <option value="">Select</option><option value="Describe specifics of behavior">Describe specifics of behavior</option>'+
            ' <option value="Identify triggers">Identify triggers</option>'+
             '<option value="What has been tried & results">What has been tried & results</option>'+
             '<option value="Impact on family">Impact on family</option>'+
             '<option value="Behavior to be replaced">Behavior to be replaced</option> </select></td>'+
             '<td> <input type="text" name="concerns" class="form-control custom-behaviors-field common-text-box-new" placeholder="Type or copy-paste">'+
             '</td>'+
             '<td> <input type="text" name="present" class="form-control custom-behaviors-field common-text-box-new" placeholder="Type or copy-paste">'+
             '</td><td class="delete-section">'+
             '<i class="fa fa-close delete-button delete"></i></td></tr>';
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
       var wrapper         = $(".table-assessor-notes-person"); 
       var add_button      = $(".add_form_assessor-notes"); 
       
       var x = 1; 
       $('html').on("click",".add_form_assessor-notes",function(e){
           e.preventDefault();
           var clength = $('.table-assessor-notes-person').length;
              if(clength < max_fields){
               x++; 
            var htmlData = '';  
             htmlData += '<tr class="tr-assessor-notes-person common-tr-info"> <td> '+
             '<select class="form-control droupdown custom-contact-field common-text-box-new" name="place">'+
             '<option value="">Select</option><option value="Caregiver characteristics">Caregiver characteristics</option>'+
             '<option value="Executive Functions">Executive Functions</option>'+
             '<option value="Initial Treatment Reccommendations">Initial Treatment Reccommendations</option>'+
             '<option value="Readiness for Change">Readiness for Change</option> </select> </td><td> '+
             '<input type="text" name="concerns" class="form-control custom-assessor-notes-field common-text-box-new" placeholder="Type or copy-paste"> '+
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
   
   
     // Dropdown Add for Assessment Page
  $(document).ready(function() {
     var max_fields      = 100;
     var wrapper         = $(".add-more-services-dropdown"); 
     var add_button      = $(".add-more-services"); 
     
     var x = 1; 
     $('html').on("click",".add-more-services",function(e){
         e.preventDefault();
          var clength = $('.add-more-services-dropdown').length;
              if(clength < max_fields){
               x++; 
             var htmlData = '';  
             htmlData += '<div class="row"><div class="col-md-11">'+
             '<select class="form-control droupdown desktop-textbox" name="assessmenttype">'+
             '<option value="Clinical Intake (2013)-90791">Clinical Intake (2013)-90791</option>'+
             '<option value="Diagnostic Assessment-T1023">Diagnostic Assessment-T1023</option>'+
             '<option value="Family Therapy- 0-60min-90846">Family Therapy- with patient-90847</option>'+
             '<option value="Family Therapy- 0-60min-90846">Family Therapy- 0-60min-90846</option>'+
             '</select></div><div class="col-md-1"><div class="delete-section new-delete-add consumer-delete">'+
             '<i class="fa fa-close delete-button delete"></i></div></div></div>';
             $(wrapper).append(htmlData); //add input box
         }
       else
       {
       alert('You Reached the limits')
       }
     });
     $(wrapper).on("click",".delete", function(e){ 
         e.preventDefault(); $(this).parent().parent().parent().remove(); x--;
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

