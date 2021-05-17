$(function() {

	$(".navbar #btn-toggle").click(function() {

		$("#_sidebar").toggleClass("show");
		$("#content").toggleClass("slider");
		if ($(".navbar #btn-toggle i").hasClass("fa-bars")) {
			$(".navbar #btn-toggle i").removeClass("fa-bars");
			$(".navbar #btn-toggle i").addClass("fa-times");
		} else {
			$(".navbar #btn-toggle i").removeClass("fa-times");
			$(".navbar #btn-toggle i").addClass("fa-bars");
		}

	});

	$(".navbar-search-2 #search-toggle").click(function() {

		$(".navbar-search-2 .dropdown-menu").toggleClass("show");

	});

	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});

	$("#search").autocomplete({
		source: 'layout/search.php'
	});

	$("#search2").autocomplete({
		source: 'layout/search.php'
	});

});

const plus = document.getElementsByClassName('plus');
const minus = document.getElementsByClassName("minus");

const uri = document.getElementById("uri").value;

for (let i = 0; i < plus.length; i++) {
	$(plus[i]).on('click', function() {
		produkId = $(this).data('id');
		$.ajax({
			url: "./beli.php?page=tambah&id="+produkId,
			type: 'get',
			success: function() {
				document.location.href = uri;
			}
		});
	});
}

for (var i = 0; i < plus.length; i++) {
	$(minus[i]).on('click', function() {
		produkId = $(this).data('id');
		produkIsi = $(this).data('isi');
		$.ajax({
			url: "./beli.php?page=kurang&id="+produkId+"&isi="+produkIsi,
			type: 'get',
			success: function() {
				document.location.href = uri;
			}
		});
	});
}