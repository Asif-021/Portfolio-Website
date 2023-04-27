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
    <link rel="stylesheet" href="../CSS/blog.css" >
    <link rel="stylesheet" href="../CSS/CSSMobile/mobileblog.css" media="screen and (max-width: 768px)">
    <script src="../JS/filter.js" defer></script>
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
            <aside class="filter-container">

                <form id="filter-form" method="post" action="../PHP/filter.php">
                    <select name="month" id="month">
                        <option disabled selected value="">Select Month:</option>
                        <option value="All">All Months</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>

                    <select name="year" id="year">
                        <option disabled selected value="">Select Year:</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>

                    <button type="submit">Go</button>
                </form>
                <form id="reset-form" method="post" action="reset.php">
                    <button id="reset-button" type="submit">Remove Filters</button>
                </form>

            </aside>
            <?php
                if (isset($_SESSION['filtered'])){

                    $filteredEntries = $_SESSION['filteredEntries'];

                    if($_SESSION['month']==='All'){
                        echo '<h1> Showing all blog posts from '. $_SESSION['year'] .' </h1>';
                    }
                    else
                    {
                        echo '<h1> Showing all blog posts from ' . $_SESSION['month'] . ' ' . $_SESSION['year'] .' </h1>';
                    }
                    
                    
                    foreach($filteredEntries as $filteredOutput){

                        echo '<div class="blogEntryContainer" >';
                        echo '<h2 class="title">' . $filteredOutput['Title'] . '</h2>';
                        echo '<p class="content">' . $filteredOutput['Content'] . '</p>';
                        echo '<aside class="dateimg">';
                        echo '<p class="date">' . $filteredOutput['Date'] . '</p>';

                        echo '<a href="../PHP/comments.php?post_id=' . $filteredOutput['ID'] . '"> <img src="../Images/comment.png"> </a>';

                        echo '</aside>';
                        echo '</div>';

                    }
                    
                }
                elseif (isset($_SESSION['empty'])){

                    echo '<div class="blogEntryContainer" >';
                    echo '<h2 class="title"> There are no posts for the specified month and year.</h2>';
                    echo '</div>';

                }
            
                else{

                    foreach($entries as $output){

                        echo '<div class="blogEntryContainer" >';
                        echo '<h2 class="title">' . $output['Title'] . '</h2>';
                        echo '<p class="content">' . $output['Content'] . '</p>';
                        echo '<aside class="dateimg">';
                        echo '<p class="date">' . $output['Date'] . '</p>';

                        echo '<a href="../PHP/comments.php?post_id=' . $output['ID'] . '"> <img src="../Images/comment.png"> </a>';

                        echo '</aside>';
                        echo '</div>';

                    }
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