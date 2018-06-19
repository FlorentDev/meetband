function message() {
    var xhr = getXMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            document.getElementById("conv").innerHTML=xhr.responseText;
            window.setTimeout(message(), 100);
        }
    };
    xhr.open("POST", "message.php", true);
    xhr.send();
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

function changeContact(contact){
    var xhr = getXMLHttpRequest();
    xhr.open("GET", "activeContact.php?contact="+contact, true);
    xhr.send();
}

document.onload = contact();
document.onload = message();