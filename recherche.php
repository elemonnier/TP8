<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="citation.php">Informations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="recherche.php">Recherche</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="modification.php">Modification</a>
            </li>
        </ul>
    </div>
</nav>
<h2>Rechercher une citation</h2>
<hr>
<form>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Auteur</label>
        <select class="form-control" id="exampleFormControlSelect1">
            <?php
            include 'connexpdo.php';

            $dsn = 'pgsql:host=localhost;port=5432;dbname=citations;';
            $user = 'postgres';
            $password = 'new_password';
            $idcon = connexpdo($dsn, $user, $password);

            $query1 = "SELECT * FROM auteur";
            $result1 = $idcon->query($query1);
            $i = 0;
            foreach($result1 as $data)
            {
                $i++;
            }
            for ($j = 1; $j <= $i; $j++){
                $query = "SELECT nom, prenom FROM auteur where id = $j";
                $result2 = $idcon->prepare($query);
                $result2->execute();
                $res2 = $result2->fetch();
                echo "<option>".$res2[1]." ".$res2[0]."</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Siècle</label>
        <select class="form-control" id="exampleFormControlSelect1">
            <?php
            $query3 = "SELECT * FROM siecle";
            $result3 = $idcon->query($query3);
            $k = 1;
            foreach($result3 as $data)
            {
                $k++;
            }
            for ($j = 2; $j <= $k; $j++){
                $query = "SELECT numero FROM siecle where id = $j";
                $result2 = $idcon->prepare($query);
                $result2->execute();
                $res2 = $result2->fetch();
                echo "<option>".$res2[0]."</option>";
            }
            ?>
        </select>
    </div>
    <input type="submit">
</form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<?php
