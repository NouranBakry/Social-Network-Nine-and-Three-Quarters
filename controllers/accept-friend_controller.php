<?php
$user_Id = $_POST['userid'];
$friend_id = $_POST['friend_id'];

//TODO: CHECK USER EMAIL EXIST FIRST
$conn = new mysqli("localhost", "root", "root", "labfinal");

$qury = "INSERT INTO friends (friend_id, u_id) values ('$friend_id', '$user_Id');";
$result = $conn->query($qury);

$qury = "DELETE FROM friend_request WHERE send_id = '$friend_id' AND recieve_id = '$user_Id';";
$result = $conn->query($qury);

$qury = "SELECT * FROM users WHERE user_id = '$friend_id';";
$result = $conn->query($qury);


if($result == null){
    echo "null";
}
else {
$user = $result->fetch_assoc();
header('Content-type: application/json');
echo json_encode(array("status"=>$result,"u_id" => $user["f_name"], "l_name" => $user["l_name"]));
// echo json_encode("done");
}
     
?>