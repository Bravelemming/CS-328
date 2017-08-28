<!--

//Halie Carton  Jack Daniel Kinne
//3.10.17
// here:  http://nrs-projects.humboldt.edu/~drk10/lab8/oracle-test.php
-->
<!DOCTYPE html>
<html>

<head>
    <title> CS 328 lab 8 </title>
    <meta charset="utf-8" />

    <link href="http://users.humboldt.edu/smtuttle/styles/normalize.css" 
          type="text/css" rel="stylesheet" />

    <link href="oracle-test.css" type="text/css" rel="stylesheet" />

</head> 

<body>

<h1> Halie Carton and Jack Daniel Kinne </h1>
<h2>CS 328 lab 8</h2>
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

        $pub_query = 'select pub_name, pub_city, '.
                      'pub_id '.
                      'from publisher';
        $stmt = oci_parse($conn, $pub_query);
        oci_execute($stmt, OCI_DEFAULT);
        ?>

        <table>
        <caption> Publisher information </caption>
        <tr> <th scope="col"> Publisher Name </th>
             <th scope="col"> Publisher City </th>
             <th scope="col"> Publisher ID </th>
        </tr>

        <?php
        while (oci_fetch($stmt))
        {
            $curr_p_name = oci_result($stmt, "PUB_NAME");
            $curr_p_city = oci_result($stmt, "PUB_CITY");
            $curr_p_id = oci_result($stmt, "PUB_ID");
           

        ?>

            <tr> <td> <?= $curr_p_name ?> </td> 
                 <td> <?= $curr_p_city ?> </td>
                 <td> <?= $curr_p_id ?> </td>

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