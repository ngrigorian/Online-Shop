<?php
require ('server.php');
if(!isset($_SESSION["email"]) || !isset($_SESSION["verification_code"])){
    header('Location: index.php');
    exit;
} else if(isset($_POST["verification_code"]) && $_SESSION["verification_code"] == $_POST['verification_code']){
    echo '<script>alert("Data Saved on Session Successfully!")</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </head>
<body>
    <div class="container">
        <h1>Confirm Your Password!</h1>
        <form method="post" action="" class="mt-4">
        <label for="verification_code">Verification Code:</label>
        <input type="text" id="verification_code" class="form-control" name="verification_code"><br>

        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" class="form-control" name="newPassword"><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" class="form-control" name="cNewPassword"><br>
        <input type="submit" class="btn btn-success" value="Change Password" name="change">
    </form>
    </div>
    
</body>
</html>
