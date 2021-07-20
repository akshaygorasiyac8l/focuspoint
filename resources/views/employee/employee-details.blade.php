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
                              <h1 class="page-title">{{$employee->fname}} {{$employee->lname}}</h1>
                           </div>
                           <div class="col-md-6 new-attach-sec">
                              <!--
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
                             -->
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
                                 
                                    <a href="{{route('employee-edit',$employee->id)}}" class="btn-edit-print"><i class="fa fa-pencil common-edit-btn"></i>Edit</a>
                                 </div>
                                 <div class="mail">
                                    <button type="button" class="btn-edit-print empprint"><i class="fa fa-envelope common-edit-btn"></i>Mail</button>
                                 </div>
                                 <div class="pdf">
                                    <a target="blank" href="{{ url('employee-pdf') }}/{{$employee->id}}" class="btn-edit-print emppdf"><i class="fa fa-file-text common-edit-btn" aria-hidden="true"></i>PDF/Print</a>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group ban-btn-sec">
                              
                                 
                                     <a class="btn-ban userforban " data="{{$employee->id}}" id="unban-add">Reactivate</a>
                                 
                                 
                                    <a class="btn-ban userforban" data="{{$employee->id}}" id="ban-add">Suspend</a>
                                 
                              </div>
                           </div>
                           <div class="col-md-12" style="margin-top:10px;">
                              <div class="messages"></div>
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
                                       <label class="col-md-9 col-form-label-assessment">{{$employee->salutation}} {{$employee->fname}} {{$employee->lname}}</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Gender</label>
                                       <label class="col-md-9 col-form-label-assessment">{{$employee->gender}}</label>
                                    </div>
                                    
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Email Address</label>
                                       <label class="col-md-9 col-form-label-assessment">{{$employee->email}}</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Phone</label>
                                       <label class="col-md-9 col-form-label-assessment">{{$employee->phone}}</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label"></label>
                                       <label class="col-md-9 col-form-label-assessment"></label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Role</label>
                                       <label class="col-md-9 col-form-label-assessment">
                                       @inject('provider', 'App\Http\Controllers\GeneralController') 
                                        {{  $provider::getRoleById($employee->role_id) }}
                                       
                                       </label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Program Supervisor</label>
                                       <label class="col-md-9 col-form-label-assessment">{{$employee->supervisor_name}}</label>
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
                           @for($ij=0; $ij<count($employee->serviceData);$ij++)
                              
                                 <div class="col-md-4">
                                    
                                    <label class="emp-label-details">{{$employee->serviceData[$ij]}}</label>
                                 </div>
                              
                           @endfor
                        </div> 
                     </div>
                  </section>
                  <section class="contentsection" id="login-employee">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                              <label class="emp-label-details">Login : </label>
                              <label class="emp-label-details">{{$employee->login}}</label>
                           </div>
                           
                        </div>
                        
                     </div>
                  </section>
                  <section class="contentsection" id="address-employee">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                              <label class="emp-label-details">Address : </label>
                              <label class="emp-label-details">{{$employee->address}} {{$employee->address_1}}</label>
                           </div>
                           <div class="col-md-12">
                              <label class="emp-label-details">City : </label>
                              <label class="emp-label-details">{{$employee->city}} </label>
                           </div>
                           <div class="col-md-12">
                              <label class="emp-label-details">State : </label>
                              <label class="emp-label-details">{{$employee->state}} </label>
                           </div>
                           <div class="col-md-12">
                              <label class="emp-label-details">Country : </label>
                              <label class="emp-label-details">{{$employee->country}} </label>
                           </div>
                           <div class="col-md-12">
                              <label class="emp-label-details">Zipcode : </label>
                              <label class="emp-label-details">{{$employee->zipcode}} </label>
                           </div>
                        </div>
                        
                     </div>
                  </section> 
                  <section class="contentsection" id="other-details-employee">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                              <label class="emp-label-details">Date of Birth : </label>
                              <label class="emp-label-details">{{$employee->bod}} </label>
                           </div>
                           <div class="col-md-12">
                              <label class="emp-label-details">SSN : </label>
                              <label class="emp-label-details">{{$employee->ssn}} </label>
                           </div>
                           <div class="col-md-12">
                              <label class="emp-label-details">Hire Date : </label>
                              <label class="emp-label-details">{{$employee->hire_date}} </label>
                           </div>
                           <div class="col-md-12">
                              <label class="emp-label-details">Termination Date : </label>
                              <label class="emp-label-details">{{$employee->termination_date}} </label>
                           </div>
                           <div class="col-md-12">
                              <label class="emp-label-details">Qualification : </label>
                              <label class="emp-label-details">
                              
                              <?php 
                              $datasall = $employee->qualificationData; 
                              for($ij=0; $ij<count($datasall);$ij++){
                                  
                              ?>
                              <div class="col-md-4">
                                    
                                    <label class="emp-label-details"><?php echo $datasall[$ij]->qualification; ?></label>
                                 </div>
                              <?php 
                              }
                              ?>
                             
                              
                                 
                              
                            
                              
                              
                              </label>
                           </div>
                           <div class="col-md-12">
                              <label class="emp-label-details">NPI # : </label>
                              <label class="emp-label-details">{{$employee->npi}} </label>
                           </div>
                           <div class="col-md-12">
                              <label class="emp-label-details">Taxonomy # : </label>
                              <label class="emp-label-details">{{$employee->taxonomy}} </label>
                           </div>
                           <div class="col-md-12">
                              <label class="emp-label-details">Background Check : </label>
                              <label class="emp-label-details">{{$employee->back_check}} </label>
                           </div>
                           <div class="col-md-12">
                              <label class="emp-label-details">Last TB Shot : </label>
                              <label class="emp-label-details"> {{$employee->last_tb_shot}}</label>
                           </div>
                           <div class="col-md-12">
                              <label class="emp-label-details">DL # : </label>
                              <label class="emp-label-details">{{$employee->dl}} </label>
                           </div>
                           <div class="col-md-12">
                              <label class="emp-label-details">DL Expiration : </label>
                              <label class="emp-label-details">{{$employee->dl_expiration}} </label>
                           </div>
                           <div class="col-md-12">
                              <label class="emp-label-details">DL State : </label>
                              <label class="emp-label-details">{{$employee->dl_state}} </label>
                           </div>
                        </div>
                        
                     </div>
                  </section>
                  <section class="contentsection" id="contact-person-employee">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                           
                           @if(count($persons) > 0 )
                                
                              <table class="table">
                                 <tr>
                                    
                                    <th>Name</th>
                                    <th>Relationship</th>
                                    <th>Phone</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    
                                 </tr>
                                 @for($i=0;$i<count($persons);$i++)
                                 <tr>
                                    
                                    <td>{{$persons[$i]['salutation']}} {{$persons[$i]['fname']}} {{$persons[$i]['lname']}}</td>
                                    <td>{{$persons[$i]['relation']}}</td>
                                    <td>{{$persons[$i]['phone']}}</td>
                                    <td>{{$persons[$i]['mobile']}}</td>
                                    <td>{{$persons[$i]['email']}}</td>
                                    
                                 </tr>
                                 @endfor

                              </table>
                              @endif
                           </div>

                        </div>
                        
                     </div>
                  </section>
                  <section class="contentsection" id="certification-employee">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12">
                          
                           @if(count($certifications) > 0 )
                                
                              <table class="table">
                                 <tr>
                                    
                                    <th>Certfication Type</th>
                                    <th>Received Date</th>
                                    <th>Expiry Date</th>
                                    
                                 </tr>
                                 @for($j=0;$j<count($certifications);$j++)
                                 <tr>
                                    
                                    <td>{{$certifications[$j]['certification_type_id']}}</td>
                                    <td>{{$certifications[$j]['receive_date']}}</td>
                                    <td>{{$certifications[$j]['expiry_date']}}</td>
                                    
                                 </tr>
                                 @endfor

                              </table>
                              @endif
                           </div>

                        </div>
                        
                     </div>
                  </section>
                  <section class="contentsection" id="document-employee">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12">
                          <div id="uploadPreview" class="employee-image image-details">
                             @foreach($documents as $document)
                                <?php
                                   $varpath = 'public/files/'.$document->document;
                                ?>
                                @if(file_exists($varpath)) 
                                  <div class="image-section"><div class="row image-preview-row"><i class="fa fa-paperclip attach-icon-add" aria-hidden="true"></i><div class="image-show-name"><p class="file-name-image"><a target="blank" href="{{url('/public')}}/files/{{$document->document}}">{{$document->document}}</a></p></div></div></div>

                                @else
                                  
                                @endif
                                
                                      
                             @endforeach
                             

                          </div>
                          
                       </div>
                      </div>
                    </div>
                     
                  </section>
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


<script>
$(document).ready(function() {
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('#csrf_token').val()
          }
        });
        
        $('html').on('click', '.empprint', function (e) {
            
            
            var url = "{{ url('employee-mail') }}/{{$employee->id}}";
            var empId = '{{$employee->id}}';
            $.ajax({
                url: url,
                type: "POST",
                data: {id: empId},
                success: function (data) {
                          console.log(data);
                          if(data.class='success'){
                              window.location.href= "{{ url('employee-listing') }}";
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
        
         @if ($employee->status  == '3')
            $('#unban-add').show();
            $('#ban-add').hide();
         @else
            $('#ban-add').show();
            $('#unban-add').hide();
         @endif

        $('html').on('click', '.userforban', function (e) {
            var url = "{{ url('employee-ban') }}/{{$employee->id}}";
            var empId = '{{$employee->id}}';
            $.ajax({
                url: url,
                type: "POST",
                data: {id: empId},
                success: function (data) {
                          if(data.show=='3'){
                              $('#unban-add').show();
                              $('#ban-add').hide();
                          }else{
                              $('#ban-add').show();
                              $('#unban-add').hide();
                          }
                          displayMessage(data.class,data.message);
                          

                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        
        /*
        $('html').on('click', '.emppdf', function (e) {
            
            
            var url = "{{ url('employee-pdf') }}/{{$employee->id}}";
            var empId = '{{$employee->id}}';
            $.ajax({
                url: url,
                type: "POST",
                data: {id: empId},
                success: function (data) {
                          //console.log(data);
                          
                          var blob = new Blob([data], { type: "application/octetstream" });
                          var fileName = "Employee.pdf";
                          //Check the Browser type and download the File.
                          var isIE = false || !!document.documentMode;
                          if (isIE) {
                              window.navigator.msSaveBlob(blob, fileName);
                          } else {
                              var url = window.URL || window.webkitURL;
                              link = url.createObjectURL(blob);
                              var a = $("<a />");
                              a.attr("download", fileName);
                              a.attr("href", link);
                              $("body").append(a);
                              a[0].click();
                              $("body").remove(a);
                          }
                          

                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
            
        });
        */
        function displayMessage(classname,message){
            var messages = $('.messages');
            var successHtml = '<div class="alert alert-'+ classname +' alert-block">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+ message +
            '</div>';

            $(messages).html(successHtml);
            setTimeout(function() {
                $('.alert-block').fadeOut('slow');
            }, 4000);
        }
        
        
});

</script>

@endsection
