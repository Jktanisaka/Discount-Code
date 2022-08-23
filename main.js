$(document).ready(function(){
  $("#admin-button").click(function(){
    window.location.assign("admin.php");
  })
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
})
