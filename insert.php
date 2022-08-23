<?php
include_once 'db.php';

$name = $_REQUEST['coupon-name'];
$type = $_REQUEST['coupon-type'];

 if ($type === 'bogo') {
    $value = 50;
  } else {
    $value = $_REQUEST['value-box'];
  }

if ($_REQUEST['start-date']) {
  $start = $_REQUEST['start-date'];
}
if ($_REQUEST['end-date']) {
  $end = $_REQUEST['end-date'];
}

echo $name, $type, $value, $start, $end;

$sql = "INSERT INTO coupon (couponName, startDate, endDate, couponType, couponSeverity, timesUsed, shopID)
        VALUES ('$name', '$start', '$end', '$type', '$value', 0, 1)";
if (mysqli_query($conn, $sql)){
  echo "Coupon added";
 } else {
  echo
  "Error: " . $sql . ":-" . mysqli_error($conn);
 }



mysqli_close($conn)
?>
