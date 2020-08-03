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
    <script>
        $(document).ready(function(){
    
            function fetch_form(){
                var f = document.getElementById("shortForm");
                f.style.display = "block" ;
                document.getElementById('submitUpdateBtn').style.display = "none";
            }

            function showViewResults(data){
                var div = document.createElement("div");
                div.className = 'table-responsive';
                div.setAttribute("id", "liveViewTable");
                var table = document.createElement("table");

                table.className = 'table table-striped';
                var tr = table.insertRow(-1); // The -1 inserts new row at the last position                   
                var td = document.createElement("td");
                td.innerHTML = data.ID ;
                var td2 = document.createElement("td");
                td2.innerHTML = data.model;
                var td3 = document.createElement("td");
                td3.innerHTML = data.brand ;
                var td4 = document.createElement("td");
                td4.innerHTML = data.price ;
                var td5 = document.createElement("td");
                td5.innerHTML = data.warranty ;

                var th1 = document.createElement("th");
                th1.innerHTML = "ID" ;

                var th2 = document.createElement("th");
                th2.innerHTML = "Model" ;

                var th3 = document.createElement("th");
                th3.innerHTML = "Brand" ;

                var th4 = document.createElement("th");
                th4.innerHTML = "Price" ;

                var th5 = document.createElement("th");
                th5.innerHTML = "Warranty" ;

                tr.appendChild(th1);
                tr.appendChild(td);

                tr = table.insertRow(-1);
                tr.appendChild(th2);
                tr.appendChild(td2);

                tr = table.insertRow(-1);
                tr.appendChild(th3);
                tr.appendChild(td3);

                tr = table.insertRow(-1);
                tr.appendChild(th4);
                tr.appendChild(td4);

                tr = table.insertRow(-1);
                tr.appendChild(th5);
                tr.appendChild(td5);

                div.appendChild(table);
                return div ;
            }

            function showSelectResults(data){
                var div = document.createElement("div");
                div.className = 'table-responsive';
                var table = document.createElement("table");
                table.setAttribute("id", "crudTable");
                table.className = 'table table-dark';
                var tr = table.insertRow(-1); // The -1 inserts new row at the last position                   

                var th1 = document.createElement("th");
                th1.innerHTML = "ID" ;

                var th2 = document.createElement("th");
                th2.innerHTML = "Model" ;

                var th3 = document.createElement("th");
                th3.innerHTML = "view" ;

                var th4 = document.createElement("th");
                th4.innerHTML = "edit" ;

                var th5 = document.createElement("th");
                th5.innerHTML = "delete" ;

                tr.appendChild(th1);
                tr.appendChild(th2);
                tr.appendChild(th3);
                tr.appendChild(th4);
                tr.appendChild(th5);

                for (var i = 0; i < data.length; i++) {
                    tr = table.insertRow(-1);
                    //for(var j = 0; j < 5; j++)   var tabCell = tr.insertCell(-1);
                    var td = document.createElement("td");
                    var td2 = document.createElement("td");
                    var td3 = document.createElement("td");
                    var td4 = document.createElement("td");
                    var td5 = document.createElement("td");

                    td.innerHTML = data[i].id;
                    td2.innerHTML = data[i].model ;
                    tr.appendChild(td);
                    tr.appendChild(td2);
                    var btnView = document.createElement("button");
                    var btnUpdate = document.createElement("button");
                    var btnDelete = document.createElement("button");

                    btnView.className = 'btn btn-md btn-light btn_view';
                    btnView.innerHTML = "View" ;
                    btnView.setAttribute("data-id1" , data[i].id);
                    btnUpdate.className = 'btn btn-md btn-warning btn_update';
                    btnUpdate.innerHTML = "Update" ;
                    btnUpdate.setAttribute("data-id2" , data[i].id);
                    btnDelete.className = 'btn btn-md btn-danger btn_delete';
                    btnDelete.innerHTML = "Delete" ;
                    btnDelete.setAttribute("data-id3" , data[i].id);

                    td3.appendChild(btnView);
                    td4.appendChild(btnUpdate);
                    td5.appendChild(btnDelete);
                    tr.appendChild(td3);
                    tr.appendChild(td4);
                    tr.appendChild(td5);
                }

                div.appendChild(table);
                return div ;            
            }

            function hide_form(){
                var f = document.getElementById("shortForm");
                f.style.display = "none" ;
                //alert("hide");
            }

            function fetch_crud(){
                $.ajax({
                    url: 'select.php',
                    type: 'POST',
                    success: function(data){
                        //alert("I'm here..");
                        var res = JSON.parse(data);
                        var table = showSelectResults(res);
                        $("#live_data").html(table);
                    }
                });
            }

            function showUpdateForm(data){
                fetch_form();
                document.getElementById('id').setAttribute("value", data.ID);
                document.getElementById('model').setAttribute("value", data.model);
                document.getElementById('price').setAttribute("value", data.price);
                document.getElementById('brand').setAttribute("value", data.brand);
                document.getElementById('warranty').setAttribute("value", data.warranty);
                document.getElementById('submitUpdateBtn').style.display = "block";
                document.getElementById('submitInsertBtn').style.display = "none";
            }

            fetch_crud();
            hide_form();

            $(document).on('click', '#newCar', function(){
                document.getElementById('liveViewTable').style.display = "none" ;
              fetch_form();
            });

            $(document).on('click', '#submitUpdateBtn', function(e){
                e.preventDefault();
                var id = $('#id').val();
                var model = $('#model').val();
                var brand = $('#brand').val();
                var price = $('#price').val();
                var warranty = $('#warranty').val();
                $.ajax({
                    url: 'Updatedb.php',
                    type: 'POST',
                    data: {
                        'ID' : id ,
                        'model': model,
                        'brand': brand,
                        'price': price,
                        'warranty': warranty,  
                    },
                    success: function(response){
                        fetch_crud();
                        document.getElementById('submitUpdateBtn').style.display = "none";
                        hide_form();
                    }
                });
                return false;
            });

            // save new car to database
            $(document).on('click', '#submitInsertBtn', function(){
              //alert("success");
              var model = $('#model').val();
              var brand = $('#brand').val();
              var price = $('#price').val();
              var warranty = $('#warranty').val();
              $.ajax({
                    url: 'insert.php',
                    type: 'POST',
                    data: {
                        'model': model,
                        'brand': brand,
                        'price': price,
                        'warranty': warranty,  
                    },
                    success: function(response){
                        //alert("suc");
                        $('#brand').val('');
                        $('#model').val('');
                        $('#price').val('');
                        $('#warranty').val('');
                        fetch_crud();
                        hide_form();
                    }
                });
            });

            // delete specific car    
            $(document).on('click', '.btn_delete', function(){ 

                document.getElementById('liveViewTable').style.display = "none" ;
                var id=$(this).data("id3");  
                if(confirm("Are you sure you want to delete this?"))  
                {  
                    $.ajax({  
                        url:"delete.php",  
                        method:"POST",  
                        data:{ID:id},  
                        dataType:"text",  
                        success:function(data){  
                            fetch_crud();  
                        }  
                    });  
                }  
            }); 

            $(document).on('click', '.btn_update', function(){

                document.getElementById('liveViewTable').style.display = "none" ;
                var id = $(this).data("id2"); 
                $.ajax({
                    url: 'updateForm.php',
                    type: 'POST',
                    data: {
                        'ID': id,
                    },
                    success: function(data){
                        var res = JSON.parse(data);
                        showUpdateForm(res);
                    }
                });
            }); 

            $(document).on('click', '.btn_view', function(){

               // document.getElementById('liveViewTable').style.display = "block" ;
                var id = $(this).data("id1"); 
                $.ajax({
                    url: 'view.php',
                    type: 'POST',
                    data: {
                        'ID': id,
                    },
                    success: function(data){
                        hide_form();
                        var res = JSON.parse(data);
                        var div = showViewResults(res);
                        $('#live_view').html(div);

                    }
                });
            });
        });
    </script>
</html>
