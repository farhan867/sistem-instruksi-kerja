<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url('/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/css/auth.css'); ?>">
    <script src="<?= base_url('/bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.min.js'); ?>"></script>
    <title>PJB UBJOM PLTMG ARUN</title>
</head>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header><?= lang('Auth.register') ?></header>
            <?= view('Myth\Auth\Views\_message_block') ?>

            <form action="<?= route_to('register') ?>" method="post">
                <?= csrf_field() ?>
                <div class="field input">
                    <label for="email"><?= lang('Auth.email') ?></label>
                    <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                    <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                </div>

                <div class="field input">
                    <label for="username"><?= lang('Auth.username') ?></label>
                    <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                </div>

                <div class="field input">
                    <label for="password"><?= lang('Auth.password') ?></label>
                    <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                    <i class="fas fa-eye"></i>
                </div>

                <div class="field input">
                    <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                    <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                </div>

                <div class="field button">
                    <input type="submit" name="submit" value="<?= lang('Auth.register') ?>">
                </div>
            </form>

            <div class="link"><?= lang('Auth.alreadyRegistered') ?> <a href="<?= route_to('login') ?>"><?= lang('Auth.signIn') ?></a></div>

        </section>
    </div>

    <script src=<?= base_url('/js/auth.js'); ?>></script>

</body>

</html>