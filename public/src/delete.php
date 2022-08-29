<?php
include 'db/db.php';

$sql = "UPDATE coupon
        SET active = FALSE
        WHERE couponID = '$id'";

if (mysqli_query($conn, $sql)) {
  header("Location: admin.php");
} else {
  echo
  "Error: " . $sql . ":-" . mysqli_error($conn);
}

mysqli_close($conn);
?>
