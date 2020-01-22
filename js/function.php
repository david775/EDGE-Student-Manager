<?php

session_start();
include "../conexion.php";
class person{
    // ATTRIBUTES
    public $docType=$_POST['docType'];
    public $docNum=$_POST['docNum'];
    public $name1=$_POST['name1'];
    public $name2=$_POST['name2'];
    public $lst1=$_POST['lst1'];
    public $lst2=$_POST['lst2'];
    public $email=$_POST['email'];
    public $password=$_POST['password'];
    public $user=1;  
    // METHODS
    public POSTPerson($fkpk_docType,$docNum,$name1,$name2,$lstnm1,$lstnm2,$email,$status){
        $sql = "INSERT into Person (fkpk_docType,docNum, name1, name2, lstnm1, lstnm2, email, status)
        values('$docType','$docNum','$name1','$name2','$lst1','$lst2','$email',1)";
        try{
            $con->query($sql);
            $con->query($sql1);
            $con->query($sql2);
            
            $_SESSION['docType']=$docType;
            $_SESSION['docNum']=$docNum;
        print "<script>alert(\"Agregado existosamente.\");window.location='../home.php';</script>";
        } catch (Exception $e){
        echo $e->getMessage();
        };
        
        $sql1 ="INSERT into User (fkpk_docType,fkpk_docNum,password,email)
        values('$docType','$docNum','$password','$email')";
        $sql2 ="INSERT into User_has_Role (User_fkpk_docType,User_fkpk_docNum,fkpk_role) values
        ('$docType','$docNum','$user')";
    }
}
?>