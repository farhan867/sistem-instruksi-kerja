<style>
    p,
    ul,
    figure {
        margin: 0;
    }

    .lembar img {
        width: 100%;
        display: block;
        margin: 0 auto;

    }

    .lembar .table table,
    .head {
        border-collapse: collapse;
        width: 100%;
    }

    .lembar .table td,
    .lembar .table th,
    .head td,
    .head th {
        border: 1px solid black;
    }

    .lembar .table th {
        text-align: center;
        font-size: 10px;
        font-weight: bold;
    }

    .head th {
        text-align: center;
        font-size: 10px;
        font-weight: bold;
    }

    .head {
        margin-bottom: 20px;
    }

    .lembar .table {
        font-size: 10px;
        margin-bottom: 10px;
    }

    .lembar .table td {
        font-size: 10px;
    }

    .head td {
        font-size: 7px;
        font-weight: bold;
    }

    .lembar p,
    .lembar li {
        text-align: justify;
        font-size: 10px;
        margin-bottom: 10px;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background: #ffffff;">
                <div class="lembar p-5 m-2 bg-white" style="min-height: 600px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
                    <h5 style="font-weight:bold;text-align:center;margin-bottom: 30px;font-size:20px;">INSTRUKSI KERJA(IK)<br>PJB-IMS 2.0</h5>
                    <h5 class="judul text-info" style="font-weight:bold;text-align:center;margin-bottom: 30px;font-size:18px"></h5>

                    <table style="margin-bottom: 50px;font-weight:bold;font-size:11px">
                        <tr>
                            <td>NO. DOKUMEN</td>
                            <td>&emsp;:</td>
                            <td>&ensp;<div class="no-ik d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>TANGGAL DITETAPKAN</td>
                            <td>&emsp;:</td>
                            <td>&ensp;<div class="ditetapkan d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>TANGGAL DIPERBARUI</td>
                            <td>&emsp;:</td>
                            <td>&ensp;<div class="diperbarui d-inline">
                            </td>
                        </tr>
                        <tr>
                            <td>REVISI</td>
                            <td>&emsp;:</td>
                            <td>&ensp;<div class="no-revisi d-inline">
                            </td>
                        </tr>
                    </table>
                    <figure class="table">
                        <table style="text-align:center;font-size:10px">
                            <tr>
                                <th>Disusun,</th>
                                <th>Disetujui,</th>
                                <th>Disahkan,</th>

                            </tr>
                            <tr style="height: 50px;">
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th style="width: 33%;">
                                    <div class="disusun"></div>
                                </th>
                                <th style="width: 33%;">
                                    <div class="manajer"></div>
                                </th>
                                <th style="width: 33%;">General Manager</th>
                            </tr>
                        </table>
                    </figure>
                </div>
                <div class="lembar p-3 m-2 bg-white" style="min-height: 600px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
                    <table class="head">
                        <tr>
                            <th rowspan="4" style="width:12%;"><img src="<?= base_url('/pjb-logo.png'); ?>" style="width:40px; height:40px;"></th>
                            <th>PT PEMBANGKITAN JAWA BALI</th>
                            <td style="white-space: nowrap;">
                                No.Dokumen&emsp;: <div class="no-ik d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <th style="white-space: nowrap;width: 50%;">PJB INTERGRATED MANAGEMENT SYSTEM</th>
                            <td>
                                Revisi&emsp;&emsp;&emsp;&emsp;&ensp; : <div class="no-revisi d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <th rowspan="2">INSTRUKSI KERJA<br>
                                <div class="judul"></div>
                            </th>
                            <td>
                                Tanggal Terbit : <div class="diterbitkan d-inline">
                            </td>
                        </tr>
                        <tr>
                            <td>Halaman&emsp;&emsp;&emsp;: i dari i</td>
                        </tr>
                    </table>
                    <p style="font-weight:bold;font-size:11px;margin:10px;text-align:center;">DAFTAR PERUBAHAN DOKUMEN</p>
                    <div class="revisi"></div>
                </div>

                <div class="lembar p-3 m-2 bg-white" style="min-height: 600px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
                    <table class="head">
                        <tr>
                            <th rowspan="4" style="width:12%;"><img src="<?= base_url('/pjb-logo.png'); ?>" style="width:40px; height:40px;"></th>
                            <th>PT PEMBANGKITAN JAWA BALI</th>
                            <td style="white-space: nowrap;">
                                No.Dokumen&emsp;: <div class="no-ik d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <th style="white-space: nowrap;width: 50%;">PJB INTERGRATED MANAGEMENT SYSTEM</th>
                            <td>
                                Revisi&emsp;&emsp;&emsp;&emsp;&ensp; : <div class="no-revisi d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <th rowspan="2">INSTRUKSI KERJA<br>
                                <div class="judul"></div>
                            </th>
                            <td>
                                Tanggal Terbit : <div class="diterbitkan d-inline">
                            </td>
                        </tr>
                        <tr>
                            <td>Halaman&emsp;&emsp;&emsp;: 1 dari 7</td>
                        </tr>
                    </table>
                    <p style="font-weight:bold;font-size:11px;margin-bottom:2px">Tujuan</p>
                    <div class="tujuan"></div>
                    <p style="font-weight:bold;font-size:11px;margin-bottom:2px">Ruang Lingkup</p>
                    <div class="ruang-lingkup"></div>
                    <p style="font-weight:bold;font-size:11px;margin-bottom:2px">Definisi</p>
                    <div class="definisi"></div>
                </div>

                <div class="lembar p-3 m-2 bg-white" style="min-height: 600px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
                    <table class="head">
                        <tr>
                            <th rowspan="4" style="width:12%;"><img src="<?= base_url('/pjb-logo.png'); ?>" style="width:40px; height:40px;"></th>
                            <th>PT PEMBANGKITAN JAWA BALI</th>
                            <td style="white-space: nowrap;">
                                No.Dokumen&emsp;: <div class="no-ik d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <th style="white-space: nowrap;width: 50%;">PJB INTERGRATED MANAGEMENT SYSTEM</th>
                            <td>
                                Revisi&emsp;&emsp;&emsp;&emsp;&ensp; : <div class="no-revisi d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <th rowspan="2">INSTRUKSI KERJA<br>
                                <div class="judul"></div>
                            </th>
                            <td>
                                Tanggal Terbit : <div class="diterbitkan d-inline">
                            </td>
                        </tr>
                        <tr>
                            <td>Halaman&emsp;&emsp;&emsp;: 2 dari 7</td>
                        </tr>
                    </table>
                    <p style="font-weight:bold;font-size:11px;margin-bottom:2px">A&emsp;Dokumen Terkait</p>
                    <p style="font-weight:bold;font-size:11px;margin-bottom:2px">A.1&emsp;Dokumen Pendukung</p>
                    <div class="pendukung"></div>
                    <p style="font-weight:bold;font-size:11px;margin-bottom:2px">A.2&emsp;Dokumen Referensi</p>
                    <div class="referensi"></div>
                    <p style="font-weight:bold;font-size:11px;margin-bottom:2px">A.3&emsp;Dokumen Perizinan</p>
                    <div class="perizinan"></div>
                    <p style="font-weight:bold;font-size:11px;margin-bottom:2px">A.4&emsp;Dokumen Teknik</p>
                    <div class="teknik"></div>
                </div>

                <div class="lembar p-3 m-2 bg-white" style="min-height: 600px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
                    <table class="head">
                        <tr>
                            <th rowspan="4" style="width:12%;"><img src="<?= base_url('/pjb-logo.png'); ?>" style="width:40px; height:40px;"></th>
                            <th>PT PEMBANGKITAN JAWA BALI</th>
                            <td style="white-space: nowrap;">
                                No.Dokumen&emsp;: <div class="no-ik d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <th style="white-space: nowrap;width: 50%;">PJB INTERGRATED MANAGEMENT SYSTEM</th>
                            <td>
                                Revisi&emsp;&emsp;&emsp;&emsp;&ensp; : <div class="no-revisi d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <th rowspan="2">INSTRUKSI KERJA<br>
                                <div class="judul"></div>
                            </th>
                            <td>
                                Tanggal Terbit : <div class="diterbitkan d-inline">
                            </td>
                        </tr>
                        <tr>
                            <td>Halaman&emsp;&emsp;&emsp;: 3 dari 7</td>
                        </tr>
                    </table>
                    <p style="font-weight:bold;font-size:11px;margin-bottom:2px">B&emsp;Sumber Daya</p>
                    <p style="font-weight:bold;font-size:11px;margin-bottom:2px">B.1&emsp;SDM</p>
                    <div class="sdm"></div>
                    <p style="font-weight:bold;font-size:11px;margin-bottom:2px">B.2&emsp;Tools, APD dan Peralatan Kerja lainnya</p>
                    <div class="tools"></div>
                    <p style="font-weight:bold;font-size:11px;margin-bottom:2px">B.2&emsp;Material</p>
                    <div class="material"></div>
                </div>

                <div class="lembar p-3 m-2 bg-white" style="min-height: 600px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
                    <table class="head">
                        <tr>
                            <th rowspan="4" style="width:12%;"><img src="<?= base_url('/pjb-logo.png'); ?>" style="width:40px; height:40px;"></th>
                            <th>PT PEMBANGKITAN JAWA BALI</th>
                            <td style="white-space: nowrap;">
                                No.Dokumen&emsp;: <div class="no-ik d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <th style="white-space: nowrap;width: 50%;">PJB INTERGRATED MANAGEMENT SYSTEM</th>
                            <td>
                                Revisi&emsp;&emsp;&emsp;&emsp;&ensp; : <div class="no-revisi d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <th rowspan="2">INSTRUKSI KERJA<br>
                                <div class="judul"></div>
                            </th>
                            <td>
                                Tanggal Terbit : <div class="diterbitkan d-inline">
                            </td>
                        </tr>
                        <tr>
                            <td>Halaman&emsp;&emsp;&emsp;: 4 dari 7</td>
                        </tr>
                    </table>
                    <p style="font-weight:bold;font-size:11px;margin-bottom:2px">C&emsp;Identifikasi Risiko</p>
                    <p style="font-weight:bold;font-size:11px;margin-bottom:2px">C.1&emsp;Identifikasi Risiko</p>
                    <div class="identifikasi"></div>
                    <p style="font-weight:bold;font-size:11px;margin-bottom:2px">C.2&emsp;Mitigasi Risiko</p>
                    <div class="mitigasi"></div>
                </div>

                <div class="lembar p-3 m-2 bg-white" style="min-height: 600px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
                    <table class="head">
                        <tr>
                            <th rowspan="4" style="width:12%;"><img src="<?= base_url('/pjb-logo.png'); ?>" style="width:40px; height:40px;"></th>
                            <th>PT PEMBANGKITAN JAWA BALI</th>
                            <td style="white-space: nowrap;">
                                No.Dokumen&emsp;: <div class="no-ik d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <th style="white-space: nowrap;width: 50%;">PJB INTERGRATED MANAGEMENT SYSTEM</th>
                            <td>
                                Revisi&emsp;&emsp;&emsp;&emsp;&ensp; : <div class="no-revisi d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <th rowspan="2">INSTRUKSI KERJA<br>
                                <div class="judul"></div>
                            </th>
                            <td>
                                Tanggal Terbit : <div class="diterbitkan d-inline">
                            </td>
                        </tr>
                        <tr>
                            <td>Halaman&emsp;&emsp;&emsp;: 5 dari 7</td>
                        </tr>
                    </table>
                    <p style="font-weight:bold;font-size:11px;margin-bottom:2px">D&emsp;Metode Pengukuran & Parameter</p>
                    <div class="parameter"></div>
                </div>

                <div class="lembar p-3 m-2 bg-white" style="min-height: 600px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
                    <table class="head">
                        <tr>
                            <th rowspan="4" style="width:12%;"><img src="<?= base_url('/pjb-logo.png'); ?>" style="width:40px; height:40px;"></th>
                            <th>PT PEMBANGKITAN JAWA BALI</th>
                            <td style="white-space: nowrap;">
                                No.Dokumen&emsp;: <div class="no-ik d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <th style="white-space: nowrap;width: 50%;">PJB INTERGRATED MANAGEMENT SYSTEM</th>
                            <td>
                                Revisi&emsp;&emsp;&emsp;&emsp;&ensp; : <div class="no-revisi d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <th rowspan="2">INSTRUKSI KERJA<br>
                                <div class="judul"></div>
                            </th>
                            <td>
                                Tanggal Terbit : <div class="diterbitkan d-inline">
                            </td>
                        </tr>
                        <tr>
                            <td>Halaman&emsp;&emsp;&emsp;: 6 dari 7</td>
                        </tr>
                    </table>
                    <p style="font-weight:bold;font-size:11px;margin-bottom:2px">E&emsp;Detail Aktivitas</p>
                    <div class="detail-aktivitas"></div>
                </div>

                <div class="lembar p-3 m-2 bg-white" style="min-height: 600px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
                    <table class="head">
                        <tr>
                            <th rowspan="4" style="width:12%;"><img src="<?= base_url('/pjb-logo.png'); ?>" style="width:40px; height:40px;"></th>
                            <th>PT PEMBANGKITAN JAWA BALI</th>
                            <td style="white-space: nowrap;">
                                No.Dokumen&emsp;: <div class="no-ik d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <th style="white-space: nowrap;width: 50%;">PJB INTERGRATED MANAGEMENT SYSTEM</th>
                            <td>
                                Revisi&emsp;&emsp;&emsp;&emsp;&ensp; : <div class="no-revisi d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <th rowspan="2">INSTRUKSI KERJA<br>
                                <div class="judul"></div>
                            </th>
                            <td>
                                Tanggal Terbit : <div class="diterbitkan d-inline">
                            </td>
                        </tr>
                        <tr>
                            <td>Halaman&emsp;&emsp;&emsp;: 7 dari 7</td>
                        </tr>
                    </table>
                    <p style="font-weight:bold;font-size:11px;margin-bottom:2px">F&emsp;Formulir</p>
                    <div class="formulir"></div>
                </div>

                <div class="lembar p-3 m-2 bg-white" style="min-height: 600px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
                    <table class="head">
                        <tr>
                            <th rowspan="4" style="width:12%;"><img src="<?= base_url('/pjb-logo.png'); ?>" style="width:40px; height:40px;"></th>
                            <th>PT PEMBANGKITAN JAWA BALI</th>
                            <td style="white-space: nowrap;">
                                No.Dokumen&emsp;: <div class="no-ik d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <th style="white-space: nowrap; width: 45%">PJB INTERGRATED MANAGEMENT SYSTEM</th>
                            <td>
                                Revisi&emsp;&emsp;&emsp;&emsp;&ensp; : <div class="no-revisi d-inline"></div>
                            </td>
                        </tr>
                        <tr>
                            <th rowspan="2">INSTRUKSI KERJA<br>
                                <div class="judul"></div>
                            </th>
                            <td>
                                Tanggal Terbit : <div class="diterbitkan d-inline">
                            </td>
                        </tr>
                        <tr>
                            <td>Halaman&emsp;&emsp;&emsp;: 1 dari 1</td>
                        </tr>
                    </table>
                    <div style="margin-bottom:2px" class="lampiran"></div>
                </div>

            </div>
            <div class="modal-footer">
                <div class="d-grid gap-1 d-md-flex justify-content-md-end">
                    <form action="<?= base_url('mrk/docx'); ?>" method="POST" class="me-md-2">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="slug" id="docx">
                        <button type="submit" class="btn btn-primary disabled">Docx</button>
                    </form>
                    <form action="<?= base_url('mrk/pdf'); ?>" method="POST" class="me-md-2">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="slug" id="pdf">
                        <button type="submit" class="btn btn-danger disabled">PDF</button>
                    </form>
                    <form action="<?= base_url('mrk/cetak'); ?>" method="POST" class="me-md-2">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="slug" id="cetak">
                        <button type="submit" class="btn btn-secondary">Cetak</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#staticBackdrop').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#pdf').attr("value", div.data('slug'));
            modal.find('#cetak').attr("value", div.data('slug'));
            modal.find('#docx').attr("value", div.data('slug'));
            modal.find('.judul').html(div.data('judul'));
            modal.find('.no-ik').html(div.data('no_ik'));
            modal.find('.ditetapkan').html(div.data('tgl_ditetapkan'));
            modal.find('.diperbarui').html(div.data('tgl_diperbarui'));
            modal.find('.diterbitkan').html(div.data('tgl_terbit'));
            modal.find('.no-revisi').html(div.data('no_revisi'));
            modal.find('.revisi').html(div.data('revisi'));
            modal.find('.manajer').html(div.data('manajer'));
            modal.find('.disusun').html(div.data('disusun'));
            modal.find('.tujuan').html(div.data('tujuan'));
            modal.find('.ruang-lingkup').html(div.data('lingkup'));
            modal.find('.definisi').html(div.data('definisi'));
            modal.find('.pendukung').html(div.data('pendukung'));
            modal.find('.referensi').html(div.data('referensi'));
            modal.find('.perizinan').html(div.data('perizinan'));
            modal.find('.teknik').html(div.data('teknik'));
            modal.find('.sdm').html(div.data('sdm'));
            modal.find('.tools').html(div.data('tools'));
            modal.find('.material').html(div.data('material'));
            modal.find('.identifikasi').html(div.data('identifikasi'));
            modal.find('.mitigasi').html(div.data('mitigasi'));
            modal.find('.parameter').html(div.data('parameter'));
            modal.find('.detail-aktivitas').html(div.data('aktivitas'));
            modal.find('.formulir').html(div.data('formulir'));
            modal.find('.lampiran').html(div.data('lampiran'));
        });
    });
</script>