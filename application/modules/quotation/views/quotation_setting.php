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
    $list = array('active'=>'Quotation Setting');
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
        <h3 class="box-title">Quotation Setting </h3>
        </legend>
        <span class="callout pull-right callout-info" style="width: 100%">
          <p>Note for Quatation Setting : Put Inputbox blank if you want to hide that from Quotation</p>
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
              <legend>Quotation Header</legend>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="quotation_text_prefix">Text Prefix : </label>  
                <div class="col-md-4">
                  <input id="quotation_text_prefix" maxlength="6" value="<?php if(!is_null($quotation_details)){echo $quotation_details->quotation_text_prefix;} ?>" name="quotation_text_prefix" placeholder="Text Prefix" class="form-control input-md" type="text">
                </div>
                <!-- ============================================================================= -->
                <label class="col-md-2 control-label" for="quotation_number_prefix">Number Suffix : </label>  
                <div class="col-md-4">
                <input id="quotation_number_prefix" onKeyPress="if(this.value.length==6) return false;" value="<?php if(!is_null($quotation_details)){echo $quotation_details->quotation_number_prefix;} ?>" name="quotation_number_prefix" placeholder="Number Suffix" class="form-control input-md" type="number">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label" for="quotation_type">Integration Type : </label>  
                <div class="col-md-4">
                  <select id="quotation_type" name="quotation_type" class="form-control input-md">
                    <?php echo $quotation_type_options; ?>
                  </select>
                </div>
                <!-- ============================================================================= -->
                <label class="col-md-2 control-label" for="quotation_header_text">Header Notes(Text) : </label>  
                <div class="col-md-4">
                <textarea rows="4" id="quotation_header_text" name="quotation_header_text" placeholder="Header Notes(Text)" class="form-control input-md" type="text"><?php if(!is_null($quotation_details)){echo $quotation_details->quotation_header_text;} ?></textarea>
                </div>
              </div>
            </fieldset>
            <hr>
            <fieldset>
              <!-- Form Name -->
              <legend>Quotation Footer</legend>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="terms_of_payments">Terms Of Payments : </label>  
                <div class="col-md-4">
                  <input id="terms_of_payments" value="<?php if(!is_null($quotation_details)){echo $quotation_details->terms_of_payments;} ?>" name="terms_of_payments" placeholder="Terms Of Payments" class="form-control input-md" type="text">
                </div>
                <!-- ============================================================================= -->
                <label class="col-md-2 control-label" for="training_venue">Training Venue : </label>  
                <div class="col-md-4">
                <input id="training_venue" value="<?php if(!is_null($quotation_details)){echo $quotation_details->training_venue;} ?>" name="training_venue" placeholder="Training Venue" class="form-control input-md" type="text">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label" for="modification">Modification : </label>  
                <div class="col-md-4">
                  <input id="modification" value="<?php if(!is_null($quotation_details)){echo $quotation_details->modification;} ?>" name="modification" placeholder="Modification" class="form-control input-md" type="text">
                </div>
                <!-- ============================================================================= -->
                <label class="col-md-2 control-label" for="cancellation">Cancellation : </label>  
                <div class="col-md-4">
                <input id="cancellation" value="<?php if(!is_null($quotation_details)){echo $quotation_details->cancellation;} ?>" name="cancellation" placeholder="Cancellation" class="form-control input-md" type="text">
                </div>
              </div>

               <div class="form-group">
                <label class="col-md-2 control-label" for="quotation_footer_text">Footer Notes(Text) : </label>  
                <div class="col-md-4">
                  <textarea rows="4" id="quotation_footer_text" name="quotation_footer_text" placeholder="Footer Notes(Text)" class="form-control input-md"><?php if(!is_null($quotation_details)){echo $quotation_details->quotation_footer_text;} ?></textarea>
                </div>
              </div>
            </fieldset>

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