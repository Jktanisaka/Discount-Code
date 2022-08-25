<?php
include 'db.php';
date_default_timezone_set("US/Pacific");
$couponName = $_POST['coupon-code'];
$date = date('Y-m-d');
$sql = "SELECT couponType, couponSeverity, startDate, endDate
        FROM coupon
        where couponName = '$couponName' AND '$date' BETWEEN startDate and endDate";

if ($result = mysqli_query($conn, $sql)) {
  echo mysqli_num_rows($result);
} else {
  echo
  "Error: " . $sql . ":-" . mysqli_error($conn);
}
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
  echo $row['couponType'], $row['couponSeverity'], date("m/d/Y", strtotime($row['startDate'])), date("m/d/Y", strtotime($row['endDate']));
}

echo $date;

mysqli_close($conn);
?>
