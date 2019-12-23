<?php 
    session_start();
    // error_reporting(0);
    include "../conexion.php";
?>
<!doctype html>
<html lang="en">
  <head>    
  <?php include "../head.html";?>
  <?php include "../footer.html";?>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../styles/modal.css">
<link rel="stylesheet" type="text/css" href="../styles/studentStyle.css">
<link rel="stylesheet" type="text/css" href="../styles/login_style.css">
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<link rel="stylesheet" type="text/css" href="../styles/informes.css">
<link rel="stylesheet" type="text/css" href="../styles/infoUsers.css">
<link rel="stylesheet" type="text/css" href="../styles/rolUser.css">
<link rel="stylesheet" type="text/css" href="../styles/user.css">
  <title></title>
  </head>
  <body>
  <?php include "../header/header_signed.php";?>  
  </div>
  <div class="bodySos">
    <div class="bodyButtons">
        <a type="button" value="crearAdmin" id="crearAdmin" href="rolUser.php">CrearAdmin</a> <br>
        <a type="button" value="informes" id="informes" href="informes.php">Informes</a><br>
        <a type="button" value="seguridad" id="seguridad" href="user.php">Seguridad</a>
    </div>

      <div class="bodySas">
          <h3 style="margin-left:4%">Consulta Estudiante</h3>
          <center><h6>Seleccione uno de los métodos de búsqueda y complete la información requerida frente a esa opción.</h6></center>
          <hr style="border-color: 3px black; margin-left: 4%" width="92%">
          <br>
          <p>
            Nombre(*):
            <input type="text" style="margin-left: 90px" name="desde" id="??">
            <span style="margin-left: 39px">Apellidos(*):</span>
            <input type="text" style="margin-left: 110px" name="desde" id="??">
            <br><br>
          </p>
          <p>
            Tipo de Documento(*): 
            <select class="Lista" name="TDList">
              <option>Seleccione</option>
              <option>Cedula de Ciudadanía</option>
              <option>Tarjeta de Identidad</option>
              <option>Cedula de Extranjeria</option>
            </select>
            <span style="margin-left: 36px">Numero de Documento(*):</span>
            <input type="text" style="margin-left: 11px" name="desde" id="??">
            <br><br>
          </p>
          <p>
            Número de Matricula:<input type="text" style="margin-left: 14px" name="desde" id="??">
            <br><br>
          </p>
          <p>
            Curso: <select class="Lista" name="Clist">
              <option>Seleccione</option>
              <option>6to</option>
              <option>7mo</option>
              <option>8vo</option>
              <option>9no</option>
              <option>10mo</option>
              <option>11</option>
            </select>
            <br><br>
          </p>
      </div>
      <div id="comeBack">
        <a type="button" value="Regresar" style=" margin-bottom: 5px; border:hidden; padding: 3px 3px" href="rolUser.php">Regresar</a> &nbsp;&nbsp;
        <a type="button" value="Siguiente" style=" margin-bottom: 5px; border:hidden; padding: 3px 3px" href="">Siguiente</a>
      </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
