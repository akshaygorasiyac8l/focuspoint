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
                              <a href="javascript:;" class="btn btn-info" id="header-new-btn">New<i class="fa fa-caret-down dropdown-icon" aria-hidden="true"></i></a>
                              <ul class="dropdown-notes">
                                <li><a href="{{ url('assessments-add',[1,0]) }}">Behavior Health Assessment</a></li>
                                <li><a href="{{ url('assessments-add',[2,0]) }}">Child/Adolescent Treatment Plan</a></li>
                              </ul>
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
									<form id="reset">
                                      <div class="row">
                                        
                                            
                                         <div class="col-md-6">
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Client Name</label>
                                               <div class="col-md-9">
                                                  <input type="text" name="search_name" class="form-control search_name" placeholder="">
                                               </div>
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                            
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Employee Name</label>
                                               <div class="col-md-9">
                                                  <input type="text" name="emp_name" class="form-control emp_name" placeholder="">
                                               </div>
                                            </div>
                                            <!--
                                            <div class="form-group row">
                                               
                                               <div class="col-md-12">
                                                  <div class="row">
                                                    <div class="col-md-2 left-cols">
                                                        <label class="col-form-label">Start Date</label>
                                                     </div>
                                                     <div class="col-md-4">
                                                        <input type="text" name="start_date" class="form-control start_date" placeholder="mm-dd-yyyy">
                                                        <i class="fa fa-calendar new-calendar" aria-hidden="true"></i>
                                                     </div>
                                                     <div class="col-md-2 left-cols">
                                                        <label class="col-form-label">End Date</label>
                                                     </div>
                                                     <div class="col-md-4 left-cols">
                                                        <input type="text" name="end_date" class="form-control end_date" placeholder="mm-dd-yyyy">
                                                        <i class="fa fa-calendar new-calendar" aria-hidden="true"></i>
                                                     </div>
                                                  </div>
                                               </div>
                                            </div>
                                            -->
                                            
                                             
                                         </div>
                                         <div class="col-md-6">
                                           
                                            
                                            
                                            
                                            
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Created Date</label>
                                               <div class="col-md-9">
                                                  <input type="text" name="created_date" class="form-control created_date" placeholder="mm/dd/yyyy">
                                                  <i class="fa fa-calendar new-calendar" aria-hidden="true"></i>
                                               </div>
                                            </div>
                                            
                                            
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Status</label>
                                               <div class="col-md-9">
                                                  <select class="form-control selstatus" name="status">
                                                     <option value="">Select Status</option>
                                                     <option value="0">Open</option>
                                                     <option value="1">Fixed</option>
                                                     <option value="2">Completed</option>
                                                     <option value="3">In-Progress</option>
                                                  </select>
                                               </div>
                                            </div>
                                            
                                            
                                         </div>
                                      </div>
									  </form>
                                  </div>
                                  <div class="modal-footer">
                                   <div class="btn-section-consumer">
                                      <button type="button" class="btn btn-primary btn-add-search searchbtn" data-dismiss="modal">Search</button>
                                      <button type="reset" class="btn btn-default btn-cancle resetdata" >Reset</button>
                                   </div>
                                  </div>
                                </div>
                             </div>
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
								   <th>>></th>
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
        
        
        $('.admission-discharge-date,.admission-to-date,.date-of-birth,.discharge-from-date,.discharge-to-date,.created_date,.start_date,.end_date').datepicker({ changeMonth: true,changeYear: true,dateFormat: "mm/dd/yy" });
        
        $(document).on('focus','.admission-discharge-date,.admission-to-date,.date-of-birth,.discharge-from-date,.discharge-to-date,.created_date,.start_date,.end_date',function(){
           $('.admission-discharge-date,.admission-to-date,.date-of-birth,.discharge-from-date,.discharge-to-date,.created_date,.start_date,.end_date').datepicker({
               changeMonth: true,changeYear: true,
               dateFormat: 'mm/dd/yy',
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
        
        
        
        
        function searchData(){
          var search_name = $('.search_name').val();
          var emp_name = $('.emp_name').val();
          var start_date = $('.start_date').val();
          var end_date = $('.end_date').val();
          var created_date = $('.created_date').val();
          var status = $('.selstatus').val();
          
          
          var url = "{{ route('searchassessments') }}";
          
          
            $.ajax({
                url: url,
                type: "POST",
                data:  {
                    search_name:search_name,
                    emp_name:emp_name,
                    start_date:start_date,
                    end_date:end_date,
                    created_date:created_date,                    
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
                                                    '<th>Date</th>'+
                                                    '<th>Assessment #</th>'+
                                                    '<th>Consumer Name</th>'+
                                                    '<th>Payer Name	</th>'+
                                                    '<th>Assignee Name</th>'+
                                                    '<th>Created Date</th>'+
                                                    '<th>Total Hours</th>'+
                                                    '<th>Status</th>'+ 
													'<th>>></th>'+ 
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
   
                                

                                htmlData += '<tr><td><input value="'+data[i].id+'"  name="empids" type="checkbox" class="add-new-icon" /></td>'+
                                '<td>'+data[i].assessment_date+'</td>'+
                                
                                '<td><a href="assessments-details/'+data[i].id+'" data="'+data[i].id+'" class="editdata" >'+data[i].assessment_no+'</a></td>'+
                                '<td>'+data[i].consumer_name+'</td>'+
                                '<td>'+data[i].payer_name+'</td>'+
                                '<td>'+data[i].assignee+'</td>'+
                                '<td>'+data[i].created_date+'</td>'+
                                '<td>'+data[i].total_hours+'</td>'+
                                '<td>'+data[i].status+'</td>'+
								'<td><a href="javascript:;" value="'+data[i].id+'"   class="showDatas" >>></a>'+
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
                {"data": "arrow", "name": "arrow"},
                
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
	  
	  $('html').on("click",".showDatas",function(){
		var assessment_id = $(this).attr('value');
			var url = "{{ route('getotherassessments') }}";
            $.ajax({
                url: url,
                type: "POST",
                data:  {
                    assessment_id:assessment_id,
                },
                success: function(data)
                {
					var htmlData = '';
                     if(data.success='1'){
						$('.body_assessment_data').html();
						if(data.data.length > 0 ){
							htmlData += '<table class="table">';
							htmlData += '<tr>';
							htmlData += '<th>Date</th>';
							htmlData += '<th>Assessment #</th>';
							htmlData += '<th>Consumer Name</th>';
							htmlData += '<th>Payer Name</th>';
							htmlData += '<th>Assignee Name</th>';
							htmlData += '<th>Created Date</th>';
							htmlData += '<th>Total Hours</th>';
							htmlData += '<th>Type</th>';
							htmlData += '<th>Status</th>';
							htmlData += '</tr>';
							for(var r=0;r<data.data.length;r++){
								htmlData += '<tr>';
								htmlData += '<td>'+data.data[r].assessment_date+'</td>';
								htmlData += '<td><a href="assessments-details/'+data.data[r].id+'">'+data.data[r].assessment_no+'</a></td>';
								htmlData += '<td>'+data.data[r].consumer+'</td>';
								htmlData += '<td>'+data.data[r].payer_name+'</td>';
								htmlData += '<td>'+data.data[r].assignee_name+'</td>';
								htmlData += '<td>'+data.data[r].created_at+'</td>';
								htmlData += '<td>'+data.data[r].total_hours+'</td>';
								htmlData += '<td>'+data.data[r].subtype+'</td>';
								htmlData += '<td>'+data.data[r].status+'</td>';
								htmlData += '</tr>';
							}
							
							htmlData += '</table>';
						}
						$('.body_assessment_data').html(htmlData);
						$('#myModalassessments').modal('show');
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
		//$(this).parent().parent().after(htmlData);
            
      
    } );
    
 $('html').on("click", ".resetdata", function(){
	document.getElementById("reset").reset();
});  
    
    
    </script>
       <style>
    table#table-general1 tr td,table#table-general1 tr th{padding: 8px;}
    .fade{opacity: 1;}

    .dataTables_filter{display:none;}
    
    </style> 
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
    <!-- Modal -->
<div class="modal fade add-consumer-details" id="myModalassessments" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	 <div class="modal-dialog" id="modal-consumer">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h4 class="modal-title">Assessments </h4>
		  </div>
		  <div class="modal-body" id="body-assessment_data">
			  <div class="row body_assessment_data">
				
					
		  
			  </div>
		  </div>
		  <div class="modal-footer">
		   <div class="btn-section-consumer">
			  <button type="button" class="btn btn-default btn-cancle" data-dismiss="modal">Cancel</button>
		   </div>
		  </div>
		</div>
	 </div>
	</div>
  
@endsection
@section('end_add_layout')   
@endsection
@section('end_listing_layout')
    @parent
@endsection
@section('end_detail_layout')
@endsection
