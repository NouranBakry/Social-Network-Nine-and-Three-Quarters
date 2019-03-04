
<?php
$user_Id = $_POST['userid'];
$fname= $_POST['fname'];
$lname=$_POST['lname'];
$nickname=$_POST['nickname'];
$gender=$_POST['gender'];
$bdate=$_POST['bdate'];
$marital=$_POST['marital'];
$hometown=$_POST['hometown'];
$about=$_POST['about'];
//TODO: CHECK USER EMAIL EXIST FIRST
$conn = new mysqli("localhost", "root", "root", "labfinal");

$qury = "UPDATE users SET f_name='$fname',l_name='$lname',n_name='$nickname',gender='$gender',birth_date='$bdate',marital_status='$marital',home_town='$hometown',About_me='$about' WHERE user_id='$user_Id';";
$result = $conn->query($qury);

// echo($result);

if($result == null){
    echo "null";
}
else {
//$user = $result->fetch_assoc();
echo json_encode($result);
header('Content-type: application/json');
//echo json_encode(array("status"=>$result,"fName" => $user["f_name"], "lName" => $user["l_name"], "nName"=>$user["n_name"],"bDate"=>$user["birth_date"], "gender"=>$user["gender"],"mStatus"=>$user["marital_status"], "homeTown"=>$user["home_town"], "about"=>$user["About_me"]));

} 
?>
