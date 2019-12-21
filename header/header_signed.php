<div class="header">
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-2">
                    <img class="img-fluid" src="../../edge/media/escudo.png" alt="Escudo">
                </div>
                <div class="col-2">
                    <img class="img-fluid" src="../../edge/media/Edge.png" alt="Edge-Logo"  style="padding: 10% 0 0 40%;">
                </div>
                <div class="col-7">
                    <h2 class="ht2 text-left">Student Manager 2020</h2>
                </div>
                <div class="col-1">
                    <span class="name">
                        <?php
                            $doc=$_SESSION['docType'];
                            $num=$_SESSION['docNum'];
                            $query=$con->query("SELECT name1 from Person WHERE fkpk_docType='$doc' AND docNum='$num'");
                            $q=$query->fetch_object();
                            $name=$q->name1;
                            echo $name;
                        ?>
                    </span>
                    <img class="img-fluid" name="user" src="../../edge/media/login.png" style="padding: 0 5% 0 40%; float: right" alt="User-Icon">
                    <a class="name" href="logout.php" onclick="return confirm('¿Desea cerrar sesión?')">Salir</a>
                </div>
            </div>
        </div>
    </header>
</div> 