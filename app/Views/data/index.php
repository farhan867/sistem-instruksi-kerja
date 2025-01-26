<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="home-content">
    <style>
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-weight: bold;
        }


        .table th,
        .table td {
            border: 1px solid black;
        }
    </style>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif ?>

    <?php foreach ($data as $ik) : ?>
        <div class="overview-boxes">
            <div class="card" style="width:100%;">

                <div class="card-body p-5">
                    <h3 class="card-title" style="text-align:center; margin-bottom: 50px;font-size:35px;">INSTRUKSI KERJA(IK) PJB IMS<br>PJB-IMS 2.0</h3>
                    <div class="text-info" style="font-weight: bold;font-size:30px; text-align:center;margin-bottom: 50px;"><?= $ik['judul']; ?></div>
                    <table style="margin-bottom: 50px;font-weight:bold;font-size:15px">
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
                    <figure class="table">
                        <table style="text-align:center;font-size:15px;width:100%">
                            <tr>
                                <th>Disusun,</th>
                                <th>Disetujui,</th>
                                <th>Disahkan,</th>

                            </tr>
                            <tr style="height: 100px;">
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

                <div class="card-footer">
                    <div class="btn-group d-flex" role="group" style="width:100%;">
                        <a href="<?= base_url('data/' . $ik['slug']); ?>" class="btn text-white btn-warning w-100 px-0" type="button">Edit</a>

                        <a href="javascript:;" data-slug="<?php echo $ik['slug'] ?>" data-judul="<?php echo strip_tags($ik['judul']) ?>" data-no_ik="<?php echo $ik['no_ik'] ?>" data-tgl_ditetapkan="<?php echo $ik['tgl_ditetapkan'] ?>" data-tgl_diperbarui="<?php echo $ik['tgl_diperbarui'] ?>" data-tgl_terbit="<?php echo $ik['tgl_terbit'] ?>" data-no_revisi="<?php echo $ik['no_revisi'] ?>" data-revisi="<?php echo htmlentities($ik['revisi']) ?>" data-disusun="<?php echo $ik['jabatan'] ?>" data-manajer="<?php echo 'Manajer ', $ik['nama'] ?>" data-tujuan="<?php echo htmlentities($ik['tujuan']) ?>" data-lingkup="<?php echo htmlentities($ik['ruang_lingkup']) ?>" data-definisi="<?php echo htmlentities($ik['definisi']) ?>" data-pendukung="<?php echo htmlentities($ik['terkait_pendukung']) ?>" data-referensi="<?php echo htmlentities($ik['terkait_referensi']) ?>" data-perizinan="<?php echo htmlentities($ik['terkait_perizinan']) ?>" data-teknik="<?php echo htmlentities($ik['terkait_teknik']) ?>" data-sdm="<?php echo htmlentities($ik['sumber_sdm']) ?>" data-tools="<?php echo htmlentities($ik['sumber_tools']) ?>" data-material="<?php echo htmlentities($ik['sumber_material']) ?>" data-identifikasi="<?php echo htmlentities($ik['risiko_identifikasi']) ?>" data-mitigasi="<?php echo htmlentities($ik['risiko_mitigasi']) ?>" data-parameter="<?php echo htmlentities($ik['parameter']) ?>" data-aktivitas="<?php echo htmlentities($ik['detail_aktivitas']) ?>" data-formulir="<?php echo htmlentities($ik['formulir']) ?>" data-lampiran="<?php echo htmlentities($ik['lampiran']) ?>" type="button" class="btn btn-secondary w-100 px-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Preview</a>
                        <?php if ($ik['no_ik']) : ?>
                            <form action="/data/batal" method="POST" class="btn-group d-flex" role="group" style="width:100%;">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="slug" value="<?= $ik['slug']; ?>">
                                <button type="submit" class="btn btn-danger w-100 px-0" onclick="return confirm('Apakah Anda Yakin?');">cancel Revisi</button>
                            </form>
                        <?php else : ?>
                            <form action="<?= base_url('data/' . $ik['id']); ?>" method="POST" class="btn-group d-flex" role="group" style="width:100%;">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger w-100 px-0" onclick="return confirm('Apakah Anda Yakin?');">Delete</button>
                            </form>
                        <?php endif ?>
                        <form action="<?= base_url('data/kirim/' . $ik['id']); ?>" method="POST" class="btn-group d-flex" role="group" style="width:100%;">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="KIRIM">
                            <button type="submit" class="btn btn-success w-100 px-0" onclick="return confirm('Apakah Anda Yakin?');">Publish</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
    <?php if (user()->id_bidang && user()->jabatan) : ?>
        <a href="/create" type="button" class="create btn btn-success"><i class='bx bx-plus'></i></a>
    <?php endif ?>
</div>

<?= $this->include('data/preview'); ?>

<?= $this->endSection(); ?>