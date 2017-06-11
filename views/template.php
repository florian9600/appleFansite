<!DOCTYPE html>
<html>
	<head>
		<title>Apple Stuff</title>
		<?php include "fragments/layout/head.php"; ?>
	</head>
	<body>
		<div id = "wrapper">
			<?php include "fragments/layout/header.php"; ?>

			<main>
				<?php include "fragments/nav_view.php"; ?>

				<article>
					<div class = "article_header">
						<?= site($page_name)[0]; ?>
					</div>
					<div class = "article_content">
						<?php include "fragments/" . site($page_name)[1]; ?>
					</div>
				</article>
			</main>

			<?php include "fragments/layout/footer.php"; ?>
		</div>
	</body>
</html>