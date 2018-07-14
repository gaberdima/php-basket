<?php
include ("connect.php");
session_start();
//session_destroy();

$id = $_POST['id'];

$basket = $_SESSION['array_basket_session'];
//var_dump($basket);

foreach($_SESSION['array_basket_session'] as $key=>$value){
//    var_dump($key);
    var_dump($value[2]);
    $elem = $value[2];

    if($elem == $id){
        $_SESSION['all_sum'] = $_SESSION['all_sum'] - $_SESSION['array_basket_session'][$key][1];
        unset($_SESSION['array_basket_session'][$key]);
    }
}



//$_SESSION['array_basket_session'] = $basket;
header("Location: card_order.php");
?>