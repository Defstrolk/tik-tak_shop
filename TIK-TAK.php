<?php
session_start();
$connect = new mysqli("localhost", "root", "", "u171630_tik-tak");

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}



$result = $connect->query("SELECT * FROM `modern watches`");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIK-TAK</title>
    <link rel="stylesheet" href="cssblocks/header.css">
    <link rel="stylesheet" href="csspages/main.css">
    <link rel="stylesheet" href="cssblocks/footer.css">
    <link rel="stylesheet" href="cssadaptive/adaptivetik-tak.css">
    <link rel="stylesheet" href="cssblocks/headeradaptive.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
</head>

<body>
    <? require_once "blocks/header.php"; ?>
    <main class="content overlay">
        <?

        if ($result->num_rows > 0) {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                echo '<div class="mySleder pod">';
                echo    '<div class="slider-wrapper">';
                echo            '<img src="img/modernwatch/' . $row["image"] . '" alt="watch" class="watch">';
                echo            '<div class="slider-name">' . $row["category"] . '</div>';
                echo            '<div class="product-details">' . $row["description"] . '</div>';
                echo            '<div class="slider-message">' . $row["newprice"] . '₽</div>';
                echo    '</div>';
                echo '</div>';
            }
        } else {
            echo "Нет данных для отображения слайдера.";
        }
        ?>
        <div class="bannermodern">
            <div class="moto">
                <h1 class="moto1">Вместе с вами в каждой минуте</h1>
            </div>
        </div>
        <div class="bannervintage">
            <div class="moto">
                <h1 class="moto1">Точность, стиль, качество</h1>
            </div>
        </div>
        <div class="button">
            <a href="modernWatch.php" class="action">
                <h1 class="name">Современные часы</h1>
            </a>
        </div>
        <div class="button two">
            <a href="vintageWatch.php" class="action">
                <h1 class="name">Винтаж-часы</h1>
            </a>
        </div>
    </main>
    <? require_once("blocks/footer.php"); ?>
    
    <script src="js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="js/animationtik-tak.js"></script>
    <script src="js/slider.js"></script>
</body>

</html>