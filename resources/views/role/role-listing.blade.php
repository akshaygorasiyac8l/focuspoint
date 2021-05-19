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
                           	
                           	Roles

                           </h1>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3" id="header-btn-section">
                          <ul class="new-dropdown-hover">
                            <li class="droupdown-hover-add">
                              <a href="javascript:;" type="button" class="btn btn-info openform" data-toggle="modal" data-target="#addForm" >New</a>        
                            </li>
                            <!--
                            <li>
                              <button type="button" class="btn" id="header-search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </li>
                            -->
                          </ul>
                        </div>
                  </div>
               </section>
               <section class="content" id="user-listing-section">
                  
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12 consumer-section">
                                <div class="messages"></div>
                                <table id="table-general1" class="display user-table" style="width:100%">
                                   <thead>
                                       <tr>
                                           
                                           <th width="70%">Role</th>
                                           
                                           <th width="15%">Status</th>
                                           <th width="15%">Action</th>
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
      
      <div class="modal fade" id="addForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Role</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control ntitle" id="title"   placeholder="Enter Title" required>
                      </div>
                                 
                      <div class="form-group ">
                        <label for="title">Status</label>
                        
                       <select class="form-control droupdown width-add statusval" name="status" required>
                          <option value="" selected="selected" disabled="disabled">Select Status</option>
                          <option value="1">Enable</option>
                          <option value="0">Disable</option>
                       </select>
                        
                     </div>
                     <h3>Permissions</h3>
                     <div class="form-group">
                        <label for="title">Role:</label>
                        <input type="checkbox" class="chkbxsel role_sel" id="role" name="role" value="read"  >&nbsp;Read &nbsp;
                        <input type="checkbox" class="chkbxsel role_sel" id="role" name="role" value="write"  >&nbsp;Write
                      </div>
                      <div class="form-group">
                        <label for="title">Notation Type:</label>
                        <input type="checkbox" class="chkbxsel notation_type_sel" id="notation_type" name="notation_type" value="read"  >&nbsp;Read &nbsp;
                        <input type="checkbox" class="chkbxsel notation_type_sel" id="notation_type" name="notation_type"  value="write" >&nbsp;Write
                      </div>
                      <div class="form-group">
                        <label for="title">Certificate Type:</label>
                        <input type="checkbox" class="chkbxsel certificate_type_sel" id="certificate_type" name="certificate_type"  value="read" >&nbsp;Read &nbsp;
                        <input type="checkbox" class="chkbxsel certificate_type_sel" id="certificate_type" name="certificate_type"  value="write" >&nbsp;Write
                      </div>
                      
                  </div>
                  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary savedata">Submit</button>
                    <input type="hidden" class="idval"  value="" />
                  </div>
                </div>
            </div>
        </div>



@endsection

@section('script2')
@endsection
@section('end_add_layout')   
@endsection
@section('end_listing_layout')
    @parent
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
        
        
        function unchekcboxes(){
            $('.chkbxsel').prop("checked", false);
        }
  
  
        $('#table-general1').DataTable({
            "processing": true,
            "serverSide": true,
            "searching": true,
            "ajax": {
                "url": "{{ route('getroles') }}",
                "method": "GET",
                "cache": false,
                
            },
            "autoWidth": false,
            "columns": [
                {"data": "role", "name": "role"},
                {"data": "status", "name": "status"},
                {"data": "action", "name": "action"},
            ],
            "columnDefs": [
                {"width": "90%", "targets": 0},
                {"width": "10%", "targets": 1},
                {"width": "10%", "targets": 2},
                {"searchable": false, "targets": [1,2]},
                {"orderable": false, "targets": [0,1,2]} // Can't order
                
            ],
            "paging": true, // no pagination
            "language": {
                "zeroRecords": "Sorry we no data for this substance",
                "infoFiltered": "",
                "infoEmpty": "",
                "processing": '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>'
            }
        });  
    
       

          
          $('html').on('click', '.deletedata', function () {
      
                var id = $(this).attr("data");
                
                if(confirm("Are You sure want to delete !")){
                  $.ajax({
                      type: "get",
                      url: "{{ url('deleterole') }}/"+id,
                      success: function (data) {
                            
                                displayMessage(data.class,data.message);
                                renderTable();
                    
                            
                        
                      },
                      error: function (data) {
                          console.log('Error:', data);
                      }
                  });
                }
            });

            $('html').on('click', '.savedata', function () {
      
                var title = $('.ntitle').val();
                var status = $('.statusval').val();
                var id = $('.idval').val();
                
                var role_array= [];
                
                $("input:checkbox[name=role]:checked").each(function(i, value) {
                    role_array.push($(this).val());
                    
                });
                var notation_type_array = [];
                $("input:checkbox[name=notation_type]:checked").each(function() {
                    notation_type_array.push($(this).val());
                });
                var certificate_type_array = [];
                $("input:checkbox[name=certificate_type]:checked").each(function() {
                    certificate_type_array.push($(this).val());
                });
                
                if(id!=''){
                    var dataValues = { 
                        title: title,
                        id: id,
                        status: status,
                        role_array:role_array,
                        notation_type_array:notation_type_array,
                        certificate_type_array:certificate_type_array,
                    };
                    var url = "{{ url('roleedit') }}";
                }else{
                    var url = "{{ url('roleadd') }}";
                    var dataValues = { 
                        title: title,
                        status: status,
                        role_array:role_array,
                        notation_type_array:notation_type_array,
                        certificate_type_array:certificate_type_array,
                    };
                }
                
                if(title==''){
                    $('.ntitle').css('border','1px solid #f00');
                    return false;
                }else{
                
                  $.ajax({
                      url: url,
                      type: "POST",
                      data: dataValues,
                      success: function (data) {
                                $("#addForm").modal('hide');
                                $('.ntitle').val('');
                                $('.idval').val('');
                                $('.statusval').val('');
                                unchekcboxes();
                                displayMessage(data.class,data.message);
                                renderTable();

                      },
                      error: function (data) {
                          console.log('Error:', data);
                      }
                  });
                }
            }); 
            
            
            
            $('html').on('click', '.openform', function () {
                unchekcboxes();
                $('.ntitle').val('');
                $('.statusval').val('');
                $('.idval').val('');
                
            });

            $('html').on('click', '.editdata', function () {
                
                unchekcboxes();
                var id = $(this).attr('data');
                $.ajax({
                  url: "{{ url('rolebyid') }}/"+id,
                  type: "GET",
                  success: function (data) {
                            
                            if(data.data==0){
                                alert('No record found!!');
                                return false;
                            }else{
                                var permissions = data.data.permissions;
                                
                                
                                
                                var roleData = data.data.permissions.role;
                                var notation_typeData = data.data.permissions.notation_type;
                                var certificate_typeData = data.data.permissions.certificate_type;
                                
                                
                                
                                $(roleData).each(function(i, elem) {
                                    $('.role_sel:checkbox[value="'+elem+'"]').prop("checked",true);
                                });
                                $(notation_typeData).each(function(i, elem) {
                                    $('.notation_type_sel:checkbox[value="'+elem+'"]').prop("checked",true);
                                });
                                $(certificate_typeData).each(function(i, elem) {
                                    $('.certificate_type_sel:checkbox[value="'+elem+'"]').prop("checked",true);
                                });
                                

                                $('.ntitle').val(data.data.role);
                                $('.statusval').val(data.data.status);
                                $('.idval').val(data.data.id);
                            }
                      

                  },
                  error: function (data) {
                      console.log('Error:', data);
                  }
                });
                
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
@section('end_detail_layout')
@endsection

