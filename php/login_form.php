<?php
@include 'config.php';

session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $select = "SELECT * FROM user_form WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['name'];
            header('location:admin_page.php');
            exit();
        } elseif ($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['name'];
            header('location:user_page.php');
            exit();
        }
    } else {
        $error = 'Incorrect email or password!';
    }
}
?>

<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Email and Password Validation</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/form.css"/>

    <!-- Boxicons CSS -->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container">
      <header>Login</header>
      <form action="index.html">
        <div class="field email-field">
          <div class="input-field">
            <input type="email" placeholder="Enter your email" class="email" />
          </div>
          <span class="error email-error">
            <i class="bx bx-error-circle error-icon"></i>
            <p class="error-text">Please enter a valid email</p>
          </span>
        </div>
        <div class="field create-password">
          <div class="input-field">
            <input
              type="password"
              placeholder="Enter your password"
              class="password"
              id="password"
            />
            <i class="bx bx-hide show-hide" id="password-toggle"></i>
          </div>
          <span class="error password-error">
            <i class="bx bx-error-circle error-icon"></i>
            <p class="error-text">
              Please enter at least 8 characters with a number, symbol, small and
              capital letter.
            </p>
          </span>
        </div>
        <div class="input-field button">
          <input type="submit" value="Submit Now" />
        </div>
        <div class="signup-link">
          <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
      </form>
    </div>

    <!-- JavaScript -->
    <script src="js/login.js"></script>
  </body>
</html>

