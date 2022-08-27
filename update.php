<?php

if (isset($_POST['delete'])) {
  $id = $_POST['couponID'];
  include_once "delete.php";
  echo "deleted";
  exit();
}


$name = $_POST['couponName'];
$type = $_POST['couponType'];
$severity = $_POST['couponSeverity'];
$start = str_replace('/', '-', date("Y-m-d", strtotime($_POST['startDate'])));
$end = str_replace('/', '-', date("Y-m-d", strtotime($_POST['endDate'])));
$id = $_POST['couponID'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="flex flex-column align-center">
    <h1>Edit Coupon</h1>
    <div class="flex justify-center" id="coupon-page">
      <form action="update_db.php" class="flex justify-center flex-column form-styling" id="coupon-form" method="post">
        <label for="coupon-name">Coupon Code Name</label>
        <input type="text" name="coupon-name" id="coupon-code-name" required value="<?php echo $name ?>">
        <label for="coupon-type">Coupon Type</label>
        <select name="coupon-type" id="coupon-type">
          <option value="bogo">Buy one get one free</option>
          <option value="percentage">% off</option>
          <option value="dollar">$ amount off</option>
        </select>
        <input type="number" class="hidden" id="value-box" name="value-box" value="<?php echo $severity ?>">
        <label for="start-date">Start Date</label>
        <input type="date" name="start-date" id="start-date" value="<?php echo $start ?>">
        <label for=" end-date">End Date</label>
        <input type="date" name="end-date" id="end-date" value="<?php echo $end ?>">
        <input type="hidden" value="<?php echo $id ?>" name="couponID">
        <input type="submit" class="mt-5px">
      </form>
    </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="main.js"></script>

</html>
