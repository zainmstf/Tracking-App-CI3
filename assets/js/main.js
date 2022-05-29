/**
 * Template Name: Medilab - v4.7.1
 * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */
(function () {
	"use strict";

	/**
	 * Easy selector helper function
	 */
	const select = (el, all = false) => {
		el = el.trim();
		if (all) {
			return [...document.querySelectorAll(el)];
		} else {
			return document.querySelector(el);
		}
	};

	/**
	 * Easy event listener function
	 */
	const on = (type, el, listener, all = false) => {
		let selectEl = select(el, all);
		if (selectEl) {
			if (all) {
				selectEl.forEach((e) => e.addEventListener(type, listener));
			} else {
				selectEl.addEventListener(type, listener);
			}
		}
	};

	/**
	 * Easy on scroll event listener
	 */
	const onscroll = (el, listener) => {
		el.addEventListener("scroll", listener);
	};

	/**
	 * Navbar links active state on scroll
	 */
	let navbarlinks = select("#navbar .togactive", true);
	const navbarlinksActive = () => {
		let position = window.scrollY + 200;
		navbarlinks.forEach((navbarlink) => {
			if (!navbarlink.hash) return;
			let section = select(navbarlink.hash);
			if (!section) return;
			if (
				position >= section.offsetTop &&
				position <= section.offsetTop + section.offsetHeight
			) {
				navbarlink.classList.add("active");
			} else {
				navbarlink.classList.remove("active");
			}
		});
	};
	window.addEventListener("load", navbarlinksActive);
	onscroll(document, navbarlinksActive);

	/**
	 * Scrolls to an element with header offset
	 */
	const scrollto = (el) => {
		let header = select("#header");
		let offset = header.offsetHeight;

		let elementPos = select(el).offsetTop;
		window.scrollTo({
			top: elementPos - offset,
			behavior: "smooth",
		});
	};

	/**
	 * Toggle .header-scrolled class to #header when page is scrolled
	 */
	let selectHeader = select("#header");
	let selectTopbar = select("#topbar");
	if (selectHeader) {
		const headerScrolled = () => {
			if (window.scrollY > 100) {
				selectHeader.classList.add("header-scrolled");
				if (selectTopbar) {
					selectTopbar.classList.add("topbar-scrolled");
				}
			} else {
				selectHeader.classList.remove("header-scrolled");
				if (selectTopbar) {
					selectTopbar.classList.remove("topbar-scrolled");
				}
			}
		};
		window.addEventListener("load", headerScrolled);
		onscroll(document, headerScrolled);
	}

	/**
	 * Back to top button
	 */
	let backtotop = select(".back-to-top");
	if (backtotop) {
		const toggleBacktotop = () => {
			if (window.scrollY > 100) {
				backtotop.classList.add("active");
			} else {
				backtotop.classList.remove("active");
			}
		};
		window.addEventListener("load", toggleBacktotop);
		onscroll(document, toggleBacktotop);
	}

	/**
	 * Mobile nav toggle
	 */
	on("click", ".mobile-nav-toggle", function (e) {
		select("#navbar").classList.toggle("navbar-mobile");
		this.classList.toggle("bi-list");
		this.classList.toggle("bi-x");
	});

	/**
	 * Mobile nav dropdowns activate
	 */
	on(
		"click",
		".navbar .dropdown > a",
		function (e) {
			if (select("#navbar").classList.contains("navbar-mobile")) {
				e.preventDefault();
				this.nextElementSibling.classList.toggle("dropdown-active");
			}
		},
		true
	);

	/**
	 * Scrool with ofset on links with a class name .scrollto
	 */
	on(
		"click",
		".scrollto",
		function (e) {
			if (select(this.hash)) {
				e.preventDefault();

				let navbar = select("#navbar");
				if (navbar.classList.contains("navbar-mobile")) {
					navbar.classList.remove("navbar-mobile");
					let navbarToggle = select(".mobile-nav-toggle");
					navbarToggle.classList.toggle("bi-list");
					navbarToggle.classList.toggle("bi-x");
				}
				scrollto(this.hash);
			}
		},
		true
	);

	/**
	 * Scroll with ofset on page load with hash links in the url
	 */
	window.addEventListener("load", () => {
		if (window.location.hash) {
			if (select(window.location.hash)) {
				scrollto(window.location.hash);
			}
		}
	});

	/**
	 * Preloader
	 */
	let preloader = select("#preloader");
	if (preloader) {
		window.addEventListener("load", () => {
			preloader.remove();
		});
	}

	/**
	 * Testimonials slider
	 */
	new Swiper(".testimonials-slider", {
		speed: 600,
		loop: true,
		autoplay: {
			delay: 5000,
			disableOnInteraction: false,
		},
		slidesPerView: "auto",
		pagination: {
			el: ".swiper-pagination",
			type: "bullets",
			clickable: true,
		},
		breakpoints: {
			320: {
				slidesPerView: 1,
				spaceBetween: 20,
			},

			1200: {
				slidesPerView: 2,
				spaceBetween: 20,
			},
		},
	});
})();
/**
 * Search Track order
 */
function SearchAjax() {
	const base_url = window.location.pathname;
	let value = $("#billcode_list").val();
	$.ajax({
		method: "POST",
		dataType: "json",
		url: `${base_url}/Home/getDataFromAjx`,
		data: {
			input_ajx: value,
		},
		success: function (result) {
			function bilangan(harga) {
				let number_string = harga.toString(),
					sisa = number_string.length % 3,
					rupiah = number_string.substr(0, sisa),
					ribuan = number_string.substr(sisa).match(/\d{3}/g);

				if (ribuan) {
					separator = sisa ? "." : "";
					rupiah += separator + ribuan.join(".");
				}
				return rupiah;
			}
			if (result == "") {
				let isivalue = ` <div class="alert alert-danger alert-dismissible fade show mt-4 text-cente alert-data-nf" role="alert">
				<strong>Data tidak ditemukan!</strong> Resi yang anda masukkan salah.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			  </div>`;
				document.getElementById("hasilSearch").innerHTML = isivalue;
			} else {
				for (let i = 0; i < result.length; i++) {
					const biaya_pengiriman = bilangan(result[i].biaya_pengiriman);
					const asuransi = bilangan(result[i].asuransi);
					const total = bilangan(result[i].total_harga);
					const onProcess = `<span class="bill_state_img">
										<i class='bx bxs-hand bx-tada bx-lg bx-border-circle icon-ship'></i>
										<span>Pick Up</span>
										</span>
										<div class="disn_line"></div>
										<span class="bill_state_img">
										<i class='bx bxs-analyse bx-spin bx-lg bx-border-circle icon-ship'></i>
										<span>On Process</span>
										</span>`;
					const onDelivery =
						onProcess +
						`<div class="disn_line"></div>
										<span class="bill_state_img">
										<i class='bx bxs-truck bx-flashing bx-lg bx-border-circle icon-ship'></i>
										<span>On Delivery</span>
										</span>`;
					const delivered =
						onDelivery +
						`<div class="disn_line"></div>
						<span class="bill_state_img">
										<i class='bx bxs-group bx-tada bx-lg bx-border-circle icon-ship'></i>
										<span>Delivered</span>
										</span>`;
					const modal = `<!-- Modal -->
					<div class="modal fade" id="detail-ship" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-lg">
						<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<!-- ======= Detail Order ======= -->
							<section id="detailship" class="detailship section-bg">
							<div class="container">
								<div class="section-title">
								<h2>Details Order</h2>
								</div>
								<div class="detail">
								<h4 class="text-center fw-bold">${result[i].status}  No Resi ${result[i].no_resi}</h4>
								<ul>
									<li data-aos="fade-up">
									<i class='bx bx-send icon-help'></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#detail-1">Sender Information <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
									<div id="detail-1" class="collapse show">
										<table class="table table-striped mt-3">
										<tbody>
											<tr>
											<td style="width:30%">Nama</td>
											<td>: ${result[i].nama_pengirim}</td>
											</tr>
											<tr>
											<td>Telepon</td>
											<td>: ${result[i].telp_pengirim}</td>
											</tr>
											<tr>
											<td>Asal</td>
											<td>: ${result[i].asal}</td>
											</tr>
											<tr>
											<td>Alamat</td>
											<td>: ${result[i].alamat_pengirim}</td>
											</tr>
											<tr>
											<td>Kode Pos</td>
											<td>: ${result[i].kode_pos_pengirim}</td>
											</tr>
										</tbody>
										</table>
									</div>
									</li>
									<li data-aos="fade-up" data-aos-delay="100">
									<i class='bx bx-receipt icon-help'></i><a data-bs-toggle="collapse" class="collapse" data-bs-target="#detail-2">Receiptent Information <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
									<div id="detail-2" class="collapse show">
										<table class="table table-striped mt-3">
										<tbody>
										<tr>
										<td style="width:30%"> Nama</td>
										<td>: ${result[i].nama_penerima}</td>
										</tr>
										<tr>
										<td> Telepon</td>
										<td>: ${result[i].telp_penerima}</td>
										</tr>
										<tr>
										<td> Tujuan</td>
										<td>: ${result[i].tujuan}</td>
										</tr>
										<tr>
										<td> Alamat</td>
										<td>: ${result[i].alamat_penerima}</td>
										</tr>
										<tr>
										<td> Kode Pos</td>
										<td>: ${result[i].kode_pos_penerima}</td>
										</tr>
										</tbody>
										</table>
									</div>
									</li>
									<li data-aos="fade-up" data-aos-delay="200">
									<i class='bx bx-package icon-help'></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#detail-3">Package Information <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
									<div id="detail-3" class="collapse show">
										<table class="table table-striped mt-3">
										<tbody>
											<tr>
											<td style="width:30%"> Vendor</td>
											<td>: ${result[i].nama_vendor}</td>
											</tr>
											<tr>
											<td> Nama Barang</td>
											<td>: ${result[i].nama_barang}</td>
											</tr>
											<tr>
											<td> Jenis Barang</td>
											<td>: ${result[i].jenis_paket} </td>
											</tr>
											<tr>
											<td> Qty</td>
											<td>: ${result[i].qty}</td>
											</tr>
											<tr>
											<td> Berat</td>
											<td>: ${result[i].berat} Kg</td>
											</tr>
											<tr>
											<td> Keterangan</td>
											<td>: ${result[i].keterangan}</td>
											</tr>
										</tbody>
										</table>
									</div>
									</li>
								</ul>
								<div class="dash-line"></div>
								<div class="freight-box">
									<div style="display: inline-block">
									<table>
										<tbody>
										<tr>
											<td>Biaya Pengiriman：</td>
											<td class="freight-num">
											<span>Rp </span>
											<span id="yfmoney">${biaya_pengiriman}</span>
											</td>
										</tr>
										<tr id="bjmoney-container">
											<td>Asuransi：</td>
											<td class="freight-num">
											<span>Rp </span><span id="bjmoney">${asuransi}</span>
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
											<span>Rp </span><span id="zmoney">${total}</span>
											</td>
										</tr>
										</tbody>
									</table>
									</div>
								</div>
								</div>
							</div>
							</section><!-- Detail Order -->
						</div>
						</div>
					</div>
					</div>`;
					if (result[i].status == "On Process") {
						let isivalue = `<div class="bill_state_box">
						<div class="bill_state_img_box">
						  <div class="bill_state_listing">
							${onProcess}
						  </div>
						</div>
					  </div>
					  <div class="text-center mt-3">
					<button class="detail-ship" type="button" data-bs-toggle="modal" data-bs-target="#detail-ship">Click For Details</button>
					</div>
					${modal}`;
						document.getElementById("hasilSearch").innerHTML = isivalue;
					}
					if (result[i].status == "On Delivery") {
						let isivalue = `<div class="bill_state_box">
						<div class="bill_state_img_box">
						  <div class="bill_state_listing">
							${onDelivery}
						  </div>
						</div>
					  </div>
					  <div class="text-center mt-3">
					<button class="detail-ship" type="button" data-bs-toggle="modal" data-bs-target="#detail-ship">Click For Details</button>
					</div>
					${modal}`;
						document.getElementById("hasilSearch").innerHTML = isivalue;
					}
					if (result[i].status == "Delivered") {
						let isivalue = `<div class="bill_state_box">
						<div class="bill_state_img_box">
						  <div class="bill_state_listing">
							${delivered}
						  </div>
						</div>
					  </div>
					  <div class="text-center mt-3">
					<button class="detail-ship" type="button" data-bs-toggle="modal" data-bs-target="#detail-ship">Click For Details</button>
					</div>
					${modal}`;
						document.getElementById("hasilSearch").innerHTML = isivalue;
					}
				}
			}
		},
	});
}
