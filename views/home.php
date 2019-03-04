<!DOCTYPE html>
<html lang="en">

<head> 
    <title> SOCIAL </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="./Styles/bootstrap.min.css">
<link rel="stylesheet" href="./Styles/bootstrap.css">
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <link rel="icon" type="image/png" href="my_site_icon.png" sizes="16x16"> -->
</head>

<body>
    
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

    <div class="row">
        <!-- Right Side -->
        <div class="col-md-3">

            <h5>Latest Posts</h5>
        </div>

        <!-- Left Side -->
        <div class="col-md-8">
            <div>
            <header>Share Post</header>
            <!-- <textarea id="caption" cols="50" rows="1" placeholder="caption"></textarea> -->
            <textarea id="caption" cols="50" rows="5" placeholder="Something in your mind !!"></textarea>

            <FOOTER>
                <div class="row">
                    <div>
                        <div class="form-group col-md-2">
                            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                    </div>
                    </div>  
                    <div class="form-group col-md-2 ">
                    <select class="form-control" id="privacy-select">
                        <option id="public" >Public</option>
                        <option id="friends">Friends</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clear_post()">Clear</button>
                    <button type="button" class="btn " style="background-color: #EF3B3A; color: #FFFFFF;" onclick="new_post()">POST</button>
                </div>
                </div>

            </FOOTER>

            <div class="alert alert-dismissible alert-success" id="post_not" style="display: none;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Done!</strong> Your Post succefully posted.
            </div>


            </div>  
            <p id="posts"></p>

        </div>
        
    

    </div>

    <!-- Scripts -->
   <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->

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


// END OF MUST ATTACHED FUNCTIONS 


$.ajax({
                type: "POST",
                url: "/Social/controllers/home-posts_controller.php",
                data: {
                    "userid": localStorage.getItem("id")
                },
                dataType: "application/json"
            })
            .complete(function(res){
                console.log(res);
                var res = JSON.parse(res.responseText);
                console.log(res);


        for(i = res.length-1; i >= 0 ; i--){

            p = '<div class="card border-primary mb-3">';
            p += '<div class="card-header"><strong>' + res[i]["f_name"] + " " + res[i]["l_name"]  + '</strong>  <p>' + res[i]["post_date"] + '</p>'+ res[i]["state"] + '</div>';
            p += '<div class="card-body text-primary">';
            p += '<p class="card-text">' + res[i]["caption"] + '</p>';
            p += '</div>';
            p += '<div class="card-footer">';
            p += '<span class="badge badge-pill btn" style="background-color: #EF3B3A; color: #FFFFFF;"><a>like</a></span>';
            p += '</div>';
            p += '</div>';

            document.getElementById("posts").innerHTML += p ;
        }
                })



    function clear_post(){
        
        document.getElementById("caption").value = "";

    }

      function new_post(){

        var state_o =  document.getElementById("privacy-select");
        var state = state_o.options[state_o.selectedIndex].text;
        var caption = document.getElementById("caption").value;
        var usrname = document.getElementById("usrname").innerHTML;

        // document.getElementById("test").innerHTML = caption + state + usrname;

        $.ajax({
            type: "POST",
            url: "/Social/controllers/post-controller.php",
            data: {
               "state" : state,
               "caption" : caption,
               "userid": localStorage.getItem("id")

            },
            dataType: "application/json"
        })
        .complete(function (res) {
                console.log(res);
                if(res = "true"){
                    $('#post_not').fadeIn(2200);
                    $('#post_not').fadeOut(2200);
                    clear_post();
                }
            })
    }

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