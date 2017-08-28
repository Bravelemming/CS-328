

-- php preprocessor creations $_SESSION and assigns an id for the session;

session_start(); // create a session, assign an iD
thiis should be your first thing in the pHP document, even before its <html>tag.

<?php
	session_start();
?>

//<!DOCTYPE html>




first response returns a result and the session iD

second request includes the session ID along with the request

once finished, can destroy the session ID




<?php
	session_start();
	
?>

<?php  
	//decide that when/or if the count exceeds 7, destroy current session
	
	if ($_SESSION['count'] > 7)
	{
		session_destroy();
	}

?>

<!DOCTYPE html>


<head></head>

<body>

	<?php  
		if (! array_key_exists("count", $_SESSION))
		{
			//make a new attribute in $_SESSION
			$_SESSION['count'] = 0;
		}
		else
		{
			$_SESSION['count']++;
		}
	?>

<p>
	The count session attribute is currently <?= $_SESSION['count'] ?>
</p>





	<?php require_once("328footer.html"); ?>
</body>









