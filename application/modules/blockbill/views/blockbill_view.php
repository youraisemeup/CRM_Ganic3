
<section class="content-header">
  <?php 
    $list = array('active'=>'BlockBill');
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
          <h3 class="box-title">BlockBill</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row" id="print_data">
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
              <section class="invoice">
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    <b>To,</b>
                    <address>
                      <?php echo $this->custom->getSingleValue("customer_master","customer_name",array("customer_id"=>$blockbill_edit_data->customer_id)); ?>
                      <select name="customer_id" id="customer_id" title="Select Customer" class="hidden" required="">
                        <?php echo $customer_options; ?>
                      </select><br>
                      <b>Address:</b><?php echo $cust_data['customer_address']; ?><br>
                    </address>
                  </div>
                  <div class="col-sm-4 invoice-col">
                    
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <b>Reference : <?php echo $blockbill_edit_data->blockbill_ref_no; ?></b><br>
                    <br>
                    <b>Bill Date: <?php echo $blockbill_edit_data->bill_date;?><br> 
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row" id="quot_status">
                </div>
                <br>
                <br>
                <div class="row">
                  <div class="col-sm-6 invoice-col">
                    <?php echo $this->custom->getSingleValue("contract_master","contract_code",array("contract_id"=>$blockbill_edit_data->contract_id)); ?><br>
                    <b>Contract description :</b><?php echo $this->custom->getSingleValue("contract_master","contract_description",array("contract_id"=>$blockbill_edit_data->contract_id)); ?><br>
                  </div>
                  <div class="col-sm-4 invoice-col" style="padding-left: 100px;"><b>Contract Period:</b></div>
                  <div class="col-sm-2 invoice-col">
                    <b>Start-date: <?php echo $blockbill_edit_data->start_date;?><br> 
                    <b>End-date: <?php echo $blockbill_edit_data->end_date;?><br> 
                   <!--  <div class="col-sm-6">
                      <div class="form-group">
                        <label class="control-label col-sm-4" for="email">Start-date:</label>
                        <div class="col-sm-8">
                         <?php echo $blockbill_edit_data->start_date;?>
                        </div>
                      </div>
                      <b>: </b><input type="text"  class="start_date form-control input-sm" value="">
                    </div>
                    
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="control-label col-sm-4" for="email">End-date:</label>
                        <div class="col-sm-8">
                          <?php echo $blockbill_edit_data->end_date;?>
                        </div>
                      </div>
                    </div> -->
                  </div> 
                </div>
                <!-- <legend></legend> -->
                <hr>
                
                <br>
                <div class="row">
                  <div class="col-sm-6 col-md-offset-6 col-xs-12" style="margin-left: 50%;width: 50% ">
                    <div class="table-responsive">
                      <table class="table" id="summary">
                        <tbody>
                          <tr>
                            <th style="width:50%">Contract Sum <br>for period above(<span id="cust_curr"><?php echo $cust_data['customer_currency']; ?></span>):</th>
                            <td class="hidden"><input type='hidden' name='contract_sum' id="contract_sum" value='<?php echo $blockbill_edit_data->contract_sum;?>'></td>
                            <td></td>
                            <td id="contract_sum_text" class="pull-right"><?php echo $blockbill_edit_data->contract_sum;?></td>
                          </tr>
                          <tr>
                            <th>Less <br> Discount (%):</th>
                            <td ><?php echo $blockbill_edit_data->less_discount;?></td>
                            <td id="less_discount" class="hidden"></td>
                            <td id="less_discount_amount_display" class="pull-right"><?php echo '-'.number_format($blockbill_edit_data->contract_sum * $blockbill_edit_data->less_discount / 100,'2','.','');?></td>
                          </tr>
                          <tr>
                            <th>Net<br> Contract Amount:</th>
                            <td></td>
                            <td id="net_contract_amount_text" class="pull-right"><?php echo $blockbill_edit_data->net_contract_amount;?></td>
                            <td class="hidden"><input type='hidden' name='net_contract_amount' id="net_contract_amount" value="<?php echo $blockbill_edit_data->net_contract_amount;?>"></td>
                          </tr>
                          <tr>
                            <th>GST (%) :</th>
                            <td>7</td>
                            <td id="gst_payable_amount" class="hidden"></td>
                             <td id="gst_payable_amount_show" class="pull-right"><?php echo '+'.number_format($blockbill_edit_data->net_contract_amount * 7 / 100, 2, '.','');?></td>
                          </tr>
                          <tr>
                            <th>TOTAL <br>INCLUSIVE GST:</th>
                            <td></td>
                            <td id="total_inclusive_gst_text" class="pull-right"><?php echo $blockbill_edit_data->total_inclusive_gst?></td>
                            <td class="hidden"><input type='hidden' name='total_inclusive_gst' id="total_inclusive_gst" value="<?php echo $blockbill_edit_data->total_inclusive_gst;?>"></td>
                          </tr>
                          <tr id="total_curr" >
                            <th>Total in(<span id="cust_curr">SGD</span>):</th>
                            <td></td>
                            <td id="total_inclusive_gst_local_text" class="pull-right"><?php echo $blockbill_edit_data->total_inclusive_gst_local ?></td>
                            <td class="hidden"><input type='hidden' name='currency_amount' id="currency_amount" value="<?php echo $blockbill_edit_data->currency_amount;?>"></td>
                            <td class="hidden"><input type='hidden' name='total_inclusive_gst_local' id="total_inclusive_gst_local" value="<?php echo $blockbill_edit_data->total_inclusive_gst_local;?>"></td>
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
</section>

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




</script>
<?php 
if($mode=="print")
{
?>
<script type="text/javascript">
        $("#print_data").print({
      mediaPrint: true,
        title: " "
        });
</script>
<?php    
}
?>
<?php 
if($mode=="email")
{
?>
<script type="text/javascript">
$("#no-email-2").html('');
$("#no-email-1").html('');
</script>
<?php    
}
?>