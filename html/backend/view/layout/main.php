<html>

<head>
    <link rel="stylesheet" href="<?= app()->staticUrl ?>/css/main.css" />
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <div class="banner">
                    <img src="<?= app()->staticUrl ?>/image/banner.jpg" />
                </div>
            </div>

            <div class="main">
                <a href="<?= app()->baseUrl ?>/site-preference">Product</a>
                <?php $this->placeholder() ?>
            </div>

            <div class="footer">
                Copyright@ Backend
            </div>
        </div>
    </div>

    <script src="<?= app()->staticUrl ?>/js/main.js"></script>
</body>

</html>