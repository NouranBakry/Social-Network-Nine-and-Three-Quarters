
<?php
$user_Id = $_POST['userid'];

//TODO: CHECK USER EMAIL EXIST FIRST
$conn = new mysqli("localhost", "root", "root", "labfinal");

$qury = "SELECT * FROM users WHERE user_id= '$user_Id';";
$result = $conn->query($qury);

// echo($result);

if($result == null){
    echo "null";
}
else {
$user = $result->fetch_assoc();
header('Content-type: application/json');
echo json_encode(array("status"=>$result,"fName" => $user["f_name"], "lName" => $user["l_name"], "nName"=>$user["n_name"],"bDate"=>$user["birth_date"], "gender"=>$user["gender"],"mStatus"=>$user["marital_status"], "homeTown"=>$user["home_town"], "about"=>$user["About_me"]));

}
?>