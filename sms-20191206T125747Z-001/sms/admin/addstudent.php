<?php
session_start();
if(isset($_SESSION['uid']))
{
echo $_SESSION['uid'];
}
else
{
header('location:../login.php');
}
?>
<?php
include('header.php');
include('titlehead.php');
error_reporting(0);
?>
<form method="post" action="addstudent.php" enctype="multipart/form-data">
<table align="center" border=1>
<tr>
<th>Roll No</th>
<td><input type="text" name="rollno" placeholder="Enter Roll No" required>
</td>
</tr>
<tr>
<th>Full Name</th>
<td><input type="text" name="name" placeholder="Enter Full name" required>
</td>
</tr>
<tr>
<th>City</th>
<td><input type="text" name="city" placeholder="Enter city" required>
</td>
</tr>
<tr>
<th>Parents Contact No</th>
<td><input type="text" name="pcon" placeholder="Enter Parents Contact No" required>
</td>
</tr>
<tr>
<th>Standerd</th>
<td><input type="number" name="std" placeholder="Enter standerd" required>
</td>
</tr>
<tr>
<th>Image</th>
<td><input type="file" name="simg"  required>
</td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="submit"></td>
</tr>
</form>
</table>
</body>
</html>
<?php
if(isset($_POST['submit']))
	error_reporting(0);
{
	include('../dbcon.php');
	$rollno=$_POST['rollno'];
	$name=$_POST['name'];
	$city=$_POST['city'];
	$pcon=$_POST['pcon'];
	$std=$_POST['std'];
	$imagename=$_FILES['simg']['name'];
	$tempname=$_FILES['simg']['tmp_name'];
	move_uploaded_file($tempname,"../dataimg/$imagename");
	$query="INSERT INTO `student`( `rollno`, `name`, `city`, `pcon`, `standerd`,`image`) VALUES ('$rollno','$name','$city','$pcon','$std','$imagename')";
     $run=mysqli_query($conn,$query);
	 if($run == true)
	 {
		 ?>
		 <script>alert('Data inserted successfully')</script>
	 
	 <?php
	 }

}
