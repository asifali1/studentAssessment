<?php
include '../class/studentclass.php';
$pass_encrypt=md5($_POST['var4']);
$db = new database('localhost', 'studentassessment', 'root', '');
$sql="INSERT INTO studentdata (std_name, std_class, std_rollnumber,std_password) 
VALUES ('$_POST[var1]', '$_POST[var2]','$_POST[var3]','$pass_encrypt')";
$result=$db->query($sql);
if($result);
{
	echo"your record has bee updated";
}
 ?>