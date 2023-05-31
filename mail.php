<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Your Mail and get the code!</title>
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
    <form method="post" action="send.php">
        <input type="email" name="nEmail"  placeholder="Complete Your Email " class="form-control"><br>
        <button type="submit" class="btn btn-success" name="send">Submit</button>
        <input type="hidden" name="action" value="registration">
    </form>
</div>
</body>
</html>
