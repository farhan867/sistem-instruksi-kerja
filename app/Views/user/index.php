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

    <div class="overview-boxes">
        <?php foreach ($data as $ik) : ?>
            <div class="card box" style="width: 15rem;">
                <div class="card-body" style="font-size: 10px;">
                    <h1 class="card-title" style="font-size: 14px;white-space: nowrap;">INSTRUKSI KERJA(IK) PJB IMS<br>PJB-IMS 2.0</h1>
                    <div class="text-info" style="font-weight: bold;font-size: 13px;text-align: center;margin:10px 0;">
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
                                <th style="width: 33%;"><?= $ik['disusun']; ?></th>
                                <th style="width: 33%;">Manajer <?= $ik['nama']; ?></th>
                                <th style="width: 33%;">General Manager</th>
                            </tr>
                        </table>
                    </figure>
                </div>
                <div class="btn-group d-flex" style="position: absolute;bottom:45px;width:15rem" role="group" aria-label="Basic mixed styles example">

                    <a href="javascript:;" data-slug="<?php echo $ik['slug'] ?>" data-judul="<?php echo strip_tags($ik['judul']) ?>" data-no_ik="<?php echo $ik['no_ik'] ?>" data-tgl_ditetapkan="<?php echo $ik['tgl_ditetapkan'] ?>" data-tgl_diperbarui="<?php echo $ik['tgl_diperbarui'] ?>" data-tgl_terbit="<?php echo $ik['tgl_terbit'] ?>" data-no_revisi="<?php echo $ik['no_revisi'] ?>" data-revisi="<?php echo htmlentities($ik['revisi']) ?>" data-disusun="<?php echo $ik['disusun'] ?>" data-manajer="<?php echo 'Manajer ', $ik['nama'] ?>" data-tujuan="<?php echo htmlentities($ik['tujuan']) ?>" data-lingkup="<?php echo htmlentities($ik['ruang_lingkup']) ?>" data-definisi="<?php echo htmlentities($ik['definisi']) ?>" data-pendukung="<?php echo htmlentities($ik['terkait_pendukung']) ?>" data-referensi="<?php echo htmlentities($ik['terkait_referensi']) ?>" data-perizinan="<?php echo htmlentities($ik['terkait_perizinan']) ?>" data-teknik="<?php echo htmlentities($ik['terkait_teknik']) ?>" data-sdm="<?php echo htmlentities($ik['sumber_sdm']) ?>" data-tools="<?php echo htmlentities($ik['sumber_tools']) ?>" data-material="<?php echo htmlentities($ik['sumber_material']) ?>" data-identifikasi="<?php echo htmlentities($ik['risiko_identifikasi']) ?>" data-mitigasi="<?php echo htmlentities($ik['risiko_mitigasi']) ?>" data-parameter="<?php echo htmlentities($ik['parameter']) ?>" data-aktivitas="<?php echo htmlentities($ik['detail_aktivitas']) ?>" data-formulir="<?php echo htmlentities($ik['formulir']) ?>" data-lampiran="<?php echo htmlentities($ik['lampiran']) ?>" type="button" class="btn btn-secondary w-100 px-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Preview</a>
                    <?php if (in_groups('admin')) : ?>
                        <form action="<?= base_url('deleteik/' . $ik['id']); ?>" method="POST" class="btn-group d-flex" role="group" style="width:100%;">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger w-100 px-0" onclick="return confirm('Apakah Anda Yakin?');">Delete</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- <script>
        $(document).ready(function() {
            $.ajax({
                url: "<?= base_url('user/dataIk'); ?>",
                dataType: "json",
                success: function(res) {
                    $(".overview-boxes").html(res)
                }
            })
        })
    </script> -->

</div>

<?= $this->include('user/preview'); ?>
<?= $this->endSection(); ?>