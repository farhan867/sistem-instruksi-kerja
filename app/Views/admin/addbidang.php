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
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Add Bidang</button>
    <form id="msform" action="<?= base_url('admin/add') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Bidang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" placeholder="Input Bidang. . ." class="form-control <?= ($validation->hasError('bidang')) ? 'is-invalid' : ''; ?>" id="bidang" name="bidang">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('bidang'); ?>
                                </div>
                            </div>
                        </div>
                        <textarea placeholder="Input Description. . ." class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-secondary" value="Buat">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="overview-boxes">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Bidang</th>
                    <th scope="col">Description</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php $no = 0;
                foreach ($bidang as $divisi) : ?>
                    <tr>
                        <th scope="row"><?= ++$no; ?></th>
                        <td><?= $divisi['nama']; ?></td>
                        <td><?= $divisi['description']; ?></td>
                        <td>
                            <div class="btn-group d-flex" role="group" style="width:100%;">
                                <a href="javascript:;" data-id="<?php echo $divisi['id_bidang'] ?>" data-bidang="<?php echo $divisi['nama'] ?>" data-description="<?php echo $divisi['description'] ?>" type="button" class="btn btn-warning w-100 px-0" data-bs-toggle="modal" data-bs-target="#editbidang" data-bs-whatever="@getbootstrap">Edit</a>
                                <form action="<?= base_url('deletebidang/' . $divisi['id_bidang']); ?>" method="POST" class="btn-group d-flex" role="group" style="width:100%;">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger w-100 px-0" onclick="return confirm('Apakah Anda Yakin?');">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <form id="msform" action="<?= base_url('/admin/ubah'); ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="modal fade" id="editbidang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Bidang</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col">
                                    <input type="hidden" class="form-control" id="id" name="id">
                                    <input type="text" placeholder="Input Bidang. . ." class="form-control <?= ($validation->hasError('bidang')) ? 'is-invalid' : ''; ?>" id="bidang" name="bidang">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('bidang'); ?>
                                    </div>
                                </div>
                            </div>
                            <textarea placeholder="Input Description. . ." class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary">Ubah</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script>
            $(document).ready(function() {
                // Untuk sunting
                $('#editbidang').on('show.bs.modal', function(event) {
                    var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                    var modal = $(this)

                    // Isi nilai pada field
                    modal.find('#id').attr("value", div.data('id'));
                    modal.find('#bidang').attr("value", div.data('bidang'));
                    modal.find('#description').html(div.data('description'));
                });
            });
        </script>
    </div>
</div>

<?= $this->endSection(); ?>