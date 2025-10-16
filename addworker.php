<?php require_once "includes/header.php"; ?>

<form action="includes/function.php" method="post" class="addcorpse" enctype="multipart/form-data">
    <h2>Add New Worker</h2>
    <?php echo SuccessMessage(); echo ErrorMessage(); ?>
    <input type="text" name="fullnames" placeholder="Full Names" required>
    <input type="text" name="username" placeholder="Username" required>
    <input type="text" name="password" placeholder="Password" required>
    <input type="text" name="cpassword" placeholder="Confirm Password" required>
    <button type="submit" name="addworker">Create</button>

</form>
<?php require_once "includes/footer.php"; ?>