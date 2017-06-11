$(function() {
    $( document ).tooltip();
});

$(function() {
    $( "#dialog" ).dialog();
});

if ($_POST["imie"] != '' && $_POST["nazwisko"] != '' && $_POST["email"] != '' && $_POST["zgoda"] == "true") {

    switch ($_POST["plec"]) {
        case "":
            $plec = "nie podano";
            break;

        case "kobieta":
            $plec = "kobieta";
            break;

        case "mezczyzna":
            $plec = "mężczyzna";
            break;
    }

    if (typeof($_POST["staz"]) == "undefined") {
        $staz = "";
    } else {
        $staz = $_POST["staz"];
    }

    switch ($staz) {
        case "":
            $staz = "nie podano";
            break;

        case "<1":
            $staz = "poniżej jednego roku";
            break;

        case "1 - 3":
            $staz = "od roku do trzech lat";
            break;

        case "3 - 10":
            $staz = "od trzech do dziesięciu lat";
            break;

        case ">10":
            $staz = "powyżej dziesięciu lat";
            break;
    }
    
    var box = document.createElement("DIV");

    box.appendChild(document.createTextNode("Imię: " + $_POST["imie"]));
    box.appendChild(document.createElement("br"));
    box.appendChild(document.createTextNode("Nazwisko: " + $_POST["nazwisko"]));
    box.appendChild(document.createElement("br"));
    box.appendChild(document.createTextNode("E-mail: " + $_POST["email"]));
    box.appendChild(document.createElement("br"));
    box.appendChild(document.createTextNode("Płeć: " + $plec));
    box.appendChild(document.createElement("br"));
    box.appendChild(document.createTextNode("Próbka: " + $_POST["probka"]));
    box.appendChild(document.createElement("br"));
    box.appendChild(document.createTextNode("Staż: " + $staz));

    box.id = "dialog";
    box.title = "Twój formularz";

    document.getElementById("articles_box").appendChild(box);
}