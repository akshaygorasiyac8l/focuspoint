@extends('layouts.app')
@section('script1')
@endsection
@section('add_layout')
   @parent
@endsection
@section('listing_layout')
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
            <form id="form-consumer" action="" name="authorization-form-new">
               <div class="background-transperent">
                  <section class="content-header">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12 page-background">
                              <h1 class="page-title">New Authorization</h1>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="content">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-8 consumer-section">
                              <div class="card card-primary">
                                 <div class="card-body">
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Consumer Name</label>
                                       <div class="col-md-9">
                                          <select class="form-control droupdown mobile-drop" name="consumername">
                                            <option value="">Christopher Hua</option>
                                            <option value="">Christopher Hua 1</option>
                                            <option value="">Christopher Hua 2</option>
                                         </select>
                                         <button class="add-more-services common-button-addmore"><i class="fa fa-user view-user"></i>View Consumer Details</button>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Auth #</label>
                                       <div class="col-md-9">
                                          <select class="form-control droupdown mobile-drop" name="payername">
                                            <option value="">AUTH-000139</option>
                                            <option value="">AUTH-000140</option>
                                            <option value="">AUTH-000141</option>
                                         </select>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Intan</label>
                                       <div class="col-md-9">
                                          <input type="text" name="intan" class="form-control"  placeholder="INTAN-000328">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Insan</label>
                                       <div class="col-md-9">
                                          <input type="text" name="insan" class="form-control"  placeholder="">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 col-form-label">Service</label>
                                       <div class="col-md-9">
                                          <select class="form-control droupdown mobile-drop" name="type">
                                            <option value="">Psychiatric Diagnostic Evaluation with Med Service</option>
                                            <option value="">Psychiatric Diagnostic Evaluation with Med Service 1</option>
                                            <option value="">Psychiatric Diagnostic Evaluation with Med Service 2</option>
                                         </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 active-tool-box">
                              <div class="active-tool">
                                 <div class="card-body">
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Record #</label>
                                          <div class="col-md-7">
                                             <input type="text" name="record" class="form-control without-background" placeholder="?">
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Approval Date</label>
                                          <div class="col-md-7">
                                             <input type="text" name="approval-date" class="form-control date-select without-background approval-date" placeholder="No Approval Date">
                                          </div>
                                       </div>

                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Expiry Date</label>
                                          <div class="col-md-7">
                                             <input type="text" name="expiry-date" class="form-control date-select without-background expiry-date" placeholder="No Expiry Date">
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
                                             <input type="text" name="discharge-date" class="form-control date-select without-background date-add date-type" placeholder="No Discharge Date">
                                          </div>
                                       </div>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="section-max-unit">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-7 time-add">
                              <div class="row">
                                 <div class="col-md-3">
                                    <span class="max-unit-title">Max Units</span>
                                 </div>
                                 <div class="col-md-9">
                                    <div class="row">
                                       <div class="col-md-6 time-add">
                                          <div class="form-group">
                                             <label class="col-form-label">Per Week</label>
                                             <input type="text" name="per-week" class="form-control">
                                          </div>   
                                       </div>
                                       <div class="col-md-6 time-add">
                                          <div class="form-group">
                                             <label class="col-form-label">Per Day</label>
                                             <input type="text" name="per-hour" class="form-control">
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
                                       <div class="col-md-4 time-add">
                                          <div class="form-group">
                                             <label class="col-form-label">Units/Visits</label>
                                             <input type="text" name="units" class="form-control">
                                          </div>
                                       </div>
                                       <div class="col-md-4 time-add">
                                          <div class="form-group">
                                             <label class="col-form-label">Hours</label>
                                             <input type="text" name="hours" class="form-control">
                                          </div>
                                       </div>
                                       <div class="col-md-4 time-add">
                                          <div class="form-group">
                                             <label class="col-form-label">Bill Without Units</label>
                                             <select class="form-control" name="bill-units">
                                                <option>Yes</option>
                                                <option>No</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>                              
                           </div>
                           <div class="col-md-5"></div>
                        </div>
                     </div>
                  </section>
                  <div class="modal add-spent-time-popup fade" id="myModal" role="dialog">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <i class="fa fa-close delete-button close-model" data-dismiss="modal"></i>
                           </div>
                           <div class="modal-body">
                              <div class="row">
                                 <div class="col-md-12">
                                    <table class="add-spent-tabel common-table-info">
                                       <tr>
                                          <th>Employee Name</th>
                                          <th>Spent Time</th>
                                          <th>Comment</th>
                                          <th>Created Date</th>
                                       </tr>
                                       <tr>
                                          <td>Edward Gao</td>
                                          <td>1h 35m</td>
                                          <td></td>
                                          <td>12/22/2020 13:35</td>
                                       </tr>
                                       <tr>
                                          <td>Gregory-Harris, Tracee</td>
                                          <td>2h 20m</td>
                                          <td>Went to office</td>
                                          <td>12/25/2020 13:35</td>
                                       </tr>
                                    </table>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4 short-col">
                                    <div class="form-group">
                                       <div class="starttime" id='startdatetimepicker'>
                                          <input type="text" placeholder="Start Date And Start Time" class="form-control" />   
                                          <span class="input-group-addon calendar">
                                          </span>
                                      </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4 short-col">
                                    <div class="form-group">
                                       <div class="starttime" id='enddatetimepicker'>
                                          <input type="text" placeholder="End Date And End Time" class="form-control" />   
                                          <span class="input-group-addon calendar">
                                          </span>
                                      </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <input type="text" name="" class="form-control" placeholder="Write a comment">
                                    </div>
                                 </div>
                                 
                              </div> 
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <button class="add-new-btn">Add Spent Time</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <section class="footer-section">
                     <div class="container-fluid">
                        <div class="card-footer">
                           <button type="submit" class="btn btn-info">Save</button>
                           <button type="submit" class="btn btn-default float-right">Cancel</button>
                           <a href="#myModal" class="spent-time common-button space-remove-btn" data-toggle="modal"><i class="fa fa-hourglass common-icons"></i>Add Spent Time</a>
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
   @parent
@endsection
@section('end_listing_layout')
@endsection
@section('end_detail_layout')
@endsection
