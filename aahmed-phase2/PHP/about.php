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
    <link rel="stylesheet" href="../CSS/about.css?v=2">
    <title>About Me</title>
</head>
<body>
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
        <section id="about">
            <div id="info">
                <h2>About Me</h2>
                <p>Hi there, I'm Asif Ahmed and I'm thrilled you've landed on my About Me page! 
                    I am an aspiring software engineer with a passion for technology, rooted from my original interest in PCs and eventually building my own.
                    Studying a Bachelor's degree in Computer Science is allowing me to gain the 
                    skills and experience required to take on the toughest technical challenges. 
                    I'm excited to take on new opportunities and challenges, so don't hesitate to reach out and connect with me!</p>
            </div>
            <aside>
                <article>
                    <figure>
                    <img src="../Images/me.jpg" alt="Picture of me">
                    <figcaption>A picture someone took of me in 2018</figcaption>
                    </figure>
                </article>
            </aside>
        </section>
        <section id="edu">
            <h2>Education</h2>
            <div class="dc">
                <p class="date">2022 - Present</p>
                <p class="course">BSc Computer Science</p>
            </div>
        </section>
        <section id="skills">
            <h2>Skills</h2>
            <div class="slist">
                <ul>
                    <li id="first">Programming languages: Java, Python, JavaScript</li>
                    <li>Web development: HTML, CSS, PHP</li>
                </ul>
            </div>  
        </section>
    </main>
    <footer>
        <p>Asif Ahmed © 2023</p>
        <a href="../HTML/sources.html">Sources</a>
    </footer>
</body>
</html>