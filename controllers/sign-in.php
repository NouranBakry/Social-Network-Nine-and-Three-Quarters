<?php
 
$email2=$_POST['email2'];
$password = $_POST['pass2'];
$hashpass = hash('ripemd160', $password);
$conn = new mysqli("localhost", "root", "root", "labfinal");
$qury = "SELECT * FROM users WHERE email ='$email2' AND password='$hashpass';";
$result = $conn->query($qury);
if($result == null){
        echo "null";

}
else {
    $user = $result->fetch_assoc();
    header('Content-type: application/json');
   // echo json_encode(array("status"=>$result,"dep" => $student["department_id"], "id" => $student["student_id"] ));
   echo json_encode(array("status" => $result, "id" => $user["user_id"],"name"=> $user["f_name"]));    
}


?>