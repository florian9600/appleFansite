<?php if(isset($model['photos'])): ?>
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
				<?php if($photo['photo_private'] == 'true'): ?>
			<tr>
				<td>
					Zdjęcie prywatne
				</td>
			</tr>
			<?php endif ?>
		</table>
	<?php endforeach ?>
<?php endif ?>