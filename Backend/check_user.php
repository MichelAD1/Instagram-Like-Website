<?php
include("connection.php");

$username = $_POST['username'];
$password = $_POST['password'];
$password=hash('sha256',$password);

$stmt = $conn->prepare("SELECT id from users WHERE password=? and username=?");

$response = [];

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt->bind_param("ss",$password,$username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if(!$user){
        $response["User found"] = false;
        echo json_encode($response);
    }else{
        $response["User found"] = $user["id"];
        echo json_encode($response);
    }
    $stmt->close();
    $conn->close();
}
?>