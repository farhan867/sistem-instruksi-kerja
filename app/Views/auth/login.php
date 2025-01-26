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


        <section class="form login">
            <header><?= lang('Auth.loginTitle') ?></header>
            <form action="<?= route_to('login') ?>" method="post">
                <?= csrf_field() ?>
                <?= view('Myth\Auth\Views\_message_block') ?>

                <?php if ($config->validFields === ['email']) : ?>
                    <div class="field input">
                        <label for="login"><?= lang('Auth.email') ?></label>
                        <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="field input">
                        <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                        <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="field input">
                    <label for="password"><?= lang('Auth.password') ?></label>
                    <input type="password" id="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                    <i class="fas fa-eye"></i>
                    <div class="invalid-feedback">
                        <?= session('errors.password') ?>
                    </div>
                </div>

                <?php if ($config->allowRemembering) : ?>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                            <?= lang('Auth.rememberMe') ?>
                        </label>
                    </div>
                <?php endif; ?>

                <div class="field button">
                    <input type="submit" name="submit" value="<?= lang('Auth.loginAction') ?>">
                </div>
            </form>
            <div class="link"><?php if ($config->allowRegistration) : ?>
                    <p><a href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
                <?php endif; ?>
            </div>
            <?php if ($config->activeResetter) : ?>
                <p><a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
            <?php endif; ?>
        </section>
    </div>

    <script src=<?= base_url('/js/auth.js'); ?>></script>

</body>

</html>