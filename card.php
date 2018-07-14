<?php
include ("connect.php");
session_start();
//session_destroy();
//var_dump($_SESSION);
//var_dump($_GET);
$id = $_GET['id'];
//echo $id;
$query = mysqli_query($con, "SELECT * FROM `catalog` where id = $id");
$query_assoc = mysqli_fetch_assoc($query);
$name = $query_assoc['name'];
$price = $query_assoc['price'];
$article = $query_assoc['article'];
$img = $query_assoc['img'];
$description = $query_assoc['description'];
$id = $query_assoc['id'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <Link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img class="img" src="img/<?php echo $img;?>" alt="">
        </div>
        <div class="col-md-6">
            <div class="row">
                <h4><?php echo $name;?></h4>
                <p><?php echo $price;?></p>
                <p><?php echo $article;?></p>
                <p><?php echo $description;?></p>
                <form action="order.php" method="post">
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                    <input type="hidden" name="name" value="<?php echo $name; ?>">
                    <input type="hidden" name="article" value="<?php echo $article; ?>">
                    <input type="hidden" name="img" value="<?php echo $img; ?>">
                    <input type="hidden" name="description" value="<?php echo $description; ?>">

                    <button name="id" value="<?php echo $id;?>">Купить</button>
                </form>
            </div>
        </div>
    </div>

</div>





<script src="js/bootstrap.js"></script>
</body>
</html>
