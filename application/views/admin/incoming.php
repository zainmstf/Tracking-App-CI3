<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Report</a>
                            </li>
                        </ul>
                        <div class="btn-wrapper">
                            <a href="Incoming_report/allTime" class="btn btn-otline-dark"><i class="icon-printer"></i> Print All</a>
                            <a href="Incoming_report/thisMonth" class="btn btn-otline-dark"><i class="icon-printer"></i> Print This Month</a>
                            <a href="Incoming_report/thisWeek" class="btn btn-otline-dark"><i class="icon-printer"></i> Print This Week</a>
                            <a href="Incoming_report/thisDay" class="btn btn-primary text-white me-0"><i class="icon-printer"></i> Print This Day</a>
                        </div>
                    </div>
                    <div class="tab-content tab-content-basic">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                            <div class="row">
                                <div class="col-sm-12 d-flex flex-column">
                                    <div class="row flex-grow">
                                        <div class="col-12 grid-margin stretch-card">
                                            <div class="card card-rounded">
                                                <div class="card-body">
                                                    <div class="d-sm-flex justify-content-between align-items-start">
                                                        <div>
                                                            <h4 class="card-title card-title-dash">Incoming Report Orders</h4>
                                                            <P class="card-subtitle card-subtitle-dash">Shift + Scroll for details item</P>
                                                        </div>
                                                    </div>

                                                    <div id="notfound"></div>
                                                    <div class="table-responsive mt-1">
                                                        <table class="table select-table text-center" id="tableData">
                                                            <thead>
                                                                <tr>
                                                                    <th>Resi Number</th>
                                                                    <th>Package</th>
                                                                    <th>Sender</th>
                                                                    <th>Receipent</th>
                                                                    <th>Total Fee</th>
                                                                    <th>Status</th>
                                                                    <th>Note</th>
                                                                    <th>Order Date</th>
                                                                    <th>Receive Date</th>
                                                                    <th>Admin</th>
                                                                    <th>Kurir</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tableDataTable">
                                                            </tbody>
                                                            <tfoot id="tableDataFoot">
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
        </div>
    </footer>
    <!-- partial -->
</div>

<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
    getData();
    getDataTotalIncome();
    const shippingCost = $(".shipping-cost");
    const insurance = $(".insurance");
    const qty = $(".qty");
    const bjmoney = $(".bjmoney");
    const yfmoney = $(".yfmoney");
    const zmoney = $(".zmoney");

    for (let i = 0; i < shippingCost.length; i++) {
        shippingCost[i].addEventListener("keyup", function(e) {
            yfmoney[i].innerHTML = rupiah(this.value, "Rp. ");
            zmoney[i].innerHTML = rupiah(
                (parseInt(shippingCost[i].value) + parseInt(insurance[i].value)) *
                qty[i].value
            );
        });
    }
    for (let i = 0; i < insurance.length; i++) {
        insurance[i].addEventListener("keyup", function(e) {
            bjmoney[i].innerHTML = rupiah(this.value, "Rp. ");
            zmoney[i].innerHTML = rupiah(
                (parseInt(shippingCost[i].value) + parseInt(insurance[i].value)) *
                qty[i].value
            );
        });
    }

    for (let i = 0; i < qty.length; i++) {
        qty[i].addEventListener("keyup", function(e) {
            zmoney[i].innerHTML = rupiah(
                (parseInt(shippingCost[i].value) + parseInt(insurance[i].value)) *
                qty[i].value
            );
        });
    }

    function getData() {
        const base_url = window.location.pathname;
        $.ajax({
            url: `${base_url}/getData`,
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
                    <p class="text-start">---------------------------------- x ${response[i].qty} qty</p>
                    <p class="text-start"><strong>${total}</strong></p>
					</td>
                    <td>
					<div class="badge badge-${status}">${response[i].status}</div>
					</td>
                    <td>
					${response[i].keterangan}
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
                $('#tableData').DataTable().destroy();
                $("#tableDataTable").html(html);
                let table = $('#tableData').DataTable({
                    "columnDefs": [{
                        "className": "dt-center",
                        "targets": "_all"
                    }],
                });
            },
        });
    }

    function getDataTotalIncome() {
        const base_url = window.location.pathname;
        $.ajax({
            url: `${base_url}/getDataTotalIncome`,
            type: "GET",
            dataType: "json",
            success: function(response) {
                let html;
                let total = rupiah(response[0].TotalOrdered);
                html += ` <tr>
                    	<td colspan="5" class="text-end"><strong><h5>Total Income</strong></h5></td>
                    	<td><h5><strong>${total}</strong></h5></td>
                    </tr>`;
                $("#tableDataFoot").html(html);
            },
        });
    }
</script>