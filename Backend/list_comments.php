<?php
include("connection.php");

$post_id=$_GET['post_id'];

$query = $conn->prepare("SELECT * From comments where commented_on=?");
$query->bind_param("i",$post_id);
$query->execute();
$results = $query->get_result();
$response = [];

while($comment = $results->fetch_assoc()){
    $response[] = $comment;
}

echo json_encode($response);
?>
