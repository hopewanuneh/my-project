<?php

require_once "database.php";
require_once "alert.php";
function sanitizeInput($input){
    global $conn;
    $output = trim($input);
    $output = mysqli_escape_string($conn,$output);
    $output = htmlentities($output);
    return $output;
}

function loginUser(){
    global $conn;
    if (isset($_POST['login'])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
    
        // Validate credentials against the database
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    
        if ($user && password_verify($password, $user["password"])) {
            // Successful login
            if ($user["role"] == 1) {
                // Redirect admins to their dashboard
                $_SESSION['adminid'] = $user["userid"];
                $_SESSION['SuccessMessage'] = "Welcome admin";
                header("Location: ../dashboard.php");
                exit;
            } else {
                // Redirect workers to their dashboard
               $_SESSION['workerid'] =  $user["userid"];
               $_SESSION['SuccessMessage'] = "Welcome worker";
                header("Location: ../dashboard.php");
                exit;
            }
        } else {
            // Invalid login
            $_SESSION['ErrorMessage'] = "Invalid username or password. Please try again.";
            header("Location: ../index.php"); // Redirect back to login page
            exit;
        }
    }
}
loginUser();


function addCorpse(){
if(isset($_POST['addcorpse'])){
    global $conn;
    $deceased_name = $_POST['deceased_name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $date_of_death = $_POST['date_of_death'];
    $date =date('Y-m-d', strtotime($date_of_death)); 
    $cause_of_death = $_POST['cause_of_death'];
    $procedures = $_POST['procedures'];
    $userid = isset($_SESSION['adminid']) ? $_SESSION['adminid'] : $_SESSION['workerid'];

    // Create a prepared statement
    $sql = "INSERT INTO corpses (deceased_name, age, gender, date_of_death, cause_of_death, procedures, userid) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Bind the parameters and execute the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisssi", $deceased_name, $age, $gender, $date, $cause_of_death, $procedures, $userid);
    if ($stmt->execute()) {
      $_SESSION['SuccessMessage'] = "Corpse Added Successfully";
    header("Location: ../addcorpse.php");
    exit;
        } else {
            $_SESSION['ErrorMessage'] = "Corpse could not be added. Please try again";
            header("Location: ../addcorpse.php");
            exit;
    }
}
}
addCorpse();

function getUsername($id){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE userid = ? ");   
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $username = $result->fetch_assoc();
    return $username['full_names'];
}

function addWorker(){
    if(isset($_POST['addworker'])) {
        global $conn;
        $fullnames = $_POST['fullnames'];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
    
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
    
        if ($num == 0) {
            if ($password == $cpassword) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO users (username, full_names, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $username, $fullnames, $hash);
                $stmt->execute();
                if ($stmt) {
                    $_SESSION['SuccessMessage'] = "New Worker Created Successfully";
                    header("Location: ../manageworker.php");
                    exit();
                }
            } else {
                $_SESSION['ErrorMessage'] = "Passwords Dont Match.";
                header("Location: ../addworkers.php");
                exit();
            }
        } else {
            $_SESSION['ErrorMessage'] = "Username not available";
            header("Location: ../addworkers.php");
             exit();

                
        }
    }
}
addWorker();

function updatecorpse(){
    if(isset($_POST['updatecorpse'])){
        global $conn;
        $corpseid = $_POST['corpseid'];
        $deceased_name = $_POST['deceased_name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $date_of_death = $_POST['date_of_death'];
        $date =date('Y-m-d', strtotime($date_of_death)); 
        $cause_of_death = $_POST['cause_of_death'];
        $procedures = $_POST['procedures'];
        $userid = isset($_SESSION['adminid']) ? $_SESSION['adminid'] : $_SESSION['workerid'];
    
        // Create a prepared statement
        $sql = "UPDATE corpses SET deceased_name=?, age=?, gender=?, date_of_death=?, cause_of_death=?, procedures=?,userid=? WHERE corpseid=?";
    
        // Bind the parameters and execute the statement
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisssii", $deceased_name, $age, $gender, $date, $cause_of_death, $procedures, $userid, $corpseid);
        if ($stmt->execute()) {
          $_SESSION['SuccessMessage'] = "Corpse Updated Successfully";
        header("Location: ../allcorpse.php");
        exit;
            } else {
                $_SESSION['ErrorMessage'] = "Corpse could not be Updated. Please try again";
                header("Location: ../updatecorpse.php");
                exit;
        }
    }
} 
updatecorpse();

function deleteCorpse(){
if (isset($_GET["corpseid"])){
    global $conn;
    $corpseid= $_GET["corpseid"];
    $stmt = $conn->prepare("DELETE FROM corpses WHERE corpseid = ? ");
    $stmt ->bind_param("i", $corpseid);
   if( $stmt->execute()){
    $_SESSION['SuccessMessage'] = "Corpse Deleted Successfully";
    header("Location: ../allcorpse.php");
   }else{
    $_SESSION['ErrorMessage'] = "Corpse could not be Deleted. Please try again";
    header("Location: ../allcorpse.php");
}
}
}
deleteCorpse();