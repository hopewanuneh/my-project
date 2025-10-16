<?php require_once "includes/header.php"; ?>
<div class="table-wrapper">
<?php echo SuccessMessage(); echo ErrorMessage(); ?>
    <table class="fl-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Deceased Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Date of Death</th>
            <th>Cause of Death</th>
            <th>Procedures</th>
            <th>Added by</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            <?php
            global $conn;
            $stmt = $conn->prepare("SELECT * FROM corpses");
            $stmt->execute();
            $result = $stmt->get_result();
            $num = 1;
            while($user = $result->fetch_assoc()) {   
               
            ?>
        <tr>
            <td><?= $num; ?></td>
            <td><?= htmlentities($user['deceased_name']); ?></td>
            <td><?= htmlentities($user['gender']); ?></td>
            <td><?= htmlentities($user['age']); ?></td>
            <td><?= htmlentities($user['date_of_death']); ?></td>
            <td><?= htmlentities($user['cause_of_death']); ?></td>
            <td><?= htmlentities($user['procedures']); ?></td>
            <td><?php
               echo getUsername($user['userid']);
            ?></td>
            <td>
                <a href="updatecorpse.php?corpseid=<?php echo htmlentities($user['corpseid'])?>">Update Corpse</a><br>
                <?php if(isset($_SESSION['adminid'])){ ?>
                <a href="includes/function.php?corpseid=<?php echo htmlentities($user['corpseid'])?>" onclick="return confirm('Do you want to delete this corpse? If you delete this corpse you will be unable to recover it.')">Delete Corpse</a>
                <?php } ?>
            </td>

        </tr>
        <?php $num++; } ?>
        
        <tbody>
    </table>
</div>
<?php require_once "includes/footer.php"; ?>