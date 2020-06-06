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

        print_r($_POST);

    }