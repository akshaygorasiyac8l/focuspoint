@extends('layouts.app')
@section('script1')
      <link rel="stylesheet" href="css/jquery-ui.css">

      <link rel="stylesheet" type="text/css" href="css/jquery-ui-timepicker-addon.css">
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script src="js/jquery-ui.js"></script>
      <script type="text/javascript" src="js/app.js"></script>
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
                              <div class="form-group ban-btn-sec">
                                 <a class="btn-ban" id="ban-add">Ban</a>
                                 <a class="btn-ban unban" id="unban-add">Unban</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="content" id="employee-details">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-8 consumer-section">
                              <div class="card card-primary">
                                 <div class="card-body">                                    
                                    
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Employee Name</label>
                                       <label class="col-md-9 col-form-label-assessment">Koffyee Alexis</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Gender</label>
                                       <label class="col-md-9 col-form-label-assessment">Female</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Date of Birth</label>
                                       <label class="col-md-9 col-form-label-assessment">01/01/1983</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Email Address</label>
                                       <label class="col-md-9 col-form-label-assessment">kalexis@focuspoint-mh.com</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Phone</label>
                                       <label class="col-md-9 col-form-label-assessment">+1-789-678-1234</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label"></label>
                                       <label class="col-md-9 col-form-label-assessment">+1-789-678-1234</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Role</label>
                                       <label class="col-md-9 col-form-label-assessment">Administrator</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Supervisor</label>
                                       <label class="col-md-9 col-form-label-assessment">Angela Williams</label>
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
                            <a class="nav-link tabs active" id="custom-content-below-home-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-home" aria-selected="false" onclick="openTabs(event, 'services-employee')">Services</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-home-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-home" aria-selected="false" onclick="openTabs(event, 'login-employee')">Logins</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-profile-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-profile" aria-selected="false" onclick="openTabs(event, 'address-employee')">Address</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-messages-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-messages" aria-selected="false" onclick="openTabs(event, 'other-details-employee')">Other Details</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-settings-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'contact-person-employee')">Contact Persons</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-settings-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'certification-employee')">Certifications</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link tabs" id="custom-content-below-settings-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'document-employee')">Documents</a>
                          </li>
                        </ul>
                     </div>
                  </section>
                  <section class="contentsection" id="services-employee">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                              <label class="emp-label-details">90785 : </label>
                              <label class="emp-label-details">Interactive Complexity Add-On</label>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <label class="emp-label-details">H0032 : </label>
                              <label class="emp-label-details">Mental Health Assessment</label>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <label class="emp-label-details">H0036 : </label>
                              <label class="emp-label-details">Crisis Intervention</label>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="contentsection" id="login-employee"></section>
                  <section class="contentsection" id="address-employee"></section>
                  <section class="contentsection" id="other-details-employee"></section>
                  <section class="contentsection" id="contact-person-employee"></section>
                  <section class="contentsection" id="certification-employee"></section>
                  <section class="contentsection" id="document-employee"></section>
               </div>
            </form>
         </div>

   

@endsection
@section('script2')
<script src="https://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript">
   $('.nav-sidebar').on('click', 'li', function() {
     $('.nav-sidebar li.active-menu').removeClass('active-menu');
     $(this).addClass('active-menu');
   });
</script>
<script type="text/javascript">
   $(document).ready(function() {
       $('.date-select').datepicker({ format: "mm/dd/yyyy" });
   }); 
   $(document).ready(function() {
       $('.diagnosis-date').datepicker({ format: "mm/dd/yyyy" });
   }); 
   $(document).ready(function() {
       $('.date-type').datepicker({ format: "mm/dd/yyyy" });
   }); 

   $("#spent-time-add").timepicker();

   // Attch File Count JS
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

// Hide show button
$('#ban-add').click(function(){
   $('#ban-add').hide();
   $('#unban-add').show();
});
$('#unban-add').click(function(){
   $('#unban-add').hide();
   $('#ban-add').show();
});
</script>


@endsection
