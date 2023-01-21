<?php

include "konekcija.php";
require "models/administrator.php";

session_start();

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $administrator = new Administrator(1, $username, $password);
    $admin = Administrator::login($administrator, $conn);
    
    if($admin->num_rows==1){
        $_SESSION['admin'] = $administrator->username;
        setcookie("admin", $username, time() + 3600);
        header('Location: index.php');
        exit();
    }else{
        echo '<script type="text/javascript">
               window.onload = function () { alert("Pogrešni kredencijali! Pokušajte ponovo"); } 
              </script>'; 
    }
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Instrumenti</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    
</head>

<body>
    <div class="login-form">
        <div class="main-div">
            <div class="container" style="margin-top: 20px; margin-bottom: -50px;">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4 text-center">
                        <div class="section-heading">
                            <br><img src="assets/css/b.png" style="width: 70%; margin:auto; margin-bottom: 10px;">
                            <br><h2>Prijava</h2>
                        </div>
                        </div>
                    </div>
                </div>
                <form method="post" action="">
                    <br><br><br><br>
                    <br>
                    <div class="container" style="width: 30%; margin: auto;">
                    <br>

                    <label for="username">Korisničko ime</label>
                    <input type="text" name="username" class="form-control" required>
                    <br>

                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                    <br>

                    <button type="submit" class="btn btn-primary" style="background-color: #990000; width: 80%; margin-left: 10%; margin-top:5%; border: 1px #80da62;" name="submit">Uloguj se</button>
                    <br><br>
                </div>
            </form>
        </div>
    </div>

    <br>

</body>
</html>