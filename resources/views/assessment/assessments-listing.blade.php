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
                           <h1 class="page-title listing-dropdown">
                           	
                           	<div class="form-group select dropdown-box" id="dropdown-box-03">  
                            <!--                            
                           <select class="form-control droupdown consumer">
                              <option>All Assessments</option>
                              <option>All Assessments 1</option>
                              <option>All Assessments 2</option>
                           </select>
                           <i class="fa fa-caret-down" aria-hidden="true"></i>
                           -->
                           
                           <ul class="dropdown-listing">
                            <li data="" class="droplist">All</li>
                            <li data="" class="statusdata">All</li>  
                            <li data="Open" class="statusdata">Open</li>
                            <li data="Fixed" class="statusdata">Fixed</li>
                            <li data="Completed" class="statusdata">Completed</li>
                            <li data="In-Progress" class="statusdata">In-Progress</li>
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
                          <ul class="new-dropdown-hover">
                            <li class="droupdown-hover-add">
                              <a href="{{ route('assessments-add','0') }}" class="btn btn-info" id="header-new-btn">New<i class="fa fa-caret-down dropdown-icon" aria-hidden="true"></i></a>
                              <ul class="dropdown-notes">
                                <li><a href="{{ route('assessments-add','0') }}">Attach Assessment</a></li>
                                <li><a href="{{ route('assessments-add','0') }}">Behavior Health Assessment - H0031 (Part1)</a></li>
                                <li><a href="{{ route('assessments-add','0') }}">Behavior Health Assessment - H0031 (Part2)</a></li>
                                <li><a href="{{ route('assessments-add','0') }}">Child/Adolescent Treatment Plan - H0032</a></li>
                              </ul>
                            </li>
                            <li>
                              <button type="button" class="btn" id="header-search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>    
                            </li>
                          </ul>
                     </div>
                  </div>
               </section>
               <section class="content listing-tabel-section" id="assessments-section-table">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12 consumer-section renderdatahtmlData">
                          <table id="table-general1" class="display assessments-listing-table" style="width:100%">
                            <thead>
                              <tr>
                                   <th class="check-box-title"><input id="checkbox-sellectAll" type="checkbox" class="selectAll add-new-icon" name="selectAll" value="all"></th>
                                   <th>Date</th>
                                   <th>Assessment #</th>
                                   <th>Consumer Name</th>
                                   <th>Payer Name</th>
                                   <th>Assignee Name</th>
                                   <th>Created Date</th>
                                   <th>Total Hours</th>
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
                "url": "{{ route('getassessments') }}",
                "method": "GET",
                "cache": false,
                
            },
            "autoWidth": false,
            "columns": [
                {"data": "chkbox", "name": "chkbox"},
                {"data": "assessment_date", "name": "assessment_date"},
                {"data": "assessment_no", "name": "assessment_no"},
                {"data": "consumer", "name": "consumer"},
                {"data": "payer_name", "name": "payer_name"},
                {"data": "assignee_name", "name": "assignee_name"},
                {"data": "created_at", "name": "created_at"},
                {"data": "total_hours", "name": "total_hours"},
                {"data": "status", "name": "status"},
                
            ],
            "columnDefs": [
                {"width": "2%", "targets": 0},
                {"width": "10%", "targets": 1},
                {"width": "10%", "targets": 2},
                {"width": "10%", "targets": 3},
                {"width": "10%", "targets": 4},
                {"width": "10%", "targets": 5},

                
                {"searchable": true, "targets": [8]},
                
                
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
            
            
            var url = "{{ route('deleteassessments') }}";
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
          //var searchpayer = $('.searchpayer').val();
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
                                                    '<th>Coordinator</th>'+
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
            
            
            
            var url = "{{ route('pdfassessments') }}";
            $.ajax({
                url: url,
                type: "POST",
                data:  {
                    print_array:print_array,
                },
                success: function(data)
                {
                    
                    
                     if(data.success='1'){
                        
                            var redirect = "{{ url('public/downloads/assessmentall.pdf') }}";
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
    
    
    
    
    </script>
       <style>
    table#table-general1 tr td,table#table-general1 tr th{padding: 8px;}
    .fade{opacity: 1;}
    .modal-dialog{margin: 15% auto !important;}
    .dataTables_filter{display:none;}
    
    </style> 
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
@section('end_add_layout')   
@endsection
@section('end_listing_layout')
    @parent
@endsection
@section('end_detail_layout')
@endsection
