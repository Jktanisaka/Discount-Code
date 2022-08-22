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
        <input type="date" name="start-date" id="start-date" >
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
