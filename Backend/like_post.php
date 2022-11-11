<?php
include("connection.php");

$user_id=$_POST['user_id'];
$post_id=$_POST['post_id'];

$stmt= $conn->prepare("SELECT COUNT(*) from user_liked_post WHERE user_id=? and post_id=?");
$response = [];

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt->bind_param("ii",$user_id,$post_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($result);
    $stmt->fetch();
    
    if($result==0){
        $stmt=$conn->prepare("insert into user_liked_post(user_id,post_id)
        values(?,?)");
        $stmt->bind_param("ii",$user_id,$post_id);
        $stmt->execute();
        $response["User liked"] = true;   
        echo json_encode($response);
    }else{
        $response["User liked"] = false;   
        echo json_encode($response);
    }
    $stmt->close();
    $conn->close();
}
?>