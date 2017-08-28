<?php
    session_start();
// Austen Tong and Jack Daniel Kinne
// cS 328 lab 9 3.24.17
// here:  TO DO http://nrs-projects.humboldt.edu/~drk10/lab9/dept-details.php
?>

<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml">

<!-- 
    creating login, dropdown, and dept info page
-->

<head>  
    <title> lab 9  </title>
    <meta charset="utf-8" />

    <?php
        /* these are bringing in PHP functions I am calling below */

        require_once("dept-functs.php");

    ?>

    <link href="http://users.humboldt.edu/smtuttle/styles/normalize.css" 
          type="text/css" rel="stylesheet" />
</head> 

<body>
    <h1> Jack Daniel Kinne and Austen Tong </h1>


    <?php
    if (! array_key_exists('next_page', $_SESSION))
    {
        ?>
        <p>login check</p>
        <?php 

        request_login();
        $_SESSION['next_page'] = "drop";

    }
    elseif ($_SESSION['next_page'] == "drop")
    {
		//request_login();
		//breakdown
		//$_SESSION['next_page'] = "drop";			
    	?>
        <p>drop check</p>
        <?php 
        request_drop();
        $_SESSION['next_page'] = "info";
    }
    elseif ($_SESSION['next_page'] == "info")
    {
    	?>
        <p>info check</p>
        <?php 
        request_info();
        $_SESSION['next_page'] = "farewell";
    }
    elseif ($_SESSION['next_page'] == "farewell")
    {
        ?>
        <p>farewell check</p>
        <?php 
        farewell();
        session_destroy();
    }

    // I hope I can't reach this...!

    else
    {
        ?>
        <p> <strong> YIKES! should NOT have been able to reach 
            here! </strong> </p>
        <?php

        session_destroy();
        session_regenerate_id(TRUE);
        session_start();

        request_login();
    }


?>
</body>
</html>