<!doctype html>
<html lang="ua">

<head>
    <?php require_once('public/blocks/head.php') ?>
</head>

<body>
    <?php require_once('public/blocks/header.php') ?>

    <div class="container main">
        <h1>Популярні товари</h1>
        <div class="products">
            <?php for ($i = 0; $i < count($data['products']); $i++): ?>
            <div class="product">
                <div class="image">
                    <img src="/public/img/<?=$data['products'][$i]->img?>" alt="<?=$data['products'][$i]->title?>">
                </div>
                <h3><?=$data['products'][$i]->title?></h3>
                <p><?=$data['products'][$i]->anons?></p>
                <a href="/product/<?=$data['products'][$i]->id?>"><button class="btn">Детальніше</button></a>
            </div>
            <?php endfor; ?>
        </div>
    </div>

    <?php require_once('public/blocks/footer.php') ?>
</body>

</html>
