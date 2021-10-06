
<?php
 $q = $_REQUEST["q"];
 $con = mysqli_connect('localhost','root','','Country');
 if($q == "all"){
    $sql = "select * from country where flag_delete = '0'";
 } else {
    ($q == "active") ? $q = 1 : $q = 0;
    $sql = "select * from country where status = '$q' && flag_delete = '0'";
 }
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
        echo " <td>".$code."</td>";
        echo "<td>".$name."</td>";
        ?>  <td><img src="<?php echo $image ?>" height='70px' width='100px'/></td>  <?php
        echo "<td>".$status."</td>";
        echo "<td>".$date_added."</td>";
        echo "<td>
                  <a href='edit.php?nm=$name'><i class='fa fa-pencil-square-o fa-2x'></i></a>
                  <a href='delete.php?nm=$name' onclick='checkdelete();'><i class='fa fa-trash-o fa-2x'></i></a>
              </td>";
        echo "<tr>";
     }
 }
?>
</body>
</html>
