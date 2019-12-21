
<?php  
session_start();
include "../conexion.php";
$docNum=$_POST['docNum'];
$name1=$_POST['name1'];
$name2=$_POST['name2'];
$lst1=$_POST['lstnm1'];
$lst2=$_POST['lstnm2'];
$cellPhone=$_POST['cellPhone'];
$email=$_POST['email'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$docType=$_POST['docType'];

$marStat=$_POST['marStat'];
$occupation=$_POST['occupation'];
$business=$_POST['business'];
$businessPhone=$_POST['businessPhone'];
$businessAddress=$_POST['businessAddress'];
$status=1;

$sql="UPDATE Person set name1='$name1',name2='$name2',lstnm1='$lst1',lstnm2='$lst2',cellPhone='$cellPhone',email='$email',status=$status,address='$address',phone='$phone' where docNum='$docNum' and fkpk_docType='$docType' ";
$sql1="INSERT into Relative (fk_marStat,occupation,business,businessPhone,businessAddress,u_fkpk_docType,u_fkpk_docNum)
VALUES($marStat,'$occupation','$business','$businessPhone','$businessAddress','$docType','$docNum')";


$con->query($sql);
var_dump($con);
$con->query($sql1);
var_dump($con);
print "<script>window.location='home.php';</script>";

?>