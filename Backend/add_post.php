<?php
include("connection.php");

$posted_by=$_POST['posted_by'];
$post_image=$_POST['post_image'];
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
        $stmt->store_result();
        $stmt=$conn->prepare("SELECT * from users WHERE id=?");
        $stmt->bind_param("i",$posted_by);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_array();
        $response["Post inserted"] = $user;   
        echo json_encode($response);
}
$stmt->close();
$conn->close();
?>