<?php

    session_start();
    include '../PHP/dbconnect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $login = false;

    $sql = "SELECT * FROM loginDetails";
    $result = $conn->query($sql);

    $details = array();

    while ($row = $result->fetch_assoc()) {
        $details[] = $row;
    }

    $conn->close();
    foreach($details as $user) {
        if($user['Email'] == $email && $user['Password'] == $password) {
            if($user['Permissions'] == 'admin'){
                $_SESSION['admin'] = true;
                $_SESSION['username'] = $user['Username'];
                $login= true;
                break;
            }
            else
            {   
                $_SESSION['username'] = $user['Username'];
                $login = true;
                break;
            }
        }
    }


    if($login){
        
        $_SESSION['loggedIn'] = true;

        if (isset($_SESSION['returnURL'])) {

            $url = $_SESSION['returnURL'];
            header('Location: ' . $url);

        } 
        else 
        
        {
            header('Location: homepage.php');
        }
    }
    elseif (isset($_SESSION['returnURL'])) {

        $url = $_SESSION['returnURL'];
        header('Location: ' . $url);
            
    } 
    else {
        header('Location: homepage.php');
    }
    


?>