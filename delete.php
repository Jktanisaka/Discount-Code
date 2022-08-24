<?php
include_once 'db.php';

$sql = "UPDATE coupon
        SET active = FALSE
        WHERE couponID = '$id'";

if (mysqli_query($conn, $sql)) {
  echo "Coupon deleted";
} else {
  echo
  "Error: " . $sql . ":-" . mysqli_error($conn);
}

mysqli_close($conn);
?>
