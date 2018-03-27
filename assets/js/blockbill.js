Date.prototype.calcFullMonths = function(monthOffset) {
  //copy the date
  var dt = new Date(this);
  dt.setMonth(dt.getMonth() + monthOffset);
  return dt;
};
 
function set_enddate(start_date){
  console.log(start_date);
  var contract_type = $('#contract_type').val();
  var end_date;
  switch (contract_type) {
    case 'M':
        console.log((new Date(start_date)).calcFullMonths(1));
        end_date = (new Date(start_date)).calcFullMonths(1);
        $('#end_date').val(formatDate(end_date));
        break;
    case 'Q':
        end_date = (new Date(start_date)).calcFullMonths(3);
        $('#end_date').val(formatDate(end_date));
        break;
    case 'H':
        end_date = (new Date(start_date)).calcFullMonths(6);
        $('#end_date').val(formatDate(end_date));
        break;
    case 'Y':
        end_date = (new Date(start_date)).calcFullMonths(12);
        $('#end_date').val(formatDate(end_date));
  }
  $('#next_bill_date').val(format_nextbilldate(end_date));
}

function format_nextbilldate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('/');
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + (d.getDate() - 1),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('/');
}

function get_amount() {
  // getting textbox values
  setTimeout(function () {
    var currencyRate = $('#currency_amount').val();
    var contract_amount_sgd = $('#contract_amount_sgd').val();
    $('#contract_sum').val((parseFloat(contract_amount_sgd) * currencyRate).toFixed(2));
    $('#contract_sum_text').text((parseFloat(contract_amount_sgd) * currencyRate).toFixed(2));
    get_inclusive_gst();
  },1000);
}

function get_inclusive_gst(){
  setTimeout(function () {

    less_discount=$("#less_discount").val();
    if(less_discount==""){
      less_discount=0;
    }
    less_discount=parseFloat(less_discount);
    //Display
    contract_sum=parseFloat($("#contract_sum_text").text()).toFixed(2);
    var less_discount_amount=(contract_sum*less_discount)/100;
    $("#less_discount_amount_display").text("-"+(less_discount_amount).toFixed(2));
    
    $("#net_contract_amount_text").text((contract_sum-less_discount_amount).toFixed(2));
    $("#net_contract_amount").val((contract_sum-less_discount_amount).toFixed(2));

    var gst_amount = parseFloat($('#net_contract_amount').val() * 7 / 100).toFixed(2);
    
    $('#gst_payable_amount_show').text("+" + gst_amount);
    $('#gst_payable_amount').val("+" + gst_amount);
    
    var total_inclusive_gst_amount = contract_sum - less_discount_amount + parseFloat(gst_amount);
             
    $('#total_inclusive_gst_text').text(total_inclusive_gst_amount.toFixed(2));
    $('#total_inclusive_gst').val(total_inclusive_gst_amount.toFixed(2));
    var currency_amount = $('#currency_amount').val();
    $('#total_inclusive_gst_local_text').text((total_inclusive_gst_amount.toFixed(2) / currency_amount).toFixed(2));
    $('#total_inclusive_gst_local').val((total_inclusive_gst_amount.toFixed(2) / currency_amount).toFixed(2));
    

  },1000);
}