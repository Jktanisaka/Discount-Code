<?php
include 'db.php';

include 'cart.php';

$couponName = $_POST['coupon'];

date_default_timezone_set("US/Pacific");
$date = date('Y-m-d');
$sql = "SELECT couponType, couponSeverity, startDate, endDate, shopID,  timesUsed
        FROM coupon
        where couponName = '$couponName' && active = TRUE";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 0){
  echo "Coupon not found. Check your spelling and try again!";
  mysqli_close($conn);
  exit;
}

while ($row = mysqli_fetch_array($result)) {
  $shopID = $row['shopID'];
  $type = $row['couponType'];
  $severity = $row['couponSeverity'];
  $start = $row['startDate'];
  $end = $row['endDate'];
}

if ($start !== "0000-00-00" && $date < $start) {
  echo "Coupon not yet active";
  mysqli_close($conn);
  exit;
}
if ($end !== "0000-00-00" && $date > $end) {
  echo "Coupon expired";
  mysqli_close($conn);
  exit;
}


$total = 0;
foreach ($cart as $item) {
  if($item['shopID'] === $shopID){
    $amount = $item['amount'];
    $price = $item['price'];

    switch($type) {
      case 'bogo':
        $pairs = floor($amount / 2);
        if ($amount >= 2){
          $total += round(($price * $amount) - ($price * $pairs), 2);
        } else {echo 'Not enough items in cart';}
        break;
      case 'percentage':
        $percentage = ($severity/100);
        $total += round(($price * $amount) - ((($price * $amount) * $percentage)), 2);
        break;
      case 'dollar';
        $total += round(($price * $amount) - $severity, 2);
        break;
    }

  } else {$total += $item['price'] * $item['amount'];}
}


echo $total;



mysqli_close($conn);

?>
