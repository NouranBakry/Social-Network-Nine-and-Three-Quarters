<?php
$state = $_POST['state'];
$caption = $_POST['caption'];
$userid = $_POST['userid'];

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "labfinal";

$conn = new mysqli($servername, $username, $password, $dbname);

$result = $conn->query("INSERT INTO posts (state, caption, u_id ) VALUES('$state','$caption','$userid');");


header('Content-type: application/json');
echo json_encode($result);

// echo json_encode(array("DOOOONE");


echo "done";
?>