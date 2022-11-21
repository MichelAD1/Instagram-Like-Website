<?php
include("connection.php");

$username=$_POST['username'];
$full_name=$_POST['full_name'];
$password=$_POST['password'];
$password=hash('sha256',$password);
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
        $stmt=$conn->prepare("insert into users(username,full_name,password,bio,profile_picture)
        values(?,?,?,?,?)");
        $stmt->bind_param("sssss",$username,$full_name,$password,$bio,$profile_picture);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->store_result();

        $stmt=$conn->prepare("SELECT * from users WHERE username=?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_array();
        $response["User inserted"] = $user;   
        echo json_encode($response);
    }else{
        $response["User inserted"] = false;   
        echo json_encode($response);
    }
    $stmt->close();
    $conn->close();
}
?>