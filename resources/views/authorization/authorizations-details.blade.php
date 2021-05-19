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
            <form id="form-consumer">
               <div class="background-transperent">
                  <section class="content-header">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12 page-background">
                              <h1 class="page-title">Authorization-000139</h1>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="edit-section">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-8">
                              <div class="btn-box">
                                 <div class="edit">
                                    <button class="btn-edit-print"><i class="fa fa-edit common-edit-btn"></i>Edit</button>
                                 </div>
                                 <div class="mail">
                                    <button class="btn-edit-print"><i class="fa fa-envelope common-edit-btn"></i>Mail</button>
                                 </div>
                                 <div class="pdf">
                                    <button class="btn-edit-print"><i class="fa fa-file-pdf-o common-edit-btn" aria-hidden="true"></i>PDF/Print</button>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <ul class="new-dropdown-hover add-details-drop">
                                 <li class="droupdown-hover-add">
                                    <a href="service-plans-add.html" class="create-new-btn">Create a Service Plan</a><i class="fa fa-caret-down dropdown-icon" aria-hidden="true"></i>
                                    <ul class="dropdown-details">
                                       <li><a href="service-plans-add.html">Psychiatric Diagnostic Evaluation with Med Service</a></li>
                                    </ul>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="content" id="authorization-details">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-8 consumer-section">
                              <div class="card card-primary">
                                 <div class="card-body">                                    
                                    <div class="form-group row common-row">
                                       <label class="col-md-12 col-form-label title-details">Initial Intake Assessment</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Consumer Name</label>
                                       <label class="col-md-9 col-form-label-assessment name-bold">Christopher Hua</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Auth #</label>
                                       <label class="col-md-9 col-form-label-assessment">AUTH-000139</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">INTAN</label>
                                       <label class="col-md-9 col-form-label-assessment">INTAN-000328</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">INSAN</label>
                                       <label class="col-md-9 col-form-label-assessment"></label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Service</label>
                                       <label class="col-md-9 col-form-label-assessment">Psychiatric Diagnostic Evaluation with Med Service</label>
                                    </div>                                    
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 active-tool-box">
                              <div class="active-tool">
                                 <div class="card-body">
                                       <div class="form-group row tool-box new">
                                          <label class="col-md-5 col-form-label assigned-label">Record #</label>
                                          <div class="col-md-7">
                                             <label class="col-md-5 form-control without-background new-label">1234KL</label>
                                          </div>
                                       </div>

                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Approval Date</label>
                                          <div class="col-md-7">
                                             <input type="text" name="date" class="form-control approval-date without-background date-add" placeholder="No Approval Date">
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Expiry Date</label>
                                          <div class="col-md-7">
                                             <input type="text" name="date" class="form-control date-select without-background expiry-date" placeholder="No Expiry Date">
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">State</label>
                                          <div class="col-md-7">
                                             <select class="form-control active-status apprroved" name="state">
                                                <option value="">Initial Authorization</option>
                                                <option value="">Open</option>
                                                <option value="">Fixed</option>
                                                <option value="">Completed</option>
                                                <option value="">In-Progress</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Assignee</label>
                                          <div class="col-md-7">
                                            <select class="form-control active-status apprroved" name="assignee">
                                                <option value="">Gregory-Harris</option>
                                                <option value="">Name 2</option>
                                                <option value="">Name 3</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Spent Time</label>
                                          <div class="col-md-7">
                                             <input type="text" name="spent-time" class="form-control without-background date-add" id="spent-time-add" placeholder="?">
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Discharge Date</label>
                                          <div class="col-md-7">
                                             <input type="text" name="services-date" class="form-control discharge-date without-background date-add" placeholder="No Discharge Date">
                                          </div>
                                       </div>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="max-unit-details-sec">
                  	<div class="container-fluid">
                  		<div class="row">
                  			<div class="col-md-8">
	                  			<div class="row">
		                        	<div class="col-md-3">
		                        		<span class="max-unit-title common-row">Max Units</span>
		                        	</div>
		                        	<div class="col-md-9">
		                        		<div class="row">
		                        			<div class="col-md-6">
		                        				<div class="form-group">
			                                       <label class="col-form-label-assessment common-title-label">Per Week</label>
			                                       <label class="col-form-label-assessment">7</label>
			                                    </div>
		                        			</div>
		                        			<div class="col-md-6">
		                        				<div class="form-group">
			                                       <label class="col-form-label-assessment common-title-label">Per Day</label>
			                                       <label class="col-form-label-assessment">5</label>
			                                    </div>
		                        			</div>
		                        		</div>
		                        	</div>
		                        </div>
		                        <div class="row">
		                        	<div class="col-md-3">
		                        		<span class="max-unit-title">Total Approved</span>
		                        	</div>
		                        	<div class="col-md-9">
		                        		<div class="row">
		                        			<div class="col-md-4">
		                        				<div class="form-group">
			                                       <label class="col-form-label-assessment common-title-label">Units/Visits</label>
			                                       <label class="col-form-label-assessment">263</label>
			                                    </div>
		                        			</div>
		                        			<div class="col-md-4">
		                        				<div class="form-group">
			                                       <label class="col-form-label-assessment common-title-label">Hours</label>
			                                       <label class="col-form-label-assessment">300</label>
			                                    </div>
		                        			</div>
		                        			<div class="col-md-4">
		                        				<div class="form-group">
			                                       <label class="col-form-label-assessment common-title-label">Bill Without Units</label>
			                                       <label class="col-form-label-assessment">Yes</label>
			                                    </div>
		                        			</div>
		                        		</div>
		                        	</div>
		                        </div>
	                  		</div>
	                  		<div class="col-md-4"></div>
                  		</div>
                  	</div>
                  </section>
               </div>
            </form>
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