<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Petar Rumiha</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="page-header">
        <div class="container">
            <div class="row header-logo">
                <div class="col-md-1 header-logo">
                    <a href="unos.html">
                        <img src="img/sternlogo.png"/>
                    </a>
                </div>
                <div class="col-lg-1">
                    <a class="nav-link" href="index.php">Home</a>
                </div>
                <div class="col-lg-1">
                    <a class="nav-link" href="login.php">Admin</a>
                </div>
                <div class="col-lg-1">
                    <a class="nav-link" href="kategorija.php?id=politik">Politik</a>
                </div>
                <div class="col-lg-1">
                    <a class="nav-link" href="kategorija.php?id=gesundheit">Gesundheit</a>
                </div>
                <div class="col-lg-7">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid centar">
        <section>
            <div class="container clanak">
                <?php
                    $id=$_GET['id'];
                    $query="SELECT * FROM vijesti WHERE id='$id'";
                    $result=mysqli_query($dbc,$query);
                    while($row=mysqli_fetch_array($result)){
                        $newDate = date("d. M Y", strtotime($row['datum']));
                        echo "  <div class='row'>
                                    <div class='col-lg-10'>
                                        <h1>" . $row['naslov'] . "</h1>
                                    </div>
                                    <div class='col-lg-2'>
                                        <p style='color: grey; font-size: 15px;'>" . $newDate . "</p>
                                    </div>
                                </div>";

                        $substring1 = substr($row['tekst'], 0, 350);
                        echo "<p>" . $substring1 . "</p>";
                        echo "<img src='img/" . $row['slika'] . "'><hr>";
                        echo "<p>" . $row['tekst'] . "</p>";
                        }
                ?>
            </div>
        </section>
    </div>
    <footer class="page-footer text-center">
        <p><b>Nachrichten vom 17.05.2019 | © stern.de GmbH<b></p>
    </footer>
</body>
</html>