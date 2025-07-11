<?php
session_start();
include 'config.php';

if (!isset($_SESSION["user_id"])) {
    die("User not logged in.");
}

$user_id = $_SESSION["user_id"];


$email = $_SESSION['email'];
$query = "SELECT * FROM barter_posts WHERE posted_by = '$email' ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>BITW Physics</title>
    <link rel="stylesheet" href="barter.css">
    <link rel="stylesheet" href="styless.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="./image/phy_logo.jpeg">
</head>
<body>

<section class="header">
    <a href="home.html" class="logo"><img src="./image/phy_logo.jpeg" alt=""></a>
        <div class="nav-links">
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="exp.html">Experiments</a></li>
                <li><a class="active" href="barter.php">Barter</a></li>
                <li><a href="profile.html">About</a></li>
                <li class="login-container">
                    <a href="index.php">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <span class="logout-text">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
</section>

<div style="height: 75vh;">
    <div class="post-links" style="display: flex; align-items: center; justify-content:space-between">
        <h2 class="h1">My Barter Posts</h2>
        <div>
            <a href="postform.php" class="btnn" style="margin: 20 0 0 20;">New Post</a>
            <a href="barter.php" class="btnn" style="margin: 20px;">Barter</a>
        </div>
    </div>

    <div id="card-container">
    <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="card">
                <span class="badge"><?= htmlspecialchars($row['type']) ?></span>
                <span class="badge"><?= htmlspecialchars($row['category']) ?></span>
                <h3 class="h3"><?= htmlspecialchars($row['title']) ?></h3>
                <p><?= htmlspecialchars($row['description']) ?></p>
                <p class="p2"><small>Posted on: <?= date("d M Y", strtotime($row['created_at'])) ?></small></p>
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this post?');" class="btnn" style="background-color: crimson; color: white; padding: 6px 12px; margin:0; margin-top: 10px; display: inline-block;">Delete</a>
                <a href="edit_post.php?id=<?= $row['id'] ?>" class="btnn" style="background-color: #0a75ad; color: white; padding: 6px 12px; margin: 0; margin-left: 10px; display: inline-block;">Edit</a>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p style="margin-left: 20px;">You haven't posted anything yet.</p>
    <?php endif; ?>
    </div>
</div>


    <div class="media-links">
        <a href="https://www.linkedin.com/in/rushikesh-sawarkar-79525630a/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
        <a href="https://www.instagram.com/rishi_62727/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
        <a href="https://github.com/Developer-rishii/" target="_blank"><i class="fa-brands fa-github"></i></a>
        <a href="https://www.youtube.com/@helperyt3156" target="_blank"><i class="fa-brands fa-youtube"></i></a>
    </div> 

    <section class="footer">
        <div class="info">
            <h1>Contact Info</h1>
            <div class="location">
                <i class="fa-solid fa-location-dot"></i>
                <a href="https://www.google.com/search?q=physics+lab+bajaj+institute+of+technology+wardha&sca_esv=4d69d7027f1defd9&sxsrf=
                ADLYWIIMERmlMHcNdI8etoccrjA78VLbQw%3A1724000097363&ei=YSfCZsvgFc6q4-EPp_-dkQE&ved=0ahUKEwiLlZXrgP-HAxVO1TgGHad_JxIQ4dUDCA8&uact=
                5&oq=physics+lab+bajaj+institute+of+technology+wardha&gs_lp=Egxnd3Mtd2l6LXNlcnAiMHBoeXNpY3MgbGFiIGJhamFqIGluc
                3RpdHV0ZSBvZiB0ZWNobm9sb2d5IHdhcmRoYTIIECEYoAEYwwQyCBAhGKABGMMESPNmUJsKWMBJcAF4AZABAJgBhgKgAbEVqgEGMC4xLjExuAEDyAEA-
                AEBmAILoALvEcICChAAGLADGNYEGEfCAg0QABiABBiwAxhDGIoFwgIcEC4YgAQYsAMYQxjHARjIAxiKBRiOBRivAdgBAcICExAuGIAEGLADGEMYyAMYi
                gXYAQHCAhAQLhiABBjHARgNGI4FGK8BwgIHEAAYgAQYDcICHxAuGIAEGMcBGA0YjgUYrwEYlwUY3AQY3gQY4ATYAQLCA
                ggQABiABBiiBMICChAhGKABGMMEGAqYAwCIBgGQBgy6BgQIARgIugYGCAIQARgUkgcFMS4xLjmgB-NM&sclient=
                gws-wiz-serp">First year department, ground floor, BIT, wardha, 442001</a>
            </div>
            <div class="email">
                <i class="fa-solid fa-envelope"></i>
                <a href="mailto:vijay.deshmukh@bitwardha.ac.in">vijay.deshmukh@bitwardha.ac.in</a>
            </div>
        </div>
        <div class="network">
            <p>Technology</p>
            <br>
            <a href="">Developer</a>
            <a href="">Deploy</a>
            <a href="">Youtube</a>
            <a href="">Rushikesh Sawarkar</a>
        </div>
        <div class="network">
            <p>Resources</p>
            <br>
            <a href=""> Usage</a>
            <a href="">Docs</a>
            <a href="">Support</a>
            <a href="">Software</a>
        </div>
        <div class="network">
            <p>Network</p>
            <br>
            <a href="">Helper yt</a>
            <a href="">Code Munch </a>
            <a href="">Avsar</a>
            <a href="">Engg Physics</a>
        </div>
        <div class="network">
            <p>Company</p>
            <br>
            <a href="">About us</a>
            <a href="">Blog</a>
            <a href="">Careers</a>
            <a href="">Engg Physics</a>
        </div>
    </section>

    <div class="copyright">
        <p>Enjoying Physics Lab © 2024</p>
    </div>

</body>
</html>
