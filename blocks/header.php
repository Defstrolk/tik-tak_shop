<header class="header">
    <div class="logo">
        <a href="TIK-TAK.php" class="logo1"><img src="img/logo.png" alt="logo" class="logo1"></a>
        <div class="logo-company">
            <a href="TIK-TAK.php">
                <h1 class="company">TIK-TAK</h1>
            </a>
        </div>
    </div>
    <div class="header-catalog">
        <div class="catalog">
            <ul class="catalog1">
                <li>
                    <div class="catalog-list">
                        <h3>Каталог</h3>
                        <svg data-name="Livello 1" id="Livello_1" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg"><title/><path d="M64,0a64,64,0,1,0,64,64A64.07,64.07,0,0,0,64,0Zm0,122a58,58,0,1,1,58-58A58.07,58.07,0,0,1,64,122Z"/><path d="M58.12,35.88a3,3,0,0,0-4.24,4.24L77.76,64,53.88,87.88a3,3,0,1,0,4.24,4.24l26-26a3,3,0,0,0,0-4.24Z"/></svg>
                    </div>
                    <ul class="catalog2">
                        <li>
                            <a href="modernWatch.php">
                                <h3>Современные часы</h3>
                            </a>
                        </li>
                        <li><a href="vintageWatch.php">
                                <h3>Винтаж-часы</h3>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="catalog comment"><a href="comment.php">
                <h3>Отзывы</h3>
            </a></div>
        <div class="catalog">
            <a href="map.php">
                <h3>Карта</h3>
            </a>
        </div>
        <?
        if (isset($_COOKIE['login'])) {
            echo '<div class"catalog user">';
            echo '<div class="header-container">';
            echo '<a href="user.php" class="user-link"><img src="img/user-account.png" class="user1"></img></a>';
            echo '<a href="user.php" class="user-link"><p class="user">' . $_COOKIE["login"] . '</p></a>';
            echo '<form action="exit.php" method="post">';
            echo '<input type="submit" value="Выйти" class="myBtn">';
            echo '</form>';
            echo '</div>';
            echo '</div>';
        } else {
            echo '<div class="catalog">
                    <a href="regestration.php">
                        <h3>Регистрация</h3>
                    </a>
                    </div>
                    <div class="catalog">
                    <a href="login.php">
                            <h3>Вход</h3>
                        </a>
                    </div>';
        }
        ?>
    </div>
    <div class="burger_menu">
        <button class="menu_open"><img src="img/hamburger.png" alt="" class="burger-button"></button>
        <ul class="menuLi">
            <li>
                <button class="menu_close"><img src="./img/close.png" alt="" class="close"></button>
            </li>
            <li class="menu_categories">
                <a href="modernWatch.php">
                    <h3>Современные часы</h3>
                </a>
            </li>
            <li class="menu_categories">
                <a href="vintageWatch.php">
                    <h3>Винтаж-часы</h3>
                </a>
            </li>
            <li class="menu_categories">
                <a href="comment.php">
                    <h3>Отзывы</h3>
                </a>
            </li>
            <li class="menu_categories">
                <a href="map.php">
                    <h3>Карта</h3>
                </a>
            </li>
            <?
            if (isset($_COOKIE['login'])) {
                echo '<li class="menu_categories">
                            <a href="user.php">
                                <p class="user">' . $_COOKIE["login"] . '</p>
                                <form action="exit.php" method="post">
                                    <input type="submit" value="Выйти" class="myBtn">
                                </form>
                            </a>
                        </li>';
            } else {
                echo '<li class="menu_categories">
                            <a href="regestration.php">
                                <h3>Регистрация</h3>
                            </a>
                        </li>
                        <li class="menu_categories">
                            <a href="login.php">
                                <h3>Вход</h3>
                            </a>
                        </li>';
            }
            ?>
            <li>
                <ul class="menu_mobile">
                    <li>
                        <div class="mobileicons">
                            <a href="#"><img src="img/free-icon-instagram-2111463.png" alt="" class="socialmedia2"></a>
                            <a href="https://vk.com/feed"><img src="img/free-icon-vkontakte-4494517.png" alt="" class="socialmedia2"></a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>