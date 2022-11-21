<?php
include("connection.php");

$posted_by=$_GET['posted_by'];
$response = [];

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt= $conn->prepare("SELECT username from users,posts WHERE posts.posted_by=? and users.id=?");
    $stmt->bind_param("ii",$posted_by,$posted_by);
    $stmt->execute();
    $stmt->bind_result($result);
    $stmt->fetch();
    $response["Username"]=$result;
    echo json_encode($response);
}
$stmt->close();
$conn->close();
?>