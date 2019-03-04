<?php

?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>welcome</title>
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="./Styles/bootstrap.min.css">
<link rel="stylesheet" href="./Styles/bootstrap.css">
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<!-- <script  src="index.js"></script> -->
  
</head>

<body>
  
<div class="container">
  <div class="info">
    <h1 style="color:red;">Welcome to Hogwarts Common Room </h1>
  </div>
</div>
<div class="form">
  
<div class="thumbnail">
<img src="https://i.pinimg.com/736x/3c/24/6b/3c246b53c2e1659092a59bd121a4e0b5--family-crest-book-fandoms.jpg" class="portrait" alt="Image" />
</div>
<style>
    .thumbnail {
  position: relative;
  width: 200px;
  height: 200px;
  overflow: hidden;
}
.thumbnail img {
  position: absolute;
  left: 50%;
  top: 50%;
  height: 100%;
  width: auto;
  -webkit-transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
   transform: translate(-50%,-50%);
}
.thumbnail img.portrait {
  width: 100%;
  height: auto;
}
</style>
  <!-- action="/college/controllers/create-new-user.php" method="POST" -->
  <form class="register-form" >
    <input id="firstname" type="text" placeholder="firstname" name="firstname"/>
    <input id="lastname" type="text" placeholder="lastname" name="lastname"/>
    <input id="pass" type="password" placeholder="password" name="pass"/>
    <input id="email" type="text" placeholder="email address" name="email"/>
    <p id="gender"></p>
    <div class="form-group">
    <label class="custom-control custom-radio">
      <input id="radio1" name="radio" type="radio" value="male" class="custom-control-input" onclick="selctgen(this.value)" >
      <span class="custom-control-indicator"></span>
      <span class="custom-control-description">Male</span>
    </label>    
    <label class="custom-control custom-radio">
      <input id="radio2" name="radio" type="radio" value="female" class="custom-control-input" onclick="selctgen(this.value)" >
      <span class="custom-control-indicator"></span>
      <span class="custom-control-description">Female</span>
    </label>
  </div>


    <input id="birthdate" type="date" placeholder="birthdate" name="birthdate"/>
    <button id="register-button"  type="button">create</button>
    <p class="message">Already registered? <a href="#">Sign In</a></p>
  </form>

  <form class="login-form">
      <input id = "email2" type="text" placeholder="email" name= "email2"/>
      <input id = "pass2" type="password" placeholder="password" name="pass2"/>
      <button id="signin-button" type="button">login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  
</div>


<script>

$('#signin-button').click(function () {
    if(validateSignInForm()){
        $.ajax({
                type: "POST",
                url: "/Social/controllers/sign-in.php",
                data: {
                    "email2": $("#email2").val(),
                    "pass2": $("#pass2").val()
                },
                dataType: "application/json"
            })
            .complete(function (res) {
                console.log(res);
                var res = JSON.parse(res.responseText);
                console.log(res);
                if(res == null){
                    alert("wronge email or password");
                    return;
                }
                if (res.id) {
                    localStorage.setItem("id", res.id);
                    if(res.dep == null)
                    {   
                        location.href = "/Social/views/home.php"
                    }   
                }
                else {
                    alert("Wrong user name or password");
                }
            })
    }});
    
    function selctgen(gen){
        document.getElementById("gender").innerHTML = gen;
    }

    function validateRegistrationForm() {
        
        var gender = document.getElementById("gender").innerHTML;
        var userFName = document.getElementById("firstname").value;
        var userLName = document.getElementById("lastname").value;
        var userEmail = document.getElementById("email").value;
        var password = document.getElementById("pass").value;
        var BirthDate = document.getElementById("birthdate").value;
        if (userFName == null || userFName == "") {
            alert("MISSING DATA :Enter the first name please!");
            return false;
        }
        else if(userLName == null || userLName == "")
        {
            alert("MISSING DATA :Enter the last name please!");
            return false;
        }
        else if(BirthDate == null || BirthDate == "")
        {
            alert("MISSING DATA :Enter your birthdate please!");
            return false;
        }
        else if (password == null || password == "") {
            alert("MISSING DATA : Enter the password please! ");
            return false;
        }
        else if (gender==null|| gender=="")
        {
            alert("MISSING DATA : Choose the gender please! ");
            return false;
        }
        else if (validateEmail(userEmail) == false) {
            alert("WORNG Email Format");
            return false;
    
        }
        
        else return true;
    }
    
    function validateEmail(email) {
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return emailPattern.test(email);
    }



    function validateSignInForm() {
        var UserEmail = document.getElementById("email2").value;
        var password = document.getElementById("pass2").value;
    
        if (UserEmail == null || UserEmail == "") {
            alert("MISSING DATA :Enter the email please!");
            return false;
        }
        else if (password == null || password == "") {
            alert("MISSING DATA : Enter the password please! ");
            return false;
        }
    
        else return true;
    
    
    }
    
    $('.message a').click(function () {
        $('form').animate({ height: "toggle", opacity: "toggle" }, "slow");
    });
    
    $('#register-button').click(function () {
        var gender = document.getElementById("gender").innerHTML;

        console.log("nouran")
        if (validateRegistrationForm()) {
            $.ajax({
                type: "POST",
                url: "/Social/controllers/create-new-user.php",
                data: {
                    "firstname": $("#firstname").val(),
                    "lastname": $("#lastname").val(),
                    "email": $("#email").val(),
                    "pass": $("#pass").val(),
                    "birthdate": $("#birthdate").val(),
                    "gender":gender,
                },
                dataType: "application/json"
            })
                .complete(function (res) {
                    console.log(res);
                    var res = JSON.parse(res.responseText);
                    console.log(res);
                    if (res.status) {
                        localStorage.setItem("id", res.id);
                        location.href = "/Social/views/profile.php"
                    }
                    else {
                        alert("Email already exist");
                    }
                });
        }
    });

</script>



</body>
</html>
