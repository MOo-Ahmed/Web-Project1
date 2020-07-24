//http://localhost:8080//Web-Project1/CarX-Website/HomePage.html

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

$(document).ready(function(){
    
    function fetch_form(){
        var f = document.getElementById("shortForm");
        f.style.display = "block" ;
        document.getElementById('submitUpdateBtn').style.display = "none";
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
                $('#live_data').html(data) ;
            }
        });
    }
    
    fetch_crud();
    hide_form();
    
    $(document).on('click', '#newCar', function(){
      fetch_form();
    });
    
    $(document).on('click', '#submitUpdateBtn', function(){
        var model = $('#model').val();
        var brand = $('#brand').val();
        var price = $('#price').val();
        var warranty = $('#warranty').val();
        $.ajax({
            url: 'UpdateCar.php',
            type: 'POST',
            data: {
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
        
    $(document).on('click', '.btn_delete', function(){  
        var id=$(this).data("id3");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"delete.php",  
                method:"POST",  
                data:{ID:id},  
                dataType:"text",  
                success:function(data){  
                    fetch_data();  
                }  
            });  
        }  
    }); 
    
    $(document).on('click', '.btn_update', function(){
        var id = $(this).data("id2"); 
        $.ajax({
            url: 'updateForm.php',
            type: 'POST',
            data: {
                'ID': id,
            },
            success: function(data){
                //alert("update");
                hide_form();
                $('.crudForm').html(data) ;
            }
        });
    }); 
    
    $(document).on('click', '.btn_view', function(){
        var id = $(this).data("id1"); 
        $.ajax({
            url: 'view.php',
            type: 'POST',
            data: {
                'ID': id,
            },
            success: function(data){
                hide_form();
                $('.crudForm').html(data) ;
                
            }
        });
    });
});