@extends('layouts.app')
@section('script1')
@endsection
@section('add_layout')
   @parent
   
   <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.css') }}">

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
            <form id="form-consumer" action="" name="authorization-form-new">
               <div class="background-transperent">
                  <section class="content-header">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12 page-background">
                              <h1 class="page-title">{{$authorization->auth_no}}</h1>
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
                                       <label class="col-md-3 col-form-label">Consumer Name<span class="required-mark">*</span></label>
                                       <div class="col-md-9">
                                          <select class="form-control droupdown mobile-drop consumername" name="consumername">
                                            <option value="">Select Consumer</option>
                                            @foreach($consumers as $consumer)
                                            <option {{$authorization->consumer_id==$consumer->id ? "selected" : ""}}  value="{{$consumer->id}}">{{$consumer->fname}} {{$consumer->lname}}</option>
                                            @endforeach
                                         </select>
                                         <a href="#view_consumenr_details" data-toggle="modal" class="common-button-addmore  clickonviewconsumerdet"><i class="fa fa-user view-user"></i>View Consumer Details</a>
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
                                       
                                       </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Assessments</label>
                                       <div class="col-md-9  selectedAssessments">
                                          <select class="form-control droupdown assessment_id" name="assessment_id">

                                            <option value="">Select Assessment</option>
                                            
                                         </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Service<span class="required-mark">*</span></label>
                                       <div class="col-md-9 selectedServices">
                                          <select class="form-control droupdown services" name="type">

                                            <option value="">Select Service</option>
                                            @foreach($services as $service)
                                            <option value="{{$service->id}}">{{$service->title}}</option>
                                            @endforeach
                                         </select>
                                       </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Auth #</label>
                                       <div class="col-md-9">
                                          <input type="text" name="intan" disabled class="form-control authno"  value="{{$authorization->auth_no}}">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">INTAN</label>
                                       <div class="col-md-9">
                                          <input type="text" name="intan"  class="form-control intan"  value="{{$authorization->intan}}">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">INSAN</label>
                                       <div class="col-md-9">
                                          <input type="text" name="insan" class="form-control insan"  value="{{$authorization->insan}}">
                                       </div>
                                    </div>
                                    <!--
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Service</label>
                                       <div class="col-md-9">
                                          <select class="form-control droupdown services" name="type">

                                            <option value="">Select Service</option>
                                            @foreach($services as $service)
                                            <option {{$authorization->services==$service->id ? "selected" : ""}} value="{{$service->id}}">{{$service->title}}</option>
                                            @endforeach
                                         </select>
                                       </div>
                                    </div>
                                    -->
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 active-tool-box">
                              <div class="active-tool">
                                 <div class="card-body">
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Record #</label>
                                          <div class="col-md-7">
                                             <input type="text" name="record" class="form-control without-background record_no" value="{{$authorization->record_no}}">
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Approval Date</label>
                                          <div class="col-md-7">
                                             <input type="text" name="approval-date" class="form-control date-select without-background approval_date" value="{{$authorization->approve_date}}">
                                          </div>
                                       </div>

                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Expiry Date</label>
                                          <div class="col-md-7">
                                             <input type="text" name="expiry-date" class="form-control date-select without-background expiry_date" value="{{$authorization->expiry_date}}">
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">State</label>
                                          <div class="col-md-7">
                                             <select class="form-control active-status status" name="state">
                                                <option {{$authorization->status=='0' ? "selected" : ""}} value="0">Initial Authorization</option>
                                                <option {{$authorization->status=='1' ? "selected" : ""}} value="1">Open</option>
                                                <option {{$authorization->status=='2' ? "selected" : ""}} value="2">Fixed</option>
                                                <option {{$authorization->status=='3' ? "selected" : ""}} value="3">Completed</option>
                                                <option {{$authorization->status=='4' ? "selected" : ""}} value="4">In-Progress</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Assignee</label>
                                          <div class="col-md-7">
                                            <select class="form-control active-status assignee" name="assignee">
                                                
                                                <option value="0">Unassigned</option>
                                                @foreach($users  as $user)
                                                <option {{$user->id==$authorization->assignee ? "selected" : ""}} value="{{$user->id}}">{{$user->fname}} {{$user->lname}}</option>
                                                @endforeach
                                                
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Spent Time</label>
                                          <div class="col-md-7">
                                             <input disabled type="text" name="spent-time" class="form-control without-background spent_time" id="spent-time-add" value="{{$authorization->spent_time}}">
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Discharge Date</label>
                                          <div class="col-md-7">
                                             <input type="text" name="discharge-date" class="form-control date-select without-background date-add discharge_date" value="{{$authorization->discharge_date}}">
                                          </div>
                                       </div>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="section-max-unit">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-8 consumer-section" style="padding-top: 0;">
                              <div class="row">
                                 <div class="col-md-3">
                                    <span class="max-unit-title">Max Units</span>
                                 </div>
                                 <div class="col-md-9 cols-space-add">
                                    <div class="row">
                                       <div class="col-md-6 time-add">
                                          <div class="form-group">
                                             <label class="col-form-label">Per Week</label>
                                             <input type="text" name="per-week" class="form-control per_week" value="{{$authorization->unit_per_week}}">
                                          </div>   
                                       </div>
                                       <div class="col-md-6 time-add">
                                          <div class="form-group">
                                             <label class="col-form-label">Per Day</label>
                                             <input type="text" name="per-hour" class="form-control per_day" value="{{$authorization->unit_per_day}}">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-3">
                                    <span class="max-unit-title">Total Approved</span>
                                 </div>
                                 <div class="col-md-9 cols-space-add">
                                    <div class="row">
                                       <div class="col-md-4 time-add">
                                          <div class="form-group">
                                             <label class="col-form-label">Units/Visits</label>
                                             <input type="text" name="units" class="form-control  tot_units" value="{{$authorization->total_approved_units}}">
                                          </div>
                                       </div>
                                       <div class="col-md-4 time-add">
                                          <div class="form-group">
                                             <label class="col-form-label">Hours</label>
                                             <input type="text" name="hours" class="form-control tot_hours" value="{{$authorization->total_approved_hours}}">
                                          </div>
                                       </div>
                                       <div class="col-md-4 time-add">
                                          <div class="form-group">
                                             <label class="col-form-label">Bill Without Units</label>
                                             <select class="form-control bill_units" name="bill-units">
                                                <option {{$authorization->bill_without_unit=='1' ? "selected" : ""}} value="1">Yes</option>
                                                <option {{$authorization->bill_without_unit=='0' ? "selected" : ""}} value="0">No</option>
                                             </select>
                                          </div>
                                       </div>
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
                           <button type="button" class="btn btn-info saveauth">Save</button>
                           <a href="{{route('authorizations-listing')}}" class="btn btn-default float-right">Cancel</a>
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
    $(document).ready(function() {
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('#csrf_token').val()
          }
        });
        $('.date-spent').datepicker({ changeMonth: true,changeYear: true,dateFormat: "mm/dd/yy" });
        $(document).on('focus','.date-spent',function(){
           $('.date-spent').datepicker({
               changeMonth: true,changeYear: true,
               dateFormat: 'mm/dd/yy',
               autoclose: true,
               todayHighlight: true
           });
        });
               
        
        $('.approval_date,.expiry_date,.discharge_date').datepicker({ changeMonth: true,changeYear: true,dateFormat: "mm/dd/yy" });
        
        $(document).on('focus','.approval_date,.expiry_date,.discharge_date',function(){
           $('.approval_date,.expiry_date,.discharge_date').datepicker({
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
            $('.clickonviewconsumerdet').show();
            if(consumer_id==''){
               $('.clickonviewconsumerdet').hide();
            }
        }
        
        
        function getServiceOptions(assessment_id){
            $('.selectedServices').html('');
            var url = "{{ route('getservicesbyassessmentid') }}";
           
           $.ajax({
                url: url,
                type: "POST",
                data: {assessment_id:assessment_id},
                success: function (data) {
                     console.log(data);
                     if(data.success='1'){
                        var  htmlData = '<select class="form-control droupdown services" name="type">';

                             htmlData +='<option value="">Select Service</option>';
                             if(data.services.length> 0){
                                for(var i=0;i<data.services.length;i++){
                                    htmlData +='<option value="'+data.services[i].id+'">'+data.services[i].title+'</option>';
                                }
                             }else{
                             }
                             
                             
                                            
                             htmlData +='</select>';
                       
                        $('.selectedServices').html(htmlData);
                        
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
        $('html').on('change', '.assessment_id', function (e) {
           var assessment_id = $(this).val();
           getServiceOptions(assessment_id);
           
       });
       
       function getAssessmentOptions(){
           var consumer_id = $('.consumername').val();
           $('.selectedAssessments').html('');
           $('.selectedServices').html('<select class="form-control droupdown services" name="type"><option value="">Select Service</option></select>');
           var url = "{{ route('getassessmentsbyconsumerid') }}";
           
           $.ajax({
                url: url,
                type: "POST",
                data: {consumer_id:consumer_id},
                success: function (data) {
                     console.log(data);
                     if(data.success='1'){
                        var  htmlData = '<select class="form-control droupdown assessment_id" name="assessment_id">';

                             htmlData +='<option value="">Select Assessment</option>';
                             $(data.assessments).each(function(index){
                                 htmlData +='<option value="'+data.assessments[index].id+'">'+data.assessments[index].assessment_no+'</option>';
                             });
                             
                             
                                            
                             htmlData +='</select>';
                       
                        $('.selectedAssessments').html(htmlData);
                        
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

       getAssessmentOptions();
       $('html').on('change', '.consumername', function (e) {
           
            getAssessmentOptions();
           
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
        
        
        
        getSpendtimes();
        function getSpendtimes(){
            
            var url = "{{ url('authorizations-getspendtimes') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: { 
                        
                        authorization_id:"{{$authorization->id}}",

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
            
            
            var url = "{{ url('authorizations-updatespendtime') }}";
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
       
       
       function gettotalSpendTime(){
           var url = "{{ route('getTotalSpendtimeByAuthId', $authorization->id) }}";
           
           $.ajax({
                url: url,
                type: "POST",
                data: { 
         
                        authorization_id:"{{$authorization->id}}",

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
         
        $('html').on('click', '.addspendtime', function (e) {
            var start_date_time = $('.start_date_time').val();
            var end_date_time = $('.end_date_time').val();
            var comment = $('.commentvallue').val();
            var assignee = $('.assignee').val();
            
            
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
            
            var url = "{{ url('authorizations-spendtime') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: { 
                        start_date_time: start_date_time,
                        end_date_time: end_date_time,            
                        comment: comment,
                        assignee: assignee,            
                        authorization_id:"{{$authorization->id}}",

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
        
        $('html').on('click', '.saveauth', function (e) {
            
            
            var consumername = $('.consumername').val();
            var authno = $('.authno').val();
            var intan = $('.intan').val();
            var insan = $('.insan').val();
            var  service = $('.services').val();
            var per_week = $('.per_week').val();
            var per_day = $('.per_day').val();
            
            var tot_units = $('.tot_units').val();
            var tot_hours = $('.tot_hours').val();
            var bill_units = $('.bill_units').val();
            
            var record_no = $('.record_no').val();
            var approval_date = $('.approval_date').val();
            
            var expiry_date = $('.expiry_date').val();
            var status = $('.status').val();
            var assignee = $('.assignee').val();
            var spent_time = $('.spent_time').val();
            var discharge_date = $('.discharge_date').val();
            
            
            
            
            
            
            
           
            

            $('.errorclass').html('');
            var validation_array= [];
            

            if(consumername==null ||  consumername==''){
               validation_array.push('Please select Consumer');
               
            }
            
            
            if(service==null ||  service==''){
               validation_array.push('Please select Service');
               
            }


            
            
            
            
            var formData = new FormData();
            var dataValues = { 
                              consumername: consumername,
                              authno: authno,            
                              intan: intan,
                              insan: insan,            
                              service: service,
                              per_week: per_week,            
                              per_day: per_day,
                              tot_units: tot_units,
                              tot_hours: tot_hours,
                              bill_units: bill_units,            
                              record_no: record_no,
                              approval_date: approval_date,            
                              expiry_date: expiry_date,
                              status: status,            
                              assignee: assignee,
                              spent_time: spent_time,            
                              discharge_date: discharge_date,     
                           };
           
           
           
            options = JSON.stringify(dataValues);
            formData.append('options', options);
            
            var url = "{{ url('authorizations-edit') }}/{{$authorization->id}}";
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
                        window.location.href= "{{ url('authorizations-listing') }}";
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
