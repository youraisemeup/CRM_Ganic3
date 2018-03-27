<section class="content-header">
  <?php 
    $list = array('active'=>"Stock Valuation as at ".date('Y-m-d'));
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
          <h3 class="box-title">Stock Valuation as at&nbsp&nbsp<?php echo date('d-m-Y')?></h3>
        </div>
      </div>
    </div>
  </div>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <div class="row">
            <div class="col-md-12">
              <div class="box-body">
                <section class="receipt">
                  <!-- info row -->
                  <div class="row receipt-info">
                  </div>
                  <!-- /.row -->
                  <br>
                  <p>Basis: Weighted Average Cost</p>
                  <div class="box box-warning">
                    <div class="box-body">
                      <div class="table-responsive">
                        <table class="table table-fixed" width="100%">
                          <thead>
                            <tr>
                              <th>Stock code</th>
                              <th>Stock Description</th>
                              <th>Quantity</th>
                              <th>W.A.C</th>
                              <th>SGD</th>
                            </tr>
                          </thead>
                          <tbody id="datatable">
                            
                          </tbody>
                          
                        </table>
                      </div>
                      <form autocomplete="off" method="post" action="#" enctype="multipart/form-data" class="validate">
                        <div id="form_data"></div>
                      </form>
                    </div>
                  </div>
                 
                  <br>
                  <br>
                  <br>
                  
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- </form> -->
</section>
<!-- <script type="text/javascript" src="<?php echo JS_PATH ?>receipt.js"></script> -->
<script type="text/javascript">
  
$(function() {
  $.post('<?php echo base_url('common/Ajax/backend_ajax/get_report_base_wac') ?>', function(data, textStatus, xhr) {
            // alert(data);
            console.log(data);
            var obj = $.parseJSON(data);
            $("#datatable").html(obj.table_html);
  });

});

</script>