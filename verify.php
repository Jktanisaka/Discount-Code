<?php
include 'db.php';

$coupon = $_POST['coupon'];
echo $coupon;
// $cart = $_POST['cart'];
// date_default_timezone_set("US/Pacific");
// $date = date('Y-m-d');
// $sql = "SELECT couponType, couponSeverity, startDate, endDate, shopID
//         FROM coupon
//         where couponName = '$couponName' && active = TRUE";

// // if ($result = mysqli_query($conn, $sql)) {
// //   if()
// // } else {
// //   echo
// //   "Error: " . $sql . ":-" . mysqli_error($conn);
// // }
// $result = mysqli_query($conn, $sql);
// while ($row = mysqli_fetch_array($result)) {
//   $shopID = $row['shopID'];
//   $type = $row['couponType'];
//   $severity = $row['couponSeverity'];
//   $start = $row['startDate'];
//   $end =$row['endDate'];
// }

// if ($start !== "0000-00-00" && $date < $start){
//   echo "Coupon not yet active";
// }
// if ($end !== "0000-00-00" && $date > $end){
//   echo "Coupon expired";
// }
// // echo $date;
//  echo $start;
// // echo $date > $start;
// // echo $date > $end;


// mysqli_close($conn);
// // header("Location: localhost:3000//customer.php")

// return $type; $severity; $shopID;
?>
