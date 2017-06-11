<nav>
	<div class = "nav_button">
		<a href = "glowna">
			<div class = "bolded_white"><?= nav_button($page_name, "glowna"); ?></div>
		</a>
	</div>
	<div class = "nav_button nav_button_list">
		<div class = "bolded_white">Urządzenia</div>
	</div>
	<div class = "nav_list">
		<a href = "imac"><?= nav_button($page_name, "imac"); ?></a><br/>
		<a href = "macbook"><?= nav_button($page_name, "macbook"); ?></a><br/>
		<a href = "macpro"><?= nav_button($page_name, "macpro"); ?></a><br/>
		<a href = "iphone"><?= nav_button($page_name, "iphone"); ?></a><br/>
		<a href = "ipad"><?= nav_button($page_name, "ipad"); ?></a>
	</div>
	<div class = "nav_button">
		<a href = "rekrutacja">
			<div class = "bolded_white"><?= nav_button($page_name, "rekrutacja"); ?></div>
		</a>
	</div>
	<div class = "nav_button nav_button_list">
		<div class = "bolded_white">Zdjęcia</div>
	</div>
	<div class = "nav_list">
		<a href = "galeria"><?= nav_button($page_name, "galeria"); ?></a><br/>
		<a href = "galeria_ulubione"><?= nav_button($page_name, "galeria_ulubione"); ?></a><br/>
		<a href = "galeria_szukaj"><?= nav_button($page_name, "galeria_szukaj"); ?></a><br/>
		<a href = "nowe_zdjecie"><?= nav_button($page_name, "nowe_zdjecie"); ?></a>
	</div>
	<?php if($is_logged): ?>
		<div class = "nav_button nav_button_list">
			<div class = "bolded_white">Panel</div>
		</div>
		<div class = "nav_list">
			<?php
				if(isset($_GET['einloggen_success']) && $_GET['einloggen_success'] == 'true') {
					echo "<span style='color: #69FF69;'>Logowanie zakończone powodzeniem.</span></br></br>";
				}

				echo "Witaj, $user_login!</br>";
			?>
			<a href="wylogowanie?redirect=<?= $controller_name ?>">Wyloguj</a>
		</div>
	<?php else: ?>
		<div class = "nav_button nav_button_list">
			<div class = "bolded_white">Logowanie</div>
		</div>
		<div class = "nav_list">
			<?php
				if(isset($_GET['einloggen_success']) && $_GET['einloggen_success'] == 'false') {
					foreach ($_GET['einloggen_errors'] as $error) {
						echo "<span style='color: #FF2929;'>" . translate_msg($error) . "</span>";
					}
				}
			?>
			<form method="post" action="logowanie?redirect=<?= $controller_name ?>">
				<input type="text" name="einloggen_login" class="input_login"/>
				<input type="password" name="einloggen_password" class="input_login"/>
				<div onclick="this.parentNode.submit();" style="cursor: pointer;">Zaloguj</div>
			</form>
			<a href="rejestracja"><?= nav_button($page_name, "rejestracja"); ?></a>
		</div>
	<?php endif ?>
</nav>