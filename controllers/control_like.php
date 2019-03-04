
<?php
$post_id = $_POST['post_id'];
$liker_id = $_POST['liker_id'];

//TODO: CHECK USER EMAIL EXIST FIRST
$conn = new mysqli("localhost", "root", "root", "labfinal");

// $qury = "SELECT * FROM likes WHERE p_id = '$post_id' AND u_id = '$liker_id';";
// $result = $conn->query($qury);

// if($result == null){

	$qury = "INSERT INTO likes (p_id, u_id, seen, count) VALUES ('$post_id', '$liker_id', '0','1');";
	$result = $conn->query($qury);

	$qury = "SELECT * FROM users WHERE user_id= '$liker_id';";
	$result = $conn->query($qury);


	if($result == null){
	    echo "null";
	}
	else {
	$user = $result->fetch_assoc();
	header('Content-type: application/json');
	echo json_encode(array("status"=>$result,"f_name" => $user["f_name"], "l_name" => $user["l_name"]));
	}
// }
// else{
// 	header('Content-type: application/json');
// 	echo json_encode("status"=>"false");
// }


?>