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
            <form id="form-consumer" name="employee-form" action="" method="POST">
            @csrf
               <div class="background-transperent">
                  <section class="content-header">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-12 page-background">
                              <h1 class="page-title">Edit Service</h1>
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
                                    <label class="col-md-3 col-form-label">Service</label>
                                    <div class="col-md-9">
                                       <div class="row">
                                          <div class="col-md-12 time-add">
                                             <input type="text" name="title" class="form-control "  placeholder="Service" value="{{$service->title}}" required>
                                          </div>
                                          
                                       </div>                                             
                                    </div>
                                 </div>
                                    
                                 
                                    
                                    
                                    
                             
                                 
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                           </div>
                        </div>
                     </div>
                  </section>
       
                  
                  <section class="footer-section">
                     <div class="container-fluid">
                        <div class="card-footer">
                           <button type="submit" class="btn btn-info" name="save">Save</button>
                           <a href="{{ route('services') }}" class="btn btn-default float-right">Cancel</a>
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


