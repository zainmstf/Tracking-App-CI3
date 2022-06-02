const rupiah = (number) => {
	return new Intl.NumberFormat("id-ID", {
		style: "currency",
		currency: "IDR",
	}).format(number);
};

let current = location.pathname;
$(".nav-item .nav-link").each(function () {
	var $this = $(this);
	// if the current path is like this link, make it active
	if ($this.attr("href").indexOf(current) !== -1) {
		$this.parent().addClass("active");
	}
	console.log($this.attr("href"));
});
