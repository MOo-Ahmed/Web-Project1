<!DOCTYPE html>   
<html>
<head>
    <title>CarX Store | Main</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <script src="myScript.js"></script>
</head>

<body class="container-fluid">
    <nav class="navbar navbar-expand-xl|lg|md|sm bg-dark navbar-light fixed-top">
        <h1 class="siteName"><a class="navLink" href="HomePage.html">CarX</a></h1>
        <h3 class="brandWords">Giving you the best</h3>
    </nav>
    <nav class="navbar navbar-expand-sm beBlack fixed-top mb-5" id="MyNavBar">
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#collapsibleNavbar">
            <span id="ToggleNavbar1" onclick="ToggleNavBarIcon(document.getElementById("ToggleNavbar1"))"
                   class="ToggleNavbar">on</span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav" id="ulNavBar">
                <li class="nav-item">
                  <a class="nav-link" href="HomePage.html">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Main.php">Main</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="MainWithAjax.php">Main with ajax</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Products.html">Products</a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="MainDiv" class="container">
        <a href = "NewCarForm.html"  class="btn btn-md btn-primary mr-3 mb-5 mt-5">insert new car</a>
        <a href = "ViewAllCars.php"  class="btn btn-md btn-primary mb-5 mt-5">Select all cars</a>
        <?php 
            require('db.php');
            selectSampleDataFromDataBase();
            
        ?>

    </div>
</body>
</html> 