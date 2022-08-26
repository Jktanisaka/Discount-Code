<?php
include 'cart.php';

$sum = 0;


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div id="shopping-cart">
    <?php foreach ($cart as $item) {
      $sum += $item['price'] * $item['amount']; ?>
      <div class="flex justify-center flex-column">
        <h3><?php echo $item['productName'] ?></h3>
        <p>x<?php echo $item['amount'] ?> ($<?php echo $item['price'] ?> each)</p>
        <p>$<?php echo $item['price'] * $item['amount'] ?></p>
      </div>
    <?php } ?>
    <p class="" id='total'>Total $<?php echo $sum ?></p>
    <p id='new-total' class="hidden"></p>
  </div>
  <form action="verify.php" method="POST">
    <input name='coupon-code' id='coupon-code'></input>
    <button type="button" id='apply-button'>Apply Coupon</button>
    <p id="status" class="hidden"></p>
  </form>
  <form action='checkout.php' method="POST">
    <button type="submit">Checkout</button>
    <input type="hidden" id="used-coupon" name='used-coupon'></input>
  </form>
  <script src=" https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="main.js"></script>
  <script>
    $(document).ready(function() {
      $('#apply-button').click(function() {
        const coupon = $('#coupon-code').val()
        $.ajax({
          type: "POST",
          url: "verify.php",
          data: {
            coupon: coupon
          },
          success: function(data) {
            if (parseFloat(data)) {
              $('#total').addClass('strikethrough')
              $('#new-total').text("New Total: $" + parseFloat(data)).show()
              $('#status').text("Coupon Added!").show()
              $('#used-coupon').val(coupon)
            } else {
              $("#status").text(data)
            }
            $('#total')
            console.log(typeof data)
          }
        })

      })
    })
  </script>
</body>

</html>
