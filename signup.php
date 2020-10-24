<html>
<body>
<?php
//the example of inserting data with variable from HTML form
//input.php

$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];

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

$query="select * from udata where  email='$email' ";

$result = mysqli_query($conn,$query);

// counts the number of rows.
$num = mysqli_num_rows($result);

if($num!=0){
	//echo"email already exists !! please sign in ! ";
	//echo '<script>alert("This email is already registered !! please sign in !!")</script> ';
    header("location: formfinal.php?errorcode=email alreadyexists!!");
}else{
	$insert = " insert into udata (name,email,password) values ('$name','$email','$password') ";
	$result = mysqli_query($conn,$insert);
	if($result){
		header("location: formfinal.php?");
	} else{
		echo("<br>Input data is failed !!");
	}
    
}
mysqli_close($conn);
?>

</body>
</html>