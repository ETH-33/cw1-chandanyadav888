<?php
@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
    exit;
}

// Additional admin panel functionality can be added here

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="php/css/panel.css">

</head>
<body>

<div class="container">

    <div class="content">
        <h3>Hi, <span>Admin</span></h3>
        <h1>Welcome <span><?php echo $_SESSION['admin_name']; ?></span></h1>
        <p>This is the admin panel.</p>
        <!-- Add your admin panel content and functionality here -->
        <a href="manage_users.php" class="btn">Manage Users</a>
        <a href="manage_products.php" class="btn">Manage Comics</a>
        <a href="logout.php" class="btn">Logout</a>
    </div>

</div>

</body>
</html>
