<!DOCTYPE html>
<html>
<head>
	<title>Create Users</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <script type="text/javascript">
    	function create(){
    		window.location.href = "create.php";
    	}

    	function checkdelete(){
			return confirm("Are You Sure You Want To Delete??");
		}
		function status(status){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("demo").innerHTML = this.responseText;
				}
				};
			xhttp.open("GET", "status.php?q=" +status, true);
			xhttp.send();

		};
    </script>
</head>
<body>
	<div class="container">
		<div style="padding-top: 50px;" class="row justify-content-center">
			<div class="col-10">
				<form class="form" method="POST" action="">
					<div class="form-check-inline">
						<label class="form-Check-label"><strong>Status</strong></label>
					</div>
					<div class="form-check-inline">
						<label class="form-Check-label">
							<input onclick="status(this.value);" type="radio" class="form-Check-input" name="sort" value="all" checked>&nbsp;All
						</label>
					</div>
					<div class="form-check-inline">
						<label class="form-Check-label">
							<input type="radio" onclick="status(this.value);" class="form-Check-input" name="sort" value="active">&nbsp;Active
						</label>
					</div>
					<div class="form-check-inline">
						<label class="form-Check-label">
							<input onclick="status(this.value);" type="radio" class="form-Check-input" name="sort" value="inactive">&nbsp;Inactive
						</label>
					</div>
				</form>
			</div>
			<div class="col-10">
				<div style="border-radius: 10px; border: 2px solid black;" class="btn-group float-right">
					<button onclick="create();" style="border: 1px solid black" class="btn px-1 py-1" type="button" >Create</button>
					<button onclick="create();" style="border: 1px solid black" class="btn px-2 py-1" type="button" class="">+</button>
				</div>
			</div>
			<div class="col-10">
				<table class="table table-bordered table-striped ">
					<thead class="bg-dark text-white text-center">
						<tr>
							<th>Code</th>
							<th>Name</th>
							<th>Image</th>
							<th>Status</th>
							<th>Date Added</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="text-center" id="demo">
					<?php
					$con = mysqli_connect('localhost','root','','Country');
					$sql = "select * from country where flag_delete = '0' ";
					$row = mysqli_query($con,$sql);
					if(mysqli_num_rows($row)==0){
						echo "<script>alert('No data found!!!!!');</script>";
						echo "<tr><td colspan='6'><center>NO data found!!!!!!!!!</center></td></tr>";
					} else {
						while($res=mysqli_fetch_array($row)){
							$code = $res['code'];
							$name = $res['name'];
							$image = $res['image'];
							($res['status'] == 1) ? $status = "Active" : $status = "Inactive";
							$date_added = $res['created_on'];

							echo "<tr>";
							echo " <td>$code</td>";
							echo "<td>$name</td>";
							?>	<td><img src="<?php echo $image ?>" height='70px' width='100px'/></td>  <?php
							echo "<td>$status</td>";
							echo "<td>$date_added</td>";
							echo "<td>
									<a href='edit.php?nm=$name'><i class='fa fa-pencil-square-o fa-2x'></i></a>
									<a href='delete.php?nm=$name' onclick='checkdelete();'><i class='fa fa-trash-o fa-2x'></i></a>
								</td>";
							echo "<tr>";
						}
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
