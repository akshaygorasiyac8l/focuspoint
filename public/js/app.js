// Tabs Js
function openTabs(evt, tabsName) {
  var i, contentsection, tabs;
  contentsection = document.getElementsByClassName("contentsection");
  for (i = 0; i < contentsection.length; i++) {
    contentsection[i].style.display = "none";
  }
  tabs = document.getElementsByClassName("tabs");
  for (i = 0; i < tabs.length; i++) {
    tabs[i].className = tabs[i].className.replace(" active", "");
  }
  document.getElementById(tabsName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Mobile Menu active Js
function myFunction() {
  var x = document.getElementById("sidebar");
  if (x.className === "main-sidebar") {
    x.className += " sidebar-hide";
  } else {
    x.className = "main-sidebar";
  }
}










   
   //Form Submit data add
   $(document).ready(function(){
     $('.btn-add').click(function(){
       var datastring=$("#submit-form").serialize();
       $.ajax({
           type:"POST",
           url:"https://httpbin.org/post",
           data:datastring,
           dataType:"json",
           success:function(data){
        var obj=JSON.stringify(data);
       $('.check-sec').append('<div class="check-parts"><input type="checkbox" name="" class="check-input"><label class="lbl-check">'+data['form']['select']+'</label></div>');
       },
       error:function(){
       $('.check-sec').append('error handing here');
       }
       });
     });
   });

    // User New Contact



    

    // New Phone Field Add


    // New Problem Tabs Field Add


    // New Behaviors Tabs Field Add




  // Add Spplit time hide show
  $(document).ready(function() {
    $("#spent-time-new").click(function(){
      $("#spent-time-section").slideDown();
    });
    $("#close-section").click(function(){
      $("#spent-time-section").slideUp();
    });
  });

  //Row Class Add And Remove.
  jQuery(document).ready(function(){
    jQuery('.modal-authorization-tr').click(function(event){
       jQuery('.tr-active-show').removeClass('tr-active-show');
       jQuery(this).addClass('tr-active-show');
       event.preventDefault();
    });
  });

  // Dropdown Multi Select add
  $(document).ready(function() {
     var max_fields      = 100;
     var wrapper         = $(".add-new-consumers"); 
     var add_button      = $(".add-more-consumers"); 
     
     var x = 1; 
     $(add_button).click(function(e){ 
         e.preventDefault();
         if(x < max_fields){ 
             x++; 
             $(wrapper).append('<div class="row"> <div class="col-md-11"> <div class="dropdown-container"> <div class="dropdown-button noselect"> <div class="dropdown-label">Assign More Consumers</div><div class="dropdown-quantity"></div><i class="fa fa-caret-down arrow-right-consumer"></i> </div><div class="dropdown-list" style="display: none;"> <input type="search" placeholder="Filter Users, Groups, and Teams" class="form-control dropdown-search"/> <ul class="new-dropdown-ul"> <li> <input type="checkbox" class="check-searchbox" name=""> <label class="consumes-name-list">Rebrand Apps Team</label> </li><li> <input type="checkbox" class="check-searchbox" name=""> <label class="consumes-name-list">Aos Team</label> </li><li> <input type="checkbox" class="check-searchbox" name=""> <label class="consumes-name-list">Black Mountain Commodities - Team</label> </li><li> <input type="checkbox" class="check-searchbox" name=""> <label class="consumes-name-list">Bychance - Team</label> </li><li> <input type="checkbox" class="check-searchbox" name=""> <label class="consumes-name-list">Exorgicenergy - Team</label> </li><li> <input type="checkbox" class="check-searchbox" name=""> <label class="consumes-name-list">Global Developers</label> </li></ul> </div></div></div><div class="col-md-1"> <div class="delete-section new-delete-add consumer-delete"><i class="fa fa-close delete-button delete"></i></div></div></div>'); //add input box
         }
       else
       {
       alert('You Reached the limits')
       }
     });
     $(wrapper).on("click",".delete", function(e){ 
         e.preventDefault(); $(this).parent().parent().parent().remove(); x--;
     });
  });

  // Dropdown Add for Consumers Note Page
  $(document).ready(function() {
     var max_fields      = 100;
     var wrapper         = $(".consumer-new-add"); 
     var add_button      = $(".more-consumers-add"); 
     
     var x = 1; 
     $(add_button).click(function(e){ 
         e.preventDefault();
         if(x < max_fields){ 
             x++; 
             $(wrapper).append('<div class="row"><div class="col-md-11 consumer-new-add"><select class="form-control droupdown mobile-drop desktop-textbox" name="consumername"><option value="">Select</option><option value="">John Doe 1</option><option value="">John Doe 2</option></select></div><div class="col-md-1"><div class="delete-section new-delete-add consumer-delete"><i class="fa fa-close delete-button delete"></i></div></div></div>'); //add input box
         }
       else
       {
       alert('You Reached the limits')
       }
     });
     $(wrapper).on("click",".delete", function(e){ 
         e.preventDefault(); $(this).parent().parent().parent().remove(); x--;
     });
  });



  // Dropdown Add for Consumers Note Details Page
  $(document).ready(function() {
     var max_fields      = 100;
     var wrapper         = $(".consumer-add-details"); 
     var add_button      = $(".consumers-add-details"); 
     
     var x = 1; 
     $(add_button).click(function(e){ 
         e.preventDefault();
         if(x < max_fields){ 
             x++; 
             $(wrapper).append('<div class="row"><div class="col-md-11 consumer-new-add"><select class="form-control droupdown mobile-drop desktop-textbox" name="consumername"><option value="">Select</option><option value="">John Doe 1</option><option value="">John Doe 2</option></select></div><div class="col-md-1"><div class="delete-section new-delete-add consumer-delete"><i class="fa fa-close delete-button delete"></i></div></div></div>'); //add input box
         }
       else
       {
       alert('You Reached the limits')
       }
     });
     $(wrapper).on("click",".delete", function(e){ 
         e.preventDefault(); $(this).parent().parent().parent().remove(); x--;
     });
  });

   // Multi Select Dropdown Js
   $('.dropdown-container')
   $(document).on('click', '.dropdown-button', function() {
        $(this).siblings('.dropdown-list').toggle();
   })
   $(document).on('input', '.dropdown-search', function() {
      var target = $(this);
      var dropdownList = target.closest('.dropdown-list');
      var search = target.val().toLowerCase();
    
      if (!search) {
            dropdownList.find('li').show();
            return false;
        }
    
      dropdownList.find('li').each(function() {
         var text = $(this).text().toLowerCase();
            var match = text.indexOf(search) > -1;
            $(this).toggle(match);
        });
   })
   $(document).on('change', '[type="checkbox"]', function() {
        var container = $(this).closest('.dropdown-container');
   });

  // Consumer notes keys add rows
  $(document).ready(function() {
     var max_fields      = 100;
     var wrapper         = $(".new-keys-items"); 
     var add_button      = $(".add-more-items-keys"); 
     
     var x = 1; 
     $(add_button).click(function(e){ 
         e.preventDefault();
         if(x < max_fields){ 
             x++; 
             $(wrapper).append('<div class="row"> <div class="col-md-3"> <span class="gols-details-title">Assessment</span> <div class="form-group row"> <div class="col-md-12"> <textarea class="form-control" name="intervention" placeholder="Type or Copy Paste" rows="4"></textarea> </div></div></div><div class="col-md-9 short-col"> <span class="gols-details-title">Key</span> <div class="box-button-key"> <a class="key-btn">1</a> <a class="key-btn">2</a> <a class="key-btn">3</a> <a class="key-btn">4</a> <a class="key-btn">5</a> <a class="key-btn">6</a> <a class="key-btn">7</a> <a class="key-btn">8</a> <a class="key-btn">9</a> <a class="key-btn">10</a> <a class="key-btn">11</a> <a class="key-btn">12</a> <a class="key-btn">13</a> <a class="key-btn">14</a> <a class="key-btn">15</a> <a class="key-btn">16</a> <i class="fa fa-close delete-button delete"></i> </div></div></div>'); //add input box
         }
       else
       {
       alert('You Reached the limits')
       }
     });
     $(wrapper).on("click",".delete", function(e){ 
         e.preventDefault(); $(this).parent().parent().parent().remove(); x--;
     });
  });



// Sidebar active menu js
$(document).ready(function(){
  $('.nav-sidebar').on('click', 'li a', function() {
    $('.nav-sidebar .active-menu').removeClass('active-menu');
    $(this).addClass('active-menu');
  }); 
});
 
// Hide show button
$(document).ready(function(){
  $('#ban-add').click(function(){
     $('#ban-add').hide();
     $('#unban-add').show();
  });
});
$(document).ready(function(){
  $('#unban-add').click(function(){
     $('#unban-add').hide();
     $('#ban-add').show();
  });
});

// Attch File Count JS
$(document).ready(function(){
   ( function( $, window, document, undefined )
   {
      $( '.file-new-upload' ).each( function()
      {
         var $input   = $( this ),
         $label    = $input.next( 'label' ),
         labelVal = $label.html();

         $input.on( 'change', function( e )
         {
            var fileName = '';

            if( this.files && this.files.length > 0 )
               fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else if( e.target.value )
               fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
               $label.find( '.archive-name').html( fileName );
            else
               $label.html( labelVal );
         });
      });
   })( jQuery, window, document );
});

// Tabel Scrollbar scroll JS
$(document).ready(function(){
  var $hs = $('.table-scrollbar');
   var $sLeft = 0;
   var $hsw = $hs.outerWidth(true);
   $( window ).resize(function() {
     $hsw = $hs.outerWidth(true);
   });
   function scrollMap($sLeft) {
     $hs.scrollLeft($sLeft);
   }
   $hs.on('mousewheel', function(e) {
     var $max = $hsw * 2 + (-e.originalEvent.wheelDeltaY);
     if ($sLeft > -1){
       $sLeft = $sLeft + (-e.originalEvent.wheelDeltaY);
     } else {
       $sLeft = 0;
     }
     if ($sLeft > $max) {
       $sLeft = $max;
     }
     if(($sLeft > 0) && ($sLeft < $max)) {
       e.preventDefault();
       e.stopPropagation(); 
     }
     scrollMap($sLeft);
   });
});

// User Profile icon click menu show
$(document).ready(function(){
  $('#user-add-icon').click(function(){
      $("#drop-down-profile").toggleClass('show');
  });
});
$(document).ready(function(){
  $('#user-mobile-icon').click(function(){
    $("#mobile-dropdown").toggleClass('show-add');
  });
});