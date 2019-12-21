        <?php
            session_start();
            error_reporting(0);
            include "conexion.php";
            $SdocNum = $_SESSION['docNum'];
            $SdocType = $_SESSION['docType'];
            $query2="SELECT name1, lstnm1 FROM Person WHERE docNum='$SdocNum' AND fkpk_docType='$SdocType'";
            $q2=$con->query($query2);
            $r2=$q2->fetch_object();

            $Cname1=$r2->name1;
            $Clstnm1=$r2->lstnm1;
         ?>
<!doctype html>
<html lang="en">
  <head>
    <?php include "head.html";?>
    <?php include "footer.html";?>
    <title></title>
  </head>
  <body>


<?php include "header/header_signed.php";?>


    <form class="" action="cajero.php" method="post">
        Documento del estudiante(*):
        <br>
        <select class="" name="docType">
        <?php
            foreach ($con->query('SELECT * FROM DocType') AS $doc){
                echo '<option value="'.$doc['docType'].'">'.$doc['docType'].'</option>';
            };
         ?>
        </select>
        <input type="number" name="docNum" value="" placeholder="# Documento" class="validate"  required>
        <br>
        <input type="submit" name="" value="Buscar">
    </form>
    <br>

    <?php

        $docType=$_REQUEST['docType'];
        $docNum=$_REQUEST['docNum'];
        $query1="SELECT Registry.status,fkpk_docType,docNum,idEnrollment,descGrade,name1,name2,lstnm1,lstnm2 FROM Registry 
        INNER JOIN Enrollment ON s_fkpk_docNum=r_fkpk_docNum 
        INNER JOIN Grade ON fk_idGrade=idGrade 
        INNER JOIN Student ON s_fkpk_docNum=p_fkpk_docNum 
        INNER JOIN Person ON s_fkpk_docNum=docNum WHERE s_fkpk_docType='$docType' AND s_fkpk_docNum='$docNum'";

        $q1=$con->query($query1);

     ?>

    <?php if ($q1->num_rows>0): ?>

        <?php
            $r1=$q1->fetch_object();
            $name1=$r1->name1;
            $name2=$r1->name2;
            $lstnm1=$r1->lstnm1;
            $lstnm2=$r1->lstnm2;

         ?>
            Registro:
            <?php if ($r1->status==1): ?>
                Activo <img src="media/activo.gif" alt="">
            <?php else: ?>
                Inactivo <img src="media/inactivo.gif" alt="">
            <?php endif; ?>
            <br>
            Documento: <?php echo $r1->fkpk_docType.". ".$r1->docNum; ?>
            <br>
            No. matrícula: <?php echo $r1->idEnrollment; ?>
            <br>
            Grado: <?php echo $r1->descGrade.". "; ?>
            <br>
            Nombre: <?php echo $name1." ".$lstnm1.". "; ?>
            <br>
            <br>
            <form class="" action="js/pago.php" method="post">
            Fecha: <input type="date" name="payDate" readonly="readonly"  value="<?php echo date("Y-m-d");?>">
            <br>
            <br>
            Mes(*): <input type="text" name="month" placeholder="# Mes" class="validate" required>
            <br>
            <br>
            Quién paga?(*): <input type="text" name="payer" placeholder="# Pagador" class="validate" required>
            <br>
            <br>
            Método de pago(*)
            <select class="" name="payMethod">
                <option value="">Efectivo</option>
                <option value="">Tarjeta Crédito</option>
                <option value="">Tarjeta Débito</option>
            </select>
            <br>
            <br>
            Recibe(*): <input type="text" name="employee" readonly="readonly" value="<?php echo $Cname1." ".$Clstnm1;?>">
            <br>
            <br>
            Qué paga?(*)
            <select class="" name="fkpk_idFeetype">
            <?php
                foreach ($con->query('SELECT * FROM Feetype') AS $doc1){
                    echo '<option value="'.$doc1['idFeetype'].'">'.$doc1['descFee'].' - '.$doc1['fee'].'</option>';
                };
             ?>
            </select>
            <br>
            <br>

            <input type="hidden" name="e_fk_docType" value="<?php echo $SdocType?>">
            <input type="hidden" name="e_fk_docNum" value="<?php echo $SdocNum?>">

            <input type="hidden" name="fkpk_idEnrollment" value="<?php echo $r1->idEnrollment?>">
            <input type="submit" name="" value="Registrar Pago">
        </form>

    <?php else: ?>
        <p>Usuario no encontado!!!</p>
    <?php endif; ?>

  </body>
</html>
