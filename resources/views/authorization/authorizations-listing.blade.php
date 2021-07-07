@extends('layouts.app')
@section('script1')
@endsection
@section('add_layout')
   
@endsection
@section('listing_layout')
    @parent
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
            <div class="background-transperent">
               <section class="content-header">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-3 page-background">
                           <h1 class="page-title listing-dropdown">
                           	
                           	<div class="form-group select dropdown-box" id="dropdown-box-03">           
                            <!--
                            <select class="form-control droupdown consumer">
                              <option>All Authorizations</option>
                              <option>All Authorizations 1</option>
                              <option>All Authorizations 2</option>
                            </select>
                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                            -->
                           
                            <ul class="dropdown-listing">
                            <li data="" class="droplist">All Authorizations</li>
                            <li data="" class="statusdata">All Authorizations</li>  
                            <li data="Open" class="statusdata">Open</li>
                            <li data="Fixed" class="statusdata">Fixed</li>
                            <li data="Completed" class="statusdata">Completed</li>
                            <li data="In-Progress" class="statusdata">In-Progress</li>
                            
                            </ul>
                                
                        </div>

                           </h1>
                        </div>
                        <div class="col-md-6">
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
                              <a href="{{ route('authorizations-add') }}" class="btn btn-info" id="header-new-btn">New</a>
                            </li>
                            
                          </ul>
                        </div>
                  </div>
               </section>
               <section class="content" id="authorizations-section">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12 consumer-section renderdatahtmlData">
                          <table id="table-general1" class="display authorizations-table" style="width:100%">
                            <thead>
                              <tr>
                                   <th class="check-box-title"><input id="checkbox-sellectAll" type="checkbox" class="selectAll add-new-icon" name="selectAll" value="all">
                                   <th>Date</th>
                                   <th>Auth #</th>
                                   <th>Consumer Name</th>
                                   <th>Payer Name</th>
                                   <th>Service Name</th>
                                   <th>Start Date</th>
                                   <th>End Date</th>
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
        
        
        $('html').on("click",".statusdata", function() {
            var selval = $(this).attr('data');
            var oTable = $('#table-general1').dataTable(); 
            if(selval==''){
                oTable.fnFilter('');
            }else{
                oTable.fnFilter(selval);
            }
        } );
        

    
        
        
        
        
  
  
        $('#table-general1').DataTable({
            "info" : false,
            //for bottom
            "dom": 'rt<"bottom"iflp<"clear">>',
            "processing": true,
            "serverSide": true,
            "searching": true,
            "ordering": false,
            "ajax": {
                "url": "{{ route('getauthorizations') }}",
                "method": "GET",
                "cache": false,
                
            },
            
            "autoWidth": false,
            "columns": [
                {"data": "chkbox", "name": "chkbox"},
                {"data": "created_date", "name": "created_date"},
                {"data": "auth_no", "name": "auth_no"},
                {"data": "consumer", "name": "consumer"},
                {"data": "payer_name", "name": "payer_name"},
                {"data": "services", "name": "services"},
                {"data": "created_date", "name": "created_date"},
                {"data": "expiry_date", "name": "expiry_date"},
                {"data": "status", "name": "status"},

                
            ],
            "columnDefs": [
                {"width": "2%", "targets": 0},
                {"width": "10%", "targets": 1},
                {"width": "10%", "targets": 2},
                {"width": "10%", "targets": 3},
                {"width": "10%", "targets": 4},
                {"width": "10%", "targets": 5},
                {"width": "10%", "targets": 6},
                {"width": "10%", "targets": 7},
                {"width": "10%", "targets": 8},
                
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
      

      $('html').on("click",".downloaddata",function(){
            
            var print_array = [];
            
            $('.add-new-icon:checked').each(function(){
                print_array.push({
                  id: $(this).val(), 
                });
            });
            
            
            
            var url = "{{ route('pdfauthorizations') }}";
            $.ajax({
                url: url,
                type: "POST",
                data:  {
                    print_array:print_array,
                },
                success: function(data)
                {
                    
                    
                     if(data.success='1'){
                        
                            var redirect = "{{ url('public/downloads/authorizationall.pdf') }}";
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
            
            
            var url = "{{ route('deleteauthorizations') }}";
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
        
    
</script>
<style>
    table#table-general1 tr td,table#table-general1 tr th{padding: 8px;}
    .fade{opacity: 1;}

    .dataTables_filter{display:none;}
    
</style> 
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection