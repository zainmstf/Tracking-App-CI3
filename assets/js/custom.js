const rupiah = (number) => {
	return new Intl.NumberFormat("id-ID", {
		style: "currency",
		currency: "IDR",
	}).format(number);
};

let current = location.href;
$(".nav-item .nav-link").each(function () {
	// if the current path is like this link, make it active
	if (this.href === current) {
		$(this).parent().addClass("active");
	}
});
