<?php
$conn = mysqli_connect('127.0.0.1', 'root', 111111, 'opentutorials2');
$sql = "
    INSERT INTO 
        topic
    (title, description, created)
    VALUES(
        '{$_POST['title']}',
        '{$_POST['description']}',
        NOW()
    )
";
$result = mysqli_query($conn, $sql);
$topic_id = mysqli_insert_id($conn);
$sql = "
    INSERT INTO
        author_write_topic
    (author_id, topic_id)
    VALUES(
        {$_POST['author_id']},
        {$topic_id}
    )
";
$result = mysqli_query($conn, $sql);
header("Location: index.php?id=".$topic_id);
?>