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
    <title>Edge Student Manager GESTOR</title>
</head>
<body>
<?php //include "header/header_signed.php";?> 
    <div class="body container">
        <div class="row">
            <div class="col-2">
                <div class="row">
                    <div class="col-md-12">
                        <a href="#" class="btn" id="buttons">Registrar Matricula</a>
                    </div>
                    <div class="col-md-12">
                        <a href="consulta/index.html" class="btn" id="buttons">Consulta</a>
                    </div>
                    <div class="col-md-12">
                        <a href="#" class="btn" id="buttons">Informes</a>
                    </div>
                </div>
            </div>
            <div class="col-10 row" data-toggle="buttons">
                <?php
                $sql1 = "SELECT Enrollment.fk_idCourse,Student_has_Relative.s_fkpk_docType,
                Student_has_Relative.s_fkpk_docNum
                from Student_has_Relative 
                join Enrollment on Enrollment.r_fkpk_docNum=Student_has_Relative.s_fkpk_docNum
                join person on person.docNum=Student_has_Relative.rtive_fkpk_docNum 
                where Student_has_Relative.rtive_fkpk_docType='$SdocType' and Student_has_Relative.rtive_fkpk_docNum='$SdocNum'
                ";
                $query = $con->query($sql1);
                if ($query->num_rows>0):?>
                <div class="formulario bordere col-12">
                    <div class="row">
                        <div class="data  col-6">
                            <div class="row form-group">
                            </div>
                            <div class="row form-group" style="border-bottom: 1px solid;">
                                <div class="col-12 col-md-12">
                                    <h2>Estudiantes Asociados</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group"style="height: 30px; text-align: center;padding: 8px;">
                        <div class="col-3 col-md-3">Nombre</div>
                        <div class="col-3 col-md-3">Curso</div>
                        <div class="col-3 col-md-3">Tipo de Documento</div>
                        <div class="col-3 col-md-3">Número de Documento</div>
                    </div>                                
                    <?php foreach ($query as $r):?>
                        <div class="row form-group"style="height: 30px; text-align: center;padding: 8px;">
                            <div class="col-3 col-md-3" id="home">
                            <?php
                                $SdocType=$r['s_fkpk_docType'];
                                $SdocNum=$r['s_fkpk_docNum'];
                                $query1="SELECT name1,lstnm1 from Person where fkpk_docType='$SdocType' and docNum='$SdocNum'";
                                foreach ($con->query($query1) as $a){
                                echo $a['name1'];
                                }
                                ?>
                            </div>
                            <div class="col-3 col-md-3" id="home"><?php echo $r["fk_idCourse"];?></div>
                            <div class="col-3 col-md-3" id="home"><?php echo $r["s_fkpk_docType"];?></div>
                            <div class="col-3 col-md-3" id="home"><?php echo $r["s_fkpk_docNum"];?></div>
                        </div>
                    <?php endforeach;?>
                    
                    <?php else:?>
                    <div class="row col-12 col-md-12">
                        <div class="data  col-12">
                            <div class="row form-group">
                            </div>
                            <div class="row form-group" style="border-bottom: 1px solid;">
                                <div class="col-12 col-md-12">
                                    <h2>No hay estudiantes asociados</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-12 col-md-12">
                        <div class="row form-group col-12 col-md-12">
                            <a href="family.php" class="btn button float-right">Nuevo Registro</a>
                        </div>
                    </div>
                </div> 
                <?php endif;?>
            </div> 
        </div>
    </div>    
</body>
</html>