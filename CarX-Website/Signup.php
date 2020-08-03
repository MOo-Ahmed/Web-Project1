<?php
    require('db.php');
    $user = new User();
    $user->setAll($_POST['name'], 0, $_POST["email"], $_POST["password"]);
    saveUserToDB($user);
?>