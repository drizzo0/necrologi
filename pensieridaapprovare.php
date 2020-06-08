<?php
    include 'dbconnect.php';
    if(!isset($_SESSION['user']) && !isset($_SESSION['user']['username'])){
        header('location: accedi.php');
    }