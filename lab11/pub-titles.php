<?php
    session_start();
//Jack Daniel Kinne and Michael Hoff and Halie Carton
//CS 328 4.7.17
?>
<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml">


<!-- 
    lab 11 - problem 1
    here:
    http://nrs-projects.humboldt.edu/~drk10/lab11/pub-titles.php
-->

<head>  
    <title> lab11 pub titles </title>
    <meta charset="utf-8" />

    <?php
        /* these are bringing in PHP functions I am calling below */

        include_once("create_login.php");
		include_once("create_pub_dropdown.php");
		include_once("get_pub_titles.php");
        include_once("conn.php");
 
    if ( isset($_POST['login']) )
    $_SESSION['next_page'] == "login";
    if ( isset($_POST['revisit']) )
    $_SESSION['next_page'] == "revisit";

    ?>

    <link href="http://users.humboldt.edu/smtuttle/styles/normalize.css" 
          type="text/css" rel="stylesheet" />
    <link href="bks.css" 
          type="text/css" rel="stylesheet" />

</head> 

<body>
    <h1> Lab 11 </h1>
    <h2> Jack Daniel Kinne//Michael Hoff//Halie Carton</h2>
    <?php
    if (! array_key_exists('next_page', $_SESSION))
    {
        create_login();
        $_SESSION['next_page'] = "dropdown";
    }
    elseif ($_SESSION['next_page'] == "dropdown")
    {
        create_pub_dropdown();
        $_SESSION['next_page'] = "pubtitles";
    }
    elseif ($_SESSION['next_page'] == "pubtitles")
    {
        get_pub_titles();
        
    }
    elseif ($_SESSION['next_page'] == "revisit")
    {
        create_pub_dropdown();
        
    }
    elseif($_SESSION['next_page'] == "login")
    {
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

        request_name();
    }

   
?>
</body>
</html>