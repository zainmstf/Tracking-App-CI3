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
    </style>
</head>

<body>

    <!-- partial -->
    <div class="card-body">
        <div class="d-sm-flex justify-content-between align-items-start">
            <div>
                <h4 class="card-title card-title-dash"><?= $type; ?></h4>
                <P class="card-subtitle card-subtitle-dash"><?php echo $title; ?></P>
            </div>
        </div>
        <table class="table select-table text-center" id="tableData">
            <thead>
                <tr>
                    <th width="10%">Resi Number</th>
                    <th width="15%">Package</th>
                    <th width="15%">Sender</th>
                    <th width="15%">Receipent</th>
                    <th width="15%">Total Fee</th>
                    <th width="5%">Status</th>
                    <th width="10%">Order Date</th>
                    <th width="10%">Receive Date</th>
                    <th width="5%">Admin</th>
                    <th width="5%">Kurir</th>
                </tr>
            </thead>
            <tbody id="tableDataTable">
            </tbody>
            <tfoot id="tableDataFoot">
            </tfoot>
        </table>
    </div>
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
        getData();

        function getData() {
            $.ajax({
                url: 'http://localhost/Tracking-App-CI3/admin/<?= $dataFunc; ?>',
                type: "GET",
                dataType: "json",
                success: function(response) {
                    let i;
                    let html = "";
                    for (i = 0; i < response.length; i++) {
                        if (response[i].tgl_diterima == null) {
                            response[i].tgl_diterima = "";
                        }
                        if (response[i].keterangan == " ") {
                            response[i].keterangan = "Tidak ada";
                        }
                        if (
                            response[i].status == "On Process" ||
                            response[i].status == "On Delivery"
                        ) {
                            status = "warning";
                        }
                        if (response[i].status == "Delivered") {
                            status = "success";
                        }
                        if (response[i].status == "Cancelled") {
                            status = "danger";
                        }
                        let biaya_pengiriman = rupiah(response[i].biaya_pengiriman);
                        let asuransi = rupiah(response[i].asuransi);
                        let total = rupiah(response[i].total_harga);
                        html += `<tr>
					<td>
					<strong>${response[i].no_resi}</strong>
					</td>
                    <td>
					<p class="text-start"><strong>${response[i].nama_barang}</strong></p>
                    <p class="text-start">Type Item : ${response[i].jenis_paket}</p>
                    <p class="text-start">Weight : ${response[i].berat} Kg</p>
                    <p class="text-start">Qty : ${response[i].qty}</p>
					</td>
                    <td>
					<p class="text-start"><strong>${response[i].nama_pengirim}</strong></p>
                    <p class="text-start">${response[i].alamat_pengirim}</p>
                    <p class="text-start">${response[i].kode_pos_pengirim}</p>
                    <p class="text-start">Telp  : ${response[i].telp_pengirim}</p>
					</td>
                    <td>
					<p class="text-start"><strong>${response[i].nama_penerima}</strong></p>
                    <p class="text-start">${response[i].alamat_penerima}</p>
                    <p class="text-start">${response[i].kode_pos_penerima}</p>
                    <p class="text-start">Telp  : ${response[i].telp_penerima}</p>
					</td>
                    <td>
                    <p class="text-start">Shipping Cost : ${biaya_pengiriman}</p>
                    <p class="text-start">Insurance : ${asuransi}</p>
                    <p class="text-start">-------------------- x ${response[i].qty} qty</p>
                    <p class="text-start"><strong>${total}</strong></p>
					</td>
                    <td>
					<div class="badge badge-${status}">${response[i].status}</div>
					</td>
                    <td>
					${response[i].tgl_order}
					</td>
                     <td>
					${response[i].tgl_diterima}
					</td>
                    <td>
					${response[i].username}
                    </td>
                    <td>
					${response[i].kurir}
                    </td>
				</tr>`;
                    }
                    $.ajax({
                        url: `http://localhost/Tracking-App-CI3/admin/<?= $sumTime; ?>`,
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            let html;
                            let total = rupiah(response[0].TotalOrdered);
                            html += ` <tr>
                    	<td colspan="4" class="text-end"><strong><h5>Total</strong></h5></td>
                    	<td><h5><strong>${total}</strong></h5></td>
                    </tr>`;
                            $("#tableDataFoot").html(html);
                            setTimeout(window.print(), 30000)
                        },
                    });
                    $("#tableDataTable").html(html);

                },
            });
        }
    </script>
</body>

</html>