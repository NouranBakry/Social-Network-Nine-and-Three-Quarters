<?php
$post_id = $_POST['post_id'];

echo $post_id;
$conn = new mysqli("localhost", "root", "root", "labfinal");

$qury = "DELETE FROM likes WHERE p_id='$post_id';";
$result = $conn->query($qury);

$qury = "DELETE FROM posts WHERE post_id='$post_id';";
$result = $conn->query($qury);

if($result == null){
    echo "null";
}
else {

    header('Content-type: application/json');
    echo json_encode('true');
        
}
?>