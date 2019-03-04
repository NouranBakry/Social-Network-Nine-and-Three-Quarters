<?php
$user_Id = $_POST['userid'];

//TODO: CHECK USER EMAIL EXIST FIRST
$conn = new mysqli("localhost", "root", "root", "labfinal");
$qury = "SELECT f_name, l_name, n_name, user_id FROM friends JOIN users ON friends.u_id = '$user_Id' AND friends.friend_id = users.user_id;";
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