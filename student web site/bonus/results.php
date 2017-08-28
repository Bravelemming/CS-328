<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<!--
    by: Jack Daniel Kinne
    CS 328 HW: Bonus
    last modified: 3.19.17

	here: 
	http://nrs-projects.humboldt.edu/~drk10/bonus/results.php

-->


<head>
	<title> Bonus results </title>
    <meta charset="utf-8" />

    <link href="http://users.humboldt.edu/smtuttle/styles/normalize.css" 
          type="text/css" rel="stylesheet" />
          
    <link href="php-play.css" type="text/css" rel="stylesheet" />

</head>

<body>
<div id="bonusResult">


<?php 
	$name =  strip_tags($_POST['name']);
	$quest =  strip_tags($_POST['quest']);
	$color =  strip_tags($_POST['color']);
?>
<p>
Welcome <?php echo $name; ?>. 
</p>  

<p>
Your quest of <?php echo $quest; ?> is truly honorable. 
</p>

<p>
<?php echo $color; ?>, huh?
</p>

<p>
You may pass.
</p>

</div>
</body>
</html>