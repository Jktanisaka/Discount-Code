<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eventeny</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div>
    <?php
    include_once 'db.php';
    $sql = 'SELECT *
        FROM coupon';
    $result = mysqli_query($conn, $sql);
    $coupons = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
    <table>
      <tr>
        <th>Coupon Name</th>
        <th>Type</th>
        <th>Value</th>
        <th>Start Date</th>
        <th>End Date</th>
      </tr>
      <?php foreach ($coupons as $coupon) { ?>
        <tr>
          <td> <?php echo htmlspecialchars($coupon['couponName']); ?> </td>
          <td> <?php echo htmlspecialchars($coupon['couponType']); ?> </td>
          <td> <?php echo htmlspecialchars($coupon['couponSeverity']); ?> </td>
          <td> <?php echo htmlspecialchars($coupon['startDate']); ?> </td>
          <td> <?php echo htmlspecialchars($coupon['endDate']); ?> </td>
        </tr>
      <?php } ?>


    </table>
    <div class="flex justify-center" id="coupon-page">
      <form action="insert.php" class="flex justify-center flex-column" id="coupon-form" method="post">
        <label for="coupon-name">Coupon Code Name</label>
        <input type="text" name="coupon-name" id="coupon-code-name" required>
        <label for="coupon-type">Coupon Type</label>
        <select name="coupon-type" id="coupon-type">
          <option value="bogo">Buy one get one free</option>
          <option value="percentage">% off</option>
          <option value="dollar">$ amount off</option>
        </select>
        <input type="number" class="hidden" id="value-box" name="value-box">
        <label for="start-date">Start Date</label>
        <input type="date" name="start-date" id="start-date">
        <label for="end-date">End Date</label>
        <input type="date" name="end-date" id="end-date">
        <input type="submit">
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="main.js"></script>
</body>

</html>
