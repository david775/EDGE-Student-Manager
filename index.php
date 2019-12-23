<?php 
    session_start();
    error_reporting(0);
    include "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.html";?>
    <title>Kapeirot-Log in_Edge</title>
</head>
<body>
<?php include "header/plantilla.html";?>
    <div class="bodyModel">
        <div class="body container register_modal">
            <form method="POST" action="js/function.php" class="col-12 form-group">
                <div class="row form-group">
                </div>
                <div class="row form-group" style="border-bottom: 1px solid;">
                    <div class="col-12 col-md-12">
                        <h2>Estudiantes Asociados</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label>Tipo de documento(*)</label>
                            <select  name="docType" id="" class="col-12 col-md-4 form-control float-right">
                                <?php                                 
                                foreach ($con->query('SELECT docType from DocType') as $row) {
                                echo '<option value="'.$row['docType'].'">'.$row['docType'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label>Numero de documento(*):</label>
                            <input type="text" name="docNum" class="col-6 col-md-6 form-control form-control-sm float-right validate"required="" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label>Primer Nombre(*):</label>
                            <input type="text" name="name1" class="col-6 col-md-6 form-control form-control-sm float-right validate"required="">
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label>Segundo Nombre:</label>
                            <input type="text" name="name2" class="col-6 col-md-6 form-control form-control-sm float-right validate"required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label>Primer Apellido(*):</label>
                            <input type="text" name="lst1" class="col-6 col-md-6 form-control form-control-sm float-right validate"required="">
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label>Segundo Apellido(*):</label>
                            <input type="text" name="lst2" class="col-6 col-md-6 form-control form-control-sm float-right validate"required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label>Email(*):</label>
                            <input type="email" name="email" class="col-6 col-md-6 form-control form-control-sm float-right validate"required="">
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label>Contraseña(*)</label>
                            <input type="password" class="col-6 col-md-6 form-control form-control-sm float-right validate"required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-6">
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label>Confirme su contraseña(*)</label>
                            <input type="password" name="password" class="col-6 col-md-6 form-control form-control-sm float-right validate"required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <input type="submit" value="Enviar" class="btn button float-right">
                            <a href="javascript:;" class="btn buttonClose float-right" onclick="displayNone();">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="fondo">
        <form action="" method="post">
            <div class="login">
                <div class="login2">
                    <h2 id="title">Iniciar Sesión</h2><br><br>
                    <p>
                        <span style="margin-left: 15%">Correo Electrónico:</span>
                        <input type="email" style="margin-left: 40px; background-color: #a2d1bfd2; border: none" name="email">
                        <br><br>
                    </p>
                    <p>
                        <span style="margin-left:15%">Contraseña:</span>
                        <input type="password" style="margin-left: 91px; background-color: #a2d1bfd2; border: none" name="password">
                        <br><br>
                    </p>
                </div>
                <div class="loginButtons">
                    <a href="javascript:;" class="registration" onclick="display();">Quiero registrarme</a>
                    <input type="submit"  class="btn button" value=" Iniciar sesión " name="submit">
                </div>
            </div>
        </form>
    </div>
<?php 
/*este bloque realiza la conexión con la base de datos y trae información para conpararla en el siguiente bloque*/
$email = $_POST['email'];
$password=$_POST['password'];
    $sql= "SELECT Person.email,User.password,User.fkpk_docType,User.fkpk_docNum from Person 
    join User on Person.email=User.email where Person.email='$email'";
    $query = $con->query($sql);
    if ($query->num_rows===1):
        foreach ($query as $r):
            $user= $r["email"];
            $pass=$r['password'];
            $docType=$r['fkpk_docType'];
            $docNum=$r['fkpk_docNum'];
            $sql1="SELECT fkpk_role from User_has_role where User_has_role.User_fkpk_docType='$docType' and User_has_role.User_fkpk_docNum='$docNum'";
            $query1 = $con->query($sql1);
            /* este bloque de codigo hace la validación del email y la contraseña,
            si todo coincide verifica el tipo de usuario y direcciona*/
            if($email===$user and $password===$pass){
                foreach ($query1 as $q):
                    $role=$q['fkpk_role'];
                    if ($role==='1') {
                         $_SESSION['docType']=$docType;
                         $_SESSION['docNum']=$docNum;
                        print "<script>window.location='home.php';</script>";
                    }elseif ($role==='2') {
                         $_SESSION['docType']=$docType;
                         $_SESSION['docNum']=$docNum;
                        print "<script>window.location='cajero.php';</script>";
                    }elseif ($role==='3') {
                         $_SESSION['docType']=$docType;
                         $_SESSION['docNum']=$docNum;
                        print "<script>window.location='family.php';</script>";
                    }
                endforeach;
            }else{
                print "<script>alert(\"El usuario o contraseña no existe.\");</script>";
            }
        endforeach;
    endif;
?>
<?php include "footer.html";?>

</body>
</html>
