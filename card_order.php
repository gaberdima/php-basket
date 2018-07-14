<?php
include ("connect.php");
session_start();
//session_destroy();

//var_dump($_SESSION['array_basket_session']);
?>
<style>
    .card li{
        display: inline-block;
    }
    .card form{
        display: inline-block;
    }
</style>
<form action="index.php">
    <button>Список товаров</button>
</form>

<?php
if(!empty($_SESSION['array_basket_session'])) {
    ?>
    <ul class="card">
        <?php

        foreach ($_SESSION['array_basket_session'] as $key => $value) {
//    var_dump($_SESSION['id_element']);

            ?>
            <li><?php echo $value[0]; ?></li>
            <li><?php echo $value[2]; ?></li>
            <li><?php echo $value[1]; ?></li>
            <form action="count_tovar.php" method="post">

                <li><input name="count1" type="text" value="<?php echo $value[3]; ?>" onblur="count(this)"></li>
                <input type="hidden" name="price" value="<?php echo $value[1]; ?>">
                <input type="hidden" name="id" value="<?php echo $value[2]; ?>">
            </form>
            <li></li>
            <form action="del_tovar.php" method="post">

                <li>
                    <button name="id" value="<?php echo $value[2]; ?>">X</button>
                </li>
            </form><br>
            <?php

        }


        ?>
    </ul>

    <h1><?php if (!empty($_SESSION['all_sum'])) {
            echo $_SESSION['all_sum'];
        } else {
            echo 0;
        } ?></h1>



    <form action="to_order.php" method="post">
        <input type="text" name="user_name" required><br>
        <input type="email" name="email" required><br>

        <button name="order">Оформить заказ</button>
    </form>

    <script>
        function count(x) {

            console.log(x);
            x.form.submit();
        }
    </script>
    <?php
}
else{
    echo "<h1>Нет товаров в корзине!</h1>";
}
?>
