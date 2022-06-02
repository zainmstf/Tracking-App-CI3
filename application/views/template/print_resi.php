<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/feather/feather.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/mdi/css/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/ti-icons/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/typicons/typicons.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/simple-line-icons/css/simple-line-icons.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/vendor/boxicons/css/boxicons.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/select2/select2.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css') ?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/dataTable/css/datatables.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/vertical-layout-light/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/vertical-layout-light/custom.css') ?>">
    <!-- endinject -->
    <link rel="shortcut icon" href="#" />
    <style>
        .table th,
        .table td {
            white-space: normal;
        }

        .tg {
            border-collapse: collapse;
            border-color: #ccc;
            border-spacing: 0;
        }

        .tg td {
            background-color: #fff;
            border-color: #ccc;
            border-style: solid;
            border-width: 1px;
            color: #333;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg th {
            background-color: #f0f0f0;
            border-color: #ccc;
            border-style: solid;
            border-width: 1px;
            color: #333;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg .tg-72fj {
            border-color: inherit;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            vertical-align: middle
        }

        .tg .tg-0pky {
            border-color: inherit;
            text-align: left;
            vertical-align: top
        }

        .tg .tg-73a0 {
            border-color: inherit;
            font-size: 12px;
            text-align: left;
            vertical-align: top
        }
    </style>
</head>

<body>

    <!-- partial -->
    <table class="tg" style="table-layout: fixed; width: 590px">
        <colgroup>
            <col style="width: 280px">
            <col style="width: 310px">
        </colgroup>
        <thead>
            <tr>
                <th class="tg-72fj" rowspan="2"><br>PT. Aura Abadi Logistik<br>Jasa Pengiriman<br></th>
                <th class="tg-0pky text-center"><strong><?= $pengiriman[0]->no_resi; ?></strong></th>
            </tr>
            <tr>
                <th class="tg-73a0">Order Date : <?php echo date("d/m/Y H:s:i"); ?><br>Asal : <?= $pengiriman[0]->asal; ?><br>Tujuan : <?= $pengiriman[0]->tujuan; ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tg-73a0"><span style="font-weight:bold">Package:</span><br>Type Item : <?= $pengiriman[0]->jenis_paket; ?><br> Item Name: <?= $pengiriman[0]->nama_barang; ?><br> Weight : <?= $pengiriman[0]->berat; ?> Kg<br> Qty : <?= $pengiriman[0]->qty; ?></td>
                <td class="tg-73a0"><span style="font-weight:bold">Sender:</span><br><?= $pengiriman[0]->nama_pengirim; ?>, <?= $pengiriman[0]->telp_pengirim; ?><br><?= $pengiriman[0]->alamat_pengirim; ?><br><?= $pengiriman[0]->kode_pos_pengirim; ?><br><br><span style="font-weight:bold">Receipent:</span><br><?= $pengiriman[0]->nama_penerima; ?>, <?= $pengiriman[0]->telp_penerima; ?><br><?= $pengiriman[0]->alamat_penerima; ?><br><?= $pengiriman[0]->kode_pos_penerima; ?><br><br></td>
            </tr>
            <tr>
                <td class="tg-73a0"><span style="font-weight:bold">Note :</span><br><?= $pengiriman[0]->keterangan; ?></td>
                <td class="tg-73a0" id="totals"></td>
            </tr>
        </tbody>
    </table>
    <!-- container-scroller -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <!-- plugins:js -->

    <script src="<?php echo base_url('assets/vendor/js/vendor.bundle.base.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/dataTable/js/datatables.min.js') ?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/progressbar.js/progressbar.min.js') ?>"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->

    <!-- endinject -->

    <script src="<?php echo base_url('assets/js/Chart.roundedBarCharts.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/select2/select2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/select2.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/moment.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
    <script>
        let html, a, b, c;
        a = rupiah(<?= $pengiriman[0]->biaya_pengiriman; ?>);
        b = rupiah(<?= $pengiriman[0]->asuransi; ?>);
        c = rupiah(<?= $pengiriman[0]->total_harga; ?>);
        html = `Shipping Cost : ${a}<br>Insurance :${b}<br><span style="font-weight:bold">Total Fee : ${c}</span>`;
        $('#totals').html(html);
        window.print();
    </script>
</body>

</html>