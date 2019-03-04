<?php 
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email =$_POST['email'];
$password = $_POST['pass'];
$gender=$_POST['gender'];
//echo($gender);
$birthdate=$_POST['birthdate'];
$hashpass = hash('ripemd160', $password);
$img;
$contents;
if($gender=='male'){

    $img="M.png";
    $data=fopen($img,'rb');
    $size=filesize($img);
    $contents=fread($data,$size);
    fclose($data);
    $encoded=base64_encode($contents);
}
else{
    $img="F.jpg";
    $data=fopen($img,'rb');
    $size=filesize($img);
    $contents=fread($data,$size);
    fclose($data);
    $encoded=base64_encode($contents);


}
$conn = new mysqli("localhost", "root","root", "labfinal");
$result = $conn->query("INSERT INTO users(f_name,l_name,password,email,gender,birth_date,profile_pic) VALUES('$firstname','$lastname','$hashpass','$email','$gender','$birthdate','$encoded');");
header('Content-type: application/json');
echo json_encode(array("status" => $result, "id" => $conn->insert_id));    
?>