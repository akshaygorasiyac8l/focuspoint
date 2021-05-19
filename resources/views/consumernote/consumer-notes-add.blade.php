@extends('layouts.app')
@section('script1')
<link rel="stylesheet" href="css/jquery-ui.css">

      <link rel="stylesheet" type="text/css" href="css/chosen.css">
      <link rel="stylesheet" href="css/bootstrap-multiselect.css">
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script src="js/jquery-ui.js"></script>
      <script type="text/javascript" src="js/jquery.validate.min.js"></script>
      <script type="text/javascript" src="js/app.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/chosen.jquery.js"></script>
      <script src="js/bootstrap-multiselect.js"></script>
@endsection
@section('content')
	@section('header')
		@parent
	@endsection

	@section('sidebar')
		@parent
	@endsection 
    
         <div class="content-wrapper">
            <form id="form-consumer" name="consumer-notes-form" action="">
               <div class="background-transperent">
                  <section class="content-header">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12 page-background">
                              <h1 class="page-title">New Note</h1>
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
                                       <select class="form-control" name="pie-document">
                                             <option value="">P.I.E. Documentation</option>
                                             <option value="">P.I.E. Documentation 1</option>
                                             <option value="">P.I.E. Documentation 2</option>
                                         </select>
                                    </div>
                                    <div class="form-group row space-remove">
                                       <label class="col-md-3 col-form-label">Consumer Name</label>
                                       <div class="col-md-9 cols-space consumer-new-add">
                                          <select class="form-control droupdown mobile-drop" name="consumername">
                                            <option value="" selected="selected" disabled="disabled">Select</option>
                                            <option value="">John Doe 1</option>
                                            <option value="">John Doe 2</option>
                                         </select>                                        
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                    	<div class="col-md-3"></div>
                                    	<div class="col-md-9">
                                    		<div class="view-part-consumer new-consumer-notes">
	                                            <button class="add-more-services common-button-addmore"><i class="fa fa-user view-user"></i>View Consumer Details</button>
	                                            <button class="more-consumers-add common-button-addmore"><i class="fa fa-users more-consumer-icons common-icons" aria-hidden="true"></i>Assign More Consumers</button>
	                                        </div>
                                    	</div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Payer Name</label>
                                       <div class="col-md-9 cols-space">
                                          <select class="form-control droupdown" name="payername">
                                            <option value="" selected="selected" disabled="disabled">Select</option>
                                            <option value="">VA Premiere Elite 1</option>
                                            <option value="">VA Premiere Elite 2</option>
                                         </select>
                                         </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Note #</label>
                                       <div class="col-md-9 cols-space">
                                          <input type="text" name="note" class="form-control" placeholder="NOTE-000038">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Location</label>
                                       <div class="col-md-9 cols-space">
                                          <select class="form-control droupdown" name="location">
                                            <option value="" selected="selected" disabled="disabled">Select</option>
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
                                       <div class="col-md-9 cols-space">
                                          <select class="form-control droupdown" name="communication">
                                            <option value="" selected="selected" disabled="disabled">Select</option>
                                            <option value="collateral">Collateral</option>
                                            <option value="in-person">In-Person</option>
                                            <option value="phone">Phone</option>
                                            <option value="telehealth">Telehealth</option>
                                         </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Service Plan #</label>
                                       <div class="col-md-9 cols-space">
                                          <input type="text" name="servicesdate" class="form-control" placeholder="">
                                          <a href="#myModal" data-toggle="modal" class="add-more-services common-button-addmore"><i class="fa fa-cogs"></i>View All Service Plans</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="modal fade view-all-authorizations" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                           <div class="modal-dialog" id="dialog-box">
	                              <div class="modal-content">
	                                <div class="modal-header modal-header-blank">
	                                  <div class="delete-section new-delete-add popup-close" data-dismiss="modal"><i class="fa fa-close delete-button delete"></i></div>
	                                </div>
	                                <div class="modal-body" id="table-body">
	                                	<div class="auth-tabel-scroll">
	                                		<table class="authorizations-table-modal">
		                                       <tr>
                                                <th>SP#</th>
		                                          <th>SERVICE NAME</th>
                                                <th>AUTH #</th>
		                                          <th>INTAN</th>
		                                          <th>INSAN</th>
		                                          <th>START DATE</th>
		                                          <th>END DATE</th>
		                                       </tr>
		                                       <tr class="modal-authorization-tr" data-dismiss="modal">
                                                <td>SP-000138</td>
		                                          <td>Psychiatric Diagnostic Evaluation with Med Service</td>
                                                <td>AUTH-000139</td>
		                                          <td>INTAN-000002</td>
		                                          <td>201410000000037</td>
		                                          <td>03/01/2020</td>
		                                          <td>11/01/2020</td>
		                                       </tr>
		                                       <tr class="modal-authorization-tr" data-dismiss="modal">
                                                <td>SP-000123</td>
		                                          <td>Crisis Stabilization</td>
                                                <td>AUTH-000140</td>
		                                          <td>INTAN-000003</td>
		                                          <td></td>
		                                          <td>06/22/2020</td>
		                                          <td>12/22/2020</td>
		                                       </tr>
		                                    </table>
	                                	</div>	                                    
	                                </div>
	                                <div class="modal-footer" id="btn-save-cancle">
	                                	<button class="btn btn-info" data-dismiss="modal">Save</button>
	                                	<button class="btn btn-default float-right" data-dismiss="modal">Cancel</button>
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
                                          <label class="col-md-5 col-form-label assigned-label">Priority</label>
                                          <div class="col-md-7">
                                             <select class="form-control active-status apprroved" name="priority">
                                                <option value="In Crisis">In Crisis</option>
                                                <option value="Not In Crisis">Not In Crisis</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">State</label>
                                          <div class="col-md-7">
                                             <select class="form-control active-status apprroved" name="state">
                                                <option value="Open">Open</option>
                                                <option value="Fixed">Fixed</option>
                                                <option value="Completed">Completed</option>
                                                <option value="In-Progress" selected="selected">In-Progress</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Assignee</label>
                                          <div class="col-md-7">
                                             <select class="form-control active-status apprroved" name="assignee">
                                                <option value="">Gregory-Harris</option>
                                                <option value="">Name 1</option>
                                                <option value="">Name 2</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Spent Time</label>
                                          <div class="col-md-7">
                                             <input type="text" name="spent-time" class="form-control without-background date-add" id="spent-time-add" placeholder="?">
                                          </div>
                                       </div>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="authorization-after-add" id="authorizations-after-select">
                  	<div class="container-fluid">
                  		<div class="row">
                  			<div class="col-md-8">
                  				<h4 class="auth-title">Authorization</h4>
                  				<div class="form-group row">
                  					<label class="col-md-2 col-form-label auth-lable">Service Name</label>
                                   	<div class="col-md-10">
                                      <label class="col-form-label">Psychiatric Diagnostic Evaluation with Med Service</label>
                                   </div>
                  				</div>
                  				<div class="row">
                  					<div class="col-md-6">
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label auth-lable">AUTH #</label>
                                          <div class="col-md-8">
                                            <label class="col-form-label">AUTH-000139</label>
                                         </div>
                                    </div>
                  						<div class="form-group row">
		                  					<label class="col-md-4 col-form-label auth-lable">INTAN</label>
		                                   	<div class="col-md-8">
		                                      <label class="col-form-label">INTAN-000002</label>
		                                   </div>
		                  				</div>
		                  				<div class="form-group row">
		                  					<label class="col-md-4 col-form-label auth-lable">Start Date</label>
		                                   	<div class="col-md-8">
		                                      <label class="col-form-label">03/01/2020</label>
		                                   </div>
		                  				</div>		                  				
                  					</div>
                  					<div class="col-md-6">
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label auth-lable">Status</label>
                                          <div class="col-md-8">
                                            <label class="col-form-label">Approved</label>
                                         </div>
                                    </div>
                  						<div class="form-group row">
		                  					<label class="col-md-4 col-form-label auth-lable">INSAN</label>
		                                   	<div class="col-md-8">
		                                      <label class="col-form-label">201410000000037</label>
		                                   </div>
		                  				</div>
		                  				<div class="form-group row">
		                  					<label class="col-md-4 col-form-label auth-lable">End Date</label>
		                                   	<div class="col-md-8">
		                                      <label class="col-form-label">11/01/2020</label>
		                                   </div>
		                  				</div>
                  					</div>
                  				</div>
                  			</div>
                  			<div class="col-md-4"></div>
                  		</div>
                  	</div>
                  </section>
                  <section class="section-max-unit goals-section" id="gols-new">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-8 cols-space-add">
                              <span class="gols-details-title">Goal</span>
                              <div class="form-group row">
                                 <div class="col-md-12 common-text-box add-new-goals">
                                    <textarea class="form-control" name="add-goal" rows="4"></textarea>
                                 </div>
                                 <div class="col-md-12 common-text-box add-new-consumers">
                                    
                                 </div>
                                 <a href="#myModal-101" data-toggle="modal" class="add-more-goals common-button-addmore"><i class="fa fa-bullseye goals-icons common-icons" aria-hidden="true"></i>Manage Goals</a>
                                 <button class="add-more-consumers common-button-addmore" id="more-consumers"><i class="fa fa-users more-consumer-icons common-icons" aria-hidden="true"></i>Assign More Consumers<i class="fa fa-caret-down consumer-down"></i></button>
                              </div>
                              <div class="modal fade view-all-authorizations in" id="myModal-101" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="">
                                 <div class="modal-dialog manage-goal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h4 class="manage-goals">Manage Goals</h4>
                                       <div class="delete-section new-delete-add consumer-delete" data-dismiss="modal"><i class="fa fa-close delete-button delete"></i></div>
                                      </div>
                                      <div class="modal-body modal-body-part">
                                       <div class="form-group add-new-part-space">
                                          <button class="btn btn-info btn-add-goal">Add New Goal</button>                                                                           
                                       </div>
                                       <div class="goal-add-details">
                                          <div class="form-group">
                                             <textarea name="add-goal" class="form-control" rows="3" placeholder="Specify Goal"></textarea>
                                          </div> 
                                          <div class="form-group">
                                             <button type="button" class="btn btn-info edit-btn-goal btn-goal-save">Save</button>
                                             <button class="btn btn-default float-right edit-btn-goal">Cancel</button>
                                          </div>
                                       </div>
                                       <div class="goal-edit-details">
                                          <div class="form-group">
                                             <textarea class="form-control" name="add-new-goal" rows="3" placeholder="Specify Goal"></textarea>                                                                           
                                          </div> 
                                          <div class="form-group">
                                             <button class="btn btn-info edit-btn-goal">Save</button>
                                             <button class="btn btn-default float-right edit-btn-goal">Cancel</button>
                                          </div>
                                       </div>                                    
                                       <div class="goals-box-manage">
                                          <div class="goals-manage">
                                             <input type="checkbox" name="" class="checkbox-goal">
                                             <h5>GOALS</h5>
                                          </div>
                                          <div class="goals-manage">
                                             <input type="checkbox" name="" class="checkbox-goal">
                                             <p class="goal-text-add">03.03.21 Anthony will improve symptom management for his diagnosis Schizophrenia and Major Depressive Disorder 5 out of 7 days over the next 6 months. Anthony will identify triggers to better control and manage mental health symptoms 3 out of 5 days over the next 30 days.</p>
                                             <button class="btn-goal-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                          </div>
                                          <div class="goals-manage">
                                             <input type="checkbox" name="" class="checkbox-goal">
                                             <p class="goal-text-add">03.03.21 La'Willie will learn and utilize coping skills to maintain stability of symptom management in the community and in the home 4out of 5 days over the next 30 days.</p>
                                             <button class="btn-goal-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                          </div>
                                           <div class="goals-manage">
                                             <input type="checkbox" name="" class="checkbox-goal">
                                             <p class="goal-text-add">03.03.21 La?Willie will be assisted with developing his goals, objectives, and strategies for the Comprehensive Individualized Service Plan, for the next 30 days.</p>
                                             <button class="btn-goal-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                          </div>
                                           <div class="goals-manage">
                                             <input type="checkbox" name="" class="checkbox-goal">
                                             <p class="goal-text-add">03.03.21 Benjamin will demonstrate overall improvement with his mental health symptoms by improving his ability to cope with his depression and anxiety at least 3 out of 5 days per week. Benjamin will also refrain from the use of substances at least 5 out of 5 days per week. 03.03.21 La?Willie will be assisted with developing his goals, objectives, and strategies for the Comprehensive Individualized Service Plan, for the next 30 days. 03.03.21 La'Willie will learn and utilize coping skills to maintain stability of symptom management in the community and in the home 4out of 5 days over the next 30 days.</p>
                                             <button class="btn-goal-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                          </div>   
                                          <div class="goals-manage-add"></div>                                    
                                       </div>                              
                                      </div>
                                      <div class="modal-footer">
                                          <button class="btn btn-info" data-dismiss="modal">Save</button>
                                          <button class="btn btn-default float-right" data-dismiss="modal">Cancel</button>
                                      </div>
                                    </div>
                                 </div>
                              </div>
                              <span class="gols-details-title">Objectives</span>
                              <div class="form-group row">
                                 <div class="col-md-12 common-text-box">
                                    <textarea class="form-control" name="intervention" placeholder="Type or Copy Paste" rows="4"></textarea>
                                 </div>
                              </div>
                              <span class="gols-details-title">Intervention</span>
                              <div class="form-group row">
                                 <div class="col-md-12 common-text-box">
                                    <textarea class="form-control" name="intervention" placeholder="Type or Copy Paste" rows="4"></textarea>
                                    <span class="textarea-title">Matching Words (%):</span>
                                 </div>
                              </div>
                              <span class="max-unit-title">Response</span>
                              <div class="form-group row">
                                 <label class="col-md-1 col-form-label common-label-size">Status</label>
                                 <div class="col-md-11 common-text-box">
                                    <select class="form-control status-new-add" name="status">
                                       <option>Improving</option>
                                       <option>Select Goals 1</option>
                                       <option>Select Goals 2</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-md-12 common-text-box">
                                    <textarea class="form-control" rows="4" name="matching-word" placeholder="Type or Copy Paste"></textarea>
                                    <span class="textarea-title">Matching Words (%):</span>
                                 </div>
                              </div>
                              <span class="max-unit-title">Addtional Notes</span>
                              <div class="form-group row">
                                 <div class="col-md-12 common-text-box">
                                    <textarea class="form-control" rows="4" name="addtional-notes" placeholder="Type or Copy Paste"></textarea>
                                 </div>
                              </div>
                              <div class="form-group row common-row-add">
                                 <div class="col-md-6">
                                    <label class="attach-file-lbl">Attach Files</label>
                                    <div class="file-upload-multiple">
                                       <label class="lbl-multiple-files">Select Multiple Files</label>
                                       <input type="file" name="attach-file" class="form-control multiple-image-upload" id="file-upload" multiple="">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div id="uploadPreview"></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4"></div>
                        </div>
                     </div>
                  </section>
                  <div class="modal add-spent-time-popup fade" id="myModal-01" role="dialog">
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
                           <a href="#myModal-01" class="spent-time common-button space-remove-btn" data-toggle="modal"><i class="fa fa-hourglass common-icons"></i>Add Spent Time</a>   
                        </div>
                     </div>
                  </section>
               </div>
            </form>
 
   
   

@endsection
@section('script2')
<script src="https://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js"></script>
<script type="text/javascript" src="js/moment.min.js"></script>
<script type="text/javascript" src="js/angular.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
   $('.nav-tabs').on('click', 'li', function() {
     $('.nav-tabs li.active-tabs').removeClass('active-tabs');
     $(this).addClass('active-tabs');
   });

   $('.nav-sidebar').on('click', 'li', function() {
     $('.nav-sidebar li.active-menu').removeClass('active-menu');
     $(this).addClass('active-menu');
   });

   $(document).ready(function() {
       $('.start-date').datepicker({ format: "mm/dd/yyyy" });
   });
   $(document).ready(function() {
       $('.end-date').datepicker({ format: "mm/dd/yyyy" });
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
   $("#start-time").timepicker();
   $("#end-time").timepicker();

   $('.modal-authorization-tr').click(function(){
	  $('#authorizations-after-select').slideDown();
	});

	// $('.modal-authorization-tr').click(function(){
	//   $('.goals-section').css("opacity","1");
	//   $('.goals-section').css("pointer-events","unset");
	// });


</script>


<script type="text/javascript">
$(function() {
  $("form[name='consumer-notes-form']").validate({
    rules: {
      consumername: "required",
      payername: "required"
    },
    messages: {
      consumername: "Please enter your Consumer Name",
      payername: "Please enter your Payer Name"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});

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

$('.modal-authorization-tr').click(function(){
   $('.goals-section').css("opacity","1");
   $('.goals-section').css("pointer-events","unset");
});
$('.modal-authorization-tr').click(function(){
   $('.authorization-after-add').slideDown();
});

$('.btn-goal-edit').click(function(){
   $('.goal-edit-details').slideDown();
});
$('.edit-btn-goal').click(function(){
   $('.goal-edit-details').slideUp();
});
$('.btn-add-goal').click(function(){
   $('.goal-add-details').slideDown();
});
$('.edit-btn-goal').click(function(){
   $('.goal-add-details').slideUp();
});

// AJAX Form Submit data for listing.
$(document).ready(function(){
   $('.btn-goal-save').click(function(){
      var datastring=$("#form-consumer").serialize();
      $.ajax({
         type:"POST",
         url:"https://httpbin.org/post",
         data:datastring,
         dataType:"json",
         success:function(data){
         var obj=JSON.stringify(data);
            $('.goals-manage-add').append('<div class="goals-manage"> <input type="checkbox" name="" class="checkbox-goal"><p class="goal-text-add">'+data['form']['add-goal']+'</p> <button class="btn-goal-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></div>');
         },
         error:function(){
            $('.goals-manage-add').append('error handing here');
         }
      });
   });
});
</script>




@endsection
