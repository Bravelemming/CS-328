<?php
    /* function: request_name: void -> void
       purpose: expects nothing, and makes a form to
                ask for a user's name
    */

    function create_login()
    {
        ?> 
        <h2> create_login </h2>

        <form method="post"
              action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
        <fieldset>
            <legend> Please enter Oracle username/password: </legend>
            <label for="name">login:</label>
            <input type="text" name="name" />
            <label for="password">password:</label>
            <input type="password" name="password" />
            <input type="submit" value="Submit it" />
            </fieldset>
        </form>               
        <?php
    }
?>