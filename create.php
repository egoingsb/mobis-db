<?php
$conn1 = mysqli_connect('127.0.0.1', 'root', '111111', 'app3');
$sql = "
SELECT * FROM author
";
$result3 = mysqli_query($conn1, $sql);
?>
<form action="create_process.php" method="POST">
    <p><input type="text" name="title" placeholder="title"></p>
    <p><textarea name="description" placeholder="description"></textarea></p>
    <p>
        <select name="author_id">
<?php
while($authors = mysqli_fetch_array($result3)){
	    print("<option value=\"{$authors['id']}\">{$authors['name']}</option>");
}
?>
        </select>
    </p>
    <p><input type="submit"></p>
</form>