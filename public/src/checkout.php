<?php
include_once '../db/db.php';

$couponName = $_REQUEST['used-coupon'];

$sql = "UPDATE coupon
        SET timesUsed = timesUsed + 1
        WHERE couponName = '$couponName' AND active = TRUE
        LIMIT 1";

if (mysqli_query($conn, $sql)) {
  echo "Checkout Complete";
} else {
  echo
  "Error: " . $sql . ":-" . mysqli_error($conn);
}



mysqli_close($conn)

?>
