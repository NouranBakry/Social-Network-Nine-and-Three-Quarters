
<?php
$user_Id = $_POST['userid'];
$friend_id = $_POST['friend_id'];

echo $userid;

//TODO: CHECK USER EMAIL EXIST FIRST
$conn = new mysqli("localhost", "root", "root", "labfinal");

$qury = "SELECT * FROM friends WHERE u_id = '$user_Id' AND friend_id = '$friend_id';";
$res = $conn->query($qury);
// echo $res;

$qury = "SELECT * FROM users WHERE user_id= '$friend_id';";
$result = $conn->query($qury);
$user = $result->fetch_assoc();

$friend = $res->fetch_assoc();

if($friend == null){

    header('Content-type: application/json');
	echo json_encode(array("friend" => "false","status"=>$result,"fName" => $user["f_name"], "lName" => $user["l_name"], "nName"=>$user["n_name"],"bDate"=>$user["birth_date"], "gender"=>$user["gender"],"mStatus"=>$user["marital_status"], "homeTown"=>$user["home_town"], "about"=>$user["About_me"]));
}
else {
	
	header('Content-type: application/json');
	echo json_encode(array("friend" => "true", "status"=>$result, "fName" => $user["f_name"], "lName" => $user["l_name"], "nName"=>$user["n_name"],"bDate"=>$user["birth_date"], "gender"=>$user["gender"],"mStatus"=>$user["marital_status"], "homeTown"=>$user["home_town"], "about"=>$user["About_me"]));

}
?>