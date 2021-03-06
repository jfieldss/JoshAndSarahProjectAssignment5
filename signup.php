<?php
//start the session and require functions.php file so user can signup
session_start();
require_once('functions1.php');
//signup($_GET,'database.csv');  //original code that I don't need to use
if(count($_POST)>0){
    $error=signup('database.csv.php');
    if(isset($error{0})) echo $error;
    else header('location: signin.php');
}
?>

<!--If code below is not commented, it is the original code. The only changes were to the Create a new account section-->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Create a new account</title>
  </head>
  <body>
  <div class="container">
    <h1>Create a new account</h1>
<form action="signup.php" method="POST">
  <div class="form-group">
      <!--make the name field required-->
    <label>First and last name</label>
    <input type="text" class="form-control" name="name" required>
  </div>
  <div class="form-group">
    <label>Email address</label>
      <!--make the type email to ensure that input email is in correct format and make email field required-->
    <input type="email" class="form-control" name="email" required>
  </div>
  <div class="form-group">
    <label>Password</label>
      <!--make the type password so that the input values are not shown (so it's more secure) and make password field required-->
    <input type="password" class="form-control" name="password" required minlength='8'>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>