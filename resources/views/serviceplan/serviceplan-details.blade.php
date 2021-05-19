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
                           <div class="col-md-6 page-background">
                              <h1 class="page-title">Service Plan-000285</h1>
                           </div>
                           <div class="col-md-6 new-attach-sec">
                              <div class="form-group new-image">
                                <div class="form-group" id="name-display">
                                   <input type="" name="file-name" class="form-control attch-name" id="form-group-add" value="" placeholder="Attach Files">
                                </div>
                                <div class="file-attach-upload">
                                   <i class="fa fa-paperclip paper-upload" aria-hidden="true"></i>
                                   <input type="file" name="file-attach" class="form-control file-new-upload" id="file-attach" placeholder="" multiple="" value="" data-multiple-caption="{count}">
                                   <label for="file-attach"><span class="archive-name"></span></label>
                                </div>
                             </div>
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
                           <div class="col-md-4 time-add-left">
                              <ul class="new-dropdown-hover add-details-drop">
                                 <li class="droupdown-hover-add">
                                    <a href="consumer-notes-add.html" class="create-new-btn">Create an Consumer Note</a><i class="fa fa-caret-down dropdown-icon" aria-hidden="true"></i>
                                    <ul class="dropdown-details">
                                       <li><a href="consumer-notes-add.html">Psychiatric Diagnostic Evaluation with Med Service</a></li>
                                    </ul>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="content" id="service-plans-details">
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
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Sp #</label>
                                       <label class="col-md-9 col-form-label-assessment">SP-000038</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Location</label>
                                       <label class="col-md-9 col-form-label-assessment">Office</label>
                                    </div>
                                    <div class="form-group row common-row">
                                       <label class="col-md-3 col-form-label-assessment common-title-label">Communication</label>
                                       <label class="col-md-9 col-form-label-assessment">In-Person</label>
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
                                          <label class="col-md-5 col-form-label assigned-label">Priority</label>
                                          <div class="col-md-7">
                                             <select class="form-control active-status apprroved" name="priority">
                                                <option value="">In Crisis</option>
                                                <option value="">In Crisis 1</option>
                                                <option value="">In Crisis 2</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">Date</label>
                                          <div class="col-md-7">
                                             <input type="text" name="date" class="form-control date-select without-background date-add" placeholder="No Date">
                                          </div>
                                       </div>
                                       <div class="form-group row tool-box">
                                          <label class="col-md-5 col-form-label assigned-label">State</label>
                                          <div class="col-md-7">
                                             <select class="form-control active-status apprroved" name="state">
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
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="section-max-unit" id="services-plan-details">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-8 cols-space-add">
                              <div class="acc common-text-box">
                                 <div class="acc__card">
                                    <div class="acc__title">03.03.21 La'Willie will learn and utilize coping skills to maintain stability of symptom management in the community and in the home 4out of 5 days over the next 30 days.</div>
                                    <div class="acc__panel">
                                       <span class="gols-details-title">Objectives</span>
                                       <div class="form-group row">
                                          <div class="col-md-12 common-text-box">
                                             <textarea class="form-control txt-common-obj" name="objectives"></textarea>
                                          </div>
                                       </div>
                                       <span class="gols-details-title">Intervention</span>
                                       <div class="form-group row">
                                          <div class="col-md-12 common-text-box">
                                             <textarea class="form-control txt-common-obj" name="intervention"></textarea>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="acc__card">
                                    <div class="acc__title">03.03.21 La'Willie will learn and utilize coping skills to maintain stability of symptom management in the community and in the home 4out of 5 days over the next 30 days.</div>
                                    <div class="acc__panel">
                                       <span class="gols-details-title">Objectives</span>
                                       <div class="form-group row">
                                          <div class="col-md-12 common-text-box">
                                             <textarea class="form-control txt-common-obj" name="objectives"></textarea>
                                          </div>
                                       </div>
                                       <span class="gols-details-title">Intervention</span>
                                       <div class="form-group row">
                                          <div class="col-md-12 common-text-box">
                                             <textarea class="form-control txt-common-obj" name="intervention"></textarea>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="acc__card">
                                    <div class="acc__title">03.03.21 La'Willie will learn and utilize coping skills to maintain stability of symptom management in the community and in the home 4out of 5 days over the next 30 days.</div>
                                    <div class="acc__panel">
                                       <span class="gols-details-title">Objectives</span>
                                       <div class="form-group row">
                                          <div class="col-md-12 common-text-box">
                                             <textarea class="form-control txt-common-obj" name="objectives"></textarea>
                                          </div>
                                       </div>
                                       <span class="gols-details-title">Intervention</span>
                                       <div class="form-group row">
                                          <div class="col-md-12 common-text-box">
                                             <textarea class="form-control txt-common-obj" name="intervention"></textarea>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="acc__card">
                                    <div class="acc__title">03.03.21 La'Willie will learn and utilize coping skills to maintain stability of symptom management in the community and in the home 4out of 5 days over the next 30 days. 03.03.21 La'Willie will learn and utilize coping skills to maintain stability of symptom management in the community and in the home 4out of 5 days over the next 30 days. 03.03.21 La'Willie will learn and utilize coping skills to maintain stability of symptom management in the community and in the home 4out of 5 days over the next 30 days.</div>
                                    <div class="acc__panel">
                                       <span class="gols-details-title">Objectives</span>
                                       <div class="form-group row">
                                          <div class="col-md-12 common-text-box">
                                             <textarea class="form-control txt-common-obj" name="objectives"></textarea>
                                          </div>
                                       </div>
                                       <span class="gols-details-title">Intervention</span>
                                       <div class="form-group row">
                                          <div class="col-md-12 common-text-box">
                                             <textarea class="form-control txt-common-obj" name="intervention"></textarea>
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