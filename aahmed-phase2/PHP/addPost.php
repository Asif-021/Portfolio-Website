<?php
    include '../PHP/dbconnect.php';

    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('jS F Y h:i A T');
    $month = date('F');
    $year = date('Y');

    $sql = "INSERT INTO blogEntries (`Month`, `Year`, `Date`, Title, Content)
    VALUES ('$month', '$year' ,'$date', '$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header('Location: ../PHP/viewBlog.php');
    } else {
        $conn->close();
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


?>
