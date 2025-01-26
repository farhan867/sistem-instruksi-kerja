<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="home-content">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif ?>
    <?php if (session()->getFlashdata('gagal')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('gagal'); ?>
        </div>
    <?php endif ?>
    <div class="overview-boxes">
        <div class="card" style="width:100% ;">
            <form action="/profile/update/<?= user()->username; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="fotoLama" value="<?= user()->user_image; ?>">
                <h5 class="card-header">Edit Profile</h5>
                <div class="card-body">
                    <?php //if (user()->fullname) : 
                    ?>
                    <?php //endif 
                    ?>
                    <div class="mb-2 d-grid gap-2 col-3 mx-auto">
                        <img id="profileImage" src="<?= base_url('profileIMG/' . user()->user_image); ?>" class="img-fluid rounded-start" alt="<?= user()->user_image; ?>">
                    </div>
                    <div class="mb-3 d-grid gap-2 col-4 mx-auto">
                        <input id="imageUpload" class="form-control <?= ($validation->hasError('profile_photo')) ? 'is-invalid' : ''; ?>" type="file" name="profile_photo" placeholder="Photo" capture>
                        <div class="invalid-feedback">
                            <?= $validation->getError('profile_photo'); ?>
                        </div>
                    </div>
                    <script>
                        $("#profileImage").click(function(e) {
                            $("#imageUpload").click();
                        });

                        function fasterPreview(uploader) {
                            if (uploader.files && uploader.files[0]) {
                                $('#profileImage').attr('src',
                                    window.URL.createObjectURL(uploader.files[0]));
                            }
                        }

                        $("#imageUpload").change(function() {
                            fasterPreview(this);
                        });
                    </script>
                    <div class="row mb-3">
                        <label for="fullname" class="col-sm-2 col-form-label">FullName</label>
                        <div class="col">
                            <input type="text" placeholder="Input Fullname. . ." value="<?= (old('fullname')) ? old('fullname') : user()->fullname; ?>" class="form-control" id="fullname" name="fullname" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col">
                            <input type="email" placeholder="Input Email. . ." value="<?= (old('email')) ? old('email') : user()->email; ?>" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email">
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col">
                            <input type="text" placeholder="Input Username. . ." class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= (old('username')) ? old('username') : user()->username; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="role" class="col-sm-2 col-form-label">Bidang</label>
                        <div class="col">
                            <select class="form-select" aria-label="Disabled select example" name="bidang">
                                <option selected><?php if (user()->id_bidang) : ?>
                                        <?= $divisi['nama']; ?>
                                    <?php else : ?>
                                        Open this select menu
                                    <?php endif ?>
                                </option>
                                <?php foreach ($bidang as $ruang) : ?>
                                    <?php if ($ruang['id_bidang'] != user()->id_bidang) : ?>
                                        <option value="<?= $ruang['id_bidang']; ?>"><?= $ruang['nama']; ?></option>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-muted">Menentukan Manajer Bidang yang Menyetujui Dokumen IK</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col">
                            <input type="text" placeholder="Input Jabatan. . ." value="<?= (old('jabatan')) ? old('jabatan') : user()->jabatan; ?>" class="form-control" id="jabatan" name="jabatan">
                            <small class="form-text text-muted">Mendeteksi penyusun Dokumen IK</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="role" class="col-sm-2 col-form-label">Access</label>
                        <div class="col">
                            <select class="form-select" aria-label="Disabled select example">
                                <option selected><?= $user['name']; ?></option>
                                <?php foreach ($role as $akses) : ?>
                                    <?php if ($akses->name != $user['name']) : ?>
                                        <option class="bg-secondary p-2 text-muted bg-opacity-25" value="<?= $akses->id; ?>" disabled><?= $akses->name; ?></option>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </select>
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