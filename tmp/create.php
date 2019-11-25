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
    <li><a href="/index.php?id=<?=$row['id']?>"><?=$row['title']?></a></li>
    <?php
}
?>
</ol>
<h2>CREATE</h2>
<form action="create_process.php" method="post">
    <p><input type="text" name="title" placeholder="title"></p>
    <p><textarea name="description"></textarea></p>
<?php
$sql = "SELECT * FROM author";
$result = mysqli_query($conn, $sql);
echo "<select name=\"author_id\">";
while($author = mysqli_fetch_array($result)){
    echo "<option value=\"{$author['id']}\">{$author['name']}</option>";
}
echo "</select>";
?>
    <p><input type="submit" value="저장"></p>
</form>
</body>
</html>