<?php
$searchText=$_POST['searchText'];
//$user_Id = $_POST['userid'];
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "labfinal";


$conn = new mysqli($servername, $username, $password, $dbname);


$qury = "SELECT * from (users join (posts JOIN friends ON posts.u_id = friends.friend_id) on users.user_id = friends.friend_id) WHERE   caption LIKE '%$searchText%';";
$result = $conn->query($qury);
if($result == null){
    echo "null";
}
else {
    $rows = array();
	while($r = mysqli_fetch_assoc($result)) {
    	$rows[] = $r;
    	// $rows[] = array('data' => $r);
}
header('Content-type: application/json');
echo json_encode($rows);
}


?>