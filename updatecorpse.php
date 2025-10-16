<?php require_once "includes/header.php";?>
    <form action="includes/function.php" method="post" class="addcorpse" enctype="multipart/form-data">
    <h2>Update Corpse</h2>
    <?php echo SuccessMessage(); echo ErrorMessage(); 
    global $conn;
    if(isset($_GET["corpseid"])){
    $corpseid=sanitizeInput($_GET["corpseid"]);
    $stmt = $conn->prepare("SELECT * FROM corpses WHERE corpseid = ? ");   
    $stmt->bind_param("i", $corpseid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if($row>0 ){
    ?>
      <input type="hidden" name="corpseid" value="<?php echo htmlentities($row['corpseid']); ?>">
        <label for="deceased_name">Deceased Name</label><br>
        <input type="text" id="deceased_name" name="deceased_name" value="<?php echo htmlentities($row['deceased_name']); ?>"><br>
        <label for="gender">Gender:</label><br>
        <input type="text" id="gender" name="gender" value="<?php echo htmlentities($row['gender']); ?>"><br>
        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" value="<?php echo htmlentities($row['age']); ?>"><br>
        <label for="date_of_death">Date of Death:</label><br>
        <input type="date" id="date_of_death" name="date_of_death" value="<?php echo htmlentities($row['date_of_death']); ?>"><br>
        <label for="cause_of_death">Cause of Death:</label><br>
        <input type="text" id="cause_of_death" name="cause_of_death" value="<?php echo htmlentities($row['cause_of_death']); ?>"><br>
        <label for="procedures">Procedures:</label><br>
        <textarea id="procedures" name="procedures"><?php echo htmlentities($row['procedures']); ?></textarea><br>
      <button type="submit" name="updatecorpse">Save</button>

    </form>
<?php }else{
    header("Location: allcorpse.php");}
}
else{
    header("Location: allcorpse.php");
    exit;
} require_once "includes/footer.php";?>