<?php
include("connection.php");

$posted_by=$_POST['posted_by'];
$target="post-imgs/".basename($_FILES['post_image']['name']);
$post_image=$_FILES['post_image']['name'];
$caption=$_POST['caption'];
$date_and_time=$_POST['date_and_time'];

$response = [];

if($conn->connect_error){
    $response["Post inserted"] = false;   
    echo json_encode($response);
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt=$conn->prepare("insert into posts(posted_by,post_image,caption,date_and_time)
        values(?,?,?,?)");
        $stmt->bind_param("ssss",$posted_by,$post_image,$caption,$date_and_time);
        $stmt->execute();
        $response["Post inserted"] = true;   
        echo json_encode($response);
}
$stmt->close();
$conn->close();
?>