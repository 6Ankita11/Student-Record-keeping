<?php
function showdetails($standerd,$rollno)
{
include('dbcon.php');
$sql="SELECT * FROM `student` WHERE `rollno`='$rollno' AND `standerd`='$standerd'";

$run=mysqli_query($conn,$sql);

if(mysqli_num_rows($run)>0)
{
$data=mysqli_fetch_assoc($run);
?>
<table align="center" border=1 width="40%";>
<th colspan="3">Student Details</th>
</tr>
<tr>
<td rowspan="5"><img src="dataimg/<?php echo $data['image']; ?>" style="max-height:120px; max-width:150px; padding:40px; " /></td>
<th>Rollno</th>
<td><?php echo $data ['rollno'];?></td>
</tr>
<tr>
<th>Name</th>
<td><?php echo $data['name'];?></td>
</tr>
<tr>
<th>Standerd</th>
<td><?php echo $data['standerd'];?></td>
</tr>
<tr>
<th>Parents Contact No</th>
<td><?php echo $data['pcon'];?></td>
</tr>
<tr>
<th>City</th>
<td><?php echo $data['city'];?></td>
</tr>
</table>
<?php

}
else
{
echo"<script>alert('No student found');</script>";
}

}
?>