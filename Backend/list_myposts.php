<?php
include("connection.php");

$id=$_GET["id"];
$query = $conn->prepare("SELECT * From posts where posted_by=?");
$query->bind_param("i",$id);
$query->execute();
$results = $query->get_result();
$response = [];

while($post = $results->fetch_assoc()){
    $response["Posts"] = $post;
}

echo json_encode($response);
?>
