<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// deleting the cookie.
setcookie("user", "", time() - 3600);
echo "Cookie 'user' is deleted.<br>";
// to change a session variable, just overwrite it
//$n1 = $name;
print_r($_SESSION);
// remove all session variables
session_unset();
echo "Session variables are destroyed !! <br>";
echo "Session name is:  <br>";
echo $name;
// destroy the session
session_destroy();
?>