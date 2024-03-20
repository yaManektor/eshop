<!doctype html>
<html lang="ua">

<head>
    <?php require_once('public/blocks/head.php') ?>
    <link rel="stylesheet" href="/public/css/form.css">
</head>

<body>
<?php require_once('public/blocks/header.php') ?>

<div class="container main">
    <h1>Реєстрація</h1>
    <p>Тут можна зареєструватися на нашому сайті</p>
    <form action="" method="POST" class="form-control">
        <input type="text" name="name" placeholder="Введіть ім'я..." value="<?= $_POST['name'] ?? '' ?>"><br>
        <input type="email" name="email" placeholder="Введіть email..." value="<?= $_POST['email'] ?? '' ?>"><br>
        <input type="password" name="pass" placeholder="Введіть пароль...">
        <input type="password" name="re_pass" placeholder="Повторіть пароль...">
        <div class="error"><?= $data['message'] ?? ''?></div>
        <input type="submit" class="btn" id="send" value="Підтвердити">
    </form>
</div>

<?php require_once('public/blocks/footer.php') ?>
</body>

</html>
