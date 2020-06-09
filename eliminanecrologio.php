<?php
    include 'dbconnect.php';
    if(!isset($_SESSION['user']) && !isset($_SESSION['user']['username'])){
        header('location: accedi.php');
    }
    if(isset($_GET['idNecrologio'])){
        $idNecrologio = $_GET['idNecrologio'];
        $sql->query("DELETE FROM necrologi WHERE idNecrologio='$idNecrologio'");
        if($sql->error){
            die($sql->error);
        }else{
            header('location: necrologiadmin.php');
        }
    }
