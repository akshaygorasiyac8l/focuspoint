@extends('layouts.app')
@section('script1')
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="css/select.dataTables.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.select.min.js"></script>
<script type="text/javascript">
         $(document).ready(function() {
    $('#table-general').DataTable( {

    "fixedHeader":    true,
    "bInfo" :         false,
    "bSortable":      false,
    searching:        false,
    paging:           false,
    fixedColumns: {
        leftColumns: 1,
        rightColumns: 1
    },
    columnDefs: [ {
        orderable: false,
        className: 'select-checkbox',
        targets:   0
    } ],
    select: {
        style:    'multi',
        selector: 'td:first-child'
    },
    order: [[ 1, 'asc' ]]
 
 
});
//       var  DT1 = $('#table-general').DataTable();
// $(".selectAll").on( "click", function(e) {
//     if ($(this).is( ":checked" )) {
//         DT1.rows(  ).select();        
//     } else {
//         DT1.rows(  ).deselect(); 
//     }
// });

} );
      </script>
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
                              <select class="form-control droupdown consumer">
                                <option>All Notes</option>
                                <option>All Notes 1</option>
                                <option>All Notes 2</option>
                              </select>
                              <i class="fa fa-caret-down" aria-hidden="true"></i>
                            </div>
                          </h1>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3" id="header-btn-section">
                          <ul class="new-dropdown-hover">
                            <li class="droupdown-hover-add">
                              <a href="{{ route('consumer-notes-add') }}" class="btn btn-info" id="header-new-btn">New</a><i class="fa fa-caret-down dropdown-icon" aria-hidden="true"></i>
                              <ul class="dropdown-notes">
                                <li><a href="">P. I. E Documetation</a></li>
                                <li><a href="">B. I. R. P. Documetation</a></li>
                                <li><a href="">Progress Note - Weekly</a></li>
                                <li><a href="">Non Billable Note</a></li>
                                <li><a href="">IDD Innovations Grid 1</a></li>
                                <li><a href="">IDD Innovations Grid 2</a></li>
                                <li><a href="">CTI Progress Note</a></li>
                                <li><a href="">(S.O.A.P.) Medication Management</a></li>
                                <li><a href="">Outpatient Therapy Session</a></li>
                                <li><a href="">LABS</a></li>
                                <li><a href="">Allergies</a></li>
                                <li><a href="">S. O. A. P. Documentation (Attach)</a></li>
                                <li><a href="">G. I. R. P. Documentation</a></li>
                                <li><a href="">Monthly Progress - Team Supervision</a></li>
                              </ul>
                            </li>
                            <li>
                              <button type="button" class="btn" id="header-search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>    
                            </li>
                          </ul>                                                
                        </div>
                  </div>
               </section>
               <section class="content" id="consumer-note-table">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12 consumer-section">
                          <table id="table-general" class="display consumer-notes-table" style="width:100%">
                            <thead>
                              <tr>
                                   <th class="check-box-title"><input type="checkbox" class="selectAll" name="selectAll" value="all"></th>
                                   <th>Date</th>
                                   <th>Note #</th>
                                   <th>Consumer Name</th>
                                   <th>Payer Name</th>
                                   <th>Employee Name</th>
                                   <th>Date Entry</th>
                                   <th>Total Hours</th>
                                   <th>Status</th>
                               </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td></td>
                                <td><a href="{{ route('consumer-notes-details') }}" class="name-class">08/02/2020</a></td>
                                <td>NOTE-000039</td>
                                <td>Stepahnie McDonald</td>
                                <td>Anthem Blue Cross Blue Shield</td>
                                <td>Gregory-Harris,Tracee</td>
                                <td>8/12/2020 09:02</td>
                                <td>01:15</td>
                                <td>Completed</td>
                              </tr>
                             <tr>
                                <td></td>
                                <td><a href="{{ route('consumer-notes-details') }}" class="name-class">07/28/2020</a></td>
                                <td>NOTE-000038</td>
                                <td>Christopher Hua</td>
                                <td>VA Premiere Eliite</td>
                                <td>Gregory-Harris,Tracee</td>
                                <td>08/11/2020 13:19</td>
                                <td>01:15</td>
                                <td>Pending Approval</td>
                              </tr>
                            </tbody>
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
<script type="text/javascript">
   // Sidebar active menu js
   $('.nav-sidebar').on('click', 'li', function() {
    $('.nav-sidebar li.active-menu').removeClass('active-menu');
       $(this).addClass('active-menu');
   });

   // Mobile Menu active Js
   function myFunction() {
     var x = document.getElementById("sidebar");
     if (x.className === "main-sidebar") {
       x.className += " sidebar-hide";
     } else {
       x.className = "main-sidebar";
     }
   }

   $('#user-add-icon').click(function(){
      $("#drop-down-profile").toggleClass('show');
   });

    $('#user-mobile-icon').click(function(){
      $("#mobile-dropdown").toggleClass('show-add');
   });
    
</script>

@endsection
