$.validator.addMethod('aadhar_number_validate', function (value) { 

  if(value.length !== 0)
  {
    return /^\d{4}\s\d{4}\s\d{4}$/.test(value); 
  }
  else
  {
    return true;
  }
}, 'Please Enter a Valid Aadhar Card Number ');
jQuery.validator.addMethod("alphanumeric", function(value) {
       //return /^(?=.*\d)(?=.*[a-zA-Z]).{4,8}$/.test(value);
       //return /^[A-Za-z]+\d+.*$/.test(value);
       // return /^[a-z0-9]+$/i.test(value);
       return /^[0-9a-zA-Z\s]*$/.test(value);
},'Value Should be Only Alphabets OR Digits'); 
 jQuery(document).ready(function($) {
  $(".validate").validate({
    errorElement:'span',
    errorClass: 'help-block error',


    errorPlacement:function(error, element){
      element.parents('.error_block,.controls').append(error);
    },
    highlight: function(label) {
      $(label).closest('.form-group,.control-group').removeClass('has-error has-success').addClass('has-error');
    },
    success: function(label) {
      label.addClass('valid').closest('.form-group,.control-group').removeClass('has-error has-success').addClass('has-success');
    }
  });
  //this is for registration page
  $("#test,#login_form,.reset_password_form").validate({
    rules: {
      aadhar_number:'aadhar_number_validate',
    },
    errorElement:'span',
    errorClass: 'help-block error',


    errorPlacement:function(error, element){
      element.parents('.form-group,.controls').append(error);
    },
    highlight: function(label) {
      $(label).closest('.form-group,.control-group').removeClass('has-error has-success').addClass('has-error');
    },
    success: function(label) {
      label.addClass('valid').closest('.form-group,.control-group').removeClass('has-error has-success').addClass('has-success');
    }
  });
  /* rule to validate minimum maximum value */
      $.validator.addMethod("greaterThan",
        function(value, max, min){
            return parseInt(value) >= parseInt($(min).val());
        }, "<span class='text-danger'>Maximum Must Be Greater Or Equal To Minimum</span>"
      );    
      /*.. over here ..*/
  // $(".datepicker").datepicker({
  //   format:'yyyy-mm-dd'
  // });

  /* select row in datatable to edit or view */
     $('#datatable tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');

        }
        else {
            $('#datatable tr.selected').removeClass('selected');
            $(this).addClass('selected');  
        }
    });
     /* .......over here...... */
     
    
     /* back button */
     $("#back").on('click',function(){
        $.confirm({
                title:"<i class='fa fa-info'></i> Go Back",
                text: "Confirm?",
                cancelButton: "No",
                confirm: function(button) {
                        showHideButtons("list");
                        $("#form_data").html("");
                        $("#list_table").show();
                        $("#refresh").click();//refresh  the datatable.
                },
                cancel: function(button) {
                    
                }
            });
       
     });  
     /*........ over here..... */


     /* refresh button*/
     $("#refresh").on('click',function () {
        $('#datatable').DataTable().ajax.reload();
     });
     /*........ over here..... */

     /*select2 */
     
      $("#uploadBtn").on('change',function(){
        $("#uploadFile").val($(this).val());
        readURL(this);
      });
});


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview_id').attr('src', e.target.result);
                $('#delete_btn').show();
                $('#delete_btn').removeClass('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function remove_img(default_path) {
        $('#preview_id').attr('src', default_path);  
        $('#uploadFile').val('');
        $('#uploadBtn').val('');
        $('#delete_btn').hide();
        $('#delete_btn').addClass('hidden');
    }
    /* .....hide buttons or show ........*/
    function showHideButtons($action){
        if($action=="edit"){
          $("#edit,#new,#view,#refresh,#delete").hide();
          $("#save,#back").show();
        }
          if($action=="view")
          {
             $("#new,#view,#save,#refresh").hide();
             $("#back,#edit,#new").show();
          }
        if($action=="list")
        {
          $("#save,#back").hide();
          $("#edit,#new,#view,#delete,#refresh,#m_create").show();
        }
          if($action=="new")
          {
              $("#save,#back").show();
              $("#edit,#new,#view,#delete,#refresh,#m_create").hide();
          }
    }
    function hideButtons(){
      $("#back,#save").hide();
    }
    /*show data from ajax calls*/

function showData(mode,url,form_action='#'){  

  rowData = table.row('.selected').data(); 
    if(rowData){
        
        rowID = rowData[0];
        //alert(rowID);
        
        var url = url;
        form_action = form_action; //action url when edit form is active.
        if(mode=="quotation_view" || mode=="invoice_view"){
          window.location.href=url+rowID;
          $("#form_data").html(''); // remove content of form.
          $("#refresh").click();//refresh  the datatable.
          $("#list_table").show(); // show data table
          // location.reload();
        }

        if(mode=="invoice_edit" || mode == "blockbill_edit" || mode == "open_edit" || mode=="quotation_edit" || mode=="autobill_edit" || mode == "open_stock_edit"
          || mode=="stock_purchase_edit" || mode == "stock_adjustment_edit"  || mode == "purchaseslist_edit" || mode=="receipt_edit"){
          
            $.confirm({
                title:"<i class='fa fa-info'></i> Confirm Edit",
                text: "Edit ?",
                confirmButton: 'Yes',
                confirmButtonClass: 'btn-success',
                confirm: function(button) {
                      window.location.href=url+rowID;
                     $("#form_data").html(''); // remove content of form.
                     $("#refresh").click();//refresh  the datatable.
                     $("#list_table").show(); // show data table
                    
                },
                cancelButton: 'No',
                cancelButtonClass: 'btn-danger',
                cancel: function(button) {
                    $("#refresh").click();//refresh  the datatable.
                }
            });
        }
        else if(mode=="receipt_view"){
          window.location.href=url+rowID;
          $("#form_data").html(''); // remove content of form.
          $("#refresh").click();//refresh  the datatable.
          $("#list_table").show(); // show data table
          // location.reload();
        }
        else if(mode=="delete")
        {
            $.confirm({
                title:"<i class='fa fa-info'></i> Confirm Delete",
                text: "Delete ?",
                confirmButton: 'Yes',
                confirmButtonClass: 'btn-success',
                confirm: function(button) {
                    $.post(url,{ rowID: rowID } , function(result){
                        $("#form_data").html(''); // remove content of form.
                        $("#refresh").click();//refresh  the datatable.
                        $("#list_table").show(); // show data table
                        $("#message_area").html("<div class='alert alert-success fade in'><button type='button' class='close close-sm' data-dismiss='alert'><i class='fa fa-times'></i></button>Deleted Succesfully!</div>");
                    });
                    showHideButtons("list");
                },
                cancelButton: 'No',
                cancelButtonClass: 'btn-danger',
                cancel: function(button) {
                    $("#refresh").click();//refresh  the datatable.
                }
            });
            
        }
        else if(mode=="status")
        {
            $.confirm({
                title:"<i class='fa fa-info'></i> Status Change Confirmation",
                text: "Are You Sure To Change Status ?",
                confirm: function(button) {
                    $.post(url,{ rowID: rowID } , function(result){
                        $("#form_data").html(''); // remove content of form.
                        $("#refresh").click();//refresh  the datatable.
                        $("#list_table").show(); // show data table
                        $("#message_area").html("<div class='alert alert-success fade in'><button type='button' class='close close-sm' data-dismiss='alert'><i class='fa fa-times'></i></button>Status Changed Succesfully!</div>");
                    });
                    showHideButtons("list");
                },
                cancel: function(button) {
                    $("#refresh").click();//refresh  the datatable.
                }
            });
        }

        else if (mode == "All Confirm") {
          $.confirm({
             
              title:"<i class='fa fa-info'></i> Confirm All Successful",
              text: "Post All ?",
              confirmButton: 'Yes',
              confirmButtonClass: 'btn-success',
              
              confirm: function(button) {
                
                  var rowID_objet = table.rows({ selected: true }).data();
                  var count = table.rows({ selected: true }).count();
                  var rowID = 0;
                  //alert(count);
                  for (i = 0; i < count; i++) { 
                      rowID = rowID_objet[i][0];
                      //alert(rowID);
                      $.post(url,{ rowID: rowID } , function(result){

                          console.log(result);
                          $("#form_data").html(''); // remove content of form.
                          $("#refresh").click();//refresh  the datatable.
                          $("#list_table").show(); // show data table
                          $("#message_area").html("<div class='alert alert-success fade in'><button type='button' class='close close-sm' data-dismiss='alert'><i class='fa fa-times'></i></button>Post All Succesfully!</div>");
                      });
                  }
                  
                  
                  showHideButtons("list");
              },
              cancelButton: 'No',
              cancelButtonClass: 'btn-danger',
              cancel: function(button) {
                  $("#refresh").click();//refresh  the datatable.
              }

          });
        }

        else if (mode=="confirm"){//post the confirmed invoice
          $.confirm({
             
              title:"<i class='fa fa-info'></i> Confirm Successful",
              text: "Post ?",
              confirmButton: 'Yes',
              confirmButtonClass: 'btn-success',
              
              confirm: function(button) {
                  $.post(url,{ rowID: rowID } , function(result){

                      console.log(result);
                      $("#form_data").html(''); // remove content of form.
                      $("#refresh").click();//refresh  the datatable.
                      $("#list_table").show(); // show data table
                      $("#message_area").html("<div class='alert alert-success fade in'><button type='button' class='close close-sm' data-dismiss='alert'><i class='fa fa-times'></i></button>Post Succesfully!</div>");
                  });
                  showHideButtons("list");
              },
              cancelButton: 'No',
              cancelButtonClass: 'btn-danger',
              cancel: function(button) {
                  $("#refresh").click();//refresh  the datatable.
              }

          });

        }
        else if (mode=="reject"){
          $.confirm({
                title:"<i class='fa fa-info'></i> Confirm Reject",
                text: "Want to reject this ?",
                confirmButton: 'Yes',
                confirmButtonClass: 'btn-success',
                confirm: function(button) {
                    $.post(url,{ rowID: rowID } , function(result){
                        $("#form_data").html(''); // remove content of form.
                        $("#refresh").click();//refresh  the datatable.
                        $("#list_table").show(); // show data table
                        $("#message_area").html("<div class='alert alert-success fade in'><button type='button' class='close close-sm' data-dismiss='alert'><i class='fa fa-times'></i></button>Quotation "+mode+"ed Succesfully!</div>");
                    });
                    showHideButtons("list");
                },
                cancelButton: 'No',
                cancelButtonClass: 'btn-danger',
                cancel: function(button) {
                    $("#refresh").click();//refresh  the datatable.
                }
            });
        }
        else
        {
          
            showHideButtons(mode);
            
            $("#list_table").hide();
            //alert(window.location.href);
            //alert(rowID);
            $.post(url,{ rowID: rowID } , function(result){
              
                $("#form_data").html('');
                $("#form_data").html(result);
                $('.toggle_button').bootstrapToggle({
                  on: 'Permit',
                  off: 'Ban'
                });

            });
            
            
        }
    }
    else
    {  
      message=mode;
      if(mode=="quotation_view"){
        message="view";
      }
      if(mode=="quotation_edit"){
        message="edit";
      }
      if(mode=="invoice_view"){
        message="view";
      }
      if(mode=="invoice_edit"){
        message="edit";
      }
      if(mode=="receipt_view"){
        message="view";
      }
      if(mode=="receipt_edit"){
        message="edit";
      }
      var notify_msg = "Please Select Row To "+message;
      showNotify('info','',notify_msg,'bottom right');
    }
}
/*...............over here..........*/

/*...............RejectInvoiceData............*/
function RejectInvoiceData(mode,url,form_action='#'){
    rowData = table.row('.selected').data();
     rowID = rowData[0];
    if (mode=="confirm" || mode=="reject"){
        $.confirm({ 
              title:"<i class='fa fa-info'></i> Reject Confirmation",
              text: "Are You Really want to "+mode+" this ?<br><form><input type='text' name='remark' value='' required class='form-control remark'></form>",
              confirm: function(button) {
                var remark = $('.remark').val();
                  $.post(url,{ rowID: rowID, remark: remark } , function(result){
                      $("#form_data").html(''); // remove content of form.
                      $("#refresh").click();//refresh  the datatable.
                      $("#list_table").show(); // show data table
                      $("#message_area").html("<div class='alert alert-success fade in'><button type='button' class='close close-sm' data-dismiss='alert'><i class='fa fa-times'></i></button>Reject "+mode+"ed Succesfully!</div>");
                  });
                  showHideButtons("list");
              },
              cancel: function(button) {
                  $("#refresh").click();//refresh  the datatable.
              }
          });
    }
}
/*...............over here............*/

 /*... notify method...*/
function showNotify(style,title,message,position='top right') {
  $('.notifyjs-wrapper').trigger('notify-hide');
  if(title=='')
  {
    message = "<h4>"+message+"</h4>";
  }
  if(style=="success")
  {
    icon = "fa-check-circle";
  }
  else if(style=="error")
  {
    icon = "fa-exclamation-circle";
  }
  else if(style=="info")
  {
    icon = "fa-info-circle";
  }
  else if(style=="warning")
  {
    icon = "fa-exclamation-triangle";
  }
  else
  {
    icon = "fa-envelope-o";
  }
  
    $.notify({
        title: title,
        text: message,
        icon:"<i class='fa fa-fw fa-2x "+icon+"'></i>"
    }, {
        style: 'metro',
        className: style,
        autoHide: true,
        clickToHide: true,
        showAnimation: 'slideDown',
        hideAnimation: 'slideUp',
        autoHideDelay: 6000,
        arrowShow: true,
        arrowSize: 5,
        position: position,
        hideDuration: 300
    });
}
/****** over here *****/


/** clear messages **/

function clearMessages(){
  $("button").on('click',function(){
    $("#message_area").html('');
  });
}

/** over here **/

// $('.select2').select2();

/****  add student to institute ****/ 
function add_to_institute(id,url) {
  $("#institute_btn").val("loading...");
  $.post(url, {registration_id:id}, function(response, textStatus, xhr) {
    $("#search_btn").click();
    $(".content").css("filter","blur(0px)");
    $("#search_btn").attr("disabled", false);
    $("#loader").hide();
    response=$.trim(response);
    if (response=="updated") {
      $("#add_res").html('<div class="alert alert-success col-md-6">Student Added to Your Institute</div>').show().fadeOut(5000);
    }
    else{
      $("#add_res").html('<div class="alert alert-danger col-md-6">Something Went Wrong Try Again</div>').show().fadeOut(5000);      
    }
  });
}
/** over here **/

  


