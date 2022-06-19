<?php
    include 'connect.php';
    define('UPLPATH', 'img/');
    session_start();

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
        <?php
            if($_SESSION['razina'] == 1) {
                $query = "SELECT * FROM vijesti";
                $result = mysqli_query($dbc, $query);
                echo '<div class="container">';
                while($row = mysqli_fetch_array($result)) {
                    echo '<div class="col-lg-3">
                    <form enctype="multipart/form-data" action="" method="POST">
                    <div class="form-item">
                    <label for="title">Naslov vjesti:</label>
                    <div class="form-field">
                    <input type="text" name="title" class="form-field-textual" 
                    value="'.$row['naslov'].'">
                    </div>
                    </div>
                    <div class="form-item">
                    <label for="about">Kratki sadržaj vijesti (do 50 
                    znakova):</label>
                    <div class="form-field">
                    <textarea name="about" id="" cols="30" rows="10" class="form-field-textual">'.$row['sazetak'].'</textarea>
                    </div>
                    </div>
                    <div class="form-item">
                    <label for="content">Sadržaj vijesti:</label>
                    <div class="form-field">
                    <textarea name="content" id="" cols="30" rows="10" class="form-field-textual">'.$row['tekst'].'</textarea>
                    </div>
                    </div>
                    <div class="form-item">
                    <label for="pphoto">Slika:</label>
                    <div class="form-field">
                    <input type="file" class="input-text" id="pphoto" 
                    value="'.$row['slika'].'" name="pphoto"/> <br><img src="' . UPLPATH . $row['slika'] . '" width=100px>
                    </div>
                    </div>
                    <div class="form-item">
                    <label for="category">Kategorija vijesti:</label>
                    <div class="form-field">
                    <select name="category" id="" class="form-field-textual" 
                    value="'.$row['kategorija'].'">
                    <option value="sport">Musica</option>
                    <option value="kultura">Deportes</option>
                    </select>
                    </div>
                    </div>
                    <div class="form-item">
                    <label>Spremiti u arhivu: 
                    <div class="form-field">';
                    if($row['arhiva'] == 0) {
                    echo '<input type="checkbox" name="archive" id="archive"/> 
                    Arhiviraj?';
                    } else {
                    echo '<input type="checkbox" name="archive" id="archive" 
                    checked/> Arhiviraj?';
                    }
                    echo '</div>
                    </label>
                    </div>
                    </div>
                    <div class="form-item">
                    <input type="hidden" name="id" class="form-field-textual" 
                    value="'.$row['id'].'">
                    <button type="reset" value="Poništi">Poništi</button>
                    <button type="submit" name="update" value="Prihvati"> 
                    Izmjeni</button>
                    <button type="submit" name="delete" value="Izbriši"> 
                    Izbriši</button>
                    </div>
                    </form>
                    ';
                }
                echo "</div>";
            }
            else if($_SESSION['razina'] == 0){
                echo '<div class="container">
                <p>Pozdrav ' . $_SESSION['username'] . '! Uspješno ste prijavljeni ali niste administrator. Nemate dozvolu za izmjenu podataka.</p>
                <br><br><br><br>
                </div>';
            }
            else{
                echo'da';
            }

        ?>
    <footer class="page-footer text-center">
        <p><b>Nachrichten vom 17.05.2019 | © stern.de GmbH<b></p>
    </footer>
</body>
</html>

<?php
    if(isset($_POST['delete'])){
     $id=$_POST['id'];
     $query = "DELETE FROM vijesti WHERE id=$id ";
     $result = mysqli_query($dbc, $query);
     mysqli_close($dbc);
     header("Refresh:0");
    }

    if(isset($_POST['update'])){
    $picture = $_FILES['pphoto']['name'];
    $title=$_POST['title'];
    $about=$_POST['about'];
    $content=$_POST['content'];
    $category=$_POST['category'];
    if(isset($_POST['archive'])){
        $archive=1;
    }else{
        $archive=0;
    }
    $target_dir = 'img/'.$picture;
    move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
    $id=$_POST['id'];
    $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content', 
    slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
    $result = mysqli_query($dbc, $query);
    mysqli_close($dbc);
    }
    
?>
