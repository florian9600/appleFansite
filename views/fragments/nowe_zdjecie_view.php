<?php
	if(isset($_GET['upload_success'])) {
		$success = $_GET['upload_success'];

		if($success == 'true') {
			echo "<div class = 'nav_button'><div class = 'bolded_white'>" . "Zdjęcie zostało dodane!" ."</div></div>";
		} else {
			$errors = $_GET['upload_errors'];
			foreach ($errors as $error) {
				echo "<div class = 'nav_button'><div class = 'bolded_white'>" . translate_msg($error) . "</div></div>";
			}
		}
	}
?>

<form method="post" enctype="multipart/form-data">
	<span>Tytuł:</span></br>
	<input type="text" name="photo_title"/></br>
	<span>Autor:</span></br>
	<input type="text" name="photo_author" <?php if($is_logged) echo "value='$user_login'"; ?>/></br>
	<span>Znak wodny:</span></br>
	<input type="text" name="photo_watermark"/></br>
	<?php if($is_logged): ?>
		<span>Zdjęcie:</span></br>
		<input type="radio" name="photo_private" value="false" checked/> publiczne</br>
		<input type="radio" name="photo_private" value="true"/> prywatne</br>
	<?php endif ?>
	<span>Plik:</span></br>
	<input type="file" name="photo_file"/></br></br>
	<input type="submit" value="Dodaj zdjęcie"/>
	<input type="reset" value="Czyszczenie"/>
</form>