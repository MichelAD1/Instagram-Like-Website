<?php
include("connection.php");

$id=$_GET["id"];
$posts=[];
$query = $conn->prepare("SELECT * From posts where posted_by=?");
$query->bind_param("i",$id);
$query->execute();
$results = $query->get_result();
$response = [];

while($post = $results->fetch_assoc()){
    array_push($posts,$post);
}
$response["Posts"] = $posts;

echo json_encode($response);
?>
