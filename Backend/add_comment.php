<?php
include("connection.php");

$commented_by=$_POST['commented_by'];
$commented_on=$_POST['commented_on'];
$content=$_POST['content'];
$date_and_time=$_POST['date_and_time'];

$response = [];

if($conn->connect_error){
    $response["Comment inserted"] = false;   
    echo json_encode($response);
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt=$conn->prepare("insert into comments(commented_by,commented_on,content,date_and_time)
    values(?,?,?,?)");
    $stmt->bind_param("ssss",$commented_by,$commented_on,$content,$date_and_time);
    $stmt->execute();
    $response["Comment inserted"] = true;   
    echo json_encode($response);
}
$stmt->close();
$conn->close();
?>