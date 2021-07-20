@extends('layouts.app')
@section('script1')
@endsection
@section('add_layout')   
@endsection
@section('listing_layout')    
@endsection
@section('detail_layout')
   @parent
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
               <section class="content-header consumer">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-4 page-background">
                           <h1 class="page-title">{{$consumer->fname}} {{$consumer->lname}}</h1>
                        </div>
                        <div class="col-md-8 drop-down-sec">
                           <div class="row">
                              <div class="col-md-4 drop-box-control">
                                 <button onclick="window.location.href='{{ route('consumers-edit', $consumer->id) }}'" class="btn-edit">Edit</button>
                              </div>
                              <div class="col-md-4 drop-box-control">
                                 <div class="form-group new-transaction">                           
                                    <select class="form-control new-tran-field onchnagepage" style="-webkit-appearance: none;">
                                       <option value="">Select </option>
                                       <!--<option value="1">Assessment</option>-->
                                       <option value="2">Authorization</option>
                                       <option value="3">Service Plan</option>
                                       <option value="4">Consumer Notes</option>
                                       <option value="5">Document</option>
                                       <option value="6">Invoice</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4 drop-box-control">
                                 <div class="drop-down-section">
                                    <div class="form-group more-drop">                           
                                       <select class="form-control new-tran-field more onchangeData" style="-webkit-appearance: none;">
                                          <option>More</option>
                                          <option value="1">Suspended</option>
                                          <option value="0">Delete</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
              
               <section class="tab-section">
               		<div class="tab-bar">
               			<ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
			              <li class="nav-item active">
			                <a class="nav-link tabs active" id="custom-content-below-home-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-home" aria-selected="false" onclick="openTabs(event, 'overview-add')">Overview</a>
			              </li>
			              <li class="nav-item">
			                <a class="nav-link tabs" id="custom-content-below-profile-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-profile" aria-selected="false" onclick="openTabs(event, 'assessments')">Assessments</a>
			              </li>
			              <li class="nav-item">
			                <a class="nav-link tabs" id="custom-content-below-messages-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-messages" aria-selected="false" onclick="openTabs(event, 'authorizations')">Authorizations</a>
			              </li>
			              <li class="nav-item">
			                <a class="nav-link tabs" id="custom-content-below-settings-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'service-plans')">Service Plans</a>
			              </li>
                       <li class="nav-item">
                         <a class="nav-link tabs" id="custom-content-below-settings-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'consumer-notes')">Consumer Notes</a>
                       </li>
                       <!--
			              <li class="nav-item">
			                <a class="nav-link tabs" id="custom-content-below-settings-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'documents')">Documents</a>
			              </li>
                        -->
			              <li class="nav-item">
			                <a class="nav-link tabs" id="custom-content-below-settings-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'invoices')">Invoices</a>
			              </li>
			            </ul>
               		</div>
               </section>
               <section class="contentsection" id="overview-add">
                  <div class="container-fluid">
                     <div class="row mr-other">
                        <div class="col-md-3 border-set">
                           <div class="other-details-sub">
                              <h4 class="overview-title-sub">{{$consumer->salutation}}.{{$consumer->fname}} {{$consumer->lname}}</h4>
                              <p>{{$consumer->email}}</p>
                              <p>{{$phone_no}}</p>
                              <a href="javascript:;" class="deleteconsumer" data="{{$consumer->id}}" >Delete</a>
                              <h4 class="address-title">Address</h4>
                              <span class="address-info">{{$authorization_addresses->address1}} <br>
                              @if($authorization_addresses->address2)
                              {{$authorization_addresses->address2}}, <br>
                              @endif
                              @if($authorization_addresses->city)
                              {{$authorization_addresses->city}}, 
                          @endif
                          {{$authorization_addresses->state_name}} <br>
                          @if($authorization_addresses->zipcode)
                              {{$authorization_addresses->zipcode}},@endif @if($authorization_addresses->country_name){{$authorization_addresses->country_name}}.@endif
                              </span>
                           </div>
                        </div>
                        <div class="col-md-9 total-price-bottom">
                           <div class="row chris-section">
                              <div class="col-md-4 total-payment">
                                 <h2 class="tot-title">Total Payment</h2>
                                 <a href="#myModal" data-toggle="modal" class="price">$0</a>
                              </div>
                              <div class="col-md-4 total-price">
                                 <h2 class="tot-title">Outstanding Receivables</h2>
                                 <a href="#myModal" data-toggle="modal" class="sec-price">$0</a>
                              </div>
                              <div class="col-md-4">
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
             
			   
			   </section>
               <section class="contentsection" id="assessments">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12 consumer-section">
                          <table id="table-general" class="display assessment-table" style="width:100%">
                            <thead>
                              <tr class="table-header">
                                   <th>Date</th>
                                   <th>Assessment #</th>
                                   <th>Payer Name</th>
                                   <th>Employee Name</th>
                                   <th>Created Date</th>
                                   <th>Total Hours</th>
                                   <th>Status</th>
                               </tr>
                            </thead>
                            <tbody>
                              @foreach($assessments as $assessment)
                              <tr class="table-body">
                                <td><a class="name-class">{{$assessment->assessment_date}}</a></td>
                                <td>{{$assessment->assessment_no}}</td>
                                <td>{{$assessment->payer_name}}</td>
                                <td>{{$assessment->assignee_name}}</td>
                                <td>{{$assessment->created_date}}</td>
                                <td>{{$assessment->total_hours}}</td>
                                <td>{{$assessment->status}}</td>
                              </tr>
                              @endforeach
                              
                            </tbody>
                          </table>
                        </div>
                     </div>
                  </div>
               </section>
               <section class="contentsection" id="authorizations">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12 consumer-section">
                          <table id="table-general" class="display assessment-table" style="width:100%">
                            <thead>
                              <tr class="table-header">
                                   <th>Date</th>
                                   <th>Auth #</th>
                                   <th>Consumer Name</th>
                                   <th>Payer Name</th>
                                   <th>Service Name	</th>
                                   <th>Start Date</th>
                                   <th>End Date</th>
                                   <th>Status</th>
                               </tr>
                            </thead>
                            <tbody>
                              @foreach($authorizations as $authorization)
                              <tr class="table-body">
                                <td><a class="name-class">{{$authorization->created_date}}</a></td>
                                <td>{{$authorization->auth_no}}</td>
                                <td>{{$authorization->consumer_name}}</td>
                                <td>{{$authorization->payer_name}}</td>
                                <td>{{$authorization->service_name}}</td>
                                <td>{{$authorization->approve_date}}</td>
                                <td>{{$authorization->expiry_date}}</td>
                                <td>{{$authorization->status}}</td>
                              </tr>
                              @endforeach
                              
                            </tbody>
                          </table>
                        </div>
                     </div>
                  </div>
               </section>
               <section class="contentsection" id="service-plans"></section>
               <section class="contentsection" id="consumer-notes"></section>
               <section class="contentsection" id="documents"></section>
               <section class="contentsection" id="invoices"></section>
            </div>
         </div>
  
   

@endsection
@section('script2')
@endsection
@section('end_add_layout')
   
@endsection
@section('end_listing_layout')
@endsection
@section('end_detail_layout')
   @parent
   <script>
   $(document).ready(function() {
       
       
       $("html").on("change",".onchangeData",function(){
           var selval = $(this).val();
          
           if(selval=="1"){
               window.location.href = "{{route('consumers-suspended', $consumer->id)}}";
           }else if(selval=="0"){
			   var r = confirm("Are you sure Delete??");
			   if (r == true) {
				window.location.href = "{{route('consumers-delete', $consumer->id)}}";
			   }
           }
       });
       
       $("html").on("change",".onchnagepage",function(){
           var selval = $(this).val();
          
           if(selval=="1"){
               window.location.href = "{{route('assessments-add', [1,$consumer->id])}}";
           }else if(selval=="2"){
               window.location.href = "{{route('authorizations-add', $consumer->id)}}";
           }
       });
	   $("html").on("click",".deleteconsumer",function(){
			var r = confirm("Are you sure Delete??");
			if (r == true) {
				window.location.href = "{{route('consumers-delete', $consumer->id)}}";
			}
	   });
   });
   </script>
   
@endsection