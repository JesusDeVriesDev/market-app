<?php
    require('../config/database.php');
    $query = "
    SELECT id, name FROM cities WHERE status = true
    ";
    $query2 = "
    SELECT id, name FROM cities WHERE status = true
    ";
$cities = pg_query($conn_supa, $query);
$cities2 = pg_query($conn_supa, $query2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market - Register</title>
    <link rel="icon" href="icons/carro-de-la-compra.png" type="image/png">
</head>
<body>
    <center><h1>Register Form</h1></center>
    <form name="register-form" action="signup1.php" method="post">
        <table align="center">
            <tr><td><label>Firstname:</label></td></tr>
            <tr><td><input type="text" name="fname" placeholder="Firstname" required></td></tr>
            <tr><td><label>Lastname:</label></td></tr>
            <tr><td><input type="text" name="lname" placeholder="Lastname" required></td></tr>
            <tr><td><label>Adress:</label></td></tr>
            <tr><td><input type="text" name="adress" placeholder="Adress" required></td></tr>
            <tr><td><label>Mobile number:</label></td></tr>
            <tr><td><input type="text" name="mnumber" placeholder="Mobile phone" required></td></tr>
            <tr><td><label>Identification number:</label></td></tr>
            <tr><td><input type="text" name="idenumber" placeholder="Identification number" required></td></tr>
            <tr><td><label>Email:</label></td></tr>
            <tr><td><input type="email" name="email" placeholder="Email" required></td></tr>
            <tr><td><label>Password:</label></td></tr>
            <tr><td><input type="password" name="passwd" placeholder="Password" required><br></td></tr>
            <tr><td><label>Birth city:</label></td></tr>
            <tr><td>
                <select name="id_city_birthday" required>
                    <?php while ($row = pg_fetch_assoc($cities)): ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['name']); ?></option>
                    <?php endwhile; ?>
                </select>
            </td></tr>
            <tr><td><label>City document:</label></td></tr>
            <tr><td>
                <select name="id_city_document" required>
                    <?php while ($row = pg_fetch_assoc($cities2)): ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['name']); ?></option>
                    <?php endwhile; ?>
                </select>
            </td></tr>
            <tr><td><center><button style="background-color: rgb(240, 121, 119); margin-top: 1ex; margin-bottom: 1ex;">Register</button></center></td></tr>
            <tr><td style="text-align: center;">
                <img src="icons/google.png" alt="Google Icon" width="24" height="24" style="margin-right: 8px;">
                <img src="icons/facebook.png" alt="Facebook Icon" width="24" height="24" style="margin-right: 8px;">
                <img src="icons/github.png" alt="GitHub Icon" width="24" height="24">
            </td></tr>
            <tr><td><center><a href="signin.html" style="color:royalblue; text-decoration: underline;">I already have an account</a></center></td></tr>
        </table>
    </form>
</body>
</html>