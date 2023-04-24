<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Quicksand:wght@400;600&family=Signika+Negative&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/reset.css">
    <link rel="stylesheet" href="../CSS/exp.css?v=2">
    <title>Experience & Projects</title>
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
        <section class="exp">
            <h2 class="exp-title">Experience</h2>
            <div class="info">
                <div class="date-item">
                    <p class="date">2022 - Present</p>
                    <p class="item">IFF Research - Telephone Interviewer</p>
                </div>
                <p class = desc>Contacting interviewees, gathering feedback on various schemes or programmes requested by external bodies. 
                    Including graduates for university feedback, or welsh residents that received employment support under the European Social Fund. </p>
            </div>
        </section>
        <section class="proj">
            <h2 class="proj-title">Projects</h2>
            <div class="info">
                <div class="date-item">
                    <p class="date">2021</p>
                    <p class="item">Space Invaders Game</p>
                </div>
                <p class = desc>Created a Space Raiders type game in Python as an introduction to coding. </p>
            </div>
            <div class="info">
                <div class="date-item">
                    <p class="date">2022</p>
                    <p class="item">Exploration Game</p>
                </div>
                <p class = desc>Created an abandoned castle exploration game using Java as part of a university project, where the user can make many decisions, resulting in different outcomes.</p>
            </div>
        </section>
    </main>
    <footer>
        <p>Asif Ahmed &copy; 2023 </p>
        <a href="../HTML/sources.html">Sources</a>
    </footer>
</body>
</html>