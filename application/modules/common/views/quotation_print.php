<!DOCTYPE html>
<html>
<head>
	<title></title>	
</head>
<body style="margin: 0; padding: 0;">
	<hr style="color: #dd4b39">
    <?php if($logo_with == "logo_with"): ?>
          <div align="left">
            <strong>
                <img src="<?php echo UPLOAD_PATH.'site/'.$company_details->company_logo ?>" class='img img-thumbnail' height="38px" width="140px"/>
                <div align="center">
                    <h4 align="center"><?php echo $company_details->company_name ?></h4>
                    <?php echo $company_details->company_address; ?>
                    <br>GST Register Number : <?php echo $company_details->gst_reg_no ?> | UEN No. : <?php echo $company_details->uen_no; ?>
                    <br>Phone : <?php echo $company_details->phone ?> | Fax : <?php echo $company_details->fax ?>    
                </div>
            </strong>
            <hr>
        </div>
    <?php endif; ?>
	<div align="center">
		<div align="left" style="font-size:10px;">
	      <b>To:</b>
	      <address>
	      	<h4 style="font-size: 10px;"><?php echo $customer_options->customer_name; ?></h4>
	        
	        <b>Address:</b><?php echo $customer_options->customer_bldg_number; ?><br>
	        <?php echo $customer_options->customer_street_name; ?><br>
	        <?php echo $customer_options->customer_postal_code; ?><br>
	        <b>Phone:</b><?php echo $customer_options->customer_phone; ?><br>
	        <b>Email:</b> <?php echo $customer_options->customer_email; ?>
	      </address>
	    </div>
	    <div align="right" style="font-size:10px;margin-top: -90px;">
	      <b>Quotation : <?php echo $quotation_details->quotation_text_prefix.'.'.($quotation_details->quotation_number_prefix + 1); ?></b><br><br>
	      <div style="margin-left: 565px;">
	      	<b align="left">Date:</b> <?php echo date('d-m-Y'); ?><br>
	      </div>
	      <div style="margin-left: 565px;">
	      	<p>Salesman: </p>
	      	<h4><?php echo $salesman_options->s_name; ?></h4> 		
	      </div>
	    </div>
    </div>

    <div>
    	<p style="width: 600px; font-size: 10px;"><?php echo $quotation_header_text; ?></p>	
    </div>
    <hr>
    <table cellpadding="10">
    	<thead>
    		<tr style="text-align:center;">
	    		<!-- <th style="text-align: center;font-size: 11px; border: 1px solid #000">S.NO</th> -->
                <th >S.NO</th>
			    <th colspan="2">DESCRIPTION</th>	
			    <th >QUANTITY</th>
			    <th >UOM</th>
			    <th >UNIT PRICE(<?php echo $customer_options->currency_name;?>)</th>
			    <th >DISCOUNT (%)</th>
			    <th >AMOUNT(<?php echo $customer_options->currency_name;?>)</th>
			    <th >CAT</th>
			    <th >GST AMT</th>
			</tr>
    	</thead> 
    	<tbody>
    		<?php 
    		for($i = 0; $i < $row_num; $i ++){
    			$column = "<tr style='text-align:center;'>";
    			$column .= "<td>".($sno[$i] + 1)."</td>";
    			$column .= "<td colspan='2'>".$description[$i]."</td>";
    			$column .= "<td>".$quantity[$i]."</td>";
    			$column .= "<td>".$uom[$i]."</td>";
    			$column .= "<td>".$unit_price[$i]."</td>";
    			$column .= "<td>".$discount[$i]."</td>";
    			$column .= "<td>".$amount[$i]."</td>";
    			$column .= "<td>".$cat[$i]."</td>";
    			$column .= "<td>".$gst_amt[$i]."</td>";
    			$column .= "</tr>";
    			echo $column;
    		}
    		?>
    		<tr>
    			<td colspan="4"></td> 
    			<td colspan="2">subtotal:</td>
    			<td colspan="3"></td>
    			<td><?php echo $subtotal;?></td>
    		</tr>
    		<tr>
                <td colspan="4"></td>
                <td colspan="2">Lump Sum Discount (%)</td>
                <td colspan="1"></td>
                <td colspan="1"><?php echo $lump_sum_discount?></td>
                <td colspan="1"></td>
                <td><?php echo $lump_sum_discount_amount?></td>
    		</tr>
    		<tr>
                <td colspan="4"></td>
                <td colspan="2">Net of lump Discount:</td>
                <td colspan="3"></td>
                <td><?php echo $net_of_lump_discount;?></td>
    		</tr>
    		<tr>
                <td colspan="4"></td>
                <td colspan="2">GST(%)</td>
                <td colspan="1"></td>
                <td colspan="1"><?php echo '7';?></td>
                <td colspan="1"></td>
                <td><?php echo $gst_lump_sum_amount;?></td>
    		</tr>
    		<tr>
                <td colspan="4"></td>
                <td colspan="2">Total</td>
                <td colspan="3"></td>
                <td><?php echo $total;?></td>
    		</tr>
            <tr>
                <td colspan="4"></td>
                <td colspan="2">Total in(<?php echo $customer_options->currency_name;?>):</td>
                <td colspan="3"></td>
                <td><?php echo $total;?></td>
            </tr>
    		<tr>
                <td colspan="1"></td>
                <td colspan="2">Terms Of Payments:</td>
                <td colspan="1"></td>
                <td colspan="4"><?php echo $terms_of_payments;?></td>
                <td colspan="2"></td>
    		</tr>
    		<tr>
                <td colspan="1"></td>
                <td colspan="2">Training Venue:</td>
                <td colspan="1"></td>
                <td colspan="4"><?php echo $training_venue;?></td>
                <td colspan="2"></td>
    		</tr>
    		<tr>
                <td colspan="1"></td>
                <td colspan="2">Modification:</td>
                <td colspan="1"></td>
                <td colspan="4"><?php echo $modification;?></td>
                <td colspan="2"></td>
    		</tr>
    		<tr>
                <td colspan="10"><?php echo $quotation_footer_text;?></td>
    		</tr>
    		<tr>
                <td colspan="4">Customer Signature and Co Stamp</td>
                <td colspan="6"></td>
    		</tr>
    		<tr>
                <td colspan="2">Name: </td>
    		</tr>
    		<tr>
                <td colspan="2">Date: </td>
    		</tr>
    	</tbody>
    </table>
</body>
</html>
