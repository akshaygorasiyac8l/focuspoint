@extends('layouts.app')
@section('script1')
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="css/select.dataTables.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.select.min.js"></script>

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
                           <select class="form-control droupdown consumer roletype" name="role"  >
                           
                              <option>All Employees</option>
                              @foreach ($roles as $role)
                              <option {{$role->id}}>{{$role->role}}</option>
                              @endforeach
                           </select>
                           <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </div>

                           </h1>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3" id="header-btn-section">
                          <ul class="new-dropdown-hover">
                            <li class="droupdown-hover-add">
                              <a href="{{ route('employee-add') }}" class="btn btn-info" id="header-new-btn">New</a>    
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
                                <table id="table-general1" class="display user-table" style="width:100%">
                                   <thead>
                                       <tr>
                                           <th class="check-box-title"><input type="checkbox" class="selectAll" name="selectAll" value="all">
                                           <!--<button type="button" id="selectAll" class="main"><span class="sub"></span> Select </button>-->
                                           </th>
                                           <th>Name</th>
                                           <th>Login</th>
                                           <th>Email</th>
                                           <th>Phone No</th>
                                           <th>Type</th>
                                           <th>Created Date</th>
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
        
        
        $('html').on("change",".roletype", function() {
            
            var oTable = $('#table-general1').dataTable(); 
            if(this.value=='All Employees'){
                oTable.fnFilter('');
            }else{
                oTable.fnFilter(this.value);
            }
        } );
        
        /*

        $('body').on('click', '#selectAll', function () {
            
            var oTable = $('#table-general1').dataTable({
                stateSave: true
            });

            var allPages = oTable.fnGetNodes();
        
        
            if ($(this).hasClass('allChecked')) {
                $('input[type="checkbox"]', allPages).prop('checked', false);
            } else {
                $('input[type="checkbox"]', allPages).prop('checked', true);
            }
            $(this).toggleClass('allChecked');
        })
        */
    
        
        
        
        
  
  
        $('#table-general1').DataTable({
            "processing": true,
            "serverSide": true,
            "searching": true,
            "ajax": {
                "url": "{{ route('getemployees') }}",
                "method": "GET",
                "cache": false,
                
            },
            "autoWidth": false,
            "columns": [
                {"data": "chkbox", "name": "chkbox"},
                {"data": "name", "name": "name"},
                {"data": "login", "name": "login"},
                {"data": "email", "name": "email"},
                {"data": "phone", "name": "phone"},
                {"data": "type", "name": "type"},
                {"data": "created_at", "name": "created_at"},
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
    
       

          
         
    
      
    } );
    
    
    
    
    </script>
       <style>
    table#table-general1 tr td,table#table-general1 tr th{padding: 8px;}
    .fade{opacity: 1;}
    .modal-dialog{margin: 15% auto !important;}
    
    </style> 
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
