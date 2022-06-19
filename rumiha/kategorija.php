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
            <div class="container musica">
                <div class="row">
                    <?php
                        $kategorija=$_GET['id'];
                        $query= "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='$kategorija'";
                        $result=mysqli_query($dbc,$query);
                        while($row=mysqli_fetch_array($result)){
                            echo "<div class='col-md-4' style='padding: 20px 20px 20px 20px'>";
                            echo "<a href='clanak.php?id=" . $row['id'] . "'>";
                            echo "<img src='img/" . $row['slika'] . "' class = 'img-responsive' width = '100%' />";
                            echo "<div class='index-mini-naslov'>".$row['naslov']."</div>";
                            echo "<div class='index-sazetak'>".$row['sazetak']."</div>";
                            echo "</a>";
                            echo "</div>";
                        };
                        mysqli_close($dbc);
                    ?>
                </div>
            </div>
        </section>
    </div>
    <footer class="page-footer text-center">
        <p><b>Nachrichten vom 17.05.2019 | © stern.de GmbH<b></p>
    </footer>
</body>
</html>