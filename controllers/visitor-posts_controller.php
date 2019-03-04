
<?php
$user_Id = $_POST['userid'];
$friend_id = $_POST['friend_id'];

echo $userid;

//TODO: CHECK USER EMAIL EXIST FIRST
$conn = new mysqli("localhost", "root", "root", "labfinal");

$qury = "SELECT * FROM friends WHERE u_id = '$user_Id' AND friend_id = '$friend_id';";
$res = $conn->query($qury);
// echo $res;

$friend = $res->fetch_assoc();

if($friend == null){

	$qury = "SELECT * FROM posts WHERE u_id= '$friend_id' AND state='Public';";

    }
else {
	$qury = "SELECT * FROM posts WHERE u_id= '$friend_id';";
}

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