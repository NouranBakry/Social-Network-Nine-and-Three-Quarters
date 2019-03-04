<!DOCTYPE html>
<html lang="en">

<head>
<html>
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <script  src="index.js"></script> -->
 </head>


<body>
    <!-- site search navigation bar  -->
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" onclick="logo()">HOGWARTS COMMON ROOM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

       
        <div class="collapse navbar-collapse col-md-4" id="navbarColor01">
            <input class="form-control mr-sm-2" type="text" id="textField" placeholder="Search"><button class="button" id="search">GO!</button>
        </div>
        <div class="col-sm-2">
            <a onclick="show_notif()"><img src="not.png" width="25px"/></a>
            <a href="friend-requests.php"><img src="friend.png" width="45px"/> <p id="friends_no" style="display:inline;"> 25</p>  </a>
            
        </div>
        <div class="col-md-2">
            <a href="profile.php"><img src="profile-photo.jpg" height="50px"/></a>
            &nbsp;&nbsp;
            <a href="profile.php"><label id="usrname"></label></a>
        </div>
            <form class="form-inline my-2 my-lg-0">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <button type="button" class="btn"><img src="Settings-icon.png" height="30px"/></button>
                    <div class="btn-group" role="group">
                    <button id="btnGroupDrop2" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="register.php" onclick="logout()">Logout</a>
                    </div>
                    </div>
                </div>
            </form>
    </nav>

   <!-- search result navigation bar  -->

<div  style="background-color:rgb(30,40,50);" >
<ul class="nav nav-pills">
  <li class="active"><a  data-toggle="pill" href="#result1">People</a></li>
  <li ><a data-toggle="pill" href="#result2">Posts</a></li>
  <li ><a data-toggle="pill" href="#result3">E-mail</a></li>
  <li ><a data-toggle="pill" href="#result4">HomeTown</a></li>
  
</ul>
    </div>
	
	<div class="tab-content container " style="margin-top:30px; font-size:30px;" >
   <div id="result1" class="tab-pane fade in active " >
 
   </div>
	
	
	<div id="result2" class="tab-pane fade" > 
   
    </div>
    <div id="result3" class="tab-pane fade" > 
   
    </div>
    <div id="result4" class="tab-pane fade" > 
   
    </div>
    </div>
    
</body>
<script>
var x= localStorage.getItem("sText");
console.log(x);
var html="";
var html1="";
$.ajax({
                type: "POST",
                url: "/Social/controllers/control_name_search.php",
                data: {
                    "searchText": localStorage.getItem("sText")
                },
                dataType: "application/json"
            })
            .complete(function (res) {
                console.log(res);
                var res = JSON.parse(res.responseText);
                for(var k in res){
                    html+='<div id="'+ res[k]["user_id"] +'" onclick="goto_friend(this.id)"> ';
                  html+=res[k]["f_name"]
                  html+="    ";
                  html+=res[k]["l_name"]
                    html+="</div>";

                    
                }document.getElementById("result1").innerHTML += html;
                console.log(res);
              

                
                });


$.ajax({
                type: "POST",
                url: "/Social/controllers/control_post_search.php",
                data: {
                    "searchText": localStorage.getItem("sText")
                },
                dataType: "application/json"
            })
            .complete(function (res) {
                console.log(res);
                var res = JSON.parse(res.responseText);
                for(var k in res){
                    html1+="<div> ";
                  html1+=res[k]["f_name"]
                  html1+="    ";
                  html1+=res[k]["l_name"]
                  html1+="    ";
                  html1+=res[k]["caption"]

                    html1+="</div>";

                    
                }document.getElementById("result2").innerHTML += html1;
                console.log(res);
              

                
                });
            $.ajax({
                type: "POST",
                url: "/Social/controllers/control_email_search.php",
                data: {
                    "searchText": localStorage.getItem("sText")
                },
                dataType: "application/json"
            })
            .complete(function (res) {
                console.log(res);
                var res = JSON.parse(res.responseText);
                for(var k in res){
                    html1+="<div> ";
                  html1+=res[k]["f_name"]
                  html1+="    ";
                  html1+=res[k]["l_name"]
                  

                    html1+="</div>";

                    
                }document.getElementById("result3").innerHTML += html1;
                console.log(res);
              

                
                });
               
               $.ajax({
                type: "POST",
                url: "/Social/controllers/control_hometown_search.php",
                data: {
                    "searchText": localStorage.getItem("sText")
                },
                dataType: "application/json"
            })
            .complete(function (res) {
                console.log(res);
                var res = JSON.parse(res.responseText);
                for(var k in res){
                    html1+="<div> ";
                  html1+=res[k]["f_name"]
                  html1+="    ";
                  html1+=res[k]["l_name"]
                  

                    html1+="</div>";

                    
                }document.getElementById("result4").innerHTML += html1;
                console.log(res);
              

                
                });
               
               

function logo(){
    if(localStorage.getItem("id")){
        window.location = "/Social/views/home.php";
    }
    else {
        window.location = "/Social/views/register.php";
    }
}

function logout(){
        localStorage.setItem("id", "");
    }

function goto_friend(friend_id){

   
    localStorage.setItem("friend_id", friend_id);
    location.href="/Social/views/vistor.php";
}

$.ajax({
    type: "POST",
    url: "/Social/controllers/home-controller.php",
    data: {
        "userid": localStorage.getItem("id")
    },
    dataType: "application/json"
})

            .complete(function(res){
                console.log(res);
                var res = JSON.parse(res.responseText);
                console.log(res);
        
                document.getElementById("usrname").innerHTML = res.fName;
           
            })       


$('#search').click(function () {
       var searchText= document.getElementById("textField").value;
       console.log(searchText);
       //console.log(document.getElementById("textField").value);
       //console.log (searchText);
       localStorage.setItem("sText", searchText);
       location.href = "/Social/views/searchResult.php"
       searchText=null;
       
    });

$.ajax({
                type: "POST",
                url: "/Social/controllers/friend-request-not_controller.php",
                data: {
                    "user_id" : localStorage.getItem("id")
                },
                dataType: "application/json"
            })
            .complete(function(res){
                console.log(res);
                var res = JSON.parse(res.responseText);
                console.log(res);
                
                document.getElementById("friends_no").innerHTML = res.length;
                
            });
  
   </script>   

   </html>