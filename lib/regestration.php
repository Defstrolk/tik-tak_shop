<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$connect = new mysqli("localhost", "root", "", "u171630_tik-tak");

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$errors = [];
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS)) ?? '';
    $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS)) ?? '';
    $sername = trim(filter_var($_POST['sername'], FILTER_SANITIZE_SPECIAL_CHARS)) ?? '';
    $telefon = trim(filter_var($_POST['telefon'], FILTER_SANITIZE_SPECIAL_CHARS)) ?? '';
    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS)) ?? '';
    $repeatpassword = trim($_POST['repeatpassword']) ?? '';

    $errors = ValidPoley($name, $sername, $telefon, $login, $password, $repeatpassword);

    if (empty($errors)) {
        $checkSql = "SELECT * FROM `users` WHERE `login` = ?";
        $stmt = $connect->prepare($checkSql);
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $errors['login'] = "Пользователь с таким логином уже существует.";
        } else {
            $sql = "INSERT INTO `users` (`login`,`password`,`telefon`,`name`,`sername`) VALUES (?,?,?,?,?)";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("sssss", $login, $password, $telefon, $name, $sername);

            if ($stmt->execute()) {
                header('Location: ../login.php');
                exit();
            } else {
                $errors['general'] = "Ошибка: " . $stmt->error;
            }
        }

        $stmt->close();
    }

    $_SESSION['errors'] = $errors;
    $_SESSION['form_data'] = $_POST;
    header('Location: ../regestration.php');
    exit();
}

function ValidPoley($name, $sername, $telefon, $login, $password, $repeatpassword)
{
    $errors = [];
    if (empty($name)) {
        $errors['name'] = 'Пожалуйста, введите ваше имя.';
    }
    if (empty($sername)) {
        $errors['sername'] = 'Пожалуйста, введите вашу фамилию.';
    }
    if (empty($telefon)) {
        $errors['telefon'] = 'Пожалуйста, введите ваш телефон.';
    }
    if (empty($login)) {
        $errors['login'] = 'Пожалуйста, введите ваш логин.';
    }
    if (empty($password)) {
        $errors['password'] = 'Пожалуйста, введите ваш пароль.';
    }
    if (empty($repeatpassword)) {
        $errors['repeatpassword'] = 'Пожалуйста, повторите ваш пароль.';
    } elseif ($password !== $repeatpassword) {
        $errors['repeatpassword'] = 'Пароли не совпадают.';
    }

    return $errors;
}