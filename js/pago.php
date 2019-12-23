<?php
include "../conexion.php";

    @$payDate=$_REQUEST['payDate'];
    @$month=$_REQUEST['month'];
    @$payer=$_REQUEST['payer'];
    @$payMethod=$_REQUEST['payMethod'];
    @$employee=$_REQUEST['employee'];
    @$fkpk_idFeetype=$_REQUEST['fkpk_idFeetype'];
    @$fkpk_idEnrollment=$_REQUEST['fkpk_idEnrollment'];
    @$e_fk_docType=$_REQUEST['e_fk_docType'];
    @$e_fk_docNum=$_REQUEST['e_fk_docNum'];

    $ins="INSERT INTO CashBox(payDate, month, payer, payMethod, employee, fkpk_idFeetype, fkpk_idEnrollment, e_fk_docType, e_fk_docNum)
    VALUES ('$payDate', '$month', '$payer', '$payMethod', '$employee', '$fkpk_idFeetype', '$fkpk_idEnrollment', '$e_fk_docType', '$e_fk_docNum')";

    try{

        $con->query($ins);
        print "<script>alert(\"Agregado exitosamente.\");window.location='../cajero.php';</script>";

    }

    catch (exception $e){

        echo $e->getMessage();

    }
?>
