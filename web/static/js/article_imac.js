function select_photo (photo) {
	for (var i = 1; i < 6; i++) {
		document.getElementById("articles_imac_galery_imac_" + i).className = "articles_imac_galery_photo";
	}
	document.getElementById("articles_imac_galery_imac_" + photo).className += " articles_imac_galery_photo_active";

	document.getElementById("articles_imac_galery_fullphoto").src = "static/img/imac_" + photo + ".jpg";
}

select_photo (1);