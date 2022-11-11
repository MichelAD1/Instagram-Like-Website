<?php
include("connection.php");

$username=$_POST['username'];
$fullname=$_POST['fullname'];
$password=$_POST['password'];
$bio=$_POST['bio'];
$profile_picture=$_POST['profile_picture'];

$stmt= $conn->prepare("SELECT COUNT(*) from users WHERE username=?");
$response = [];

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt->bind_param("s",$username);
    $stmt->execute();

    $stmt->store_result();

    $stmt->bind_result($result);
    $stmt->fetch();
    
    if($result==0){
        $stmt=$conn->prepare("insert into users(username,fullname,password,bio,profile_picture)
        values(?,?,?,?,?)");
        $stmt->bind_param("sssss",$username,$fullname,$password,$bio,$profile_picture);
        $stmt->execute();
        $response["User inserted"] = true;   
        echo json_encode($response);
    }else{
        $response["User inserted"] = false;   
        echo json_encode($response);
    }
    $stmt->close();
    $conn->close();
}
?>