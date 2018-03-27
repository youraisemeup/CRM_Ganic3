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
      var unit_price=$("#unit_price_"+id+"").val();
      
      // caluclateing single product total
      if(quantity!=0 && quantity!="" && unit_price != 0 && unit_price != "")
      {
        amount = quantity * unit_price;
        $("#total_"+id+"").text(amount.toFixed(2));        
        $("#service_total_"+id+"").val(amount.toFixed(2));        
        var element = document.getElementById("total_"+id+"");
        element.dataset.show = amount;
        element.dataset.calculate = amount;
      }

       
        
      // $("#product_total_"+id+"").val(disamount.toFixed(2));
      // var pelement = document.getElementById("product_total_"+id+"");
      //   pelement.dataset.show = disamount;
    }
    
    // caluclateing all product total
    get_sub_total();
    
  },1000);
}
function get_sub_total(){
  setTimeout(function () {

    //TODO: //THIS IS EXCEPTION PROCESS OF 
    $("#total_amount_foreign").text("");
    $('#product_table .total').each(function(){
      if($("#total_amount_foreign").text()!=""){
        var total_amount_foreign=parseFloat($("#total_amount_foreign").text())+parseFloat($(this).attr("data-show"));
        $("#total_amount_foreign").text((total_amount_foreign).toFixed(2));
      }
      else{
        var total_amount_foreign=parseFloat($(this).attr("data-show"));
        $("#total_amount_foreign").text((total_amount_foreign).toFixed(2));
      }
    });
    $("#total_amount_foreign_value").val((parseFloat($("#total_amount_foreign").text()).toFixed(2)));
    
    
//     //===========================lump sum discount ==========================================
    freight_insurance=$("#freight_insurance").val();
    if(freight_insurance==""){
      freight_insurance=0;
    }
    freight_insurance=parseFloat(freight_insurance);
    //Display
    total_amount_foreign=parseFloat($("#total_amount_foreign").text());
    var sum_freight_insurance=total_amount_foreign + freight_insurance;
    $("#total_amount_foreign").text((sum_freight_insurance).toFixed(2));

    $("#total_product_amt").text((total_amount_foreign).toFixed(2));

    
    
    

    total_amount_local=parseFloat($("#total_amount_foreign").text());
    xchangerate = parseFloat($("#xchange_rate").val());

    $("#total_amount_local").text((total_amount_local / xchangerate).toFixed(2));

    $("#total_amount_local_value").val((parseFloat($("#total_amount_local").text()).toFixed(2)));

    total_purchases_before_gst = parseFloat($("#total_amount_local").text()) + parseFloat($("#local_handling").val());
    //alert(total_purchases_before_gst);
    $("#total_purchases").text(total_purchases_before_gst.toFixed(2));

    $("#total_purchases_value").val(total_purchases_before_gst.toFixed(2));    

    var conversion_factor = parseFloat($("#total_purchases").text()) / total_amount_foreign;
    $("#conversion_factor").text(parseFloat(conversion_factor).toFixed(2));

  },1000);
}