<!doctype html>
<html lang="ua">

<head>
    <?php require_once('public/blocks/head.php') ?>
    <link rel="stylesheet" href="/public/css/form.css">
</head>

<body>
<?php require_once('public/blocks/header.php') ?>

<div class="container main">
    <h1>Авторизація</h1>
    <p>Тут можна авторизуватися на нашому сайті</p>
    <form action="" method="POST" class="form-control">
        <input type="email" name="email" placeholder="Введіть email..." value="<?= $_POST['email'] ?? '' ?>"><br>
        <input type="password" name="pass" placeholder="Введіть пароль...">
        <div class="error"><?= $data['message'] ?? ''?></div>
        <input type="submit" class="btn" id="send" value="Підтвердити">
    </form>
</div>

<?php require_once('public/blocks/footer.php') ?>
</body>

</html>
