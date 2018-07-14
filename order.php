<?php
include ("connect.php");
session_start();
//session_destroy();
//if(!empty($id) && !empty($price) && !empty($name) && !empty($article) && !empty($img) && !empty($description)) {
    $id = mysql_real_escape_string($_POST['id']);
    $price = mysql_real_escape_string($_POST['price']);
    $name = mysql_real_escape_string($_POST['name']);
    $article = mysql_real_escape_string($_POST['article']);
    $img = mysql_real_escape_string($_POST['img']);
    $description = mysql_real_escape_string($_POST['description']);
//}else{
//    header("Location: card.php");
//}

If(!empty($_SESSION['card_id'])){

    $array_tov = array($name, $price, $id, 1, $price);
    $_SESSION['all_sum'] = $_SESSION['all_sum'] + $array_tov[1];
    $_SESSION['array_tov'] = $array_tov;
    array_push($_SESSION['array_basket_session'], $array_tov);
    var_dump($_SESSION['array_basket_session']);
    // exit;
    header("Location: card_order.php");
//    $_SESSION['all_sum'] = $price;
}
else{
    $description = mysql_real_escape_string($description);

    $name_insert = mysqli_query($con, "INSERT INTO `op_bil`(`name`) VALUES ('$name')");

    $query_basket_id = mysqli_query($con, "SELECT * FROM `op_bil` order by id desc limit 1");
    $query_basket_id_assoc = mysqli_fetch_assoc($query_basket_id);
    $basket_number = $query_basket_id_assoc['id'];
    $_SESSION['card_id'] = $basket_number;

//    $order_insert = mysqli_query($con, "INSERT INTO op_order (name, articcle, price, img, description, categories, basket_number) VALUES ('$name','$article','$price','$img','$description',1,'$basket_number')");




    $array_tov = array($name, $price, $id, 1, $price);
    $_SESSION['all_sum'] = $_SESSION['all_sum'] + $array_tov[1];
    $array_basket = array();
    $array_basket[] = $array_tov;
    $_SESSION['array_basket_session'] = $array_basket;
    header("Location: card_order.php");
}


?>