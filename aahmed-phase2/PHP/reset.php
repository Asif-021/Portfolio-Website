<?php

    session_start();

    if (isset($_SESSION['filtered'])){

        unset($_SESSION['filtered']);
        
    }
    if (isset($_SESSION['empty'])){

        unset($_SESSION['empty']);
        
    }
    if (isset($_SESSION['month'])){

        unset($_SESSION['month']);
        
    }
    if (isset($_SESSION['year'])){

        unset($_SESSION['year']);
        
    }

    header('Location: ../PHP/viewBlog.php');


?>