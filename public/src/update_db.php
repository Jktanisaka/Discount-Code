<?php
include_once '../db/db.php';


$id = $_REQUEST['couponID'];
$name = $_REQUEST['coupon-name'];
$type = $_REQUEST['coupon-type'];
if($_REQUEST['max-uses'] === ''){
  $maxUses = 0;
} else {$maxUses = $_REQUEST['max-uses'];}

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


$sql = "UPDATE coupon
        SET couponName = '$name', startDate = '$start', endDate = '$end', couponType = '$type', couponSeverity = '$value', maxUses = '$maxUses'
        WHERE couponID = '$id'";
if (mysqli_query($conn, $sql)) {
  header("Location: ../admin.php");
} else {
  echo
  "Error: " . $sql . ":-" . mysqli_error($conn);
}



mysqli_close($conn)
?>
