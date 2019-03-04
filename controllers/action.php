<?php
$myID = $_POST['userid'];


//    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
//$file = base64_decode(addslashes(file_get_contents($_FILES["image"]["tmp_name"])));
$file2=base64_encode(file_get_contents($_FILES["image"]["tmp_name"]));
    $conn = new mysqli("localhost", "root", "root", "labfinal");
    $qury = "UPDATE users SET profile_pic ='$file2' WHERE user_id = $myID;";
    $result = mysqli_query($conn,$qury);
?>