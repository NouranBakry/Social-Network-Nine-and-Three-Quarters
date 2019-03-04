<?php
$user_id = $_POST['user_id'];


//TODO: CHECK USER EMAIL EXIST FIRST
$conn = new mysqli("localhost", "root", "root", "labfinal");

$qury = "SELECT * FROM `likes` Join posts on  posts.post_id = likes.p_id AND posts.u_id = '$user_id';";
$result = $conn->query($qury);


if($result == null){
    echo "null";
}
else {
$user = $result->fetch_assoc();
header('Content-type: application/json');
echo json_encode(array("status"=>$result,"f_name" => $user["f_name"], "l_name" => $user["l_name"]));
}
?>