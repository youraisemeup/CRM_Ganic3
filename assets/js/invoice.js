// ===========================manage serial number ================================================
$(document).on("click",function(){    
   $("#product_table tbody tr td.sno").each(function(index,element){                 
       $(element).text(index + 1); 
    });
});
//================================== calculate things ============================================
// function get_amount(id) {
//   // getting textbox values
//   setTimeout(function () {
//     var quantity=$("#quantity_"+id+"").val();
//     var discount=$("#discount_"+id+"").val();
//     var price=$("#price_"+id+"").val();
//     // caluclateing single product total
//     if(quantity==0)
//     {
//           amount=1*price;  
//     }
//     else
//     {
//           amount=quantity*price;
//     }

//     $("#total_"+id+"").text((amount-(amount*discount)/100).toFixed(2));
//     $("#product_total_"+id+"").val((amount-(amount*discount)/100).toFixed(2));
//     // caluclateing all product total
//     get_sub_total();
//   },1000);
// }

function get_amount(id) {
  // getting textbox values
  setTimeout(function () {
       
    var isService = $("#quantity_"+id+"").prop('disabled');
       
    
    if(!isService)
    {
    var quantity=$("#quantity_"+id+"").val();
    var discount=$("#discount_"+id+"").val();
    var dispprice=$("#unit_price_"+id+"").html();
    $("#unit_price_"+id+"").text(parseFloat(dispprice).toFixed(2));
     var price=$("#price_"+id+"").val();
    // caluclateing single product total
    if(quantity==0 || quantity=="")
    {
         quantity=1;
    }

    if(discount==0 || discount=="")
    {
         discount=0;
    }

         disamount = quantity*dispprice;
         
         disamount = disamount - (disamount*discount) / 100;

    $("#total_"+id+"").text(disamount.toFixed(2));
    
      var element = document.getElementById("total_"+id+"");
     element.dataset.show = disamount;
     element.dataset.calculate = disamount;
      
    $("#product_total_"+id+"").val(disamount.toFixed(2));
    var pelement = document.getElementById("product_total_"+id+"");
      pelement.dataset.show = disamount;
    }
    
    else
    {
     var amount=$("#service_total_"+id+"").val();
     var element2 = document.getElementById("total_"+id+"");
     element2.dataset.show = amount;
     element2.dataset.calculate = amount;
    $("#product_total_"+id+"").val(amount);
    var pelement2 = document.getElementById("product_total_"+id+"");
      pelement2.dataset.show = amount;
    }
    
    // caluclateing all product total
 get_sub_total();
    
  },1000);
}
// ============================== get sub total and final price ================================
// function get_sub_total(){
//   setTimeout(function () {
//     $("#sub_total").text("");
//     $('#product_table .total').each(function(){
//       if($("#sub_total").text()!=""){
//         var sub_total=parseFloat($("#sub_total").text())+parseFloat($(this).text())
//         $("#sub_total").text((sub_total).toFixed(2));
//         $("#sub_total_text").val((sub_total).toFixed(2));
//       }
//       else{
//         var sub_total=parseFloat($(this).text())
//         $("#sub_total").text((sub_total).toFixed(2));
//         $("#sub_total_text").val((sub_total).toFixed(2));
//       }
//     })
//     //===========================lump sum discount ==========================================
//     lump_sum_discount=$("#lump_sum_discount").val();
//     if(lump_sum_discount==""){
//       lump_sum_discount=0;
//     }
//     sub_total=parseFloat($("#sub_total").text());
//     var lump_sum_discount_amount=(sub_total*lump_sum_discount)/100;
//     $("#lump_sum_discount_amount").text("-"+(lump_sum_discount_amount).toFixed(2));
//     $("#lump_sum_discount_price").text((sub_total-lump_sum_discount_amount).toFixed(2));
//     $("#lump_sum_discount_price_text").val((sub_total-lump_sum_discount_amount).toFixed(2));
//     // counting gst product wise ===============================================================
//     var payable_gst=0;
//     $('#product_table .gst_percentages').each(function(){
//       individual_product_total=$("#product_total_"+$(this).attr('id')).val();
//       gst_rate=$(this).val();
//       if(lump_sum_discount!=0){
//         payable_gst=parseFloat(individual_product_total*(gst_rate/100)*(lump_sum_discount/100))+payable_gst;
//       }else{
//         payable_gst=parseFloat(individual_product_total*(gst_rate/100))+payable_gst;
//       }
      
//     });
//     $("#gst_payable_amount").text("+"+(payable_gst).toFixed(2));
//     // ============================== final total ============================================
//     lump_sum_discount_price=$("#lump_sum_discount_price").text();
//     gst=$("#gst").val();
//     // var final_total_per=(lump_sum_discount_price+payable_gst);
//     var final_total_display=(parseFloat(payable_gst)+parseFloat(lump_sum_discount_price)).toFixed(2);
//     $("#final_total").text(final_total_display);
//     $("#final_total_text").val(final_total_display);
//     currency_amount=$("#currency_amount").val();
//     $("#final_total_forex").val((currency_amount*final_total_display).toFixed(2));
//     $("#final_total_forex_text").text((currency_amount*final_total_display).toFixed(2));
//   },1000);
// }

function get_sub_total(){
  setTimeout(function () {
  $("#sub_total").text("");
    $('#product_table .total').each(function(){
      if($("#sub_total").text()!=""){
        var sub_total=parseFloat($("#sub_total").text())+parseFloat($(this).attr("data-show"));
        var sub_total_text=parseFloat($("#sub_total_text").val())+parseFloat($(this).attr("data-calculate"));
        $("#sub_total").text((sub_total).toFixed(2));
        $("#sub_total_text").val((sub_total_text).toFixed(2));
      }
      else{
        var sub_total=parseFloat($(this).attr("data-show"));
        var sub_total_text=parseFloat($(this).attr("data-calculate"));
        $("#sub_total").text((sub_total).toFixed(2));
        $("#sub_total_text").val((sub_total_text).toFixed(2));
      }
    });
//     //===========================lump sum discount ==========================================
    lump_sum_discount=$("#lump_sum_discount").val();
    if(lump_sum_discount==""){
      lump_sum_discount=0;
    }
        lump_sum_discount=parseFloat(lump_sum_discount);
    //Display
    sub_total=parseFloat($("#sub_total").text());
    var lump_sum_discount_amount=(sub_total*lump_sum_discount)/100;
    $("#lump_sum_discount_amount_display").text("-"+(lump_sum_discount_amount).toFixed(2));
    $("#lump_sum_discount_price").text((sub_total-lump_sum_discount_amount).toFixed(2));
 
    //Calculation
      sub_total_text=parseFloat($("#sub_total_text").val());
    var lump_sum_discount_amount_cal=(sub_total_text*lump_sum_discount)/100;
    $("#lump_sum_discount_amount").text("-"+(lump_sum_discount_amount_cal).toFixed(2));
    $("#lump_sum_discount_price_text").val((sub_total_text-lump_sum_discount_amount_cal).toFixed(2));
    
        // counting gst product wise ===============================================================
    var payable_gst=0;
    var payable_gst_show=0;

     $('#product_table .gst_percentages').each(function(){
         var id=$(this).attr('id');
       individual_product_total=parseFloat($("#product_total_"+id).val()).toFixed(2);

    gst_rate=parseFloat($(this).val()).toFixed(2);
    var gst_amt_before_lumpsum = parseFloat(individual_product_total * parseFloat(gst_rate)/100);
    
      $("#gst_amt_"+id).val(gst_amt_before_lumpsum.toFixed(2));
      
      individual_product_total_show=parseFloat($("#product_total_"+id).attr("data-show"));
      console.log(individual_product_total_show);
       if(lump_sum_discount!=0){
         $("#gst_amt_"+id).val(parseFloat(((individual_product_total - individual_product_total*parseInt(lump_sum_discount)/100)) * (parseInt(gst_rate)/100)).toFixed(2));
         payable_gst=parseFloat(((individual_product_total - individual_product_total*parseInt(lump_sum_discount)/100)) * (parseInt(gst_rate)/100)) + parseInt(payable_gst);
         payable_gst_show=parseFloat((parseInt(individual_product_total_show) - parseInt(individual_product_total_show)*parseInt(lump_sum_discount)/100) *(parseInt(gst_rate)/100)) +parseInt(payable_gst_show);
       
       }else{
         $("#gst_amt_"+id).val((individual_product_total*(gst_rate/100)).toFixed(2));
         payable_gst=parseFloat(individual_product_total*(gst_rate/100))+payable_gst;
         payable_gst_show=parseFloat(individual_product_total_show*(gst_rate/100))+payable_gst_show;
       }
    
    $("#gst_payable_amount").text("+"+(payable_gst).toFixed(2));
    $("#gst_payable_amount_show").text("+"+(payable_gst_show).toFixed(2));
  
     });
    
    // ============================== final total ============================================
    lump_sum_discount_price=$("#lump_sum_discount_price").text();
    gst=$("#gst").val();
    
    //Forex price calculation
    
    var final_total_display=(parseFloat(payable_gst_show)+parseFloat(lump_sum_discount_price)).toFixed(2);
    $("#final_total_forex_text").text(parseFloat(final_total_display).toFixed(2));
    $("#final_total_forex").val(parseFloat(final_total_display).toFixed(2));
    
   lump_sum_discount_price_text=$("#lump_sum_discount_price_text").val();
   var final_total=(parseFloat(payable_gst)+parseFloat(lump_sum_discount_price_text)).toFixed(2);

   $("#final_total").text(parseFloat(final_total).toFixed(2));
  $("#final_total_text").val(parseFloat(final_total).toFixed(2));
  
  },1000);
}