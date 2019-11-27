<?php
$conn1 = mysqli_connect('127.0.0.1', 'root', '111111', 'app3');
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
<?php
$sql = "
SELECT 
    A.id AS author_id, A.name, A.profile
FROM
    topic_has_author AS THA
		LEFT JOIN
	author AS A ON THA.author_id = A.id
WHERE
    topic_id = {$_GET['id']};
";
$result3 = mysqli_query($conn1, $sql);
?>
<ul>
<?php
while($authors = mysqli_fetch_array($result3)){
	print("<li>{$authors['name']}</li>");
}
?>
</ul>
<p><?=$article['description']?></p>
<p><a href="create.php">create</a></p>

<?php
$sql = "SELECT * FROM comment LEFT JOIN author ON comment.author_id = author.id WHERE topic_id = {$_GET['id']}";
$result4 = mysqli_query($conn1, $sql);
?>
<ul>
<?php
while($comments = mysqli_fetch_array($result4)){
	print("<p>");
	print("글쓴이 : {$comments['name']}");
	print("댓글내용 : {$comments['description']}");
	print("</p>");
}
?>