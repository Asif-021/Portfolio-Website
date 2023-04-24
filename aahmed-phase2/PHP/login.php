<?php
    include '../PHP/dbconnect.php';
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $login = false;

    $sql = "SELECT * FROM loginDetails";
    $result = $conn->query($sql);

    $details = array();

    while ($row = $result->fetch_assoc()) {
        $details[] = $row;
    }

    foreach($details as $user) {
        if($user['Email'] == $email && $user['Password'] == $password) {
            if($user['Permissions'] == 'admin'){
                $_SESSION['admin'] = true;
                $login= true;
                break;
            }
            else
            {   
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
    
    $conn->close();

?>