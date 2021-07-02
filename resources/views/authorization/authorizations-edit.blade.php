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
                                       <label class="col-md-3 col-form-label">Consumer Name</label>
                                       <div class="col-md-9">
                                          <select class="form-control droupdown mobile-drop consumername" name="consumername">
                                            <option value="">Select Consumer</option>
                                            @foreach($consumers as $consumer)
                                            <option {{$authorization->consumer_id==$consumer->id ? "selected" : ""}}  value="{{$consumer->id}}">{{$consumer->fname}} {{$consumer->lname}}</option>
                                            @endforeach
                                         </select>
                                         <button class="add-more-services common-button-addmore"><i class="fa fa-user view-user"></i>View Consumer Details</button>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Auth #</label>
                                       <div class="col-md-9">
                                          <input type="text" name="intan" disabled class="form-control authno"  value="{{$authorization->auth_no}}">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Intan</label>
                                       <div class="col-md-9">
                                          <input type="text" name="intan"  class="form-control intan"  value="{{$authorization->intan}}">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Insan</label>
                                       <div class="col-md-9">
                                          <input type="text" name="insan" class="form-control insan"  value="{{$authorization->insan}}">
                                       </div>
                                    </div>
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
                                                <option {{$authorization->assignee=='1' ? "selected" : ""}} value="1">Gregory-Harris</option>
                                                <option {{$authorization->assignee=='2' ? "selected" : ""}} value="2">Name 2</option>
                                                <option {{$authorization->assignee=='3' ? "selected" : ""}} value="3">Name 3</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Spent Time</label>
                                          <div class="col-md-7">
                                             <input type="text" name="spent-time" class="form-control without-background spent_time" id="spent-time-add" value="{{$authorization->spend_time}}">
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
                           <div class="col-md-7 time-add">
                              <div class="row">
                                 <div class="col-md-3">
                                    <span class="max-unit-title">Max Units</span>
                                 </div>
                                 <div class="col-md-9">
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
                                 <div class="col-md-9">
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
                           <div class="col-md-5"></div>
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
                           <button type="button" class="btn btn-info saveauth">Save</button>
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
        
        $('.approval_date,.expiry_date,.discharge_date').datepicker({ changeMonth: true,changeYear: true,dateFormat: "mm-dd-yy" });
        
        $(document).on('focus','.approval_date,.expiry_date,.discharge_date',function(){
           $('.approval_date,.expiry_date,.discharge_date').datepicker({
               changeMonth: true,changeYear: true,
               dateFormat: 'mm-dd-yy',
               autoclose: true,
               todayHighlight: true
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
               validation_array.push('Please select consumer');
               
            }
            
            
            if(service==null ||  service==''){
               validation_array.push('Please select service');
               
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
