<?PHP
	session_start(); //to ensure you are using same session
    unset($_SESSION['seller']);
    unset($_SESSION['login']);
    session_destroy(); //destroy the session
    header("location:index.php");
?>
