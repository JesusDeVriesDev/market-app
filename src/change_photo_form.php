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
    $photo = $row['photo'] ?? 'User-icon.jpg';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>    
    <form name="change-photo-form" action="set_photo_user.php" method="post">  
        <table align="center">
            <tr><td><input type="hidden" name="userId" value="<?php echo $user_id ?>" readonly required></td></tr>
            <tr><td><center><label>Your photo:</label></center></td></tr>
            <center><img src="images/<?php echo $photo ?>" alt="User-icon" width="5%"></center>
            <tr><td><center><label>Select other photo:</label></center></td></tr>
            <tr><td style="text-align: center;">
                <button type="submit" name="photoId" value="dog.png" class="photo-btn">
                    <img src="images/dog.png" alt="Dog Icon" width="64" height="64">
                </button>
                <button type="submit" name="photoId" value="cat.png" class="photo-btn">
                    <img src="images/cat.png" alt="Cat Icon" width="64" height="64">
                </button>
                <button type="submit" name="photoId" value="pony.png" class="photo-btn">
                    <img src="images/pony.png" alt="Pony Icon" width="64" height="64">
                </button>
                <button type="submit" name="photoId" value="User-icon.jpg" class="photo-btn">
                    <img src="images/User-icon.jpg" alt="User icon" width="64" height="64">
                </button>
            </td></tr>
        </table>
    </form>
</body>
</html>