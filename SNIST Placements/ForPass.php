<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
$UserName=$_POST['txtUserName'];
$Question=$_POST['cmbQue'];
$Answer=$_POST['txtAnswer'];
$UserType=$_POST['rdUser'];

if($UserType=="HR")
{
$con = mysql_connect("localhost","root");
mysql_select_db("job", $con);
$sql = "select * from hr_reg  where UserName='".$UserName."' and Question='".$Question."' and Answer='".$Answer."'";
$result = mysql_query($sql,$con);
$records = mysql_num_rows($result);
$row = mysql_fetch_array($result);
echo $records;
if ($records==0)
{
echo '<script type="text/javascript">alert("Wrong Information Provided");window.location=\'Forget.php\';</script>';
}
else
{
$_SESSION['ID']=$row['HRId'];
$_SESSION['Name']=$row['CompanyName'];
header("location:HR/index.php");
} 
mysql_close($con);
}
else
{
$con = mysql_connect("localhost","root");
mysql_select_db("job", $con);
$sql = "select * from student_reg  where UserName='".$UserName."' and Question='".$Question."' and Answer='".$Answer."'";
$result = mysql_query($sql,$con);
$records = mysql_num_rows($result);
$row = mysql_fetch_array($result);
if ($records==0)
{
echo '<script type="text/javascript">alert("Wrong Information Provided");window.location=\'Forget.php\';</script>';
}
else
{
$_SESSION['ID']=$row['StudentId'];
$_SESSION['Name']=$row['StudentName'];
header("location:Student/index.php");
} 
mysql_close($con);
}
?>
</body>
</html>
