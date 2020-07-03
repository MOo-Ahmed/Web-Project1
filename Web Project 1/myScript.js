function validateLoginForm()
{
	var email = document.forms["login"]["email"].value;
    var psw = document.forms["login"]["psw"].value;
    if (email === "") {
        window.alert("Email/Username shouldn't be empty");
        return false;
    }
    else if (psw.toString().length <= 2 ){
        window.alert("Password must be longer");
        return false;
    }
    alert("Successful login");
    return true;
}

function validateRegisterForm()
{
    var name = document.forms["register"]["name"].value;
    var email = document.forms["register"]["email"].value;
    var psw = document.forms["register"]["psw"].value;
    var psw2 = document.forms["register"]["psw2"].value;
    if(name.length <= 1){
        alert("Invalid name !");
        return false;
    }
    else if(email.indexOf(" ") != -1)
    {
       alert("Invalid email !");
        return false ;
    }
    else if(psw.length < 8)
    {
       alert("Password should exceed 7 characters !");
        return false ;
    }
    else if(psw !== psw2)
    {
       alert("Passwords don't match !");
        return false ;
    }
    alert("Successful registration");
    return true ;
}

function toggle1(x){
    if(x.style.display == "none"){
        x.style.display = "block";
    }
    else{
        x.style.display = "none";
    }
}

$(document).ready(function(){
    $("button").click(function(){
        $.get("", function(data) {
            alert(data);
        });
    });
});

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#T1 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

function highlightRows(){
    var table = document.getElementById("T1");
    if(table.style.backgroundColor == "yellow"){
        table.style.backgroundColor = "" ;
        table.style.color = "white";
    }
    else{
        table.setAttribute("style", "background-color:yellow;");
        table.style.color = "black";
    }
    
}