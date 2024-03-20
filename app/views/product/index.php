<!doctype html>
<html lang="ua">

<head>
    <?php require_once('public/blocks/head.php') ?>
    <link rel="stylesheet" href="/public/css/product.css">
</head>

<body>
    <?php require_once('public/blocks/header.php') ?>

    <div class="container main">
        <a href="/categories/<?=$data['product']->category?>">
            <button class="btn">Назад</button>
        </a>
        <h1><?=$data['product']->title?></h1>
        <div class="info">
            <div>
                <img src="/public/img/<?=$data['product']->img?>" alt="<?=$data['product']->title?>">
            </div>
            <div>
                <p><?=$data['product']->anons?></p><br>
                <p><?=$data['product']->text?></p>
            </div>
            <div>
                <form action="/basket" method="POST">
                    <input type="hidden" name="item_id" value="<?=$data['product']->id?>">
                    <button class="btn">Купити за <?=$data['product']->price?> грн.</button>
                </form>
            </div>
        </div>
    </div>

    <?php require_once('public/blocks/footer.php') ?>
</body>

</html>
