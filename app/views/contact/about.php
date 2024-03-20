<!doctype html>
<html lang="ua">

<head>
    <?php require_once('public/blocks/head.php') ?>
</head>

<body>
    <?php require_once('public/blocks/header.php') ?>

    <div class="container main">
        <h1>Про компанію</h1>
        <p>Тут розміщується текст про компанію</p><br>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet consectetur consequuntur
            dicta dolore ea, facilis harum id incidunt modi nemo optio possimus praesentium provident
            qui ratione sequi soluta velit voluptatum?</p>

        <?php if (!empty($data['params'])) : ?>
            <br><br>
            <h2>Є додатковий параметр</h2>
            <p>Дані з URL: <b><?=$data['params']?></b></p>
        <?php endif; ?>
    </div>

    <?php require_once('public/blocks/footer.php') ?>
</body>

</html>
