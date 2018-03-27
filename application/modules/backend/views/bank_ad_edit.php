<section class="content-header">
  <h1>
    Bank Adjustment
    <!-- <small>Preview of UI elements</small> -->
  </h1>
  <?php 
    $list = array('active'=>'Bank Adjustment');
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
          <h3 class="box-title">Edit Bank Adjustment</h3>
        </div>
      </div>
    </div>
  </div>
  <form autocomplete="off" id="form_" class="form-horizontal validate" method="post" action="<?php echo $save_url; ?>"> 
    <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <div class="row">
            <div class="col-md-12">
              <div class="box-body">
                <section class="receipt">
                  <hr>
                  <div class="table-responsive">
                    <table class="table" id="open_table">
                      <thead>
                        <tr>
                          <th class="hidden">id</th>
                          <th>Transaction Date</th>
                          <th>Doc Reference</th>
                          <th>Remarks</th>
                          <th>Amount</th>
                          <th>Sign</th>
                          <!-- <th>ACTION</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="hidden">
                            <input type="number" name="data[open_id][0]" value="<?php echo $open_edit_data->bank_ad_id;?>">
                          </td>
                          <td>
                            <input type="text" class="my_date transaction_date form-control" name="data[transaction_date][0]" value="<?php echo $open_edit_data->bank_ad_date;?>">
                          </td>
                          <td>
                            <input type="text" class="doc_reference form-control" name="data[doc_reference][0]" value="<?php echo $open_edit_data->bank_ad_ref;?>">
                          </td>
                          <td>
                            <input style="min-width: 100px;" type="text" class="remarks form-control" name="data[remarks][0]" value="<?php echo $open_edit_data->bank_ad_remarks;?>">
                          </td>
                          <td>
                            <input style="min-width: 100px;" type="number" class="amount form-control" name="data[amount][0]" value="<?php echo $open_edit_data->bank_ad_amt;?>">
                          </td>
                          <td>
                            <input style="min-width: 50px;" type="text" class="sign form-control" name="data[sign][0]" value="+" value="<?php echo $open_edit_data->bank_ad_sign;?>">
                          </td>
                          <!-- <td>
                            <button class="form-control btn-warning" id="del_btn" onclick="delete_row(this)">Delete</button>
                            
                          </td> -->
                        </tr>
                      </tbody>
                    </table>


                  </div>
                  
                  <br>
                  
                  <!-- <legend></legend> -->
                  <!-- Table row -->
                  
                  <!-- /.row -->
                  <!-- <hr> -->
                  <div class="row no-print">
                    <div class="col-xs-12">
                      <button type="submit" class="btn btn-success pull-right" id="submitbtn"><i class="fa fa-credit-card"></i> Save
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
<script src="<?php echo JS_PATH."/dist/jquery.inputmask.bundle.js";?>"></script>
<script type="text/javascript">
$(document).ready(function(){
        // alert(document.URL);
        $(".my_date").inputmask("9999/99/99",{ "placeholder": "yyyy/mm/dd" });
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