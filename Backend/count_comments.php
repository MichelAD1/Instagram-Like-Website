<?php
include("connection.php");

$post_id=$_GET['post_id'];
$response = [];

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt= $conn->prepare("SELECT COUNT(*) from comments WHERE commented_on=?");
    $stmt->bind_param("i",$post_id);
    $stmt->execute();
    $stmt->bind_result($result);
    $stmt->fetch();
    $response["Comments"]=$result;
    echo json_encode($response);
}
$stmt->close();
$conn->close();
?>