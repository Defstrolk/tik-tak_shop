<?php
session_start();
$connect = new mysqli("localhost", "root", "", "u171630_tik-tak");;

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}



$result = $connect->query("SELECT * FROM `vintage watch`");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Винтаж-часы</title>
    <link rel="stylesheet" href="cssblocks/header.css">
    <link rel="stylesheet" href="csspages/mainv.css">
    <link rel="stylesheet" href="cssblocks/footer.css">
    <link rel="stylesheet" href="cssblocks/headeradaptive.css">
    <link rel="stylesheet" href="cssadaptive/adaptivevintagewatch.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
</head>

<body>
    <? require_once('blocks/header.php'); ?>
    <main class="content">
        <div class="container">
            <? if ($result->num_rows > 0) {
                // $i = 0;
                while ($row = $result->fetch_assoc()) {
                    echo
                    '<div class="product-card">
                        <div class="badge">' . $row["sale"] . '</div>
                        <div class="product-tumb">
                            <img src="img/vintagewatch/' . $row["image"] . '" alt="watch" class="watch">
                            <div class="product-details">
                                <span class="product-catagory">' . $row["sex"] . ' </span>
                                <h4 class="category">' . $row["category"] . '</h4>
                                <p>' . $row["description"] . '</p>
                                <div class="product-bottom-details">
                                    <div class="product-price"><small>' . $row["oldprice"] . '</small>' . $row["newprice"] . '₽</div>
                                    <form method="post" action="user.php">';
                                    if (isset($_COOKIE['login'])) {
                                        echo
                                            '<div class="product-links">
                                                <input type="hidden" name="product_id" value="' . $row["id"] . '">
                                                <input type="submit" name="buy" class=" fa-heart" value="Добавить"></input>
                                            </div>';
                                    } else {
                                        echo    '<div class="button-registration">
                                                        <a href="regestration.php">
                                                            <h4>Регистрация</h4>
                                                        </a>
                                                    </div>';
                                    }
                echo            '</form>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo 'Нет товаров в базе данных';
        } ?>
        </div>
    </main>
    <? require_once('blocks/footer.php'); ?>
    <script src="js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="js/animationvintagewatch.js"></script>
</body>

</html>