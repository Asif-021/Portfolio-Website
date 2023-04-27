<?php 

    session_start(); 
    include '../PHP/dbconnect.php';

    $_SESSION['returnURL'] = $_SERVER['REQUEST_URI'];

    $blogID = $_GET['post_id'];
    $_SESSION['blogID'] = $blogID;

    $sql = "SELECT * FROM blogEntries WHERE ID = $blogID";

    $result = $conn->query($sql);
    $post = $result->fetch_assoc();

    $sql = "SELECT * FROM comments WHERE post_id = $blogID ORDER BY comment_id DESC";

    $result = $conn->query($sql);
    $comments = array();

    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Quicksand:wght@400;600&family=Signika+Negative&family=Sono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/reset.css">
    <link rel="stylesheet" href="../CSS/comments.css?v=2">
    <script src="../JS/comment.js" defer></script>
    <script src="../JS/delete.js" defer></script>
    <?php echo '<title>Comment Section for ' . $post['Title'] . '</title>'; ?>
</head>
<body>
    <section>
        <header>
            <nav>
                <a href="../PHP/homepage.php">Asif Ahmed</a>
                <a href="../PHP/about.php">About Me</a>
                <a href="../PHP/exp.php">Experience & Projects</a>
                <a id="bloglink" href="../PHP/viewBlog.php">Blog</a>
            </nav>
            <?php 
                if(isset($_SESSION['loggedIn'])){
                    echo '<a id="logout" href="../PHP/logout.php">Logout</a>';
                }
                else{
                    echo '<a id="login" href="../HTML/login.html">Login...</a>';
                }
            ?>
        </header>
        <main>
            <div class="blogPost">
                <?php

                    echo '<h2 class="title">'. $post['Title']. '</h2>';
                    echo '<p class="content">' . $post['Content'] . '</p>';
                    echo '<aside>';
                    echo '  <p class="date">' . $post['Date'] . '</p>';
                    if (isset($_SESSION['admin'])){
                        echo '  <form id="deletePost" method="post" action="../PHP/deletePost.php">';
                        echo '      <input type="hidden" name="post_id" value="' . $post['ID'] . '">';
                        echo '      <button type="submit"><img src="../Images/cross.png"></button>';
                        echo '  </form>';
                    }
                    echo '</aside>'

                ?>
            </div>

            <?php

                if (isset($_SESSION['loggedIn']))
                {
                    echo '<form id="comment-form" method="post" action="../PHP/addComment.php">';
                    echo '   <input type="text" id="comment" name="comment" autocomplete="off" placeholder="Enter your comment...">';
                    echo '   <input type="submit" id="postButton" value="Add Comment">';
                    echo '</form>';
                }

            ?>

            <div class="commentSection">
                <?php

                    foreach($comments as $comment)
                    {
                        echo '<div class="eachComment">';
                        echo '  <div class="information">';
                        echo '      <p class="user">' . $comment['username'] . '</p>';
                        echo '      <p class="datetime">' . $comment['datetime'] . '</p>';
                        echo '  </div>';
                        echo '  <p class="comment">' . $comment['comment'] . '</p>';
                        if (isset($_SESSION['admin'])){
                            echo '  <form id="deleteComment" method="post" action="../PHP/deleteComment.php">';
                            echo '      <input type="hidden" name="comment_id" value="' . $comment['comment_id'] . '">';
                            echo '      <button type="submit"><img id="deleteCommentImg" src="../Images/cross.png"></button>';
                            echo '  </form>';
                        }
                        echo '</div>';
                    }

                ?>
            </div>




        </main>
        <footer>
            <p>Asif Ahmed &copy; 2023 </p>
            <a href="../HTML/sources.html">Sources</a>
        </footer>
    </section>
    
</body>
</html>