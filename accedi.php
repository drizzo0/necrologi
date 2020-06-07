<?php
    include 'dbconnect.php';
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        if(isset($_SESSION['user']) && isset($_SESSION['user']['username'])){

            header('location: index.php');

        }else{
            ?>

                <form method="post" action="#accedi">
                    <label for="emailOrUsername">Email o nome utente:</label>
                    <input type="text" id="emailOrUsername" name="emailOrUsername"><br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password"><br>
                    <input type="submit" name="accedi" id="accedi" value="Accedi!">
                </form>

            <?php
        }
    }elseif ($_SERVER['REQUEST_METHOD'] == "POST"){

        if(isset($_POST['accedi'])){
            $emailOrUsername = $_POST['emailOrUsername'];
            $password = md5($_POST['password']);
            if($sql->query("SELECT * FROM utenti WHERE email='$emailOrUsername'")->num_rows > 0){
                if($sql->query("SELECT * FROM utenti WHERE email='$emailOrUsername' AND password='$password'")->num_rows > 0){
                    die("Entrato con email");
                }else{
                    die("Password errata");
                }
            }elseif($sql->query("SELECT * FROM utenti WHERE username='$emailOrUsername'")->num_rows > 0){
                if($sql->query("SELECT * FROM utenti WHERE username='$emailOrUsername' AND password='$password'")->num_rows > 0){
                    die("Entrato con username");
                }else{
                    die("Password errata");
                }
            }else{
                die("Utente non trovato");
            }

        }
        print_r($_POST);

    }