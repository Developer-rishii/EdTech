<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:"poppins",sans-serif;
    }
    body{
        background-color: #c9d6ff;
        background:linear-gradient(to right,#e2e2e2,#c9d6ff);
    }
    .container{
        background:#fff;
        width:450px;
        padding:1.5rem;
        margin:50px auto;
        border-radius:10px;
        box-shadow:0 20px 35px rgba(0,0,1,0.9);
    }
    form{
        margin:0 2rem;
    }
    .form-title{
        font-size:1.5rem;
        font-weight:bold;
        text-align:center;
        padding:1.3rem;
        margin-bottom:0.4rem;
    }
    input{
        color:inherit;
        width:100%;
        background-color:transparent;
        border:none;
        border-bottom:1px solid #757575;
        padding-left:1.5rem;
        font-size:15px;
    }
    .input-group{
        padding:1% 0;
        position:relative;

    }
    .input-group i{
        position:absolute;
        color:black;
    }
    input:focus{
        background-color: transparent;
        outline:transparent;
        border-bottom:2px solid hsl(327,90%,28%);
    }
    input::placeholder{
        color:transparent;
    }
    label{
        color:#757575;
        position:relative;
        left:1.2em;
        top:-1.3em;
        cursor:auto;
        transition:0.3s ease all;
    }
    input:focus~label,input:not(:placeholder-shown)~label{
        top:-3em;
        color:hsl(327,90%,28%);
        font-size:15px;
    }
    .recover{
        text-align:right;
        font-size:1rem;
        margin-bottom:1rem;

    }
    .recover a{
        text-decoration:none;
        color:rgb(125,125,235);
    }
    .recover a:hover{
        color:blue;
        text-decoration:underline;
    }
    .btn{
        font-size:1.1rem;
        padding:8px 0;
        border-radius:5px;
        outline:none;
        border:none;
        width:100%;
        background:rgb(125,125,235);
        color:white;
        cursor:pointer;
        transition:0.9s;
    }
    .btn:hover{
        background:#07001f;
    }
    .or{
        font-size:1.1rem;
        margin-top:0.5rem;
        text-align:center;
    }
    .icons{
        text-align:center;
    }
    .icons i{
        color:rgb(125,125,235);
        padding:0.8rem 1.5rem;
        border-radius:10px;
        font-size:1.5rem;
        cursor:pointer;
        border:2px solid #dfe9f5;
        margin:0 15px;
        transition:1s;
    }
    .icons i:hover{
        background:#07001f;
        font-size:1.6rem;
        border:2px solid rgb(125,125,235);
    }
    .links{
        display:flex;
        justify-content:space-around;
        padding:0 4rem;
        margin-top:0.9rem;
        font-weight:bold;
    }
    button{
        color:rgb(125,125,235);
        border:none;
        background-color:transparent;
        font-size:1rem;
        font-weight:bold;
    }
    button:hover{
        text-decoration:underline;
        color:blue;
    }
</style>

<div class="container" id="signIn">
    <h1 class="form-title">Reset Password</h1>
    <form method="post">
      <div class="input-group">
          <i class="fas fa-envelope"></i>
          <input type="email" name="email" id="email" placeholder="Email" required>
          <label for="email">Email</label>
      </div>
      <div class="input-group">
          <i class="fas fa-lock"></i>
          <input type="password" name="new_password" id="password" placeholder="Password" required>
          <label for="password">Password</label>
      </div>
     <input type="submit" class="btn" value="Submit">
    </form>
</div>

<?php
include 'connect.php';
$message = ""; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $new_password = $_POST['new_password']; 

    $sql = "UPDATE users SET password = '$new_password' WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<p style='color:green; text-align:center;'>Password reset successfully.</p>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 1000);
              </script>";
        exit();
    } else {
        $message = "<p style='color:red; text-align:center;'>Email not found or reset failed.</p>";
    }
}
?>

