<?php
    include "dbconnect.php";
    if(!isset($_SESSION['user']) && !isset($_SESSION['user']['username'])){
        header('location: accedi.php');
    }
    $users = $sql->query("SELECT * FROM utenti");
    while ($user = $users->fetch_assoc()){
        print_r($user);
    }