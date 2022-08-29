$(document).ready(function(){
  // apply coupon handler//
  $('#apply-button').click(function () {
    const sum = $('#total').text().substring(1)
    const coupon = $('#coupon-code').val()
    $.ajax({
      type: "POST",
      url: "src/verify.php",
      data: {
        coupon: coupon
      },
      success: function (data) {
        if (parseFloat(data)) {
          $('#total').addClass('strikethrough')
          $('#total-text').addClass('strikethrough')
          $('#new-total').text("$" + parseFloat(data)).show()
          $('#new-total-tr').show()
          $('#status').removeClass('red').addClass('green')
          $('#status').text("Coupon Added!").show()
          $('#used-coupon').val(coupon)
          $('#coupon-name').text('coupon: ' + coupon)
          $('#saved').text('-$' + (parseFloat(sum) - data).toFixed(2))
        } else {
          $('#status').removeClass('green').addClass('red')
          $("#status").text(data).show()
        }
        $('#total')
      }
    })

  })

  $("#admin-button").click(function(){
    window.location.assign("public/admin.php");
  })
  $("#customer-button").click(function(){
    window.location.assign("public/customer.php")
  })

  //new coupon select handler//
  $("#coupon-form").change(function(event){
    switch(event.target.value) {
      case "bogo":
        $("#value-box").hide().val()
        break;
      case "percentage":
        $("#value-box").show()
        break;
      case "dollar":
        $("#value-box").show()
        break;
    }
  })
  $("#new-coupon").click(function(){
    $("#coupon-page").slideToggle()
  })
  // disables enter button //
  $(window).keydown(function (event) {
    if (event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
})
