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
        if(isset($_POST['accedi'])) {
            $emailOrUsername = $_POST['emailOrUsername'];
            $password = md5($_POST['password']);
            if ($sql->query("SELECT * FROM utenti WHERE email='$emailOrUsername'")->num_rows > 0) {
                if ($sql->query("SELECT * FROM utenti WHERE email='$emailOrUsername' AND password='$password'")->num_rows > 0) {
                    $user = $sql->query("SELECT * FROM utenti WHERE email='$emailOrUsername'")->fetch_array();
                    $_SESSION['user']['username'] = $user['username'];
                    $_SESSION['user']['id'] = $user['id'];
                    $_SESSION['user']['nome'] = $user['nome'];
                    $_SESSION['user']['cognome'] = $user['cognome'];
                    $_SESSION['user']['email'] = $user['email'];
                    header('location: index.php');
                } else {
                    //password errata
                }
            } elseif ($sql->query("SELECT * FROM utenti WHERE username='$emailOrUsername'")->num_rows > 0) {
                if ($sql->query("SELECT * FROM utenti WHERE username='$emailOrUsername' AND password='$password'")->num_rows > 0) {
                    $user = $sql->query("SELECT * FROM utenti WHERE username='$emailOrUsername'")->fetch_array();
                    $_SESSION['user']['username'] = $user['username'];
                    $_SESSION['user']['id'] = $user['id'];
                    $_SESSION['user']['nome'] = $user['nome'];
                    $_SESSION['user']['cognome'] = $user['cognome'];
                    $_SESSION['user']['email'] = $user['email'];
                    header('location: index.php');
                } else {
                    //password errata
                }
            } else {
                //Utente non trovato
            }
        }
    }