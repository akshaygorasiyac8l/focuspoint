@extends('layouts.app')
@section('script1')
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.css') }}">
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
                           <h1 class="page-title">
                           	
                           	<div class="form-group select dropdown-box" id="dropdown-box-03">     
                            <!--
                           <select class="form-control droupdown consumer statusdata">
                              <option  value="Active">Active</option>
                              <option value="Active - Approved">Active - Approved</option>
                              <option value="Approved" >Approved</option>
                           </select>
                           <i class="fa fa-caret-down new-icon-down" aria-hidden="true"></i>
                           -->
                           
                           
                           <ul class="dropdown-listing">
                            <li data="" class="droplist">All</li>
                            <li data="" class="statusdata">All</li>  
                                @foreach ($consumer_statuses as $consumer_status)
                                    
                                    <li data="{{$consumer_status->title}}" class="statusdata " >{{$consumer_status->title}}</li>
                                @endforeach                            
                            
                            </ul>
                                
                        </div>

                           </h1>
                        </div>
                        <div class="col-md-3">
                          <div class="icon-box">
                            <button class="btn-icons-consumer downloaddata"><i class="fa fa-print icon-common" aria-hidden="true"></i></button>
                            <button class="btn-icons-consumer deletedata"><i class="fa fa-trash icon-common"></i></button>
                            <button class="btn-icons-consumer bookmrkdata"><i class="fa fa-bookmark icon-common"></i></button>
                            <button class="btn-icons-consumer downloaddata"><i class="fa fa-download icon-common"></i></button>
                          </div>
                        </div>
                        <div class="col-md-3" id="header-btn-section">
                          <ul class="new-dropdown-hover drop-space-remove">
                            <li class="droupdown-hover-add">
                              <a href="{{ route('consumers-add') }}" class="btn btn-info" id="header-new-btn">New</a>    
                            </li>
                            <li>
                              <a href="#myModal" data-toggle="modal" class="btn-search-icon"><i class="fa fa-search" aria-hidden="true"></i></a>
                              
                            </li>
                          </ul>
                          
                          </div>
                          
                        <div class="modal fade add-consumer-details" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                             <div class="modal-dialog" id="modal-consumer">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                  </div>
                                  <div class="modal-body" id="body-consumer">
                                      <div class="row">
                                        
                                            
                                         <div class="col-md-6">
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">First Name</label>
                                               <div class="col-md-9">
                                                  <input type="text" name="first-name" class="form-control search_fname" placeholder="">
                                               </div>
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                            
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Case Name</label>
                                               <div class="col-md-9">
                                                  <input type="text" name="case-name" class="form-control searchcasename" placeholder="">
                                               </div>
                                            </div>
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Admission Date</label>
                                               <div class="col-md-9">
                                                  <div class="row">
                                                     <div class="col-md-6">
                                                        <input type="text" name="admission-date" class="form-control admission-discharge-date" placeholder="mm/dd/yyyy">
                                                        <i class="fa fa-calendar new-calendar" aria-hidden="true"></i>
                                                     </div>
                                                     <div class="col-md-1 left-cols">
                                                        <label class="col-form-label">To</label>
                                                     </div>
                                                     <div class="col-md-5 left-cols">
                                                        <input type="text" name="admission-date-to" class="form-control admission-to-date" placeholder="mm/dd/yyyy">
                                                        <i class="fa fa-calendar new-calendar" aria-hidden="true"></i>
                                                     </div>
                                                  </div>
                                               </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Insurer ID #</label>
                                               <div class="col-md-9">
                                                  <input type="text" name="insurer-id" class="form-control insuranceid" placeholder="">
                                               </div>
                                            </div>
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Payer</label>
                                               <div class="col-md-9">
                                                  <select class="form-control searchpayer" name="payer">
                                                     <option value="">Select Payer</option>
                                                     @foreach($payers as $payer)
                                                     <option value="{{$payer->id}}">{{$payer->title}} </option>
                                                     @endforeach
                                                  </select>
                                               </div>
                                            </div>
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label  ">Coordinator</label>
                                               <div class="col-md-9">
                                                  <select class="form-control searchcoordinator" name="coordinator">
                                                     <option value="">Select</option>
                                                     @foreach($coordinators as $coordinator)
                                                     <option value="{{$coordinator->id}}">{{$coordinator->fname}} {{$coordinator->lname}}</option>
                                                     @endforeach
                                                  </select>
                                               </div>
                                            </div>
                                                                                       
                                         </div>
                                         <div class="col-md-6">
                                           
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Last Name</label>
                                               <div class="col-md-9">
                                                  <input type="text" name="last-name" class="form-control search_lname" placeholder="">
                                               </div>
                                            </div>
                                            
                                            
                                            
                                            
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Date of Birth</label>
                                               <div class="col-md-9">
                                                  <input type="text" name="dob" class="form-control date-of-birth" placeholder="mm/dd/yyyy">
                                                  <i class="fa fa-calendar new-calendar" aria-hidden="true"></i>
                                               </div>
                                            </div>
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Record #</label>
                                               <div class="col-md-9">
                                                  <input type="text" name="record" class="form-control selrecordno" placeholder="">
                                               </div>
                                            </div>
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Discharge Date</label>
                                               <div class="col-md-9">
                                                  <div class="row">
                                                     <div class="col-md-6">
                                                        <input type="text" name="discharge" class="form-control discharge-from-date" placeholder="mm/dd/yyyy">
                                                        <i class="fa fa-calendar new-calendar" aria-hidden="true"></i>
                                                     </div>
                                                     <div class="col-md-1 left-cols">
                                                        <label class="col-form-label">To</label>
                                                     </div>
                                                     <div class="col-md-5 left-cols">
                                                        <input type="text" name="to-date" class="form-control discharge-to-date" placeholder="mm/dd/yyyy">
                                                        <i class="fa fa-calendar new-calendar" aria-hidden="true"></i>
                                                     </div>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Status</label>
                                               <div class="col-md-9">
                                                  <select class="form-control selstatus" name="status">
                                                     <option value="">Select Status</option>
                                                     @foreach ($consumer_statuses as $consumer_status)
                                                        <option value="{{$consumer_status->id}}">{{$consumer_status->title}}</option>
                                                     @endforeach
                                                  </select>
                                               </div>
                                            </div>
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Lead</label>
                                               <div class="col-md-9">
                                                  <select class="form-control sellead" name="lead">
                                                     <option value="">Select Lead</option>
                                                     @foreach($leaders as $leader)
                                                     <option value="{{$leader->id}}">{{$leader->fname}} {{$leader->lname}}</option>
                                                     @endforeach
                                                  </select>
                                               </div>
                                            </div>
                                            
                                         </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                   <div class="btn-section-consumer">
                                      <button type="button" class="btn btn-primary btn-add-search searchbtn" data-dismiss="modal">Search</button>
                                      <button type="button" class="btn btn-default btn-cancle" data-dismiss="modal">Cancel</button>
                                   </div>
                                  </div>
                                </div>
                             </div>
                         </div>
      
      
      
                        
                  </div>
               </section>
               <section class="content listing-tabel-section" id="user-listing-section">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12 consumer-section renderdatahtmlData">
                          <table id="table-general1" class="display" style="width:100%">
                            <thead>
                              <tr>
                                   <th class="check-box-title"><input id="checkbox-sellectAll" type="checkbox" class="selectAll add-new-icon" name="selectAll" value="all"></th>
                                   <th>Name</th>
                                   <th>Payer Name</th>
                                   <th>Phone</th>
                                   <th>Program Supervisor</th>
                                   <th>Status</th>
                               </tr>
                            </thead>
                            
                          </table>
                        </div>
                     </div>
                  </div>
               </section>
            </div>
         </div>
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
        
        
        $('.admission-discharge-date,.admission-to-date,.date-of-birth,.discharge-from-date,.discharge-to-date').datepicker({ changeMonth: true,changeYear: true,dateFormat: "mm-dd-yy" });
        
        $(document).on('focus','.admission-discharge-date,.admission-to-date,.date-of-birth,.discharge-from-date,.discharge-to-date',function(){
           $('.admission-discharge-date,.admission-to-date,.date-of-birth,.discharge-from-date,.discharge-to-date').datepicker({
               changeMonth: true,changeYear: true,
               dateFormat: 'mm-dd-yy',
               autoclose: true,
               todayHighlight: true
           });
        });
        
        
        
        function renderTable(){
            var oTable = $('#table-general1').dataTable(); 
            oTable.fnDraw(false);
        }
        
        
        $('html').on("click",".statusdata", function() {
            var selval = $(this).attr('data');
            
            var oTable = $('#table-general1').dataTable(); 
            if(selval==''){
                oTable.fnFilter('');
            }else{
                oTable.fnFilter(selval);
            }
        } );
        
        
        
        
        $("html").on("change","#checkbox-sellectAll",function(){
            var checked = $(this).is(':checked');
            if(checked){
              $(".add-new-icon").each(function(){
                $(this).prop("checked",true);
              });
            }else{
              $(".add-new-icon").each(function(){
                $(this).prop("checked",false);
                $('.icon-box').slideUp();
              });
            }
        });
        

    
        
        
        
        
  
  
        $('#table-general1').DataTable({
            "info" : false,
            "dom": 'rt<"bottom"iflp<"clear">>',
            "processing": true,
            "serverSide": true,
            "searching": true,
            "ordering": false,
            "ajax": {
                "url": "{{ route('getconsumers') }}",
                "method": "GET",
                "cache": false,
                
            },
            "autoWidth": false,
            "columns": [
                {"data": "chkbox", "name": "chkbox"},
                {"data": "name", "name": "name"},
                {"data": "consumer_payer", "name": "consumer_payer"},
                {"data": "consumer_phone", "name": "consumer_phone"},
                {"data": "cordinate_name", "name": "cordinate_name"},
                {"data": "status", "name": "status"},
                
            ],
            "columnDefs": [
                {"width": "2%", "targets": 0},
                {"width": "10%", "targets": 1},
                {"width": "10%", "targets": 2},
                {"width": "10%", "targets": 3},
                {"width": "10%", "targets": 4},
                {"width": "10%", "targets": 5},

                
                {"searchable": true, "targets": [5]},
                
                
            ],
            "paging": true, // no pagination
            "language": {
                "zeroRecords": "Sorry we no data for this substance",
                "infoFiltered": "",
                "infoEmpty": "",
                "processing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>'
            }
        });  
    
       
      $('html').on("click",".deletedata",function(){
            var r = confirm("Are you sure Delete??");
            var delids_array = [];
            if (r == true) {
                $('.add-new-icon:checked').each(function(){
                    delids_array.push({
                      id: $(this).val(), 
                    });
                });
            }
            
            
            var url = "{{ route('deleteconsumers') }}";
            $.ajax({
                url: url,
                type: "POST",
                data:  {
                    delids_array:delids_array,
                },
                success: function(data)
                {
                    
                    
                    if(data.class='success'){
                        renderTable();
                     }else{
                        alert('Something wrong');
                        return false;
                     }
                     
                    
                    
                    
                },
                error: function() 
                {
                } 
            });
        
      });
          
         $(document).ready(function() {
          $(".dropdown-listing").on("click", ".droplist", function() {
              $(this).closest(".dropdown-listing").children('li:not(.droplist)').toggle();
          });

          var allOptions = $(".dropdown-listing").children('li:not(.droplist)');
          $(".dropdown-listing").on("click", "li:not(.droplist)", function() {
              allOptions.removeClass('selected');
              $(this).addClass('selected');
              $(".dropdown-listing").children('.droplist').html($(this).html());
              allOptions.toggle();
          });
        });   

        function searchData(){
          var fname = $('.search_fname').val();
          var lname = $('.search_lname').val();
          var searchcasename = $('.searchcasename').val();
          var admission_discharge_date = $('.admission-discharge-date').val();
          var admission_to_date = $('.admission-to-date').val();
          var insuranceid = $('.insuranceid').val();
          //mulltiple
          var searchpayer = $('.searchpayer').val();
          var searchcoordinator = $('.searchcoordinator').val();
          var date_of_birth = $('.date-of-birth').val();
          var selrecordno = $('.selrecordno').val();
          var discharge_from_date = $('.discharge-from-date').val();
          var discharge_to_date = $('.discharge-to-date').val();
          var sellead = $('.sellead').val();
          
          var status = $('.selstatus').val();
          
          
          var url = "{{ route('searchconsumers') }}";
          
          
            $.ajax({
                url: url,
                type: "POST",
                data:  {
                    fname:fname,
                    lname:lname,
                    searchcasename:searchcasename,
                    admission_discharge_date:admission_discharge_date,
                    admission_to_date:admission_to_date,
                    insuranceid:insuranceid,
                    searchcoordinator:searchcoordinator,
                    date_of_birth:date_of_birth,
                    selrecordno:selrecordno,
                    discharge_from_date:discharge_from_date,
                    discharge_to_date:discharge_to_date,
                    sellead:sellead,
                    searchpayer:searchpayer,
                    status:status,
                },
                success: function(data)
                {

                    if(data.length > 0){
                        

                        
                            var htmlData = '';
                            htmlData += '<table id="table-general1" class="display user-table" style="width:100%">'+
                                            '<thead>'+
                                                '<tr>'+
                                                    '<th class="check-box-title"><input id="checkbox-sellectAll" type="checkbox" class="selectAll add-new-icon" name="selectAll" value="all"></th>'+
                                                    '<th>Name</th>'+
                                                    '<th>Payer Name</th>'+
                                                    '<th>Phone</th>'+
                                                    '<th>Program Supervisor</th>'+
                                                    '<th>Status</th>'+ 
                                                '</tr>'+
                                            '</thead><tbody class="ticket-records">';

                            for(var i=0;i<data.length;i++){
                                fname = data[i].fname;
                                lname = data[i].lname;

                                if(fname==null){
                                    fname = '';
                                }
                                if(lname==null){
                                    lname = '';
                                }
   
                                action = '';
                                if(data[i].status=='Active'){
                                    action = '<button value="'+data[i].id+'"   class="btn btn-warning suspenduser" >Suspend</button>';
                                }else if(data[i].status=='Suspend'){
                                    action = '<button value="'+data[i].id+'"   class="btn btn-primary suspenduser" >Reactive</button>';
                                }else{
                                }

                                htmlData += '<tr><td><input value="'+data[i].id+'"  name="empids" type="checkbox" class="add-new-icon" /></td>'+
                                '<td><a href="employee-details/'+data[i].id+'" data="'+data[i].id+'" class="editdata" >'+fname+' '+lname+'</a></td>'+
                                '<td>'+data[i].consumer_payer+'</td>'+
                                '<td>'+data[i].consumer_phone+'</td>'+
                                '<td>'+data[i].cordinate_name+'</td>'+
                                '<td>'+data[i].status+'</td>'+
                                '</tr>';


                            }
                            
                            $('.renderdatahtmlData').html(htmlData);
                            renderTable();
                    
                    
                     }else{
                        alert('No record found!');
                        return false;
                     }
                     
                    
                    
                    
                },
                error: function() 
                {
                } 
            });
      }
        
        
        $('html').on("click",".searchbtn",function(){
          searchData();
        
        });
        
        
        $('html').on("click",".downloaddata",function(){
            
            var print_array = [];
            
            $('.add-new-icon:checked').each(function(){
                print_array.push({
                  id: $(this).val(), 
                });
            });
            
            
            
            var url = "{{ route('pdfconsumers') }}";
            $.ajax({
                url: url,
                type: "POST",
                data:  {
                    print_array:print_array,
                },
                success: function(data)
                {
                    
                    
                     if(data.success='1'){
                        
                            var redirect = "{{ url('public/downloads/consumerall.pdf') }}";
                            window.open(redirect, '_blank');
                        
                     }else{
                        alert('Something wrong');
                        return false;
                     }
                     
                    
                    
                    
                },
                error: function() 
                {
                } 
            });
        
      });
        
        
        
            
      
    } );
    
     $('html').on("click", ".dropdown-listing", function(){
      $('.dropdown-listing').toggleClass('add-newlist-dropdown');
   });   
       
    
    
    </script>
       <style>
    table#table-general1 tr td,table#table-general1 tr th{padding: 8px;}
    .fade{opacity: 1;}

    .dataTables_filter{display:none;}
    
    </style> 
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
