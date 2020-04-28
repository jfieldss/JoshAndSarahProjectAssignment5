<!--when signing out, make sure that it takes the user back to the index page and makes them sign in again if desired-->
<?php
require_once('functions1.php');
signout('signin.php','index.php','user/email');
?>