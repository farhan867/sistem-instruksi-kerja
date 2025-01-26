<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
    h1,
    h2,
    h3,
    h4,
    h5 {
        font-size: 12px;
        text-align: center;
        margin: 10px 0;
        font-weight: bold;
    }

    .table th,
    .table td {
        border: 1px solid black;
        font-size: 7px;
    }
</style>

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
        <?php foreach ($data as $ik) : ?>
            <div class="card box" style="width: 15rem;">
                <div class="card-body" style="font-size: 10px;">
                    <h1 class="card-title" style="font-size: 14px;white-space: nowrap;">INSTRUKSI KERJA(IK) PJB IMS<br>PJB-IMS 2.0</h1>
                    <div class="text-info" style="font-weight: bold;font-size: 12px;text-align: center;margin:10px 0;">
                        <?= $ik['judul']; ?>
                    </div>
                    <table style="font-size:8px">
                        <tr>
                            <td>NO. DOKUMEN</td>
                            <td>&emsp;:</td>
                            <td>&ensp;<?= $ik['no_ik']; ?></td>
                        </tr>
                        <tr>
                            <td>TANGGAL DITETAPKAN</td>
                            <td>&emsp;:</td>
                            <td>&ensp;<?= $ik['tgl_ditetapkan']; ?></td>
                        </tr>
                        <tr>
                            <td>TANGGAL DIPERBARUI</td>
                            <td>&emsp;:</td>
                            <td>&ensp;<?= $ik['tgl_diperbarui']; ?></td>
                        </tr>
                        <tr>
                            <td>REVISI</td>
                            <td>&emsp;:</td>
                            <td>&ensp;<?= $ik['no_revisi']; ?></td>
                        </tr>
                    </table>

                    </style>
                    <figure class="table">
                        <table style="text-align:center;margin:20px 0 0 0;margin-left:auto;margin-right:auto">
                            <tr>
                                <th>Disusun,</th>
                                <th>Disetujui,</th>
                                <th>Disahkan,</th>
                            </tr>
                            <tr style="height: 30px;">
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <th style="width: 33%;"><?= $ik['jabatan']; ?></th>
                                <th style="width: 33%;">Manajer <?= $ik['nama']; ?></th>
                                <th style="width: 33%;">General Manager</th>
                            </tr>
                        </table>
                    </figure>
                </div>
                <div class="btn-group d-flex" style="position: absolute;bottom:45px;width:100%;" role="group" aria-label="Basic mixed styles example">
                    <a href="javascript:;" data-slug="<?php echo $ik['slug'] ?>" data-judul="<?php echo strip_tags($ik['judul']) ?>" data-no_ik="<?php echo $ik['no_ik'] ?>" data-tgl_ditetapkan="<?php echo $ik['tgl_ditetapkan'] ?>" data-tgl_diperbarui="<?php echo $ik['tgl_diperbarui'] ?>" data-tgl_terbit="<?php echo $ik['tgl_terbit'] ?>" data-no_revisi="<?php echo $ik['no_revisi'] ?>" data-revisi="<?php echo htmlentities($ik['revisi']) ?>" data-disusun="<?php echo $ik['jabatan'] ?>" data-manajer="<?php echo 'Manajer ', $ik['nama'] ?>" data-tujuan="<?php echo htmlentities($ik['tujuan']) ?>" data-lingkup="<?php echo htmlentities($ik['ruang_lingkup']) ?>" data-definisi="<?php echo htmlentities($ik['definisi']) ?>" data-pendukung="<?php echo htmlentities($ik['terkait_pendukung']) ?>" data-referensi="<?php echo htmlentities($ik['terkait_referensi']) ?>" data-perizinan="<?php echo htmlentities($ik['terkait_perizinan']) ?>" data-teknik="<?php echo htmlentities($ik['terkait_teknik']) ?>" data-sdm="<?php echo htmlentities($ik['sumber_sdm']) ?>" data-tools="<?php echo htmlentities($ik['sumber_tools']) ?>" data-material="<?php echo htmlentities($ik['sumber_material']) ?>" data-identifikasi="<?php echo htmlentities($ik['risiko_identifikasi']) ?>" data-mitigasi="<?php echo htmlentities($ik['risiko_mitigasi']) ?>" data-parameter="<?php echo htmlentities($ik['parameter']) ?>" data-aktivitas="<?php echo htmlentities($ik['detail_aktivitas']) ?>" data-formulir="<?php echo htmlentities($ik['formulir']) ?>" data-lampiran="<?php echo htmlentities($ik['lampiran']) ?>" type="button" class="btn btn-secondary w-100 px-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Preview</a>
                    <a href="javascript:;" data-id="<?php echo $ik['id'] ?>" type="button" class="btn btn-danger w-100 px-0" data-bs-toggle="modal" data-bs-target="#modalPesan">Perbaiki</a>
                    <a href="javascript:;" data-no_ik="<?php echo $ik['no_ik'] ?>" data-slug="<?php echo $ik['slug'] ?>" type="button" class="btn btn-success w-100 px-0" data-bs-toggle="modal" data-bs-target="#approve">Setuju</a>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
    <!----------------------------------------- modalllllllllll pesan -------------------------------------------------->
    <form id="msform" action="<?= base_url('mmk/perbaiki'); ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="modal fade" id="modalPesan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" class="form-control" id="id">
                        <textarea placeholder="Kirim pesan. . ." class="form-control" name="pesan" id="pesan"></textarea>
                        <script>
                            ClassicEditor.create(document.getElementById('pesan'), {
                                toolbar: {
                                    items: [
                                        'heading', '|',
                                        'fontfamily', 'fontsize', '|',
                                        'alignment', '|',
                                        'fontColor', 'fontBackgroundColor', '|',
                                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                                        'outdent', 'indent', '|',
                                        'bulletedList', 'numberedList', 'todoList', '|',
                                        'undo', 'redo'
                                    ],
                                    shouldNotGroupWhenFull: true
                                }

                            }).then(editor => {
                                console.log(editor);
                            }).catch(error => {
                                console.log(error);
                            });
                        </script>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Kirim">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!---------------------------------------------------- tutup modalllllllll -------------------------------->
    <script>
        $(document).ready(function() {
            // Untuk sunting
            $('#modalPesan').on('show.bs.modal', function(event) {
                var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                var modal = $(this)

                // Isi nilai pada field
                modal.find('#id').attr("value", div.data('id'));
            });
        });
    </script>
    <!-- -------------------------------------- Modal Form Input Judul------------------------------------- -->

    <div class="modal fade" id="approve" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <form id="msform" action="<?= base_url('mmk/approve'); ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Instruksi Kerja</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="no_ik" class="col-sm-2 col-form-label">No Dokumen</label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" name="slug" id="slug">
                                <input type="text" placeholder="Inpu No Dokumen IK. . ." class="form-control" id="no_ik" name="no_ik" required autofocus>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin?');" value="Approved">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- --------------------------------------------------------------------------------------------- -->
    <script>
        $(document).ready(function() {
            // Untuk sunting
            $('#approve').on('show.bs.modal', function(event) {
                var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                var modal = $(this)

                // Isi nilai pada field
                modal.find('#slug').attr("value", div.data('slug'));
                modal.find('#no_ik').attr("value", div.data('no_ik'));
            });
        });
    </script>
</div>



<?= $this->include('mmk/preview'); ?>


<?= $this->endSection(); ?>