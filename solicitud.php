<?php 
    error_reporting(0);
    include "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.html";?>
    <title>Solicitud de Cupo - Kapeirot</title>
</head>
<body>
<?php include "header/header_signed.php";?>
    <div class="main">
    <h2>Registro de Aspirante</h2>
    <span style="padding-left:40%">Los recuadros marcados con (*) son obligadorios.</span>
    <div class="container">
        <form action="" method="post">
            <label for="stdType">Tipo de estudiante*:</label>
            <select name="stdType"><?php 
                foreach ($con->query('SELECT stdType from StudentType') as $row) {
                    echo '<option value="'.$row['stdType'].'">'.$row['stdType'].'</option>';
                }
            ?></select><br>
            <label for="grade">Grado*:</label> 
            <select name= "grade"><?php 
            foreach ($con->query('SELECT descGrade from Grade') as $row) {
            echo '<option value="'.$row['descGrade'].'">'.$row['descGrade'].'</option>';
            }
            ?></select><br>
            <label for="firstname">Primer nombre*:</label>   
            <input type="text" name="firstname">
            <label for="middlename">Segundo nombre:</label>   
            <input type="text" name="middlename"><br>
            <label for="familyname">Primer apellido*:</label>   
            <input type="text" name="familyname">
            <label for="lastname">Segundo apellido:</label>   
            <input type="text" name="lastname"><br>
            <label for="docType">Tipo de documento*:</label>
            <select name="docType"><?php 
                foreach ($con->query('SELECT docType from DocType') as $row) {
                    echo '<option value="'.$row['docType'].'">'.$row['docType'].'</option>';
                }
            ?></select>
            <label for="docNum">Número de documento*:</label>   
            <input type="text" name="docNum"><br>
            <label for="birthDate">Fecha de nacimiento*:</label>   
            <input type="date" name="birthDate">
            <label for="birthPlace">Lugar de nacimiento*:</label>   
            <input type="text" name="birthPlace"><br>
            <label for="age">Edad:</label>
            <span name="age">XX años</span>
            <label for="rh">Tipo de sangre*</label>
            <select name="rh"><?php 
                foreach ($con->query('SELECT * from Rh') as $row) {
                    echo '<option value="'.$row['rh'].'">'.$row['rh'].'</option>';
                }
            ?></select>
            <label for="eps">E.P.S.*:</label>
            <input type="text" name="eps"><br>
            <label for="email">Correo electrónico*:</label>
            <input type="email" name="email">
            <label for="cellPhone">N° celular*:</label>
            <input type="text" name="cellPhone">
        </form>
    </div>
</div>
</body>
</html>