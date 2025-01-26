<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="home-content">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-warning" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif ?>
    <div class="overview-boxes">
        <div class="card" style="width:100% ;">
            <div class="card-header">
                <small><a href="<?= base_url('admin'); ?>">&laquo; back</a></small>
            </div>
            <form action="<?= base_url('/admin/update'); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="username" value="<?= $users['username']; ?>">
                <div class="card-body">
                    <div class="mb-3 d-grid gap-2 col-3 mx-auto">
                        <img id="profileImage" src="<?= base_url('profileIMG/' . $users['user_image']); ?>" class="img-fluid rounded-start" alt="<?= $users['user_image']; ?>">
                    </div>
                    <div class="row mb-3">
                        <div class="input-group">
                            <span class="input-group-text">Choose File Disabled</span>
                            <label class="form-control text-muted"><?= $users['user_image']; ?>
                                <input type="file" class="invisible" disabled>
                            </label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
                        <div class="col">
                            <input type="text" disabled value="<?= $users['fullname']; ?>" class="form-control" id="fullname">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col">
                            <input type="email" disabled value="<?= $users['email']; ?>" class="form-control" id="email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col">
                            <input type="text" disabled value="<?= $users['username']; ?>" class="form-control" id="username">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="role" class="col-sm-2 col-form-label">Bidang</label>
                        <div class="col">
                            <select class="form-select" aria-label="Disabled select example" name="bidang" disabled>
                                <option selected><?php if ($users['id_bidang']) : ?>
                                        <?= $bidang['nama']; ?>
                                    <?php else : ?>
                                        Open this select menu
                                    <?php endif ?>
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col">
                            <input type="text" disabled value="<?= $users['jabatan']; ?>" class="form-control" id="jabatan">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="role" class="col-sm-2 col-form-label">Access</label>
                        <div class="col">
                            <select class="form-select" aria-label="Default select example" name="role">
                                <option selected><?= $users['name']; ?></option>
                                <?php foreach ($role as $akses) : ?>
                                    <?php if ($akses->name != $users['name']) : ?>
                                        <option value="<?= $akses->id; ?>"><?= $akses->name; ?></option>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-grid gap-2 col-3 mx-auto">
                        <input type="submit" name="next" class="btn btn-secondary" value="Update" />
                    </div>
                </div>
            </form>
            <div class="card-footer text-end">
                <form action="<?= base_url('/admin/reset'); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="username" value="<?= $users['username']; ?>">
                    <button type="" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Reset Password</button>
                </form>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>