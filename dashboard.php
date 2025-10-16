<?php require_once "includes/header.php"; ?>
    <main>
        <div class="welcome-section">
            <h1>Welcome to the Mortuary Management System</h1> 
            <?php echo ErrorMessage(); echo SuccessMessage(); ?>
            <p>Efficiently manage and organize mortuary records with ease.</p>
            <a href="addcorpse.php" class="reg-button">Register New Body</a><br>
            <a href="allcorpse.php" class="view-button">View Body Records</a><br>
            <?php if(isset($_SESSION['adminid'])){ ?>
            <a href="manageworker.php" class="reg-button">Manage Workers</a> 
            <?php } ?>
        </div>

    </main>

  <?php require_once "includes/footer.php"; ?>