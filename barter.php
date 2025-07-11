<?php
include 'config.php';

$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? '';
$type = $_GET['type'] ?? '';

$query = "SELECT * FROM barter_posts WHERE 1";

if (!empty($search)) {
  $safeSearch = mysqli_real_escape_string($conn, $search);
  $query .= " AND (title LIKE '%$safeSearch%' OR description LIKE '%$safeSearch%')";
}
if (!empty($category)) {
  $safeCategory = mysqli_real_escape_string($conn, $category);
  $query .= " AND category = '$safeCategory'";
}
if (!empty($type)) {
  $safeType = mysqli_real_escape_string($conn, $type);
  $query .= " AND type = '$safeType'";
}

$query .= " ORDER BY created_at DESC";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BITW Physics</title>
    <link rel="stylesheet" href="barter.css">
    <link rel="stylesheet" href="styless.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="./image/phy_logo.jpeg">

</head>
<body>
<div class="page-wrapper">
      <section class="header">
        <a href="home.html" class="logo"><img src="./image/phy_logo.jpeg" alt=""></a>

        <div class="nav-links">
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="exp.html">Experiments</a></li>
                <li><a class="active" href="barter.html">Barter</a></li>
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

  <h1 class="h1">Skill Barter Exchange</h1>
  <div class="barter_links">
      <a href="postform.php" class="btnn">Post a Barter</a>
      <a href="my_post.php" class="btnn">My Post</a>
  </div>

  <form id="searchForm" class="filter-form" onsubmit="return false;">
    <input type="text" name="search" placeholder="Search title or description" value="<?= $_GET['search'] ?? '' ?>">

    <select name="category">
      <option value="">All Categories</option>
      <option value="Skill" <?= (@$_GET['category'] == 'Skill') ? 'selected' : '' ?>>Skill</option>
      <option value="Notes" <?= (@$_GET['category'] == 'Notes') ? 'selected' : '' ?>>Notes</option>
      <option value="Book" <?= (@$_GET['category'] == 'Book') ? 'selected' : '' ?>>Book</option>
      <option value="Equipment" <?= (@$_GET['category'] == 'Equipment') ? 'selected' : '' ?>>Equipment</option>
    </select>

    <select name="type">
      <option value="">All Types</option>
      <option value="Offer" <?= (@$_GET['type'] == 'Offer') ? 'selected' : '' ?>>Offer</option>
      <option value="Request" <?= (@$_GET['type'] == 'Request') ? 'selected' : '' ?>>Request</option>
    </select>

    <button class="submit-btn" type="submit">Search</button>
  </form>

  <div id="card-container"></div>
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

<script>
    function fetchBarterPosts() {
      const form = document.getElementById('searchForm');
      const formData = new FormData(form);
      const query = new URLSearchParams(formData).toString();

      fetch('fetch_posts.php?' + query)
        .then(response => response.text())
        .then(html => {
          document.getElementById('card-container').innerHTML = html;
        });
    }

    // Submit on form submit
    document.getElementById('searchForm').addEventListener('submit', fetchBarterPosts);

    // Auto-submit when fields change
    document.querySelectorAll('#searchForm input, #searchForm select').forEach(input => {
      input.addEventListener('change', fetchBarterPosts);
    });

    // Fetch all posts on page load
    window.onload = fetchBarterPosts;
</script>

</body>
</html>
