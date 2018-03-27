<style type="text/css">
.callout {
  border-radius: 3px;
  margin: 0 0 5px 0;
  padding: 5px 8px 4px 15px;
  border-left: 5px solid #eee;
      border-left-color: rgb(238, 238, 238);
}
hr{
  color: #dd4b39 !important;
  border-color: #dd4b39 !important;
  border-style: solid !important;
  border-width: 1px !important;
}
</style>
<section class="content-header">
  <?php 
    $list = array('active'=>'Receipt Setting');
    echo breadcrumb($list); 
  ?>
</section><br>
<section class="content">
<?php echo get_flash_message('message'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <legend> 
        <h3 class="box-title">Receipt Setting </h3>
        </legend>
        <span class="callout pull-right callout-info" style="width: 100%">
          <p>Note for Receipt Setting : Put Inputbox blank if you want to hide that from Receipt</p>
        </span>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-danger">
      <div class="row">
        <div class="col-md-12">
          <form autocomplete="off" class="form-horizontal validate box-body" method="post" action="<?php echo $save_url; ?>">
            <fieldset>

              <!-- Form Name -->
              <legend>Receipt Header</legend>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="receipt_text_prefix">Text Prefix : </label>  
                <div class="col-md-4">
                  <input id="receipt_text_prefix" maxlength="6" value="<?php if(!is_null($receipt_details)){echo $receipt_details->receipt_text_prefix;} ?>" name="receipt_text_prefix" placeholder="Text Prefix" class="form-control input-md" type="text">
                </div>
                <!-- ============================================================================= -->
                <label class="col-md-2 control-label" for="receipt_number_prefix">Number Suffix : </label>  
                <div class="col-md-4">
                <input id="receipt_number_prefix" onKeyPress="if(this.value.length==6) return false;" value="<?php if(!is_null($receipt_details)){echo $receipt_details->receipt_number_prefix;} ?>" name="receipt_number_prefix" placeholder="Number Suffix" class="form-control input-md" type="number">
                </div>
              </div>

              <div class="form-group" style="display: none">
                <label class="col-md-2 control-label" for="receipt_type">receipt Type : </label>  
                <div class="col-md-4">
                  <select id="receipt_type" name="receipt_type" class="form-control input-md">
                    <?php echo $receipt_type_options; ?>
                  </select>
                </div>
                <!-- ============================================================================= -->
                <label class="col-md-2 control-label" for="receipt_header_text">Header Notes(Text) : </label>  
                <div class="col-md-4">
                <textarea rows="4" id="receipt_header_text" name="receipt_header_text" placeholder="Header Notes(Text)" class="form-control input-md" type="text"><?php if(!is_null($receipt_details)){echo $receipt_details->receipt_header_text;} ?></textarea>
                </div>
              </div>
            </fieldset>
            <hr>
            

        </div>
      </div>
    <div class="box-footer with-border">
        <a href="<?php echo base_url().'dashboard'; ?>" class="btn btn-default">Cancel</a>
              <button type="submit" class="btn btn-info pull-right">Submit</button>
      </div>
          </form>
  </div>
    </div>
</div>
</section>