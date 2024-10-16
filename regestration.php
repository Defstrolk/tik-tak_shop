<?php
session_start();
$message = $_SESSION['message'] ?? '';
$errors = $_SESSION['errors'] ?? [];
$form_data = $_SESSION['form_data'] ?? [];
unset($_SESSION['message'], $_SESSION['errors'], $_SESSION['form_data']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="cssblocks/header.css">
    <link rel="stylesheet" href="csspages/mainreg.css">
    <link rel="stylesheet" href="cssblocks/footer.css">
    <link rel="stylesheet" href="cssblocks/headeradaptive.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
</head>

<body>
    <? require_once "blocks/header.php"; ?>
    <main class="content">
        <div class="form">
            <form action="lib/regestration.php" method="post">
                <div class="wrapper">
                    <div class="signup">
                        <h2 class="regetr">Зарегистрироваться</h2>
                        <?php if (!empty($message)) : ?>
                            <p class="success">
                                <?php echo $message; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($errors)) : ?>
                        <div class="error-messages">
                            <?php foreach ($errors as $error) : ?>
                                <p class="error">
                                    <?php echo $error; ?>
                                </p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <input type="text" id="name" name="name" placeholder="Имя" value="<?php echo htmlspecialchars($form_data['name'] ?? ''); ?>">
                    <input type="text" id="sername" name="sername" placeholder="Фамилия" value="<?php echo htmlspecialchars($form_data['sername'] ?? ''); ?>">
                    <input type="tel" id="tel" name="telefon" placeholder="телефон" value="<?php echo htmlspecialchars($form_data['telefon'] ?? ''); ?>">
                    <input type="text" id="login" name="login" placeholder="логин" value="<?php echo htmlspecialchars($form_data['login'] ?? ''); ?>">
                    <input type="password" id="password" name="password" placeholder="пароль">
                    <input type="password" id="repeatpassword" name="repeatpassword" placeholder="повторите пароль">
                    <input type="submit" value="Зарегистрироваться" id="submit">
                </div>
            </form>
        </div>
    </main>
    <? require_once "blocks/footer.php"; ?>
    <script src="js/index.js"></script>
</body>

</html>