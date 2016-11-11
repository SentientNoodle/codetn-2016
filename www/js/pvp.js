function send(value) {
    $.ajax({
        url: "../../php/pvp.php",
        type: "POST",
        data: {ability: value}
    });
}