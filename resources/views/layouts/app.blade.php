<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    

    <title>{{ config('app.name', 'Focus Point') }}</title>
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    
	<link rel="stylesheet" type="text/css" href="{{ asset('font/font.css') }}">
    <style>
    .dataTables_length select{background-image:none !important;}
    .consumer-section{padding:15px;}
    .action-icon{font-size:20px;}
    </style>
    
    
    @section('script1')
      <link rel="stylesheet" href="{{asset('css/jquery-ui.css') }}">

      <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui-timepicker-addon.css') }}">
      <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.dataTables.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{asset('css/select.dataTables.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datetimepicker.css') }}">
      <!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
      <script type="text/javascript" src="{{asset('js/jquery.validate.min.js') }}"></script>
      <script type="text/javascript" src="{{asset('js/app.js') }}"></script>
      <script type="text/javascript" src="{{asset('js/bootstrap.min.js') }}"></script>
      <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js') }}"></script>
    @show 
    @section('add_layout')
         <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui-timepicker-addon.css')}}">
         <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.dataTables.min.css')}}">
         <link rel="stylesheet" type="text/css" href="{{asset('css/select.dataTables.min.css')}}">
         <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datetimepicker.css')}}">
         <!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
         <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
         <script type="text/javascript" src="{{asset('js/jquery.validate.min.js')}}"></script>
         <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
         <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
         <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    @show
    @section('listing_layout')
       <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.dataTables.min.css')}}">
       <link rel="stylesheet" type="text/css" href="{{asset('css/select.dataTables.min.css')}}">
       <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
       <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
       <script type="text/javascript" src="{{asset('js/dataTables.select.min.js')}}"></script>
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
      @show
    @section('detail_layout')
      <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.dataTables.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('css/select.dataTables.min.css')}}">
      <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
      <script src="{{asset('js/jquery-ui.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/dataTables.select.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
   @show
</head>
<body>
        
@section('header')  
         <div class="header">
            <div class="mobile-section">
               <div class="logo">
                  <a href="{{ route('home') }}">
                     <img src="{{asset('images/FocusPoint_Logo.png') }}" alt="logo">
                  </a>
               </div>
               <div class="mobile-menu">
                  <button onclick="myFunction();"><i class="fa fa-bars" aria-hidden="true"></i></button>
               </div>
            </div>
            
            <div class="row header-right-section" id="header-section-mobile">
              <div class="col-md-6 search-box">
                  <form class="form-inline ml-3">
                     <div class="input-group input-group-sm">                     
                       <i class="fa fa-caret-down"></i>
                       <input class="form-control form-control-navbar" type="text" name="search" placeholder="Search" aria-label="Search">
                     </div>
                   </form>
               </div>
               <div class="col-md-6 drop-box">
                  <ul class="droup-down-box">
                     <li class="drop-item-box">
                        <div class="form-group select dropdown-box">                           
                           <select class="form-control droupdown" name="locations" style="-webkit-appearance: none;">
                              <option selected="selected" disabled="disabled" value="Locations">Locations</option>
                              <option value="Danville">Danville</option>  
                              <option value="Martinsville">Martinsville</option>
                              <option value="Richmond">Richmond</option>
                           </select>
                           <i class="fa fa-angle-down"></i>
                        </div>
                     </li>
                     <?php
                     
                     
                     $permissions = array();
                     
                     if (Auth::check()) {
                        $user = \Auth::user(); 
                        $role_id = $user->role_id;
                        $roles = DB::table('roles')->where("id",$role_id)->first();
                        if($roles){
                           $permissions = unserialize($roles->permissions);
                        }
                        
                     }
                     //dd($permissions);
                     
                     if(isset($role_id) && $role_id=='0'){
                     ?>
                     <li class="drop-item-box">
                        <div class="form-group select dropdown-box">
                           <select class="form-control droupdown" name="administration" style="-webkit-appearance: none;">
                              <optgroup class="dropdown-title" label="Access Management">
                                 <option selected="selected" value="Administration">Administration</option>
                                 <option value="Users">Users</option>
                                 <option value="Roles">Roles</option>
                                 <option value="Groups">Groups</option>
                              </optgroup>
                              <optgroup label="Server Settings">
                                 <option value="Global Settings">Global Settings</option>
                                 <option value="Database Export">Database Export</option>
                              </optgroup>
                           </select>
                           <i class="fa fa-angle-down"></i>
                        </div>
                     </li>
                     <?php } ?>
                     <li class="profile-drop">
                        <img src="{{asset('images/user.png')}}" alt="User Avatar" class="img-circle user-icon" id="user-add-icon">
                        <ul id="drop-down-profile">
                           <li class="nav-item profile">
                              <a href="{{ route('profile') }}" class="dropdown-item">Profile</a>
                           </li>
                           <li class="nav-item profile">
                              <a  class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">Logout</a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
 
 
@show        

@section('sidebar')  
        <aside class="main-sidebar sidebar-dark-primary elevation-4" id="sidebar">
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item has-treeview active-menu">
                     <a href="{{ route('home') }}" class="nav-link">
                        <i class="fa fa-dashboard"></i>
                        <p>Dashboard</p>
                     </a>
                  </li>
                  <?php
                  
                  //dd($permissions['role']);
                  //if(isset($role_id) && $role_id=='0'){
                  ?>
                  <?php
                  if (isset($permissions['role']) || isset($permissions['certificate_type'])  || isset($permissions['notation_type']) 
                      || (isset($role_id) && $role_id=='0') ){
                  ?>
                  <li class="nav-item has-treeview sub-menu">
                     <a href="javascript:void(0);" class="nav-link">
                        <i class="fa fa-file"></i>
                        <p>Settings</p>
                        <i class="fa fa-angle-down down-icon"></i>
                     </a>
                     <ul class="sub-menu-dropdpwn">
                        <?php
                           //$permissions['role']
                           if (isset($permissions['role']) && in_array("read", $permissions['role'])  || (isset($role_id) && $role_id=='0'))
                           {
                        ?>
                        <li class="nav-item has-treeview ">
                           <a href="{{ route('roles') }}" class="nav-link">
                              <i class="fa fa-dashboard"></i>
                              <p>Roles</p>
                           </a>
                        </li>
                        <?php 
                           } 
                        ?>
                        <?php
                           //$permissions['role']
                           if (isset($permissions['certificate_type']) && in_array("read", $permissions['certificate_type']) || (isset($role_id) && $role_id=='0'))
                           {
                        ?>
                        <li class="nav-item has-treeview ">
                           <a href="{{ route('certificate-types') }}" class="nav-link">
                              <i class="fa fa-dashboard"></i>
                              <p>Certification Types</p>
                           </a>
                        </li>
                         <?php 
                           } 
                        ?>
                        <?php
                           //$permissions['role']
                           if (isset($permissions['notation_type']) && in_array("read", $permissions['notation_type']) || (isset($role_id) && $role_id=='0'))
                           {
                        ?>
                        <li class="nav-item has-treeview ">
                           <a href="{{ route('notation-types') }}" class="nav-link">
                              <i class="fa fa-dashboard"></i>
                              <p>Notation Types</p>
                           </a>
                        </li>
                         <?php 
                           } 
                        ?>
                        
                        <?php
                           //$permissions['role']
                           if (isset($permissions['consumer_note_types']) && in_array("read", $permissions['consumer_note_types']) || (isset($role_id) && $role_id=='0'))
                           {
                        ?>
                        <li class="nav-item has-treeview ">
                           <a href="{{ route('consumer-note-types') }}" class="nav-link">
                              <i class="fa fa-dashboard"></i>
                              <p>Consumer Note Types</p>
                           </a>
                        </li>
                        <?php 
                           } 
                        ?>
                        <?php
                           //$permissions['role']
                           if (isset($permissions['reaction']) && in_array("read", $permissions['reaction']) || (isset($role_id) && $role_id=='0'))
                           {
                        ?>
                        <li class="nav-item has-treeview ">
                           <a href="{{ route('reactions') }}" class="nav-link">
                              <i class="fa fa-dashboard"></i>
                              <p>Reactions</p>
                           </a>
                        </li>
                        
                        <?php 
                           } 
                        ?>
                        <?php
                           //$permissions['role']
                           if (isset($permissions['race']) && in_array("read", $permissions['race']) || (isset($role_id) && $role_id=='0'))
                           {
                        ?>
                        <li class="nav-item has-treeview ">
                           <a href="{{ route('races') }}" class="nav-link">
                              <i class="fa fa-dashboard"></i>
                              <p>Races</p>
                           </a>
                        </li>
                        <?php 
                           } 
                        ?>
                        
                        
                        <?php
                           //$permissions['role']
                           if (isset($permissions['ethnicity']) && in_array("read", $permissions['ethnicity']) || (isset($role_id) && $role_id=='0'))
                           {
                        ?>
                        <li class="nav-item has-treeview ">
                           <a href="{{ route('ethnicities') }}" class="nav-link">
                              <i class="fa fa-dashboard"></i>
                              <p>Ethnicities</p>
                           </a>
                        </li>
                        <?php 
                           } 
                        ?>
                        <?php
                           //$permissions['role']
                           if (isset($permissions['language']) && in_array("read", $permissions['language']) || (isset($role_id) && $role_id=='0'))
                           {
                        ?>
                        <li class="nav-item has-treeview ">
                           <a href="{{ route('languages') }}" class="nav-link">
                              <i class="fa fa-dashboard"></i>
                              <p>Languages</p>
                           </a>
                        </li>
                        <?php 
                           } 
                        ?>
                        <?php
                           //$permissions['role']
                           if (isset($permissions['service']) && in_array("read", $permissions['service']) || (isset($role_id) && $role_id=='0'))
                           {
                        ?>
                        <li class="nav-item has-treeview ">
                           <a href="{{ route('services') }}" class="nav-link">
                              <i class="fa fa-dashboard"></i>
                              <p>Services</p>
                           </a>
                        </li>
                        <?php 
                           } 
                        ?>
                        
                        
                        <!--
                        <li class="nav-item has-treeview ">
                           <a href="{{ route('route-listing') }}" class="nav-link">
                              <i class="fa fa-dashboard"></i>
                              <p>Routes</p>
                           </a>
                        </li>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <li class="nav-item has-treeview ">
                           <a href="{{ route('locations') }}" class="nav-link">
                              <i class="fa fa-dashboard"></i>
                              <p>Locations</p>
                           </a>
                        </li>
                        
                        <li class="nav-item has-treeview ">
                           <a href="{{ route('relations') }}" class="nav-link">
                              <i class="fa fa-dashboard"></i>
                              <p>Relations</p>
                           </a>
                        </li>
                        <li class="nav-item has-treeview ">
                           <a href="{{ route('problems') }}" class="nav-link">
                              <i class="fa fa-dashboard"></i>
                              <p>Problems</p>
                           </a>
                        </li>
                        <li class="nav-item has-treeview ">
                           <a href="{{ route('payers') }}" class="nav-link">
                              <i class="fa fa-dashboard"></i>
                              <p>Payers</p>
                           </a>
                        </li>
                        
                        
                        <li class="nav-item has-treeview ">
                           <a href="{{ route('pay-types') }}" class="nav-link">
                              <i class="fa fa-dashboard"></i>
                              <p>Pay Types</p>
                           </a>
                        </li>
                        
                        <li class="nav-item has-treeview ">
                           <a href="{{ route('assessment-types') }}" class="nav-link">
                              <i class="fa fa-dashboard"></i>
                              <p>Assessment Types</p>
                           </a>
                        </li>
                        -->
                     </ul>
                  </li>
                  
                  
                  <?php } ?>
                  <li class="nav-item has-treeview">
                     <a href="{{ route('consumers-listing') }}" class="nav-link">
                        <i class="fa fa-user"></i>
                        <p>Consumers</p>
                     </a>
                  </li>
                  <li class="nav-item has-treeview">
                     <a href="{{ route('assessments-listing') }}" class="nav-link">
                        <i class="fa fa-anchor"></i>
                        <p>Assessments</p>
                     </a>
                  </li>                  
                  <li class="nav-item has-treeview">
                     <a href="{{ route('authorizations-listing') }}" class="nav-link">
                        <i class="fa fa-check-square-o"></i>
                        <p>Authorizations</p>
                     </a>
                  </li>
                  <li class="nav-item has-treeview">
                     <a href="{{ route('serviceplan-listing') }}" class="nav-link">
                        <i class="fa fa-life-ring"></i>
                        <p>Service Plans</p>
                     </a>
                  </li>
                  <li class="nav-item has-treeview">
                     <a href="{{ route('consumer-notes-listing') }}" class="nav-link">
                        <i class="fa fa-book"></i>
                        <p>Consumer Notes</p>
                     </a>
                  </li>
                  <!--
                  <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                        <i class="fa fa-database"></i>
                        <p>Compliances</p>
                     </a>
                  </li>
                  -->
                  <li class="nav-item has-treeview">
                     <a href="{{ route('employee-listing') }}" class="nav-link">
                        <i class="fa fa-user"></i>
                        <p>Employees</p>
                     </a>
                  </li>
                  <!--
                  <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                        <i class="fa fa-file"></i>
                        <p>Reports</p>
                     </a>
                  </li>
                  
                  <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                        <i class="fa fa-credit-card"></i>
                        <p>Billing</p>
                     </a>
                     
                     
                  </li>
                  -->
                  <li class="nav-item has-treeview">
                  <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                     <i class="fa fa-life-ring"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                   </li>
               </ul>
               <!--
               <div class="row header-right-section" id="desktop-hide">
                  <div class="col-md-6 search-box">
                     <form class="form-inline ml-3">
                        <div class="input-group input-group-sm">                     
                          <i class="fa fa-caret-down"></i>
                          <input class="form-control form-control-navbar" type="text" name="search" placeholder="Search" aria-label="Search">
                        </div>
                      </form>
                  </div>
                  <div class="col-md-6 drop-box">
                     <ul class="droup-down-box">
                        <li class="drop-item-box">
                           <div class="form-group select dropdown-box">                           
                              <select class="form-control droupdown" name="locations" style="-webkit-appearance: none;">
                                 <option selected="selected" value="Locations">Locations</option>
                                 <option value="Danville">Danville</option>  
                                 <option value="Martinsville">Martinsville</option>
                                 <option value="Richmond">Richmond</option>
                              </select>
                              <i class="fa fa-angle-down"></i>
                           </div>
                        </li>
                        <li class="drop-item-box">
                           <div class="form-group select dropdown-box">
                              <select class="form-control droupdown" name="administration" style="-webkit-appearance: none;">
                                 <optgroup class="dropdown-title" label="Access Management">
                                    <option selected="selected" value="Administration">Administration</option>
                                    <option value="Users">Users</option>
                                    <option value="Roles">Roles</option>
                                    <option value="Groups">Groups</option>
                                 </optgroup>
                                 <optgroup label="Server Settings">
                                    <option value="Global Settings">Global Settings</option>
                                    <option value="Database Export">Database Export</option>
                                 </optgroup>
                              </select>
                              <i class="fa fa-angle-down"></i>
                           </div>
                        </li>
                        <li class="profile-drop">
                           <img src="images/user.png" alt="User Avatar" class="img-circle user-icon" id="user-add-icon">
                           <ul id="drop-down-profile">
                              <li class="nav-item profile">
                                 <a href="profile.html" class="dropdown-item">Profile</a>
                              </li>
                              <li class="nav-item profile">
                                 <a href="#" class="dropdown-item">Logout</a>
                              </li>
                           </ul>
                        </li>
                     </ul>
                  </div>
               </div>
               <ul id="desktop-user">
                  <li id="user-mobile-add">
                     <img src="images/user.png" alt="User Avatar" class="img-circle user-icon" id="user-mobile-icon">
                  </li>
               </ul>
               <ul id="mobile-dropdown">
                  <li class="nav-item profile">
                     <a href="profile.html" class="dropdown-item">Profile</a>
                  </li>
                  <li class="nav-item profile">
                     <a href="#" class="dropdown-item">Logout</a>
                     
                  </li>
               </ul>  
               -->
            </nav>
            <div class="back-box">
               <button class="back-btn-box"><i class="fa fa-angle-left"></i></button>
            </div>
         </aside>
         
      
         <input type="hidden" id="csrf_token" name="csrf"  value="{{csrf_token()}}" />
  
@show   


@yield('content')
        
@yield('script')
<script type="text/javascript">

   $('.nav-tabs').on('click', 'li', function() {
     $('.nav-tabs li.active-tabs').removeClass('active-tabs');
     $(this).addClass('active-tabs');
   });

   $('.nav-sidebar').on('click', 'li', function() {
     $('.nav-sidebar li.active-menu').removeClass('active-menu');
     $(this).addClass('active-menu');
   });

   // Dropdown open and close
   $('#user-add-icon').click(function(){
      $("#drop-down-profile").toggleClass('show');
   });

    $('#user-mobile-icon').click(function(){
      $("#mobile-dropdown").toggleClass('show-add');
   });
  
</script>

@section('script2')
<script src="https://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="{{asset('js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{asset('js/angular.min.js') }}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript">
   $('.nav-sidebar').on('click', 'li', function() {
     $('.nav-sidebar li.active-menu').removeClass('active-menu');
     $(this).addClass('active-menu');
   });
</script>
<script type="text/javascript">
   $(document).ready(function() {
       $('.date-select').datepicker({ format: "mm/dd/yyyy" });
   }); 
   $(document).ready(function() {
       $('.diagnosis-date').datepicker({ format: "mm/dd/yyyy" });
   }); 
   $(document).ready(function() {
       $('.date-type').datepicker({ format: "mm/dd/yyyy" });
   }); 


   // Scroolbar scroll
   var $hs = $('.table-scrollbar');
   var $sLeft = 0;
   var $hsw = $hs.outerWidth(true);
   $( window ).resize(function() {
     $hsw = $hs.outerWidth(true);
   });
   function scrollMap($sLeft) {
     $hs.scrollLeft($sLeft);
   }
   $hs.on('mousewheel', function(e) {
     var $max = $hsw * 2 + (-e.originalEvent.wheelDeltaY);
     if ($sLeft > -1){
       $sLeft = $sLeft + (-e.originalEvent.wheelDeltaY);
     } else {
       $sLeft = 0;
     }
     if ($sLeft > $max) {
       $sLeft = $max;
     }
     if(($sLeft > 0) && ($sLeft < $max)) {
       e.preventDefault();
       e.stopPropagation(); 
     }
     scrollMap($sLeft);
   });

   $('#user-add-icon').click(function(){
      $("#drop-down-profile").toggleClass('show');
   });

    $('#user-mobile-icon').click(function(){
      $("#mobile-dropdown").toggleClass('show-add');
   });
   
   $("#spent-time-add").timepicker();


// Spent Time Add
$(document).ready(function() {
   $('.start-date').datepicker({ format: "mm/dd/yyyy" });
});
$(document).ready(function() {
   $('.end-date').datepicker({ format: "mm/dd/yyyy" });
});
$("#start-time").timepicker();
$("#end-time").timepicker(); 
</script>

<script type="text/javascript">
$(function() {
  $("form[name='assessment-form']").validate({
    rules: {
      consumername: "required",
      payername: "required",
      assessmenttype: "required"
    },
    messages: {
      consumername: "Please enter your Consumer Name",
      payername: "Please enter your Payer Name",
      assessmenttype: "Please enter your Type"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});

// Images Preview JS
function readImage(file) {
  var reader = new FileReader();
  var image  = new Image();

  reader.readAsDataURL(file);  
  reader.onload = function(_file) {
    image.src = _file.target.result;
    image.onload = function() {
      var n = file.name;
      $('#uploadPreview').append('<div class="image-section"><div class="row"><div class="col-md-8"><p class="file-name-image">' + n + '</p></div><div class="col-md-4"><span class="delete-image"><i class="fa fa-trash delete" aria-hidden="true"></i>Delete</span></div></div></div>');
      $('.delete-image').click(function(){
        $(this).parent().parent().parent().remove();
      });
    };

    image.onerror= function() {
      alert('Invalid file type: '+ file.type);
    };    
  };
}
$("#file-upload").change(function (e) {
  if(this.disabled) {
    return alert('File upload not supported!');
  }
  var F = this.files;
  if (F && F[0]) {
    for (var i = 0; i < F.length; i++) {
      readImage(F[i]);
    }
  }
});

$('.common-selectbox').click(function(){
   $('.common-selectbox').toggleClass('add-down-arrow-show');
});

// Date and Time Picker
$(function () {
   $('#startdatetimepicker').datetimepicker({ 
      allowInputToggle: true,
      format: 'YYYY-MMM-DD HH:mm',
      inline: false,
      sideBySide: true
   }); 
});
$(function () {
   $('#enddatetimepicker').datetimepicker({ 
      allowInputToggle: true,
      format: 'YYYY-MMM-DD HH:mm',
      inline: false,
      sideBySide: true
   }); 
});
</script>
@show 

@section('end_add_layout')
<script src="https://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.js"></script>

<script type="text/javascript" src="{{asset('js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/angular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript">
   $('.nav-sidebar').on('click', 'li', function() {
     $('.nav-sidebar li.active-menu').removeClass('active-menu');
     $(this).addClass('active-menu');
   });
</script>
<script type="text/javascript">
   $(document).ready(function() {
       $('.date-select').datepicker({ format: "mm/dd/yyyy" });
   }); 
   $(document).ready(function() {
       $('.diagnosis-date').datepicker({ format: "mm/dd/yyyy" });
   }); 
   $(document).ready(function() {
       $('.date-type').datepicker({ format: "mm/dd/yyyy" });
   }); 


   // Scroolbar scroll
   var $hs = $('.table-scrollbar');
   var $sLeft = 0;
   var $hsw = $hs.outerWidth(true);
   $( window ).resize(function() {
     $hsw = $hs.outerWidth(true);
   });
   function scrollMap($sLeft) {
     $hs.scrollLeft($sLeft);
   }
   $hs.on('mousewheel', function(e) {
     var $max = $hsw * 2 + (-e.originalEvent.wheelDeltaY);
     if ($sLeft > -1){
       $sLeft = $sLeft + (-e.originalEvent.wheelDeltaY);
     } else {
       $sLeft = 0;
     }
     if ($sLeft > $max) {
       $sLeft = $max;
     }
     if(($sLeft > 0) && ($sLeft < $max)) {
       e.preventDefault();
       e.stopPropagation(); 
     }
     scrollMap($sLeft);
   });

   $('#user-add-icon').click(function(){
      $("#drop-down-profile").toggleClass('show');
   });

    $('#user-mobile-icon').click(function(){
      $("#mobile-dropdown").toggleClass('show-add');
   });
   
   $("#spent-time-add").timepicker();


// Spent Time Add
$(document).ready(function() {
   $('.start-date').datepicker({ format: "mm/dd/yyyy" });
});
$(document).ready(function() {
   $('.end-date').datepicker({ format: "mm/dd/yyyy" });
});
$("#start-time").timepicker();
$("#end-time").timepicker(); 
</script>

<script type="text/javascript">
$(function() {
  $("form[name='assessment-form']").validate({
    rules: {
      consumername: "required",
      payername: "required",
      assessmenttype: "required"
    },
    messages: {
      consumername: "Please enter your Consumer Name",
      payername: "Please enter your Payer Name",
      assessmenttype: "Please enter your Type"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});

// Images Preview JS
function readImage(file) {
  var reader = new FileReader();
  var image  = new Image();

  reader.readAsDataURL(file);  
  reader.onload = function(_file) {
    image.src = _file.target.result;
    image.onload = function() {
      var n = file.name;
      $('#uploadPreview').append('<div class="image-section"><div class="row"><div class="col-md-8"><p class="file-name-image">' + n + '</p></div><div class="col-md-4"><span class="delete-image"><i class="fa fa-trash delete" aria-hidden="true"></i>Delete</span></div></div></div>');
      $('.delete-image').click(function(){
        $(this).parent().parent().parent().remove();
      });
    };

    image.onerror= function() {
      alert('Invalid file type: '+ file.type);
    };    
  };
}
$("#file-upload").change(function (e) {
  if(this.disabled) {
    return alert('File upload not supported!');
  }
  var F = this.files;
  if (F && F[0]) {
    for (var i = 0; i < F.length; i++) {
      readImage(F[i]);
    }
  }
});

$('.common-selectbox').click(function(){
   $('.common-selectbox').toggleClass('add-down-arrow-show');
});

// Date and Time Picker
$(function () {
   $('#startdatetimepicker').datetimepicker({ 
      allowInputToggle: true,
      format: 'YYYY-MMM-DD HH:mm',
      inline: false,
      sideBySide: true
   }); 
});
$(function () {
   $('#enddatetimepicker').datetimepicker({ 
      allowInputToggle: true,
      format: 'YYYY-MMM-DD HH:mm',
      inline: false,
      sideBySide: true
   }); 
});
</script>
@show
@section('end_listing_layout')
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
@show
@section('end_detail_layout')
<script src="https://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript">
   $('.nav-tabs').on('click', 'li', function() {
     $('.nav-tabs li.active-tabs').removeClass('active-tabs');
     $(this).addClass('active-tabs');
   });

   $('.nav-sidebar').on('click', 'li', function() {
     $('.nav-sidebar li.active-menu').removeClass('active-menu');
     $(this).addClass('active-menu');
   });
</script>
<script type="text/javascript">
   $(document).ready(function() {
       $('.date-select').datepicker({ format: "mm/dd/yyyy" });
   }); 
   $(document).ready(function() {
       $('.diagnosis-date').datepicker({ format: "mm/dd/yyyy" });
   }); 
   $(document).ready(function() {
       $('.date-type').datepicker({ format: "mm/dd/yyyy" });
   }); 

   $("#spent-time-add").timepicker();

//Attach File Count Js
( function( $, window, document, undefined )
{
   $( '.file-new-upload' ).each( function()
   {
      var $input   = $( this ),
      $label    = $input.next( 'label' ),
      labelVal = $label.html();

      $input.on( 'change', function( e )
      {
         var fileName = '';

         if( this.files && this.files.length > 0 )
            fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
         else if( e.target.value )
            fileName = e.target.value.split( '\\' ).pop();

         if( fileName )
            $label.find( '.archive-name').html( fileName );
         else
            $label.html( labelVal );
      });
   });
})( jQuery, window, document );
</script>
@show

</body>
</html>
