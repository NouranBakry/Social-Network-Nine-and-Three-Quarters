<!DOCTYPE html>
<html lang="en">

<head> 
    <title> SOCIAL </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='./Styles/bootstrap.min.css' />
    <link rel='stylesheet' href='./Styles/bootstrap.css' />
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
   
    <!-- <link rel="icon" type="image/png" href="my_site_icon.png" sizes="16x16"> -->
</head>
  <style>
#slot {
    border-bottom: 5px solid black;
    margin-top: 10px;
    margin-bottom: 20px;
    margin-right: 30px;
    margin-left: 30px;
}

button {
  padding: 5px 10px;
  font-size: 15px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #EF3B3A;
  border: none;
  border-radius: 5px;
  box-shadow: 0 6px #999;
  margin-bottom: 10px;
}

.button:hover {background-color: #FF0000}

.button:active {
  background-color: #FF0000;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

</style>
</head>
<body >

 <!-- navigation bar -->
      <!-- navigation bar -->
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






<div>

<p id="my_friends"></p>

</div>



</body>

<script>

// MUST ATTACHED FUNCTIONS 

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

    console.log(localStorage.getItem("id"));
 $.ajax({
    type: "POST",
    url: "/Social/controllers/control-friends.php",
    data: {
        "userid": localStorage.getItem("id")
    },
    dataType: "application/json"
})

            .complete(function(res){
                console.log(res);
                var res = JSON.parse(res.responseText);
                console.log(res);
                
                

                for(i=0; i < res.length; i++){
                    p = '<div id="slot" class="row justify-content-around">';
                    if(res[i]["n_name"])
                   { 
                    p += '<h3 class="col-4">' + '<a id="'+  res[i]["user_id"] + 'f" onclick="goto_friend(this.id)">' +  res[i]["f_name"] + " " + res[i]["l_name"] + "(" +res[i]["n_name"] +")" +'</a> </h3>'
                   }
                   else {p += '<h3 class="col-4" >' + '<a id="'+  res[i]["user_id"] + 'f" onclick="goto_friend(this.id)">' +  res[i]["f_name"] + " " + res[i]["l_name"] + '</a> </h3>'}
                   p+='<button class="col-1" value="'+res[i]["user_id"]+'" id="'+ res[i]["user_id"] +'e'+'" onclick="unfriend(this.value)">Unfriend</button>';
                //    p += '<button class="col-1" value="'+res[i]["user_id"]+'" id="'+ res[i]["user_id"] +'"onclick="unfriend(this.value) ">Add friend</button>';
                   p+='</div>';

                   document.getElementById("my_friends").innerHTML += p;
                }
               
           
            })

            $.ajax({
                type: "POST",
                url: "/Social/controllers/control_profile.php",
                data: {
                    "userid": localStorage.getItem("id")
                },
                dataType: "application/json"
            })
            .complete(function(res){
                console.log(res);
                var res = JSON.parse(res.responseText);
                console.log(res);

                firstname=res.fName;

                document.getElementById("usrname").innerHTML = firstname;

            
            })        

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
            
// END OF MUST ATTACHED FUNCTIONS 

function goto_friend(f_id){

    friend_id = f_id.slice(0, -1);
    localStorage.setItem("friend_id", friend_id);
    location.href="/Social/views/vistor.php";
}


function unfriend(unfriend_id){

    $.ajax({
    type: "POST",
    url: "/Social/controllers/unfriend-control.php",
    data: {
        "userid": localStorage.getItem("id"),
        "friend_id" : unfriend_id
    },
    dataType: "application/json"
})

                .complete(function(res){
                console.log(res);
                var res = JSON.parse(res.responseText);
                console.log(res);
            })
            // var i = unfriend_id+"e";
            // $('#'i).fadeIn(2200);
            // $(unfriend_id).fadeOut(2200);

}


$('#search').click(function () {
       var searchText= document.getElementById("textField").value;
       console.log(searchText);
       //console.log(document.getElementById("textField").value);
       //console.log (searchText);
       localStorage.setItem("sText", searchText);
       location.href = "/Social/views/searchResult.php"
       searchText=null;
       
    });

</script>


</html>