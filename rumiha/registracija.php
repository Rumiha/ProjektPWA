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
    <style>
        .bojaPoruke{
            color:red;
        }
    </style>
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
        <div class="col-md-3">
        <form name="forma" method="POST">
            <label for="username">Korisničko ime</label>
            <input type="text" name="username" id="username" class="form-field-textual">
            <span id="porukaUsername" class="bojaPoruke"></span><br><br>

            <label for="ime">Ime</label><br>
            <input type="text" required name="ime" id="ime" class="form-field-textual">
            <span id="porukaIme" class="bojaPoruke"></span><br><br>

            <label for="prezime">Prezime</label>
            <input type="text" name="prezime" id="prezime" class="form-field-textual">
            <span id="porukaPrezime" class="bojaPoruke"></span><br><br>

            <label for="lozinka">Lozinka</label>
            <input type="password" name="lozinka" id="lozinka" class="form-field-textual">
            <span id="porukaLozinka" class="bojaPoruke"></span><br><br>

            <label for="pLozinka">Ponovite lozinku</label>
            <input type="password" name="pLozinka" id="pLozinka" class="form-field-textual">
            <span id="porukaPlozinka" class="bojaPoruke"></span>
            <br><br>

            <button type="submit" value="Registriraj se" name="submit" id="submit">Registriraj se</button>
        </form>
        </div>
    </div>
    <footer class="page-footer text-center">
        <p><b>Nachrichten vom 17.05.2019 | © stern.de GmbH<b></p>
    </footer>

    <script type="text/javascript">
        document.getElementById("submit").onclick=function(event){
            var slanjeForme = true;
        
            var poljeIme = document.getElementById("ime");
            var ime = document.getElementById("ime").value;
            if (ime.length == 0) {
            slanjeForme = false;
            poljeIme.style.border="1px solid red";
            document.getElementById("porukaIme").innerHTML="<br>Unesite ime!<br>";
            } else {
            poljeIme.style.border="1px solid green";
            document.getElementById("porukaIme").innerHTML="";
            }
            var poljePrezime = document.getElementById("prezime");
            var prezime = document.getElementById("prezime").value;
            if (prezime.length == 0) {
            slanjeForme = false;
            poljePrezime.style.border="1px solid red";
            
            document.getElementById("porukaPrezime").innerHTML="<br>Unesite Prezime!<br>";
            } else {
            poljePrezime.style.border="1px solid green";
            document.getElementById("porukaPrezime").innerHTML="";
            }
            
            var poljeUsername = document.getElementById("username");
            var username = document.getElementById("username").value;
            if (username.length == 0) {
            slanjeForme = false;
            poljeUsername.style.border="1px solid red";
            
            document.getElementById("porukaUsername").innerHTML="<br>Unesite korisničko ime!<br>";
            } else {
            poljeUsername.style.border="1px solid green";
            document.getElementById("porukaUsername").innerHTML="";
            }
            
            var poljePass = document.getElementById("lozinka");
            var pass = document.getElementById("lozinka").value;
            var poljePassRep = document.getElementById("pLozinka");
            var passRep = document.getElementById("pLozinka").value;
            if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
            slanjeForme = false;
            poljePass.style.border="1px solid red";
            poljePassRep.style.border="1px solid red";
            document.getElementById("porukaLozinka").innerHTML="<br>Lozinke nisu iste!<br>";
            
            document.getElementById("porukaPlozinka").innerHTML="<br>Lozinke nisu iste!<br>";
            } else {
            poljePass.style.border="1px solid green";
            poljePassRep.style.border="1px solid green";
            document.getElementById("porukaLozinka").innerHTML="";
            document.getElementById("porukaPlozinka").innerHTML="";
            }
            
            if (slanjeForme != true) {
            event.preventDefault();
            }
        };
    </script>
</body>
</html>

<?php 
    error_reporting(E_ERROR | E_PARSE);
    include 'connect.php';

    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $username = $_POST['username'];
    $lozinka = $_POST['lozinka'];
    $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
    $razina = 0;
    $registriranKorisnik = '';

    $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }
    if(mysqli_stmt_num_rows($stmt) > 0){
        $msg='Korisničko ime već postoji!';
    }
    else{
        $sql = "INSERT INTO korisnik (ime, prezime,korisnicko_ime,lozinka,razina) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, 
            $hashed_password, $razina);
            if(mysqli_stmt_execute($stmt)){
                echo
                "<script type='text/javascript'>
                window.location.href = 'login.php';
                </script>";
            };
        }
    }
    mysqli_close($dbc);
?>

