<?php

function site ($name) {
	$sites = [
		"glowna" => ["Strona główna", "glowna_view.php"],
		"imac" => ["iMac", "imac_view.php"],
		"macbook" => ["Macbook", "macbook_view.php"],
		"macpro" => ["Mac Pro", "macpro_view.php"],
		"iphone" => ["iPhone", "iphone_view.php"],
		"ipad" => ["iPad", "ipad_view.php"],
		"rekrutacja" => ["Rekrutacja", "rekrutacja_view.php"],
		"galeria" => ["Galeria", "galeria_view.php"],
		"rejestracja" => ["Rejestracja", "rejestracja_view.php"],
		"nowe_zdjecie" => ["Nowe zdjęcie", "nowe_zdjecie_view.php"],
		"zdjecie" => ["Zdjęcie", "zdjecie_view.php"],
		"galeria_ulubione" => ["Ulubione", "galeria_ulubione_view.php"],
		"galeria_szukaj" => ["Wyszukiwarka", "galeria_szukaj_view.php"],
	];

	return $sites[$name];
}

function translate_msg ($msg) {
	switch ($msg) {
		case 'diff_pass':
			return 'Podane hasła są różne.';
			break;

		case 'exist_login':
			return "Podany login już istnieje.";
			break;

		case 'exist_email':
			return "Podany adres e-mail już istnieje.";
			break;

		case 'wrong_login_or_password':
			return "Nieprawidłowy login lub hasło.";
			break;

		case 'not_all_fields_filled':
			return "Nie wszystkie pola zostały uzupełnione.";
			break;

		case 'file_too_big':
			return "Plik jest za duży.";
			break;

		case 'file_wrong_type':
			return "Plik jest złego typu.";
			break;

		default:
			return "Nieznany błąd: $msg";
			break;
	}
}

function nav_button($page_name, $return_page_name){
	$text = site($return_page_name)[0];
	if ($page_name == $return_page_name) {
		echo "☞ $text ☜";
	} else {
		echo $text;
	}
}