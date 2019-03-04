<?php
$user_Id = $_POST['userid'];
$friend_id=$_POST['friend_id'];

$conn = new mysqli("localhost", "root", "root", "labfinal");
$qury = "DELETE FROM friends WHERE friend_id='$friend_id'AND u_id='$user_Id';";
$result = $conn->query($qury);

if($result == null){
    echo "null";
}
else {

    header('Content-type: application/json');
    echo json_encode('true');
        
}
?>