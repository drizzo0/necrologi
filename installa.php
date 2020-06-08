<?php
    include 'dbconnect.php';
    if(isset($querys)){ unset($querys); }
    $versioneDaInstallare = 2;
    if($sql->query("SELECT * FROM impostazioni WHERE nomeImpostazione='databaseInstallato'")->num_rows == 0) {

        $querys[] = "CREATE TABLE utenti (`id` int PRIMARY KEY AUTO_INCREMENT, `username` varchar(255), `email` varchar(255), `nome` varchar(255), `cognome` varchar(255), `password` varchar(255), `dataCreazione` datetime, `creatoDa` int)";
        $querys[] = "CREATE TABLE necrologi (`idNecrologio` int PRIMARY KEY AUTO_INCREMENT, `nome` varchar(255), `cognome` varchar(255), `inseritoDa` int, `dataInserimento` date, `foto` longtext, `eta` int, `luogoResidenza` varchar(255), `necrologio` longtext, `luogoCelebrazione` varchar(255), `dataCelebrazione` datetime, `cittaCelebrazione` varchar(255), `luogoRiposo` varchar(255))";
        $querys[] = "CREATE TABLE pensieriNecrologi (`idNecrologio` int PRIMARY KEY AUTO_INCREMENT, `nome` varchar(255), `cognome` varchar(255), `dataInserimento` date, `oggettoPensiero` longtext, `pensiero` longtext, `approvato` tinyint, `approvatoDa` int)";
        $querys[] = "CREATE TABLE impostazioni (`idImpostazione` int PRIMARY KEY AUTO_INCREMENT, `nomeImpostazione` varchar(255), `valoreImpostazione` longtext)";

        $querys[] = "INSERT INTO utenti (username, email, nome, cognome, password, dataCreazione, creatoDa) VALUES ('daniele', 'daniele@danrizzo.dev', 'Daniele', 'Rizzo', 'c4ca4238a0b923820dcc509a6f75849b', '9999-12-31 23:59:59', '1')";

        $querys[] = "INSERT INTO impostazioni (nomeImpostazione, valoreImpostazione) VALUES ('databaseInstallato', 'Si')";
        $querys[] = "INSERT INTO impostazioni (nomeImpostazione, valoreImpostazione) VALUES ('versioneDatabase', 1)";

        foreach ($querys as $query){

            $sql->query($query);
            if($sql->error){
                die($sql->error);
            }

        }

        unset($querys);
        unset($query);

    }else{
        $versioneAttuale = $sql->query("SELECT * FROM impostazioni WHERE nomeImpostazione='versioneDatabase'")->fetch_array()['valoreImpostazione'];
        if($versioneAttuale == $versioneDaInstallare){
            die("Versione attuale DB: $versioneAttuale.<br>Database già installato e aggiornato.");
        }elseif ($versioneAttuale == 1){
            unset($querys);
            $querys[] = "ALTER TABLE necrologi ADD COLUMN tipoMimeFoto varchar(255)";
            $querys[] = "UPDATE impostazioni SET valoreImpostazione='$versioneDaInstallare' WHERE nomeImpostazione='versioneDatabase'";
            foreach ($querys as $query){
                $sql->query($query);
                if($sql->error){
                    die($sql->error);
                }
            }
        }
    }
