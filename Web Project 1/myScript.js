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
