<?php
$searchText=$_POST['searchText'];
//$user_Id = $_POST['userid'];
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "labfinal";


$conn = new mysqli($servername, $username, $password, $dbname);


$qury = "SELECT * FROM users WHERE  email='$searchText';";
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