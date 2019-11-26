<?php
$conn1 = mysqli_connect('127.0.0.1', 'root', '111111', 'app');
$sql = "SELECT * FROM topic";
$result1 = mysqli_query($conn1, $sql);

$sql = "SELECT * FROM topic WHERE id = ".$_GET['id'];
$result2 = mysqli_query($conn1, $sql);
$article = mysqli_fetch_array($result2);
?>
<h1>DATABASE</h1>
<h2>
<?=$article['title']?>
</h2>
<ul>
<?php
while($row = mysqli_fetch_array($result1)){
	print("<li><a href=\"index.php?id=".$row['id']."\">".$row['title']."</a></li>");
}
?>
</ul>
<p>by <?=$article['author']?></p>
<p><?=$article['description']?></p>
<p><a href="create.php">create</a></p>