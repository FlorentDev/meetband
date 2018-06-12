function to_register() {
    document.getElementById("connect").style.display="none";
    document.getElementById("register").style.display="block";
}

function to_login() {
    document.getElementById("connect").style.display="block";
    document.getElementById("register").style.display="none";
}

function log() {
    var xhr = getXMLHttpRequest();
    var id = document.forms['Connexion'].elements['user'];
    var pwd = document.forms['Connexion'].elements['pass'];
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            answer = xhr.responseText;
            if(answer=="valid"){
                xhr.open("GET", "index.php", true);
                xhr.send();
                window.location = "index.php";
            }
            else if (answer=="id"){
                id.style.backgroundColor = "red";
                id.vale = "";
                id.placeholder = "Inexistant";
                pwd.placeholder = "";
                pwd.style.backgroundColor = "";
                pwd.value = "";
            }
            if (answer=="pwd"){
                id.style.backgroundColor = "";
                id.placeholder = "";
                pwd.style.backgroundColor = "red";
                pwd.value = "";
                pwd.placeholder = "Mauvais mot de passe";
            }
        }
    };
    xhr.open("POST", "checkConnect.php", true);
    xhr.setRequestHeader("Conent-tyoe", "application/x-www-form-urlencoded");
    xhr.send("pseudo=" + id.value + "&pwd=" + pwd.value);
}

function sign(callback) {
    var xhr = getXMLHttpRequest();
    xhr.onreadystatechange = function () {
        if(xhr.readyState==4 && (xhr.status==200 || xhr.status == 0)){
            callback(xhr.responseText);
        }
        xhr.open("POST")
    }
}