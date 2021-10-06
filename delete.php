<!DOCTYPE html>
<html>
<head>
	<title>Delete Data</title>
	<script>
	</script>
</head>
<body>
<?php
	$name = $_GET['nm'];
	$con = mysqli_connect('localhost','root','','Country');
	$sql = "update country SET flag_delete=1 where name = '$name'";
	mysqli_query($con,$sql);

	$sql = "select *from country where name = '$name'";
	$row=mysqli_query($con,$sql);
	$res= mysqli_fetch_array($row);
	$image=$res['image'];

	$file_name = $image;
	if (file_exists($file_name)) {
        unlink($file_name);
    }
	echo "<script>location.replace('index.php');</script>" ;
?>
</body>
</html>



