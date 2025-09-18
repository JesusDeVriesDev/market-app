<?php
    //Step 1. Get database connection
    require('../config/database.php');
    //Step 2. Get form data
    $e_mail = $_POST['email'];
    $p_wd = $_POST['passwd'];

    //Step 3.
    $sql_check_user = "
        SELECT
	        u.email,
	        u.password
        FROM
	        users u
        WHERE
	        u.email = '$e_mail' and 
	        u.password = '$p_wd'
        LIMIT 1
    ";

    //Step 4. Execute query
    $res_check = pg_query($conn, $sql_check_user);

    if (pg_num_rows($res_check) > 0) {
        echo "User exist. Go to main page !!!!";
    } else {
        echo "Verify data";
    }
?>