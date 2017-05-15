<?php
    require '../config/db_config.php';
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
        //$sql = "SELECT id FROM movie_detail";
        $result = $con->query($sql);
        


    }
    else header("Location: ../");

?>