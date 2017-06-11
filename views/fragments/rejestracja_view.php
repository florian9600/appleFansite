<?php
	if(isset($_GET['register_success'])) {
		$success = $_GET['register_success'];

		if($success == 'true') {
			echo "<div class = 'nav_button'><div class = 'bolded_white'>" . "Rejestracja konta przebiegła pomyślnie!" ."</div></div>";
		} else {
			$errors = $_GET['register_errors'];
			foreach ($errors as $error) {
				echo "<div class = 'nav_button'><div class = 'bolded_white'>" . translate_msg($error) . "</div></div>";
			}
		}
	}
?>

<form method="post">
	<span>Login:</span></br>
	<input type="text" name="register_login"/></br>
	<span>E-mail:</span></br>
	<input type="email" name="register_email"/></br>
	<span>Hasło:</span></br>
	<input type="password" name="register_password"/></br>
	<span>To samo hasło:</span></br>
	<input type="password" name="register_password_repeat"/></br></br>
	<input type="submit" value="Zarejestruj"/>
	<input type="reset" value="Czyszczenie"/>
</form>