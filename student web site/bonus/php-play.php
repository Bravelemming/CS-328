<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml">

<!--
    by: Jack Daniel Kinne
    CS 328 HW: Bonus
    last modified: 3.19.17

	here: 
	http://nrs-projects.humboldt.edu/~drk10/bonus/php-play.php

-->

<head>  
    <title> Bonus HW </title>
    <meta charset="utf-8" />

    <link href="http://users.humboldt.edu/smtuttle/styles/normalize.css" 
          type="text/css" rel="stylesheet" />
          
    <link href="php-play.css" type="text/css" rel="stylesheet" />


</head> 

<body> 

 	<form method="post" action="results.php">
        <fieldset>
            <legend> I am the bridge keeper! </legend>

	        <label for="name"> What is your name? </label>
            <input type="text" name="name" id="name" /> 

            <label for="quest"> What is your Quest? </label>
            <input type="text" name="quest" id="quest"/>

            <label for="color"> What is your favorite color? </label>
            <input type="text" name="color" id="color" /> 

            <div class="submit">
                <input type="submit" value="I am not afraid!" />
            </div>
        </fieldset>
    </form>

<hr /> 

<p>
by: Jack Daniel Kinne
</p>
<p>
CS 328 HW: Bonus
</p>
<p>
last modified: 3.19.17
</p>





<hr />   


<footer>
    <p>
        <a href="http://validator.w3.org/check/referer">
        Validate this HTML5 page
        </a>
    </p>

    <p>
        For full credit, this page must also pass the tests at
        <a href="https://validator.nu/">
        https://validator.nu/</a>:
        (instructions modified from
        http://stackoverflow.com/questions/16596493/html5-doctype-with-strict)
    </p>
    <ul>
         <li> switch to "text field" in the select box at the
              top left of the form (make sure JavaScript is
              enabled...!) </li>
         <li> paste in the text of your document </li>
         <li> in the Preset field, select: <br />
              "XHTML + SVG 1.1 + MathML 3.0 + RDFa Lite 1.1" </li>
         <li> click validate </li>
    </ul>

    <p>
        <a href=
           "http://jigsaw.w3.org/css-validator/check/referer?profile=css3">
            <img src="http://jigsaw.w3.org/css-validator/images/vcss" 
                 alt="Valid CSS3!" height="31" width="88" id="w3c" />
        </a>
    </p>

</footer>

</body> 
</html> 