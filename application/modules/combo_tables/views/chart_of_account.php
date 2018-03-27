<section class="content-header">
  <h1>
    Chart Of Account
    <!-- <small>Preview of UI elements</small> -->
  </h1>
  <?php 
    $list = array('active'=>'Chart Of Account');
    echo breadcrumb($list); 
    ?>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div id="message_area">
        <?php get_flash_message('message'); ?>
      </div>
      <?php echo $buttonsPanel; ?>
      <div class="box box-warning">
        <div class="box-body">
          <div id="list_table">
                	<table class="table " id="datatable" width="100%">
                  		<thead>
                    		<tr>
                     			<th>Id</th>
                      			<th>Account Code</th>
                      			<th>Account Description</th>
                    		</tr>
                  		</thead>
                	</table>
              	</div>
              	<form autocomplete="off"method="post" action="#" enctype="multipart/form-data" class="validate">
                	<div id="form_data"></div>
              	</form>
          </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  jQuery(document).ready(function() {
    hideButtons();
    clearMessages();
    var form = $("form");
    var form_action = '';
    var url = '';
    table = $('#datatable').DataTable({ 
      "scrollX": true,
	    "processing": true, //Feature control the processing indicator.
	    "serverSide": true, //Feature control DataTables' server-side processing mode.
	    "order": [[1,"asc"]], //Initial no order.
	  
	    // Load data for the table's content from an Ajax source
	    "ajax": {
	      "url": "<?php echo base_url('common/datatable/ajax_list/chart_of_account'); ?>",
	      "type": "POST"
	    },
	  
	    //Set column definition initialisation properties.
	    "columnDefs": [
	    	{ 
	        	"targets": [], //index no. of column
	        	"orderable": false, //set not orderable
	      	},
	      	{ 
		        "targets": [0], //index no. of column
	    	    "visible": false, //set not orderable
	      	},
	    ],
	});
    
     // do some stuff here
      
     /* new button */
     $("#new").on('click',function(){
        showHideButtons("new");
        $("#list_table").hide();
        form_action = '<?php echo $save_url; ?>'; //action url when new add form is active.
        var url = '<?php echo $new_url; ?>'; 
        $.post(url, function(result){
            $("#form_data").html('');
            $("#form_data").html(result);
        });
     });
     /*..........over here.....*/
  
     /* edit form */
     $("#edit").on('click',function(){

      rowData = table.row('.selected').data(); 
      rowID = rowData[0];
      if (rowID!="") {
         $.post('<?php echo base_url('common/Ajax/backend_ajax/check_coa_state') ?>', {coa_id: rowID}, function(data, textStatus, xhr) {
          console.log(data);
          if (data == 0) {
            form_action = '<?php echo $update_url; ?>';
            url = '<?php echo $edit_url; ?>';
              showData("edit",url,form_action);
          }
        });
      }
     });
     /* .......... over here............. */
  
     /* view form */
     $("#view").on('click',function(){
        url = '<?php echo $view_url; ?>';
          showData("view",url);
     });
     /* .......... over here............. */
     
     /* delete button */
     $("#delete").on('click',function(){

      rowData = table.row('.selected').data(); 
      rowID = rowData[0];
      if (rowID!="") {
         $.post('<?php echo base_url('common/Ajax/Backend_ajax/check_coa_state') ?>', {coa_id: rowID}, function(data, textStatus, xhr) {
          console.log(data);
          if (data == 0) {
            var url = '<?php echo $delete_url; ?>';
            showData("delete",url);
          }
        });
      }
     });
     /*... over here ...*/
  
     /* save button */
     $("#save").on('click',function(){
        form.attr('action',form_action);
        if(form.valid() && $('.coa_duplicate').css('display') == 'none' && !isNaN($('#coa_suffix').val()))
        {
          form.submit();
        }
        // if (isNaN($('#coa_suffix').val())) {
        //   $('.coa_num_validate').css('display','block').css('color','red');
        // }
     });
     /*... over here ... */
  });
</script>