<? $connect = new mysqli("localhost", "root", "", "u171630_tik-tak"); ?>
<?php

if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}
?>
<?

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Получение и обработка данных из формы
  $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS));
  $surname = trim(filter_var($_POST['surname'], FILTER_SANITIZE_SPECIAL_CHARS));
  $file = $_FILES['avatar'];
  $textarea = trim(filter_var($_POST['textarea'], FILTER_SANITIZE_SPECIAL_CHARS));

  $uploadDir = 'uploads/';
  if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
  }

  $filename = basename($file['name']);
  $targetFile = $uploadDir . $filename;

  if (move_uploaded_file($file['tmp_name'], $targetFile)) {
    // Вставка данных в базу данных после успешной загрузки файла
    // Используем подготовленные выражения для защиты от SQL-инъекций
    $stmt = $connect->prepare("INSERT INTO `comments` (`name`, `surname`, `textarea`, `avatar`) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
      echo "Ошибка подготовки запроса: " . $connect->error;
      exit;
    }

    $stmt->bind_param("ssss", $name, $surname, $textarea, $filename);

    if ($stmt->execute()) {
      // Перенаправление на ту же страницу после успешного добавления данных
      header('Location: ' . $_SERVER['PHP_SELF']);
      exit();
    } else {
      echo "Ошибка: " . $stmt->error;
    }

    $stmt->close();
  } else {
    echo "Ошибка загрузки файла.";
    exit;
  }
}

$sql = "SELECT * FROM `comments`";
$result = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Отзывы</title>
  <link rel="stylesheet" href="cssblocks/header.css">
  <link rel="stylesheet" href="csspages/maincomment.css">
  <link rel="stylesheet" href="cssblocks/footer.css">
  <link rel="stylesheet" href="cssadaptive/adaptivecomment.css">
  <link rel="stylesheet" href="cssblocks/headeradaptive.css">
  <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
</head>

<body>
  <? require_once('blocks/header.php'); ?>
  <main class="content">
    <div class="title">
      <h1 class="moto1">Отзывы наших покупателей</h1>
    </div>

    <?

    if ($result->num_rows > 0) {
      $i = 0;
      while ($row = $result->fetch_assoc()) {
        echo '<div class="mySleder pod">';
        echo '<div class="slider-wrapper">';
        echo '<div class="slider-item active">';
        if (empty($row['avatar'])){
          echo '<div class="slider-image"><img src="img/avatarface.png" alt="аватарка" class="foto"></div>';
        }else{
          echo '<div class="slider-image"><img src="uploads/' . $row["avatar"] . '" alt="аватарка" class="foto"></div>';
        }
        echo '<div class="slider-name">' . $row["name"] . '</div>';
        echo '<div class="slider-message">' . $row["textarea"] . '</div>';
        echo '</div>';
        echo '<div class="prev" onclick="plusSlides(-1)"><img src="img/back.png" alt="предыдущий слайд"></div>';
        echo '<div class="next" onclick="plusSlides(1)"><img src="img/next.png" alt="следующий слайд"></div>';
        echo '</div>';
        echo '</div>';
      }
    } else {
      echo "Нет данных для отображения слайдера.";
    }
    ?>

    <div class="modal-button">
      <button id="myBtn">Оставить отзыв!</button>
      <div id="myModal" class="modal">
        <form id="reviewForm" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <span class="close__comment">&times;</span>
            <div class="modal-name">
              <input type="text" placeholder="Имя" id="name" class="input" name="name" required>
            </div>
            <div class="modal-email">
              <input type="text" placeholder="Фамилия" id="surname" class="input" name="surname">
            </div>
            <div class="modal-otvet">
              <textarea class="input text" id="textarea" maxlength="500" placeholder="Комментарий" name="textarea" required></textarea>
            </div>
            <div class="modal-email">
              <label for="file" class="custom-file-upload">Загрузка аватарки</label>
              <input type="file" name="avatar" id="file" value="Выберите файл для загрузки автарки">
            </div>
            <input type="submit" class="input button1">
          </div>
        </form>
      </div>
    </div>
  </main>
  <? require_once('blocks/footer.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
  <script src="js/animationcomment.js"></script>
  <script src="js/comment.js"></script>
  <script src="js/index.js"></script>
  <script src="js/slider.js"></script>
  <script src="js/downloadfiles.js"></script>
</body>

</html>
<?
$connect->close();
?>