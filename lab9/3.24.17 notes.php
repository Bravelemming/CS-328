

//#ifndef
//#request_quest.php

<?php
function request_quest()
{
	//if here, it better have a name
	if ( ( ! array_key_exists('name', $_POST['name']) )  or 
		( $_POST['name'] == "" ) or 
		( ! isset($_POST['name']) ) )
	{
		complain_and_exit("name");
	}

	//if here, should be safe to grab a name and do things with it.
	$user_name = strip_tags($_POST['name']);

	$_SESSION["name"] = $user_name;

	?>

	<h2>Well, <?= $user_name ?> </h2>

	<?php 
}


?>

//#endif

//#ifndef
//#name.php



