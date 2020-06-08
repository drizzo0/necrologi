<?php
    include 'dbconnect.php';
    $necrologi = $sql->query("SELECT * FROM necrologi");
    while ($necrologio = $necrologi->fetch_assoc()){
        print_r($necrologio);
    }