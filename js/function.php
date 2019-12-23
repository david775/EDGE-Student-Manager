<?php
    session_start();
    include "../conexion.php";
    $docType=$_POST['docType'];
    $docNum=$_POST['docNum'];
    $name1=$_POST['name1'];
    $name2=$_POST['name2'];
    $lst1=$_POST['lst1'];
    $lst2=$_POST['lst2'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $user=1;
    $sql = "INSERT into Person (fkpk_docType,docNum, name1, name2, lstnm1, lstnm2, email, status)
    values('$docType','$docNum','$name1','$name2','$lst1','$lst2','$email',1)";
    $sql1 ="INSERT into User (fkpk_docType,fkpk_docNum,password,email)
    values('$docType','$docNum','$password','$email')";
    $sql2 ="INSERT into User_has_Role (User_fkpk_docType,User_fkpk_docNum,fkpk_role) values
    ('$docType','$docNum','$user')";
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
?>