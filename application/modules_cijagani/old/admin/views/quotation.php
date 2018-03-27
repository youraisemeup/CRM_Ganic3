
		<header class="header bg-white b-b b-light">
		  <?php 
		    $list = array("active"=>"Quotation");
		    echo breadcrumb($list); 
		    ?>
		</header>
		<section>
		  <?php echo get_flash_message("message"); ?>
		  <section class="hbox stretch">
		    <section class="vbox">
		      <section  class="scrollable wrapper">
		        <section class="panel panel-default">
		        	&nbsp;
		        </section>
		      </section>
		    </section>
		  </section>
		</section>