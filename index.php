<?php
$conn1 = mysqli_connect('127.0.0.1', 'root', '111111', 'app');
$sql = "SELECT * FROM topic";
$result1 = mysqli_query($conn1, $sql);
?>
<h1>DATABASE</h1>
<h2>MySQL</h2>
<ul>
	<?php
	while($row = mysqli_fetch_array($result1)){
		print("<li>".$row['title']."</li>");
	}
	?>
</ul>
<p>by egoing</p>
<p><a href="http://mysql.com">MySQL</a> is ...</p>