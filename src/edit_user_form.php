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

    $row = pg_fetch_assoc($result);
    $ide_number = $row['ide_number'];
    $fname = $row['firstname'];
    $lname = $row['lastname'];
    $adress = $row['adress'];
    $mobile_number = $row['mobile_number'];
    $ide_number = $row['ide_number'];
    $email = $row['email'];
    $id_city_birthday = $row['id_city_birthday'];
    $id_city_document = $row['id_city_document'];

    $query = "
        SELECT id, name FROM cities WHERE status = true
    ";
    $query2 = "
        SELECT id, name FROM cities WHERE status = true
    ";
    $cities = pg_query($conn_local, $query);
    $cities2 = pg_query($conn_local, $query2);
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
            <tr>
                <td><input type="hidden" name="userId" value="<?php echo $user_id ?>" readonly required></td>
            </tr>
            <tr><td><label>Firstname:</label></td></tr>
            <tr><td><input type="text" name="fname" value="<?php echo $fname ?>" required></td></tr>
            <tr><td><label>Lastname:</label></td></tr>
            <tr><td><input type="text" name="lname" value="<?php echo $lname ?>" required></td></tr>
            <tr><td><label>Address:</label></td></tr>
            <tr><td><input type="text" name="adress" value="<?php echo $adress ?>" placeholder="Address" required></td></tr>
            <tr><td><label>Mobile number:</label></td></tr>
            <tr><td><input type="text" name="mnumber" value="<?php echo $mobile_number ?>" placeholder="Mobile phone" required></td></tr>
            <tr><td><label>Identification number:</label></td></tr>
            <tr><td><input type="text" name="idenumber" value="<?php echo $ide_number ?>" readonly required></td></tr>
            <tr><td><label>Email:</label></td></tr>
            <tr><td><input type="email" name="email" value="<?php echo $email ?>" placeholder="Email" required></td></tr>
            <tr><td><label>Birth city:</label></td></tr>
            <tr>
                <td>
                    <select name="id_city_birthday" required>
                        <?php while ($row = pg_fetch_assoc($cities)): ?>
                            <option value="<?php echo $row['id']; ?>" 
                                <?php echo ($row['id'] == $id_city_birthday) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($row['name']); ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr><td><label>City document:</label></td></tr>
            <tr>
                <td>
                    <select name="id_city_document" required>
                        <?php while ($row = pg_fetch_assoc($cities2)): ?>
                            <option value="<?php echo $row['id']; ?>" 
                                <?php echo ($row['id'] == $id_city_document) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($row['name']); ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr><td><center><button style="background-color: rgb(240, 121, 119); margin-top: 1ex; margin-bottom: 1ex;">Update information</button></center></td></tr>
            <tr><td><center><a href="change_photo_form.php?userId=<?php echo $user_id ?>" style="color:royalblue; text-decoration: underline;">Change photo</a></center></td></tr>
        </table>
    </form>
</body>
</html>