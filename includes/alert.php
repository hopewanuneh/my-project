<?php 
require_once "database.php";
    function ErrorMessage(){
        if(isset($_SESSION['ErrorMessage'])){
            ?>
            <p style="color: red;"><?php echo $_SESSION['ErrorMessage']; ?></p>
            <?php
        }
        unset($_SESSION['ErrorMessage']);
    }
?>
<?php
    function SuccessMessage(){
        if(isset($_SESSION['SuccessMessage'])){
           ?>
            <p style="color: green;"><?php echo $_SESSION['SuccessMessage']; ?></p>
            <?php
        }
        unset($_SESSION['SuccessMessage']);
    }