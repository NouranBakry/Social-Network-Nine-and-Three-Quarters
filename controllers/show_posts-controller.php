
<?php
$user_Id = $_POST['userid'];

//TODO: CHECK USER EMAIL EXIST FIRST
$conn = new mysqli("localhost", "root", "root", "labfinal");

$qury = "SELECT * FROM posts WHERE u_id= '$user_Id';";
$result = $conn->query($qury);

// echo $result;

if($result == null){
    echo "null";
}
else {

	$rows = array();
	while($r = mysqli_fetch_assoc($result)) {
    	$rows[] = $r;
    	// $rows[] = array('data' => $r);
}

// $user = $result->fetch_assoc();
header('Content-type: application/json');
// echo json_encode(array("status"=>$result,"state" => $user["state"], "caption" => $user["caption"],"image"=>$user["image"], "post_date"=>$user["post_date"]));

echo json_encode($rows);

}
?>
