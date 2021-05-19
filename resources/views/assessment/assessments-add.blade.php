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
		                     				<select class="form-control" name="assessment">
			                                    <option value="">Initial Intake Assessment</option>
			                                    <option value="">Initial Intake Assessment 1</option>
			                                    <option value="">Initial Intake Assessment 2</option>
			                                </select>
		                     			</div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Consumer Name</label>
                                       <div class="col-md-9">
                                          <select class="form-control droupdown mobile-drop common-selectbox" name="consumername">
                                            <option value="">Christopher Hua</option>
                                            <option value="">Christopher Hua 1</option>
                                            <option value="">Christopher Hua 2</option>
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
                                          <input type="text" name="assessment" class="form-control" placeholder="ASMT-000500">
                                       </div>
                                    </div>                              
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Location</label>
                                       <div class="col-md-9">
                                          <select class="form-control droupdown" name="payername">
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
                                          <select class="form-control droupdown" name="communication">
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
                                            <option value="Clinical Intake (2013)-90791">Clinical Intake (2013)-90791</option>
                                            <option value="Diagnostic Assessment-T1023">Diagnostic Assessment-T1023</option>
                                            <option value="Family Therapy- 0-60min-90846">Family Therapy- with patient-90847</option>
                                            <option value="Family Therapy- 0-60min-90846">Family Therapy- 0-60min-90846</option>
                                            <option value="Group Therapy-90853">Group Therapy-90853</option>
                                            <option value="Interactive Complexity Add-On-90785">Interactive Complexity Add-On-90785</option>
                                            <option value="Mental Health Assessment-H0032">Mental Health Assessment-H0031</option>
                                            <option value="Mental Health Assessment-H0032">Mental Health Assessment-H0032</option>
                                            <option value="Psychiatric Diagnostic Evaluation with Med Service-90792">Psychiatric Diagnostic Evaluation with Med Service-90792</option>
                                            <option value="Psychotherapy 53+ minutes-90837">Psychotherapy 53+ minutes-90837</option>
                                            <option value="Family Therapy with patient-90847">Family Therapy with patient-90847</option>
                                            <option value="Psychotherapy for Crisis 30-74 minutes-90839">Psychotherapy for Crisis 30-74 minutes-90839</option>
                                            <option value="Psychotherapy 16-37 minutes AddOn-90833">Psychotherapy 16-37 minutes AddOn-90833</option>
                                            <option value="Psychotherapy 16-37 minutes-90832">Psychotherapy 16-37 minutes-90832</option>
                                            <option value="Psychotherapy 38-52 minutes AddOn-90836">Psychotherapy 38-52 minutes AddOn-90836</option>
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
                                             <input type="text" name="record" class="form-control date-select without-background" placeholder="?">
                                          </div>
                                       </div>
                                       <!-- <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Place</label>
                                          <div class="col-md-7">
                                             <select class="form-control active-status apprroved" name="place">
                                                <option value="">Home</option>
                                                <option value="">Home 1</option>
                                                <option value="">Home 2</option>
                                             </select>
                                          </div>
                                       </div>
 -->
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
                                                <option value="">Open</option>
                                                <option value="">Fixed</option>
                                                <option value="">Completed</option>
                                                <option value="">In-Progress</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box add-new-selectbox">
                                          <label class="col-md-5 col-form-label assigned-label">Assignee</label>
                                          <div class="col-md-7">
                                            <select class="form-control active-status apprroved" name="assignee">
                                                <option value="">Name 1</option>
                                                <option value="">Name 2</option>
                                                <option value="">Name 3</option>
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
                                 <!-- <tr class="common-tr-info contact-person">
                                   <td>Caregiver</td>
                                   <td>Joseph</td>
                                   <td>Jenson</td>
                                   <td>Parent / Guardian</td>
                                   <td>6789957542</td>
                                 </tr>
                                <tr class="common-tr-info contact-person">
                                    <td>Sibling</td>
                                    <td>Bradman</td>
                                    <td>Wilson</td>
                                    <td>Brother</td>
                                    <td>9415632500</td>
                                 </tr> -->
                               </tbody>
                              </table>
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
                           <button type="submit" class="btn btn-default float-right">Cancel</button>
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
   @parent
@endsection
@section('end_listing_layout')
@endsection
@section('end_detail_layout')
@endsection

