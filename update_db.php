<?php
include_once 'db.php';


$id = $_REQUEST['couponID'];
$name = $_REQUEST['coupon-name'];
$type = $_REQUEST['coupon-type'];

if ($type === 'bogo') {
  $value = 50;
} else {
  $value = $_REQUEST['value-box'];
}

if ($_REQUEST['start-date']) {
  $start = $_REQUEST['start-date'];
} else {
  $start = null;
}
if ($_REQUEST['end-date']) {
  $end = $_REQUEST['end-date'];
} else {
  $end = null;
}

echo $name, $type, $value, $start, $end;

$sql = "UPDATE coupon
        SET couponName = '$name', startDate = '$start', endDate = '$end', couponType = '$type', couponSeverity = '$value'
        WHERE couponID = '$id'";
if (mysqli_query($conn, $sql)) {
  echo "Coupon added";
} else {
  echo
  "Error: " . $sql . ":-" . mysqli_error($conn);
}



mysqli_close($conn)
?>
