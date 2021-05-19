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
                        <div class="col-md-4 page-background">
                           <h1 class="page-title">
                           	
                           	<div class="form-group select dropdown-box" id="dropdown-box-03">                           
                           <select class="form-control droupdown consumer">
                              <option>Active - Approved</option>
                              <option>Approved Awaiting Plan Signature</option>
                              <option>Approved / Awaiting Auth</option>
                           </select>
                           <i class="fa fa-caret-down new-icon-down" aria-hidden="true"></i>
                        </div>

                           </h1>
                        </div>
                        <div class="col-md-5">
                          <div class="icon-box">
                            <button class="btn-icons-consumer"><i class="fa fa-print icon-common" aria-hidden="true"></i></button>
                            <button class="btn-icons-consumer"><i class="fa fa-trash icon-common"></i></button>
                            <button class="btn-icons-consumer"><i class="fa fa-bookmark icon-common"></i></button>
                            <button class="btn-icons-consumer"><i class="fa fa-download icon-common"></i></button>
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
               <section class="content">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12 consumer-section">
                          <table id="table-general" class="display" style="width:100%">
                            <thead>
                              <tr>
                                   <th><input type="checkbox" class="selectAll add-new-icon" name="selectAll" value="all"></th>
                                   <th>Name</th>
                                   <th>Payer Name</th>
                                   <th>Phone</th>
                                   <th>Cordinator</th>
                                   <th>Status</th>
                               </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="new-checkbox-hide"><input type="checkbox" class="add-new-icon" name=""></td>
                                <td><a href="{{ route('consumers-details') }}" class="name-class">Crystal Brandon</a></td>
                                <td>Optima</td>
                                <td>434-429-7809</td>
                                <td>Michael Wakor</td>
                                <td>Active - Approved</td>
                              </tr>
                              <tr>
                                  <td class="new-checkbox-hide"><input type="checkbox" class="add-new-icon" name=""></td>
                                  <td><a href="{{ route('consumers-details') }}" class="name-class">Hilda Colon</a></td>
                                  <td>Anthem Healthkeepers</td>
                                  <td>780-123-5555</td>
                                  <td>John Wright</td>
                                  <td>Active - Approved</td>
                              </tr>
                              <tr>
                                  <td class="new-checkbox-hide"><input type="checkbox" class="add-new-icon" name=""></td>
                                  <td><a href="{{ route('consumers-details') }}" class="name-class">Stepahnie McDonald</a></td>
                                  <td>Anthem Blue  Cross Blue Shiled</td>
                                  <td>907-123-8954</td>
                                  <td>Gregory-Harris,Tracee</td>
                                  <td>Active - Approved</td>
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
   // Tabs Show JS
   function openTabs(evt, tabsName) {
     var i, contentsection, tabs;
     contentsection = document.getElementsByClassName("contentsection");
     for (i = 0; i < contentsection.length; i++) {
       contentsection[i].style.display = "none";
     }
     tabs = document.getElementsByClassName("tabs");
     for (i = 0; i < tabs.length; i++) {
       tabs[i].className = tabs[i].className.replace(" active", "");
     }
     document.getElementById(tabsName).style.display = "block";
     evt.currentTarget.className += " active";
   }

   // Tabs active js
   $('.nav-tabs').on('click', 'li', function() {
    $('.nav-tabs li.active-tabs').removeClass('active-tabs');
       $(this).addClass('active-tabs');
   });

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
    
  // Checkbox check event icon show and hide
  $(document).ready(function() {
    $('.add-new-icon').click(function(){
      if($(this).is(':checked')) {
        $('.icon-box').slideDown();
      }
      else {
        $('.icon-box').slideUp();  
      }
    });
  });

  //checkbox check event all checkbox selected
  $(document).ready(function() {
    var selectAllItems = ".selectAll";
    var checkboxItem = ":checkbox";
    $(selectAllItems).click(function() {
      if (this.checked) {
        $(checkboxItem).each(function() {
          this.checked = true;
        });
      } else {
        $(checkboxItem).each(function() {
          this.checked = false;
        });
      }
    });
  });
</script>
<style type="text/css">
    td.new-checkbox-hide:before {
      border: 0 !important;
      width: 0 !important;
    }
    input.add-new-icon {
      margin-left: 18px;
    }
    #header-new-btn {
        padding: 6px 27px;
        margin-right: 5px;
    }
    div#dropdown-box-03 i {
        font-size: 29px;
        margin-top: 8px;
        margin-left: 10px;
    }
    #page-id-02 h1.page-title {
        margin: 0;
    }
    .form-control:focus{
       box-shadow: none;
    }
    #page-id-02 section.content-header {
        border-bottom: 1px solid #d2d6de;
        padding: 15px 4px;
        padding-bottom: 6px;
    }
    select.form-control.droupdown {
        padding: 0;
    }
    .form-control.droupdown option {
        font-size: 14px;
    }
    #page-id-02 .btn-info:hover , #page-id-02 .btn-info:active , 
    #page-id-02 .btn-info:focus {
        color: #fff;
        background: #0e7ee5;
        background-color: #0e7ee5;
    }
    div#header-btn-section {
        text-align: right;
        padding-top: 12px;
    }
    #page-id-02 section.content {
        height: 70Vh;
    }
    table#table-general {
        border: 1px solid #ddd;
        border-top: 0;
    }
    table#table-general tbody tr:hover {
        background: #f8f8f8 !important;
    }
    table#table-general tbody tr:hover td {
        background: transparent !important;
    }
    select.form-control.droupdown.consumer {
        background: unset;
    }
    .col-md-12.consumer-section {
        padding-right: 0;
        padding-left: 0;
    }
    section.content {
        padding-left: 0;
        padding-right: 0;
        padding-top: 0;
    }
    table#table-general {
        border-left: 0;
        border-right: 0;
    }
    button#header-search-btn {
        margin-right: 17px;
    }
    div#dropdown-box-03 {
        margin: 9px 0 8px;
    }
    .col-md-3.page-background {
        padding-left: 13px;
    }
    th.sorting_asc {
        pointer-events: none;
    }
    th.sorting {
        pointer-events: none;
    }    
    tr.odd td:nth-child(3) {
        padding-right: 45px;
        width: 20%;
    }
    tr.even td:nth-child(3) {
        padding-right: 45px;
        width: 20%;
    }
    tr.odd td:nth-child(2) {
        padding-right: 60px;
        width: 18%;
    }
    tr.even td:nth-child(2) {
        padding-right: 60px;
        width: 18%;
    }
    tr.odd td:nth-child(5) {
        padding-right: 70px;
        width: 20%;
    }
    tr.even td:nth-child(5) {
        padding-right: 70px;
        width: 20%;
    }
    tr.even td {
        color: #000;
    }
    tr.odd td {
        color: #000;
    }
    #page-id-02 table.dataTable.display tbody tr td {
        vertical-align: sub;
    }
    @media only screen and(max-width: 1299px){
       #page-id-02 section.content {
        height: 91.5Vh;
      }
    }
    @media screen and (max-width: 768px){
      div#header-btn-section {
        text-align: left;
      }
    }
    @media screen and (max-width: 767px){
        div#table-general_wrapper {
          overflow-x: scroll;
      }
    }
</style>

@endsection
