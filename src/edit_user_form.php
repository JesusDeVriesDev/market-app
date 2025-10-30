<?php
    // Step 1: Get database access
    require('../config/database.php');

    // Step 2: Get data or params
    $user_id = $_GET['userId'];

    // Step 3: Prepare query
    $sql_get_user = "select * from users where id = $user_id";

    //Step 4: Execute query
    $result = pg_query($conn_local, $sql_get_user);
    if (!$result) {
        die("Error: ". pg_last_error());
    }

    while($row = pg_fetch_assoc($result)) {
        $ide_number = $row['ide_number'];
        $fname = $row['firstname'];
        $lname = $row['lastname'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form name="edit-user-form" action="update_user.php" method="post">
    
        <table align="center">
            <tr><td><input type="hidden" name="userId" value="<?php echo $user_id ?>" readonly required></td></tr>
            <tr><td><label>Identification number:</label></td></tr>
            <tr><td><input type="text" name="idenumber" value="<?php echo $ide_number ?>" readonly required></td></tr>
            <tr><td><label>Firstname:</label></td></tr>
            <tr><td><input type="text" name="fname" value="<?php echo $fname ?>" required></td></tr>
            <tr><td><label>Lastname:</label></td></tr>
            <tr><td><input type="text" name="lname" value="<?php echo $lname ?>" required></td></tr>
            <tr><td><center><button style="background-color: rgb(240, 121, 119); margin-top: 1ex; margin-bottom: 1ex;">Update User</button></center></td></tr>
        </table>
    </form>
</body>
</html>