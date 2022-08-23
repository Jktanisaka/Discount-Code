<?php
$conn = mysqli_connect('localhost','Jon','test1234', 'eventeny');
if (!$conn){
  echo 'Connection error: ' . mysqli_connect_error();
}

?>
