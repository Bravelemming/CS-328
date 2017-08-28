<!DOCTYPE html>

<head>
    <link href="styles/varplay.css" rel = "stylesheet"
    type = "text/css"/>

    <?php require_once("square.php"); ?>

</head>


<$php
        $welcome_message = "hello and welcome";
        $farewell_message = "goodbye and goodluck";

        $num1 = 2;
        $num2 = 4.35;

        

?>


<body>






<p> <?=$welcome_message ?> </p>

<p> <?=$farewell_message ?> </p>

<p> <?=$num1 + $num2 ?> </p>



<$php
        $play_double = "the farewell message is $farewell_message ";
        $play_single = 'the farewell message is $farewell_message ';
?>

<p>
	<?= $play_single ?>.
</p>

</body>

</html>