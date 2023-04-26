<?php

    session_start();
    include '../PHP/dbconnect.php';

    $month = $_POST['month'];
    $year = $_POST['year'];
    $filteredEntries = array();

    if ($month === 'All')
    {
            
        $sql = "SELECT * FROM blogEntries WHERE `Year` = '$year' ORDER BY `ID` ASC";
        
        
    }
    else
    {

        $sql = "SELECT * FROM blogEntries WHERE `Month` = '$month' AND `Year` = '$year' ORDER BY `ID` ASC";

    }


    $result = $conn->query($sql);

    while($row=$result->fetch_assoc()){
        $filteredEntries[] = $row;
    }

    if(isset($_SESSION['filtered'])){

        unset($_SESSION['filtered']);

    }

    if (!empty($filteredEntries))
    {

        $_SESSION['month'] = $month;
        $_SESSION['year'] = $year;
        $_SESSION['filteredEntries'] = $filteredEntries;
        $_SESSION['filtered'] = true;

        header('Location: ../PHP/viewBlog.php');
        exit();

    }
    else
    {
        $_SESSION['empty'] = true;
        header('Location: ../PHP/viewBlog.php');
        exit();
    }


    $conn->close();
?>