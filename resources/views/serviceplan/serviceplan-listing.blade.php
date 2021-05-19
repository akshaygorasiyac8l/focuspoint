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
                              <a href="{{ route('serviceplan-add') }}" class="btn btn-info" id="header-new-btn">New</a> 
                            </li>
                            <li>
                              <button type="button" class="btn" id="header-search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </li>
                          </ul>
                        </div>
                  </div>
               </section>
               <section class="content" id="service-plans-section">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12 consumer-section">
                          <table id="table-general" class="display service-table" style="width:100%">
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
                                <td><a href="{{ route('serviceplan-details') }}" class="name-class">08/02/2020</a></td>
                                <td>SP-000143</td>
                                <td>Stepahnie McDonald</td>
                                <td>Anthem Blue Cross Blue Shield</td>
                                <td>Gregory-Harris,Tracee</td>
                                <td>8/12/2020 09:02</td>
                                <td>01:15</td>
                                <td>Completed</td>
                              </tr>
                             <tr>
                                <td></td>
                                <td><a href="{{ route('serviceplan-details') }}" class="name-class">07/28/2020</a></td>
                                <td>SP-000142</td>
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
@endsection
@section('end_add_layout')   
@endsection
@section('end_listing_layout')
    @parent
@endsection
@section('end_detail_layout')
@endsection
