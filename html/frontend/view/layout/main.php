<!DOCTYPE html>
<html lang="en">

<head>
    <title>Books</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?= app()->staticUrl ?>/css/frontend.css" />
</head>

<body>
    <?php if (isset($_SESSION['username'])) : ?>
        <div class="container">
            <a href="<?= app()->baseUrl ?>/auth/logout">Đăng xuất</a>
        </div>
    <?php endif ?>

    <?php $this->placeholder() ?>

    <script src="<?= app()->staticUrl ?>/js/main.js"></script>
</body>

</html>