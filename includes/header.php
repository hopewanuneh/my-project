<?php 
require_once "includes/function.php";
if(!(isset($_SESSION['adminid']) || isset($_SESSION['workerid']))){
    header('Location: index.php');
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mortuary Management System</title>
    <link rel="stylesheet" href="assets/admin_dashboard.css">
</head>
<body>
    <header class="header">
        <a href="dashboard.php" class="logo">Mortuary System</a>
        <nav class="nav-items">
            <a href="allcorpse.php">Deceased Records</a>
            <a href="addcorpse.php">Add New Deceased</a>
              <a href="includes/logout.php">Logout</a>
        </nav>
    </header>