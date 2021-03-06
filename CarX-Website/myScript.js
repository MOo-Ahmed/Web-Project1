//http://localhost:8080//Web-Project1/CarX-Website/HomePage.html
//http://localhost:8080//Web-Project1/CarX-Website/MainWithAjax.php

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

function toggle1(x, btn, secNum){
    if(x.style.display == "none"){
        x.style.display = "block";
        var text = 'hide '.concat(secNum);
        btn.innerHTML = text;
    }
    else{
        x.style.display = "none";
        var text = 'show '.concat(secNum);
        btn.innerHTML = text;
    }
}

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
    if(table.style.backgroundColor == "red"){
        table.style.backgroundColor = "" ;
        table.style.display = "none";
    }
    else{
        
        table.style.backgroundColor = "red";
        table.style.color = "white";
    }
    
}

function ToggleNavBarIcon(word){
    if(word.innerHTML == "off"){
        word.innerHTML = "on";
    } 
    else{
        word.innerHTML = "off" ;
    }
}

$(document).ready(function(){
    $(".ToggleNavbar").innerHtml = "on" ;
});