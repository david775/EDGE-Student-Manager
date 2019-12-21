<?php include "conexion.php";?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.html";?>
    <?php include "footer.html";?>
    <title>Edge Student Manager GESTOR</title>
</head>
<body>
<?php include "header/header.html";?>  
    <p style="margin: 11% auto 0px 50%;width: auto">Los recuadros marcados con (*) son campos obligatorios.</p>
    <div class="body container">
        <div class="row">
            <div class="bodyButtons col-2">
                <div class="row">
                    <div class="col-md-12">
                        <a href="#" id="buttons">Registrar Matricula</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="../consulta/index.html" id="buttons">Consulta</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="#" id="buttons">Informes</a>
                    </div>
                </div>
            </div>
            <div class="col-10 row space-body" data-toggle="buttons">
                <div class="fees col-12 btn-group btn-group-toggle">
                    <label href="" id="info" for="info">Información del estudiante</label>
                    <label href="hostess.php" id="info" name="acu">Acudiente</label>
                </div>
                <div class="formulario col-12">
                    <div class="row">
                        <div class="data  col-6">
                            <div class="row form-group">
                            </div>
                            <div class="row form-group">
                                <div class="col-12 col-md-12">
                <p><strong><label>Solicitud Número:    </label> 
                <?php
                foreach ($con->query('SELECT regNum FROM Registry ORDER BY regNum  DESC LIMIT 1;') as $r) {
                    $enrollNum= $r["regNum"]; echo $enrollNum+=1;}
                ?></strong></p>
                                    <strong><label>Solicitud Número:    </label> 
                                    <?php
                                    foreach ($con->query('SELECT regNum FROM Registry ORDER BY regNum  DESC LIMIT 1;') as $r) {
                                        $enrollNum= $r["regNum"]; echo $enrollNum+=1;}
                                    ?></strong>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12 col-md-5">
                                    <p name="t">Tipo de estudiante *</p>
                                </div>
                                <div class="col-6 col-md-7 espacio">  
                                <select><?php 
                                    foreach ($con->query('SELECT stdType from StudentType') as $row) {
                                        echo '<option value="'.$row['stdType'].'">'.$row['stdType'].'</option>';
                                    }
                                ?></select>
                                </div>
                            <div class="row form-group">
                                <div class="col-12 col-md-12 ">
                                    <label>Grado *</label> 
                                <select><?php 
                                    foreach ($con->query('SELECT descGrade from Grade') as $row) {
                                        echo '<option value="'.$row['descGrade'].'">'.$row['stdType'].'</option>';
                                    }
                                ?></select></div>
                            </div> 
                        </div>
                        <div class="col-6 form-group align-self-center">
                            <div class="centerItems"> 
                                <input type="image">
                            </div>
                        </div>
                    </div>     
                    <div class="row">
                        <div class="col-6 form-group">
                            <label> Nombre(s) *</label>
                            <input type="text" class="col-12 col-md-6 form-control form-control-sm float-right"> 
                        </div>
                        <div class="col-6 form-group">
                            <label>Apellidos *</label>
                            <input type="text" class="col-12 col-md-6 form-control form-control-sm float-right">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Tipo de documento *</label>
                            <select><?php 
                                foreach ($con->query('SELECT docType from DocType') as $row) {
                                    echo '<option value="'.$row['docType'].'">'.$row['docType'].'</option>';
                                }
                            ?></select>
                            </div>
                        <div class="col-6">
                            <label>Número de documento *</label>
                            <input type="text" class="col-12 col-md-6 form-control form-control-sm float-right"
                            value="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            Fecha de nacimiento *
                            <input type="datetime" class="col-12 col-md-6 form-control form-control-sm float-right"> 
                        </div>
                        <div class="col-6 form-group">      
                            <label>Lugar de nacimiento</label>
                            <input type="text" class="col-12 col-md-6 form-control form-control-sm float-right">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>Edad</label>
                            <label class="col-md-6"><script></script></label>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label>Tipo de sangre*</label>
                            <select name="" id="" class="col-12 col-md-6 form-control form-control-sm float-right">
                            <?php 
                                foreach ($con->query('SELECT * from Rh') as $row) {
                                    echo '<option value="'.$row['rh'].'">'.$row['rh'].'</option>';
                                }
                            ?>
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>E.P.S *</label>
                            <input type="text" class="col-12 col-md-6 form-control form-control-sm float-right">
                        </div>
                    </div>            
                    <div class="row">
                        <div class=" col form-group">
                            <label for="exampleFormControlInput1">Correo eléctronico</label>
                            <input type="email" class="col-12 col-md-6 form-control form-control-sm float-right" id="" placeholder="name@example.com">
                        </div>
                        <div class="col form-group">
                            <label>Celular *</label>
                            <input type="text" class="col-12 col-md-6 form-control form-control-sm float-right"> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label>Vive con: *</label>
                            <select name="">
                                <?php 
                                foreach ($con->query('SELECT * from Relation') as $row) {
                                    echo '<option value="'.$row['idRelation'].'">'.$row['relType'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div> 
            </div> 
        </div>
        <div class="row">
            <div class="export col-12">
                <a href="#" id="print">Guardar y continuar</a>
            </div>
        </div>
    </div>
    <?php 
/*este bloque realiza la conexión con la base de datos y trae información para compararla en el siguiente bloque*/
    // $sql= "SELECT regNum FROM Registry ORDER BY regNum  DESC LIMIT 1;";
    // $query = $con->query($sql);
    // // if ($query->num_rows===1):
    //     foreach ($query as $r){
    //         $enrollNum= $r["regNum"];
    //         var_dump($enrollNum);}
            // $sql1="SELECT fkpk_role from User_has_role where User_has_role.User_fkpk_docType='$docType' and User_has_role.User_fkpk_docNum='$docNum'";
            // $query1 = $con->query($sql1);
            // /* este bloque de codigo hace la validación del email y la contraseña,
            // si todo coincide verifica el tipo de usuario y direcciona*/
            // if($email===$user and $password===$pass){
            //     foreach ($query1 as $q):
            //         $role=$q['fkpk_role'];
            //         if ($role==='1') {
            //             print "<script>window.location='home.php';</script>";
            //         }elseif ($role==='2') {
            //             print "<script>window.location='home.php';</script>";
            //         }elseif ($role==='3') {
            //             print "<script>window.location='home.php';</script>";
            //         }
            //     endforeach;
            // }else{
            //     print "<script>alert(\"El usuario o contraseña no existe.\");</script>";
            // }
    //     endforeach;
    // endif;
?>
</body>
</html>