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
    var form = new FormData();
    form.append("user", document.forms['Connexion'].elements['user'].value);
    form.append("pass", document.forms['Connexion'].elements['pass'].value);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            var id = document.forms['Connexion'].elements['user'];
            var pwd = document.forms['Connexion'].elements['pass'];
            var answer = xhr.responseText;
            if(answer=="valid"){
                //xhr.open("GET", "index.php", true);
                //xhr.send();
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
            else if (answer=="pwd"){
                id.style.backgroundColor = "";
                id.placeholder = "";
                pwd.style.backgroundColor = "red";
                pwd.value = "";
                pwd.placeholder = "Mauvais mot de passe";
            }
            else
                alert(answer);
        }
    };
    xhr.open("POST", "checkConnect.php", true);
    xhr.setRequestHeader("Conent-tyoe", "application/x-www-form-urlencoded");
    xhr.send(form);
}

function signup(){
    var xhr = getXMLHttpRequest();
    var form = new FormData();
    form.append("pseudo", document.forms['Inscription'].elements['user'].value);
    form.append("firstname", document.forms['Inscription'].elements['firstname'].value);
    form.append("name", document.forms['Inscription'].elements['name'].value);
    form.append("email", document.forms['Inscription'].elements['email'].value);
    form.append("pwd", document.forms['Inscription'].elements['pass'].value);
    form.append("pwd2", document.forms['Inscription'].elements['passCheck'].value);
    xhr.onreadystatechange = function () {
        var pseudo = document.forms['Inscription'].elements['user'];
        var firstname = document.forms['Inscription'].elements['firstname'];
        var name = document.forms['Inscription'].elements['name'];
        var email = document.forms['Inscription'].elements['email'];
        var pwd = document.forms['Inscription'].elements['pass'].value;
        var pwd2 = document.forms['Inscription'].elements['passCheck'];
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            var answer = xhr.responseText;
            if(answer=="valid")
                window.location = "index.php";
            else if (answer=="id"){
                pseudo.style.backgroundColor = "red";
                pwd.value="";
                pwd2.value="";
            }
            else if(answer=="firstname"){
                firstname.style.backgroundColor="red"
                pwd.value="";
                pwd2.value="";
            }
            else if(answer=="name") {
                name.style.backgroundColor = "red";
                pwd.value="";
                pwd2.value="";
            }
            else if(answer=="mail"){
                email.style.backgroundColor="red";
                pwd.value="";
                pwd2.value="";
            }
            else if(answer=="pwd"){
                pwd.style.backgroundColor="red";
                pwd2.style.backgroundColor="red";
                pwd.value="";
                pwd2.value="";
            }
            else
                alert("Erreur serveur");
        }
    };
    xhr.open("POST", "checkRegister.php", true);
    xhr.setRequestHeader("Conent-tyoe", "application/x-www-form-urlencoded");
    xhr.send(form);
}