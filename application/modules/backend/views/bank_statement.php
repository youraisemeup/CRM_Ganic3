<section class="content-header">
  <?php 
    $list = array('active'=>'backend');
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
          <h3 class="box-title">Bank Statement</h3>
        </div>
      </div>
    </div>
  </div>
  <!-- <form autocomplete="off" class="form-horizontal validate" method="post" action="<?php echo $save_url; ?>"> -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <div class="row">
            <div class="col-md-12">
              <div class="box-body">
                <section class="receipt">
                  <!-- info row -->
                  <div class="row receipt-info">
                    <div class="col-sm-4 receipt-col">
                     <b>BANK CODE :</b> CA101*<br>
                     <b>BANK DESCRIPTION :</b> DEFAULT BANK<br>
                     <b>CURRENCY :</b> SGD(DEFAULT BANK)<br>
                    </div>
                    <div class="col-sm-4 receipt-col">
                      <!-- <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-5">
                          <div class="input-group">
                            <span class="input-group-addon">
                              <b>Period from</b>
                            </span>
                            <input type="text" style="min-width: 120px;" class="my_date form-control" placeholder="<?php echo date('d-m-Y'); ?>">
                          </div>
                        </div>
                        
                        <div class="col-sm-2 ">
                        
                        </div>
                        <div class="col-sm-5">
                          <div class="input-group">
                            <span class="input-group-addon">
                              <b>To</b>
                            </span>
                            <input type="text" class="my_date form-control" placeholder="<?php echo date('d-m-Y'); ?>">
                          </div>
                        </div>
                      </div> -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 receipt-col" style="margin-top: 20px;">
                      <!-- <div class="col-md-6">
                        <button class="btn btn-primary pull-right" type="button" id="search_btn">Search!</button>  
                      </div> -->
                      <div class="col-md-6">
                        <b>Date:</b> <?php echo date('d-m-Y'); ?><br>  
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <br>
                  <hr>
                  <div class="table-responsive">
                    <table class="table" id="datatable" width="100%">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Reference</th>
                          <th>Remarks</th>
                          <th>Debit</th>
                          <th>Credit</th>
                          <th>Balance</th>
                        </tr>
                      </thead>
                      <tbody id="bank_statement_table">
                        
                      </tbody>
                    </table>


                  </div>
                  <br>
                  <br>
                  <br>
                  <!-- <legend></legend> -->
                  <!-- Table row -->
                  
                  <!-- /.row -->
                  <!-- <hr> -->
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- </form> -->
</section>
<script src="<?php echo JS_PATH."/dist/jquery.inputmask.bundle.js";?>"></script>
<script type="text/javascript">
  jQuery(document).ready(function() {

    $(".my_date").inputmask("9999/99/99",{ "placeholder": "yyyy/mm/dd" });
    
    $.post('<?php echo base_url('common/Ajax/backend_ajax/get_bank_statement') ?>', {customer_id: "44"}, function(data, textStatus, xhr) {
        console.log(data);
        var obj = $.parseJSON(data);
        console.log(obj);
        
        $("#bank_statement_table").html(obj.table_html);
        
        // $("#customer_cntry_post").html(obj.customer_cntry_post);
        // $("#currency").html(obj.customer_currency);
        // $("#rec_currency").val(obj.customer_currency);

        // $( "#invoice_reference_id" ).html( obj.invoice_reference );
        // $("#customer_email").html(obj.customer_email);
        

    });

    /* When clicking of Search button*/
    // $('#search_btn').click(function(){

    // });
    /* When clicking of Search button*/
  });
</script>