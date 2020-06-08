<?php
    include 'dbconnect.php';
    if($_SERVER['REQUEST_METHOD']=="GET"){
        ?>
            <form method="post" action="#inserisci" enctype="multipart/form-data">
                <input type="text" id="nome" name="nome" placeholder="Nome"><br>
                <input type="text" id="cognome" name="cognome" placeholder="Cognome"><br>
                <input type="text" id="eta" name="eta" placeholder="Et&agrave;"><br>
                <input type="text" id="luogo_residenza" name="luogo_residenza" placeholder="Citt&agrave; di residenza"><br>
                <input type="text" id="luogo_celebrazione" name="luogo_celebrazione" placeholder="Chiesa celebrazione"><br>
                <input type="date" id="data_celebrazione" name="data_celebrazione"><br>
                <input type="text" id="luogo_riposo" name="luogo_riposo" placeholder="Luogo di riposo"><br>
                <textarea name="necrologio" id="necrologio" placeholder="Necrologio"></textarea><br>
                <input type="file" name="foto" id="foto"><br>
                <input type="submit" id="inserisci" name="inserisci" value="Inserisci!">
            </form>
        <?php
    }elseif ($_SERVER['REQUEST_METHOD']=="POST"){
        print_r($_POST);
        echo "<br>";
        echo "foto in base64: ".base64_encode(file_get_contents($_FILES['tmp_name']));

    }