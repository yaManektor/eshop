<header>
    <div class="container top-menu">
        <div class="nav">
            <a href="/">Головна</a>
            <a href="/contact">Контакти</a>
            <a href="/contact/about">Про компанію</a>
        </div>
        <div class="tel">
            <i class="fa-solid fa-mobile-screen"></i> +38 (012) 34 - 56 - 789
        </div>
    </div>

    <div class="container middle">
        <div class="logo">
            <img src="/public/img/logo.svg" alt="Logo">
            <span>Найкраща техніка тільки у нас!</span>
        </div>
        <div class="auth-checkout">
            <a href="/basket">

                <?php
                    require_once 'app/models/Basket.php';
                    $basket = new Basket();
                ?>

                <button class="btn basket">Корзина <b>(<?=$basket->countItems()?>)</b></button>
            </a><br>
            <?php if (!isset($_COOKIE['login']) || $_COOKIE['login'] == ''): ?>
                <a href="/user/auth">
                    <button class="btn auth">Ввійти</button>
                </a>
                <a href="/user/reg">
                    <button class="btn">Реєстрація</button>
                </a>
            <?php else: ?>
                <a href="/user/dashboard">
                    <button class="btn dashboard">Кабінет користувача</button>
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="container menu">
        <ul>
            <li><a href="/categories">Всі товари</a></li>
            <li><a href="/categories/smartphones">Телефони</a></li>
            <li><a href="/categories/monitors">Монітори</a></li>
            <li><a href="/categories/mouses">Миші</a></li>
            <li><a href="/categories/watches">Годинники</a></li>
        </ul>
    </div>
</header>
