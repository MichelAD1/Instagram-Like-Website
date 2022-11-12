<?php
include("connection.php");

$user_id=$_POST['user_id'];
$post_id=$_POST['post_id'];
$response = [];

if($conn->connect_error){
    $response["Caption updated"]=false;
    echo json_encode($response);
    die('Connection Failed : '.$conn->connect_error);
}else{
    if($_POST['caption']){
        $caption=$_POST['caption'];
        $stmt=$conn->prepare("UPDATE posts SET caption=? WHERE id=? and posted_by=?");
        $stmt->bind_param("sii", $caption, $post_id, $user_id);
        $stmt->execute();
        $response["Caption updated"]=true;
        echo json_encode($response);
    }
}
$stmt->close();
$conn->close();
?>