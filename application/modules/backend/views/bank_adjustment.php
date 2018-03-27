<section class="content-header">
  <h1>
    Bank Adjustment
  </h1>
</section>

<section class="content">
  <?php echo get_flash_message('message'); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <div class="tooltip">Hover over me
            <span class="tooltiptext">Tooltip text</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <form autocomplete="off" id="form_" class="form-horizontal validate" method="post" action="<?php echo $save_url; ?>"> <!-- <?php echo $save_url; ?> -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <div class="row">
            <div class="col-md-12">
              <div class="box-body">
                <section class="receipt">
                  <br>
                  <hr>
                  <div class="table-responsive">
                    <table class="table" id="open_table">
                      <thead>
                        <tr>
                          <th>Transaction Date</th>
                          <th>Doc Reference</th>
                          <th>Remarks</th>
                          <th>Amount</th>
                          <th>Sign</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="form-group error_block">
                            <input type="text" class="my_date transaction_date form-control" name="data[transaction_date][0]" required="">
                          </td>
                          <td class="form-group error_block">
                            <input type="text" class="doc_reference form-control" name="data[doc_reference][0]" required="">
                          </td>
                          <td>
                            <input style="min-width: 250px;" type="text" class="remarks form-control" name="data[remarks][0]">
                          </td>
                          <td class="form-group error_block">
                            <input style="min-width: 120px;" type="number" class="amount form-control" name="data[amount][0]" required="">
                          </td>
                          <td class="form-group error_block">
                            <input style="min-width: 50px;" type="text" class="sign form-control" name="data[sign][0]" placeholder="+/-" required="">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-6 col-md-offset-6 col-xs-12">
                      <div id="another_entry" class="pull-right">
                        Input Another Entry?
                        <button type="button" class="btn btn-primary" id="input_another_entry">Yes</button>
                        <button type="button" class="btn btn-primary " onclick="$('#submitbtn').removeClass('hidden');$('#another_entry').hide();">No</button> 
                      </div>
                  </div>
                  <div class="row no-print">
                    <div class="col-xs-12">
                      <button type="submit" class="btn btn-success pull-right hidden" id="submitbtn"><i class="fa fa-credit-card"></i> Submit
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
$(function() {
  //=========================customer details ====================================================
  $(".my_date").focus();
  $cansend = false;
  
  $(".my_date").inputmask("9999/99/99",{ "placeholder": "yyyy/mm/dd" });
    $('form#form_').submit(function(){
     var form = $(this);
         if ($cansend == true)
            {
                $cansend = false;
                return true;
            }
            $('#quot_status').html('');
            $.confirm({
                title:"<i class='fa fa-info'></i> Bank Adjustment Confirmation",
                text: "Confirm?",
                cancelButton: "No",
                confirm: function(button) {
                  $('#quot_status').html('');
                    $('#quot_status').html('<input type="hidden" name="invoice_status" value="C">');
                    $cansend = true;
                    
                  //  console.log($("#lump_sum_discount").val);
                    form.submit();
                },
                cancel: function(button) {
                 
                    $cansend = true;
                    form.submit();
                }
            });
            return false;
  })
  
  $("#input_another_entry").click(function(evernt) {
    
    $("#flag_text").html("Mode: Invoice Entry");
    var numrows = $("form#form_").find("input[name^='data[transaction_date]']").length;

    console.log(numrows);
    var append_str_entry = '<tr>' 
                          +'<td class="form-group error_block">'
                          + '<input type="text" required="" class="form-control my_date" name="data[transaction_date]['
                          + numrows
                          + ']">'
                          + '</td>'
                          + '<td class="form-group error_block">'
                          + '<input type="text" required="" class="form-control" name="data[doc_reference]['
                          + numrows
                          + ']">'
                          + '</td>'
                          + '<td>'
                          +  '<input type="text" class="form-control" name="data[remarks]['
                          + numrows
                          + ']">'
                          + '</td>'
                          + '<td class="form-group error_block">'
                          +  '<input type="text" required="" class="form-control" name="data[amount]['
                          + numrows
                          + ']">'
                          + '</td>'
                          + '<td class="form-group error_block">'
                          + '<input type="text" class="form-control" name="data[sign]['
                          + numrows
                          + ']" placeholder="+/-" required>'
                          + '</td>'
                          + '</tr>';

    $("#open_table tbody").append(append_str_entry);
    $(".my_date").inputmask("9999/99/99",{ "placeholder": "yyyy/mm/dd" });
    $(".my_date").focus();
  });
  
 
});

function delete_row(data) {
    $(data).parents("tr").remove();
}

</script>