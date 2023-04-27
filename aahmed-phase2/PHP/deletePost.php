<?php

    include '../PHP/dbconnect.php';
    session_start();

    $post_id = $_POST['post_id'];

    $sql = "DELETE FROM blogEntries WHERE ID = $post_id";

    $sql2 = "DELETE FROM comments WHERE post_id = $post_id";


    if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {

        $conn->close();
        header('Location: ../PHP/viewBlog.php');

    } else {
        $conn->close();
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    

?>