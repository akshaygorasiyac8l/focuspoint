@extends('layouts.app')
@section('script1')
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
                        <div class="col-md-4 page-background">
                           <h1 class="page-title">
                           	
                           	<div class="form-group select dropdown-box" id="dropdown-box-03">                           
                           <select class="form-control droupdown consumer statusdata">
                              <option  value="Active">Active</option>
                              <option value="Active - Approved">Active - Approved</option>
                              <option value="Approved" >Approved</option>
                           </select>
                           <i class="fa fa-caret-down new-icon-down" aria-hidden="true"></i>
                        </div>

                           </h1>
                        </div>
                        <div class="col-md-5">
                          <div class="icon-box">
                            <button class="btn-icons-consumer printdata"><i class="fa fa-print icon-common" aria-hidden="true"></i></button>
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
                              <button type="button" class="btn" id="header-search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </li>
                          </ul>
                        </div>
                  </div>
               </section>
               <section class="content" id="user-listing-section">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12 consumer-section">
                          <table id="table-general1" class="display" style="width:100%">
                            <thead>
                              <tr>
                                   <th class="check-box-title"><input id="checkbox-sellectAll" type="checkbox" class="selectAll add-new-icon" name="selectAll" value="all"></th>
                                   <th>Name</th>
                                   <th>Payer Name</th>
                                   <th>Phone</th>
                                   <th>Cordinator</th>
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
<script>
    $(document).ready(function() {
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('#csrf_token').val()
          }
        });
        
        
        function renderTable(){
            var oTable = $('#table-general1').dataTable(); 
            oTable.fnDraw(false);
        }
        
        
        $('html').on("change",".statusdata", function() {
            
            var oTable = $('#table-general1').dataTable(); 
            if(this.value=='All Employees'){
                oTable.fnFilter('');
            }else{
                oTable.fnFilter(this.value);
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
              });
            }
        });
        
        $('html').on("click",".add-new-icon",function(){
          if($(this).is(':checked')) {
            $('.icon-box').slideDown();
          }
          else {
            $('.icon-box').slideUp();  
          }
      });
    
        
        
        
        
  
  
        $('#table-general1').DataTable({
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
                {"data": "cordinate_name", "name": "cordinate_name"},
                {"data": "email", "name": "email"},
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
