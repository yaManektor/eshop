<!doctype html>
<html lang="ua">

<head>
    <?php require_once('public/blocks/head.php') ?>
    <link rel="stylesheet" href="/public/css/user.css">
</head>

<body>
<?php require_once('public/blocks/header.php') ?>

<div class="container main">
    <h1>Кабінет користувача</h1>
    <div class="user-info">
        <p>Привіт, <b><?=$data['user']->name?></b></p>
        <div class="error"><?= $data['message'] ?? ''?></div>

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="500000">
            <input type="hidden" name="id" value="<?=$data['user']->id?>">
            <input type="file" name="user_image">
            <button type="submit" class="btn">Завантажити</button>
        </form>

        <div class="user_image">
            <?php if ($data['user']->image != ''): ?>
                <img src="/public/img/user/<?=$data['user']->image?>" alt="User image">
            <?php else: ?>
                <img src="/public/img/user/defaultUserImage.png" alt="Default user image">
            <?php endif; ?>
        </div>

        <form action="" method="POST">
            <input type="hidden" name="exit-btn">
            <button type="submit" class="btn">Вийти</button>
        </form>
    </div>
</div>

<?php require_once('public/blocks/footer.php') ?>
</body>

</html>
