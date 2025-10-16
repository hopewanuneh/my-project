<?php require_once "includes/header.php"; ?>

    <form action="includes/function.php" method="post" class="addcorpse" enctype="multipart/form-data">
    <h2>Corpse Details</h2>
    <?php echo SuccessMessage(); echo ErrorMessage(); ?>
      <label for="deceased_name">Deceased</label><br>
      <input type="text" id="deceased_name" name="deceased_name"><br>
      <label for="gender">Gender:</label>
      <input type ="text" id="gender" name="gender"><br>
      <label for="age">Age:</label>
      <input type="number" id="age" name="age">
      <label for="date_of_death">Date of Death:</label><br>
      <input type="date" id="date_of_death" name="date_of_death"><br>
      <label for="cause_of_death">Cause of Death:</label><br>
      <input type="text" id="cause_of_death" name="cause_of_death"><br>
      <label for="procedures">Procedures:</label><br>
      <textarea id="procedures" name="procedures"></textarea><br>
      <button type="submit" name="addcorpse">Save</button>

    </form>
<?php require_once "includes/footer.php"; ?>