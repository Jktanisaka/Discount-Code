<?php
include_once '../db/db.php';

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
} else {$start = null;}
if ($_REQUEST['end-date']) {
  $end = $_REQUEST['end-date'];
} else {$end = null;}

$sql = "INSERT INTO coupon (couponName, startDate, endDate, couponType, couponSeverity, timesUsed, shopID, active, maxUses)
        VALUES ('$name', '$start', '$end', '$type', '$value', 0, 1, TRUE, $maxUses)";
if (mysqli_query($conn, $sql)){
  header("Location: ../admin.php");
 } else {
  echo
  "Error: " . $sql . ":-" . mysqli_error($conn);
 }



mysqli_close($conn)
?>
