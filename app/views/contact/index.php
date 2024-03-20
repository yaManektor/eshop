<!doctype html>
<html lang="ua">

<head>
    <?php require_once('public/blocks/head.php') ?>
    <link rel="stylesheet" href="/public/css/form.css">
</head>

<body>
    <?php require_once('public/blocks/header.php') ?>

    <div class="container main">
        <h1>Зворотній зв'язок</h1>
        <p>Напишіть нам, якщо у вас є запитання</p>
        <form action="" method="POST" class="form-control">
            <input type="text" name="name" placeholder="Введіть ім'я..." value="<?= $_POST['name'] ?? '' ?>"><br>
            <input type="email" name="email" placeholder="Введіть email..." value="<?= $_POST['email'] ?? '' ?>"><br>
            <input type="text" name="subject" placeholder="Введіть тему звернення..." value="<?= $_POST['subject'] ?? '' ?>">
            <textarea name="message" placeholder="Введіть ваше повідомлення..."><?= $_POST['message'] ?? '' ?></textarea>
            <div class="error"><?= $data['message'] ?? ''?></div>
            <input type="submit" class="btn" id="send" value="Відправити">
        </form>
    </div>

    <?php require_once('public/blocks/footer.php') ?>
</body>

</html>
