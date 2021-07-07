@extends('layouts.app')
@section('script1')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.css') }}">

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
                           <div class="col-md-12 errorclass">
                           </div>
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
                                          <input type="text" name="assessment" class="form-control assessment_no" disabled value="ASMT-00000<?php echo $assessment_id;?>">
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
                                          <select class="form-control droupdown serviceslist" name="assessmenttype">
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
                                             <input type="text" name="record" class="form-control  without-background record_no" value="RCNO_<?php echo rand('111111111','999999999'); ?>">
                                          </div>
                                       </div>
                                       

                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Date</label>
                                          <div class="col-md-7">
                                             <input type="text" name="date" class="form-control date-select without-background date_add" placeholder="No Date">
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
                                            <select class="form-control  assignee apprroved" name="assignee">
                                                <option value="">Unassigned</option>
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
                                             <input type="text" name="due-date" class="form-control date-select without-background due_date" placeholder="No Due Date">
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
                                          <input type="text" name="strength" class="form-control custom-problems-field common-text-box-new cfname" placeholder="">
                                       </td>
                                       <td>
                                          <input type="text" name="score" class="form-control custom-problems-field common-text-box-new clname" placeholder="">
                                       </td>
                                       <td>
                                          <select class="form-control droupdown custom-contact-field common-text-box-new crelationship" name="relationship">
                                                <option value="" selected="selected" >Select</option>
                                                @foreach ($relations as $relation)
                                                <option value="{{$relation->id}}">{{$relation->title}}</option>
                                                @endforeach
                                             </select>
                                       </td>
                                       <td>
                                          <input type="text" name="strength" class="form-control custom-problems-field common-text-box-new cmobile" placeholder="">
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
                                             <select class="form-control droupdown custom-contact-field common-text-box-new pauthor" name="place">
                                                <option value="">Select</option>
                                                <option value="caregiver">Caregiver</option>
                                                <option value="youth">Youth</option>
                                                <option value="sibling">Sibling</option>
                                             </select>
                                          </td>
                                          <td>
                                             <input type="text" name="strength" class="form-control custom-problems-field common-text-box-new pstrength" placeholder="">
                                          </td>
                                          <td>
                                             <input type="number" name="score" class="form-control custom-problems-field common-text-box-new pscore" placeholder="">
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <button class="add_form_problems common-button"><i class="fa fa-plus common-icons"></i>Add New Item</button> 
                              <div class="box-total">
                                 <label class="total-label">Total Score</label>
                                 <span class="score-total">0</span>
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
                                          <input type="text" name="copy1" class="form-control custom-life-functions-field common-text-box-new fun_medical" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="copy-paste" class="form-control custom-life-functions-field common-text-box-new fun_medical" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Mental Health</label>
                                       </td>
                                       <td>
                                          <input type="text" name="mental-copy-paste" class="form-control custom-life-functions-field common-text-box-new  fun_mental" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="mental-copy" class="form-control custom-life-functions-field common-text-box-new fun_mental" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Education</label>
                                       </td>
                                       <td>
                                          <input type="text" name="edu-copy-paste" class="form-control custom-life-functions-field common-text-box-new fun_education" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="edu-copy" class="form-control custom-life-functions-field common-text-box-new fun_education" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Legal</label>
                                       </td>
                                       <td>
                                          <input type="text" name="legal-copy-paste" class="form-control custom-life-functions-field common-text-box-new fun_leagal" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="legal-copy" class="form-control custom-life-functions-field common-text-box-new fun_leagal" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Social</label>
                                       </td>
                                       <td>
                                          <input type="text" name="social-copy-paste" class="form-control custom-life-functions-field common-text-box-new  fun_social" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="social-copy" class="form-control custom-life-functions-field common-text-box-new fun_social" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Self Harm</label>
                                       </td>
                                       <td>
                                          <input type="text" name="self-copy-paste" class="form-control custom-life-functions-field common-text-box-new fun_selfharm" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="self-copy" class="form-control custom-life-functions-field common-text-box-new fun_selfharm" placeholder="Type or copy-paste">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Others</label>
                                       </td>
                                       <td>
                                          <input type="text" name="other-copy-paste" class="form-control custom-life-functions-field common-text-box-new fun_others" placeholder="Type or copy-paste">
                                       </td>
                                       <td>
                                          <input type="text" name="other-copy" class="form-control custom-life-functions-field common-text-box-new fun_others" placeholder="Type or copy-paste">
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
                                             <select class="form-control droupdown custom-contact-field common-text-box-new bauthor" name="place">
                                                <option value="">Select</option>
                                             
                                                <option value="caregiver">Caregiver</option>
                                                <option value="youth">Youth</option>
                                                <option value="sibling">Sibling</option>
                                             </select>
                                          </td>
                                          <td>
                                             <select class="form-control droupdown custom-contact-field common-text-box-new bcontext" name="place">
                                                 <option value="">Select</option>
                                               <option value="Describe specifics of behavior">Describe specifics of behavior</option>
                                                <option value="Identify triggers">Identify triggers</option>
                                                <option value="What has been tried & results">What has been tried & results</option>
                                                <option value="Impact on family">Impact on family</option>
                                                <option value="Behavior to be replaced">Behavior to be replaced</option>
                                             </select>
                                          </td>
                                          <td>
                                             <input type="text" name="concerns" class="form-control custom-behaviors-field common-text-box-new bconcern" placeholder="Type or copy-paste">
                                          </td>
                                          <td>
                                             <input type="text" name="present" class="form-control custom-behaviors-field common-text-box-new bintervention" placeholder="Type or copy-paste">
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
                                       <option value="" selected="selected" >Select</option>
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
                                             <select class="form-control droupdown custom-contact-field common-text-box-new aproblem" name="place">
                                                <option value="Caregiver characteristics">Caregiver characteristics</option>
                                                <option value="Executive Functions">Executive Functions</option>
                                                <option value="Initial Treatment Reccommendations">Initial Treatment Reccommendations</option>
                                                <option value="Readiness for Change">Readiness for Change</option>
                                             </select>
                                          </td>
                                          <td>
                                             <input type="text" name="concerns" class="form-control custom-assessor-notes-field common-text-box-new acontext" placeholder="Type or copy-paste">
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
                           <button type="button" class="btn btn-info saveassessment">Save</button>
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
       
       
       function gettotalscore(){
           var score = 0;
           $( ".pscore" ).each(function( index ) {
               var oldVal = $( this ).val();
               if(oldVal!='')
               {
                 score += parseFloat(oldVal) ;
               }
           });
           $('.score-total').html(score);
       }
       $('html').on("keyup",".pscore",function(e){
           gettotalscore();
       });
       
       $('html').on("keypress",".pscore",function(e){
           gettotalscore();
       });
       $('html').on("change",".pscore",function(e){
           gettotalscore();
       });
       
       

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
                   '<select class="form-control droupdown custom-contact-field common-text-box-new pauthor" name="place"> '+
                   '<option value="">Select</option> <option value="caregiver">Caregiver</option>'+
                   '<option value="youth">Youth</option><option value="sibling">Sibling</option> '+
                   '</select> </td><td> '+
                   '<input type="text" name="strength" class="form-control custom-problems-field common-text-box-new pstrength" placeholder=""> </td>'+
                   '<td> <input type="number" name="score" class="form-control custom-problems-field common-text-box-new pscore" placeholder=""> </td>'+
                   '<td class="delete-section"><i class="fa fa-close delete-button delete delescore"></i></td></tr>';
                     $(wrapper).append(htmlData); //add input box
           }
         else
         {
         alert('You Reached the limits')
         }
         });

         $(wrapper).on("click",".delete", function(e){ 
           
           e.preventDefault(); $(this).parent().parent().remove(); x--;
           gettotalscore();
         })




       
       $(document).on('focus', '.pscore', function(e){
            var input = $(this);
            var oldVal = parseInt(input.val());

            if(oldVal=='0')
            {
                input.val('');
            }
        });

        $(document).on('focusout', '.pscore', function(e){
            var input = $(this);
            var oldVal = input.val();
            //alert(oldVal);
            if(oldVal=='')
            {
                input.val('0.00');
            }
        });
        
       
       
       

           
        
        $('html').on('click', '.saveassessment', function (e) {
            
            
            var consumername = $('.consumername').val();
            var assessment_id = $('.assessment_id').val();
            var assessment_no = $('.assessment_no').val();
            var location_name = $('.location_name').val();
            var communication = $('.communication').val();
            var serviceslist = $('.serviceslist').val();
            var record_no = $('.record_no').val();
            var date_add = $('.date_add').val();
            var status = $('.active-status').val();
            
            
            var assignee  = $('.assignee').val();            
            var spent_time = $('#spent-time-add').val();
            var due_date = $('.due_date').val();         
   
            $('.errorclass').html('');
            var validation_array= [];
            

            if(consumername==null ||  consumername==''){
               validation_array.push('Please select consumer');               
            }           
            
            if(assessment_no==null ||  assessment_no==''){
               validation_array.push('Please enter assessment no');
            }

            if(location_name==null  ||  location_name==''){
               validation_array.push('Please enter location ');               
            }            
            
            if(communication==null  ||  communication==''){
               validation_array.push('Please select communication');               
            }  
            
            if(record_no==null  ||  record_no==''){
               validation_array.push('Please select record no');               
            }

            if(date_add ==null  ||  date_add ==''){
               validation_array.push('Please select Assessment date ');               
            }             


      
            
       
            renderData(validation_array);
            
            if(validation_array.length > 0 ){
                return false;
            }
            
            
            var service_array= [];
            $(".serviceslist").each(function(i, value) {
               
               service_array.push({
                  service: $(this).val(), 
                  
              });
            });
            
            
            var contact_type_array= [];
            $(".salutation").each(function(i, value) {               
               contact_type_array.push({
                  salutation: $(this).val(), 
                  firstname: $(this).closest('tr').find('.cfname').val(),
                  lastname: $(this).closest('tr').find('.clname').val(),
                  relationship: $(this).closest('tr').find('.crelationship').val(),
                  phonenumber: $(this).closest('tr').find('.cmobile').val(),
              });
            });
            
            var problem_array= [];
            $(".pauthor").each(function(i, value) {               
               problem_array.push({
                  author: $(this).val(), 
                  pstrength: $(this).closest('tr').find('.pstrength').val(),
                  pscore: $(this).closest('tr').find('.pscore').val(),
              });
            });
            
            var behavior_array= [];
            $(".bauthor").each(function(i, value) {               
               behavior_array.push({
                  author: $(this).val(), 
                  bcontext: $(this).closest('tr').find('.bcontext').val(),
                  bconcern: $(this).closest('tr').find('.bconcern').val(),
                  bintervention: $(this).closest('tr').find('.bintervention').val(),
              });
            });
            
            
            var assessor_array= [];
            $(".aproblem").each(function(i, value) {               
               assessor_array.push({
                  aproblem: $(this).val(), 
                  acontext: $(this).closest('tr').find('.acontext').val(),                  
              });
            });
            
            
            
            var function_array= [];
            $(".fun_medical").each(function(i, value) {               
               function_array.push({
                  medical: this.value, 
                  mental: $('.fun_mental').eq(i).val(),                  
                  education: $('.fun_education').eq(i).val(),                  
                  leagal: $('.fun_leagal').eq(i).val(),                  
                  social: $('.fun_social').eq(i).val(),                  
                  selfharm: $('.fun_selfharm').eq(i).val(),                  
                  others: $('.fun_others').eq(i).val(),                  
                                   
              });
            });
            

            var file_upload = $('#file-upload').val();

            
            var formData = new FormData();
            let TotalFiles = $('#file-upload')[0].files.length; //Total files
            let files = $('#file-upload')[0];
            for (let i = 0; i < TotalFiles; i++) {
                     formData.append('files' + i, files.files[i]);
            }
            formData.append('TotalFiles', TotalFiles);
            
            
            var dataValues = { 
                              consumername: consumername,
                              assessment_id: assessment_id,            
                              assessment_no: assessment_no,
                              location_name: location_name,            
                              communication: communication,
                              serviceslist: service_array,  
                              contact_type_array:contact_type_array,
                              problem_array:problem_array,
                              behavior_array:behavior_array,
                              assessor_array:assessor_array,
                              function_array:function_array,
                              record_no: record_no,
                              date_add: date_add,
                              status: status,
                              assignee: assignee,            
                              spent_time: spent_time,
                              due_date: due_date,            
 
                           };
           
           
           
            options = JSON.stringify(dataValues);
            formData.append('options', options);
            
            var url = "{{ url('assessments-add') }}";
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
                        window.location.href= "{{ url('assessments-listing') }}";
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
                        '<input type="text" name="strength" class="form-control custom-problems-field common-text-box-new cfname" placeholder="">'+
                     '</td>'+
                     '<td>'+
                        '<input type="text" name="score" class="form-control custom-problems-field common-text-box-new clname" placeholder="">'+
                     '</td>'+
                     '<td>'+
                        '<select class="form-control droupdown custom-contact-field common-text-box-new crelationship" name="relationship">'+
                              '<option value="" selected="selected" >Select</option>';
                              @foreach ($relations as $relation)
                              htmlData += '<option value="{{$relation->id}}">{{$relation->title}}</option>';
                              @endforeach
                           htmlData += '</select>'+
                     '</td>'+
                     '<td>'+
                        '<input type="text" name="strength" class="form-control custom-problems-field common-text-box-new cmobile" placeholder="">'+
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
             '<select class="form-control droupdown custom-contact-field common-text-box-new bauthor" name="place">'+
             '<option value="">Select</option>'+
             '<option value="caregiver">Caregiver</option>'+
             '<option value="youth">Youth</option>'+
             '<option value="sibling">Sibling</option> </select></td>'+
             '<td> <select class="form-control droupdown custom-contact-field common-text-box-new bcontext" name="place">'+
            ' <option value="">Select</option><option value="Describe specifics of behavior">Describe specifics of behavior</option>'+
            ' <option value="Identify triggers">Identify triggers</option>'+
             '<option value="What has been tried & results">What has been tried & results</option>'+
             '<option value="Impact on family">Impact on family</option>'+
             '<option value="Behavior to be replaced">Behavior to be replaced</option> </select></td>'+
             '<td> <input type="text" name="concerns" class="form-control custom-behaviors-field common-text-box-new bconcern" placeholder="Type or copy-paste">'+
             '</td>'+
             '<td> <input type="text" name="present" class="form-control custom-behaviors-field common-text-box-new bintervention" placeholder="Type or copy-paste">'+
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
             '<select class="form-control droupdown custom-contact-field common-text-box-new aproblem" name="place">'+
             '<option value="">Select</option><option value="Caregiver characteristics">Caregiver characteristics</option>'+
             '<option value="Executive Functions">Executive Functions</option>'+
             '<option value="Initial Treatment Reccommendations">Initial Treatment Reccommendations</option>'+
             '<option value="Readiness for Change">Readiness for Change</option> </select> </td><td> '+
             '<input type="text" name="concerns" class="form-control custom-assessor-notes-field common-text-box-new acontext" placeholder="Type or copy-paste"> '+
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
             '<select class="form-control droupdown desktop-textbox serviceslist" name="assessmenttype">'+
             '<option value="">Select Service</option>';
             @foreach($services  as $service)
            htmlData += '<option value="{{$service->id}}">{{$service->title}}</option>';
            @endforeach
             htmlData += '<option value="Family Therapy- 0-60min-90846">Family Therapy- 0-60min-90846</option>'+
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

