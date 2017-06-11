<input type="text" name="title" id="search_bar" value="<?php if(isset($title)) echo $title ?>" style="width: 97%; margin: 0 5px 15px 5px;"/>
<div id="search_result">
	<?php dispatch($routing, '/galeria/wyszukane') ?>
</div>

<script>
	function search() {
		var txt = $("#search_bar").val();
		$.post("galeria/szukaj/script", {title: txt}, function (response) {
			$('#search_result').html(response);
		});
	}


	$('#search_bar').keyup(search);
	search();

</script>