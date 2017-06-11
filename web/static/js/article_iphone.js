	var model = ["2G", "3G", "3GS", "4", "4S", "5", "5S", "5c", "6", "6 Plus", "6S", "6S Plus"];
	var release = ["29 czerwca 2007", "11 lipca 2008", "19 czerwca 2009", "24 czerwca 2010", "14 października 2011", "21 września 2012", "10 września 2013", "10 września 2013", "9 września 2014", "9 września 2014", "25 września 2015", "25 września 2015"];

	var i = 0;
	
	function add_span () {
		if (i + 1 <= model.length && model.length == release.length) {
			var tr = document.createElement("TR");
			var td1 = document.createElement("TD");
			var td2 = document.createElement("TD");
			var text1 = document.createTextNode(model[i]);
			var text2 = document.createTextNode(release[i]);

			tr.appendChild(td1);
			tr.appendChild(td2);
			td1.appendChild(text1);
			td2.appendChild(text2);

			tr.id = "articles_iphone_table_" + i;
			tr.style.display = "none";

			document.getElementById("articles_iphone_table").appendChild(tr);

			$("#articles_iphone_table_" + i).fadeIn("slow");

			i++;
		}
	}

	function del_span () {
		if (i >= 1) {
			var id = "articles_iphone_table_" + (i - 1);

			$("#" + id).fadeOut("slow", function(){
				var elem = document.getElementById(id);
				elem.parentNode.removeChild(elem);
				i--;
			});
		}
	}