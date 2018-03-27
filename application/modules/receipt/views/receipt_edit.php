<section class="content-header">
  <?php 
    $list = array('active'=>'Receipt');
    echo breadcrumb($list); 
  ?>
</section>
<br>
<section class="content">
  <?php echo get_flash_message('message'); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <div class="tooltip">Hover over me
  <span class="tooltiptext">Tooltip text</span>
</div>
          <h3 class="box-title">Receipt Edit</h3>
        </div> 
      </div>
    </div>
  </div>
  <form autocomplete="off" class="form-horizontal validate" method="post" action="<?php echo $save_url; ?>">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <div class="row">
            <div class="col-md-12"> 
              <div class="box-header with-border">
                <center>
                  <strong>
                    <img src="<?php echo UPLOAD_PATH.'site/'.$company_details->company_logo ?>" class='img img-thumbnail' height="150px" width="150px"/>
                    <h4><?php echo $company_details->company_name ?></h4>
                    <?php echo $company_details->company_address; ?>
                    <br>GST Register Number : <?php echo $company_details->gst_reg_no ?> | UEN No. : <?php echo $company_details->uen_no; ?>
                    <br>Phone : <?php echo $company_details->phone ?> | Fax : <?php echo $company_details->fax ?>
                  </strong>
                </center>
              </div>
                <hr>
              <div class="box-body">
                <section class="receipt">
                  <!-- info row -->
                  <div class="row receipt-info">
                    <div class="col-sm-4 receipt-col">
                      <b>To,</b>
                      <address>
                        <select name="customer_id" id="customer_id" title="Select Customer" class="form-control select2" required="">
                          <?php echo $customer_options; ?>
                        </select><br>
                         <span id="customer_bldg_street"></span><br>
                         <span id="customer_cntry_post"></span><br>
                      </address>
                    </div>
                    <div class="col-sm-4 receipt-col"></div>
                    <!-- /.col -->
                    <div class="col-sm-4 receipt-col">
                      <b>Date:</b> <?php echo $receipt_edit_data->created_on; ?><br>
                      <br>
                      <b>Receipt : <?php echo $receipt_edit_data->receipt_ref_no; ?></b><br>
                      <input type='hidden' name='receipt_ref_no' id="receipt_ref_no" value="<?php echo $receipt_edit_data->receipt_ref_no; ?>">
                      
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <br>
                  <hr>
                  <div class="row">
                    <div class="col-xs-12 col-md-4 product_id_div">
                      <select name="invoice_reference_id" id="invoice_reference_id" title="Select Invoices" class="form-control select2" multiple="multiple">
                          <?php echo $invoice_reference; ?>
                        </select>

                    </div>
                  </div>
                  <br>
                  <br>
                  <br>
                  <!-- <legend></legend> -->
                  <!-- Table row -->
                  
                  
                  <div class="row">
                    <div class="col-xs-6 table-responsive">
                      <table class="table table-striped hidden" id="inv_table">
                        <thead>
                          <tr>
                            <th>Invoice Number</th>
                            <th>Original Amount ( <span id="currency2"></span> ) </th>
                            <th>Amount Received  ( <span id="currency4"></span> ) </th>
                            <th>Difference in Amount ( <span id="currency3"></span> )</th>
                          </tr>
                        </thead>

                        <tbody>
                          
                        </tbody>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                  
                  <div class="row" align="left">
                    <div class="col-md-12">
                        <div class="display-none receipt_body">Received with thanks the sum of <span id="currency">...</span><span id="inv_amount">...</span> being payment for above invoices with <span id="cn_amount">...</span> Credit Note.</div>                      
                    </div>
                    <br>
                    <div class="row col-md-12">
                        <div class="col-md-6">Bank: <input type="text" class="form-control" name="bank" value="<?php echo $receipt_edit_data->bank;?>"></div> 
                        <div class="col-md-6">Cheque: <input type="text" name="cheque" class="form-control" value="<?php echo $receipt_edit_data->cheque;?>"></div> 
                    </div>
                    <br>
                    <br><br>
                    <div class="row col-md-12">
                        <div class="col-md-6">OTHER REFERENCE IF ANY: </div> 
                        <div class="col-md-6"> <input type="text" name="other_reference" class="form-control" value="<?php echo $receipt_edit_data->other_reference;?>"> </div>
                    </div>
                    <!-- /.col -->
                  </div>

                  <br>
                  <input type="hidden" name="currency" id="rec_currency">
                  <input type="hidden" name="amount" id="rec_amount">
                  <input type="hidden" name="invoice" id="rec_invoice">
                  <input type="hidden" name="receipt_id" value="<?php echo $receipt_edit_data->receipt_id;?>">
                  
                  <!-- this row will not appear when printing -->
                  <div class="row no-print">
                    <div class="col-xs-12">
                      <button type="submit" class="btn btn-success pull-right" ><i class="fa fa-credit-card"></i> Submit
                      </button>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</section>
<!-- <script type="text/javascript" src="<?php echo JS_PATH ?>receipt.js"></script> -->
<script type="text/javascript">
function findTotal(){
    //alert("dfsd");
    var arr = document.getElementsByName('partial_amount_hidden');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseFloat(arr[i].value))
            tot += parseFloat(arr[i].value);
    }
    //return tot;

    document.getElementById('rec_amount').value = tot;
    document.getElementById('inv_amount').innerHTML = ' ' + tot.toFixed(2);
  }
$(document).ready(function(){
        // alert(document.URL);
      history.pushState(null, null, document.URL);
      window.addEventListener('popstate', function () {
          $.confirm({
                title:"<i class='fa fa-info'></i> Exit Confirmation",
                text: "Are You Sure Exit ?",
                confirm: function(button) {
                  
                    window.history.go(-1);
                },
                cancel: function(button) {
                    history.pushState(null, null, document.URL);
                }
            });
        
    });
});

$(function() {


  var credit_tune = function(change_flag) { 
      var tot = 0;
      var tot_cn = 0;
      var tot_inv = 0;
      $(".partial_amount").each(function(){
        if ($(this).parents('tr').children("input.amount_sign").val() == -1) {
          tot_cn += parseFloat($(this).parents('tr').children("td.full_amount").html());
        } 
        else
        {
          tot_inv += parseFloat($(this).val());
        }
      });
      var flag = 0;
      console.log("tot_cn =" + tot_cn);
      console.log("tot_inv =" + tot_inv);
      if (tot_inv < tot_cn) {
        var tot_minus = 0;
        $(".partial_amount").each(function(){

          if ($(this).parents('tr').children("input.amount_sign").val() == -1 && flag == 1) {
            $(this).val(0);
            $(this).parents('tr').children("td.diff").html((parseFloat($(this).parents('tr').children("td.full_amount").html()) - $(this).val()).toFixed(2));
          }
          if (tot_inv == 0) {
            $(this).val(0);
            $(this).parents('tr').children("td.diff").html((parseFloat($(this).parents('tr').children("td.full_amount").html()) - $(this).val()).toFixed(2));
          }
          else 
          {
            if ($(this).parents('tr').children("input.amount_sign").val() == -1) {
              tot_minus += parseFloat($(this).parents('tr').children("td.full_amount").html());
            }
            console.log("tot_minus =" + tot_minus);
           
            if ((tot_minus > tot_inv) && (flag == 0)) {
              var change_minus_amt = parseFloat($(this).parents('tr').children("td.full_amount").html()) + parseFloat(tot_inv) - parseFloat(tot_minus);
              //alert(change_minus_amt)
              console.log("change_minus_amt =" + change_minus_amt);
              $(this).val(change_minus_amt.toFixed(2));
              $(this).parents('tr').children("td.diff").html((parseFloat($(this).parents('tr').children("td.full_amount").html()) - $(this).val()).toFixed(2));
              flag = 1;
            }
            else if((tot_minus < tot_inv) && (flag == 0))
            {
              if (change_flag == "change") {
                //$(this).val(parseFloat($(this).parents('tr').children("td.full_amount").html()));  
              }
              else if(change_flag == "none")
              {
                $(this).val(parseFloat($(this).parents('tr').children("td.full_amount").html()));  
              }
              
              $(this).parents('tr').children("td.diff").html((parseFloat($(this).parents('tr').children("td.full_amount").html()) - $(this).val()).toFixed(2));
            }
          }
          // if ($(this).parents('tr').children("input.amount_sign").val() == -1) {
          //   $(this).prop("readonly", true);
          // }                    
           
        });
        $("#rec_amount").val(tot_inv);
        $("#inv_amount").html(' ' + tot_inv);  
      }
      else if(tot_inv >= tot_cn)
      {
        $(".partial_amount").each(function(){
          if ($(this).parents('tr').children("input.amount_sign").val() == -1) {
            $(this).val(parseFloat($(this).parents('tr').children("td.full_amount").html()));
            $(this).parents('tr').children("td.diff").html((parseFloat($(this).parents('tr').children("td.full_amount").html()) - $(this).val()).toFixed(2));
          }
        });
        var sum = tot_inv - tot_cn;
        $("#rec_amount").val(sum.toFixed(2));
        $("#inv_amount").html(' ' + tot_inv.toFixed(2) );  
      }

      var tot_cn_show = 0;
      var tot_inv_show = 0;
      $(".partial_amount").each(function(){
        if ($(this).parents('tr').children("input.amount_sign").val() == -1) {
          tot_cn_show += parseFloat($(this).val());
          $(this).prop("readonly", true);
        }
        else if($(this).parents('tr').children("input.amount_sign").val() == 1){
          tot_inv_show += $(this).val();
        }
      });
      //$("#inv_amount").html(' ' + tot_inv_show);  
      $("#cn_amount").html(tot_cn_show.toFixed(2));
  };

  customer_id=$("#customer_id option:selected").val();
    if(customer_id!=""){
      $.post('<?php echo base_url('common/Ajax/receiptlist_ajax/get_customer_details') ?>', {customer_id: customer_id}, function(data, textStatus, xhr) {
        var obj = $.parseJSON(data);
        console.log(obj);
        $("#customer_bldg_street").html(obj.customer_bldg_street);
        $("#customer_cntry_post").html(obj.customer_cntry_post);
        $("#customer_cntry_post").html(obj.customer_cntry_post);
        $("#currency").html(obj.customer_currency);
        $("#currency2").html(obj.customer_currency);
        $("#currency3").html(obj.customer_currency);
        $("#currency4").html(obj.customer_currency);
        $("#rec_currency").val(obj.customer_currency);

        $( "#invoice_reference_id" ).html( obj.invoice_reference );
        
      });
      // get_sub_total();
   }

    var invoice_id_json='<?php echo json_encode($invoice_array); ?>';
      invoice_id_arr=$.parseJSON(invoice_id_json);

      $("#inv_table tbody").empty();
      $count = 0;

      for (var i = 0; i < invoice_id_arr.length; i++) {
        invoice_id=invoice_id_arr[i];
        //alert(invoice_id_arr);
        $.post('<?php echo base_url('common/Ajax/receiptlist_ajax/get_receipt_edit_data') ?>', {  invoice_id: invoice_id_arr,receipt_id: <?php echo $receipt_edit_data->receipt_id;?>}, function(data, textStatus, xhr) {
          console.log(data); 
          obj = $.parseJSON(data);
          $("#inv_table").removeClass('hidden');

          var pay_invoice_id = obj.invoice_id[$count];

          $("#inv_table tbody").append('<tr id="' 
                                        + pay_invoice_id 
                                        + '"> <td>'
                                        + obj.invoic_name[$count]
                                        + '</td> <td class="full_amount">'
                                        + obj.full_amount[$count]
                                        + '</td> <td><input type="hidden" class="form-control" name="full_amount['
                                        + pay_invoice_id
                                        + ']" value="'
                                        + parseFloat(obj.full_amount[$count].replace(",", ""))
                                        + '"><input id="partial_amount" type="hidden" class="form-control" name="partial_amount_hidden" value="'
                                        + parseFloat(obj.invoice_amt[$count].replace(",", ""))
                                        + '"><input type="number" class="partial_amount form-control" name="partial_amount[' 
                                        + pay_invoice_id 
                                        + ']"  value="'
                                        + parseFloat(obj.invoice_amt[$count].replace(",", ""))
                                        + '"></td><td class="hidden hidden_diff">'
                                        + obj.received_amount[$count]
                                        + '</td><input id="amount_sign" type="hidden" class="form-control amount_sign" name="amount_sign" value="'
                                        + obj.amount_sign[$count] 
                                        + '"> <td class="diff">'
                                        + (obj.full_amount[$count] - obj.invoice_amt[$count]).toFixed(2)
                                        + '</td></tr>');
                 
            credit_tune("none");

            $("#rec_invoice").val(obj.invoic_name);
            $('.receipt_body').show();

            $(".partial_amount").change(function(){

                var par_td = $(this).parents('tr');
                var diff = $(par_td).children("td.diff");
                var temp_full_amount = $(par_td).children("td.full_amount").html();
                var amt_sign = $(par_td).children("input.amount_sign").val();
                var diff_html = temp_full_amount - parseFloat($(this).val());

                $(diff).html(diff_html.toFixed(2));

                credit_tune("change");
                                    
            });
          $count = $count + 1;
        });
      }
      $("#customer_id").prop('disabled', 'disabled');
      $("#invoice_reference_id").prop('disabled', 'disabled');
      

      //$("#customer_id")//
  //=========================customer details ====================================================
  $("#customer_id").change(function(event) {
    customer_id=$("#customer_id option:selected").val();
    if(customer_id!=""){
      $.post('<?php echo base_url('common/Ajax/receiptlist_ajax/get_customer_details') ?>', {customer_id: customer_id}, function(data, textStatus, xhr) {
        var obj = $.parseJSON(data);
        console.log(obj);
        $("#customer_bldg_street").html(obj.customer_bldg_street);
        $("#customer_cntry_post").html(obj.customer_cntry_post);
        $("#customer_cntry_post").html(obj.customer_cntry_post);
        $("#currency").html(obj.customer_currency);
        $("#currency2").html(obj.customer_currency);
        $("#currency3").html(obj.customer_currency);
        $("#currency4").html(obj.customer_currency);
        $("#rec_currency").val(obj.customer_currency);

        $( "#invoice_reference_id" ).html( obj.invoice_reference );
        // $("#customer_email").html(obj.customer_email);
        $("#invoice_reference_id").select2("open");
        // $("#invoice_reference_id select:first").focus();
        $("#inv_table").addClass('hidden');
        //$('.receipt_body').hide();
      });
      // get_sub_total();
   }
  });
    //===============================================invoice reference ===================================
  $("#invoice_reference_id").change(function(event) {
      var invoice_id = [];

      $.each($("#invoice_reference_id option:selected"), function(){            
          invoice_id.push($(this).val());
      });
      
      if(invoice_id!=""){
          $("#inv_table tbody").empty();
          $count = 0;
          
          $.each($("#invoice_reference_id option:selected"), function(){            
              $.post('<?php echo base_url('common/Ajax/receiptlist_ajax/get_receipt_data') ?>', {  invoice_id: invoice_id}, function(data, textStatus, xhr) {
                obj = $.parseJSON(data);
                $("#inv_table").removeClass('hidden');
                var pay_invoice_id = obj.invoice_id[$count];
                $("#inv_table tbody").append('<tr id="' + pay_invoice_id +'"> <td>'+obj.invoic_name[$count]+ '</td> <td>'+obj.full_amount[$count]+ '</td> <td>'+obj.received_amount[$count]+ '</td><td>' + '<input type="hidden" class="form-control" name="full_amount[' + pay_invoice_id + ']" value="'+ parseFloat(obj.invoice_amt[$count].replace(",", "")) +'">' + '<input id="partial_amount" type="hidden" class="form-control" name="partial_amount_hidden" value="'+ parseFloat(obj.invoice_amt[$count].replace(",", "")) +'">' + '<input type="number" class="partial_amount form-control" name="partial_amount[' + pay_invoice_id + ']"  value="'+ parseFloat(obj.invoice_amt[$count].replace(",", "")) +'"></td></tr>');
                $count = $count + 1;
                findTotal();
                // $("#invoice_reference").html(obj.invoic_name.join(", "));
                //$("#amountinwords").html(' '+obj.total_in_words);

                $("#rec_invoice").val(obj.invoic_name);
                $('.receipt_body').show();

                $(".partial_amount").change(function(){
                    var sum = 0;
                  $(".partial_amount").each(function(){
                    sum += parseFloat($(this).val());
                  });
                  $("#rec_amount").val(sum);
                  $("#inv_amount").html(' ' + sum);
                });
              });
          });
      }
      
      else
      {
            $("#inv_table tbody").empty();
            $("#inv_table").addClass('hidden');
            $('.receipt_body').hide();
      }
  
  });
});

</script>