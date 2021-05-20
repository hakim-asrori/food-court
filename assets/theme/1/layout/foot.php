		</div>
	</div>

	<script src="<?= '/assets/vendor/jquery/jquery.min.js' ?>"></script>
	<script src="<?= '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
	<script src="<?= '/assets/js/bootstrap.min.js' ?>"></script>
	<script src="<?= '/assets/js/my.js' ?>"></script>
	<script src="<?= '/assets/vendor/lightbox2/js/lightbox-plus-jquery.min.js' ?>"></script>
	<script src="<?= '/assets/vendor/jquery-ui/jquery-ui.min.js' ?>"></script>
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