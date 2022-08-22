<?php
require 'index.php';
$conn = mysqli_connect('localhost','Jon','test1234', 'eventeny');
if (!$conn){
  echo 'Connection error: ' . mysqli_connect_error();
}

$sql = 'SELECT *
        FROM coupon';
$result = mysqli_query($conn, $sql);
$coupons = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

print_r($coupons);



$name = $_REQUEST['coupon-name'];
$type = $_REQUEST['coupon-type'];
if($_REQUEST['value-box']){
  if( $type === 'bogo'){
    $value = 50;
  } else {$value = $_REQUEST['value-box'];}
}
if ($_REQUEST['start-date']){
  $start = $_REQUEST['start-date'];
}
if ($_REQUEST['end-date']){
  $end = $_REQUEST['end-date'];
}

echo $name, $type, $value, $start, $end

?>
