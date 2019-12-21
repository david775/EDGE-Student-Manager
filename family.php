<?php 
    session_start();
    // error_reporting(0);
    include "conexion.php";
    $SdocNum = $_SESSION['docNum'];
    $SdocType = $_SESSION['docType'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.html";?>
    <?php include "footer.html";?>
    <title>Document</title>
</head>
<body>
    <?php include "header/header_signed.php";?>  
    <div class="body  container">
        <form method="POST" action="js/family.php">
            <div class="row">
                <div class="bodyButtons col-2">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#" id="buttons">Registrar Matricula</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <a href="home.html" id="buttons">Consulta</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="#" id="buttons">Informes</a>
                    </div>
                </div>
            </div>
            <div class="col-10 row space-body">
                <div class="fees col-5 btn-group btn-group-toggle" id="redondo">
                    <label href=""  for="info" class="btn btn-success" id="redondo">Acudiente</label>
                    <label href="home.php" id="margacu" name="acu" class="btn btn-outline-success" >Información del estudiante</label>
                </div>
                <!-- formulario -->
                <?php 
                foreach ($con->query("SELECT * from Person  where fkpk_docType='$SdocType' and docNum='$SdocNum'") as $q):
                    $docNum=$q['docNum'];
                    $name1=$q['name1'];
                    $name2=$q['name2'];
                    $lst1=$q['lstnm1'];
                    $lst2=$q['lstnm2'];
                    $cellPhone=$q['cellPhone'];
                    $email=$q['email'];
                    $status=$q['status'];
                    $address=$q['address'];
                    $phone=$q['phone'];
                    $docType=$q['fkpk_docType'];
                    ?>
                    <input type="hidden" value="<?php echo$_SESSION['docType']?>" class="doc">
                    <?php
                    $query3=$con->query("SELECT fk_idRelation from Student_has_Relative where rtive_fkpk_docType='$docType' and rtive_fkpk_docNum='$docNum'");
                    if ($query3->num_rows>0):
                        foreach ($query3 as $a) {
                            $idRelation=$a['fk_idRelation'];
                            echo '<input type="hidden" value="'.$idRelation.'" class="Rela">';
                        }
                    endif;
                    $query4=$con->query("SELECT fk_marStat from Relative where Relative.u_fkpk_docType='$SdocType' and Relative.u_fkpk_docNum='$SdocNum'  ");
                    // $query4=$con->query("SELECT fk_marStat from Relative where Relative.u_fkpk_docType='$docType' and Relative.u_fkpk_docNum='$docNum' ");
                    if ($query4->num_rows>0):
                        foreach ($query4 as $d) {
                            $marStat=$d['fk_marStat'];
                            echo '<input type="hidden" value="'.$marStat.'" class="marStat">';
                        }
                    endif;
                    
                    ?>
                    <div class="formulario col-12">
                        <div class="row form-group">
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <h2>Información personal</h2>
                            </div>
                            <div class="col-6">
                                <spam>Los recuadros marcados con (*) son campos obligatorios.</spam>
                            </div>
                        </div>
                        <div class="row form-group">
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <label>Primer nombre*</label>
                                <input name="name1" class="col-12 col-md-6 form-control form-control-sm float-right" value="<?php echo $name1?>">
                            </div>
                            <div class="col-6 form-group">
                                <label>Telefono *</label> 
                                <input type="text" name="cellPhone" class="col-12 col-md-6 form-control form-control-sm float-right" value="<?php echo$phone?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6 form-group">
                                <label>Primer apellido*</label>
                                <input name="lstnm1" class="col-12 col-md-6 form-control form-control-sm float-right" value="<?php echo $lst1?>">
                            </div>
                            <div class="col-6 form-group">
                                <label>Segundo apellido*</label>
                                <input name="lstnm2" class="col-12 col-md-6 form-control form-control-sm float-right" value="<?php echo $lst2?>">
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-6 form-group">
                                <label>Tipo de documento *</label>
                                <select  name="docType" id="famDocType" class="col-12 col-md-4 form-control float-right">
                                    <?php
                                    $query2=$con->query("SELECT docType from DocType");
                                    if ($query2->num_rows>0):
                                        foreach ($query2 as $d) {
                                            $docType= $d["docType"];
                                            echo '<option value="'.$docType.'">'.$docType.'</option>';
                                        }
                                    endif;
                                    ?>
                                </select>
                            </div>
                            <div class="col-6 form-group">
                                <label>Número de documento *</label>
                                <input type="text" name="docNum" class="col-12 col-md-6 form-control form-control-sm float-right" value="<?php echo$docNum?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <label>Dirreción casa *</label>
                                <input type="text" name="address" class="col-12 col-md-6 form-control form-control-sm float-right" value="<?php echo$address?>"> 
                            </div>
                            <div class="col-6 form-group">
                                <label>Telefono *</label> 
                                <input type="text" name="cellPhone" class="col-12 col-md-6 form-control form-control-sm float-right" value="<?php echo$phone?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <label>Celular *</label>
                                <input type="text" name="phone" class="col-12 col-md-6 form-control form-control-sm float-right" value="<?php echo $cellPhone?>"> 
                            </div>
                            <div class="col-6 form-group">
                                <label>Correo electrónico *</label>
                                <input type="email" name="email" class="col-12 col-md-6 form-control form-control-sm float-right" value="<?php echo $email?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                            <label>Estado civil*</label>                                        
                            <select name="marStat"class="col-6 col-md-6 form-control form-control-sm float-right" id="smart">
                                <?php
                                $query2=$con->query("SELECT * from MaritalStatus");
                                if ($query2->num_rows>0):
                                    foreach ($query2 as $d) {
                                        $idMarStat=$d['idMarStat'];
                                        $marStatDesc=$d['marStatDesc'];
                                        echo '<option value="'.$idMarStat.'">'.$marStatDesc.'</option>';
                                    }
                                endif;
                                ?>
                            </select>
                        </div>
                        <div class="col-6"> 
                            <label>Parentesco *</label>
                            <select  class="col-6 col-md-6 form-control form-control-sm float-right" id="relation">
                            <?php 
                            $sql1 = "SELECT idRelation,relType from Relation";
                            $query=$con->query($sql1);
                            if ($query->num_rows>0):
                                foreach ($query as $r) {
                                    $idRelation=$r['idRelation'];
                                    $relType=$r['relType'];
                                    echo '<option value="'.$idRelation.'">'.$relType.'</option>';
                                }
                            endif;
                            ?>
                            </select>                           
                        </div>
                    </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <h2>Información laboral</h2>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <label>Tipo de empleo*</label>
                                <select name="business" class="col-4 col-md-4 form-control form-control-sm float-right business" onchange="hidd();">
                                    <option value="1">Informal</option>
                                    <option value="2">Formal</option>
                                </select>
                            </div>
                            <div class="col-6 form-group">
                                <label>A que se dedica*</label>
                                <input name="occupation" class="col-12 col-md-6 form-control form-control-sm float-right">
                            </div>
                        </div>
                        <div class="hidd hidden">
                            <div class="row form-group">
                                <div class="col-6">
                                    <label>Dirección oficina</label>
                                    <input name="businessAddress" class="col-12 col-md-6 form-control form-control-sm float-right">
                                </div>
                                <div class="col-6 form-group">
                                    <label>Telefono de oficina</label>
                                    <input name="businessPhone" class="col-12 col-md-6 form-control form-control-sm float-right">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
                </div> 
            </div> 
            <div class="row col-12">
                <div class="export col-12" id="leftg">
                    <input type="submit" id="redondo"class="btn btn-outline-success float-right" value="Guardar y continuar">
                </div>
            </div>
        </from>
    </div> 
</body>
</html>