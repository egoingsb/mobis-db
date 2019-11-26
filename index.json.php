<?php
$conn1 = mysqli_connect('127.0.0.1', 'root', '111111', 'app');
$sql = "SELECT * FROM topic WHERE id = ".$_GET['id'];
$result1 = mysqli_query($conn1, $sql);
print(json_encode(mysqli_fetch_array($result1)));
?>