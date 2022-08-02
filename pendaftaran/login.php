<?php 
session_start();

if( isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}

require 'functions.php';

if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if( mysqli_num_rows($result) === 1 ) {

    	$row = mysqli_fetch_assoc($result);
    	if (password_verify($password, $row["password"]) ) {

            $_SESSION["login"] = true;

    		header("Location: index.php");
    		exit;
    	}
    }

    $error = true;

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body id="login">
	<div class="login-box"> 
		<h1>Login Here</h1>

<?php if( isset($error) ) : ?>
	<p style="color: red; font-style: italic;">username / password is false</p>
<?php endif; ?>

		<form action="" method="post">
			<div class="textbox">
			  <input type="text" name="username" id="username" autofocus placeholder="enter username">
			</div>
			<br><br>
			<div class="textbox">
			  <input type="password" name="password" id="password" placeholder="enter password">
			</div>
			<br><br>
			<button type="submit" name="login">Login</button>
	    </form>
	</div>

</body>
</html>