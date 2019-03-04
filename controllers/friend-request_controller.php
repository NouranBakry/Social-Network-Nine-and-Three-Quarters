
<?php
$user_id = $_POST['user_id'];
$friend_id = $_POST['friend_id'];

//TODO: CHECK USER EMAIL EXIST FIRST
$conn = new mysqli("localhost", "root", "root", "labfinal");


$qury = "INSERT INTO friend_request (recieve_id, send_id, accept) VALUES ('$friend_id', '$user_id', '0');";
$result = $conn->query($qury);


if($result == null){
    echo "null";
}
else {
	header('Content-type: application/json');
	echo json_encode("done");
}

?>