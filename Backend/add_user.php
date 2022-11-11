<?php
include("connection.php");

$username=$_POST['username'];
$full_name=$_POST['full_name'];
$password=$_POST['password'];
$password=hash('sha256',$password);
$bio=$_POST['bio'];
$target="profile-pic/".basename($_FILES['image']['name']);
$profile_picture=$_FILES['profile_picture']['name'];

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
        $stmt=$conn->prepare("insert into users(username,full_name,password,bio,profile_picture)
        values(?,?,?,?,?)");
        $stmt->bind_param("sssss",$username,$full_name,$password,$bio,$profile_picture);
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