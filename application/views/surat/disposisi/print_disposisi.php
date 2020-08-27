<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <title>Disposisi</title>
    <style type="text/css">
        html {
            font-family: "Verdana, Arial";
        }

        .title {
            text-align: center;
            font-size: 13px;
            padding-bottom: 5px;
            border-bottom: 1px dashed;
        }

        .head {
            margin-top: 5px;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid;
        }

        /* table {
            width: 100%;
            font-size: 12px;

        } */

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 5px;
        }

        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }

        .ribbon {
            position: relative;
            top: -16px;
            right: -706px;
        }

        .column {
            float: left;
            width: 50%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body>
    <?php
    $imageBase64 = base64_encode($lembaga->logo);
    $base64 = 'data:image/' . $lembaga->conten_type . ';base64,' . $imageBase64;
    ?>
    <img src="<?php echo $base64 ?>" class="logodisp" style="position: absolute; idth: 110px; height: 110px; margin: 0 0 0 1rem;">

    <div align="center">
        <span style="line-height: 1.6; font-size: 16px;">
            <?= $lembaga->lembaga ?>
        </span>
        <span style="line-height: 1.6; font-weight: bold;  font-size: 16px;">
            <br><?= $lembaga->bidang ?>
        </span>
        <span style="line-height: 1.6; font-size: 12px;">
            <br><?= $lembaga->alamat ?>
            <br>Telp : <?= $lembaga->telp ?>, Email : <?= $lembaga->email ?>
            <br>Website : <?= $lembaga->website ?>
        </span>
    </div>

    <hr class="line-title">
    <br>
    <div align="center">
        <span style="font-weight: bold; font-size: 14px;">LEMBAR DISPOSISI</span>
    </div>
    <br>
    <br>
    <table>
        <tr>
            <td align="left" style="width: 20%; font-size: 14px; border-right: none;">Indeks Berkas</td>
            <td><?= $suratMasuk->indeks_surat ?></td>
            <td align="right">Kode</td>
            <td style=""><?= $suratMasuk->kode ?></td>
        </tr>
        <tr>
            <td align="left">Tanggal Surat</td>
            <td colspan="3"><?= $suratMasuk->tgl_surat ?></td>
        </tr>
        <tr>
            <td align="left">Nomor Surat</td>
            <td colspan="3"><?= $suratMasuk->no_surat ?></td>
        </tr>
        <tr>
            <td align="left">Asal Surat</td>
            <td colspan="3"><?= $suratMasuk->asal_surat ?></td>
        </tr>
        <tr>
            <td align="left">Isi Ringkas</td>
            <td colspan="3"><?= $suratMasuk->isi_surat ?></td>
        </tr>
        <tr>
            <td align="left" style="width: 20%; font-size: 14px;">Diterima Tanggal</td>
            <td><?= $suratMasuk->tgl_terima ?></td>
            <td align="right">No. Agenda</td>
            <td><?= $suratMasuk->no_agenda ?></td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td align="left" style="width: 63%;">Isi Disposisi :</td>
            <td align="left">Diteruskan Pada :</td>
        </tr>
        <tr>
            <td align="left" style="width: 20%;  height: 7%; vertical-align: right; font-size: 14px;"><?= $suratMasuk->isi_disposisi ?></td>
            <td rowspan="5" align="left" style="vertical-align: right;"><?= $suratMasuk->tujuan ?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 14px;">Batas Waktu : <?= $suratMasuk->batas_waktu ?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 14px;">Sifat : <?= $suratMasuk->sifat ?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 14px;">Catatan :</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 14px; vertical-align: right; height: 7%;"> <?= $suratMasuk->catatan ?></td>
        </tr>
    </table>
    <br>
    <br>
    <table style="font-size: 14px; border: 0px">
        <tr style="font-size: 14px; border: 0px">
            <td style="width: 63%; border: 0px"></td>
            <td align="left" style="font-size: 14px; border: 0px">Kepala Bidang</td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <br>
    <table style="font-size: 14px; border: 0px">
        <tr style="font-size: 14px; border: 0px">
            <td style="width: 63%; border: 0px"></td>
            <td align="left" style="font-size: 14px; border: 0px"><?= $lembaga->nama_atasan ?></td>
        </tr>
        <tr style="font-size: 14px; border: 0px">
            <td style="width: 63%; border: 0px"></td>
            <td align="left" style=" font-size: 14px; border: 0px">NIP : <?= $lembaga->nip ?></td>
        </tr>
    </table>
</body>

</html>