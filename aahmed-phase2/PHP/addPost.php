<?php
include 'dbconnect.php';

$title = $_POST['title'];
$content = $_POST['content'];
$date = date('jS F Y h:i A T');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sql = "INSERT INTO blogEntries (`Date`, Title, Content)
    VALUES ('$date', '$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../HTML/blog.html');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
