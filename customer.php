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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div id="shopping-cart" class="flex justify-center flex-column">
    <form action="verify.php" method="POST" class="flex justify-center flex-column align-center apply-coupon-form">
      <div class="flex justify-center align-center">
        <input name='coupon-code' id='coupon-code' class="apply-coupon-input"></input>
        <button type="button" id='apply-button' class="apply-coupon-button">Apply Coupon</button>
      </div>
      <div>
        <p id="status" class="hidden text-center flex align-center status-box"></p>
      </div>

    </form>
    <table class="flex justify-center shopping-cart-styling">
      <tbody>
        <tr class=" flex justify-center">
          <th class="text-center cart-title">Shopping Cart</th>
        </tr>
        <tr class="cart-tr">
          <th>Product</th>
          <th>Amount</th>
          <th>Price</th>
          <th>Total</th>
        </tr>

        <?php foreach ($cart as $item) {
          $sum += $item['price'] * $item['amount']; ?>
          <tr class="text-center cart-tr">
            <td class="cart-td"><?php echo $item['productName'] ?></td>
            <td>x<?php echo $item['amount'] ?></td>
            <td>$<?php echo $item['price'] ?></td>
            <td>$<?php echo $item['price'] * $item['amount'] ?></td>
          </tr>
        <?php } ?>
        <tr class="text-center sum-row-styling cart-tr">
          <td class="bold" id="total-text">Grand Total</td>
          <td></td>
          <td></td>
          <td class="bold" id="total">$<?php echo $sum ?></td>
        </tr>
        <tr class="text-center cart-tr hidden" id="new-total-tr">
          <td class="bold">New Total</td>
          <td id="coupon-name"></td>
          <td id='saved'></td>
          <td id='new-total' class="hidden bold"></td>
        </tr>
      </tbody>
    </table>
  </div>
  <form action='checkout.php' method="POST" class="flex justify-center">
    <button type="submit" class="button-styling">Checkout</button>
    <input type="hidden" id="used-coupon" name='used-coupon'></input>
  </form>
  <script src=" https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="main.js"></script>
  <script>
    $(document).ready(function() {
      $('#apply-button').click(function() {
        const sum = $('#total').text().substring(1)
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
              $('#total-text').addClass('strikethrough')
              $('#new-total').text("$" + parseFloat(data)).show()
              $('#new-total-tr').show()
              $('#status').text("Coupon Added!").show()
              $('#used-coupon').val(coupon)
              $('#coupon-name').text('coupon: ' + coupon)
              $('#saved').text('-' + (parseInt(sum) - data))
            } else {
              $('#status').removeClass('green').addClass('red')
              $("#status").text(data).show()
            }
            $('#total')
            console.log(sum)
          }
        })

      })
    })
  </script>
</body>

</html>
