<?php
include("connection.php");

$posts=[];
$query = $conn->prepare("SELECT * From posts");
$query->execute();
$results = $query->get_result();
$response = [];

while($post = $results->fetch_assoc()){
    array_push($posts,$post);
}
$response["Posts"] = $posts;

echo json_encode($response);
?>
