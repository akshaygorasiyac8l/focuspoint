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
                           <h1 class="page-title listing-dropdown">
                           	
                           	<div class="form-group select dropdown-box" id="dropdown-box-03"> 
                               <!--                            
                               <select class="form-control droupdown consumer roletype" name="role"  >
                               
                                  <option>All Employees</option>
                                  @foreach ($roles as $role)
                                  <option {{$role->id}}>{{$role->role}}</option>
                                  @endforeach
                               </select>
                               <i class="fa fa-caret-down" aria-hidden="true"></i>
                               -->
                                <ul class="dropdown-listing">
                                <li class="droplist">All Employees</li>
                                @foreach ($roles as $role)
                                <li {{$role->id}}>{{$role->role}}</li>
                                @endforeach
                                </ul>
                         
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
                          <ul class="new-dropdown-hover">
                            <li class="droupdown-hover-add">
                              <a href="{{ route('employee-add') }}" class="btn btn-info" id="header-new-btn">New</a>    
                            </li>
                            <li>
                              <a href="#myModal" data-toggle="modal" class="btn-search-icon"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </li>
                          </ul>
                          
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
                                               <label class="col-md-3 col-form-label">Supervisor</label>
                                               <div class="col-md-9">
                                                  <select class="form-control selsupervisor" name="supervisor">
                                                    
                                                     <option value="">Select Supervisor</option>
                                                     @foreach($employees as $employee)
                                                     <option value="{{$employee->id}}">{{$employee->fname}} {{$employee->lname}}</option>
                                                     @endforeach
                                                  </select>
                                               </div>
                                            </div>
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Role</label>
                                               <div class="col-md-9">
                                                  <select class="form-control selrole_id" name="selrole_id">
                                                    
                                                     <option value="">Select Role</option>
                                                     @foreach($roles as $role)
                                                     <option value="{{$role->id}}">{{$role->role}} </option>
                                                     @endforeach
                                                  </select>
                                               </div>
                                            </div>
                                            
                                            <!--
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Insurer ID #</label>
                                               <div class="col-md-9">
                                                  <input type="text" name="insurer-id" class="form-control" placeholder="">
                                               </div>
                                            </div>
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Case Name</label>
                                               <div class="col-md-9">
                                                  <input type="text" name="case-name" class="form-control" placeholder="">
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
                                               <label class="col-md-3 col-form-label">Payer</label>
                                               <div class="col-md-9">
                                                  <select class="form-control" name="payer">
                                                     <option>Muiti-Select</option>
                                                     <option>Muiti-Select 2</option>
                                                     <option>Muiti-Select 3</option>
                                                  </select>
                                               </div>
                                            </div>
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Coordinator</label>
                                               <div class="col-md-9">
                                                  <select class="form-control" name="coordinator">
                                                     <option>Select</option>
                                                     <option>Select 2</option>
                                                     <option>Select 3</option>
                                                  </select>
                                               </div>
                                            </div>
                                            -->                                            
                                         </div>
                                         <div class="col-md-6">
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Last Name</label>
                                               <div class="col-md-9">
                                                  <input type="text" name="last-name" class="form-control search_lname" placeholder="">
                                               </div>
                                            </div>
                                            
                                            
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Status</label>
                                               <div class="col-md-9">
                                                  <select class="form-control selstatus" name="selstatus">
                                                    
                                                     <option value="">Select Status</option>
                                                     
                                                     <option value="0">Inactive</option>
                                                     <option value="1">Active</option>
                                                     <option value="3">Suspend</option>
                                                     
                                                  </select>
                                               </div>
                                            </div>
                                            <!--
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
                                                  <input type="text" name="record" class="form-control" placeholder="">
                                               </div>
                                            </div>
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Discharge Date</label>
                                               <div class="col-md-9">
                                                  <div class="row">
                                                     <div class="col-md-6">
                                                        <input type="text" name="discharge" class="form-control discharge-date" placeholder="mm/dd/yyyy">
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
                                                  <select class="form-control" name="status">
                                                     <option>Select Status</option>
                                                     <option>Active</option>
                                                     <option>Inactive</option>
                                                  </select>
                                               </div>
                                            </div>
                                            <div class="form-group row">
                                               <label class="col-md-3 col-form-label">Lead</label>
                                               <div class="col-md-9">
                                                  <select class="form-control" name="lead">
                                                     <option>Select Lead</option>
                                                     <option>Select Lead 1</option>
                                                     <option>Select Lead 2</option>
                                                  </select>
                                               </div>
                                            </div>
                                            -->
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
                  </div>
               </section>
               <section class="content" id="user-listing-section">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12 consumer-section renderdatahtmlData">
                                <table id="table-general1" class="display user-table" style="width:100%">
                                   <thead>
                                       <tr>
                                           <th class="check-box-title"><input id="checkbox-sellectAll" type="checkbox" class="selectAll add-new-icon" name="selectAll" value="all">
                                           <!--<button type="button" id="selectAll" class="main"><span class="sub"></span> Select </button>-->
                                           </th>
                                           <th>Name</th>
                                           <th>Login</th>
                                           <th>Email</th>
                                           <th>Phone No</th>
                                           <th>Role</th>
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
            "info" : false,
            //for bottom
            "dom": 'rt<"bottom"iflp<"clear">>',
            "processing": true,
            "serverSide": true,
            "searching": true,
            "ordering": false,
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
            
            
            var url = "{{ route('deleteemployees') }}";
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
      

      $('html').on("click",".searchbtn",function(){
          
          var fname = $('.search_fname').val();
          var lname = $('.search_lname').val();
          var supervisor = $('.selsupervisor').val();
          var status = $('.selstatus').val();
          var role_id = $('.selrole_id').val();
          
          var url = "{{ route('searchemployees') }}";
            $.ajax({
                url: url,
                type: "POST",
                data:  {
                    fname:fname,
                    lname:lname,
                    supervisor:supervisor,
                    status:status,
                    role_id:role_id,
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
                                                    '<th>Login</th>'+
                                                    '<th>Email</th>'+
                                                    '<th>Phone No</th>'+
                                                    '<th>Role</th>'+
                                                    '<th>Created Date</th>'+
                                                    '<th>Status</th>'+                                                    
                                                '</tr>'+
                                            '</thead><tbody class="ticket-records">';

                            for(var i=0;i<data.length;i++){
                                fname = data[i].fname;
                                lname = data[i].lname;
                                login = data[i].login;
                                phone = data[i].phone;
                                if(fname==null){
                                    fname = '';
                                }
                                if(lname==null){
                                    lname = '';
                                }
                                if(login==null){
                                    login = '';
                                }
                                if(phone==null){
                                    phone = '';
                                }

                                htmlData += '<tr><td><input value="'+data[i].id+'"  name="empids" type="checkbox" class="add-new-icon" /></td>'+
                                '<td><a href="employee-details/'+data[i].id+'" data="'+data[i].id+'" class="editdata" >'+fname+' '+lname+'</a></td>'+
                                '<td>'+login+'</td>'+
                                '<td>'+data[i].email+'</td>'+
                                '<td>'+phone+'</td>'+
                                '<td>'+data[i].type+'</td>'+
                                '<td>'+data[i].created_at+'</td>'+
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
