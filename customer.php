<?php
$cart = array(array('shopID' => '1', 'productID'=>'1', 'productName' => 'Concert Ticket', 'amount' => '2', 'price' => '65.99'), array('shopID' => '2','productID'=>'2', 'productName' => 'Convention Ticket', 'amount' => '2', 'price' => '65.99'));

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
        <p>x<?php echo $item['amount'] ?> (<?php echo $item['price'] ?> each)</p><p><?php echo $item['price'] * $item['amount'] ?></p>
      </div>
    <?php } ?>
    <h4>Total <?php echo $sum ?></h4>
  </div>
  <form action="verify.php" method="POST">
    <input name='coupon-code'></input>
    <button type="submit">Apply Coupon</button>
  </form>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="main.js"></script>
</body>

</html>
