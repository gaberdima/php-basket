<?php
include("connect.php");
session_start();
//session_destroy();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<form action="card_order.php">
    <button>Корзина</button>
</form>
    <div class="container">
        <div class="row">
            <?php
//            var_dump($_SESSION);
            $query = mysqli_query($con, "SELECT * FROM `catalog`");
            while($query_assoc = mysqli_fetch_assoc($query)){
                    $name = $query_assoc['name'];
                    $price = $query_assoc['price'];
                    $article = $query_assoc['article'];
                    $img = $query_assoc['img'];
                    $description = $query_assoc['description'];
                    $id = $query_assoc['id'];
                ?>
            <div class="col-md-4">
                <div class="product">
                    <div class="photo">
                        <img class="img" src="img/<?php echo $img;?>" alt="">
                    </div>
                    <div class="name">
                        <h4><?php echo $name;?></h4>
                    </div>
                    <div class="price">
                        <p><?php echo $price;?></p>
                    </div>
                    <div class="article">
                        <p><?php echo $article;?></p>
                    </div>
                    <div class="description">
                        <p><?php echo $description;?></p>
                    </div>
                    <form action="card.php" method="get">
                        <?php
                        if(!empty($_SESSION['array_basket_session'])) {
                            $flag = 0;
                            foreach ($_SESSION['array_basket_session'] as $key => $value) {
//                                echo $id;
                                $find_id = $value['2'];
//                                echo $find_id;
                                if ($find_id == $id) {
                                    $flag = 1;

                                }

                            }
                        }

                        ?>
                        <button class="buy" name="id" value="<?php echo $id ?>" <?php if(!empty($flag)){echo "disabled";}?> ><?php if(!empty($flag)){echo "В корзине";}else{echo "Купить";}?></button>
                    </form>
                </div>
            </div>

                <?php
            }
            ?>

        </div>
    </div>

<script src="js/bootstrap.js"></script>
</body>
</html>