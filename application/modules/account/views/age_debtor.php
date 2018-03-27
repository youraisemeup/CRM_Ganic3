<section class="content-header">
  <?php 
    $list = array('active'=>"Debtors' Ageing by Currency type");
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
          <h3 class="box-title">Debtors' Ageing by Currency type</h3>
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
                      <b>Currency: </b>
                      <address>
                        <select name="currency_type" id="currency_type" title="All Currency" class="form-control select2" required="">
                          <?php echo $currency_options; ?>
                        </select><br>
                         
                      </address>
                    </div>
                    <div class="col-sm-4 receipt-col">
                      <!-- <nav aria-label="Page navigation example">
                        <ul class="pagination">
                          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                      </nav> -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 receipt-col">
                      <br>
                      <b>Date:</b> <?php echo date('d-m-Y'); ?><br>
                      
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <br>
                  
                  <div class="box box-warning">
                    <div class="box-body">
                      <div class="table-responsive">
                        <table id="datatable" class="table table-fixed" width="100%">
                          <!-- <p>Currency: USD DEBTORS LISTING</p>
                          <thead>
                            <tr>
                              <th>code & name</th>
                              <th>1 - 30</th>
                              <th>31 - 60</th>
                              <th>61 - 90</th>
                              <th>91 - 120</th>
                              <th>>120days</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>sdfsdf</td>
                              <td>sdfsdf</td>
                              <td>sdfsdf</td>
                              <td>sdfsdf</td>
                              <td>sdfsdf</td>
                              <td>sdfsdf</td>
                            </tr>
                          </tbody> -->
                          
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
  $.post('<?php echo base_url('common/Ajax/account_ajax/get_age_debtor') ?>', {currency_type: "-- Select Currency --"}, function(data, textStatus, xhr) {
            
            //alert(data);
            var obj = $.parseJSON(data);
            $("#datatable").html(obj['table_html']);
  });

  $("#currency_type").change(function(event) {
    currency_type=$("#currency_type option:selected").text();
    //alert(currency_type);
    if(currency_type!=""){
      $.post('<?php echo base_url('common/Ajax/account_ajax/get_age_debtor') ?>', {currency_type: currency_type}, function(data, textStatus, xhr) {
           // alert(data);
            
            var obj = $.parseJSON(data);
            $("#datatable").html(obj.table_html);
      });
  
    }
  });

});

</script>