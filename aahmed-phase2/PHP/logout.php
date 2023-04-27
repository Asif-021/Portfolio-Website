<?php
    session_start();
    
    if (isset($_SESSION['returnURL'])) {

        $url = $_SESSION['returnURL'];
        session_destroy();

        header('Location: ' . $url);

    } 
    else 
    {
        session_destroy();
        header('Location: homepage.php');
    }



?>