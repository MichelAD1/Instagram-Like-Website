<?php
include("connection.php");

$id=$_POST['id'];
$response = [];

if($conn->connect_error){
    $response["User updated"]=false;
    echo json_encode($response);
    die('Connection Failed : '.$conn->connect_error);
}else{
    if($_POST['username']){
        $username=$_POST['username'];
        $stmt= $conn->prepare("SELECT COUNT(*) from users WHERE username=?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($result);  
        $stmt->fetch();

        if($result==0){
            $stmt = $conn->prepare("UPDATE users SET username=? WHERE id=?");
            $stmt->bind_param("si", $username, $id);
            $stmt->execute();
        }
    }
    
}
$stmt->close();
$conn->close();
?>