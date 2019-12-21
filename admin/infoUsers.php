<?php
    session_start();
    // error_reporting(0);
    include "../conexion.php";
    $SdocNum = $_SESSION['docNum'];
    $SdocType = $_SESSION['docType'];
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
<link rel="stylesheet" type="text/css" href="../styles/hosteess.css">

  <title></title>
  </head>
  <body>
  <?php include "../header/header_signed.php";?>
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
                  <a href="consulta/index.html" id="buttons">Consulta</a>
                </div>
            </div>
        <div class="row">
          <div class="col-md-12">
            <a href="#" id="buttons">Informes</a>
          </div>
        </div>
      </div>

      <div class="bodySas">
          <h3 style="margin-left:4%">Información de Usuario</h3>
          <br>
          <hr style="border-color: 3px black; margin-left: 4%" width="92%">
          <br>
      </div>
      <?php
      $sql1 = "SELECT *
      from User
      join User_has_Role on User.fkpk_docNum=User_has_Role.User_fkpk_docNum
      join person on person.docNum=User_has_Role.User_fkpk_docNum
      where User_has_Role.User_fkpk_docType='$SdocType' and User_has_Role.User_fkpk_docNum='$SdocNum'";
      $query = $con->query($sql1);
      if ($query->num_rows>0):?>
      <div class="row form-group"style="height: 30px; text-align: center;padding: 8px;">
          <div class="col-3 col-md-3">Correo Electrónico</div>
          <div class="col-3 col-md-3">Tipo de Documento</div>
          <div class="col-3 col-md-3">Número de Documento</div>
      </div>
      <?php
      foreach ($query as $r):?>
      <div class="row form-group"style="height: 30px; text-align: center;padding: 8px;">
      <div class="col-3 col-md-3" id="home">
      <?php
          $SdocType=$r['fkpk_docType'];
          $SdocNum=$r['fkpk_docNum'];
          $query1="SELECT email from User where fkpk_docType='$SdocType' and fkpk_docNum='$SdocNum'";
          foreach ($con->query($query1) as $a){
          echo $a['email'];
          }
      ?>

      </div>
        <div class="col-3 col-md-3" id="home"><?php echo $r["fkpk_docType"];?></div>
        <div class="col-3 col-md-3" id="home"><?php echo $r["fkpk_docNum"];?></div>
      </div>
      <?php endforeach;?>
      <?php endif;?>
  </div>
  </div> 
  </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
