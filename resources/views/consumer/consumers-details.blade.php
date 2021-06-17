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
                                    <select class="form-control new-tran-field new">
                                       <option>New Transaction</option>
                                       <option>New Transaction 1</option>
                                       <option>New Transaction 2</option>
                                    </select>
                                    <i class="fa fa-angle-down new-tran"></i>
                                 </div>
                              </div>
                              <div class="col-md-4 drop-box-control">
                                 <div class="drop-down-section">
                                    <div class="form-group more-drop">                           
                                       <select class="form-control new-tran-field more" style="-webkit-appearance: none;">
                                          <option>More</option>
                                          <option>More 1</option>
                                          <option>More 2</option>
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
			              <li class="nav-item">
			                <a class="nav-link tabs" id="custom-content-below-settings-tab" data-toggle="pill" role="tab" aria-controls="custom-content-below-settings" aria-selected="true" onclick="openTabs(event, 'documents')">Documents</a>
			              </li>
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
                              <h4 class="overview-title-sub">Mr.Christopher Hua</h4>
                              <p>chris@gmail.com</p>
                              <p>+16179804444</p>
                              <a href="">Delete</a>
                              <h4 class="address-title">Address</h4>
                              <span class="address-info">7229 Andystorley <br>
                              New Island Street, <br>
                              Richey, Florida <br>
                              34653, U.S.A.
                              </span>
                           </div>
                        </div>
                        <div class="col-md-9 total-price-bottom">
                           <div class="row chris-section">
                              <div class="col-md-4 total-payment">
                                 <h2 class="tot-title">Total Payment</h2>
                                 <a href="#myModal" data-toggle="modal" class="price">$2050</a>
                              </div>
                              <div class="col-md-4 total-price">
                                 <h2 class="tot-title">Outstanding Receivables</h2>
                                 <a href="#myModal" data-toggle="modal" class="sec-price">$375</a>
                              </div>
                              <div class="col-md-4">
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
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
                                          <input type="text" name="first-name" class="form-control" placeholder="">
                                       </div>
                                    </div>
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
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Last Name</label>
                                       <div class="col-md-9">
                                          <input type="text" name="last-name" class="form-control" placeholder="">
                                       </div>
                                    </div>
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
                                 </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                           <div class="btn-section-consumer">
                              <button type="button" class="btn btn-primary btn-add-search" data-dismiss="modal">Search</button>
                              <button type="button" class="btn btn-default btn-cancle" data-dismiss="modal">Cancle</button>
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
                                   <th>Date Entry</th>
                                   <th>Total Hours</th>
                                   <th>Status</th>
                               </tr>
                            </thead>
                            <tbody>
                              <tr class="table-body">
                                <td><a class="name-class">07/22/2020</a></td>
                                <td>ASMT-000501</td>
                                <td>Anthem Blue Cross Blue Shield</td>
                                <td>Gregory-Harris,Tracee</td>
                                <td>07/31/2020 13:32</td>
                                <td>01:15</td>
                                <td>Completed</td>
                              </tr>
                              <tr class="table-body">
                                  <td><a class="name-class">07/11/2020</a></td>
                                  <td>ASMT-000500</td>
                                  <td>VA Premiere Eliite</td>
                                  <td>Gregory-Harris,Tracee</td>
                                  <td>07/12/2020 15:40</td>
                                  <td>02:30</td>
                                  <td>Pending Approval</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                     </div>
                  </div>
               </section>
               <section class="contentsection" id="authorizations"></section>
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
@endsection