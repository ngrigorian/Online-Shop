<?php
session_start();
require('server.php');
if(!isset($_SESSION['user_id'])) {
    header('Location:index.php');
}
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <style>
        h1,h2,label{
            color:rgb(255,149,34);
            font-family:Arial Black;
        }
        input{
            width:250px;
            height:40px;
            border:1px solid grey;
            border-radius:10px;
            padding:5px;
        }
        button{
            width:120px;
            height:38px;
            border:none;
            border-radius:15px;
            background-color:rgb(255,149,34);
            font-size:16px;
            color:white;
            transition:all 0.9s linear;
        }
        button:hover{
            background-color:rgb(94,94,128);
            color:rgb(255,149,34);
        }
        form{
            display:flex;
            justify-content:space-around;
            align-items:center;
            padding:5px;
        }
        .error {
        color: red;
        font-size: 14px;
        margin-top: 5px;
}
img{
    width:80px;
    height:80px;
}
    </style>
</head>
<body>
    <h2 align="center">this is your username</h2>
    <h1 align="center"><?php echo getUserName(); ?></h1>
    <form method="post">
    <label for="newLastName">New Last Name:</label>
    <input type="text" id="newLastName" name="newLastName">
    <?php if(isset($errors) && !empty($errors)) {
        foreach($errors as $error) { ?>
            <div class="error"><?php echo $error; ?></div>
    <?php }} ?>
    <button type="submit" name="changeLastName">Save</button>
</form>

<form method="post">
    <label for="newFirstName">New First Name:</label>
    <input type="text" id="newFirstName" name="newFirstName">
    <?php if(isset($_POST['changeFirstName']) && empty($_POST['newFirstName'])) {
        $errors[] = "First name is empty, please complete it.";
    } ?>
    <?php if(isset($errors) && !empty($errors)) {
        foreach($errors as $error) { ?>
            <div class="error"><?php echo $error; ?></div>
    <?php }} ?>
    <button type="submit" name="changeFirstName">Save</button>
</form>

<form method="post" action="" enctype="multipart/form-data">

  <label for="formFile" class="form-label">add your photo</label>
  <input class="form-control" type="file" id="formFile"  name="profilePicture" accept="image/*">
    <br><br>
    <button type="submit" name="submitPicture">Upload Picture</button>
</form>
<hr>
<?php  $userId = $_SESSION['user_id'];
      $user = getUserInfo($userId);

      echo "<form>";
      echo "<label>First Name: </label>" . $user['fName'] . "<br>";
      echo "<label>Last Name: </label>" . $user['lName'] . "<br>";
      if ($user['profile_picture']) {
        echo " <label>Your Photo: </label><img src='uploads/" . $user['profile_picture'] . "'><br>";
      }
      echo "</form>";
    ?>
    <hr>
<form method="post">
<button type="submit" name="logout" value="Logout">Log Out</button>
</form>
</body>
</html>