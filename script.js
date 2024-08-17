function signup(){
    var fname = document.getElementById("f_name");
    var lname = document.getElementById("l_name");
    var mobile = document.getElementById("mobile");
    var email = document.getElementById("email");
    var pw = document.getElementById("password");

    var f = new FormData();
    f.append("fn",fname.value);
    f.append("ln",lname.value);
    f.append("mo",mobile.value);
    f.append("em",email.value);
    f.append("pw",pw.value);

    var req = new XMLHttpRequest();
    req.open("POST","signup-process.php",true);
    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
            
            var resp = req.responseText;

            if(resp == "success"){
                location = "index.php";
            }else{
                alert(resp);
            }

        }
    };
    req.send(f);

    
}

function signin(){

    var email = document.getElementById("email");
    var password = document.getElementById("password");

    var form = new FormData();
    form.append("email" , email.value);
    form.append("password" , password.value);

    var req = new XMLHttpRequest();
    req.open("POST" , "signin-process.php" , true);

    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){

            var resp = req.responseText;
            
            if(resp == "success"){
                location = "home.php";
            }else{
                alert(resp);
            }
        }
    }

    req.send(form);

}


function loadmsg(){

    var receiver = document.getElementById("receiver");
    var msgContainer = document.getElementById("msgContainer");
    var req = new XMLHttpRequest();
    
   
    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
            var resp = req.responseText;
            msgContainer.innerHTML = resp;
        }
    };

    req.open("GET","load-msg-process.php?receiver="+receiver.value,true);
    req.send();

}

function send(){
    var msg = document.getElementById("msg");
    var receiver = document.getElementById("receiver");
    var form = new FormData();
        form.append("msg" , msg.value);
        form.append("receiver" , receiver.value);

    var req = new XMLHttpRequest;

    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
            var resp = req.responseText;

            if( resp == "success"){
                alert("Message Sent !");
                msg.value = "";
                loadmsg();
            }else{
                alert(resp);

            }
        }
    }

    req.open("POST" , "send.php" , true);
    req.send(form);
}

function loader(){
    setInterval(loadmsg, 500);
}

function forgot_password(){

    var email = document.getElementById("email");

    var req = new XMLHttpRequest();

    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
            var resp = req.responseText;
            if( resp == "success"){
                alert("Password Reset Successfully !");
                window.location = "index.php";
            }else{
                alert(resp);
            }
        }
    };


    req.open("GET" , "forgot-password-process.php?email="+email.value , true);
    req.send();
}