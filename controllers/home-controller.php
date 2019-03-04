<?php

$user_Id = $_POST['userid'];
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "labfinal";

$conn = new mysqli($servername, $username, $password, $dbname);


$qury = "SELECT * FROM users WHERE user_id= '$user_Id';";
$result = $conn->query($qury);
if($result == null){
    echo "null";
}
else {
$user = $result->fetch_assoc();
header('Content-type: application/json');
echo json_encode(array("status"=>$result,"fName" => $user["f_name"]));
}


?>