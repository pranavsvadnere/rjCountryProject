<?php
	$nm =$_GET['nm'];
	$val=$_GET['val'];
	$con = mysqli_connect('localhost','root','','Country');
	$sql = "select * from country where name = '$nm'";
	$row = mysqli_query($con,$sql);
   	$res = mysqli_fetch_array($row);
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Edit Users</title>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">
	</head>
	<script type="text/javascript">
		function checkdelete(){
			return confirm("Are You Sure You Want To Delete??");
		}	
	</script>
	<style type="text/css">
		table{
			table-layout: fixed;
			width: 300px;
		}
	</style>
	<body>
		<div class="container pt-5">
			<div class="row justify-content-center">
				<div class="pt-5 col-6 rounded" style="border: 2px solid black; background-color: #989b9d;" >
					<form method="POST" action="" enctype="multipart/form-data">
						<table class="table table-borderless">
							<tr>
								<td ><label>Code:</label></td>
								<td ><input type="text" name="code" value="<?php echo $res['code']; ?>" readonly required></td>
							</tr>
							<tr>
								<td><label>Name:</label></td>
								<td><input type="text" name="name" value="<?php echo $res['name']; ?>"  required></td>
							</tr>
							<?php
								if($val=='delete'){
								?>
									<tr>
										<td><label>Image:</label></td>
										<td><input type="file" name="img" required></td>
									</tr>
								<?php
								} else {
								?>
									<tr>
											<td><label>Image:</label></td>
											<td>
												<img src="<?php echo $res['image']; ?>" height="70px" width="100px" /> 
												<a onclick="checkdelete();" class="btn btn-primary ml-4" role="button" href="edit.php?nm=<?php echo $nm;?>&val=delete"><strong>DELETE</strong></a>
											</td>
									</tr>
								<?php
								}
							?>
							<tr>
								<td><label>Status:</label></td>
								<td>
									<div class="form-check-inline">
										<label class="form-Check-label">
											<input type="radio" class="form-Check-input" name="status" value="1" <?php if($res['status']==1) { echo "checked"; } ?> >&nbsp;Active
										</label>
									</div>
									<div class="form-check-inline">
										<label class="form-Check-label">
											<input type="radio" class="form-Check-input" name="status" value="0" <?php if($res['status']==0) { echo "checked"; } ?>>&nbsp;Inactive
										</label>
									</div>
								</td>
							</tr>
							<tr>
								<td><input class="btn btn-primary btn-block my-3 py-2" type="submit" name="submit" value="Submit"></td>
								<td>
									<a class="btn btn-danger btn-block my-3 py-2" role="button" href="index.php">Cancel</a>
								</td>								
							</tr>
						</table>
					</form>
				</div>
			</div>	
		</div>
		<?php
			if(isset($_POST['submit'])){
				if($val=='delete'){
					$code = $_POST['code'];
					$name = $_POST['name'];
					$status = $_POST['status'];

					$info = pathinfo($_FILES['img']['name']);
					$ext = $info['extension'];
					$file_name = $code.'_'.$name.'_'.$id.'_'.time()."_".$ext;
      				$file_tmp =$_FILES['img']['tmp_name'];  
      				$folder="assets/images/".$file_name; 
					move_uploaded_file($file_tmp,$folder);

					$sql="update country SET code='$code',name='$name',status='$status',image='$folder',modified_on=NOW() where name='$nm' ";
				    if(mysqli_query($con,$sql))
				    {
				        echo "<script>alert('data saved successfully);</script>";
				        echo "<script>window.location.href='index.php';</script>";
				    }
				} else{
					$code = $_POST['code'];
					$name = $_POST['name'];
					$status = $_POST['status'];


					$sql="update country SET code='$code',name='$name',status='$status',modified_on=NOW() where name='$nm' ";
				    if(mysqli_query($con,$sql))
				    {
				        echo "<script>alert('data saved successfully);</script>";
				        echo "<script>window.location.href='index.php';</script>";
				    }
				}
			}
		?>
</body>
</html>
