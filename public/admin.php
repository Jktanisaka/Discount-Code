<?php
include 'db/db.php';
$sql = 'SELECT *
        FROM coupon
        where active = TRUE';
$result = mysqli_query($conn, $sql);
$coupons = mysqli_fetch_all($result, MYSQLI_ASSOC);
$names = array();
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eventeny</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div>
    <table class="flex justify-center">
      <h2 class="text-center">Existing Coupons</h2>
      <?php if (mysqli_num_rows($result) === 0) { ?>
        <tr class="tr-heading">
          <th>No Coupons Found</th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        <?php } else { ?>
        <tr class="tr-heading">
          <th>Coupon Name</th>
          <th>Type</th>
          <th>Value</th>
          <th>Max Uses</th>
          <th>Times Used</th>
          <th>Start Date</th>
          <th>End Date</th>
        <?php } ?>
        </tr>

        <?php foreach ($coupons as $coupon) { ?>
          <?php array_push($names, $coupon['couponName']) ?>
          <form action="update.php" method="POST">
            <tr>
              <td><input class="ms-1" name="couponName" value="<?php echo htmlspecialchars($coupon['couponName']) ?>" readonly></input> </td>
              <td><input name="couponType" value="<?php echo htmlspecialchars($coupon['couponType']) ?>" readonly></input></td>
              <td><input name="couponSeverity" value=" <?php echo htmlspecialchars($coupon['couponSeverity']); ?>" readonly></input> </td>
              <td><input readonly name="maxUses" value="<?php if ($coupon['maxUses'] === '0') {
                                                          echo "none";
                                                        } else {
                                                          echo $coupon['maxUses'];
                                                        }
                                                        ?>"> </input> </td>
              <td><input readonly value="<?php echo htmlspecialchars($coupon['timesUsed']) ?>"> </input> </td>
              <td><input name="startDate" value="<?php if ($coupon['startDate'] === "0000-00-00") {
                                                    echo "none";
                                                  } else {
                                                    echo htmlspecialchars(date("m/d/Y", strtotime($coupon['startDate'])));
                                                  } ?>" readonly></input>
              </td>
              <td><input name="endDate" value="<?php if ($coupon['endDate'] === "0000-00-00") {
                                                  echo "none";
                                                } else {
                                                  echo htmlspecialchars(date("m/d/Y", strtotime($coupon['endDate'])));
                                                } ?>" readonly></input>
              </td>
              <td><input type="submit" value="Edit" name="edit" class="edit-button"></input></td>
              <td><input type="submit" value="Delete" name="delete" class="delete-button"></input></td>
              <td><input type="hidden" value="<?php echo htmlspecialchars($coupon['couponID']) ?>" name="couponID"></input></td>
            </tr>
          </form>
        <?php } ?>

    </table>
    <div class="flex flex-column align-center">
      <button type="button" class="button-styling" id="new-coupon">New coupon</button>
      <div class="flex justify-center hidden" id="coupon-page">
        <form action="src/insert.php" class="flex justify-center flex-column form-styling" id="coupon-form" method="post">
          <label for="coupon-name">Coupon Code Name</label>
          <input type="text" name="coupon-name" id="coupon-code-name" required>
          <label for="coupon-type">Coupon Type</label>
          <select name="coupon-type" id="coupon-type">
            <option value="bogo">Buy one get one free</option>
            <option value="percentage">% off</option>
            <option value="dollar">$ amount off</option>
          </select>
          <input type="number" class="hidden" id="value-box" name="value-box" min="0">
          <label for='max-uses'>Max Uses</label>
          <input type="number" id="max-uses" name="max-uses" min="0"></input>
          <label for="start-date">Start Date</label>
          <input type="date" name="start-date" id="start-date">
          <label for="end-date">End Date</label>
          <input type="date" name="end-date" id="end-date">

          <input type="submit" class="submit-button">
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="main.js"></script>
  <script>
    $('#coupon-form').submit(function() {
      const names = <?php echo json_encode($names); ?>;
      const enteredName = $('#coupon-code-name').val()
      console.log(enteredName)
      if (names.includes(enteredName)){
        alert('Name must be unique')
        return false
      }
        if ($('#start-date').val() !== '' && $('#end-date').val() !== '') {

          if (Math.floor(new Date($('#start-date').val()).getTime() / 1000) >= Math.floor(new Date($('#end-date').val()).getTime() / 1000)) {
            alert('Start date must be before end date')
            return false
          }
        }
    })
  </script>
</body>

</html>
