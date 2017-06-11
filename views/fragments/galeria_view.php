<form action="galeria" method="post">
	<?php foreach ($model['photos'] as $photo): ?>
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
					Ulubione: <input type="checkbox" name="photo_favorite[]" value="<?= $photo['photo_id'] ?>" 
						<?php 
							if(isset($_SESSION['photo_favorite']))
							foreach ($_SESSION['photo_favorite'] as $favorite) {
								if ($favorite == $photo['photo_id']) {
									echo 'checked';
									break;
								}
							}
						?>
					>
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
	<?php endforeach ?>
	<input type="hidden" name="photo_favorite[]" value="fix"/>
	<input type="submit" value="Zapamiętaj wybrane" style="width: 100%; margin: 15px 5px 0 5px;"/>
</form>