<?php
    require('../config/database.php');

    session_start();

    if (!isset($_SESSION['session_user_id']) ) {
        header("refresh:0;url=error_403.html");
        return;
    }

    // Step 2: Get data or params
    $user_id = $_SESSION['session_user_id'];

    // Step 3: Prepare query
    $sql_get_user = "select * from users where id = '$user_id'";

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
    <link rel="icon" href="icons/carro-de-la-compra.png" type="image/png">
    <title>Marketapp - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    .user-icon {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 50%;
      margin-left: -14px;
    }
  </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><b>Market-App</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="signup.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list_users.php">List users</a>
                </li>
            </ul>
        </div>
            <a class="navbar-brand"><b><?php echo $_SESSION['session_user_fullname'];?></b></a>
            <div class="btn-group dropstart" style="width: 3rem; height: 3rem; ">
            <button type="button" 
                class="btn dropdown-toggle p-1" 
                data-bs-toggle="dropdown" 
                aria-expanded="false"
                style="width: 100%; height: 100%; border-radius: 50%; overflow: hidden;">
                <img src="images/<?php echo $photo ?>" alt="User icon" class="user-icon">
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <?php
                    echo "
                        <li><a class='dropdown-item' href='change_photo_form.php?userId=". $_SESSION['session_user_id'] ."'>Change photo</a></li>
                        <li><a class='dropdown-item' href='edit_user_form.php?userId=". $_SESSION['session_user_id'] ."'>Edit profile</a></li>
                        <li><a class='dropdown-item' href='logout.php'>Logout</a></li>
                    ";
                ?>
            </ul>
            </div>
        </div>
    </nav>
</body>
</html>