<?php
include("connection.php");

$query = $conn->prepare("SELECT * From posts");
$query->execute();
$results = $query->get_result();
$response = [];

while($post = $results->fetch_assoc()){
    $response[] = $post;
}

echo json_encode($response);
?>
