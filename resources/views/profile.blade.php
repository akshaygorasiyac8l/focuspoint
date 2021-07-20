@extends('layouts.app')
@section('title', 'Home')
@section('script1')
@endsection

@section('content')
         <div class="content-wrapper">
            <form id="profile-form" action="{{ route('profile') }}" method="POST">
            @csrf
            
            
            


               <div class="background-transperent">
               
                  <section class="content" id="profile-add">
                     
                     @if (count($errors) > 0)
                         <div class="alert alert-danger">
                             <ul>
                                 @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                             </ul>
                         </div>
                      @endif
                      
                      <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-8 consumer-section">
                              <div class="card card-primary">
                                 
                                    <div class="card-body">
                                       <div class="form-group row">
                                          <label for="inputEmail3" class="col-md-3 col-form-label">Full Name</label>
                                          <div class="col-md-9">
                                             <div class="row salutions">
                                                <div class="col-md-3 short-col">
                                                   <select class="form-control droupdown mobile-drop" name="salution">
                                                   <option  value="">Salutation</option>
                                                   <option <?php if($user->salutation=='Mr') { echo "selected";}?> value="Mr">Mr.</option>
                                                   <option <?php if($user->salutation=='Mrs') { echo "selected";}?> value="Mrs">Mrs.</option>
                                                   <option <?php if($user->salutation=='Ms') { echo "selected";}?> value="Ms">Ms.</option>
                                                   <option <?php if($user->salutation=='Miss') { echo "selected";}?> value="Miss">Miss.</option>
                                                   <option <?php if($user->salutation=='Dr') { echo "selected";}?> value="Dr">Dr.</option>
                                                </select>                                             
                                                </div>
                                                <div class="col-md-4">
                                                   <input type="text" class="form-control mobile-drop" placeholder="First Name" name="fname" value="{{$user->fname}}">
                                                </div>
                                                <div class="col-md-4">
                                                   <input type="text" class="form-control mobile-drop"  placeholder="Last Name" name="lname" value="{{$user->lname}}">
                                                </div>
                                                <div class="col-md-1"></div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="form-group row">
                                          <label for="inputPassword3" class="col-md-3 col-form-label">Login</label>
                                          <div class="col-md-9 time-add">
                                             <select class="form-control droupdown width-add" name="login">
                                                <option value="">Select</option>
                                                <option value="1">Login 1</option>
                                                <option value="2">Login 1</option>
                                             </select>
                                          </div>
                                       </div>
									   
                                       <!-- <div class="form-group row">
                                          <label for="inputPassword3" class="col-md-3 col-form-label">Avatar</label>
                                          <div class="col-md-9 time-add">
                                             <input type="text" class="form-control width-add" name="avatar" placeholder="">
                                          </div>
                                       </div> -->
                                       <div class="form-group row">
                                          <label for="inputPassword3" class="col-md-3 col-form-label">Email Address</label>
                                          <div class="col-md-9 time-add">
                                             <input type="email" class="form-control width-add" name="email" placeholder="" value="{{$user->email}}" disabled>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label for="inputPassword3" class="col-md-3 col-form-label">Local Time Zone</label>
                                          <div class="col-md-9">
                                             <div class="row salutions">
                                                <div class="col-md-3 country-add">
                                                   <input type="text" class="form-control mobile-drop" name="country" placeholder="Country" value="{{$user->country}}">
                                                </div>
                                                <div class="col-md-8 short-col">
                                                   <input type="text" class="form-control mobile-drop" name="time"  placeholder="Thursday, 11 March 2021" value="{{$user->time}}">
                                                </div>
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
                  <section class="footer-section">
                     <div class="container-fluid">
                        <div class="card-footer">
                           <button type="submit" name="save" class="btn btn-info">Save</button>
                           <button type="submit" class="btn btn-default float-right">Cancel</button>
                         </div>
                     </div>
                  </section>
               </div>
            </form>
         </div>

@endsection


@section('script2')
@endsection