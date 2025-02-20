<?php 

session_start(); 
$_SESSION['returnURL'] = $_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Quicksand:wght@400;600&family=Signika+Negative&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/reset.css">
    <link rel="stylesheet" href="../CSS/CSSMobile/mobilehomepage.css" media="screen and (max-width: 768px)">
    <link rel="stylesheet" href="../CSS/homepage.css">
    <title>Asif Ahmed's Portfolio</title>
</head>
<body>
    <header>
        <nav>
            <a href="../PHP/homepage.php">Asif Ahmed</a>
            <a href="../PHP/about.php">About Me</a>
            <a href="../PHP/exp.php">Experience & Projects</a>
            <a id="bloglink" href="../PHP/viewBlog.php">Blog</a>
        </nav>
    </header>
    <main>
        <article>
            <figure>
                <img id="initials" src="../Images/mountains.png" alt="Image to be found">
                <figcaption id="caption">Asif Ahmed's Portfolio</figcaption>
            </figure>
        </article> 
        <div id="login">
            <?php
                
                if(isset($_SESSION['loggedIn'])){
                    echo '<a href="../PHP/logout.php">Logout</a>';
                }
                else{
                    echo '<a href="../HTML/login.html">Login</a>';
                }
                
            ?>
        </div>
        <aside id="contacts">
            <nav>
                <a href="https://wa.me/447577862166"><img src="../Images/whatsapp.png" alt="whatsapp image"></a>
                <a href="mailto:asif.ahmed03@outlook.com?subject=Portfolio Inquiry"><img src="../Images/outlook.png" alt="Outlook img"></a>
                <a href="https://www.linkedin.com/in/asifahmedcs/"><img src="../Images/linkedIn.png" alt="lIn img"></a>
            </nav>
        </aside>
    </main>
    <footer>
        <p>Asif Ahmed &copy; 2023 </p>
        <a href="../HTML/sources.html">Sources</a>
    </footer>
</body>
</html>

