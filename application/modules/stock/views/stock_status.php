<section class="content-header">
  <?php 
    $list = array('active'=>"Stock Status as at ".date('d-m-Y'));
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
          <h3 class="box-title">Stock Status as at&nbsp&nbsp<?php echo date('d-m-Y')?></h3>
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
                  
                  <div class="box box-warning">
                    <div class="box-body">
                      <div class="table-responsive">
                        <table class="table table-fixed" width="100%">
                          <thead>
                            <tr>
                              <th>Stock code</th>
                              <th>Stock Description</th>
                              <th>Quantity</th>
                              <th>UOM</th>
                            </tr>
                          </thead>
                          <tbody id="datatable">
                            <tr>
                              <td>
                                sf
                              </td>
                              <td>
                                sd
                              </td>
                              <td>
                                sdf
                              </td>
                              <td>
                                dfsd
                              </td>
                            </tr>
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
  $.post('<?php echo base_url('common/Ajax/stock_openlist_ajax/get_stock_status') ?>', function(data, textStatus, xhr) {
            // alert(data);
            console.log(data);
            var obj = $.parseJSON(data);
            $("#datatable").html(obj.table_html);
  });

});

</script>