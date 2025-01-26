<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- <script src="//cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script> -->
    <script src="<?= base_url('/ckeditor5/ckeditor.js'); ?>"></script>
    <link rel="stylesheet" href="<?= base_url('/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/css/style.css'); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?= base_url('/bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <title>PJB UBJOM PLTMG ARUN</title>
</head>

<body>

    <?= $this->include('layout/sidebar'); ?>

    <section class="home-section">

        <?= $this->include('layout/topbar'); ?>

        <?= $this->renderSection('content'); ?>

        <?= $this->include('layout/footer'); ?>

    </section>
    <script src="<?= base_url('/js/javascript.js'); ?>"></script>

</body>

</html>