function click_apple (value) {
	if (!localStorage.click) {
		localStorage.click = 0;
	}

	if (!sessionStorage.click) {
		sessionStorage.click = 0;
	}

	if (value == 1) {
		localStorage.click++;
		sessionStorage.click++;
	}

	document.getElementById("articles_click_local").innerHTML = localStorage.click;
	document.getElementById("articles_click_session").innerHTML = sessionStorage.click;
}

click_apple (0);