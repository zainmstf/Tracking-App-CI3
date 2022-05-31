<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Master Data</a>
                            </li>
                        </ul>
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
                                                            <h4 class="card-title card-title-dash">Manage Package</h4>
                                                            <P class="card-subtitle card-subtitle-dash">Shift + Scroll for details item</P>
                                                        </div>
                                                        <div>
                                                            <button class="btn btn-inverse-primary btn-lg mb-0 me-0" type="button" data-bs-toggle="modal" data-bs-target="#addNewPackage"><i class="mdi mdi-note-plus"></i>Add new package</button>

                                                            <!-- Modal Add-->
                                                            <div class="modal fade" id="addNewPackage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div id="detailOrder" class="detailOrder">
                                                                                <div class="section-title">
                                                                                    <h2>Add New Package</h2>
                                                                                </div>
                                                                                <div class="detail">
                                                                                    <h4 class="text-center fw-bold"></h4>
                                                                                    <ul>
                                                                                        <li data-aos="fade-up">
                                                                                        <li data-aos="fade-up">
                                                                                            <i class='bx bx-package icon-help'></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#detail-1">Package Information <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                                                                            <div id="detail-1" class="collapse show">
                                                                                                <div class="card card-order">
                                                                                                    <div class="card-body">
                                                                                                        <div class="form-sample">
                                                                                                            <p class="card-description">
                                                                                                                Package info
                                                                                                            </p>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row select2ParentAdd">
                                                                                                                        <label class="col-sm-3 col-form-label">Vendor Name</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <select class="w-100 form-control select2Add" name="vendor">
                                                                                                                                <?php foreach ($vendor as $key => $vd) : ?>
                                                                                                                                    <option value="<?= $vd->id_vendor; ?>"><?= $vd->nama_vendor ?></option>
                                                                                                                                <?php endforeach; ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Item Name</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <input type="text" class="form-control" name="item_name" required />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Weight</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <div class="input-group">
                                                                                                                                <input type="tel" class="form-control" name="weight" required />
                                                                                                                                <div class="input-group-prepend">
                                                                                                                                    <span class="input-group-text">Kg</span>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Volume</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <input type="text" class="form-control" name="volume" required />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btninverse-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="button" class="btn btn-inverse-primary" id="addPackage">Add Package</button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Modal Edit-->
                                                            <div class="modal fade" id="editOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div id="detailOrder" class="detailOrder">
                                                                                <div class="section-title">
                                                                                    <h2>Edit Package</h2>
                                                                                </div>
                                                                                <div class="detail">
                                                                                    <h4 class="text-center fw-bold"></h4>
                                                                                    <ul>
                                                                                        <li data-aos="fade-up">
                                                                                        <li data-aos="fade-up">
                                                                                            <i class='bx bx-package icon-help'></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#detail-1">Package Information <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                                                                            <div id="detail-1" class="collapse show">
                                                                                                <div class="card card-order">
                                                                                                    <div class="card-body">
                                                                                                        <div class="form-sample">
                                                                                                            <p class="card-description">
                                                                                                                Package info
                                                                                                            </p>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row select2ParentEdit">
                                                                                                                        <label class="col-sm-3 col-form-label">Vendor Name</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <select class="w-100 form-control select2Edit" name="vendor_edit">
                                                                                                                                <?php foreach ($vendor as $key => $vd) : ?>
                                                                                                                                    <option value="<?= $vd->id_vendor; ?>"><?= $vd->nama_vendor ?></option>
                                                                                                                                <?php endforeach; ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Item Name</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <input type="text" class="form-control" name="item_name_edit" required />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Weight</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <div class="input-group">
                                                                                                                                <input type="tel" class="form-control" name="weight_edit" required />
                                                                                                                                <div class="input-group-prepend">
                                                                                                                                    <span class="input-group-text">Kg</span>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Volume</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <input type="text" class="form-control" name="volume_edit" required />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btninverse-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="button" class="btn btn-inverse-primary" id="editOrderbtn">Save Changes</button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="notfound"></div>
                                                    <div class="table-responsive mt-1">
                                                        <table class="table select-table text-center" id="tableData">
                                                            <thead>
                                                                <tr>
                                                                    <th>Package Id</th>
                                                                    <th>Vendor Name</th>
                                                                    <th>Package Name</th>
                                                                    <th>Weight</th>
                                                                    <th>Volume</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tableDataBarang">

                                                            </tbody>
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
                    html += `<tr>
					<td>
						${response[i].id_barang}
					</td>
					<td>
					${response[i].nama_vendor}
					</td>
					<td>
					${response[i].nama_barang}
					</td>
					<td>${response[i].berat} Kg</td>
					<td>${response[i].volume}</td>
                    <td><button type="button" class="btn btn-inverse-warning btn-edit" data-id="${response[i].id_barang}">Edit</button>
					<button type="button" class="btn btn-inverse-danger btn_delete" data-id="${response[i].id_barang}">Delete</button></td>
				</tr>`;
                }
                $('#tableData').DataTable().destroy();
                $("#tableDataBarang").html(html);
                let table = $('#tableData').DataTable({
                    "columnDefs": [{
                        "className": "dt-center",
                        "targets": "_all"
                    }],
                });
            },
        });
    }
    $("#addPackage").on("click", function() {
        const base_url = window.location.pathname;
        let vendor = $("select[name=vendor]").val();
        let item_name = $("input[name=item_name]").val();
        let weight = $("input[name=weight]").val();
        $.ajax({
            url: `${base_url}/addData`,
            type: "POST",
            data: {
                vendor: vendor,
                item_name: item_name,
                weight: weight,
            },
            dataType: "json",
            success: function(data) {
                $("input[name=item_name]").val("");
                $("input[name=weight]").val("");
                $("#addNewPackage").modal("hide");
                getData();
            },
        });
    });
    $("#tableData").on("click", ".btn_delete", function() {
        const base_url = window.location.pathname;
        let id_barang = $(this).attr("data-id");
        let status = confirm("Yakin ingin menghapus?");
        if (status) {
            $.ajax({
                url: `${base_url}/deleteData`,
                type: "POST",
                data: {
                    id_barang: id_barang,
                },
                success: function(response) {
                    getData();
                },
            });
        }
    });
    let edit = [0];
    $("#tableData").on("click", ".btn-edit", function() {
        const base_url = window.location.pathname;
        let id_barang = $(this).attr("data-id");
        $.ajax({
            url: `${base_url}/getDataId`,
            type: "POST",
            data: {
                id: id_barang,
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
                edit[0] = response[0];
                $("select[name=vendor_edit]")
                    .val(response[0].id_vendor)
                    .trigger("change");
                $("input[name=item_name_edit]").val(response[0].nama_barang);
                $("input[name=weight_edit]").val(response[0].berat);
                $("#editOrder").modal("show");
            },
        });
    });
    $("#editOrderbtn").on("click", function() {
        const base_url = window.location.pathname;
        let id_barang = edit[0].id_barang;
        let vendor = $("select[name=vendor_edit]").val();
        let item_name = $("input[name=item_name_edit]").val();
        let weight = $("input[name=weight_edit]").val();
        $.ajax({
            url: `${base_url}/updateData`,
            type: "POST",
            data: {
                id_barang: id_barang,
                vendor: vendor,
                item_name: item_name,
                weight: weight,
            },
            success: function(response) {
                $("input[name=item_name_edit]").val("");
                $("input[name=weight_edit]").val("");
                $("#editOrder").modal("hide");
                getData();
            },
        });
    });
</script>