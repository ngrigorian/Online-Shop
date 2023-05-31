<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "val-prac");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$errors = [];
function checkEmail($email) {
    global $conn;
    global $errors;
    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $errors[] = "Email already exists";
        return false;
    }
    return true; 
}
function register(){

    global $conn;
    global $errors;
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $profile_picture = null;
    if (strlen($password) < 8) {
        $errors[] = 'Password must be at least 8 characters long';
    }
    if ($password !== $_POST['cPassword']) {
        $errors[] = 'Passwords do not match';
    }
    if (!checkEmail($email)) {
        $errors[] = 'Email already exists!';
    }
    if(isset($_POST['sendForm'])) {
        if(isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
            if($_FILES['picture']['size'] > 5000000) {
                $errors[] = "File size too large. Please select a smaller file.";
            } else {
                $allowed_extensions = array('jpg', 'jpeg', 'png');
                $file_extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);

                if(!in_array(strtolower($file_extension), $allowed_extensions)) {
                    $errors[] = "Invalid file type. Please select a valid image file.";
                } else {
                    $file_name = "profile_picture_" . "." . $file_extension;
                    if(move_uploaded_file($_FILES['picture']['tmp_name'], "uploads/" . $file_name)) {
                        $stmt = $conn->prepare("INSERT INTO `users` (`fName`, `lName`, `email`, `password`, `profile_picture`) VALUES (?, ?, ?, ?, ?)");
                        $stmt->bind_param("ssss", $fName, $lName, $email, $password, $file_name);
                        $result = $stmt->execute();
                        if ($result) {
                            echo "User registered successfully!";
                        } else {
                            echo "Failed to register user.";
                        } 
                    }
                    } 
                }
            }
        }
}
function changePassword() {
    global $conn;
    global $errors;

    $email = $_SESSION['email'];
    $newPass = $_POST['newPassword'];
    $confPass = $_POST['cNewPassword'];

    if($newPass !== $confPass) {
        $errors[] = 'Passwords do not match';
    }

    if(strlen($newPass) < 8){
        $errors[] = 'Password must be at least 8 characters long';
    }

    if (!isset($_POST['verification_code'])) {
        $errors[] = 'Verification code is missing';
    } else {
        $verificationCode = $_POST['verification_code'];
        if($verificationCode == $_SESSION['verification_code']) {
            $stmt = $conn->prepare("UPDATE `users` SET `password` = ? WHERE `email` = ?");
            $stmt->bind_param("ss", $newPass, $email);
            $result = $stmt->execute();
            if ($result) {
                echo "Data Changed on Database Successfully!";
            } else {
                echo "Data submission has failed, Please Try Again!";
            }
        }
        else {
            $errors[] = 'Verification code does not match.';
        }
    }

    foreach ($errors as $error) {
        echo $error.'<br>';
    }
}
function login(){  
    global $conn;
    global $errors;

    if(isset($_POST['action']) and $_POST['action'] == 'login') {
        $email = $_POST['loginEmail'];
        $password = $_POST['loginPassword'];
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['fName'] . ' ' . $row['lName'];
            header('Location:welcome.php');
        } else {
            $errors[] = "Invalid email or password";
        }
    } 
}
function updateLastName(){
    global $conn;
    global $errors;
    if (isset($_POST['changeLastName'])) {
        $newLastName = trim($_POST['newLastName']); 
        if(empty($newLastName)) {
            $errors[] = "Last name is empty, please complete it.";
            return; 
        }
        $userId = $_SESSION['user_id'];
        $stmt = $conn->prepare("UPDATE `users` SET `lName` = ? WHERE `id` = ?");
        $stmt->bind_param("si", $newLastName, $userId);
        $result = $stmt->execute();
    
        if ($result) {
            header('Location:welcome.php');
        } else {
            echo "Failed to update last name.";
        }
    }
}
function updateFirstName(){
    global $conn;
    global $errors;
    if (isset($_POST['changeFirstName'])) {
        $newFirstName = trim($_POST['newFirstName']);
        if(empty($newFirstName)) {
            $errors[] = "First name is empty, please complete it.";
            return; 
        }
        $userId = $_SESSION['user_id'];
        $stmt = $conn->prepare("UPDATE `users` SET `fName` = ? WHERE `id` = ?");
        $stmt->bind_param("si", $newFirstName, $userId);
        $result = $stmt->execute();
    
        if ($result) {
            header('Location:welcome.php');
        } else {
            echo "Failed to update first name.";
        }
    }
}
function getUserName() {
    global $conn;
    $userId = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT fName, lName FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['fName'] . ' ' . $row['lName'];
}
function addProfilePicture() {
    global $conn;
    global $errors;
    if(isset($_POST['submitPicture'])) {
        $userId = $_SESSION['user_id'];
        if(isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] == 0) {
            if($_FILES['profilePicture']['size'] > 5000000) {
                $errors[] = "File size too large. Please select a smaller file.";
            } else {
                $allowed_extensions = array('jpg', 'jpeg', 'png');
                $file_extension = pathinfo($_FILES['profilePicture']['name'], PATHINFO_EXTENSION);

                if(!in_array(strtolower($file_extension), $allowed_extensions)) {
                    $errors[] = "Invalid file type. Please select a valid image file.";
                } else {
                    $file_name = "profile_picture_" . $userId . "." . $file_extension;
                    if(move_uploaded_file($_FILES['profilePicture']['tmp_name'], "uploads/" . $file_name)) {
                        $stmt = $conn->prepare("UPDATE `users` SET `profile_picture` = ? WHERE `id` = ?");
                        $stmt->bind_param("si", $file_name, $userId);
                        $result = $stmt->execute();

                        if ($result) {
                            echo "Profile picture updated successfully!";
                        } else {
                            echo "Failed to update profile picture.";
                        }
                    } else {
                        $errors[] = "Failed to upload file. Please try again.";
                    }
                }
            }
        } else {
            $errors[] = "Please select a file to upload.";
        }

        if(!empty($errors)) {
            foreach($errors as $error) {
                echo "<p>$error</p>";
            }
        }
    }
}
function getUserInfo($userId) {
    global $conn;
    $sql = "SELECT fName, lName, profile_picture FROM users WHERE id = $userId";
    $result = $conn->query($sql);
    $userInfo = array();
  
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $userInfo['fName'] = $row['fName'];
        $userInfo['lName'] = $row['lName'];
        $userInfo['profile_picture'] = $row['profile_picture'];
      }
    }
    $conn->close();
    return $userInfo;
}

if(isset($_POST['action']) && $_POST['action'] == 'registration') {
    register();
}
if(isset($_POST['change'])) {
    changePassword();
}
if(isset($_POST['login'])){
    login();
}
if(isset($_POST['changeLastName'])){
    updateLastName();
}
if(isset($_POST['changeFirstName'])){
    updateFirstName();
}
if(isset($_POST['submitPicture'])){
    addProfilePicture();
}
?>