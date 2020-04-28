<?php

$cars=array_map('str_getcsv', file('data.csv'));;


if(!isset($_GET['id'])){
	echo 'Please enter the id of a member or visit the <a href="index.php">index page</a>.';
	die();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title><?= $cars[$_GET['id']][1].' '.$cars[$_GET['id']][2] ?></title>
  </head>
  <body style="background-color:blue">
	  <div class="container">
		<h1 style="color:white;"><?= $cars[$_GET['id']][0].' '.$cars[$_GET['id']][1].' '.$cars[$_GET['id']][2] ?></h1>
		<p style="color:white;"><?= $cars[$_GET['id']][4] ?></p>
		<img src="<?= $cars[$_GET['id']][5] ?>" width="500" />
		<p style="color:white;"><?= $cars[$_GET['id']][3] ?></p>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
<div style = "background-color:red;">
    <form action="index.php">
        <input type="submit" value="Go back to index page" />
    </form></div>
<div style = "background-color:yellow;">
    <form action="create.php">
        <input type="submit" value="Submit your own car!" />
    </form></div>
<div style = "background-color:green;">
    <form action="edit.php">
        <input type="submit" value="Edit this car" />
    </form>
<div style = "background-color:black;">
    <form action="delete.php">
        <input type="submit" value="Delete this entry" />
    </form></div></div>
</html>
