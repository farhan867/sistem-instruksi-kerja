<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="home-content">

    <?php if (session()->getFlashdata('gagal')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('gagal'); ?>
        </div>
    <?php endif ?>
    <div class="overview-boxes">
        <div class="card" style="width:100% ;">
            <form action="/profile/updatePassword/<?= user()->id; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="fotoLama" value="<?= user()->user_image; ?>">
                <h5 class="card-header">Ubah Password</h5>
                <div class="card-body">

                    <div class="row mb-3">
                        <label for="password_lama" class="col-sm-3 col-form-label">Password Lama</label>
                        <div class="col">
                            <input type="password" placeholder="Password Lama. . ." class="form-control <?= ($validation->hasError('password_lama')) ? 'is-invalid' : ''; ?>" id="password_lama" name="password_lama">
                            <div class="invalid-feedback">
                                <?= $validation->getError('password_lama'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password_baru" class="col-sm-3 col-form-label">Password Baru</label>
                        <div class="col">
                            <input type="password" placeholder="Password Baru. . ." class="form-control <?= ($validation->hasError('password_baru')) ? 'is-invalid' : ''; ?>" id="password_baru" name="password_baru">
                            <div class="invalid-feedback">
                                <?= $validation->getError('password_baru'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password_konfirmasi" class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
                        <div class="col">
                            <input type="password" placeholder="Konfirmasi Password Baru. . ." class="form-control <?= ($validation->hasError('password_konfirmasi')) ? 'is-invalid' : ''; ?>" id="password_konfirmasi" name="password_konfirmasi">
                            <div class="invalid-feedback">
                                <?= $validation->getError('password_konfirmasi'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <input type="submit" name="save" class="btn btn-secondary" value="Simpan" />
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>