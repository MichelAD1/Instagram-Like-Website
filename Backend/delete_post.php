<?php
include("connection.php");

$user_id=$_POST['user_id'];
$post_id=$_POST['post_id'];
$response = [];

$stmt= $conn->prepare("SELECT COUNT(*) from posts WHERE posts.posted_by=? and posts.id=?;");
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt->bind_param("ii",$user_id,$post_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($result);
    $stmt->fetch();

    if($result==0){
        $response["Post removed"] = false;   
        echo json_encode($response);
    }else{
        $stmt= $conn->prepare("DELETE FROM posts WHERE posts.posted_by=? and posts.id=?;");
        $stmt->bind_param("ii",$user_id,$post_id);
        $stmt->execute();
        $stmt->store_result();

        $stmt= $conn->prepare("DELETE FROM comments WHERE comments.commented_on=?;");
        $stmt->bind_param("i",$post_id);
        $stmt->execute();
        $stmt->store_result();

        $stmt= $conn->prepare("DELETE FROM user_liked_post WHERE user_liked_post.post_id=?;");
        $stmt->bind_param("i",$post_id);
        $stmt->execute();
        $stmt->store_result();
        
        $response["Post removed"]=true;
        echo json_encode($response);
    }
}
$stmt->close();
$conn->close();
?>