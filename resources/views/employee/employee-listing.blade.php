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
                        <div class="col-md-6 page-background">
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
                                <li data="" class="droplist">All Employees</li>
                                <li data="" class="roletype">All Employees</li>
                                @foreach ($roles as $role)
                                <li data="{{$role->role}}" class="roletype " {{$role->id}}>{{$role->role}}</li>
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
               <section class="content listing-tabel-section" id="user-listing-section">
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
                                           <th>Action</th>
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
      
      <div class="prinDatahtml" style="display:none;">
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
        
        
        $('html').on("click",".roletype", function() {
            var selval = $(this).attr('data');
            var oTable = $('#table-general1').dataTable(); 
            if(selval==''){
                oTable.fnFilter('');
            }else{
                oTable.fnFilter(selval);
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
                {"data": "action", "name": "action"},
                
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
            $('.icon-box').slideUp();
          });
        }
      });
      
      
      

      $('html').on("click",".downloaddata",function(){
            
            var print_array = [];
            
            $('.add-new-icon:checked').each(function(){
                print_array.push({
                  id: $(this).val(), 
                });
            });
            
            
            
            var url = "{{ route('pdfemployees') }}";
            $.ajax({
                url: url,
                type: "POST",
                data:  {
                    print_array:print_array,
                },
                success: function(data)
                {
                    
                    
                     if(data.success='1'){
                        
                            var redirect = "{{ url('public/downloads/employeeall.pdf') }}";
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
      
      
      $('html').on("click",".printdata",function(){
            
            var print_array = [];
            
            $('.add-new-icon:checked').each(function(){
                print_array.push({
                  id: $(this).val(), 
                });
            });
            
            
            
            var url = "{{ route('printemployees') }}";
            $.ajax({
                url: url,
                type: "POST",
                data:  {
                    print_array:print_array,
                },
                success: function(data)
                {
                    
                    
                    if(data.class='success'){
                        var htmlData = '';
                        if(data.userData.length > 0 )
                        {
                        
                        
                            htmlData += '<table  class="display user-table" style="width:100%">'+
                                            '<thead>'+
                                                '<tr>'+
                                                    '<th>Name</th>'+
                                                    '<th>Birth Date</th>'+
                                                    '<th>Email</th>'+
                                                '</tr>'+
                                            '</thead><tbody class="ticket-records">';
                                for(var t=0;t<data.userData.length;t++){
                                    htmlData += '<tr>';
                                    htmlData += '<th>Name</th>';
                                    htmlData += '<th>Name</th>';
                                    htmlData += '<th>Name</th>';
                                    htmlData += '</tr>';
                                }
                            htmlData += '</table>';
                            
                        }
                            
                          $('.prinDatahtml').html(htmlData);
                          var divToPrint = $('.prinDatahtml').html();

                          var newWin=window.open('','Print-Window');

                          newWin.document.open();

                          newWin.document.write('<html><body onload="window.print()">'+divToPrint+'</body></html>');

                          newWin.document.close();

                          setTimeout(function(){newWin.close();},10);
                            
                        
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
      
      
      function searchData(){
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
                                                    '<th>Action</th>'+
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
                                action = '';
                                if(data[i].status=='Active'){
                                    action = '<button value="'+data[i].id+'"   class="btn btn-warning suspenduser" >Suspend</button>';
                                }else if(data[i].status=='Suspend'){
                                    action = '<button value="'+data[i].id+'"   class="btn btn-primary suspenduser" >Reactive</button>';
                                }else{
                                }

                                htmlData += '<tr><td><input value="'+data[i].id+'"  name="empids" type="checkbox" class="add-new-icon" /></td>'+
                                '<td><a href="employee-details/'+data[i].id+'" data="'+data[i].id+'" class="editdata" >'+fname+' '+lname+'</a></td>'+
                                '<td>'+login+'</td>'+
                                '<td>'+data[i].email+'</td>'+
                                '<td>'+phone+'</td>'+
                                '<td>'+data[i].type+'</td>'+
                                '<td>'+data[i].created_at+'</td>'+
                                '<td>'+data[i].status+'</td>'+
                                '<td>'+action+'</td>'+
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
      
      
      
      
      $('html').on("click",".suspenduser",function(){
          
            var selval = $(this).attr('value');
 
          
            var url = "{{ url('employee-ban') }}/"+selval;
            var empId = selval;
            $.ajax({
                url: url,
                type: "POST",
                data: {id: empId},
                success: function (data) {
                          searchData();
                          renderTable();
                          

                },
                error: function (data) {
                    console.log('Error:', data);
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
