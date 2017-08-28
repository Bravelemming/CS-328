

<?php
    /* function: request_name: void -> void
       purpose: expects nothing, and makes a form to
                ask for a user's name
    */

// Austen Tong and Jack Daniel Kinne
// cS 328 lab 9 3.24.17
// here:  TO DO http://nrs-projects.humboldt.edu/~drk10/lab9/dept-functs.php

    function request_login()
    {
        ?> 
        <h2> Please login to your oracle account on HSU </h2>

        <form method="post"
              action="<?= htmlentities($_SERVER['PHP_SELF'], 
                                       ENT_QUOTES) ?>">
            <input type="text" name="name" />
            <input type="submit" value="Submit it" />
        </form>               
        <?php
    }

        function request_drop()
    {
        ?> 
        <h2> Create a dropdown dept thingy </h2>

        <form method="post"
              action="<?= htmlentities($_SERVER['PHP_SELF'], 
                                       ENT_QUOTES) ?>">
            <input type="text" name="name" />
            <input type="submit" value="Submit it" />
        </form>               
        <?php
    }

        function request_info()
    {
        ?> 
        <h2> getting dept info </h2>

        <form method="post"
              action="<?= htmlentities($_SERVER['PHP_SELF'], 
                                       ENT_QUOTES) ?>">
            <input type="text" name="name" />
            <input type="submit" value="Submit it" />
        </form>               
        <?php
    }

function farewell()
    {
        ?> 
        <h2> farewell! </h2>

        <form method="post"
              action="<?= htmlentities($_SERVER['PHP_SELF'], 
                                       ENT_QUOTES) ?>">
            <input type="text" name="name" />
            <input type="submit" value="click to return" />
        </form>               
        <?php
    }


?>