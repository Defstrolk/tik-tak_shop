<?php
header('Location: TIK-TAK.php');
setcookie('login', $login, time() + (-7 * 24 * 60 * 60), '/');
?>