<?php
$conn1 = mysqli_connect('127.0.0.1', 'root', '111111', 'app3');
$sql = "
    INSERT INTO topic
        (title, description, created)
        VALUES(
            '{$_POST['title']}',
            '{$_POST['description']}',
            NOW()
        )
";
$result1 = mysqli_query($conn1, $sql);
$inserted_id = mysqli_insert_id($conn1);
$sql = "
INSERT INTO topic_has_author 
    (topic_id, author_id)
    VALUES(
        {$inserted_id}, 
        {$_POST['author_id']}
    )
";
mysqli_query($conn1, $sql);
header("Location:http://localhost/index.php?id=".$inserted_id);
?>