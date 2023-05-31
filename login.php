<head>
  <title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<style>
  body{
    display:flex;
    align-items:center;
    justify-content:center;
  }
  *{
    padding-top:15px;
  }
</style>
</head>
<body>
  <form action="server.php" method="post">
  <h1>Log In</h1>
  <div class="input-group">
  <span class="input-group-text">Email</span>
  <input type="text" aria-label="Email" class="form-control" name="loginEmail">
</div>


<div class="input-group">
  <span class="input-group-text">Password</span>
  <input type="password" aria-label="First name" class="form-control" name="loginPassword">
</div>


    <input type="submit" name="login" value="Log In" class="btn btn-primary">
    <input type="hidden" name="action" value="login">
  </form>
</body>
