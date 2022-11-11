<?php

include("connection.php");

$user_id=$_GET['user_id'];
$response = [];

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt= $conn->prepare("DELETE FROM users WHERE users.id=?;");
    $stmt->bind_param("i",$user_id);
    $stmt->store_result();
    $stmt->execute();

    $stmt= $conn->prepare("DELETE FROM posts WHERE posts.posted_by=?;");
    $stmt->bind_param("i",$user_id);
    $stmt->store_result();
    $stmt->execute();

    $stmt= $conn->prepare("DELETE FROM comments WHERE comments.commented_by=?;");
    $stmt->bind_param("i",$user_id);
    $stmt->store_result();
    $stmt->execute();

    $stmt= $conn->prepare("DELETE FROM user_liked_post WHERE user_liked_post.user_id=?;");
    $stmt->bind_param("i",$user_id);
    $stmt->store_result();
    $stmt->execute();
    $response["User removed"]=true;
    echo json_encode($response);
}
$stmt->close();
$conn->close();
?>