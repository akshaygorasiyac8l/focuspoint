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
                           <div class="col-md-12 page-background">
                              <h1 class="page-title">{{$authorization->auth_no}}</h1>
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
                                    <a href="{{route('authorizations-edit',$authorization->id)}}" class="btn-edit-print"><i class="fa fa-pencil common-edit-btn"></i>Edit</a>
                                 </div>
                                 <div class="mail">
                                    <button type="button" class="btn-edit-print empprint"><i class="fa fa-envelope common-edit-btn"></i>Mail</button>
                                 </div>
                                 <div class="pdf">
                                    <a target="blank" href="{{ url('authorization-pdf') }}/{{$authorization->id}}" class="btn-edit-print emppdf"><i class="fa fa-file-text common-edit-btn" aria-hidden="true"></i>PDF/Print</a>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <ul class="new-dropdown-hover add-details-drop">
                                 <li class="droupdown-hover-add">
                                    <a href="{{route('serviceplan-add')}}" class="create-new-btn">Create a Service Plan</a><i class="fa fa-caret-down dropdown-icon" aria-hidden="true"></i>
                                    <ul class="dropdown-details">
                                       <li><a href="{{route('serviceplan-add')}}">Psychiatric Diagnostic Evaluation with Med Service</a></li>
                                    </ul>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="content" id="authorization-details">
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
                                       <label class="col-md-9 col-form-label-assessment name-bold">{{$authorization->consumer_name}}</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Auth #</label>
                                       <label class="col-md-9 col-form-label-assessment">{{$authorization->auth_no}}</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">INTAN</label>
                                       <label class="col-md-9 col-form-label-assessment">{{$authorization->intan}}</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">INSAN</label>
                                       <label class="col-md-9 col-form-label-assessment">{{$authorization->insan}}</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Service</label>
                                       <label class="col-md-9 col-form-label-assessment">{{$authorization->service_name}}</label>
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
                                             <label class="col-md-5 form-control without-background new-label">{{$authorization->record_no}}</label>
                                          </div>
                                       </div>

                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Approval Date</label>
                                          <div class="col-md-7">
                                             {{$authorization->approve_date}}
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Expiry Date</label>
                                          <div class="col-md-7">
                                             {{$authorization->expiry_date}}
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">State</label>
                                          <div class="col-md-7">
                                             {{$authorization->status}}
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Assignee</label>
                                          <div class="col-md-7">
                                            {{$authorization->assignee}}	
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Spent Time</label>
                                          <div class="col-md-7">
                                             ---
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Discharge Date</label>
                                          <div class="col-md-7">
                                             {{$authorization->discharge_date}}
                                          </div>
                                       </div>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="max-unit-details-sec">
                  	<div class="container-fluid">
                  		<div class="row">
                  			<div class="col-md-8">
	                  			<div class="row">
		                        	<div class="col-md-3">
		                        		<span class="max-unit-title common-row">Max Units</span>
		                        	</div>
		                        	<div class="col-md-9">
		                        		<div class="row">
		                        			<div class="col-md-6">
		                        				<div class="form-group">
			                                       <label class="col-form-label-assessment common-title-label">Per Week</label>
			                                       <label class="col-form-label-assessment">{{$authorization->unit_per_week}}</label>
			                                    </div>
		                        			</div>
		                        			<div class="col-md-6">
		                        				<div class="form-group">
			                                       <label class="col-form-label-assessment common-title-label">Per Day</label>
			                                       <label class="col-form-label-assessment">{{$authorization->unit_per_day}}</label>
			                                    </div>
		                        			</div>
		                        		</div>
		                        	</div>
		                        </div>
		                        <div class="row">
		                        	<div class="col-md-3">
		                        		<span class="max-unit-title">Total Approved</span>
		                        	</div>
		                        	<div class="col-md-9">
		                        		<div class="row">
		                        			<div class="col-md-4">
		                        				<div class="form-group">
			                                       <label class="col-form-label-assessment common-title-label">Units/Visits</label>
			                                       <label class="col-form-label-assessment">{{$authorization->total_approved_units}}</label>
			                                    </div>
		                        			</div>
		                        			<div class="col-md-4">
		                        				<div class="form-group">
			                                       <label class="col-form-label-assessment common-title-label">Hours</label>
			                                       <label class="col-form-label-assessment">{{$authorization->total_approved_hours}}</label>
			                                    </div>
		                        			</div>
		                        			<div class="col-md-4">
		                        				<div class="form-group">
			                                       <label class="col-form-label-assessment common-title-label">Bill Without Units</label>
			                                       <label class="col-form-label-assessment">{{$authorization->bill_without_unit}}</label>
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
               </div>
            </form>
         </div>
 

@endsection
@section('script2')
<script src="https://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.js"></script>



<script>
$(document).ready(function() {
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('#csrf_token').val()
          }
        });
        
        $('html').on('click', '.empprint', function (e) {
            
            
            var url = "{{ url('authorization-mail') }}/{{$authorization->id}}";
            var empId = '{{$authorization->id}}';
            $.ajax({
                url: url,
                type: "POST",
                data: {id: empId},
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