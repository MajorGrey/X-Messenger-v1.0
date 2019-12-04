<?php
session_start();
include 'inc/connect.php';
$user_id = $_SESSION['user_id'];
$status = 'offline';
$time = date('h:i:sa');
$sql = "UPDATE session SET status='$status', time='$time' WHERE user_id='$user_id'";
$stmt = $db->prepare($sql);
$stmt->execute();
session_destroy();
header("location: index.php");
?>