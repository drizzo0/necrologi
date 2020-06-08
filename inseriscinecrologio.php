<?php
    include 'dbconnect.php';
    if($_SERVER['REQUEST_METHOD']=="GET"){
        ?>
            <form method="post" action="#inserisci">
                <input type="text" id="nome" value="nome" placeholder="Nome"><br>
                <input type="text" id="cognome" value="cognome" placeholder="Cognome"><br>
                <input type="text" id="eta" value="eta" placeholder="Et&agrave;"><br>
                <input type="text" id="luogo_residenza" value="luogo_residenza" placeholder="Citt&agrave; di residenza"><br>
                <input type="text" id="luogo_celebrazione" value="luogo_celebrazione" placeholder="Chiesa celebrazione"><br>
                <input type="date" id="data_celebrazione" name="data_celebrazione"><br>
                <input type="text" id="luogo_riposo" value="luogo_riposo" placeholder="Luogo di riposo"><br>
                <textarea name="necrologio" id="necrologio" placeholder="Necrologio"></textarea><br>
                <input type="file"><br>
                <input type="submit" id="inserisci" name="inserisci" value="Inserisci!">
            </form>
        <?php
    }elseif ($_SERVER['REQUEST_METHOD']=="POST"){
        print_r($_POST);
        echo "<br>";
        print_r($_FILES);
    }