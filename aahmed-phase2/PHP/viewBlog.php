<?php 

    session_start();

    include '../PHP/dbconnect.php';

    $sql = "SELECT * FROM blogEntries";
    $result = $conn->query($sql);

    $entries = array();


    while ($row = $result->fetch_assoc()) {
        $entries[] = $row;
    }

    // Sort the data array based on the ID column in descending order

    function sortingAlgorithm($a, $b){
        if ($a['ID']<$b['ID'])
        {
            return 1;
        }
        else if ($a['ID']>$b['ID'])
        {
            return -1;
        }
    }

    usort($entries, 'sortingAlgorithm');

    $_SESSION['returnURL'] = $_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Quicksand:wght@400;600&family=Signika+Negative&family=Sono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/reset.css">
    <link rel="stylesheet" href="../CSS/blog.css?v=2" >
    <title>Blog</title>
</head>
<body>
    <section>
        <div class="headercontainer">
            <header>
                <nav>
                    <a href="../PHP/homepage.php">Asif Ahmed</a>
                    <a href="../PHP/about.php">About Me</a>
                    <a href="../PHP/exp.php">Experience & Projects</a>
                    <a id="bloglink" href="../PHP/viewBlog.php">Blog</a>
                </nav>
            </header>
            <div class="divPost">
                <?php 
                    if(isset($_SESSION['loggedIn']))
                    {
                        if(isset($_SESSION['admin']))
                        {
                            echo '<a id="addPost" href="../HTML/addPost.html">Add Post...</a>';
                        }

                        echo '<a id="logout" href="../PHP/logout.php">Logout</a>';
                    }
                    else{
                        echo '<a id="login" href="../HTML/login.html">Login...</a>';
                    }
                ?>
            </div>
        </div>
        <main>
            <?php

                foreach($entries as $output){

                    echo '<div class="blogEntryContainer" >';
                    echo '<h2 class="title">' . $output['Title'] . '</h2>';
                    echo '<p class="content">' . $output['Content'] . '</p>';
                    echo '<aside>';
                    echo '<p class="date">' . $output['Date'] . '</p>';

                    echo '<a href="../PHP/comments.php?post_id=' . $output['ID'] . '"> <img src="../Images/comment.png"> </a>';

                    echo '</aside>';
                    echo '</div>';

                }

                $conn->close();
            ?>
        </main>
        <footer>
            <p>Asif Ahmed &copy; 2023 </p>
            <a href="../HTML/sources.html">Sources</a>
        </footer>
    </section>
</body>
</html>