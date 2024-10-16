<?php
session_start();

$connect = new mysqli("localhost", "root", "", "u171630_tik-tak");

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

if (isset($_POST['buy'])) {
    $product_id = $_POST['product_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }
}

if (isset($_GET['remove'])) {
    $product_id = $_GET['remove'];
    unset($_SESSION['cart'][$product_id]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="cssblocks/header.css">
    <link rel="stylesheet" href="csspages/user.css">
    <link rel="stylesheet" href="cssblocks/footer.css">
    <link rel="stylesheet" href="cssblocks/headeradaptive.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
</head>

<body>
    <?php require_once "blocks/header.php"; ?>
    <main class="content">
        <div class="container">
            <div class="information">
                <div class="tovar-information">Ваш заказ</div>
                <div class="tovar-information">Цена</div>
                <div class="tovar-information">Количество</div>
            </div>
            <?php
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $product_id => $quantity) {
                    $product_id = intval($product_id);

                    $query_modern = "SELECT 'modern' AS source, mw.* FROM `modern watches` mw WHERE mw.id = $product_id";
                    $query_vintage = "SELECT 'vintage' AS source, vw.* FROM `vintage watch` vw WHERE vw.id = $product_id";

                    $result_modern = $connect->query($query_modern);

                    if ($result_modern && $result_modern->num_rows > 0) {
                        $row = mysqli_fetch_assoc($result_modern);
                        displayProduct($row, $quantity);
                    } else {
                        $result_vintage = $connect->query($query_vintage);

                        if ($result_vintage && $result_vintage->num_rows > 0) {
                            $row = mysqli_fetch_assoc($result_vintage);
                            displayProduct($row, $quantity);
                        } else {
                            echo "Product not found for ID: $product_id";
                        }
                    }
                }
            } else {
                echo '<p class="empty-bullet">Ваша корзина пуста<p>';
            }

            function displayProduct($row, $quantity)
            {
                $image_path = '';
                if ($row['source'] == 'modern') {
                    $image_path = "img/modernwatch/";
                } elseif ($row['source'] == 'vintage') {
                    $image_path = "img/vintagewatch/";
                }

                $price = str_replace([','], [''], $row['newprice']);

                echo '
                <div class="basket" data-price="' . $price . '">
                    <div class="tovar-image">
                        <img src="' . $image_path . $row["image"] . '" alt="" class="img">
                    </div>
                    <div class="tovar-info">
                        <div class="tovar-category">' . $row["category"] . '</div>
                        <div><p class="tovar-description">' . $row["description"] . '</p></div>
                    </div>
                    <div class="tovar-price">' . $row['newprice'] . '₽</div>
                    <div class="price">
                        <button class="minus" onclick="decrement(this)">-</button>
                        <input type="number" name="price" class="number" min="1" max="5" value="' . $quantity . '" onchange="updateTotal()">
                        <button class="plus" onclick="increment(this)">+</button>
                    </div>
                    <div class="price remove"><a class="tovar-price" href="user.php?remove=' . $row["id"] . '">Удалить</a></div>
                </div>';
            }

            $connect->close();
            ?>
            <div class="sale">
                <div class="sale-price">Общая стоимость заказа</div>
                <div id="total-price"></div>
                <div class="sale-final"><button type="submit" onclick="purchase()" class="button">Купить</button></div>
            </div>
        </div>
    </main>
    <?php require_once "blocks/footer.php"; ?>
    <script src="js/index.js"></script>
    <script>
        function updateTotal() {
            let totalPrice = 0;
            const cartItems = document.querySelectorAll('.basket');

            cartItems.forEach(item => {
                const price = parseFloat(item.getAttribute('data-price'));
                const quantity = item.querySelector('.number').value;
                totalPrice += price * quantity;
            });

            document.getElementById('total-price').innerText = totalPrice.toLocaleString('ru-RU') + ' ₽';
            console.log('Total updated with value:', document.querySelector('.number').value);
        }

        function purchase() {
            alert('Покупка совершена успешно!');
        }

        // Initialize total price on page load
        updateTotal();

        function increment(element) {
            var inputElement = element.parentNode.querySelector('input');
            var currentValue = parseInt(inputElement.value);
            if (currentValue < parseInt(inputElement.max)) {
                inputElement.value = currentValue + 1;
                updateTotal();
            }
        }

        function decrement(element) {
            var inputElement = element.parentNode.querySelector('input');
            var currentValue = parseInt(inputElement.value);
            if (currentValue > parseInt(inputElement.min)) {
                inputElement.value = currentValue - 1;
                updateTotal();
            }
        }

    </script>
</body>

</html>