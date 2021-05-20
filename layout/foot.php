      </div>
  </div>

</div>

</div>

<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="/assets/js/sb-admin-2.js"></script>
<script src="/assets/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="user.js"></script>
<script>
	$(function() {
		$('.custom-file-input').on('change', function() {
			let fileName = $(this).val().split('\\').pop();
			$(this).next('.custom-file-label').addClass("selected").html(fileName);
		});

		$("#search").autocomplete({
			source: 'search.php'
		});
	});
</script>
</body>
</html>