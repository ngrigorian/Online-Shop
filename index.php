<?php
 require "server.php";
 if(isset($_POST['register']) && $_POST['register'] == 'register'){
    login();
 }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   <style>
    a{
        text-decoration: none;
    }
    a:hover{
        color: green;
        transition: all 1s;
    }
   </style>
</head>
<body>
    <div class="container">
        <h1>Please Sign In</h1>
        <form action="server.php" method="post" enctype="multipart/form-data">
        <input type="text" name="fName" id="fName" placeholder="First Name"class="form-control"><br>
        <input type="text" name="lName" id="lName" placeholder="Last Name" class="form-control"><br>
        <input type="email" name="email" id="email" placeholder="Email" class="form-control"><br>
        <input class="form-control" type="file" id="picture"  name="picture" accept="image/*"><br>
        <input type="password" name="password" id="password" placeholder="Password" class="form-control"><br>
        <input type="password" name="cPassword" id="cPassword" placeholder="Confirm Password" class="form-control"><br>
        <div class="d-flex p-1" style="justify-content:space-between;"><a href="mail.php">Forgot Password?</a>
        <a href="login.php">Already have a Account?</a></div>
        <button type="submit" id="sendMail" class="btn btn-success register" name="sendForm" value="register">Submit</button>
        <input type="hidden" name="action" value="register">
    </form>
    <div id="errors"></div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
