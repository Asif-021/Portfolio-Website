<?php
    include '../PHP/dbconnect.php';

    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('jS F Y h:i A T');

    $sql = "INSERT INTO blogEntries (`Date`, Title, Content)
    VALUES ('$date', '$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../PHP/viewBlog.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
