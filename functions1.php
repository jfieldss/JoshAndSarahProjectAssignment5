<?php
//show errors to help debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting('E_ALL');

//create signup function
function signup(/*$data,*/$file){
	/*
    
    //This commented out code is the original code given for the exam
    
    if(isset($data['email'])){
		$data=implode(';',$data);
		$database=fopen($file,'w');
		fwrite($database,$data['email']);
		echo ('Account registered');
		session_start();
		$_SESSION['userID']=3;
	} */
    //check to make sure email is valid
    if(count($POST)>0) {
		if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
			return 'The email entered is invalid';
		}
        //make the email lowercase to make checking if it exists for signin is easier
		$_POST['email']=strtolower($_POST['email']);
        //require password to be at least 8 characters long
		$_POST['password']=trim($_POST['password']);
		if(strlen($_POST['password'])<8){
			return 'The password must be 8 characters or more';
		}
        //when user inputs new data, write to the database file (to store their name, email, and password) 
		if(!file_exists($database_file)){
			$h=fopen($file,'w+');
			fwrite($h,'<?php die() ?>'."\n");
			fclose($h);
		}
        //see if the users input email is already in use; if it is, return an error
		$h=fopen($file,'r'); 
		while(!feof($h)){
			$line=fgets($h);
			if(strstr($line,$_POST['email'])) return 'the email is already registered';
		}
		fclose($h);
        //hash the password in the database so that it's secure
		$_POST['password']=password_hash($_POST['password'], PASSWORD_DEFAULT);
		//append the data to the file
		$h=fopen($file,'a+');
		fwrite($h,implode(';',[$_POST['name'],$_POST['email'],$_POST['password']])."\n");
		fclose($h);

		echo 'register success';
		return'';
	}	
    
}

//create signin function
function signin($data,$file){
	/*
    
    //This commented out code is the original code given in the midterm
    
    if(isset($data['email'])){
		$database=fopen($file,'r');
		while(!feof($database)){
			$line=explode(';',fgets($database));
			if($line[1]==$data['email']){
				fclose($database);
				die('Congratulations, you are logged in!');
			}
		}
		die('The user does not exist.')
	}
	session_start();   
    
    */
    //check that email is valid; if it's not, return an error message
    if(count($_POST)>0){
		if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
			return 'Invalid email';
		}
        //make the email lowercase to make checking if it exists for signin is easier
		$_POST['email']=strtolower($_POST['email']);
		//make sure password is 8 or more characters
		$_POST['password']=trim($_POST['password']);
		if(strlen($_POST['password']) < 8){
			return 'not enough characters';
		}
		//check to see if account is registered in database
		if(!file_exists('database.csv')){
			$h=fopen(database_file,'w+');
			fwrite($h,'');
			fclose($h);
		}
        //read the database file and make sure that the user is entering the correct email and password combination; return an error message if the password is incorrect
		$h=fopen($database_file,'r');
		while(!feof($h)){
			$line=preg_replace('/\n/','',fgets($h));
			if(strstr($line,$_POST['email'])){
				$line=explode(';',$line);
				if(!passowrd_verify($_POST['password'],$line[1])){
					fclose($h);
					return 'Password doesnt match';
				}
				$_SESSION[$data]=$_POST['email'];
				fclose($h);
				return'Successfully Logged In!';
			}
		}
		fclose($h);
		return 'email doesnt match'; //return an error message is email does not match
	}
}

//create signout function that destroys the session and takes user back to index page
function signout(){
	header('location: index.php');
	session_destroy();
}

function jsonToArray(string $file){
	return json_decode(file_get_contents($file),true);
}

function showItem($id,$heading,$picture='https://via.placeholder.com/140x100',$body=null){
	if(!isset($body)) $body='<a href="detail.php?id='.$id.'">Visit profile</a>';
	echo '<div class="media">
 <a href="detail.php?id='.$id.'"> <img src="'.$picture.'" class="mr-3" alt="" width="96"></a>
  <div class="media-body">
    <h5 class="mt-0"><a href="detail.php?id='.$id.'">'.$heading.'</a></h5>
    '.$body.'
  </div>
</div>';
}