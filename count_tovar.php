<?php
include ("connect.php");
session_start();
    $count = $_POST['count1'];

    $id = $_POST['id'];

    $tmp = $_SESSION['array_basket_session'];

    $all_sum = 0;

    foreach($_SESSION['array_basket_session'] as $key=>$value){


    $elem = $value[2];
    $_SESSION['id_element'] = $elem;
//        $tmp = $_SESSION['array_basket_session'][$key];



    if($elem == $id){
//        var_dump($tmp[$key][3]);
        $tmp[$key][3] = $count;
//        var_dump($tmp);
        $sum = $count * $tmp[$key][4];
        $tmp[$key][1] = $sum;

        $_SESSION['array_basket_session'] = $tmp;

    }
    $all_sum = $all_sum + $tmp[$key][1];
}
$_SESSION['all_sum'] = $all_sum;

header("Location:card_order.php");
?>