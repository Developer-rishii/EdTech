<!DOCTYPE html>
<html>
<head>
    <title>BITW Physics</title>
    <link rel="stylesheet" href="barter.css">
    <link rel="stylesheet" href="styless.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="./image/phy_logo.jpeg">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            margin-top: 30px;
            color: #333;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: auto;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        p {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #666;
        }
    </style>
</head>
<body>
    <section class="header">
        <a href="home.html" class="logo"><img src="./image/phy_logo.jpeg" alt=""></a>
        <div class="nav-links">
            <ul>
                <li><a href="admin.php">Dashboard</a></li>
                <li><a href="admin-exp.html">Experiments</a></li>
                <li><a href="admin-barter.php">Barter</a></li>
                <li><a class="active" href="sort.php">Users</a></li>
                <li class="login-container">
                    <a href="index.php">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <span class="logout-text">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>
<?php
    include 'config.php'; // Contains your $conn connection

    // Define allowed columns and orders to avoid SQL injection
    $allowed_columns = ['posted_by2', 'posted_by'];
    $allowed_orders = ['asc', 'desc'];

    // Validate inputs
    $sort_by = isset($_POST['sort_by']) && in_array($_POST['sort_by'], $allowed_columns) ? $_POST['sort_by'] : 'posted_by2';
    $order = isset($_POST['order']) && in_array($_POST['order'], $allowed_orders) ? $_POST['order'] : 'asc';

    // Prepare SQL query
    $sql = "SELECT * FROM barter_posts ORDER BY $sort_by $order";
    $result = $conn->query($sql);

    // Display results
    if ($result && $result->num_rows > 0) {
        echo "<h2>Sorted Barter Posts</h2>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr>
        <th>Sr. No</th>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        </tr>";

        $sr = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $sr++ . "</td>
                    <td>" . htmlspecialchars($row['id']) . "</td>
                    <td>" . htmlspecialchars($row['posted_by2']) . "</td>
                    <td>" . htmlspecialchars($row['posted_by']) . "</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No records found.</p>";
    }

    // Close connection
    $conn->close();
?>

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
