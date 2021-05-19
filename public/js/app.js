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

 // Add Payer Info
   $(document).ready(function() {
       var max_fields      = 3;
       var wrapper         = $(".table-payer-info"); 
       var add_button      = $(".add_form_field"); 
       
       var x = 1; 
       $(add_button).click(function(e){ 
           e.preventDefault();
           if(x < max_fields){ 
              x++; 
              $(wrapper).append('<tr class="tr-payer-info common-tr-info"><td> <select class="form-control droupdown custom-payer-field common-text-box-new" name="ahena"><option value="" disabled="disabled" selected="selected">Select Payer Name</option><option value="">Ahena</option><option value="">Ahena 1</option><option value="">Ahena 2</option> </select></td><td> <input type="text" name="policy" class="form-control custom-payer-field common-text-box-new" placeholder="Policy #"></td><td> <select class="form-control droupdown custom-payer-field common-text-box-new self-pay-text insurance-dropdown-new" name="insurance"><option value="">Select</option><option value="medicaid">Medicaid</option><option value="medicare">Medicare</option><option value="private insurance">Private Insurance</option><option value="self pay">Self Pay</option> </select></td><td> <input type="text" name="co-pay" class="form-control custom-payer-field common-text-box-new" placeholder="Co-pay Amount"></td><td class="delete-section"><i class="fa fa-close delete-button delete"></i></td></tr><tr><td></td><td></td><td><div class="new-dropdown-open"><div class="row"><div class="col-md-12"> <label class="col-form-label user">Amount</label></div><div class="col-md-12"> <select name="select" class="form-control droupdown" name="user"><option value="5">$5</option><option value="10">$10</option><option value="15">$15</option><option value="20">$20</option><option value="25">$25</option><option value="30">$30</option><option value="35">$35</option><option value="40">$40</option><option value="45">$45</option><option value="50" selected="selected">$50</option> </select><div class="btn-section"> <button type="button" class="btn btn-primary btn-add common-btn-close" data-dismiss="modal">Update</button> <button type="button" class="btn btn-default btn-cancle common-btn-close" data-dismiss="modal">Cancel</button></div></div></div></div></td><td></td></tr>'); //add input box
              $('.insurance-dropdown-new').on('change', function(){
                $('.new-dropdown-open').slideUp();
                 $('#' + $(this).val()).slideDown();
                 if($(this).val() == 'self pay') {
                   $('.new-dropdown-open').slideDown();
                 }
              });
              $('.common-btn-close').click(function(){
                $('.new-dropdown-open').slideUp();
             });
           }
         else
         {
         alert('You Reached the limits')
         }
       });
       
       $(wrapper).on("click",".delete", function(e){ 
           e.preventDefault(); $(this).parent().parent().remove(); x--;
       })
   });

   // Add Contact Persons.
   $(document).ready(function() {
       var max_fields      = 100;
       var wrapper         = $(".table-contact-person"); 
       var add_button      = $(".add_form_contact"); 
       
       var x = 1; 
       $(add_button).click(function(e){ 
           e.preventDefault();
           if(x < max_fields){ 
               x++; 
               $(wrapper).append('<tr class="tr-contact-person common-tr-info"><td><select class="form-control droupdown custom-contact-field common-text-box-new"><option>Select</option><option value="mr">Mr.</option><option value="mrs">Mrs.</option><option value="ms">Ms.</option><option value="miss">Miss.</option><option value="dr">Dr.</option></select></td><td><input class="form-control custom-contact-field common-text-box-new" placeholder=""></td><td><input class="form-control custom-contact-field common-text-box-new" placeholder=""></td><td><select class="form-control droupdown custom-contact-field common-text-box-new"><option>Select</option><option>Select 1</option><option>Select 2</option></select></td><td><input class="form-control custom-contact-field common-text-box-new" placeholder=""></td><td><select class="form-control droupdown custom-contact-field common-text-box-new"><option>Select</option><option value="mail">Mail</option><option value="temporary tddress">Temporary Address</option><option value="other">Other</option></select></td><td><input class="form-control custom-contact-field common-text-box-new" placeholder=""></td><td><input class="form-control custom-contact-field common-text-box-new" placeholder=""></td><td><input class="form-control custom-contact-field common-text-box-new" placeholder=""></td><td><input class="form-control custom-contact-field common-text-box-new" placeholder=""></td><td><select class="form-control droupdown custom-contact-field common-text-box-new"><option>Select</option><option>Gujarat</option><option>Rajasthan</option></select></td><td><select class="form-control droupdown custom-contact-field common-text-box-new"><option>Select</option><option>India</option><option>UK</option></select></td><td class="delete-section"><i class="fa fa-close delete-button delete"></i></td></tr>'); //add input box
           }
         else
         {
         alert('You Reached the limits')
         }
       });
       
       $(wrapper).on("click",".delete", function(e){ 
           e.preventDefault(); $(this).parent().parent().remove(); x--;
       })
   });

   // Add Contact Diagnosis
   $(document).ready(function() {
       var max_fields      = 100;
       var wrapper         = $(".table-diagnosis-notations"); 
       var add_button      = $(".add_form_diagnosis"); 
       
       var x = 1; 
       $(add_button).click(function(e){ 
           e.preventDefault();
           if(x < max_fields){ 
               x++; 
               $(wrapper).append('<tr class="tr-diagnosis-info common-tr-info"><td><select class="form-control droupdown custom-diagnosis-field common-text-box-new"><option>Select</option><option>Select 1</option><option>Select 2</option></select></td><td><select class="form-control droupdown custom-diagnosis-field common-text-box-new"><option>Select</option><option>Select 1</option><option>Select 2</option></select></td><td><input class="form-control custom-diagnosis-field diagnosis-date common-text-box-new" placeholder=""></td><td><input class="form-control custom-diagnosis-field common-text-box-new" placeholder=""></td><td><input class="form-control custom-diagnosis-field common-text-box-new" placeholder=""></td><td><input class="form-control custom-diagnosis-field common-text-box-new" placeholder=""></td><td><select class="form-control droupdown custom-diagnosis-field common-text-box-new"><option>Select</option><option value="active">Active</option><option value="inactive">Inactive</option></select></td><td class="delete-section"><i class="fa fa-close delete-button delete"></i></td></tr>'); //add input box
           }
         else
         {
         alert('You Reached the limits')
         }
       });
       
       $(wrapper).on("click",".delete", function(e){ 
           e.preventDefault(); $(this).parent().parent().remove(); x--;
       })
   });

   // Add Medications
   $(document).ready(function() {
       var max_fields      = 100;
       var wrapper         = $(".table-medications"); 
       var add_button      = $(".add_form_medications"); 
       
       var x = 1; 
       $(add_button).click(function(e){ 
           e.preventDefault();
           if(x < max_fields){ 
               x++; 
               $(wrapper).append('<tr class="tr-medications-info common-tr-info"><td><input class="form-control custom-medications-field common-text-box-new" placeholder=""></td><td><input class="form-control custom-medications-field common-text-box-new" placeholder=""></td><td><input class="form-control custom-medications-field common-text-box-new" placeholder=""></td><td><select class="form-control droupdown custom-medications-field common-text-box-new"><option>Select</option><option>Select 1</option><option>Select 2</option></select></td><td><select class="form-control droupdown custom-medications-field common-text-box-new"><option>Select</option><option>Select 1</option><option>Select 2</option></select></td><td class="delete-section"><i class="fa fa-close delete-button delete"></i></td></tr>'); //add input box
           }
         else
         {
         alert('You Reached the limits')
         }
       });
       
       $(wrapper).on("click",".delete", function(e){ 
           e.preventDefault(); $(this).parent().parent().remove(); x--;
       })
   });

   // Add Contact Allergies
   $(document).ready(function() {
       var max_fields      = 100;
       var wrapper         = $(".table-allergies"); 
       var add_button      = $(".add_form_allergies"); 
       
       var x = 1; 
       $(add_button).click(function(e){ 
           e.preventDefault();
           if(x < max_fields){ 
               x++; 
               $(wrapper).append('<tr class="tr-allergies-info common-tr-info"><td><input class="form-control custom-allergies-field common-text-box-new" placeholder=""></td><td><select class="form-control droupdown custom-allergies-field common-text-box-new"><option>Select</option><option>Select 1</option><option>Select 2</option></select></td><td><select class="form-control droupdown custom-allergies-field common-text-box-new"><option>Select</option><option>Select 1</option><option>Select 2</option></select></td><td class="delete-section"><i class="fa fa-close delete-button delete"></i></td></tr>'); //add input box
           }
         else
         {
         alert('You Reached the limits')
         }
       });
       
       $(wrapper).on("click",".delete", function(e){ 
           e.preventDefault(); $(this).parent().parent().remove(); x--;
       })
   });

   // Add Account Notations
   $(document).ready(function() {
       var max_fields      = 100;
       var wrapper         = $(".table-account-notations"); 
       var add_button      = $(".add_form_account"); 
       
       var x = 1; 
       $(add_button).click(function(e){ 
           e.preventDefault();
           if(x < max_fields){ 
               x++; 
               $(wrapper).append('<tr class="tr-account-info common-tr-info"><td><select class="form-control droupdown custom-account-field common-text-box-new"><option>Select</option><option>Select 1</option><option>Select 2</option></select></td><td><input class="form-control custom-account-field common-text-box-new" placeholder=""></td><td><select class="form-control droupdown custom-account-field common-text-box-new"><option>Select</option><option>Select 1</option><option>Select 2</option></select></td><td><input class="form-control custom-account-field common-text-box-new" placeholder=""></td><td class="delete-section"><i class="fa fa-close delete-button delete"></i></td></tr>'); //add input box
           }
         else
         {
         alert('You Reached the limits')
         }
       });
       
       $(wrapper).on("click",".delete", function(e){ 
           e.preventDefault(); $(this).parent().parent().remove(); x--;
       })
   });
   
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
    $(document).ready(function() {
       var max_fields      = 100;
       var wrapper         = $(".new-phone-add"); 
       var add_button      = $(".add_phone"); 
       
       var x = 1; 
       $(add_button).click(function(e){ 
           e.preventDefault();
           if(x < max_fields){ 
               x++; 
               $(wrapper).append('<div class="row new-row-add"> <div class="col-md-3 short-col"> <select class="form-control droupdown mobile-drop" name="celltype"> <option value="">Select</option> <option value="home">Home</option> <option value="work">Work</option><option value="school">School</option><option value="mobile" selected="selected">Mobile</option><option value="main">Main</option><option value="other">Other</option> </select> </div><div class="col-md-8 short-col"> <input type="tel" name="cellphone" class="form-control mobile-drop" placeholder="Phone"> </div><div class="col-md-1 short-col"><i class="fa fa-close delete-button delete"></i></div></div>'); //add input box
           }
         else
         {
         alert('You Reached the limits')
         }
       });
       
       $(wrapper).on("click",".delete", function(e){ 
           e.preventDefault(); $(this).parent().parent().remove(); x--;
       })
   });

    // New Problem Tabs Field Add
    $(document).ready(function() {
       var max_fields      = 100;
       var wrapper         = $(".table-problems-person"); 
       var add_button      = $(".add_form_problems"); 
       
       var x = 1; 
       $(add_button).click(function(e){ 
           e.preventDefault();
           if(x < max_fields){ 
               x++; 
               $(wrapper).append('<tr class="tr-problems-person common-tr-info"> <td> <select class="form-control droupdown custom-contact-field common-text-box-new" name="place"> <option value="">Select</option> <option value="caregiver">Caregiver</option><option value="youth">Youth</option><option value="sibling">Sibling</option> </select> </td><td> <input type="text" name="strength" class="form-control custom-problems-field common-text-box-new" placeholder=""> </td><td> <input type="text" name="score" class="form-control custom-problems-field common-text-box-new" placeholder=""> </td><td class="delete-section"><i class="fa fa-close delete-button delete"></i></td></tr>'); //add input box
           }
         else
         {
         alert('You Reached the limits')
         }
       });
       
       $(wrapper).on("click",".delete", function(e){ 
           e.preventDefault(); $(this).parent().parent().remove(); x--;
       })
   });

    // New Behaviors Tabs Field Add
    $(document).ready(function() {
       var max_fields      = 100;
       var wrapper         = $(".table-behaviors-person"); 
       var add_button      = $(".add_form_behaviors"); 
       
       var x = 1; 
       $(add_button).click(function(e){ 
           e.preventDefault();
           if(x < max_fields){ 
               x++; 
               $(wrapper).append('<tr class="tr-behaviors-person common-tr-info"><td> <select class="form-control droupdown custom-contact-field common-text-box-new" name="place"><option value="">Select</option><option value="caregiver">Caregiver</option><option value="youth">Youth</option><option value="sibling">Sibling</option> </select></td><td> <select class="form-control droupdown custom-contact-field common-text-box-new" name="place"><option value="">Select</option><option value="Describe specifics of behavior">Describe specifics of behavior</option><option value="Identify triggers">Identify triggers</option><option value="What has been tried & results">What has been tried & results</option><option value="Impact on family">Impact on family</option><option value="Behavior to be replaced">Behavior to be replaced</option> </select></td><td> <input type="text" name="concerns" class="form-control custom-behaviors-field common-text-box-new" placeholder="Type or copy-paste"></td><td> <input type="text" name="present" class="form-control custom-behaviors-field common-text-box-new" placeholder="Type or copy-paste"></td><td class="delete-section"><i class="fa fa-close delete-button delete"></i></td></tr>'); //add input box
           }
         else
         {
         alert('You Reached the limits')
         }
       });
       
       $(wrapper).on("click",".delete", function(e){ 
           e.preventDefault(); $(this).parent().parent().remove(); x--;
       })
   });

    // New Assessor Notes Tabs Field Add
    $(document).ready(function() {
       var max_fields      = 100;
       var wrapper         = $(".table-assessor-notes-person"); 
       var add_button      = $(".add_form_assessor-notes"); 
       
       var x = 1; 
       $(add_button).click(function(e){ 
           e.preventDefault();
           if(x < max_fields){ 
               x++; 
               $(wrapper).append('<tr class="tr-assessor-notes-person common-tr-info"> <td> <select class="form-control droupdown custom-contact-field common-text-box-new" name="place"><option value="">Select</option><option value="Caregiver characteristics">Caregiver characteristics</option><option value="Executive Functions">Executive Functions</option><option value="Initial Treatment Reccommendations">Initial Treatment Reccommendations</option><option value="Readiness for Change">Readiness for Change</option> </select> </td><td> <input type="text" name="concerns" class="form-control custom-assessor-notes-field common-text-box-new" placeholder="Type or copy-paste"> </td><td class="delete-section"><i class="fa fa-close delete-button delete"></i></td></tr>'); //add input box
           }
         else
         {
         alert('You Reached the limits')
         }
       });
       
       $(wrapper).on("click",".delete", function(e){ 
           e.preventDefault(); $(this).parent().parent().remove(); x--;
       })
   });

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

  // Dropdown Add for Assessment Page
  $(document).ready(function() {
     var max_fields      = 100;
     var wrapper         = $(".add-more-services-dropdown"); 
     var add_button      = $(".add-more-services"); 
     
     var x = 1; 
     $(add_button).click(function(e){ 
         e.preventDefault();
         if(x < max_fields){ 
             x++; 
             $(wrapper).append('<div class="row"><div class="col-md-11"><select class="form-control droupdown desktop-textbox" name="assessmenttype"><option value="Clinical Intake (2013)-90791">Clinical Intake (2013)-90791</option><option value="Diagnostic Assessment-T1023">Diagnostic Assessment-T1023</option><option value="Family Therapy- 0-60min-90846">Family Therapy- with patient-90847</option><option value="Family Therapy- 0-60min-90846">Family Therapy- 0-60min-90846</option><option value="Group Therapy-90853">Group Therapy-90853</option><option value="Interactive Complexity Add-On-90785">Interactive Complexity Add-On-90785</option><option value="Mental Health Assessment-H0032">Mental Health Assessment-H0031</option><option value="Mental Health Assessment-H0032">Mental Health Assessment-H0032</option><option value="Psychiatric Diagnostic Evaluation with Med Service-90792">Psychiatric Diagnostic Evaluation with Med Service-90792</option><option value="Psychotherapy 53+ minutes-90837">Psychotherapy 53+ minutes-90837</option><option value="Family Therapy with patient-90847">Family Therapy with patient-90847</option><option value="Psychotherapy for Crisis 30-74 minutes-90839">Psychotherapy for Crisis 30-74 minutes-90839</option><option value="Psychotherapy 16-37 minutes AddOn-90833">Psychotherapy 16-37 minutes AddOn-90833</option><option value="Psychotherapy 16-37 minutes-90832">Psychotherapy 16-37 minutes-90832</option><option value="Psychotherapy 38-52 minutes AddOn-90836">Psychotherapy 38-52 minutes AddOn-90836</option> </select></div><div class="col-md-1"><div class="delete-section new-delete-add consumer-delete"><i class="fa fa-close delete-button delete"></i></div></div></div>'); //add input box
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

// Sub menu JS
$(document).ready(function(){
  $(".sub-menu a").click(function () {
     $(this).parent(".sub-menu").children(".sub-menu-dropdpwn").slideToggle("100");
     $(this).find(".down-icon").toggleClass("fa-angle-up fa-angle-down");
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