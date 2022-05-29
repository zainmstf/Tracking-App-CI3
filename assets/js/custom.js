getData();
const shippingCost = $(".shipping-cost");
const insurance = $(".insurance");
const qty = $(".qty");
const bjmoney = $(".bjmoney");
const yfmoney = $(".yfmoney");
const zmoney = $(".zmoney");

for (let i = 0; i < shippingCost.length; i++) {
	shippingCost[i].addEventListener("keyup", function (e) {
		yfmoney[i].innerHTML = rupiah(this.value, "Rp. ");
		zmoney[i].innerHTML = rupiah(
			(parseInt(shippingCost[i].value) + parseInt(insurance[i].value)) *
				qty[i].value
		);
	});
}
for (let i = 0; i < insurance.length; i++) {
	insurance[i].addEventListener("keyup", function (e) {
		bjmoney[i].innerHTML = rupiah(this.value, "Rp. ");
		zmoney[i].innerHTML = rupiah(
			(parseInt(shippingCost[i].value) + parseInt(insurance[i].value)) *
				qty[i].value
		);
	});
}

for (let i = 0; i < qty.length; i++) {
	qty[i].addEventListener("keyup", function (e) {
		zmoney[i].innerHTML = rupiah(
			(parseInt(shippingCost[i].value) + parseInt(insurance[i].value)) *
				qty[i].value
		);
	});
}

const rupiah = (number) => {
	return new Intl.NumberFormat("id-ID", {
		style: "currency",
		currency: "IDR",
	}).format(number);
};

function searchOrder() {
	const base_url = window.location.pathname;
	let value = $("#manage_order").val();
	$.ajax({
		method: "POST",
		dataType: "json",
		url: `${base_url}/getDataFromAjx`,
		data: {
			input_ajx: value,
		},
		success: function (result) {
			if (result == "") {
				let html = ` <div class="alert alert-danger alert-dismissible fade show mt-4 text-cente alert-data-nf" role="alert">
				<strong>Data tidak ditemukan!</strong> Resi yang anda masukkan salah.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			  </div>`;
				$("#notfound").html(html);
				$("#tableData").html("");
			} else {
				let i;
				let html = "";
				let status;
				for (i = 0; i < result.length; i++) {
					if (
						result[i].status == "On Process" ||
						result[i].status == "On Delivery"
					) {
						status = "warning";
					}
					if (result[i].status == "Delivered") {
						status = "success";
					}
					if (result[i].status == "Cancelled") {
						status = "danger";
					}
					html += `<tr>
					<td>
						<h6 class="text-${status}">${result[i].no_resi}</h6>
					</td>
					<td>
						${result[i].nama_barang}
					</td>
					<td>
					${result[i].berat}
					</td>
					<td>
					${result[i].nama_pengirim}
					</td>
					<td>${result[i].nama_penerima}</td>
					<td>${result[i].jenis_paket}</td>
					<td>${result[i].qty}</td>
					<td>${result[i].total_harga}</td>
					<td>${result[i].keterangan}<td>
						<div class="badge badge-${status}">${result[i].status}</div>
					</td>
					<td>
					<div>
						<h6>${result[i].username}</h6>
						<p>Admin</p>
					</div>
					</td>
					<td>
					<div>
					<button type="button" class="btn btn-inverse-warning btn-edit" data-id="${result[i].id_pengiriman}">Edit</button>
					<button type="button" class="btn btn-inverse-danger btn-delete" data-id="${result[i].id_pengiriman}">Delete</button>
					</div>
					</td>
				</tr>`;
				}
				$("#notfound").html("");
				$("#tableData").html(html);
			}
		},
	});
}

function getData() {
	const base_url = window.location.pathname;
	$.ajax({
		url: `${base_url}/getData`,
		type: "GET",
		dataType: "json",
		success: function (response) {
			let i;
			let html = "";
			let status;
			for (i = 0; i < response.length; i++) {
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
				html += `<tr>
					<td>
						<h6 class="text-${status}">${response[i].no_resi}</h6>
					</td>
					<td>
						${response[i].nama_barang}
					</td>
					<td>
					${response[i].berat}
					</td>
					<td>
					${response[i].nama_pengirim}
					</td>
					<td>${response[i].nama_penerima}</td>
					<td>${response[i].jenis_paket}</td>
					<td>${response[i].qty}</td>
					<td>${response[i].total_harga}</td>
					<td>${response[i].keterangan}<td>
						<div class="badge badge-${status}">${response[i].status}</div>
					</td>
					<td>
					<div>
						<h6>${response[i].username}</h6>
						<p>Admin</p>
					</div>
					</td>
					<td>
					<div>
					<button type="button" class="btn btn-inverse-warning btn-edit" data-id="${response[i].id_pengiriman}">Edit</button>
					<button type="button" class="btn btn-inverse-danger btn_delete" data-id="${response[i].id_pengiriman}">Delete</button>
					</div>
					</td>
				</tr>`;
			}
			return $("#tableData").html(html);
		},
	});
}
$("#addOrder").on("click", function () {
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
		success: function (data) {
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
			getData();
		},
	});
});

$("#tableData").on("click", ".btn_delete", function () {
	const base_url = window.location.pathname;
	let id_pengiriman = $(this).attr("data-id");
	let status = confirm("Yakin ingin menghapus?");
	if (status) {
		$.ajax({
			url: `${base_url}/deleteData`,
			type: "POST",
			data: { id_pengiriman: id_pengiriman },
			success: function (response) {
				getData();
			},
		});
	}
});
let edit = [0];
$("#tableData").on("click", ".btn-edit", function () {
	const base_url = window.location.pathname;
	let id_pengiriman = $(this).attr("data-id");
	$.ajax({
		url: `${base_url}/getDataId`,
		type: "POST",
		data: { id_pengiriman: id_pengiriman },
		dataType: "json",
		success: function (response) {
			edit[0] = response[0];
			$("#editOrder").modal("show");
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
			$("#addNewOrder").modal("hide");
		},
	});
});
$("#editOrderbtn").on("click", function () {
	console.log(edit[0]);
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
		success: function (response) {
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
			$("#editOrder").modal("hide");
			getData();
		},
	});
});
