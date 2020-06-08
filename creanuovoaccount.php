<?php
    include 'dbconnect.php';
    if(!isset($_SESSION['user']) && !isset($_SESSION['user']['username'])){
        header('location: accedi.php');
    }
    if($_SERVER['REQUEST_METHOD']=="GET"){
        ?>
        <form method="post" action="#creaNuovoAccount">
            <input type="text" name="nome" id="nome" placeholder="Nome">
            <input type="text" name="cognome" id="cognome" placeholder="Cognome">
            <input type="text" name="username" id="username" placeholder="Nome utente">
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="password" name="password" id="password" placeholder="Password">
            <input type="submit" name="creaNuovoAccount" id="creaNuovoAccount">
        </form>
        <?php
    }elseif ($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['creaNuovoAccount'])){
            $username = $_POST['username'];
            $nome = $_POST['nome'];
            $cognome = $_POST['cognome'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $dataCreazione = date('Y-m-d H:i:s');
            $creatoDa = $_SESSION['user']['id'];

            $sql->query("INSERT INTO utenti (username, email, nome, cognome, password, dataCreazione, creatoDa) VALUES ('$username', '$email', '$nome', '$cognome', '$password', '$dataCreazione', '$creatoDa')");
            if($sql->error){
                die($sql->error);
            }else{
                header("location: listautenti.php");
            }
        }
    }