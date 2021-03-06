<?php
    include 'dbconnect.php';
    if(!isset($_SESSION['user']) && !isset($_SESSION['user']['username'])){
        header('location: accedi.php');
    }
    if($_SERVER['REQUEST_METHOD']=="GET"){
        ?>
            <form method="post" action="#inserisci" enctype="multipart/form-data">
                <input type="text" id="nome" name="nome" placeholder="Nome"><br>
                <input type="text" id="cognome" name="cognome" placeholder="Cognome"><br>
                <input type="number" id="eta" name="eta" placeholder="Et&agrave;"><br>
                <input type="text" id="luogo_residenza" name="luogo_residenza" placeholder="Citt&agrave; di residenza"><br>
                <input type="text" id="citta_celebrazione" name="citta_celebrazione" placeholder="Citt&agrave; celebrazione"><br>
                <input type="text" id="luogo_celebrazione" name="luogo_celebrazione" placeholder="Chiesa celebrazione"><br>
                <input type="date" id="data_celebrazione" name="data_celebrazione"> <input type="number" id="ora" name="ora" placeholder="00" max="23" min="0">:<input type="number" id="minuti" name="minuti" placeholder="00" max="59" min="0"><br>
                <input type="text" id="luogo_riposo" name="luogo_riposo" placeholder="Luogo di riposo"><br>
                <textarea name="necrologio" id="necrologio" placeholder="Necrologio"></textarea><br>
                <input type="file" name="foto" id="foto"><br>
                <input type="submit" id="inserisci" name="inserisci" value="Inserisci!">
            </form>
        <?php
    }elseif ($_SERVER['REQUEST_METHOD']=="POST"){
        $foto = base64_encode(file_get_contents($_FILES['foto']['tmp_name']));
        $tipoMimeFoto = mime_content_type($_FILES['foto']['tmp_name']);
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $luogoResidenza = $_POST['luogo_residenza'];
        $cittaCelebrazione = $_POST['citta_celebrazione'];
        $luogoCelebrazione = $_POST['luogo_celebrazione'];
        $dataCelebrazione = $_POST['data_celebrazione'];
        $luogoRiposo = $_POST['luogo_riposo'];
        $eta = $_POST['eta'];
        $necrologio = $_POST['necrologio'];
        $ora = $_POST['ora'];
        $minuti = $_POST['minuti'];
        $dataInserimento = date('Y-m-d');
        $dataCelebrazioneCompleta = $dataCelebrazione.' '.$ora.':'.$minuti.':00';
        $idUtente = $_SESSION['user']['id'];

/*        echo "Nome: $nome<br>";
        echo "Cognome: $cognome<br>";
        echo "Et&agrave: $eta<br>";
        echo "Citt&agrave di residenza: $luogoResidenza<br>";
        echo "Citt&agrave celebrazione: $cittaCelebrazione<br>";
        echo "Chiesa celebrazione: $luogoCelebrazione<br>";
        echo "Data celebrazione: $dataCelebrazione $ora:$minuti<br>";
        echo "Luogo di riposo: $luogoRiposo<br>";
        echo "Necrologio: $necrologio<br>";
        echo "Tipo Mime Foto: $tipoMimeFoto<br>";
        echo "Foto: <br><img src='data: ".$tipoMimeFoto.";base64,".$foto."'/><br>";
*/
        $sql->query("INSERT INTO necrologi (nome, cognome, inseritoDa, dataInserimento, foto, eta, luogoResidenza, necrologio, luogoCelebrazione, dataCelebrazione, cittaCelebrazione, luogoRiposo) VALUES ('$nome', '$cognome', '$idUtente', '$dataInserimento', '$foto', '$eta', '$luogoResidenza', '$necrologio', '$luogoCelebrazione', '$dataCelebrazioneCompleta', '$cittaCelebrazione', '$luogoRiposo')");

        header("location: necrologi.php");

    }