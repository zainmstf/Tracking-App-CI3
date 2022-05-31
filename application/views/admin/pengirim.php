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
                                                            <h4 class="card-title card-title-dash">Manage Sender</h4>
                                                            <P class="card-subtitle card-subtitle-dash">Shift + Scroll for details item</P>
                                                        </div>
                                                        <div>
                                                            <button class="btn btn-inverse-primary btn-lg mb-0 me-0" type="button" data-bs-toggle="modal" data-bs-target="#addModal"><i class="mdi mdi-note-plus"></i>Add new sender</button>

                                                            <!-- Modal Add-->
                                                            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div id="detailOrder" class="detailOrder">
                                                                                <div class="section-title">
                                                                                    <h2>Add New Sender</h2>
                                                                                </div>
                                                                                <div class="detail">
                                                                                    <h4 class="text-center fw-bold"></h4>
                                                                                    <ul>
                                                                                        <li data-aos="fade-up">
                                                                                            <i class='bx bx-send icon-help'></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#detail-1">Sender Information <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                                                                            <div id="detail-1" class="collapse show">
                                                                                                <div class="card card-order">
                                                                                                    <div class="card-body">
                                                                                                        <div class="form-sample">
                                                                                                            <p class="card-description">
                                                                                                                Personal info
                                                                                                            </p>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Name</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <input type="text" class="form-control" name="sender_name" required />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Phone Number</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <input type="tel" class="form-control" pattern="[0-9]{11}||[0-9]{12}||[0-9]{13}" name="sender_phone_number" required />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row select2ParentAdd">
                                                                                                                        <label class="col-sm-3 col-form-label">Origin City</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <select class="w-100 form-control select2Add" name="origin_city">
                                                                                                                                <?php foreach ($cities as $key => $city) : ?>
                                                                                                                                    <option value="<?= $city->city_name . ", " . $city->prov_name; ?>"><?= $city->city_name . ", " . $city->prov_name; ?></option>
                                                                                                                                <?php endforeach; ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Post Code</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <input class="form-control" type="text" pattern="[0-9]{5}" name="sender_post_code" required />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Address</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <textarea name="sender_address" cols="30" rows="10" class="form-control" required></textarea>
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
                                                                            <button type="button" class="btn btn-inverse-primary" id="addButtonModal">Add Type Item</button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Modal Edit-->
                                                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div id="detailOrder" class="detailOrder">
                                                                                <div class="section-title">
                                                                                    <h2>Edit Sender</h2>
                                                                                </div>
                                                                                <div class="detail">
                                                                                    <h4 class="text-center fw-bold"></h4>
                                                                                    <ul>
                                                                                        <li data-aos="fade-up">
                                                                                            <i class='bx bx-send icon-help'></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#detail-1">Sender Information <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                                                                            <div id="detail-1" class="collapse show">
                                                                                                <div class="card card-order">
                                                                                                    <div class="card-body">
                                                                                                        <div class="form-sample">
                                                                                                            <p class="card-description">
                                                                                                                Personal info
                                                                                                            </p>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Name</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <input type="text" class="form-control" name="sender_name_edit" required />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Phone Number</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <input type="tel" class="form-control" pattern="[0-9]{11}||[0-9]{12}||[0-9]{13}" name="sender_phone_number_edit" required />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row select2ParentEdit">
                                                                                                                        <label class="col-sm-3 col-form-label">Origin City</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <select class="w-100 form-control select2Edit" name="origin_city_edit">
                                                                                                                                <?php foreach ($cities as $key => $city) : ?>
                                                                                                                                    <option value="<?= $city->city_name . ", " . $city->prov_name; ?>"><?= $city->city_name . ", " . $city->prov_name; ?></option>
                                                                                                                                <?php endforeach; ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Post Code</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <input class="form-control" type="text" pattern="[0-9]{5}" name="sender_post_code_edit" required />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Address</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <textarea name="sender_address_edit" cols="30" rows="10" class="form-control" required></textarea>
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
                                                                            <button type="button" class="btn btn-inverse-primary" id="editButtonModal">Save Changes</button>
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
                                                                    <th>Sender Id</th>
                                                                    <th>Sender Name</th>
                                                                    <th>Origin City</th>
                                                                    <th>Address</th>
                                                                    <th>Phone Number</th>
                                                                    <th>Post Code</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tableDataSender">
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
						${response[i].id_pengirim}
					</td>
					<td>
					${response[i].nama_pengirim}
					</td>
                    <td>
					${response[i].asal}
					</td>
                    <td>
					${response[i].alamat_pengirim}
					</td>
                    <td>
					${response[i].telp_pengirim}
					</td>
                    <td>
					${response[i].kode_pos_pengirim}
					</td>
                    <td><button type="button" class="btn btn-inverse-warning btn-edit" data-id="${response[i].id_pengirim}">Edit</button>
					<button type="button" class="btn btn-inverse-danger btn_delete" data-id="${response[i].id_pengirim}">Delete</button></td>
				</tr>`;
                }
                $('#tableData').DataTable().destroy();
                $("#tableDataSender").html(html);
                let table = $('#tableData').DataTable({
                    "columnDefs": [{
                        "className": "dt-center",
                        "targets": "_all"
                    }],
                });
            },
        });
    }
    $("#addButtonModal").on("click", function() {
        const base_url = window.location.pathname;
        let sender_name = $("input[name=sender_name]").val();
        let sender_phone_number = $("input[name=sender_phone_number]").val();
        let sender_post_code = $("input[name=sender_post_code]").val();
        let origin_city = $("select[name=origin_city]").val();
        let sender_address = $("textarea[name=sender_address]").val();

        $.ajax({
            url: `${base_url}/addData`,
            type: "POST",
            data: {
                sender_name: sender_name,
                sender_phone_number: sender_phone_number,
                sender_post_code: sender_post_code,
                origin_city: origin_city,
                sender_address: sender_address,
            },
            dataType: "json",
            success: function(data) {
                $("input[name=sender_name]").val("");
                $("input[name=sender_phone_number]").val("");
                $("input[name=sender_post_code]").val("");
                $("textarea[name=sender_address]").val("");
                $("#addModal").modal("hide");
                getData();
            },
        });
    });
    $("#tableData").on("click", ".btn_delete", function() {
        const base_url = window.location.pathname;
        let id = $(this).attr("data-id");
        let status = confirm("Yakin ingin menghapus?");
        if (status) {
            $.ajax({
                url: `${base_url}/deleteData`,
                type: "POST",
                data: {
                    id: id,
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
        let id = $(this).attr("data-id");
        $.ajax({
            url: `${base_url}/getDataId`,
            type: "POST",
            data: {
                id: id,
            },
            dataType: "json",
            success: function(response) {
                edit[0] = response[0];
                $("input[name=sender_name_edit]").val(response[0].nama_pengirim);
                $("input[name=sender_phone_number_edit]").val(response[0].telp_pengirim);
                $("select[name=origin_city_edit]")
                    .val(response[0].asal)
                    .trigger("change");
                $("input[name=sender_post_code_edit]").val(response[0].kode_pos_pengirim);
                $("textarea[name=sender_address_edit]").val(response[0].alamat_pengirim);
                $("#editModal").modal("show");
            },
        });
    });
    $("#editButtonModal").on("click", function() {
        const base_url = window.location.pathname;
        let id_pengirim = edit[0].id_pengirim;
        let sender_name = $("input[name=sender_name_edit]").val();
        let sender_phone_number = $("input[name=sender_phone_number_edit]").val();
        let sender_post_code = $("input[name=sender_post_code_edit]").val();
        let origin_city = $("select[name=origin_city_edit]").val();
        let sender_address = $("textarea[name=sender_address_edit]").val();
        $.ajax({
            url: `${base_url}/updateData`,
            type: "POST",
            data: {
                id_pengirim: id_pengirim,
                sender_name: sender_name,
                sender_phone_number: sender_phone_number,
                sender_post_code: sender_post_code,
                origin_city: origin_city,
                sender_address: sender_address,
            },
            success: function(response) {
                $("input[name=sender_name_edit]").val("");
                $("input[name=sender_phone_number_edit]").val("");
                $("input[name=sender_post_code_edit]").val("");
                $("textarea[name=sender_address_edit]").val("");
                $("#editModal").modal("hide");
                getData();
            },
        });
    });
</script>