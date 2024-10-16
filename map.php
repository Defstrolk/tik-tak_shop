<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Карта</title>
    <link rel="stylesheet" href="cssblocks/header.css">
    <link rel="stylesheet" href="csspages/mainmap.css">
    <link rel="stylesheet" href="cssblocks/footer.css">
    <link rel="stylesheet" href="cssblocks/headeradaptive.css">
    <link rel="stylesheet" href="cssadaptive/adaptivemap.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
</head>

<body>
    <? require_once('blocks/header.php'); ?>
    <main class="content">
        <map name="Tver">
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A8a2b720a8e377b81526b2b9dd1a04c88ca15267d690f4b94599278ea85ff16d4&amp;source=constructor">
            </iframe>
        </map>
        <div class="information">
            <div class="adress">Мы находимся по адресу: <br> г.Тверь, ул. Новоторжская д. 12Б</div>
            <div class="tel">Телефон: 8 996 135 04 23</div>
        </div>
    </main>
    <? require_once('blocks/footer.php'); ?>
    <script src="js/index.js"></script>
</body>

</html>