<?php
    function create_pub_dropdown()
    {
        // get username and password from just-submitted form
        //    (complain if none submitted)

        if ( (! array_key_exists('name', $_POST)) or
             ($_POST['name'] == "") or
             (! isset($_POST['name'])) )
        {
            
            echo "invalid username/password.";
        }

        if ( (! array_key_exists('password', $_POST)) or
             ($_POST['password'] == "") or
             (! isset($_POST['password'])) )
        {
            
            echo "invalid username/password.";
        }

        $name = strip_tags($_POST["name"]);
        $password = $_POST['password'];

        // ...and SAVE them for future-state use

        $_SESSION["name"] = $name;
        $_SESSION["password"] = $password;

        // try to connect to Oracle

        $conn = conn($name, $password);

        // now start a form with a dynamically-built drop-down of
        //     ISBN choices (including titles for better human-usability)

        ?>

        <form method="post"
              action="<?= htmlentities($_SERVER['PHP_SELF'],
                                       ENT_QUOTES) ?>">
            <fieldset>
            <legend> Select ISBN </legend>

            <?php

            // query ISBNs and titles to be drop-down options

            $pub_q = 'select pub_name from publisher';
            $pub_stmt = oci_parse($conn, $pub_q);
            oci_execute($pub_stmt, OCI_DEFAULT);
            ?>

            <label for="pub_choice"> Publisher Name: </label>
            <select name="pub_choice" id="isbn_choice">

            <?php

            // add an option element for each ISBN/title

            while (oci_fetch($pub_stmt))
            {
                 $curr_pub = oci_result($pub_stmt, "PUB_NAME");
                 
                 ?>

                 <option value="<?= $curr_pub ?>">
                     <?= $curr_pub ?> </option>
                 <?php
            }

            oci_free_statement($pub_stmt);
            oci_close($conn);

            // now finish the form
            ?>
            </select>

            <div class="submit">
                <input type="submit" value="submit" />
            </div>

            </fieldset>
        </form>
        <?php
    }
?>