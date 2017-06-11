<form action="galeria_ulubione" method="post">
	<?php foreach ($model['photos'] as $photo): ?>
		<?php  
			$is_ok = false;

			if(isset($_SESSION['photo_favorite'])) {
				foreach ($_SESSION['photo_favorite'] as $fav) {
					if ($fav == $photo['photo_id']) {
						$is_ok = true;
						break;
					}
				}
			}

			if ($is_ok):
		?>
		<table class='gallery_photo'>
			<tr>
				<td><a href="zdjecie?src=<?= $photo['photo_id'] . '_watermark' . $photo['photo_type'] ?>">
					<img src="images/<?= $photo['photo_id'] . '_resized' . $photo['photo_type'] ?>"></img>
					</a>
				</td>
			</tr>
			<tr>
				<td>Tytuł: <?= $photo['photo_title'] ?></td>
			</tr>
			<tr>
				<td>Autor: <?= $photo['photo_author'] ?></td>
			</tr>
			<tr>
				<td>
					Usuń: <input type="checkbox" name="photo_favorite[]" value="<?= $photo['photo_id'] ?>">
				</td>
			</tr>
			<?php if($photo['photo_private'] == 'true'): ?>
			<tr>
				<td>
					Zdjęcie prywatne
				</td>
			</tr>
			<?php endif ?>
		</table>
		<?php endif ?>
	<?php endforeach ?>
	<input type="hidden" name="photo_favorite[]" value="fix"/>
	<input type="submit" value="Usuń zaznaczone z zapamiętanych" style="width: 100%; margin: 15px 5px 0 5px;"/>
</form>