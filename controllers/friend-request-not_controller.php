<?php
$user_id = $_POST['user_id'];


//TODO: CHECK USER EMAIL EXIST FIRST
$conn = new mysqli("localhost", "root", "root", "labfinal");

$qury = "SELECT * From (users join friend_request on users.user_id = friend_request.send_id) where friend_request.recieve_id = '$user_id';";
$result = $conn->query($qury);


if($result == null){
    echo "null";
}
else {

    $rows = array();
	while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }

    header('Content-type: application/json');
    echo json_encode($rows);
    }
?>