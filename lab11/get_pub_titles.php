<?php
    /* function: request_name: void -> void
       purpose: expects nothing, and makes a form to
                ask for a user's name
    */

    function get_pub_titles()
    {
        ?> 
        <h2> get pub titles </h2>

    <?php

    //saved variables
    $name = $_SESSION["name"];
    $password = $_SESSION["password"];
    $publisher = $_POST["pub_choice"];

    //connecting to oracle
    $conn = conn($name, $password);


    //pass our statement with bind

    $title_q = "select title_name from title, publisher where title.pub_id = publisher.pub_id and :publisher = pub_name";

    $title_q_stmt = oci_parse($conn, $title_q);

    oci_bind_by_name($title_q_stmt, ":publisher", $publisher);

    oci_execute($title_q_stmt, OCI_DEFAULT);

    ?>
    <table>
        <caption>Titles</caption>
    
    <?php

    while (oci_fetch($title_q_stmt)){
        $curr_title = oci_result($title_q_stmt, "TITLE_NAME");

        ?>
            <tr> <td> <?= $curr_title ?> </td></tr>
        <?php
    }

    ?>


    </table>
    <a href="http://nrs-projects.humboldt.edu/~drk10/lab11/pub-titles.php">Take me back to login</a>
    
    <form method="post" action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">

    <input type="button" name="login" value="login">
    <input type="button" name="revisit" value="revisit">

        <div class="submit">
            <input type="submit" value="submit" />
        </div>

    </form>



?>

              
    <?php
    oci_free_statement($title_q_stmt);
    oci_close($conn);

    }
?>