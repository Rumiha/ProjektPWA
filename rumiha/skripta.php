<?php
    $picture = $_FILES['pphoto']['name'];
    $title=$_POST['title'];
    $about=$_POST['about'];
    $content=$_POST['content'];
    $category=$_POST['category'];
    $date=$_POST['datum'];
    $date=date('d.m.Y.',strtotime($date));
    if(isset($_POST['archive'])){
        $archive=1;
    }else{
        $archive=0;
    }
    $target_dir = 'img/'.$picture;
    move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);

    $dbc = mysqli_connect('localhost', 'root', '', 'projekt') or 
    die('Error connecting to MySQL server.'. mysqli_connect_error());
    

    $query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, 
    arhiva ) VALUES ('$date', '$title', '$about', '$content', '$picture', 
    '$category', '$archive')";

    $result = mysqli_query($dbc, $query) or die('Error querying databese.'); 
    mysqli_close($dbc);
    
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
    <div class="container">
        <p>Unos uspješan.</p>
        <a href="index.php">Povratak na index.</a>
        <hr>

    </div>
    <footer class="page-footer text-center">
        <p><b>Nachrichten vom 17.05.2019 | © stern.de GmbH<b></p>
    </footer>
</body>
</html>

