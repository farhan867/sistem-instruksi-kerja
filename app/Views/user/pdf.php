<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        @page {
            margin: 180px 50px 50px 50px;
        }

        #header {
            position: fixed;
            left: 0px;
            top: -160px;
            right: 0px;
            height: 150px;
            text-align: center;
        }

        .table table {
            width: 100%;
        }

        .table table,
        .table td,
        .table th {
            border: 1px solid black;
            font-size: 12px;
        }

        #header .page:before {
            content: "Halaman : "counter(page, upper-roman);
        }
    </style>
    <div id="header">
        <figure class="table">
            <table>
                <tr>
                    <td rowspan="4" style="width:10%">
                        <figure class="image"><img style="width:10px" src="<?= base_url('/pjb-logo.png'); ?>"></figure>
                    </td>
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
                    <td class="page"></td>
                </tr>
            </table>
        </figure>
    </div>
    <div class=subjudul style="text-align:center;">DAFTAR PERUBAHAN DOKUMEN</div>
    <?= $data['revisi']; ?>
    <div style="page-break-after: always;"></div>
    <div id="content">
        <div class=subjudul style="text-align:center;">DAFTAR PERUBAHAN DOKUMEN</div>
        <?= $data['revisi']; ?>
    </div>
</body>

</html>