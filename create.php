<!DOCTYPE html>
<html>
<head>
	<title>Create Users</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">
</head>
<style type="text/css">
	table{
		table-layout: fixed;
		width: 300px;
	}
	label{
		padding:0 0 0 30px;
	}

</style>
<body>
	<div class="container pt-5">
		<div class="row justify-content-center">
			<div class="pt-5 col-6 rounded" style="border: 2px solid black; background-color: #989b9d;">
				<form method="POST" action="" enctype="multipart/form-data" class="">
					<table class="table table-borderless">
						<tr>
							<td><label>Code:</label></td>
							<td><input type="text" name="code" value="<?php if(isset($_POST['code'])) {echo $_POST['code'];} ?>" required></td>
						</tr>
						<tr>
							<td><label>Name:</label></td>
							<td><input type="text" name="name" value="<?php if(isset($_POST['name'])) {echo $_POST['name'];} ?>"  required></td>
						</tr>
						<tr>
							<td><label>Image:</label></td>
							<td><input type="file" name="img" value="<?php if(isset($_POST['img'])) {echo $_POST['img'];} ?>" required></td>
						</tr>
						<tr>
							<td><label>Status:</label></td>
							<td>
								<div class="form-check-inline">
									<label class="pl-0 form-Check-label">
										<input type="radio" class="form-Check-input" name="status" value="1">&nbsp;Active
									</label>
								</div>
								<div class="form-check-inline">
									<label class="form-Check-label">
										<input type="radio" class="form-Check-input" name="status" value="0">&nbsp;Inactive
									</label>
								</div>
							</td>
						</tr>
						<tr>
							<td><input class="btn btn-primary btn-block my-3 py-2" type="submit" name="submit" value="submit"></td>
							<td><a class="btn btn-danger btn-block my-3 py-2" role="button" href="index.php">Cancel</a></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
	<?php
		if(isset($_POST['submit'])){
			$con = mysqli_connect('localhost','root','','Country');
			$sql = "select max(id) as max from country";
			$row = mysqli_query($con,$sql);
			$res = mysqli_fetch_array($row);
			$id = $res['max']+1;

			$code = $_POST['code'];
			$name = $_POST['name'];
			$status = $_POST['status'];


			$info = pathinfo($_FILES['img']['name']);
			$ext = $info['extension'];
			$file_name = $code.'_'.$name.'_'.$id.'_'.time()."_".$ext;
			$file_tmp =$_FILES['img']['tmp_name'];
			$folder="assets/images/".$file_name;
			move_uploaded_file($file_tmp,$folder);


			$sql = "select *from country where code = '$code'";
			$row = mysqli_query($con,$sql);
			if(mysqli_num_rows($row) > 0){
				echo "<script>alert('Data is already exits!!!!!!!');</script>";
				echo "<script>window.location.href='create.php'</script>";
			} else {
				$sql="insert into country (id,code,name,image,status,created_on,modified_on) values($id,'$code','$name','$folder','$status',NOW(),NOW())";
				if(mysqli_query($con,$sql))
				{
					echo "<script>alert('data saved successfully');</script>";
					echo "<script>window.location.href='index.php';</script>";
				}
			}
		}
?>
</body>
</html>
