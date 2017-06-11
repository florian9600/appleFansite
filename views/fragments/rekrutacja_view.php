<span>
	Poszukujemy osób, które pomogą nam rozwijać nasz portal. Chętne osoby do pełnienia zaszczytnej roli redaktora na najbardziej poczytnym serwisie tego typu w Polsce proszone są o wypełnienie następującego formularza i uzbrojenie się w cierpliwość. Hej, może wybierzemy właśnie Ciebie!
</span>
<br/><br/>
<form id = "articles_rekrutacja_form" action = "rekrutacja" method = "post">
	<span>Imię:</span>
	<br/>
	<input type = "text" name = "imie" value = ""><br/>

	<span>Nazwisko:</span>
	<br/>
	<input type = "text" name = "nazwisko" value = ""><br/>

	<span>Adres e-mail:</span>
	<br/>
	<input type = "email" name = "email" title = "Adres musi być aktualny, ponieważ posłuży do komunikacji." value = ""><br/>

	<span>Płeć:</span><br/>
	<select name = "plec">
		<option value = "">Wybierz płeć</option>
		<option value = "kobieta">Kobieta</option>
		<option value = "mezczyzna">Mężczyzna</option>
	</select><br/><br/>

	<span>Próbka tekstu:</span><br/>
	<textarea name = "probka" rows="4" cols="50" title = "Wpisać można zarówno czystą próbkę, jak i link do przykładowego tekstu."></textarea><br/><br/>

	<span>Staż w redagowaniu:</span><br/>
	<input type = "radio" name = "staz" value = "<1"> Poniżej jednego roku<br/>
	<input type = "radio" name = "staz" value = "1 - 3"> Od roku do trzech lat<br/>
	<input type = "radio" name = "staz" value = "3 - 10"> Od trzech do dziesięciu lat<br/>
	<input type = "radio" name = "staz" value = ">10"> Powyżej dziesięciu lat<br/><br/>

	<span>Zgoda na przetwarzanie danych:</span>
	<br/>
	<input type = "checkbox" name = "zgoda" value = "true" title = "Wyrażenie zgody jest wymagane do przetworzenia zgłoszenia."> Wyrażam zgodę na przetwarzanie moich danych osobowych w celach rekrutacyjnych.<br/><br/>

	<input type="submit" value="Wyślij">
	<input type="reset" value="Wyczyść">
</form>
<div id = "articles_box"></div>

<script>var $_POST = <?php echo json_encode($_POST); ?>;</script>
<script type="text/javascript" src="static/js/article_formularz.js"></script>

