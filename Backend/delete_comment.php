<?php
include("connection.php");

$user_id=$_POST['user_id'];
$comment_id=$_POST['comment_id'];
$response = [];

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt= $conn->prepare("DELETE FROM comments WHERE commented_by=? and id=?;");
    $stmt->bind_param("ii",$user_id,$comment_id);
    $stmt->execute();
    $response["Comment deleted"] = true;   
    echo json_encode($response);
}
$stmt->close();
$conn->close();
?>