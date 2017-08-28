<!--

//Halie Carton  Jack Daniel Kinne
//3.10.17
// here:  http://nrs-projects.humboldt.edu/~drk10/lab8/reward-empl.php
-->
<!DOCTYPE html>
<html>

<head>
    <title> CS 328 lab 8 problem 2</title>
    <meta charset="utf-8" />

    <link href="http://users.humboldt.edu/smtuttle/styles/normalize.css" 
          type="text/css" rel="stylesheet" />

    <link href="oracle-test.css" type="text/css" rel="stylesheet" />

</head> 

<body>

<h1> Halie Carton and Jack Daniel Kinne </h1>
<h2>CS 328 lab 8 problem 2</h2>
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

        <fieldset>
                <legend> Enter last name and raise amount </legend>

                <label for="last_name"> Employee Last Name: </label>
                <input type="text" name="last_name" id="last_name" 
                       required="required" />

                <label for="raise_amount"> Raise amount: </label>
                <input type="number" name="raise_amount" id="raise_amount" 
                       required="required" />
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

        $last = strip_tags($_POST['last_name']);
        $raise = strip_tags($_POST['raise_amount']);


        $update_string = 'update empl  
                         set salary = salary + :raise 
                         where empl_last_name = :last';


    
        $update_stmt = oci_parse($conn, $update_string);

        oci_bind_by_name($update_stmt, ":raise", $raise);
        oci_bind_by_name($update_stmt, ":last", $last);



//to do: fix this below

        $num_updated = oci_execute($update_stmt, OCI_DEFAULT);
        


        if ($num_updated != 1)
                {
                    ?>
                    <p> SORRY, no row updated! </p>
                    <?php
                }
                else
                {
                    ?>
                    <p> 1 row updated! </p>
                    <?php
                    
                    // so now I am happy to commit!

                     oci_commit($conn);
                }
        ?>

        <?php
        // FREE your statement, CLOSE your connection!

        oci_free_statement($stmt);
        oci_close($conn);
    } // this closes else

   
?>  

</body>
</html>