<?php
@include 'config.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM user_form WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'User already exists!';
    } else {
        if($password != $cpassword){
            $error[] = 'Passwords do not match!';
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$hashed_password','$user_type')";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
            exit();
        }
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
    <link rel="stylesheet" href="css/form.css" />

    <!-- Boxicons CSS -->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container">
      <header>Signup</header>
      <form action="login.html">
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
              placeholder="Create password"
              class="password"
            />
            <i class="bx bx-hide show-hide"></i>
          </div>
          <span class="error password-error">
            <i class="bx bx-error-circle error-icon"></i>
            <p class="error-text">
              Please enter at least 8 characters with a number, symbol, small and
              capital letter.
            </p>
          </span>
        </div>
        <div class="field confirm-password">
          <div class="input-field">
            <input
              type="password"
              placeholder="Confirm password"
              class="cPassword"
            />
            <i class="bx bx-hide show-hide"></i>
          </div>
          <span class="error cPassword-error">
            <i class="bx bx-error-circle error-icon"></i>
            <p class="error-text">Password don't match</p>
          </span>
        </div>
        <div class="input-field button">
          <input type="submit" value="Submit Now" />
        </div>
        <div class="login-link">
          <p>Already have an account? <a href="login_form.php">Login</a></p>
        </div>
      </form>
    </div>

    <!-- JavaScript -->
    <script src="js/form.js"></script>
  </body>
</html>