<?php
include("connection.php");

$user_id=$_GET['user_id'];
$response = [];

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt= $conn->prepare("DELETE users, posts, comments, user_liked_post FROM users INNER JOIN posts ON users.id = posts.posted_by INNER JOIN user_liked_post ON users.id=user_liked_post.user_id INNER JOIN comments ON users.id = comments.commented_by WHERE users.id=?;");
    $stmt->bind_param("i",$user_id);
    $stmt->execute();
    $response["User removed"]=true;
    echo json_encode($response);
}
$stmt->close();
$conn->close();
?>