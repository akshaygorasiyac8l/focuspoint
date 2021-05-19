@extends('layouts.app')

@section('script1')
@endsection
@section('add_layout')   
@endsection
@section('listing_layout')    
@endsection
@section('detail_layout')
   @parent
@endsection

@section('content')
	@section('header')
		@parent
	@endsection

	@section('sidebar')
		@parent
	@endsection 
    
         <div class="content-wrapper">
            <form id="form-consumer">
               <div class="background-transperent">
                  <section class="content-header">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-6 page-background">
                              <h1 class="page-title">Assessment-000500</h1>
                           </div>
                           <div class="col-md-6 new-attach-sec">
                              <div class="form-group new-image">
                                <div class="form-group" id="name-display">
                                   <input type="" name="file-name" class="form-control attch-name" id="form-group-add" value="" placeholder="Attach Files">
                                </div>
                                <div class="file-attach-upload">
                                   <i class="fa fa-paperclip paper-upload" aria-hidden="true"></i>
                                   <input type="file" name="file-attach" class="form-control file-new-upload" id="file-attach" placeholder="" multiple="" value="" data-multiple-caption="{count}">
                                   <label for="file-attach"><span class="archive-name"></span></label>
                                </div>
                             </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="edit-section">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-8">
                              <div class="btn-box">
                                 <div class="edit">
                                    <button class="btn-edit-print"><i class="fa fa-edit common-edit-btn"></i>Edit</button>
                                 </div>
                                 <div class="mail">
                                    <button class="btn-edit-print"><i class="fa fa-envelope common-edit-btn"></i>Mail</button>
                                 </div>
                                 <div class="pdf">
                                    <button class="btn-edit-print"><i class="fa fa-file-pdf-o common-edit-btn" aria-hidden="true"></i>PDF/Print</button>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <ul class="new-dropdown-hover add-details-drop">
                                 <li class="droupdown-hover-add">
                                     <a href="authorizations-add.html" class="create-new-btn">Create an Authorization</a><i class="fa fa-caret-down dropdown-icon" aria-hidden="true"></i>
                                     <ul class="dropdown-details">
                                       <li><a href="authorizations-add.html">Psychiatric Diagnostic Evaluation with Med Service - 90792</a></li>
                                       <li><a href="authorizations-add.html">Crisis Stabilization - H2019</a></li>
                                    </ul>                      
                                 </li>
                              </ul>
                              
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="content" id="assessment-details">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-8 consumer-section">
                              <div class="card card-primary">
                                 <div class="card-body">                                    
                                    <div class="form-group row common-row">
                                       <label class="col-md-12 col-form-label title-details">Initial Intake Assessment</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Consumer Name</label>
                                       <label class="col-md-9 col-form-label-assessment name-bold">Christopher Hua</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Assessment #</label>
                                       <label class="col-md-9 col-form-label-assessment">ASMT-000500</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Location</label>
                                       <label class="col-md-9 col-form-label-assessment">Office</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Communication</label>
                                       <label class="col-md-9 col-form-label-assessment">In-Person</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Service</label>
                                       <label class="col-md-9 col-form-label-assessment">Psychiatric Diagnostic Evaluation with Med Service - 90792:</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label"></label>
                                       <label class="col-md-9 col-form-label-assessment">Crisis Stabilization - H2019:</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 active-tool-box">
                              <div class="active-tool">
                                 <div class="card-body">
                                       <div class="form-group row tool-box new">
                                          <label class="col-md-5 col-form-label assigned-label">Record #</label>
                                          <div class="col-md-7">
                                             <label class="col-md-5 form-control without-background new-label">1234KL</label>
                                          </div>
                                       </div>

                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Date</label>
                                          <div class="col-md-7">
                                             <input type="text" name="date" class="form-control date-select without-background date-add" placeholder="mm-dd-yyyy">
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
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
                                       <div class="form-group row tool-box">
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
                                             <input type="text" name="services-date" class="form-control date-select without-background date-add" placeholder="mm-dd-yyyy">
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
                              <a class="nav-link tabs active" id="custom-content-below-home-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-home" aria-selected="false" onclick="openTabs(event, 'contact-person-details')">Contact Persons</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link tabs" id="custom-content-below-profile-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-profile" aria-selected="false" onclick="openTabs(event, 'problems-details')">Problems</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link tabs" id="custom-content-below-settings-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'behaviors-details')">Behaviors</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link tabs" id="custom-content-below-messages-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-messages" aria-selected="false" onclick="openTabs(event, 'life-function-details')">Life Functions</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link tabs" id="custom-content-below-settings-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'assessor-note-details')">Assessor Notes</a>
                          </li>
                           <li class="nav-item">
                              <a class="nav-link tabs" id="custom-content-below-home-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-home" aria-selected="false" onclick="openTabs(event, 'document-details')">Documents</a>
                           </li>
                        </ul>
                     </div>
                  </section>
                  <section class="contentsection" id="contact-person-details">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                             <table class="assessments-details-table common-table-info" style="width:100%">
                               <thead>
                                 <tr class="common-tr-info">
                                      <th>Contact Type</th>
                                      <th>First Name</th>
                                      <th>Last Name</th>
                                      <th>Relationship</th>
                                      <th>Mobile</th>
                                  </tr>
                               </thead>
                               <tbody>
                                 <!-- <tr>
                                   <td>Caregiver</td>
                                   <td>Joseph</td>
                                   <td>Jenson</td>
                                   <td>Parent / Guardian</td>
                                   <td>6789957542</td>
                                 </tr>
                                <tr>
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
                  <section class="contentsection" id="problems-details"></section>
                  <section class="contentsection" id="behaviors-details"></section>
                  <section class="contentsection" id="life-function-details"></section>
                  <section class="contentsection" id="assessor-note-details"></section>
                  <section class="contentsection" id="document-details"></section>
               </div>
            </form>
         </div>
  
   

@endsection
@section('script2')
@endsection
@section('end_add_layout')
   
@endsection
@section('end_listing_layout')
@endsection
@section('end_detail_layout')
   @parent
@endsection