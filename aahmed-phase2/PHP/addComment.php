<?php
    
    session_start();
    include '../PHP/dbconnect.php';


    $comment = $_POST['comment'];
    $username = $_SESSION['username'];
    $blogID = $_SESSION['blogID'];
    $date = date('jS F Y h:i A T');

    $sql = "INSERT INTO comments (post_id, username, `datetime`, comment)
    VALUES ('$blogID', '$username', '$date', '$comment')";

    if ($conn->query($sql) === TRUE) {

        $conn->close();

        if (isset($_SESSION['returnURL'])) {

            $url = $_SESSION['returnURL'];
            header('Location: ' . $url);

        } 
        else 
        {
            header('Location: homepage.php');
        }
    } 
    else 
    {

        $conn->close();
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
?>