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
                              <h1 class="page-title">Edit Assessments</h1>
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
                                 <!--
                                    <div class="form-group">
		                     				<select class="form-control assessment_id" name="assessment">
                                                <option value="">Select assessment</option>
                                                @foreach($assessment_types  as $assessment_type)
			                                    <option value="{{$assessment_type->id}}">{{$assessment_type->title}}</option>
                                                @endforeach
			                                    
			                                </select>
		                     			</div>
                                        -->
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Assessment Type<span class="required-mark">*</span></label>
                                       <div class="col-md-9">
                                          <select  class="form-control droupdown mobile-drop common-selectbox assessment_type" name="assessment_type">
                                             <option value="0">Select Assessment Type</option>
                                             @foreach($assessment_types  as $assessment_type)
                                             <option  {{$assessment_type->id==$assessments->assessment_type ? "selected" : ""}} value="{{$assessment_type->id}}">{{$assessment_type->title}} </option>
                                             @endforeach
                                         </select>
                                       </div>
                                    </div> 
                                    
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Consumer Name<span class="required-mark">*</span></label>
                                       <div class="col-md-9">
                                          <select class="form-control droupdown mobile-drop common-selectbox consumername" name="consumername">
                                             <option value="">Select Consumer</option>
                                             @foreach($consumers  as $consumer)
                                             <option {{$assessments->consumer_id == $consumer->id ? "selected" : ""}} value="{{$consumer->id}}">{{$consumer->fname}} {{$consumer->lname}}</option>
                                             @endforeach
                                         </select>
                                         <div class="view-part-consumer">
                                             <a href="#view_consumenr_details" data-toggle="modal" class="common-button-addmore  clickonviewconsumerdet"><i class="fa fa-user view-user"></i>View Consumer Details</a>
                                             <span>|</span>
                                             <a href="#view_auth_details" data-toggle="modal" class="common-button-addmore clickonviewauthdet"><i class="fa fa-cogs view-user"></i>View Authorizations</a>
                                         </div>
                                         <div class="modal add-spent-time-popup fade" id="view_consumenr_details" role="dialog">
                                               <div class="modal-dialog">
                                                 <div class="modal-content">
                                                 <!--
                                                    <div class="modal-header">
                                                       <i class="fa fa-close delete-button close-model" data-dismiss="modal"></i>
                                                    </div>
                                                    -->
                                                    <div class="modal-body  consumerdetailsData">
                                                         
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                 </div>
                                               </div>
                                             </div>
                                             
                                             
                                             <div class="modal add-spent-time-popup fade" id="view_auth_details" role="dialog">
                                               <div class="modal-dialog">
                                                 <div class="modal-content">
                                                 <!--
                                                    <div class="modal-header">
                                                       <i class="fa fa-close delete-button close-model" data-dismiss="modal"></i>
                                                    </div>
                                                    -->
                                                    <div class="modal-body  authdetailsData">
                                                         
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                 </div>
                                               </div>
                                             </div>
                                             
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Assessment #</label>
                                       <div class="col-md-9">
                                          <input type="text" name="assessment" class="form-control assessment_no" disabled value="{{$assessments->assessment_no}}">
                                       </div>
                                    </div>                              
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Location</label>
                                       <div class="col-md-9">
                                          <select class="form-control droupdown location_name" name="location_name">
                                            <option {{$assessments->location == 'community' ? "selected" : ""}} value="community">Community</option>
                                            <option {{$assessments->location == 'home' ? "selected" : ""}} value="home">Home</option>
                                            <option {{$assessments->location == 'hospital' ? "selected" : ""}} value="hospital">Hospital</option>
                                            <option {{$assessments->location == 'office' ? "selected" : ""}} value="office">Office</option>
                                            <option {{$assessments->location == 'residential facility' ? "selected" : ""}} value="residential facility">Residential Facility</option>
                                            <option {{$assessments->location == 'school' ? "selected" : ""}} value="school">School</option>
                                         </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Communication</label>
                                       <div class="col-md-9">
                                          <select class="form-control droupdown communication" name="communication">
                                            <option {{$assessments->communication == 'collateral' ? "selected" : ""}} value="collateral">Collateral</option>
                                            <option {{$assessments->communication == 'in-person' ? "selected" : ""}} value="in-person">In-Person</option>
                                            <option {{$assessments->communication == 'phone' ? "selected" : ""}} value="phone">Phone</option>
                                            <option {{$assessments->communication == 'telehealth' ? "selected" : ""}} value="telehealth">Telehealth</option>
                                         </select>
                                       </div>
                                    </div>
                                    <div class="form-group row new-phone">
                                       <label class="col-md-3 col-form-label">Service</label>
                                       <div class="col-md-9 add-more-services-dropdown">
                                          @foreach($services as $k=>$v)
                                             <div class="row new_item_row" > 
                                                <div class="select_box">                                                      
                                                   <select class="form-control droupdown serviceslist desktop-textbox" name="assessmenttype">
                                                     <option value="">Select Service</option>
                                                      @foreach($servicesdatas  as $service)
                                                      <option {{$k==$service->id ? "selected" : ""}} value="{{$service->id}}">{{$service->title}}</option>
                                                      @endforeach
                                                  </select> 
                                                </div>
                                                <div class="delete-row-icon"><div class="delete-section new-delete-add consumer-delete"><i class="fa fa-close delete-button delete"></i></div></div>
                                             </div>                                            
                                          @endforeach                                         
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
                                             <input type="text" name="record" class="form-control  without-background record_no" value="{{$assessments->record_no}}">
                                          </div>
                                       </div>
                                       

                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Date<span class="required-mark">*</span></label>
                                          <div class="col-md-7">
                                             <input type="text" name="date" class="form-control date-select without-background date_add" value="{{$assessments->assessment_date}}">
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box add-new-selectbox">
                                          <label class="col-md-5 col-form-label assigned-label">State</label>
                                          <div class="col-md-7">
                                             <select class="form-control active-status apprroved" name="state">
                                                <option {{$assessments->status==0 ? "selected" : ""}} value="0">Open</option>
                                                <option {{$assessments->status==1 ? "selected" : ""}} value="1">Fixed</option>
                                                <option {{$assessments->status==2 ? "selected" : ""}} value="2">Completed</option>
                                                <option {{$assessments->status==3 ? "selected" : ""}} value="3">In-Progress</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box add-new-selectbox">
                                          <label class="col-md-5 col-form-label assigned-label">Assignee</label>
                                          <div class="col-md-7">
                                            <select class="form-control active-status assignee apprroved" name="assignee">
                                                <option value="0">Unassigned</option>
                                                @foreach($users  as $user)
                                                <option {{$assessments->status==$user->id ? "selected" : ""}} value="{{$user->id}}">{{$user->fname}} {{$user->lname}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Spent Time</label>
                                          <div class="col-md-7">
                                             <input type="text" disabled name="spent-time" class="form-control without-background date-add" id="spent-time-add" value="{{$assessments->spent_time}}">
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Due Date</label>
                                          <div class="col-md-7">
                                             <input type="text" name="due-date" class="form-control date-select without-background due_date" value="{{$assessments->due_date}}">
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
                           @if(count($assessment_persons) > 0 )
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
                                    @foreach($assessment_persons as $assessment_person)
                                    <tr class="tr-contact-person common-tr-info">
                                       <td>
                                          <input type="hidden" class="editpersons" value="{{$assessment_person->id}}">
                                          <select class="form-control droupdown mobile-drop salutation" name="salutation" autocomplete="off">
                                             <option value="" selected="selected" >Salutation</option>
                                             <option {{$assessment_person->salutation=="Mr" ? "selected" : ""}} value="Mr">Mr.</option>
                                             <option {{$assessment_person->salutation=="Mrs" ? "selected" : ""}} value="Mrs">Mrs.</option>
                                             <option {{$assessment_person->salutation=="Ms" ? "selected" : ""}} value="Ms">Ms.</option>
                                             <option {{$assessment_person->salutation=="Miss" ? "selected" : ""}} value="Miss">Miss.</option>
                                             <option {{$assessment_person->salutation=="Dr" ? "selected" : ""}} value="Dr">Dr.</option>
                                          </select>
                                       </td>
                                       <td>
                                          <input type="text" name="strength" class="form-control custom-problems-field common-text-box-new cfname" value="{{$assessment_person->fname}}">
                                       </td>
                                       <td>
                                          <input type="text" name="score" class="form-control custom-problems-field common-text-box-new clname" value="{{$assessment_person->lname}}">
                                       </td>
                                       <td>
                                          <select class="form-control droupdown custom-contact-field common-text-box-new crelationship" name="relationship">
                                                <option value="" selected="selected" >Select</option>
                                                @foreach ($relations as $relation)
                                                <option {{$assessment_person->relation==$relation->id ? "selected" : ""}} value="{{$relation->id}}">{{$relation->title}}</option>
                                                @endforeach
                                             </select>
                                       </td>
                                       <td>
                                          <input type="text" name="strength" class="form-control custom-problems-field common-text-box-new cmobile" value="{{$assessment_person->mobile}}">
                                       </td>
                                       <td class="delete-section"><i class="fa fa-close delete-button delete"></i></td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                              @endif
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
                                 @if(count($assessment_problems) > 0 )
                                 <table class="table-problems-person common-table-info">
                                    <thead>
                                     <tr>
                                       <th>Author</th>
                                       <th>Strength / Challenge</th>
                                       <th>Score</th>
                                     </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($assessment_problems as $assessment_problem)
                                       <tr class="tr-problems-person common-tr-info">
                                          <td>
                                             <input type="hidden" class="editproblems" value="{{$assessment_problem->id}}">
                                             <select class="form-control droupdown custom-contact-field common-text-box-new pauthor" name="place">
                                                <option value="">Select</option>
                                                <option {{$assessment_problem->author=="caregiver" ? "selected" : ""}} value="caregiver">Caregiver</option>
                                                <option {{$assessment_problem->author=="youth" ? "selected" : ""}} value="youth">Youth</option>
                                                <option {{$assessment_problem->author=="sibling" ? "selected" : ""}} value="sibling">Sibling</option>
                                             </select>
                                          </td>
                                          <td>
                                             <input type="text" name="strength" class="form-control custom-problems-field common-text-box-new pstrength" value="{{$assessment_problem->strength}}">
                                          </td>
                                          <td>
                                             <input type="number" name="score" class="form-control custom-problems-field common-text-box-new pscore" value="{{$assessment_problem->score}}">
                                          </td>
                                          <td class="delete-section"><i class="fa fa-close delete-button delete"></i></td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                 </table>
                                 @endif
                              </div>
                              <button class="add_form_problems common-button"><i class="fa fa-plus common-icons"></i>Add New Item</button> 
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
                                 <textarea name="" rows="4" class="form-control person_desc">{{$assessments->person_desc}}</textarea>
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
                                          <input type="hidden" class="idval" value="{{$assessment_functions[0]->id}}" />
                                          <input type="hidden" class="idval" value="{{$assessment_functions[1]->id}}" />
                                          <input type="text" name="copy1" class="form-control custom-life-functions-field common-text-box-new fun_medical" value="{{$assessment_functions[0]->medical}}">
                                       </td>
                                       <td>
                                          <input type="text" name="copy-paste" class="form-control custom-life-functions-field common-text-box-new fun_medical" value="{{$assessment_functions[1]->medical}}">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Mental Health</label>
                                       </td>
                                       <td>
                                          <input type="text" name="mental-copy-paste" class="form-control custom-life-functions-field common-text-box-new  fun_mental" value="{{$assessment_functions[0]->mental}}">
                                       </td>
                                       <td>
                                          <input type="text" name="mental-copy" class="form-control custom-life-functions-field common-text-box-new fun_mental" value="{{$assessment_functions[1]->mental}}">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Education</label>
                                       </td>
                                       <td>
                                          <input type="text" name="edu-copy-paste" class="form-control custom-life-functions-field common-text-box-new fun_education" value="{{$assessment_functions[0]->education}}">
                                       </td>
                                       <td>
                                          <input type="text" name="edu-copy" class="form-control custom-life-functions-field common-text-box-new fun_education" value="{{$assessment_functions[1]->education}}">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Legal</label>
                                       </td>
                                       <td>
                                          <input type="text" name="legal-copy-paste" class="form-control custom-life-functions-field common-text-box-new fun_leagal" value="{{$assessment_functions[0]->leagal}}">
                                       </td>
                                       <td>
                                          <input type="text" name="legal-copy" class="form-control custom-life-functions-field common-text-box-new fun_leagal" value="{{$assessment_functions[1]->leagal}}">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Social</label>
                                       </td>
                                       <td>
                                          <input type="text" name="social-copy-paste" class="form-control custom-life-functions-field common-text-box-new  fun_social" value="{{$assessment_functions[0]->social}}">
                                       </td>
                                       <td>
                                          <input type="text" name="social-copy" class="form-control custom-life-functions-field common-text-box-new fun_social" value="{{$assessment_functions[1]->social}}">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Self Harm</label>
                                       </td>
                                       <td>
                                          <input type="text" name="self-copy-paste" class="form-control custom-life-functions-field common-text-box-new fun_selfharm" value="{{$assessment_functions[0]->selfharm}}">
                                       </td>
                                       <td>
                                          <input type="text" name="self-copy" class="form-control custom-life-functions-field common-text-box-new fun_selfharm" value="{{$assessment_functions[1]->selfharm}}">
                                       </td>
                                    </tr>
                                    <tr class="tr-life-functions-person">
                                       <td>
                                          <label class="mediacl-report">Others</label>
                                       </td>
                                       <td>
                                          <input type="text" name="other-copy-paste" class="form-control custom-life-functions-field common-text-box-new fun_others" value="{{$assessment_functions[0]->others}}">
                                       </td>
                                       <td>
                                          <input type="text" name="other-copy" class="form-control custom-life-functions-field common-text-box-new fun_others" value="{{$assessment_functions[1]->others}}">
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
                              @if(count($assessment_behaviors) > 0 )
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
                                    @foreach($assessment_behaviors as $assessment_behavior)
                                       <tr class="tr-behaviors-person common-tr-info">
                                          <td>
                                             <input type="hidden" class="editbehaviors" value="{{$assessment_behavior->id}}">
                                             <select class="form-control droupdown custom-contact-field common-text-box-new bauthor" name="place">
                                                <option value="">Select</option>
                                             
                                                <option {{$assessment_behavior->author=="caregiver" ? "selected" : ""}} value="caregiver">Caregiver</option>
                                                <option {{$assessment_behavior->author=="youth" ? "selected" : ""}} value="youth">Youth</option>
                                                <option {{$assessment_behavior->author=="sibling" ? "selected" : ""}} value="sibling">Sibling</option>
                                             </select>
                                          </td>
                                          <td>
                                             <select class="form-control droupdown custom-contact-field common-text-box-new bcontext" name="place">
                                                 <option value="">Select</option>
                                               <option {{$assessment_behavior->context=="Describe specifics of behavior" ? "selected" : ""}} value="Describe specifics of behavior">Describe specifics of behavior</option>
                                                <option {{$assessment_behavior->context=="Identify triggers" ? "selected" : ""}} value="Identify triggers">Identify triggers</option>
                                                <option {{$assessment_behavior->context=="What has been tried & results" ? "selected" : ""}} value="What has been tried & results">What has been tried & results</option>
                                                <option {{$assessment_behavior->context=="Impact on family" ? "selected" : ""}} value="Impact on family">Impact on family</option>
                                                <option {{$assessment_behavior->context=="Behavior to be replaced" ? "selected" : ""}} value="Behavior to be replaced">Behavior to be replaced</option>
                                             </select>
                                          </td>
                                          <td>
                                             <input type="text" name="concerns" class="form-control custom-behaviors-field common-text-box-new bconcern" value="{{$assessment_behavior->concern}}">
                                          </td>
                                          <td>
                                             <input type="text" name="present" class="form-control custom-behaviors-field common-text-box-new bintervention" value="{{$assessment_behavior->intervention}}">
                                          </td>
                                          <td class="delete-section"><i class="fa fa-close delete-button delete"></i></td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                 </table>
                                 @endif
                              </div>                              
                              <button class="add_form_behaviors common-button"><i class="fa fa-plus common-icons"></i>Add New Item</button> 
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <span class="additional-notes behaviors">Additional Notes</span>
                              <div class="form-group">
                                 <textarea name="" rows="4" class="form-control behavior_desc">{{$assessments->behavior_desc}}</textarea>
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
                                 @if(count($assessment_assessors) > 0 )
                                 <table class="table-assessor-notes-person common-table-info">
                                    <thead>
                                     <tr>
                                       <th>Problem</th>
                                       <th>Current Context</th>
                                     </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($assessment_assessors as $assessment_assessor)
                                       <tr class="tr-assessor-notes-person common-tr-info">
                                          <td>
                                             <input type="hidden" class="editassessors" value="{{$assessment_assessor->id}}">
                                             <select class="form-control droupdown custom-contact-field common-text-box-new aproblem" name="place">
                                                <option {{$assessment_assessor->problem=="Caregiver characteristics" ? "selected" : ""}} value="Caregiver characteristics">Caregiver characteristics</option>
                                                <option {{$assessment_assessor->problem=="Executive Functions" ? "selected" : ""}} value="Executive Functions">Executive Functions</option>
                                                <option {{$assessment_assessor->problem=="Initial Treatment Reccommendations" ? "selected" : ""}} value="Initial Treatment Reccommendations">Initial Treatment Reccommendations</option>
                                                <option {{$assessment_assessor->problem=="Readiness for Change" ? "selected" : ""}} value="Readiness for Change">Readiness for Change</option>
                                             </select>
                                          </td>
                                          <td>
                                             <input type="text" name="concerns" class="form-control custom-assessor-notes-field common-text-box-new acontext" value="{{$assessment_assessor->context}}">
                                          </td>
                                          <td class="delete-section"><i class="fa fa-close delete-button delete"></i></td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                 </table>
                                 @endif
                              </div>                              
                              <button class="add_form_assessor-notes common-button"><i class="fa fa-plus common-icons"></i>Add New Item</button> 
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <span class="additional-notes behaviors">Additional Notes</span>
                              <div class="form-group">
                                 <textarea name="" rows="4" class="form-control assessor_desc">{{$assessments->assessor_desc}}</textarea>
                              </div>
                              <span class="client-word">Use Client Words</span>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="contentsection" id="document-assessment">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-body">
                                 <div class="form-group row">
                                    <div class="col-md-4">
                                       <label class="attach-file-lbl attach-file-label">Attach Files</label>
                                       <div class="file-upload-multiple">
                                          <label class="lbl-multiple-files">Select Multiple Files</label>
                                          <input type="file" name="filenames[]" class="form-control multiple-image-upload" id="file-upload" multiple="" accept=".jpg, .jpeg, .png, .txt">
                                          <p class="image-note-title">You can upload a maximum of 5 files, 5MB each</p>
                                      </div>
                                    </div>
                                    <div class="col-md-8 image_preview_border">
                                       <div id="uploadPreview" class="employee-image">
                                       @foreach($assessment_documents as $document)
                                          <?php
                                             $varpath = 'public/files/'.$document->document;
                                          ?>
                                          @if(file_exists($varpath)) 
                                            <div class="image-section"><div class="row image-preview-row"><i class="fa fa-paperclip attach-icon-add" aria-hidden="true"></i><div class="image-show-name"><p class="file-name-image">{{$document->document}}</p> <span class="delete-image"><i class="fa fa-trash delete" aria-hidden="true"></i></span></div></div></div>
                                          @else
                                            
                                          @endif
                                          
                                                
                                       @endforeach
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
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
                                 <div class="col-md-12  ">
                                    <div class="spent-time-details allsepndtimes">
                                      
                                    </div>
                                    
                                    
                                    

                                 
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-2 short-col">
                                    <div class="form-group">
                                       <div class="starttime startdatetimepicker" id='startdatetimepicker'>
                                          <input type="text" placeholder="Start Date And Start Time" class="form-control  start_date_time" />   
                                          <span class="input-group-addon calendar">
                                          </span>
                                      </div>
                                    </div>
                                 </div>
                                 <div class="col-md-2 short-col">
                                    <div class="form-group">
                                       <div class="starttime enddatetimepicker" id='enddatetimepicker'>
                                          <input type="text" placeholder="End Date And End Time" class="form-control end_date_time" />   
                                          <span class="input-group-addon calendar">
                                          </span>
                                      </div>
                                    </div>
                                 </div>
                                 <div class="col-md-8">
                                    <div class="form-group">
                                       <input type="text" name="" class="form-control commentvallue" placeholder="Write a comment">
                                    </div>
                                 </div>
                                 
                              </div> 
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <button type="button" class="add-new-btn  addspendtime">Add Spent Time</button>
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
      sideBySide: true,

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
        
        $('.dob,.servicedate,.admissiondate,.dischargedate,.diagnosis-date,.hasDatepicker,.date-type,.notationdate,.date-select').datepicker({ changeMonth: true,changeYear: true,dateFormat: "mm/dd/yy" });
        
        $(document).on('focus','.dob,.servicedate,.admissiondate,.dischargedate,.diagnosis-date,.hasDatepicker,.date-type,.notationdate,.date-select',function(){
           $('.dob,.servicedate,.admissiondate,.dischargedate,.diagnosis-date,.hasDatepicker,.date-type,.notationdate,.date-select').datepicker({
               changeMonth: true,changeYear: true,
               dateFormat: 'mm/dd/yy',
               autoclose: true,
               todayHighlight: true
           });
        });
       
       
         var consumer_id = $('.consumername').val();
         checkviewlinks(consumer_id);

         $('html').on("change",".consumername",function(e){
           var consumer_id = $(this).val(); 
           checkviewlinks(consumer_id);
         });

         function checkviewlinks(consumer_id){
            $('.view-part-consumer').show();
            if(consumer_id==''){
               $('.view-part-consumer').hide();
            }
         }
        


         function gettotalSpendTime(){
           var url = "{{ route('getTotalSpendtimeByAssessmentId', $assessments->id) }}";
           
           $.ajax({
                url: url,
                type: "POST",
                data: { 
         
                        assessment_id:"{{$assessments->id}}",

                     },
                success: function (data) {
                     console.log(data);
                     $('#spent-time-add').val(data);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
            
       }
       
        
        getSpendtimes();
        function getSpendtimes(){
            
            var url = "{{ url('assessments-getspendtimes') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: { 
                        
                        assessment_id:"{{$assessments->id}}",

                     },
                success: function (data) {
                     console.log(data);
                     var htmlData = '';
                     if(data.class='success'){
                         if(data.data.length> 0 ){
                         for(var t=0;t<data.data.length;t++){
                             
                             htmlData +='<div class="spent-time-display displayshn'+data.data[t].id+'">'+
                                        '<div class="spent-details-box">'+
                                          '<div class="sparate-icon">'+
                                            '<i class="fa fa-hourglass common-icons timer-icon"></i>'+
                                            '<span class="border-spent"></span>'+
                                          '</div>'+
                                          '<div class="spent-part">'+
                                            '<h6 class="user-name-title">'+data.data[t].assignee_id+'</h6>'+
                                            '<div class="spent-time-parts">'+
                                              '<p class="spent-date">'+data.data[t].created_date+'</p>'+
                                              '<p class="spent-time-title">'+data.data[t].totalspendtime+'</p>'+
                                              '<p class="spent-title">'+data.data[t].comment+'</p>'+
                                              '<p class="spent-datetime">'+data.data[t].created_date_val+'</p>'+
                                              '<p class="spent-edit"><a href="#" class="btn-spent-edit"><i class="fa fa-pencil"></i></a></p>'+
                                            '</div>'+
                                          '</div>'+
                                        '</div> '+                                       
                                        '<div class="spent-edit-time">'+
                                          '<div class="row">'+
                                             '<div class="col-md-2 short-col">'+
                                                '<div class="form-group">'+
                                                   '<div class="starttime startdatetimepicker" id="startdatetimepicker">'+
                                                      '<input type="text" placeholder="Start Date And Start Time" value="'+data.data[t].start_time+'" class="form-control starttimes'+data.data[t].id+'" />'+   
                                                      '<span class="input-group-addon calendar">'+
                                                      '</span>'+
                                                  '</div>'+
                                                '</div>'+
                                             '</div>'+
                                             '<div class="col-md-2 short-col">'+
                                                '<div class="form-group">'+
                                                   '<div class="starttime enddatetimepicker" id="enddatetimepicker">'+
                                                      '<input type="text" placeholder="End Date And End Time" value="'+data.data[t].end_time+'" class="form-control endtimes'+data.data[t].id+'" />'+   
                                                      '<span class="input-group-addon calendar">'+
                                                      '</span>'+
                                                  '</div>'+
                                                '</div>'+
                                             '</div>'+
                                             '<div class="col-md-8">'+
                                                '<div class="form-group">'+
                                                   '<input type="text" name="" class="form-control comments'+data.data[t].id+'" value="'+data.data[t].comment+'">'+
                                                '</div>'+
                                             '</div>'+
                                          '</div>'+
                                          '<div class="btn-section-spent">'+
                                            '<button type="button" data="'+data.data[t].id+'" class="btn btn-info  saveonedit">Save</button>'+
                                            '<button type="button" data="'+data.data[t].id+'" class="btn btn-default float-right btn-spent-close">Cancel</button>'+
                                          '</div>'+
                                        '</div>'+
                                      '</div>';
                                    
                              }
                         }
                                    
                                    $('.allsepndtimes').html(htmlData);
                        
                     }else{
                        alert('Something wrong');
                        return false;
                     }


                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
       
       
       
       $('html').on('click', '.saveonedit', function (e) {
           var selval = $(this).attr('data');
           var start_date_time = $('.starttimes'+selval).val();
            var end_date_time = $('.endtimes'+selval).val();
            var comment = $('.comments'+selval).val();
            var assignee = $('.assignee').val();
            
            if(start_date_time=='' || start_date_time==null){
                $('.starttimes'+selval).css('border','1px solid #f00');
                return false;
            }
            $('.starttimes'+selval).css('border','1px solid #ced4da');
            
            if(end_date_time=='' || end_date_time==null){
                $('.endtimes'+selval).css('border','1px solid #f00');
                return false;
            }
            $('.endtimes'+selval).css('border','1px solid #ced4da');
            
            
            var url = "{{ url('assessments-updatespendtime') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: { 
                        start_date_time: start_date_time,
                        end_date_time: end_date_time,            
                        comment: comment,
                        assignee: assignee,  
                        id:selval
                        

                     },
                success: function (data) {
                     console.log(data);
                     if(data.class='success'){
                        getSpendtimes();
                        gettotalSpendTime();
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
         
        $('html').on('click', '.addspendtime', function (e) {
            var start_date_time = $('.start_date_time').val();
            var end_date_time = $('.end_date_time').val();
            var comment = $('.commentvallue').val();
            var assignee = $('.assignee').val();
            if(assignee=='0'){
                alert('Please select Assignee.');
                return false;
            }
            
            if(start_date_time=='' || start_date_time==null){
                $('.start_date_time').css('border','1px solid #f00');
                return false;
            }
            $('.start_date_time').css('border','1px solid #ced4da');
            
            if(end_date_time=='' || end_date_time==null){
                $('.end_date_time').css('border','1px solid #f00');
                return false;
            }
            $('.end_date_time').css('border','1px solid #ced4da');
            
            var url = "{{ url('assessments-spendtime') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: { 
                        start_date_time: start_date_time,
                        end_date_time: end_date_time,            
                        comment: comment,
                        assignee: assignee,            
                        assessment_id:"{{$assessments->id}}",

                     },
                success: function (data) {
                     console.log(data);
                     if(data.class='success'){
                        $('.start_date_time').val('');
                        $('.end_date_time').val('');
                        $('.commentvallue').val('');
                        getSpendtimes();
                        gettotalSpendTime();
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
       
       function  renderData(validation_array){
           var errorhtmldata = '<ul>';
            $(validation_array).each(function(key,val){
                errorhtmldata += '<li>'+val+'</li>';
            });
            errorhtmldata += '</ul>';
            $('.errorclass').html(errorhtmldata);
       }
       
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
             '<td> <input type="text" name="score" class="form-control custom-problems-field common-text-box-new pscore" placeholder=""> </td>'+
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
     gettotalscore();
   });
       
       
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
       
       gettotalscore();
       
                $('html').on('click', '.clickonviewauthdet', function (e) {
            //.consumerdetailsData
            $('.authdetailsData').html('');
            var consumername = $('.consumername').val();
            var url = "{{ route('getauthsbyid') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: {consumer_id:consumername},
                success: function (data) {
                     console.log(data);
                     if(data.success='1'){
                        var  htmlData = '';
                        htmlData += '<table class="table">';
                        htmlData += '<tr><th>Consumer Name</th><th>Approve Date</th><th>Expiry Date</th><th>Discharge Date</th></tr>';
                        
                        $(data.authorizations).each(function(i, value) {
                           
                           htmlData += '<tr><td>'+data.authorizations[i].name+'</td><td>'+data.authorizations[i].approve_date+'</td><td>'+data.authorizations[i].expiry_date+'</td><td>'+data.authorizations[i].discharge_date+'</td></tr>';
                        });
                        
                        htmlData += '</table>';
                        $('.authdetailsData').html(htmlData);
                        
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
        

        $('html').on('click', '.clickonviewconsumerdet', function (e) {
            //.consumerdetailsData
            $('.consumerdetailsData').html('');
            var consumername = $('.consumername').val();
            var url = "{{ route('getconsumerbyid') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: {consumer_id:consumername},
                success: function (data) {
                     console.log(data);
                     if(data.success='1'){
                        var  htmlData = '<h2>'+data.consumers.salutation+' '+data.consumers.fname+' '+data.consumers.lname+'</h2>';
                        htmlData += '<p>DOB: '+data.consumers.dob+'</p>';
                        htmlData += '<p>Email: '+data.consumers.email+'</p>';
                        htmlData += '<p>Record NO: '+data.consumers.record_no+'</p>';
                        htmlData += '<p>Case Name: '+data.consumers.case_name+'</p>';
                        $('.consumerdetailsData').html(htmlData);
                        
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
        
        $('html').on('click', '.saveassessment', function (e) {
            
            var assessment_type = $('.assessment_type').val();
            var consumername = $('.consumername').val();
            //var assessment_id = $('.assessment_id').val();
            var assessment_no = $('.assessment_no').val();
            var location_name = $('.location_name').val();
            var communication = $('.communication').val();
            var serviceslist = $('.serviceslist').val();
            var record_no = $('.record_no').val();
            var date_add = $('.date_add').val();
            var status = $('.active-status').val();
            
            
            var person_desc = $('.person_desc').val();
            var behavior_desc = $('.behavior_desc').val();
            var assessor_desc = $('.assessor_desc').val();
            
            
            var assignee  = $('.assignee').val();            
            var spent_time = $('#spent-time-add').val();
            var due_date = $('.due_date').val();         
   
            $('.errorclass').html('');
            var validation_array= [];
            
            if(assessment_type ==null ||  assessment_type==''){
               validation_array.push('Please select Assessment Type');               
            }

            if(consumername==null ||  consumername==''){
               validation_array.push('Please select Consumer');               
            }           
            
            if(assessment_no==null ||  assessment_no==''){
               validation_array.push('Please enter Assessment No');
            }

            if(location_name==null  ||  location_name==''){
               validation_array.push('Please enter Location ');               
            }            
            
            if(communication==null  ||  communication==''){
               validation_array.push('Please select Communication');               
            }  
            
            if(record_no==null  ||  record_no==''){
               validation_array.push('Please select Record No');               
            }

            if(date_add ==null  ||  date_add ==''){
               validation_array.push('Please select Assessment Date ');               
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
                  id: $(this).closest('tr').find('.editpersons').val(),
              });
            });
            
            var problem_array= [];
            $(".pauthor").each(function(i, value) {               
               problem_array.push({
                  author: $(this).val(), 
                  pstrength: $(this).closest('tr').find('.pstrength').val(),
                  pscore: $(this).closest('tr').find('.pscore').val(),
                  id: $(this).closest('tr').find('.editproblems').val(),
              });
            });
            
            var behavior_array= [];
            $(".bauthor").each(function(i, value) {               
               behavior_array.push({
                  author: $(this).val(), 
                  bcontext: $(this).closest('tr').find('.bcontext').val(),
                  bconcern: $(this).closest('tr').find('.bconcern').val(),
                  bintervention: $(this).closest('tr').find('.bintervention').val(),
                  id: $(this).closest('tr').find('.editbehaviors').val(),
              });
            });
            
            
            var assessor_array= [];
            $(".aproblem").each(function(i, value) {               
               assessor_array.push({
                  aproblem: $(this).val(), 
                  acontext: $(this).closest('tr').find('.acontext').val(),  
                  id: $(this).closest('tr').find('.editassessors').val(),
              });
            });
            
            
            
            var function_array= [];
            $(".fun_medical").each(function(i, value) { 
               console.log(value);
               function_array.push({
                  medical: this.value, 
                  idval: $('.idval').eq(i).val(),
                  mental: $('.fun_mental').eq(i).val(),                  
                  education: $('.fun_education').eq(i).val(),                  
                  leagal: $('.fun_leagal').eq(i).val(),                  
                  social: $('.fun_social').eq(i).val(),                  
                  selfharm: $('.fun_selfharm').eq(i).val(),                  
                  others: $('.fun_others').eq(i).val(),                  
                                   
              });
            });
            
            var editpersons_array= [];
            $(".editpersons").each(function(i, value) {
               
               editpersons_array.push({
                  editpersons: $(this).val(), 
              });
            });
            

            var editproblems_array= [];
            $(".editproblems").each(function(i, value) {
               
               editproblems_array.push({
                  editproblems: $(this).val(), 
              });
            });


            var editbehaviors_array= [];
            $(".editbehaviors").each(function(i, value) {
               
               editbehaviors_array.push({
                  editbehaviors: $(this).val(), 
              });
            });


            var editassessors_array= [];
            $(".editassessors").each(function(i, value) {
               
               editassessors_array.push({
                  editassessors: $(this).val(), 
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
                              assessment_type:assessment_type,
                              consumername: consumername,
                              //assessment_id: assessment_id,            
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
                              editpersons_array:editpersons_array,
                              editproblems_array:editproblems_array,
                              editbehaviors_array:editbehaviors_array,
                              editassessors_array:editassessors_array,
                              person_desc: person_desc, 
                              behavior_desc: behavior_desc, 
                              assessor_desc: assessor_desc,    
 
                           };
           
           
           
            options = JSON.stringify(dataValues);
            formData.append('options', options);
            
            var url = "{{ url('assessments-edit') }}/{{$assessments->id}}";
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
             htmlData += '<div class="row new_item_row"><div class="select_box">'+
             '<select class="form-control droupdown desktop-textbox serviceslist" name="assessmenttype">'+
             '<option value="">Select Service</option>';
             @foreach($servicesdatas  as $service)
            htmlData += '<option value="{{$service->id}}">{{$service->title}}</option>';
            @endforeach
             htmlData += '<option value="Family Therapy- 0-60min-90846">Family Therapy- 0-60min-90846</option>'+
             '</select></div><div class="delete-row-icon"><div class="delete-section new-delete-add consumer-delete">'+
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



   
// Date and Time Picker
$(function () {
   $('.startdatetimepicker').datetimepicker({ 
      allowInputToggle: true,
      format: 'YYYY-MMM-DD HH:mm',
      inline: false,
      sideBySide: true
   }); 
});
$(function () {
   $('.enddatetimepicker').datetimepicker({ 
      allowInputToggle: true,
      format: 'YYYY-MMM-DD HH:mm',
      inline: false,
      sideBySide: true
   }); 
});
$(document).on('focus','.startdatetimepicker',function(){
    $('.startdatetimepicker').datetimepicker({ 
      allowInputToggle: true,
      format: 'YYYY-MMM-DD HH:mm',
      inline: false,
      sideBySide: true
   }); 
});

$(document).on('focus','.enddatetimepicker',function(){
    $('.enddatetimepicker').datetimepicker({ 
      allowInputToggle: true,
      format: 'YYYY-MMM-DD HH:mm',
      inline: false,
      sideBySide: true
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

