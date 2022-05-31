getCountAll();
viewGraph();
getTotSenderReceiver();
getOrder();
getLastOrder();
getData();
getMostShipping();
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
				let html = ` <div class="alert alert-danger alert-dismissible fade show mt-4 text-center alert-data-nf" role="alert">
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
			getCountAll();
			viewGraph();
			getTotSenderReceiver();
			getOrder();
			getLastOrder();
			getData();
			getMostShipping();
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
			data: {
				id_pengiriman: id_pengiriman,
			},
			success: function (response) {
				getCountAll();
				viewGraph();
				getTotSenderReceiver();
				getOrder();
				getLastOrder();
				getData();
				getMostShipping();
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
		data: {
			id_pengiriman: id_pengiriman,
		},
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
			getCountAll();
			viewGraph();
			getTotSenderReceiver();
			getOrder();
			getLastOrder();
			getData();
			getMostShipping();
		},
	});
});

function getLastOrder() {
	const base_url = window.location.pathname;
	$.ajax({
		url: `${base_url}/getLastOrder`,
		type: "GET",
		dataType: "json",
		success: function (response) {
			let html = "";
			for (let i = 0; i < response.length; i++) {
				let ago = moment(response[i].tgl_order).fromNow();
				html += `
				<div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
					<div class="d-flex">
						<div class="wrapper ms-3 pe-3">
							<p class="mb-1 fw-bold">${response[i].nama_barang}</p>
							<small class="text-muted mb-0">${response[i].jenis_paket}</small>
						</div>
					</div>
					<div class="text-muted text-small ps-3">
					${ago}
					</div>
				</div>
				`;
			}
			return $("#lastOrder").html(html);
		},
	});
}

function getMostShipping() {
	const base_url = window.location.pathname;
	$.ajax({
		url: `${base_url}/getMostShipping`,
		type: "GET",
		dataType: "json",
		success: function (response) {
			let html = "";
			for (let i = 0; i < response.length; i++) {
				html += `
				<div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
					<div class="d-flex">
						<div class="wrapper ms-3 pe-3">
							<p class="mb-1 fw-bold">${response[i][0]}</p>
						</div>
					</div>
					<div class="text-muted text-small ps-3">
					${response[i][1]}
					</div>
				</div>
				`;
			}
			return $("#mostShipping").html(html);
		},
	});
}

function viewGraph() {
	const base_url = window.location.pathname;
	$.ajax({
		url: `${base_url}/viewGraph`,
		type: "GET",
		dataType: "json",
		success: function (response) {
			let dataTw = [];
			let dataLw = [];
			for (let i = 0; i < response[0].length; i++) {
				dataTw.push(response[0][i][0].TotalItemsOrdered);
			}
			for (let i = 0; i < response[1].length; i++) {
				dataLw.push(response[0][i][0].TotalItemsOrdered);
			}

			if ($("#marketingOverview").length) {
				var graphGradient = document
					.getElementById("marketingOverview")
					.getContext("2d");
				var graphGradient2 = document
					.getElementById("marketingOverview")
					.getContext("2d");
				var saleGradientBg = graphGradient.createLinearGradient(5, 0, 5, 100);
				saleGradientBg.addColorStop(0, "rgba(26, 115, 232, 0.18)");
				saleGradientBg.addColorStop(1, "rgba(26, 115, 232, 0.02)");
				var saleGradientBg2 = graphGradient2.createLinearGradient(
					100,
					0,
					50,
					150
				);
				saleGradientBg2.addColorStop(0, "rgba(0, 208, 255, 0.19)");
				saleGradientBg2.addColorStop(1, "rgba(0, 208, 255, 0.03)");
				var salesTopData = {
					labels: ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"],
					datasets: [
						{
							label: "This week",
							data: dataTw,
							backgroundColor: saleGradientBg,
							borderColor: ["#1F3BB3"],
							borderWidth: 1.5,
							fill: true, // 3: no fill
							pointBorderWidth: 1,
							pointRadius: [4, 4, 4, 4, 4, 4, 4],
							pointHoverRadius: [2, 2, 2, 2, 2, 2, 2],
							pointBackgroundColor: [
								"#1F3BB3)",
								"#1F3BB3",
								"#1F3BB3",
								"#1F3BB3",
								"#1F3BB3)",
								"#1F3BB3",
								"#1F3BB3",
							],
							pointBorderColor: [
								"#fff",
								"#fff",
								"#fff",
								"#fff",
								"#fff",
								"#fff",
								"#fff",
							],
						},
						{
							label: "Last week",
							data: dataLw,
							backgroundColor: saleGradientBg2,
							borderColor: ["#52CDFF"],
							borderWidth: 1.5,
							fill: true, // 3: no fill
							pointBorderWidth: 1,
							pointRadius: [4, 4, 4, 4, 4, 4, 4],
							pointHoverRadius: [2, 2, 2, 2, 2, 2, 2],
							pointBackgroundColor: [
								"#52CDFF)",
								"#52CDFF",
								"#52CDFF",
								"#52CDFF",
								"#52CDFF)",
								"#52CDFF",
								"#52CDFF",
							],
							pointBorderColor: [
								"#fff",
								"#fff",
								"#fff",
								"#fff",
								"#fff",
								"#fff",
								"#fff",
							],
						},
					],
				};

				var salesTopOptions = {
					responsive: true,
					maintainAspectRatio: false,
					scales: {
						yAxes: [
							{
								gridLines: {
									display: true,
									drawBorder: false,
									color: "#F0F0F0",
									zeroLineColor: "#F0F0F0",
								},
								ticks: {
									beginAtZero: false,
									autoSkip: true,
									maxTicksLimit: 4,
									fontSize: 10,
									color: "#6B778C",
								},
							},
						],
						xAxes: [
							{
								gridLines: {
									display: false,
									drawBorder: false,
								},
								ticks: {
									beginAtZero: false,
									autoSkip: true,
									maxTicksLimit: 7,
									fontSize: 10,
									color: "#6B778C",
								},
							},
						],
					},
					legend: false,
					legendCallback: function (chart) {
						var text = [];
						text.push('<div class="chartjs-legend"><ul>');
						for (var i = 0; i < chart.data.datasets.length; i++) {
							text.push("<li>");
							text.push(
								'<span style="background-color:' +
									chart.data.datasets[i].borderColor +
									'">' +
									"</span>"
							);
							text.push(chart.data.datasets[i].label);
							text.push("</li>");
						}
						text.push("</ul></div>");
						return text.join("");
					},

					elements: {
						line: {
							tension: 0.4,
						},
					},
					tooltips: {
						backgroundColor: "rgba(31, 59, 179, 1)",
					},
				};
				var salesTop = new Chart(graphGradient, {
					type: "line",
					data: salesTopData,
					options: salesTopOptions,
				});
				document.getElementById("marketing-overview-legend").innerHTML =
					salesTop.generateLegend();
			}
			let totalTw = 0;
			let totalLw = 0;
			for (let i = 0; i < 7; i++) {
				totalTw += dataTw[i];
				totalLw += dataLw[i];
			}
			if (totalTw == 0 || totalLw == 0) {
				percentage = 0;
			} else {
				percentage = (totalTw / totalLw) * 100;
			}
			document.getElementById("totalTw").innerHTML = rupiah(totalTw);

			if (totalTw >= totalLw) {
				document.getElementById(
					"percentageTw"
				).innerHTML = `(+ ${percentage} %)`;
				document
					.getElementById("percentageTw")
					.classList.toggle("text-success");
			} else {
				document.getElementById(
					"percentageTw"
				).innerHTML = `(- ${percentage} %)`;
				document.getElementById("percentageTw").classList.toggle("text-danger");
			}
		},
	});
}

function getOrder() {
	const base_url = window.location.pathname;
	$.ajax({
		url: `${base_url}/getCountOrder`,
		type: "GET",
		dataType: "json",
		success: function (response) {
			if ($("#status-summary").length) {
				var statusSummaryChartCanvas = document
					.getElementById("status-summary")
					.getContext("2d");
				var statusData = {
					labels: ["On Process", "On Delivery", "Delivered", "Canceled"],
					datasets: [
						{
							label: "# of Order",
							data: [
								response[0].length,
								response[1].length,
								response[2].length,
								response[3].length,
							],
							backgroundColor: "#ffcc00",
							borderColor: ["#01B6A0"],
							borderWidth: 2,
							fill: false, // 3: no fill
							pointBorderWidth: 0,
							pointRadius: [0, 0, 0, 0, 0, 0],
							pointHoverRadius: [0, 0, 0, 0, 0, 0],
						},
					],
				};

				var statusOptions = {
					responsive: true,
					maintainAspectRatio: false,
					scales: {
						yAxes: [
							{
								display: false,
								gridLines: {
									display: false,
									drawBorder: false,
									color: "#F0F0F0",
								},
								ticks: {
									beginAtZero: false,
									autoSkip: true,
									maxTicksLimit: 4,
									fontSize: 10,
									color: "#6B778C",
								},
							},
						],
						xAxes: [
							{
								display: true,
								gridLines: {
									display: false,
									drawBorder: false,
								},
								ticks: {
									beginAtZero: false,
									autoSkip: true,
									maxTicksLimit: 7,
									fontSize: 10,
									color: "#6B778C",
									fontColor: "#fff",
								},
							},
						],
					},
					legend: false,

					elements: {
						line: {
							tension: 0.4,
						},
					},
					tooltips: {
						backgroundColor: "rgba(31, 59, 179, 1)",
					},
				};
				var statusSummaryChart = new Chart(statusSummaryChartCanvas, {
					type: "line",
					data: statusData,
					options: statusOptions,
				});
			}
			document.getElementById("totalOrder").innerHTML =
				response[0].length +
				response[1].length +
				response[2].length +
				response[3].length;
		},
	});
}

function getTotSenderReceiver() {
	const base_url = window.location.pathname;
	$.ajax({
		url: `${base_url}/getTotSenderReceiver`,
		type: "GET",
		dataType: "json",
		success: function (response) {
			document.getElementById("totalSenderCount").innerHTML = response[0];
			document.getElementById("totalReceiverCount").innerHTML = response[1];
			let sender = 0;
			let receiver = 0;
			if (response[0] == 0 || response[1] == 0) {
				sender = 0;
				receiver = 0;
			} else {
				sender = response[0] / (response[0] + response[1]);
				receiver = response[1] / (response[0] + response[1]);
			}
			$("#totalSender").html("");
			$("#totalReceiver").html("");
			if ($("#totalSender").length) {
				var bar = new ProgressBar.Circle(totalSender, {
					color: "#fff",
					// This has to be the same size as the maximum width to
					// prevent clipping
					strokeWidth: 15,
					trailWidth: 15,
					easing: "easeInOut",
					duration: 1400,
					text: {
						autoStyleContainer: false,
					},
					from: {
						color: "#52CDFF",
						width: 15,
					},
					to: {
						color: "#677ae4",
						width: 15,
					},
					// Set default step function for all animate calls
					step: function (state, circle) {
						circle.path.setAttribute("stroke", state.color);
						circle.path.setAttribute("stroke-width", state.width);

						var value = Math.round(circle.value() * 100);
						if (value === 0) {
							circle.setText("");
						} else {
							circle.setText(value);
						}
					},
				});

				bar.text.style.fontSize = "0rem";
				bar.animate(sender); // Number from 0.0 to 1.0
			}
			if ($("#totalReceiver").length) {
				var bar = new ProgressBar.Circle(totalReceiver, {
					color: "#fff",
					// This has to be the same size as the maximum width to
					// prevent clipping
					strokeWidth: 15,
					trailWidth: 15,
					easing: "easeInOut",
					duration: 1400,
					text: {
						autoStyleContainer: false,
					},
					from: {
						color: "#34B1AA",
						width: 15,
					},
					to: {
						color: "#677ae4",
						width: 15,
					},
					// Set default step function for all animate calls
					step: function (state, circle) {
						circle.path.setAttribute("stroke", state.color);
						circle.path.setAttribute("stroke-width", state.width);

						var value = Math.round(circle.value() * 100);
						if (value === 0) {
							circle.setText("");
						} else {
							circle.setText(value);
						}
					},
				});

				bar.text.style.fontSize = "0rem";
				bar.animate(receiver); // Number from 0.0 to 1.0
			}
		},
	});
}

function getCountAll() {
	const base_url = window.location.pathname;
	$.ajax({
		url: `${base_url}/getCountAll`,
		type: "GET",
		dataType: "json",
		success: function (response) {
			if (response[4][0].TotalItemsOrdered == null) {
				response[4][0].TotalItemsOrdered = 0;
			}
			document.getElementById("totalUser").innerHTML = response[0];
			document.getElementById("totalBarang").innerHTML = response[1];
			document.getElementById("totalVendor").innerHTML = response[2];
			document.getElementById("totalTesti").innerHTML = response[3];
			document.getElementById("totalIncome").innerHTML = rupiah(
				response[4][0].TotalItemsOrdered
			);
		},
	});
}
