<?php
    $sql = new mysqli('localhost', 'necrologi', 'necrologi', 'necrologi', 3306);
    @session_start();
    print_r($_SESSION);