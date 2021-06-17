
        <aside class="main-sidebar sidebar-dark-primary elevation-4" id="sidebar">
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item has-treeview {{ request()->is('home') ? 'active-menu' : '' }}">
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
                  <li class="nav-item has-treeview sub-menu ">
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
                        <li class="nav-item has-treeview {{ request()->is('roles') ? 'active-menu' : '' }}">
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
                        <li class="nav-item has-treeview {{ request()->is('certificate-types') ? 'active-menu' : '' }}">
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
                        <li class="nav-item has-treeview {{ request()->is('notation-types') ? 'active-menu' : '' }}">
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
                        <li class="nav-item has-treeview {{ request()->is('consumer-note-types') ? 'active-menu' : '' }}">
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
                        <li class="nav-item has-treeview {{ request()->is('reactions') ? 'active-menu' : '' }}">
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
                        <li class="nav-item has-treeview {{ request()->is('races') ? 'active-menu' : '' }}">
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
                        <li class="nav-item has-treeview {{ request()->is('ethnicities') ? 'active-menu' : '' }}">
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
                        <li class="nav-item has-treeview {{ request()->is('languages') ? 'active-menu' : '' }}">
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
                        <li class="nav-item has-treeview {{ request()->is('services') ? 'active-menu' : '' }}">
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
                  
                  <li class="nav-item has-treeview {{ request()->is('employee-listing') ? 'active-menu' : '' }}">
                     <a href="{{ route('employee-listing') }}" class="nav-link">
                        <i class="fa fa-user"></i>
                        <p>Employees</p>
                     </a>
                  </li>
                  
                  
                  <li class="nav-item has-treeview {{ request()->is('consumers-listing') ? 'active-menu' : '' }}">
                     <a href="{{ route('consumers-listing') }}" class="nav-link">
                        <i class="fa fa-user"></i>
                        <p>Consumers</p>
                     </a>
                  </li>
                  
                  <!--
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
                  -->
                  <!--
                  <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                        <i class="fa fa-database"></i>
                        <p>Compliances</p>
                     </a>
                  </li>
                  -->
                  
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
 