<?php
session_start(); // Access the existing session.

// If no session variable exists, redirect the user:
if (!isset($_SESSION['username'])) {

	// Need the functions:
	require ('loginfunction.php');
	redirect_user();	
	
} else { // Cancel the session:

	$_SESSION = array(); // Clear the variables.
	session_destroy(); // Destroy the session itself.
	setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.

}

// Set the page title and include the HTML header:
$page_title = 'Logged Out!';

?>
<!DOCTYPE html>
<html>
<?php global $page; $page = 'Login'; ?>
<!--Display logged out message:-->
 <div class="box">
    <div class="login">
 <h1>You are now successfully logged out!</h1>
 <h3>Please close your browser.</h3>

 </div>
</div>
 </body>
</html>