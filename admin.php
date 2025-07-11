<?php

include 'config.php';

// Dashboard Metrics
$totalBarterPosts = $conn->query("SELECT COUNT(*) FROM barter_posts")->fetch_row()[0];
$totalExperiments = $conn->query("SELECT COUNT(*) FROM experiments")->fetch_row()[0];
$totalUsers = $conn->query("SELECT COUNT(*) FROM users")->fetch_row()[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BITW Physics</title>
    <link rel="stylesheet" href="barter.css">
    <link rel="stylesheet" href="styless.css">
    <link rel="stylesheet" href="exp.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="./image/phy_logo.jpeg">
    <style>
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 20px;
            padding: 30px;
            width: 100%;
        }

        .cards {
            text-decoration: none;
        }

        .card {
            height: 17vh;
            background: #f9f9f9;
            padding: 20px;
            border-left: 5px solid #007bff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 15px;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }

        .card .icon {
            font-size: 35px;
            color: #007bff;
        }

        .card-content h3 {
            margin: 0;
            font-size: 16px;
            color: #333;
        }

        .card-content p {
            margin: 5px 0 0;
            font-size: 24px;
            font-weight: bold;
            color: #111;
        }
    </style>
</head>
<body>
<div class="page-wrapper">
    <section class="header">
        <a href="home.html" class="logo"><img src="./image/phy_logo.jpeg" alt=""></a>
        <div class="nav-links">
            <ul>
                <li><a class="active" href="admin.php">Dashboard</a></li>
                <li><a href="admin-exp.html">Experiments</a></li>
                <li><a href="admin-barter.php">Barter</a></li>
                <li><a href="sort.php">Users</a></li>
                <li class="login-container">
                    <a href="index.php">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <span class="logout-text">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <!-- Dashboard Summary Section -->
    <div class="dashboard-cards" style="height: 50vh;">

    <!-- Total Barter Posts -->
     <a href="admin-barter.php" class="cards">
        <div class="card">
            <i class="fa-solid fa-repeat icon"></i>
            <div class="card-content">
            <h3>Total Barter Posts</h3>
            <p><?php echo $totalBarterPosts ?? 0; ?></p>
            </div>
        </div>
     </a>

    <!-- Total Experiments Posted -->
     <a href="admin-exp.html" class="cards">
        <div class="card">
            <i class="fa-solid fa-book icon"></i>
            <div class="card-content">
            <h3>Total Experiments</h3>
            <p><?php echo $totalExperiments ?? 0; ?></p>
            </div>
        </div>
     </a>

    <!-- Total Users -->
    <a href="sort.php" class="cards">
        <div class="card">
            <i class="fa-solid fa-users icon"></i>
            <div class="card-content">
            <h3>Registered Users</h3>
            <p><?php echo $totalUsers ?? 0; ?></p>
            </div>
        </div>
    </a>

    <!-- Approved Posts -->
    <a href="#" class="cards">
        <div class="card">
            <i class="fa-solid fa-check-circle icon"></i>
            <div class="card-content">
            <h3>Approved Posts</h3>
            <p><?php echo $approvedPosts ?? 0; ?></p>
            </div>
        </div>
    </a>

    <!-- Pending Moderation -->
    <a href="#" class="cards">
        <div class="card">
            <i class="fa-solid fa-hourglass-half icon"></i>
            <div class="card-content">
            <h3>Pending Posts</h3>
            <p><?php echo $pendingPosts ?? 0; ?></p>
            </div>
        </div>
    </a>

    <!-- Total Tutorials -->
    <a href="#" class="cards">
        <div class="card">
            <i class="fa-solid fa-lightbulb icon"></i>
            <div class="card-content">
            <h3>Total Tutorials</h3>
            <p><?php echo $totalTutorials ?? 0; ?></p>
            </div>
        </div>
    </a>

    <!-- Active Users -->
    <a href="#" class="cards">
        <div class="card">
            <i class="fa-solid fa-chart-line icon"></i>
            <div class="card-content">
            <h3>Active Users (30d)</h3>
            <p><?php echo $activeUsers ?? 0; ?></p>
            </div>
        </div>
    </a>

    <a href="#" class="cards">
        <div class="card">
            <i class="fa-solid fa-flask icon"></i>
            <div class="card-content">
                <h3>New Experiments (30d)</h3>
                <p><?php echo $newExperiments ?? 0; ?></p>
            </div>
        </div>
    </a>

    <a href="#" class="cards">
        <div class="card">
            <i class="fa-solid fa-clipboard-question icon"></i>
            <div class="card-content">
                <h3>Total Quiz Attempts</h3>
                <p><?php echo $totalQuizAttempts ?? 0; ?></p>
            </div>
        </div>
    </a>

    <a href="#" class="cards">
        <div class="card">
            <i class="fa-solid fa-handshake icon"></i>
            <div class="card-content">
                <h3>Barter Exchanges</h3>
                <p><?php echo $barterExchanges ?? 0; ?></p>
            </div>
        </div>
    </a>


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
