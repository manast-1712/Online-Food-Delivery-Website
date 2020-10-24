<!DOCTYPE html>
<html>
<body style="background-color: pink;">

<?php
session_start(); 
//https://github.com/eliasFsDev/Login-System-PHP-and-MYSQL/blob/master/login.php
$serverName="localhost";
$userName="root";
$password="";
$dbname="userdata";

// creating connection

$conn = mysqli_connect($serverName,$userName,$password,$dbname);
if(mysqli_connect_errno()){
    echo"Failed to connect";
    exit();
}
echo"Connection success !!"; 
?>
<?php
if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$password = validate($_POST['password']);

	if (empty($email)) {
		header("User Name is required");
	    exit();
	}else if(empty($password)){
        header("Password is required !!");
	    exit();
	}else{
		$sql = "SELECT * FROM udata WHERE email='$email' AND password='$password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $password) {
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['name'] = $row['name'];
				$_SESSION['id'] = $row['id'];
				echo"Successful !!";
				header("Location: ./pages/homepage.html");
            	//header("Successful !!!");
		        exit();
            }else{
				echo '<script>alert("This email is not registered !! please sign up first !!")</script> ';
				//header('Location: formfinal.php');
				echo "<script>
				alert('This email is not registered !! please sign up first !!');
				document.location='formfinal.php'</script>";
				//header("Location:formfinal.php?error=Incorect User name or password");
				//header("heyy there");
		        exit();
			}
		}else{
			echo '<script>alert("This email is not registered !! please sign up first !!")</script> ';
			//header("error=Incorect User name or password");
			//header("heyy there");
	        exit();
		}
	}
	
}else{
	echo '<script>alert("incorrect username or password !")</script> ';
	//header("data required");
	exit();
}
?>
<a href="logout.php"> Logout </a>

</body>
</html>