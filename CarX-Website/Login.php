<?php
    session_start();
    $message = "" ;
    
    if(!isset($_SESSION['id'])){
        header("Login.php") ;
    }
    
    require('db.php');
    if(isset($_POST["email"]) && isset($_POST["password"])){
        $connection = establishConnection();
        $email = $_POST["email"] ;
        $password = $_POST["password"] ;
        $query = "select * from `user` where `email` = '$email' and `password` = '$password' limit 1";
        $result = mysqli_query($connection, $query);
        $counter = 0;
        $id = -1 ;
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $counter++;
        }
        mysqli_close($connection);
        if($counter == 1) {
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $id;
            header("Location: HomePage.html");
        } else {
            $message = "Please enter correct info";
        }
    }

echo '
<!DOCTYPE html>
<html>
<head>
    <title>CarX Store | Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.00, maximum-scale=2.00, minimum-scale=1.00">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
     <script src="./js/jquery.min.js"></script>
    <script src= "myScript.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    
</head>
<body class="container-fluid" id="LoginPage">
    <div class="container">
      <form  action="Login.php" method="post" name="login" class="myForm"  target="_self">
        <br><br>
          <h1 class="siteName"><a class="navLink" href="#">CarX</a></h1>
        <div class="form-group">
            <input placeholder="Your e-mail" name="email" class="form-control mt-sm-5 mb-6 mr-sm-2" type="text" id="loginEmail" required autofocus>
            
        </div>
        <div class="form-group">
            <input placeholder="Your password"  name="password" class="form-control mb-6 mr-sm-2" type="password" id="loginPassword" maxlength="15" required>
            <input type="reset" value="Reset" class="btn btn-sm btn-dark mt-3 mb-3 ml-4">
            <input type="submit" id="submitSignInBtn" value="Log in"  class="btn btn-success btn-block mb-8 mlsm-4 mr-sm-4" > 
            <br>
            <label>'.$message.'</label>
            <br>
            <label>Not registered yet? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <a href="RegPage.html" class="btn btn-sm btn-primary mb-2 mt-3">Sign Up</a>
        </div>               
      </form>  
    </div>
</body>
' ;
    /*
    <script>
        
        $(document).on('click', '#submitSignInBtn', function(event){
            event.preventDefault();
            var email = $('#loginEmail').val();
            var password = $('#loginPassword').val();
            if(password.length > 0 && email.length > 0){
                alert("I got here") ;
                $.ajax({
                    url: 'Login.php',
                    type: 'POST',
                    data: {
                        'email': email,
                        'password': password,
                    },
                    success: function(data){
                        var res = JSON.parse(data);
                        alert(res.result);
                        if(res.result == "success"){
                            window.location.href = "HomePage.html";
                        }
                        else{
                            $('#loginEmail').val('');
                            $('#loginPassword').val('');
                        }
                        
                    }
                    
                });
            }
            else{
                $('#loginEmail').val('');
                $('#loginPassword').val('');
            }
        });
    </script>
    */
echo '</html>' ; 

?>