<?php
    session_start();
    
    if (isset($_SESSION['returnURL'])) {

        $url = $_SESSION['returnURL'];
        header('Location: ' . $url);

    } 
    else 
    
    {
        header('Location: homepage.php');
    }

    session_destroy();

?>