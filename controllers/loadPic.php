<?php
$myID = $_POST['userid'];
$conn = new mysqli("localhost", "root", "root", "labfinal");
$qury = "SELECT profile_pic FROM users WHERE user_id =$myID ;";
$result = mysqli_query($conn,$qury);
$res = $result->fetch_assoc();
$output='<img src="data:image/jpeg;base64,'.$res['profile_pic'].'"  width="500" class="img-thumbnail" />';
echo($output);
?>
