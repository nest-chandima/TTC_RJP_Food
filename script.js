function search() {
    var time = document.getElementById("time").value;
    var budget = document.getElementById("budget").value;
    var type = document.getElementById("type").value;

    var form = new FormData();
    form.append("time", time);
    form.append("budget", budget);
    form.append("type", type);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var response = request.responseText;

            document.getElementById("main").innerHTML = response;

        }
    }
    request.open("POST", "searchFood.php", true);
    request.send(form);
}

function clearSearch() {
    window.location.reload();
}