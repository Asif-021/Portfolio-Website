<?php

session_start();

include '../PHP/dbconnect.php';

    $email = $_POST['newemail'];
    $password = $_POST['newpassword'];
    $username = $_POST['newusername'];

    $sql = "INSERT INTO loginDetails (Username, Email, `Password`)
    VALUES ('$username', '$email', '$password')";


    if ($conn->query($sql) === TRUE) {

        $conn->close();

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
     else {
        $conn->close();
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


?>