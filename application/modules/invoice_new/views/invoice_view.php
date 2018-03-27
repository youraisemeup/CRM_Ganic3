<?php 
if($mode!="email")
{
?>
<section class="content-header" id="no-email-1">
  <?php 
    $list = array('active'=>'View Invoice');
    echo breadcrumb($list); 
  ?>
</section>
<br>
<section class="content">
  <?php echo get_flash_message('message'); ?>
  <div class="row" id="no-email-2">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">View Invoice</h3>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
    <div class="row" id="print_data">
      <div class="col-md-12">
        <div class="box box-danger">
          <div class="row">
            <div class="col-md-12">
              <div class="box-header with-border">
                <center>
                  <strong>
                    <img src="<?php echo UPLOAD_PATH.'site/'.$company_details->company_logo ?>" class='img img-thumbnail' height="100px" width="100px"/>
                    <h4 style="margin-bottom: -4px;margin-top: -2px;"><?php echo $company_details->company_name ?></h4>
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
                        <?php echo $this->custom->getSingleValue("customer_master","customer_name",array("customer_id"=>$invoice_edit_data->customer_id)); ?>
                        <select name="customer_id" class="hidden" id="customer_id" title="Select Customer" class="form-control select2" required="">
                          <?php echo $customer_options; ?>
                        </select><br>
                        <?php echo $cust_data['customer_address']; ?><br>
                        <b>Phone:</b> <?php echo $cust_data['customer_phone']; ?><br>
                        <!-- <b>Email:</b> <?php echo $cust_data['customer_email']; ?> -->
                      </address>
                    </div>
                    <div class="col-sm-4 invoice-col"></div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      <b>Invoice : <?php echo $invoice_edit_data->invoice_ref_no; ?></b>
                      <input type='hidden' name='invoice_ref_no' id="invoice_ref_no" value="<?php echo $invoice_edit_data->invoice_ref_no; ?>">
                      <br>
                      <b>Date:</b> <?php echo date('d-m-Y'); ?><br><br>
                      <b>Salesman:</b>
                      <?php echo $this->custom->getSingleValue("salesman_master","s_name",array("s_id"=>$invoice_edit_data->salesman_id)); ?>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <br>
                  <!-- <legend></legend> -->
                  <div class="row">
                    <div class="col-xs-12">
                      <?php echo $invoice_edit_data->invoice_header_text; ?>
                    </div>
                  </div>
                  <br>
                  <!-- <legend></legend> -->
                  <div class="row">
                    <div class="col-xs-12 col-md-5">
                    </div>
                  </div>
                  <br>
                  <!-- <legend></legend> -->
                  <!-- Table row -->
                  <div class="row">
                    <div class="col-xs-12 table-responsive">
                      <table class="table table-striped" id="product_table">
                        <thead>
                          <tr>
                         <th>S.N</th>
                            <th>DESCRIPTION</th>
                            <th>QTY</th>
                            <th>UOM</th>
                            <th width="15%">U/PRICE<br>(<span class="customer_currency_unit"> SGD </span>)</th>
                            <th>DISC<br> (%)</th>
                            <th>AMT(<span class="customer_currency_unit">SGD </span>)</th>
                            <!-- <th>CAT</th>
                            <th>GST AMT</th> -->
                            </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $i=1;
                            foreach ($invoice_product_edit_data as $value) {
                              $product_details=$this->invoice->get_product_details(array("billing_id"=>$value->product_id));
                              $gst=$this->custom->getSingleValue('gst_master','gst_code',array('gst_id'=>$product_details->gst_id));
                              ?>
                              <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $product_details->billing_description; ?></td>
                                <td><?php echo $value->quantity; ?></td>
                                <td><?php echo $product_details->billing_uom; ?></td>
                                <td><?php echo $product_details->billing_price_per_uom; ?></td>
                                <td><?php echo $value->discount; ?></td>
                                <td><?php echo $value->product_total; ?></td>
                                <!-- <td><?php echo $gst; ?></td>
                                <td>
                                    <?php if($invoice_edit_data->lump_sum_discount!=0)
                                            $gst_amt = $value->product_total - $value->product_total * $invoice_edit_data->lump_sum_discount / 100;
                                          else
                                            $gst_amt = $value->product_total;
                                            
                                          $gst_rate=$this->custom->getSingleValue('gst_master','gst_rate',array('gst_id'=>$product_details->gst_id));
                                          
                                          $gst_amt = $gst_amt * $gst_rate / 100;
                                            
                                        echo $gst_amt;
                                ?></td> -->
                              </tr>
                              <?php
                              $i++;
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <div class="row">
                    <!-- accepted payments column -->
                    <!-- /.col -->

                    <div class="col-md-6 col-xs-12" style="margin-left: 45%;width: 50% ">
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th style="width:50%">Subtotal:</th>
                              <td></td>
                              <td class="pull-right" id="sub_total"><?php echo $invoice_edit_data->sub_total ?></td>
                            </tr>
                            <tr>
                              <th style="width:50%">Lump Sum Discount:</th>
                              <td><?php echo $invoice_edit_data->lump_sum_discount; ?>%</td>
                              <td class="pull-right">-<?php  echo number_format($invoice_edit_data->sub_total-$invoice_edit_data->lump_sum_discount_price,2); ?></td>
                            </tr>
                            <tr>
                              <th>Net of lump Discount:</th>
                              <td></td>
                              <td class="pull-right">&nbsp;<?php echo $invoice_edit_data->lump_sum_discount_price; ?></td>
                              <td class="hidden"><input type='hidden' name='lump_sum_discount_price' id="lump_sum_discount_price_text"></td>
                            </tr>
                            <tr>
                              <th>GST</th>
                              <td><?php echo $invoice_edit_data->gst; ?>%</td>
                              <td class="pull-right">+<?php  echo number_format($invoice_edit_data->final_total-$invoice_edit_data->lump_sum_discount_price,2); ?></td>
                            </tr>
                            <tr>
                              <th>Total:</th>
                              <td></td>
                              <td class="pull-right"><?php echo $invoice_edit_data->final_total; ?></td>
                            </tr>
                            <tr id="total_curr">
                              <th>Total in(<?php echo $cust_data['customer_currency']?>):</th>
                              <td></td>
                              <td class="pull-right"><?php echo $invoice_edit_data->final_total_forex; ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <div class="row">
                    <!-- accepted payments column -->
                    <!-- /.col -->
                    <div class="col-md-12 col-xs-12">
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                          <?php if(!empty($invoice_edit_data->terms_of_payments)): ?>
                            <tr>
                              <th style="width:30%">Terms Of Payments:</th>
                              <td><?php echo $invoice_edit_data->terms_of_payments; ?></td>
                            </tr>
                          <?php endif; ?>
                            <?php if(!empty($invoice_edit_data->training_venue)): ?>
                            <tr>
                              <th style="width:30%">Training Venue:</th>
                              <td><?php echo $invoice_edit_data->training_venue; ?></td>
                            </tr>
                          <?php endif; ?>
                            <?php if(!empty($invoice_edit_data->modification)): ?>
                            <tr>
                              <th style="width:30%">Modification:</th>
                              <td><?php echo $invoice_edit_data->modification; ?></td>
                            </tr>
                          <?php endif; ?>
                            <?php if(!empty($invoice_edit_data->cancellation)): ?>
                            <tr>
                              <th style="width:30%">Cancellation:</th>
                              <td><?php echo $invoice_edit_data->cancellation; ?></td>
                            </tr>
                          <?php endif; ?>
                            <tr>
                              <td colspan="2"><?php echo $invoice_edit_data->invoice_footer_text; ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <br>
                  <br><br>
                   <!-- /.row -->
                  <div class="row">
                    <!-- accepted payments column -->
                    <!-- /.col -->
                    <div class="col-md-3 col-xs-12">
                      <div class="table-responsive">
                              <legend></legend>
                              Customer Signature and Co Stamp<br>
                              Name: <br>
                              Date: <br>
                        </table>
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- this row will not appear when printing -->
                  
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php
    
  ?>
</section>
<script type="text/javascript">

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