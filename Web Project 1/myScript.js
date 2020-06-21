function validateLoginForm()
{
	var email = document.forms["login"]["email"].value;
    var psw = document.forms["login"]["psw"].value;
    if (email.indexOf(" ") != -1) {
        window.alert("Email shouldn't contain white space");
        return false;
    }
    else if (psw.length < 8){
        
        window.alert("Password must be at least 8 characters");
        return false;
    }
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
    return true ;
}
