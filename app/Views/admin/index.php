<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="home-content">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif ?>
    <div class="overview-boxes">
        <?php foreach ($users as $user) : ?>
            <div class="card box" style="width: 9rem;border-radius: 15px 15px 0 0;">
                <img style="height: 7rem" src="<?= base_url('profileIMG/' . $user['user_image']); ?>" class="card-img-top" alt="<?= $user['username']; ?>">
                <div class="card-body">
                    <h1 class="card-title m-0" style="font-size:15px;"><?= $user['username']; ?></h1>
                    <p style="font-size:10px;"><?= $user['jabatan']; ?></p>
                    <p class="card-text"><span class="badge text-black bg-<?= ($user['name'] == 'admin') ? 'danger' : (($user['name'] == 'MMK') ? 'success' : (($user['name'] == 'MRK') ? 'warning' : 'info')); ?>"><?= $user['name']; ?></span></p>
                </div>
                <div class="btn-group d-flex" style="padding-bottom:15px;width:100%;" role="group" aria-label="Basic mixed styles example">
                    <a href="<?= base_url('admin/' . $user['username']); ?>" class="btn text-white btn-warning w-100 px-0">Edit</a>
                    <form action="<?= base_url('admin/' . $user['username']); ?>" method="POST" class="d-inline btn-group d-flex" style="width:100%;" role="group">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger w-100 px-0" onclick="return confirm('Apakah Anda Yakin?');">Delete</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection(); ?>