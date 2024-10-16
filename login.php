<?php
$connect = new mysqli("localhost", "root", "", "u171630_tik-tak");


if (isset($_REQUEST["login"]) && isset($_REQUEST["password"])) {
    $login = $_REQUEST["login"];
    $password = $_REQUEST["password"];
} else {
    $login = '';
    $password = '';
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $check = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

    if ((mysqli_num_rows($check) > 0)) {
        setcookie('login', $login, time() + (7 * 24 * 60 * 60), '/');
        header('Location: user.php');
        exit();
    } else {
        $error = 'не верный логин или пароль';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="cssblocks/header.css">
    <link rel="stylesheet" href="csspages/mainlogin.css">
    <link rel="stylesheet" href="cssblocks/footer.css">
    <link rel="stylesheet" href="cssblocks/headeradaptive.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
</head>

<body>
    <? require_once "blocks/header.php"; ?>
    <main class="content">
        <div class="form">
            <form action="" method="post">
                <div class="wrapper">
                    <div class="signup">
                        <h2 class="regetr">Войти</h2>
                    </div>
                    <?php if (isset($error)): ?>
                            <p class="error">
                                <?php echo $error; ?>
                            </p>
                    <?php endif; ?>
                    <div class="data-user">
                        <input type="text" id="login" name="login" placeholder="логин">
                        <input type="password" id="password" name="password" placeholder="пароль">
                    </div>
                    <a href="regestration.php" class="registr">Зарегистрироваться</a>
                    <input type="submit" value="Войти" id="submit">
                </div>
            </form>
        </div>
    </main>
    <? require_once "blocks/footer.php"; ?>
    <script src="js/index.js"></script>
</body>

</html>