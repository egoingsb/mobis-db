<?php
$conn1 = mysqli_connect('127.0.0.1', 'root', '111111', 'app');
$sql = "
    INSERT INTO topic
        (title, description, author, created)
        VALUES(
            '{$_POST['title']}',
            '{$_POST['description']}',
            '{$_POST['author']}',
            NOW()
        )
";
$result1 = mysqli_query($conn1, $sql);
$inserted_id = mysqli_insert_id($conn1);
header("Location:http://localhost/index.php?id=".$inserted_id);
?>