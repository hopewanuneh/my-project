<?php require_once "includes/header.php"; 
if(!(isset($_SESSION['adminid']))){
    header('Location: index.php');
} 
?>
<div class="table-wrapper">
<?php echo SuccessMessage(); echo ErrorMessage(); ?>
 <a  href="addworker.php">Add New Worker </a>
    <table class="fl-table">
        <thead>
        <tr>
            <th>#</th>
            <th>UserName</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            <?php
            global $conn;
            $stmt = $conn->prepare("SELECT * FROM users");
            $stmt->execute();
            $result = $stmt->get_result();
            $num = 1;
            while($user = $result->fetch_assoc()) {   
            ?>
        <tr>
            <td><?= $num; ?></td>
            <td><?= htmlentities($user['username']); ?></td>
            <td><?= htmlentities($user['full_names']); ?></td>
            <td>
                <a href="updatecorpse.php?workerid=<?php echo htmlentities($user['userid'])?>">Update Worker</a><br>
                <a href="deletecorpse.php?workerid=<?php echo htmlentities($user['userid'])?>">Delete Worker</a>
            </td>
            
        </tr>
        <?php $num++; } ?>
        
        <tbody>
    </table>
</div>
<?php require_once "includes/footer.php"; ?>