<!doctype html>
<html lang="ua">

<head>
    <?php require_once('public/blocks/head.php') ?>
    <link rel="stylesheet" href="/public/css/products.css">
</head>

<body>
<?php require_once('public/blocks/header.php') ?>

<div class="container main">
    <h1>Корзина товарів</h1>

    <?php if (!isset($data['order'])): ?>
        <p>Корзина порожня</p>
    <?php else: ?>

        <form action="basket/delete" method="POST">
            <input type="hidden" name="delete_all">
            <button type="submit" class="btn deleteAll">
                Видалити всі товари
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>

        <div class="products">

            <?php
                $sum = 0;
                for ($i = 0; $i < count($data['order']); $i++):
                    $sum += $data['order'][$i]->price;
            ?>
                <div class="row">
                    <img src="/public/img/<?=$data['order'][$i]->img?>" alt="<?=$data['order'][$i]->title?>">
                    <h4><?=$data['order'][$i]->title?></h4>
                    <span><?=$data['order'][$i]->price?> гривень</span>
                    <form action="basket/delete" method="POST">
                        <input type="hidden" name="itemID" value="<?=$data['order'][$i]->id?>">
                        <button type="submit" class="btn">
                            Прибрати з корзини
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </form>
                </div>
            <?php endfor; ?>

            <form action="/basket/confirm" method="POST">
                <input type="hidden" name="amount" value="<?=$sum?>">
                <button type="submit" class="btn">Купити (<b><?=$sum?> гривень</b>)</button>
            </form>
        </div>
    <?php endif; ?>

</div>

<?php require_once('public/blocks/footer.php') ?>
</body>

</html>
