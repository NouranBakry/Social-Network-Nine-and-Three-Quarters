<!DOCTYPE html>

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

<style>
.button {
  padding: 5px 15px;
  font-size: 15px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #EF3B3A;
  border: none;
  border-radius: 5px;
  box-shadow: 0 6px #999;
}

.button:hover {background-color: #FF0000}

.button:active {
  background-color: #FF0000;
  box-shadow: 0 5px #666;
  transform: translateY(4px);


  
}

#save {
  padding: 5px 15px;
  font-size: 15px;
  text-align: center; 
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #1155AA;
  border: none;
  border-radius: 5px;
  box-shadow: 0 6px #999;
  margin-left:288px;
}

#save:hover {background-color: #1155CC}

#save:active {
  background-color: #1155FF;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
} 

#cancel {
  padding: 5px 15px;
  font-size: 15px;
  text-align: center; 
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #1155AA;
  border: none;
  border-radius: 5px;
  box-shadow: 0 6px #999;
}

#cancel:hover {background-color: #1155CC}

#cancel:active {
  background-color: #1155FF;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}


/* box style*/


#box {
    width: 500px;
    
    padding: 30px 30px 20px 30px;
    border: 3px solid #BFBFBF;
    background-color: white;
    box-shadow: 70px 70px 65px #aaaaaa;
    margin-left:400px;
    margin-top:80px;
}

   #box {
    float: left;
    -ms-transform: rotate(0deg); /* IE 9 */
    -webkit-transform: rotate(0deg); /* Safari */
    transform: rotate(0deg);
} 


#edit {
  padding: 5px 15px;
  font-size: 15px;
  text-align: center;
 margin-left:150px;
   
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #1155AA;
  border: none;
  border-radius: 5px;
  box-shadow: 0 6px #999;
}

#edit:hover {background-color: #1155CC}

#edit:active {
  background-color: #1155FF;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}




</style>
  
</head>

<body>

<div class  ="container-fluid " id="box" >
    <div class  ="well">
    <p><strong>First Name :</br> </strong><span id="fN"></span></p>
    <p><strong>Last Name :</br> </strong><span id="lN"></span></p>
    <p><strong>Nick Name :</br> </strong><span id="nN"></span></p>
    <p><strong>Gender :</br> </strong><span id="gender"></span></p>
    <p><strong>Date of birth :</br> </strong><span id="bDate"></span></p>
    <p><strong>Marital Status :</br> </strong><span id="mStatus"></span></p>
    <p><strong>HomeTown : </br></strong><span id="homeTown"></span></p>
    <p><strong>About me : </br></strong><span id="about"></span></p>
  
    </div>
    <button class="button" align="right" id="cancel">Cancel</button>
    <button class="button" align="right" id="save">Save</button>

</div>


</body>

<script>
var html ="";
var firstname;
var lastname;
var nickname;
var gender;
var bData;
var mstatus;
var homeTown;
var about;

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
                lastname=res.lName;
                nickname=res.nName;
                gender=res.gender;
                bdata=res.bDate;
                mstatus=res.mStatus;
                hometown=res.homeTown;
                about=res.about;

                html+= '<input  id="fn" type="text" placeholder="'+firstname;
                html+='" name="firstname"/>';
              
                document.getElementById("fN").innerHTML += html;
            
                
               
                html= '<input id="ln" type="text" placeholder="'+lastname;
                html+='" name="lastname"/>';
                document.getElementById("lN").innerHTML += html;

                html= '<input id="nn" type="text" placeholder="'+nickname;
                html+='" name="nickname"/>';
                document.getElementById("nN").innerHTML +=html;
                html= '<input id="gen" type="text" placeholder="'+gender;
                html+='" name="gender"/>';
                document.getElementById("gender").innerHTML +=html;

                html= '<input  id="bd" type="text" placeholder="'+bdata;
                html+='" name="bdata"/>';
                document.getElementById("bDate").innerHTML +=html;

                html= '<input id="ms" type="text" placeholder="'+mstatus;
                html+='" name="mstatus"/>';
                document.getElementById("mStatus").innerHTML+=html;

                html= '<input id="ht" type="text" placeholder="'+hometown;
                html+='" name="hometown"/>';
                document.getElementById("homeTown").innerHTML +=html;

                html= '<input  id="abt" type="text" placeholder="'+about;
                html+='" name="about"/>';
                document.getElementById("about").innerHTML +=html;
                $('#cancel').click(function () {
                   location.href = "/Social/views/profile.php"
            })
            
           

             
            })  

//FETCH data for updating profile
var fname;
var lname;
var nname;
var gen;
var bdate;
var ms;
var htown;
var abt;

    $('#save').click(function () {

         if($("#fn").val() == ""){
             fname = firstname;
         }else{
            fname = $("#fn").val();
         }
         if($("#ln").val() == ""){
             lname = lastname;
         }else{
            lname = $("#ln").val();
         }
         if($("#nn").val() == ""){
             nname = nickname;
         }else{
            nname = $("#nn").val();
         }
         if($("#gen").val() == ""){
             gen = gender;
         }else{
            gen = $("#gen").val();
         }
         if($("#bd").val() == ""){
             bdate = bdata;
         }else{
            bdate = $("#bd").val();
         }
         if($("#ms").val() == ""){
             ms = mstatus;
         }else{
            ms = $("#ms").val();
         }
         if($("#ht").val() == ""){
             htown = homeTown;
         }else{
            htown = $("#ht").val();
         }
         if($("#abt").val() == ""){
             abt = about;
         }else{
            abt = $("#abt").val();
         }
         

         $.ajax({ 
                type: "POST",
                url: "/Social/controllers/control_editProfile.php",
                data: {
                    "userid": localStorage.getItem("id"),
                    "fname": fname ,
                    "lname": lname,
                    "nickname":nname,
                    "gender":gen,
                    "bdate":bdate,
                    "marital":ms,
                    "hometown":htown,
                    "about":abt
                     },
                dataType: "application/json"
            })
            .complete(function (res) {
                console.log(res);
                var res = JSON.parse(res.responseText);
                console.log(res);
                    localStorage.setItem("id", res.id);
                    localStorage.setItem("fname",res.fname);
                    localStorage.setItem("lname",res.lname);
                    localStorage.setItem("nickname",res.nickname);
                    localStorage.setItem("gender",res.gender);
                    localStorage.setItem("bdate",res.bdate);
                    localStorage.setItem("marital",res.marital);
                    localStorage.setItem("hometown",res.hometown);
                    localStorage.setItem("about",res.about);
                    
              
            })
             location.href = "/Social/views/profile.php"
            }) 




</script>
</html>