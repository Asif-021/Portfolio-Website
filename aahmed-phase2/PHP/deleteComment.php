<?php

    include '../PHP/dbconnect.php';
    session_start();

    $comment_id = $_POST['comment_id'];

    $sql = "DELETE FROM comments WHERE comment_id = $comment_id";

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
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    

?>