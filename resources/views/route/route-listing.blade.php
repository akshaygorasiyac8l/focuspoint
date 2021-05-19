@extends('layouts.app')
@section('script1')
@endsection
@section('add_layout')
   
@endsection
@section('listing_layout')
    @parent
    <script type="text/javascript">
               $(document).ready(function() {
                   $('#table-general1').DataTable( {

                   "fixedHeader":    true,
                   "bInfo" :         false,
                   "bSortable":      false,
                   searching:        false,
                   paging:           false,
                   fixedColumns: {
                       leftColumns: 1,
                       rightColumns: 1
                   },
                   
                   order: [[ 1, 'asc' ]]
                
                
               });
               //       var  DT1 = $('#table-general').DataTable();
               // $(".selectAll").on( "click", function(e) {
               //     if ($(this).is( ":checked" )) {
               //         DT1.rows(  ).select();        
               //     } else {
               //         DT1.rows(  ).deselect(); 
               //     }
               // });

               } );
         </script>
         
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
                           	
                           	Routes

                           </h1>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3" id="header-btn-section">
                          <ul class="new-dropdown-hover">
                            <li class="droupdown-hover-add">
                              <a href="{{ route('route-add') }}" class="btn btn-info" id="header-new-btn">New</a>    
                            </li>
                            <!--
                            <li>
                              <button type="button" class="btn" id="header-search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </li>
                            -->
                          </ul>
                        </div>
                  </div>
               </section>
               <section class="content" id="user-listing-section">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12 consumer-section">
                                <table id="table-general1" class="display user-table" style="width:100%">
                                   <thead>
                                       <tr>
                                           
                                           <th>Title</th>
                                           
                                           
                                       </tr>
                                   </thead>
                                <tbody>
                                @if (count($routes) > 0)
                                    @foreach ($routes as $route)

                                        <tr>
                                           
                                            <td><a href="{{ route('route-edit', $route->id) }}" class="name-class">{{ $route->title }}</a></td>
                                            
                                            
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                           
                                        <td colspan="2" align="center">No Records!</td>
                                        
                                        
                                    </tr>
                                @endif

                                    
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
    <style>
    table#table-general1 tr td,table#table-general1 tr th{padding: 8px;}
    </style>
@endsection
@section('end_detail_layout')
@endsection

