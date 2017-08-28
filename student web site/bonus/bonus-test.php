<!--
Jack Daniel Kinne
3.20.17
here:  
http://nrs-projects.humboldt.edu/~drk10/bonus/bonus-test.php
-->

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title> CS 328 lab 8 </title>
    <meta charset="utf-8" />

    <link href="http://users.humboldt.edu/smtuttle/styles/normalize.css" 
          type="text/css" rel="stylesheet" />

    <link href="bks.css" type="text/css" rel="stylesheet" />

</head> 

<body>

<h1> Jack Daniel Kinne </h1>
<h2>CS 328 Bonus HW problem 2</h2>
<?php
    // do you need to ask for username and password?

    if ( ! array_key_exists("username", $_POST) )
    {
        // no username in $_POST? they need a login
        //     form!
        ?>
  
        <form method="post" 
              action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
        <fieldset>
            <legend> Please enter Oracle username/password: </legend>

	                <label for="username"> Username: </label>
            <input type="text" name="username" id="username" /> 

            <label for="password"> Password: </label>
            <input type="password" name="password" 
                   id="password" />

            <div class="submit">
                <input type="submit" value="Log in" />
            </div>
        </fieldset>
        </form>
    <?php
    }      

    // otherwise, handle the submitted login form 
    //    (or try to) -- and show the user some
    //    lovely employee information

    else
    {
        // I am a little paranoid -- I'm stripping
        //   tags from the username 

        $username = strip_tags($_POST['username']);

        // the ONLY thing I am doing with this is
        //    try to log in... so I HOPE this is OK!

        $password = $_POST['password'];

        // set up db connection string

        $db_conn_str = 
            "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)
                                       (HOST = cedar.humboldt.edu)
                                       (PORT = 1521))
                            (CONNECT_DATA = (SID = STUDENT)))";

        // let's try to log on using this string!

        $conn = oci_connect($username, $password, $db_conn_str);

        // exiting if can't log in

        if (! $conn)
        {
        ?>
            <p> Could not log into Oracle, sorry. </p>

          
</body>
</html>
            <?php
            exit;        
        }
       
        // if I get here -- I connected!!

        // set up a query and execute it!

        $pub_query = 'select title_name, sum(title_cost) '.
                      'from title '.
                      'group by title_name';
        $stmt = oci_parse($conn, $pub_query);
        oci_execute($stmt, OCI_DEFAULT);
        ?>

        <table>
        <caption> Title information </caption>
        <tr> <th scope="col"> Title Name </th>
             <th scope="col"> Sum for all Costs </th>
        </tr>

        <?php
        while (oci_fetch($stmt))
        {
            $curr_t_name = oci_result($stmt, "TITLE_NAME");
            $curr_t_cost = oci_result($stmt, "SUM(TITLE_COST)");
           

        ?>

            <tr> <td> <?= $curr_t_name ?> </td> 
                 <td> <?= $curr_t_cost ?> </td>

            </tr>

        <?php
        }
        ?>
        </table>

        <?php
        // FREE your statement, CLOSE your connection!

        oci_free_statement($stmt);
        oci_close($conn);
    }

   
?>  

</body>
</html>