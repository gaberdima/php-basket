<?php
include ("connect.php");
session_start();

$bil_id = $_SESSION['card_id'];
$basket_number = $_SESSION['card_id'];
foreach($_SESSION['array_basket_session'] as $key=>$value){
//    var_dump($value[1]);
    $name = $value[0];
    $sum = $value[1];
    $id = $value[2];
    $count_tov = $value[3];


    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
        $insert = mysqli_query($con, "INSERT INTO op_order(`name`, `articcle`, `price`, `count_tov`, `basket_number`) VALUES ('$name', '$id', '$sum', '$count_tov', '$basket_number')");


}
$insert_op_bil = mysqli_query($con, "UPDATE `op_bil` SET `email`='$email',`user_name`='$user_name', `active` = '1' WHERE id = '$basket_number'");

$_SESSION['array_basket_session'] = 0;
$_SESSION['card_id'] = 0;





?>