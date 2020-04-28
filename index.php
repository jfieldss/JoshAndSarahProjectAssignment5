<?php
$file='data.csv';
$array=[];
if(($input=fopen("data.csv","r"))!==False){
while(($data=fgetcsv($input,1000,","))!==False){
 $array[]=$data;
}
fclose($input);
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

    <title>Car Search</title>
  </head>
  <body>
    <div class="container">
    <h1>Cars</h1>
	<?php
	for($j=0;$j<count($array);$j++){
		echo '<div class="media">
  <img src="'.$array[$j][5].'" class="mr-3" alt="'.$array[$j][2].' '.$array[$j][3].'" width="150">
  <div class="media-body">
    <h5 class="mt-0">'.$array[$j][1].' '.$array[$j][2].' '. $array[$j][3].'    '. $array[$j][4].'</h5>
    <a href="detail.php?id='.$j.'">Visit Car Details Page</a>
  </div>
</div>';
    }

	?>
	</div>
        <div class="container">
    <h4><br>Create an Account or Log in!</h4>
	<p><a href="signup.php" class="btn btn-primary">Create an account</a> <a href="signin.php" class="btn btn-primary">Login</a></p>
	<p><a href="signout.php" class="btn btn-primary">Log Out</a></p>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>