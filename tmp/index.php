<?php
$conn = mysqli_connect('127.0.0.1', 'root', 111111, 'opentutorials2');
$result = mysqli_query($conn, "SELECT * FROM topic");
?>
<!DOCTYPE html>
<html>
<head>
    <title>DATABASE</title>
</head>
<body>
<h1>DATABASE</h1>
<ol>
<?php
while($row = mysqli_fetch_array($result)){
    ?>
    <li><a href="?id=<?=$row['id']?>"><?=$row['title']?></a></li>
    <?php
}
?>
</ol>
<?php
$sql = "
    SELECT 
        * 
    FROM topic 
    WHERE id = ".$_GET['id'];
$result = mysqli_query($conn, $sql);
$article = mysqli_fetch_array($result);

$sql = "
    SELECT 
        *
    FROM 
        author AS A
    LEFT JOIN
        author_write_topic AS AWT 
    ON
        A.id = AWT.author_id
    WHERE
        AWT.topic_id = {$_GET['id']}
";
$result = mysqli_query($conn, $sql);
$author_tag = '<ul>';
while($author = mysqli_fetch_array($result)){
    $author_tag .= "<li>{$author['name']}</li>";
}
$author_tag .= "</ul>";
?>
<h2><?=$article['title']?></h2>
<?=$author_tag?>
<?=$article['description']?>
<ul>
    <li><a href="create.php">create</a></li>
    <li><a href="/create.php">update</a></li>
    <li>delete</li>
</ul>
</body>
</html>