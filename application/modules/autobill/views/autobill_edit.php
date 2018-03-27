
<section class="content-header">
  <?php 
    $list = array('active'=>'Autobill');
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
          <h3 class="box-title">Autobill</h3>
        </div>
      </div>
    </div>
  </div>
  <form autocomplete="off" id="form_" class="form-horizontal validate" method="post" action="<?php echo $save_url; ?>">
  	<input type="hidden" name="autobill_id" value="<?php echo $autobill_edit_data->autobill_id; ?>">
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
                <section class="autobill">
                  <!-- info row -->
                  <div class="row autobill-info">
                    <div class="col-sm-4 autobill-col">
                      <b>To,</b>
                      <address>
                        <select name="customer_id" id="customer_id" title="Select Customer" class="form-control select2" required="">
                          <?php echo $customer_options; ?>
                        </select><br>
                        <b>Address:</b><span id="customer_address"><?php echo $cust_data['customer_address']; ?></span><br>
                        <!-- <b>Phone:</b> <span id="customer_phone"></span><br>
                        <b>Email:</b> <span id="customer_email"></span> -->
                      </address>
                    </div>
                    <div class="col-sm-4 autobill-col">
                      
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 autobill-col">
                      <b>Reference : <?php echo $autobill_edit_data->autobill_ref_no; ?></b><br>
                      <input type='hidden' name='autobill_ref_no' id="autobill_ref_no" value="<?php echo $autobill_edit_data->autobill_ref_no; ?>">
                      <br>
                      <b>Bill Date: </b><input type='text' name='bill_date' class="bill_date" value="<?php echo $autobill_edit_data->bill_date;?>"><br> 
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <div class="row" id="quot_status">
                  </div>
                  <br>
                  <br>
                  <div class="row">
                    <div class="col-md-4 contract_id_div">
                      <select name="contract_id" id="contract_id" title="Select Contract" class="form-control select2" >
                          <?php echo $contract_options; ?>
                      </select><br>
                      <b>Contract description :</b><span id="contract_description"></span><br>
                      <input type="hidden" name="contract_amount_sgd" id="contract_amount_sgd">
                      <input type="hidden" name="contract_type" id="contract_type">
                    </div>
                    <div class="col-md-2"><b>Contract Period:</b></div>
                    <div class="col-md-6">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="email">Start-date:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control start_date" onchange="set_enddate($(this).val())" name="start_date" id="start_date" placeholder="Enter Start Date" value="<?php echo $autobill_edit_data->start_date;?>">
                          </div>
                        </div>
                        <!-- <b>: </b><input type="text"  class="start_date form-control input-sm" value=""> -->
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label col-sm-4" for="email">End-date:</label>
                          <div class="col-sm-8">
                            <input type="text" name="end_date" readonly="" class="form-control end_date" id="end_date" value="<?php echo $autobill_edit_data->end_date;?>">
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div>
                  <!-- <legend></legend> -->
                  <hr>
                  
                  <br>
                  <div class="row">
                    <div class="col-md-6 col-md-offset-6 col-xs-12">
                      <div class="table-responsive">
                        <table class="table hidden" id="summary">
                          <tbody>
                            <tr>
                              <th style="width:50%">Contract Sum <br>for period above(<span id="cust_curr"><?php echo $cust_data['customer_currency']; ?></span>):</th>
                              <td class="hidden"><input type='hidden' name='contract_sum' id="contract_sum" value='<?php echo $autobill_edit_data->contract_sum;?>'></td>
                              <td></td>
                              <td id="contract_sum_text" class="pull-right"><?php echo $autobill_edit_data->contract_sum;?></td>
                            </tr>
                            <tr>
                              <th>Less <br> Discount (%):</th>
                              <td ><input type="number" min='0' max='100' id="less_discount" name="less_discount" class="form-control" onchange="get_inclusive_gst()" value="<?php echo $autobill_edit_data->less_discount;?>"></td>
                              <td id="less_discount" class="hidden"></td>
                              <td id="less_discount_amount_display" class="pull-right"><?php echo '-'.number_format($autobill_edit_data->contract_sum * $autobill_edit_data->less_discount / 100,'2','.','');?></td>
                            </tr>
                            <tr>
                              <th>Net<br> Contract Amount:</th>
                              <td></td>
                              <td id="net_contract_amount_text" class="pull-right"><?php echo $autobill_edit_data->net_contract_amount;?></td>
                              <td class="hidden"><input type='hidden' name='net_contract_amount' id="net_contract_amount" value="<?php echo $autobill_edit_data->net_contract_amount;?>"></td>
                            </tr>
                            <tr>
                              <th>GST (%) :</th>
                              <td><input type="number" id="gst" name="gst" class="form-control" readonly="" value="7"></td>
                              <td id="gst_payable_amount" class="hidden"></td>
                               <td id="gst_payable_amount_show" class="pull-right"><?php echo '+'.number_format($autobill_edit_data->net_contract_amount * 7 / 100, 2, '.','');?></td>
                            </tr>
                            <tr>
                              <th>TOTAL <br>INCLUSIVE GST:</th>
                              <td></td>
                              <td id="total_inclusive_gst_text" class="pull-right"><?php echo $autobill_edit_data->total_inclusive_gst?></td>
                              <td class="hidden"><input type='hidden' name='total_inclusive_gst' id="total_inclusive_gst" value="<?php echo $autobill_edit_data->total_inclusive_gst;?>"></td>
                            </tr>
                            <tr id="total_curr" >
                              <th>Total in(<span id="cust_curr">SGD</span>):</th>
                              <td></td>
                              <td id="total_inclusive_gst_local_text" class="pull-right"><?php echo $autobill_edit_data->total_inclusive_gst_local ?></td>
                              <td class="hidden"><input type='hidden' name='currency_amount' id="currency_amount" value="<?php echo $autobill_edit_data->currency_amount;?>"></td>
                              <td class="hidden"><input type='hidden' name='total_inclusive_gst_local' id="total_inclusive_gst_local" value="<?php echo $autobill_edit_data->total_inclusive_gst_local;?>"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                           
                    </div>
                   
                  </div>
                  <br>
                  <div class="row no-print">
                    <div class="col-xs-12">
                      <div class="col-xs-12 col-md-12">
                          <button type="submit" class="btn btn-success pull-right hidden" id="submitbtn"><i class="fa fa-credit-card"></i> Submit
                        </button>  
                      </div>
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
<div id="print__" style="display: block;"></div>
<script src="<?php echo JS_PATH."/dist/jquery.inputmask.bundle.js";?>"></script>
<script type="text/javascript" src="<?php echo JS_PATH ?>autobill.js"></script>
<script type="text/javascript">

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

  $(".bill_date").inputmask("9999/99/99",{ "placeholder": "yyyy/mm/dd" });
  $(".start_date").inputmask("9999/99/99",{ "placeholder": "yyyy/mm/dd" });
  // var print_form_action = '<?php echo base_url('common/Ajax/autobilllist_ajax/print_new_autobill');?>';
  var save_form_action = '<?php echo base_url('autobill/create_new_autobill/edit');?>';
  var contract_option = "<?php echo $contract_options;?>";
  //=========================customer details ====================================================
  $cansend = false;
  $print = false;

  $('#submitbtn').click(function(e){
    e.preventDefault();
    $print = false;
    $("#form_").attr("action", save_form_action);
    $('#form_').submit();
  });
  //=========================customer details ====================================================
    $('form#form_').submit(function(){
      if ($print == false) {
          var form = $(this);
         if ($cansend == true)
            {
                $cansend = false;
                return true;
            }
            $('#quot_status').html('');
            $.confirm({
                title:"<i class='fa fa-info'></i> Autobill Confirmation",
                text: "Confirm?",
                cancelButton: "No",
                confirm: function(button) {
                  $('#quot_status').html('');
                    $('#quot_status').html('<input type="hidden" name="autobill_status" value="C">');
                    $cansend = true;
                    
                    console.log($("#lump_sum_discount").val);
                    form.submit();
                },
                cancel: function(button) {
                 
                    $cansend = true;
                    //form.submit();
                }
            });
            return false;
      }
      else if($print == true){
        form.submit();
      }
  })
  
  var currencyUnit="SGD";
  var currencyRate=1;
  var customer_id;

  contract_id='<?php echo $autobill_edit_data->contract_id; ?>';
  contract_edit_currency = '<?php echo $autobill_edit_data->currency_amount;?>';
  	if(contract_id!=""){

		$.post('<?php echo base_url('common/Ajax/autobilllist_ajax/get_contract_details') ?>', {contract_id: contract_id}, function(data, textStatus, xhr)
		{
		    var obj = $.parseJSON(data);

		    $("#contract_description").html(obj.contract_description);
		    $("#contract_amount_sgd").val(obj.contract_amount);
		    $("#contract_type").val(obj.contract_type);

		    $('#submitbtn').removeClass('hidden');
		    $('#summary').removeClass('hidden');

		    var start_date = $('#start_date').val();
		    if (start_date) {
		      set_enddate(start_date);
		    }
		    get_amount();
	  	});
	}
 
  if (contract_edit_currency == 1.00) {
  	$("#total_curr").addClass('hidden');
  }

  $("#customer_id").change(function(event) {

    customer_id=$("#customer_id option:selected").val();
    if(customer_id!=""){
      $.post('<?php echo base_url('common/Ajax/autobilllist_ajax/get_customer_details') ?>', {customer_id: customer_id}, function(data, textStatus, xhr) {
        var obj = $.parseJSON(data);
        $("#customer_address").html(obj.customer_address);
        currencyUnit=obj.customer_currency;
        currencyRate=obj.currency_amount;
       
        if(obj.customer_currency!="SGD"){
          $("#total_curr").removeClass('hidden');
          $("#cust_curr").text(obj.customer_currency);
        }
        else{
          $("#total_curr").addClass('hidden');
          $("#cust_curr").text(obj.customer_currency);
        }
        $("#currency_amount").val(obj.currency_amount);
      });
      get_amount();
  }
  });
  $("#select2-contract_id-container").on("click", function() {
    if (customer_id == undefined) {
      alert("select customer first!");   
    }
   
  })
  //===============================================product row =================================== 
  $("#contract_id").change(function(event) {
    
    console.log(currencyUnit);
    console.log(currencyRate);
    contract_id=$("#contract_id option:selected").val();
    if(contract_id!=""){

      $.post('<?php echo base_url('common/Ajax/autobilllist_ajax/get_contract_details') ?>', {contract_id: contract_id}, function(data, textStatus, xhr) {
        var obj = $.parseJSON(data);

        $("#contract_description").html(obj.contract_description);
        $("#contract_amount_sgd").val(obj.contract_amount);
        $("#contract_type").val(obj.contract_type);

        $('#submitbtn').removeClass('hidden');
        $('#summary').removeClass('hidden');

        var start_date = $('#start_date').val();
        if (start_date) {
          set_enddate(start_date);
        }
        get_amount();
      });
    }
  });
});

</script>