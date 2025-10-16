<?php require_once "includes/function.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Form</title>
    <link rel="stylesheet" href="assets/index_styling.css">
</head>
<body>
<header class="header"> </header>
<h4>Welcome to the Murtuary Management Platform. Log In To Manage Information</h4>

<div class="container">
    <!-- Display form with input fields for username and password -->
    <form action="includes/function.php" method="post">
    <?php
        echo ErrorMessage();
        echo SuccessMessage();
    ?>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
    </div>
</body>
</html>