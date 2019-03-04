<?php
$user_Id = $_POST['userid'];

//TODO: CHECK USER EMAIL EXIST FIRST
$conn = new mysqli("localhost", "root", "root", "labfinal");
$qury = "SELECT * from users join (posts JOIN friends ON posts.u_id = friends.friend_id) on users.user_id = friends.friend_id;";
$result = $conn->query($qury);

// echo($result);

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