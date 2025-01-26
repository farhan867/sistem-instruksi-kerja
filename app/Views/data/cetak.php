<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css'); ?>">
    <title>PJB UBJOM PLTMG ARUN</title>
    <style>
        /* General styles */
        @media print {
            .print {
                display: none;
            }
        }

        figure {
            margin: 0;
        }

        .table img {
            width: 90px;
            height: 85px;
            padding: 2px
        }

        img {
            width: 100%;
            display: block;
            margin: 0 auto;
        }

        .page p {
            text-align: justify;
            font-size: 14px;
        }

        .page p:first-child {
            margin-top: 0;
        }

        .subjudul {
            font-weight: bold;
            font-size: 18px;
        }

        .header {
            width: 100%;
            margin-bottom: 20px;
        }

        .header td {
            width: 40%;
        }

        .table table {
            width: 100%;
        }

        .table td,
        .table th {
            border: 1px solid black;
            padding: 0 10px 0 10px;
        }

        .table th {
            text-align: center;
            font-size: 14px;
        }

        .table td {
            font-size: 12px;
        }

        h1,
        h2,
        h4,
        h4,
        h5 {
            font-weight: bold;
            font-size: 35px;
        }


        /* Printing styles */
        @page {
            size: A4;
        }
    </style>
</head>

<body onload="window.print()">
    <h1 style="margin-bottom: 80px;text-align:center;font-weight: bold;font-size: 40px;">INSTRUKSI KERJA(IK)<br>PJB-IMS 2.0</h1>
    <div class="text-info" style="font-weight: bold;text-align:center;margin-bottom: 50px;font-size:35px;"><?= $data['judul']; ?></div>

    <table class="subjudul" style="margin-bottom: 70px;">
        <tbody>
            <tr>
                <th>NO. DOKUMEN</th>
                <th>&emsp;:&emsp;</th>
                <th><?= $data['no_ik']; ?></th>
            </tr>
            <tr>
                <th>TANGGAL DITETAPKAN</th>
                <th>&emsp;:&emsp;</th>
                <th><?= $data['tgl_ditetapkan']; ?></th>
            </tr>
            <tr>
                <th>TANGGAL DIPERBARUI</th>
                <th>&emsp;:&emsp;</th>
                <th><?= $data['tgl_diperbarui']; ?></th>
            </tr>
            <tr>
                <th>REVISI</th>
                <th>&emsp;:&emsp;</th>
                <th><?= $data['no_revisi']; ?></th>
            </tr>
        </tbody>
    </table>


    <figure class="table">
        <table>
            <tbody>
                <tr>
                    <th style="width:33%;"><strong>Disusun,</strong></th>
                    <th style="width:33%;"><strong>Disetujui,</strong></th>
                    <th style="width:33%;"><strong>Disahkan,</strong></th>
                </tr>
                <tr style="height: 100px;">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <th><strong><?= $data['jabatan']; ?></strong></th>
                    <th><strong>Manajer <?= $data['nama']; ?></strong></th>
                    <th><strong>General Manager</strong></td>
                </tr>
            </tbody>
        </table>
    </figure>



    <div style="page-break-after: always;"></div>
    <table style="width:100%;">
        <thead class="header">
            <tr>
                <td>
                    <figure class="table">
                        <table>
                            <tr>
                                <th rowspan="4">
                                    <figure class="image"><img src="<?= base_url('/pjb-logo.png'); ?>"></figure>
                                </th>
                                <th><strong>PT PEMBANGKITAN JAWA BALI</strong></th>
                                <td style="white-space: nowrap;">Nomor Dokumen&nbsp;: <?= $data['no_ik']; ?></td>
                            </tr>
                            <tr>
                                <th style="white-space: nowrap;"><strong>PJB INTEGRATED MANAGEMENT SYSTEM</strong></th>
                                <td>Revisi&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;: <?= $data['no_revisi']; ?></td>
                            </tr>
                            <tr>
                                <th rowspan="2">
                                    <strong>INSTRUKSI KERJA</strong><br>
                                    <strong>PENGUMPULAN DAN PENGOLAHAN DATA FAKTOR-FAKTOR OPERASI</strong>
                                </th>
                                <td>Tanggal Terbit &emsp;&ensp;: <?= $data['tgl_terbit']; ?></td>
                            </tr>
                            <tr>
                                <td>Halaman&emsp;&emsp;&emsp;&emsp;:</td>
                            </tr>
                        </table>
                    </figure>
                </td>
            </tr>
        </thead>

        <tbody class="page">
            <tr>
                <td>

                    <div class=subjudul style="text-align:center;">DAFTAR PERUBAHAN DOKUMEN</div>
                    <?= $data['revisi']; ?>
                    <div style="page-break-after: always;"></div>
                    <div class=subjudul>Tujuan</div>
                    <?= $data['tujuan']; ?>
                    <div class=subjudul>Ruang Lingkup<br></div>
                    <?= $data['ruang_lingkup']; ?>
                    <div class=subjudul>Definisi</div>
                    <?= $data['definisi']; ?>
                    <div style="page-break-after: always;"></div>
                    <div class=subjudul>A. Dokumen Terkait</div>
                    <div class=subjudul>A1. Dokumen Pendukung</div>
                    <?= $data['terkait_pendukung']; ?>
                    <div class=subjudul>A2. Dokumen Referensi</div>
                    <?= $data['terkait_referensi']; ?>
                    <div class=subjudul>A3. Dokumen Perizinan</div>
                    <?= $data['terkait_perizinan']; ?>
                    <div class=subjudul>A4. Dokumen/Data Teknik</div>
                    <?= $data['terkait_teknik']; ?>
                    <div style="page-break-after: always;"></div>
                    <div class=subjudul>B. Sumber Daya</div>
                    <div class=subjudul>B.1 SDM</div>
                    <?= $data['sumber_sdm']; ?>
                    <div class=subjudul>B2. Tools, APD dan Peralatan Kerja lainnya</div>
                    <?= $data['sumber_tools']; ?>
                    <div class=subjudul>B.3 Material</div>
                    <?= $data['sumber_material']; ?>
                    <div style="page-break-after: always;"></div>
                    <div class=subjudul>C. Identifikasi Risiko</div>
                    <div class=subjudul>C.1 Identifikasi</div>
                    <?= $data['risiko_identifikasi']; ?>
                    <div class=subjudul>C.2 Mitigasi Resiko</div>
                    <?= $data['risiko_mitigasi']; ?>
                    <div style="page-break-after: always;"></div>
                    <div class=subjudul>D. Metode Pengukuran & Parameter</div>
                    <?= $data['parameter']; ?>
                    <div style="page-break-after: always;"></div>
                    <div class=subjudul>E. Detail Aktivitas</div>
                    <?= $data['detail_aktivitas']; ?>
                    <div style="page-break-after: always;"></div>
                    <div class=subjudul>F. Formulir</div>
                    <ul>
                        <?= $data['formulir']; ?>
                    </ul>
                    <div style="page-break-after: always;"></div>
                    <?= $data['lampiran']; ?>
                </td>
            </tr>
        </tbody>
        <!-- <tfoot class="report-footer">
        <tr>
            <td class="report-footer-cell">
                <div class="footer-info">
                    fotter
                </div>
            </td>
        </tr>
    </tfoot> -->
    </table>
</body>

</html>