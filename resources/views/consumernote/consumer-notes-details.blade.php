@extends('layouts.app')
@section('script1')
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="css/select.dataTables.min.css">
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script src="js/jquery-ui.js"></script>
      <script type="text/javascript" src="js/app.js"></script>
      <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/dataTables.select.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
@endsection
@section('content')
	@section('header')
		@parent
	@endsection

	@section('sidebar')
		@parent
	@endsection 
    
         <div class="content-wrapper">
            <div class="background-transperent">
               <section class="content-header">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-6 page-background">
                           <h1 class="page-title">NOTE-000038</h1>
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
                        <div class="col-md-12">
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
                     </div>
                  </div>
               </section>
               <section class="content">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-8 consumer-section">
                           <div class="card card-primary">
                              <div class="card-body">                                    
                                 <div class="form-group row common-row">
                                    <label class="col-md-12 col-form-label title-details">P.I.E. Documentation</label>
                                 </div>
                                 <div class="form-group row common-row">
                                    <label class="col-md-3 col-form-label-assessment common-title-label">Consumer Name</label>
                                    <label class="col-md-9 col-form-label-assessment name-bold">Christopher Hua</label>
                                 </div>
                                 <div class="form-group row common-row">
                                    <label class="col-md-3 col-form-label-assessment common-title-label">Payer Name</label>
                                    <label class="col-md-9 col-form-label-assessment">VA Premiere Eliite</label>
                                 </div>
                                 <div class="form-group row common-row">
                                    <label class="col-md-3 col-form-label-assessment common-title-label">Location</label>
                                    <label class="col-md-9 col-form-label-assessment">Home</label>
                                 </div>
                                 <div class="form-group row common-row">
                                    <label class="col-md-3 col-form-label-assessment common-title-label">Communication</label>
                                    <label class="col-md-9 col-form-label-assessment">Face To Face</label>
                                 </div>
                                 <div class="form-group row common-row">
                                    <label class="col-md-3 col-form-label-assessment common-title-label">Service Date</label>
                                    <label class="col-md-9 col-form-label-assessment">09/15/2020</label>
                                 </div>
                              </div>
                           </div>
                           <div class="authorizations-sec">
                              <h4 class="auth-title">Authorization</h4>
                              <div class="form-group row common-row">
                                 <label for="" class="col-md-2 col-form-label auth-lable">Service Name</label>
                                    <div class="col-md-10">
                                      <label for="" class="col-form-label common-label-size">Psychiatric Diagnostic Evaluation with Med Service</label>
                                   </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row common-row">
                                       <label for="" class="col-md-4 col-form-label auth-lable">INTAN</label>
                                          <div class="col-md-8">
                                            <label for="" class="col-form-label common-label-size">INTAN-000002</label>
                                         </div>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label for="" class="col-md-4 col-form-label auth-lable">Start Date</label>
                                          <div class="col-md-8">
                                            <label for="" class="col-form-label common-label-size">03/01/2020</label>
                                         </div>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label for="" class="col-md-4 col-form-label auth-lable">Status</label>
                                          <div class="col-md-8">
                                            <label for="" class="col-form-label common-label-size">Approved</label>
                                         </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row common-row">
                                       <label for="" class="col-md-4 col-form-label auth-lable">INSAN</label>
                                          <div class="col-md-8">
                                            <label for="" class="col-form-label common-label-size">201410000000037</label>
                                         </div>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label for="" class="col-md-4 col-form-label auth-lable">End Date</label>
                                          <div class="col-md-8">
                                            <label for="" class="col-form-label common-label-size">11/01/2020</label>
                                         </div>
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
                                          <input type="text" name="record" class="form-control date-select without-background" placeholder="1234CH">
                                       </div>
                                    </div>
                                    <div class="form-group row tool-box">
                                       <label for="inputPassword3" class="col-md-5 col-form-label assigned-label">Priority</label>
                                       <div class="col-md-7">
                                          <select class="form-control active-status apprroved" name="priority">
                                             <option value="">Select In Crisis</option>
                                             <option value="">In Crisis 1</option>
                                             <option value="">In Crisis 2</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row tool-box">
                                       <label for="inputPassword3" class="col-md-5 col-form-label assigned-label">State</label>
                                       <div class="col-md-7">
                                          <select class="form-control active-status apprroved" name="place">
                                             <option value="">Open</option>
                                             <option value="">In-Progress</option>
                                             <option value="">Pending</option>
                                             <option value="">Completed</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row tool-box">
                                       <label for="inputPassword3" class="col-md-5 col-form-label assigned-label">Assignee</label>
                                       <div class="col-md-7">
                                         <select class="form-control active-status apprroved" name="assignee">
                                             <option value="">Gregory-Harris</option>
                                             <option value="">Gregory-Harris 1</option>
                                             <option value="">Gregory-Harris 2</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row tool-box">
                                       <label for="inputPassword3" class="col-md-5 col-form-label assigned-label">Spent Time</label>
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
               <section class="section-goals" id="goals-add">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-8 cols-space-add">
                           <span class="gols-details-title">Goal & Details</span>
                           <div class="form-group row">
                              <div class="col-md-12">
                                 <p class="common-pre-text">Christopher will work on learning and implementing alternative coping mechanisms for responses to his anger at least twice a month over the next year.</p>
                                 <p class="common-pre-text">01/05/2020: "I want to stop talking back and control my anger". Christopher will reduce explosive anger episodes and odel healthy emotional regulation and conflict resolution 4 out of 7 days over the next 6 months.</p>
                              </div>
                           </div>
                           <span class="gols-details-title">Intervention</span>
                           <div class="form-group row">
                              <div class="col-md-12">
                                 <p class="common-pre-text">
                                    QMHP greeted Christopher?s mother asked how is she feeling today? QMHP asked parent is there any issues she needs to discuss with QMHP? QMHP discussed with parent her response. QMHP greeted Christopher and engaged him in conversation about his feelings about completing school assignments. QMHP discussed with Christopher that his mother is attempting to keep him on schedule with his assignments. QMHP processed with Christopher if he had extra time at school, he would complete his homework then. QMHP processed with Christopher being at home can be the same., when he has extra time complete h homework. QMHP discussed with Christopher that is the same thing his teachers would have told him. QMHP discussed with Christopher his mother is not asking him to anything he wouldn?t have
                                    done at school.
                                 </p>
                                 <span class="invitation-title">Matching Words (%):95%</span>
                              </div>
                           </div>
                           <span class="max-unit-title">Response</span>
                           <div class="form-group row">
                              <label class="col-md-1 col-form-label common-label-size">Status</label>
                              <div class="col-md-11">
                                 <label  class="col-form-label common-label-size">Improving</label>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-md-12">
                                 <p class="common-pre-text">
                                    Christopher?s mother said she is feeling great. Parent reported to QMHP she told Christopher to continue working on his assignments until QMHP arrived. Parent reported Christopher told her he completed his assignments except his homework. Parent told QMHP she told Christopher to complete all of his assignments including his homework. Parent told QMHP she considers homework as part of his assignments. Parent reported Christopher continue working until QMHP arrived. Christopher greeted QMHP and begin to tell QMHP his mother told him to complete his assignments. Christopher said he told her he completed everything except his homework and will do it later. Christopher said he didn?t understand why his mother appeared upset with him.
                                 </p>
                                 <span class="invitation-title">Matching Words (%):95%</span>
                              </div>
                           </div>
                           <span class="max-unit-title">Addtional Notes</span>
                           <div class="form-group row">
                              <div class="col-md-12">
                                 <p class="common-pre-text">
                                    Contact the Physcian for a few questions to be clarified. Make sure the payer info is updated.
                                 </p>
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
         </div>
 

@endsection
@section('script2')
<script src="https://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.js"></script>
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
</script>
<script type="text/javascript">
   $("#spent-time-add").timepicker();

   window.pressed = function(){
      var a = document.getElementById('attach-file');
      if(a.value == "")
      {
         fileLabel.innerHTML = "Please Upload File";
      }
      else
      {
         var theSplit = a.value.split('\\');
         fileLabel.innerHTML = theSplit[theSplit.length-1];
      }
   };
</script>
<script type="text/javascript">
( function( $, window, document, undefined )
{
   $( '.file-new-upload' ).each( function()
   {
      var $input   = $( this ),
      $label    = $input.next( 'label' ),
      labelVal = $label.html();

      $input.on( 'change', function( e )
      {
         var fileName = '';

         if( this.files && this.files.length > 0 )
            fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
         else if( e.target.value )
            fileName = e.target.value.split( '\\' ).pop();

         if( fileName )
            $label.find( '.archive-name').html( fileName );
         else
            $label.html( labelVal );
      });
   });
})( jQuery, window, document );

// Spent Time Add
$(document).ready(function() {
   $('.start-date').datepicker({ format: "mm/dd/yyyy" });
});
$(document).ready(function() {
   $('.end-date').datepicker({ format: "mm/dd/yyyy" });
});
$("#start-time").timepicker();
$("#end-time").timepicker(); 

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


@endsection
