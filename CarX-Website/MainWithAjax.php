<?php
	SESSION_START();
	$_SESSION["name"] = "Mo" ;
?>
<!DOCTYPE html>   
<html>
<head>
    <title>CarX Store | Main with ajax</title>
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
                  <a class="nav-link" href="Products.html">Products</a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="MainDiv" class="container">
        <div class="row">
            <div id="FormDiv" class="col-4 crudForm">
                <div id="live_view"></div>
                <form id="shortForm" method="post" name="newCar" target="_self">
                    <div class="form-group">
                        <input name="model" class="form-control mt-sm-5 mb-3 mr-sm-2" type="text" placeholder="Car model .." autofocus required id = "model" value="">
                    </div>
                    <div class="form-group">
                        <input placeholder="Car brand name" name="brand" class="form-control mb-3 mr-sm-2" type="text" required id = "brand">
                    </div>
                    <div class="form-group">
                        <input placeholder="Car price"  name="price" class="form-control mb-4 mr-sm-2" type="text" required id = "price">
                    </div>
                    <div class="form-group">
                        <input placeholder="Years of Warranty"  name="warranty" class="form-control mb-3 mr-sm-2" type="text" required id = "warranty">
                    </div>
                    <input type="reset" value="Reset" class="btn btn-sm btn-warning mb-2" >
                    <input type = "text" style="display:none;" name="id" id="id" >
                    <input type="submit" id="submitInsertBtn" value="add"  class="btn btn-info btn-block mb-5 mlsm-4 mrsm-4">
                    <input type="submit" id="submitUpdateBtn" value="update"  class="btn btn-info btn-block mb-5 mlsm-4 mrsm-4" style="display:none;">
               </form>
            </div>
            <div class="col-8">
                <a id="newCar"  class="btn btn-md btn-primary mr-3 mb-5 mt-5">insert new car</a>
                <a href = "ViewAllCars.php" id="getAll"  class="btn btn-md btn-primary mb-5 mt-5">Select all cars</a>
                <div id="live_data"></div>
            </div>
        </div>
    </div>
</body>
</html>
