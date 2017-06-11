<nav>
	<div class = "nav_button">
		<a href = "glowna">
			<div class = "bolded_white"><?= nav_button($page_id); ?></div>
		</a>
	</div>
	<div class = "nav_button nav_button_list">
		<div class = "bolded_white">Urządzenia</div>
	</div>
	<div class = "nav_list">
		<a href = "imac"><?= nav_button($page_id); ?></a><br/>
		<a href = "macbook"><?= nav_button($page_id); ?></a><br/>
		<a href = "macpro"><?= nav_button($page_id); ?></a><br/>
		<a href = "iphone"><?= nav_button($page_id); ?></a><br/>
		<a href = "ipad"><?= nav_button($page_id); ?></a>
	</div>
	<div class = "nav_button">
		<a href = "rekrutacja">
			<div class = "bolded_white"><?= nav_button($page_id); ?></div>
		</a>
	</div>
	<div class = "nav_button">
		<a href = "galeria">
			<div class = "bolded_white"><?= nav_button($page_id); ?></div>
		</a>
	</div>
	<div class = "nav_button nav_button_list">
		<div class = "bolded_white">Logowanie</div>
	</div>
	<div class = "nav_list">
		<form method="post" action="glowna">
			<input type="text" name="login" class="input_login"/>
			<input type="password" name="password" class="input_login"/>
			<div onclick="this.parentNode.submit();" style="margin: 5px 0 0px 0; cursor: pointer;">Zaloguj</div>
		</form>
		<a href="rejestracja"><?= nav_button($page_id); ?></a>
	</div>
</nav>