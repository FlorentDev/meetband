function message() {
    var xhr = getXMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            document.getElementById("conv").innerHTML=xhr.responseText;
        }
    };
    xhr.open("POST", "message.php", true);
    xhr.send();
    window.setTimeout(message(), 100);
}

function contact() {
    var xhr = getXMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            document.getElementById("contact").innerHTML=xhr.responseText;
            window.setTimeout(contact(), 5000);
        }
    };
    xhr.open("POST", "contact.php", true);
    xhr.send();
}


contact();