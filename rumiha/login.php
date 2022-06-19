<?php
    include 'connect.php';
    define('UPLPATH', 'img/');
    session_start();

    $registracija = false;
    if(isset($_POST['button1'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $razina = 0;
        $uvijet = TRUE;
        if(empty($username)){
            $uvijet = FALSE;
            echo '<script type="text/javascript">document.getElementById("errorUsername").innerHTML="<>Username is missing!<br>";</script>';
        }
        if(empty($password)){
            $uvijet = FALSE;
            echo '<script>document.getElementById("errorPass").innerHTML="<br>Title is missing!<br>";</script>';
        } 
        if($uvijet){
            $querry = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?;";
            $stmt = mysqli_stmt_init($dbc);
            if(mysqli_stmt_prepare($stmt, $querry)){
                mysqli_stmt_bind_param($stmt, 's', $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt, $username, $hashedPassword, $razina);
                mysqli_stmt_fetch($stmt);
                $hash = password_hash($password, CRYPT_BLOWFISH);
                if(password_verify($password, $hashedPassword)){
                    echo '<script>alert ("Welcome back!!!") </script>';
                    $_SESSION['username'] = $username;
                    $_SESSION['razina'] = $razina;

                    echo
                    "<script type='text/javascript'>
                    window.location.href = 'administracija.php';
                    </script>";
                }
                else{
                    echo '<script>alert ("Wrong password or username!")</script>';
                    $registracija = false;
                }
            }
        }


    }

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
            <form method="post">
                <div class="col-md-3">
                    <label for="inputTitle" class="form-label">Username:</label>
                    <input type="text" class="form-control" name="username" id="username">
                    <span id="errorUsername" class="error"></span>
                </div>
                <br>
                <div class="col-md-3">
                    <label for="inputTitle" class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" id="pass">
                    <span id="errorPass" class="error"></span>
                </div>
                <div class="col-md-3">
                    <button type="submit" name="button1" value="button1" id ="button1s" onsubmit="return submit();" class="btn btn-primary mt-4">Log in</button><br>
                    <a href="registracija.php">Register here!</a>
                </div>
            </form>
        </div>
        <script type="text/javascript">
                document.getElementById("button1s").onclick = function(event) {
                var uvijet = true;
                var username = document.getElementById("username").value;
                if(username.length == 0) {
                    uvijet = false;
                    document.getElementById("errorUsername").innerHTML="Missing username!<br>";
                }
                var pass= document.getElementById("pass").value;
                if(pass.length == 0) {
                    uvijet = false;
                    document.getElementById("errorPass").innerHTML="Missing password!<br>";
                }
                if (uvijet != true) {
                    event.preventDefault();
                }
            };
        </script>
    </div> 
    <footer class="page-footer text-center">
        <p><b>Nachrichten vom 17.05.2019 | © stern.de GmbH<b></p>
    </footer>      
</body>
</html>