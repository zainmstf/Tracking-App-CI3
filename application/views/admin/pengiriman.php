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
                                                            <h4 class="card-title card-title-dash">Manage Orders</h4>
                                                            <P class="card-subtitle card-subtitle-dash">Shift + Scroll for details item</P>
                                                        </div>
                                                        <div>
                                                            <button class="btn btn-inverse-primary btn-lg mb-0 me-0" type="button" data-bs-toggle="modal" data-bs-target="#addModal"><i class="mdi mdi-note-plus"></i>Add new order</button>

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
                                                                                    <h2>Add New Order</h2>
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
                                                                                        <li data-aos="fade-up">
                                                                                            <i class='bx bx-receipt icon-help'></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#detail-2">Receipent Information <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                                                                            <div id="detail-2" class="collapse show">
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
                                                                                                                            <input type="text" class="form-control" name="receipent_name" required />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Phone Number</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <input type="tel" class="form-control" pattern="[0-9]{11}||[0-9]{12}||[0-9]{13}" name="receipent_phone_number" required />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Destination City</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <select class="w-100 form-control select2Add" name="destination_city">
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
                                                                                                                            <input class="form-control" type="text" pattern="[0-9]{5}" name="receipent_post_code" />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Address</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <textarea name="receipent_address" cols="30" rows="10" class="form-control"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
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
                                                                                                                    <div class="form-group row">
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
                                                                                                                        <label class="col-sm-3 col-form-label">Item Type</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <select class="w-100 form-control select2Add" name="item_type">
                                                                                                                                <?php foreach ($paket as $key => $pk) : ?>
                                                                                                                                    <option value="<?= $pk->id_paket; ?>"><?= $pk->jenis_paket ?></option>
                                                                                                                                <?php endforeach; ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Shipping Cost</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <input type="text" class="form-control shipping-cost" required name="shipping_cost" />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Insurance</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <input type="text" class="form-control insurance" required name="insurance" />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Qty</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <input type="number" class="form-control qty" value="1" name="qty" required />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Note :</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <textarea name="note" cols="30" rows="10" class="form-control"></textarea>
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
                                                                                    <div class="dash-line"></div>
                                                                                    <div class="freight-box">
                                                                                        <div style="display: inline-block">
                                                                                            <table>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td>Shipping Cost：</td>
                                                                                                        <td class="freight-num">
                                                                                                            <span> </span>
                                                                                                            <span class="yfmoney"></span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Insurance：</td>
                                                                                                        <td class="freight-num">
                                                                                                            <span> </span>
                                                                                                            <span class="bjmoney"></span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr id="max-ins-money-box">
                                                                                                        <td colspan="2">
                                                                                                            <div style="font-size: 11px; color: #ff0000" id="max-ins-money"></div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr style="font-size: 18px; font-weight: 800">
                                                                                                        <td>Total Fee：</td>
                                                                                                        <td class="freight-num">
                                                                                                            <span> </span><span class="zmoney"></span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
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
                                                                                    <h2>Edit Order</h2>
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
                                                                                        <li data-aos="fade-up">
                                                                                            <i class='bx bx-receipt icon-help'></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#detail-1">Receipent Information <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
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
                                                                                                                            <input type="text" class="form-control" name="receipent_name_edit" required />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Phone Number</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <input type="tel" class="form-control" pattern="[0-9]{11}||[0-9]{12}||[0-9]{13}" name="receipent_phone_number_edit" required />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Destination City</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <select class="w-100 form-control select2Edit" name="destination_city_edit">
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
                                                                                                                            <input class="form-control" type="text" pattern="[0-9]{5}" name="receipent_post_code_edit" />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Address</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <textarea name="receipent_address_edit" cols="30" rows="10" class="form-control"></textarea>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
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
                                                                                                                    <div class="form-group row">
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
                                                                                                                        <label class="col-sm-3 col-form-label">Item Type</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <select class="w-100 form-control select2Edit" name="item_type_edit">
                                                                                                                                <?php foreach ($paket as $key => $pk) : ?>
                                                                                                                                    <option value="<?= $pk->id_paket; ?>"><?= $pk->jenis_paket ?></option>
                                                                                                                                <?php endforeach; ?>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Shipping Cost</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <input type="text" class="form-control shipping-cost" required name="shipping_cost_edit" />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Insurance</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <input type="text" class="form-control insurance" required name="insurance_edit" />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Qty</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <input type="number" class="form-control qty" value="1" name="qty_edit" required />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-6">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-3 col-form-label">Note :</label>
                                                                                                                        <div class="col-sm-9 form-input">
                                                                                                                            <textarea name="note_edit" cols="30" rows="10" class="form-control"></textarea>
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
                                                                                    <div class="dash-line"></div>
                                                                                    <div class="freight-box">
                                                                                        <div style="display: inline-block">
                                                                                            <table>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td>Shipping Cost：</td>
                                                                                                        <td class="freight-num">
                                                                                                            <span> </span>
                                                                                                            <span class="yfmoney"></span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>Insurance：</td>
                                                                                                        <td class="freight-num">
                                                                                                            <span> </span>
                                                                                                            <span class="bjmoney"></span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr id="max-ins-money-box">
                                                                                                        <td colspan="2">
                                                                                                            <div style="font-size: 11px; color: #ff0000" id="max-ins-money"></div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr style="font-size: 18px; font-weight: 800">
                                                                                                        <td>Total Fee：</td>
                                                                                                        <td class="freight-num">
                                                                                                            <span> </span><span class="zmoney"></span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
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
                                                                    <th>Shipping Id</th>
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
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tableDataTable">
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
                    if (response[i].status == "Canceled") {
                        status = "danger";
                    }
                    let biaya_pengiriman = rupiah(response[i].biaya_pengiriman);
                    let asuransi = rupiah(response[i].asuransi);
                    let total = rupiah(response[i].total_harga);
                    html += `<tr>
					<td>
						${response[i].id_pengiriman}
					</td>
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
                    <p class="text-start">${response[i].asal}</p>
                    <p class="text-start">Telp  : ${response[i].telp_pengirim}</p>
					</td>
                    <td>
					<p class="text-start"><strong>${response[i].nama_penerima}</strong></p>
                    <p class="text-start">${response[i].alamat_penerima}</p>
                    <p class="text-start">${response[i].kode_pos_penerima}</p>
                    <p class="text-start">${response[i].tujuan}</p>
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
                    <td><button type="button" class="btn btn-inverse-warning btn-edit" data-id="${response[i].id_pengiriman}">Edit</button>
					<button type="button" class="btn btn-inverse-danger btn_delete" data-id="${response[i].id_pengiriman}">Delete</button></td>
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
    $("#addButtonModal").on("click", function() {
        const base_url = window.location.pathname;
        let sender_name = $("input[name=sender_name]").val();
        let sender_phone_number = $("input[name=sender_phone_number]").val();
        let sender_post_code = $("input[name=sender_post_code]").val();
        let origin_city = $("select[name=origin_city]").val();
        let sender_address = $("textarea[name=sender_address]").val();

        let receipent_name = $("input[name=receipent_name]").val();
        let receipent_phone_number = $("input[name=receipent_phone_number]").val();
        let receipent_post_code = $("input[name=receipent_post_code]").val();
        let destination_city = $("select[name=destination_city]").val();
        let receipent_address = $("textarea[name=receipent_address]").val();

        let vendor = $("select[name=vendor]").val();
        let item_name = $("input[name=item_name]").val();
        let weight = $("input[name=weight]").val();
        let type_item = $("select[name=item_type]").val();
        let shipping_cost = $("input[name=shipping_cost]").val();
        let insurance = $("input[name=insurance]").val();
        let qty = $("input[name=qty]").val();
        let note = $("textarea[name=note]").val();

        $.ajax({
            url: `${base_url}/addData`,
            type: "POST",
            data: {
                sender_name: sender_name,
                sender_phone_number: sender_phone_number,
                sender_post_code: sender_post_code,
                origin_city: origin_city,
                sender_address: sender_address,
                receipent_name: receipent_name,
                receipent_phone_number: receipent_phone_number,
                receipent_post_code: receipent_post_code,
                destination_city: destination_city,
                receipent_address: receipent_address,
                vendor: vendor,
                item_name: item_name,
                weight: weight,
                item_type: type_item,
                shipping_cost: shipping_cost,
                insurance: insurance,
                qty: qty,
                note: note,
            },
            dataType: "json",
            success: function(data) {
                $("input[name=sender_name]").val("");
                $("input[name=sender_phone_number]").val("");
                $("input[name=sender_post_code]").val("");
                $("textarea[name=sender_address]").val("");
                $("input[name=receipent_name]").val("");
                $("input[name=receipent_phone_number]").val("");
                $("input[name=receipent_post_code]").val("");
                $("textarea[name=receipent_address]").val("");
                $("input[name=item_name]").val("");
                $("input[name=weight]").val("");
                $("input[name=shipping_cost]").val("");
                $("input[name=insurance]").val("");
                $("input[name=qty]").val("1");
                $("textarea[name=note]").val("");
                $("#addNewOrder").modal("hide");
                $("#addModal").modal("hide");
                getData();
                zmoney[0].innerHTML = rupiah(0);
                bjmoney[0].innerHTML = rupiah(0);
                yfmoney[0].innerHTML = rupiah(0);
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
                edit[0] = response[0];
                $("input[name=sender_name_edit]").val(response[0].nama_pengirim);
                $("input[name=sender_phone_number_edit]").val(response[0].telp_pengirim);
                $("select[name=origin_city_edit]")
                    .val(response[0].asal)
                    .trigger("change");
                $("input[name=sender_post_code_edit]").val(response[0].kode_pos_pengirim);
                $("textarea[name=sender_address_edit]").val(response[0].alamat_pengirim);
                $("input[name=receipent_name_edit]").val(response[0].nama_penerima);
                $("input[name=receipent_phone_number_edit]").val(
                    response[0].telp_penerima
                );
                $("select[name=destination_city_edit]")
                    .val(response[0].tujuan)
                    .trigger("change");
                $("input[name=receipent_post_code_edit]").val(
                    response[0].kode_pos_penerima
                );
                $("textarea[name=receipent_address_edit]").val(
                    response[0].alamat_penerima
                );
                $("select[name=vendor_edit]")
                    .val(response[0].id_vendor)
                    .trigger("change");
                $("input[name=item_name_edit]").val(response[0].nama_barang);
                $("input[name=weight_edit]").val(response[0].berat);
                $("select[name=item_type_edit]")
                    .val(response[0].id_paket)
                    .trigger("change");
                $("input[name=shipping_cost_edit]").val(response[0].biaya_pengiriman);
                $("input[name=insurance_edit]").val(response[0].asuransi);
                $("input[name=qty_edit]").val(response[0].qty);
                $("textarea[name=note_edit]").val(response[0].keterangan);
                $(".yfmoney").html(rupiah(response[0].biaya_pengiriman));
                $(".bjmoney").html(rupiah(response[0].asuransi));
                $(".zmoney").html(rupiah(response[0].total_harga));
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

        let id_penerima = edit[0].id_penerima;
        let receipent_name = $("input[name=receipent_name_edit]").val();
        let receipent_phone_number = $(
            "input[name=receipent_phone_number_edit]"
        ).val();
        let receipent_post_code = $("input[name=receipent_post_code_edit]").val();
        let destination_city = $("select[name=destination_city_edit]").val();
        let receipent_address = $("textarea[name=receipent_address_edit]").val();

        let id_pengiriman = edit[0].id_pengiriman;
        let id_barang = edit[0].id_barang;
        let no_resi = edit[0].no_resi;
        let tgl_order = edit[0].tgl_order;
        let vendor = $("select[name=vendor_edit]").val();
        let item_name = $("input[name=item_name_edit]").val();
        let weight = $("input[name=weight_edit]").val();
        let type_item = $("select[name=item_type_edit]").val();
        let shipping_cost = $("input[name=shipping_cost_edit]").val();
        let insurance = $("input[name=insurance_edit]").val();
        let qty = $("input[name=qty_edit]").val();
        let note = $("textarea[name=note_edit]").val();
        $.ajax({
            url: `${base_url}/updateData`,
            type: "POST",
            data: {
                id_pengiriman: id_pengiriman,
                id_pengirim: id_pengirim,
                id_penerima: id_penerima,
                id_barang: id_barang,
                no_resi: no_resi,
                tgl_order: tgl_order,
                sender_name: sender_name,
                sender_phone_number: sender_phone_number,
                sender_post_code: sender_post_code,
                origin_city: origin_city,
                sender_address: sender_address,
                receipent_name: receipent_name,
                receipent_phone_number: receipent_phone_number,
                receipent_post_code: receipent_post_code,
                destination_city: destination_city,
                receipent_address: receipent_address,
                vendor: vendor,
                item_name: item_name,
                weight: weight,
                item_type: type_item,
                shipping_cost: shipping_cost,
                insurance: insurance,
                qty: qty,
                note: note,
            },
            success: function(response) {
                $("input[name=sender_name_edit]").val("");
                $("input[name=sender_phone_number_edit]").val("");
                $("input[name=sender_post_code_edit]").val("");
                $("textarea[name=sender_address_edit]").val("");
                $("input[name=receipent_name_edit]").val("");
                $("input[name=receipent_phone_number_edit]").val("");
                $("input[name=receipent_post_code_edit]").val("");
                $("textarea[name=receipent_address_edit]").val("");
                $("input[name=item_name_edit]").val("");
                $("input[name=weight_edit]").val("");
                $("input[name=shipping_cost_edit]").val("");
                $("input[name=insurance_edit]").val("");
                $("input[name=qty_edit]").val("1");
                $("textarea[name=note_edit]").val("");
                $("#editModal").modal("hide");
                getData();
                zmoney[1].innerHTML = rupiah(0);
                bjmoney[1].innerHTML = rupiah(0);
                yfmoney[1].innerHTML = rupiah(0);
            },
        });
    });
</script>