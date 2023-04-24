<!DOCTYPE html>
<!--
This is the HTML code for the login and registration page of the Stocks App.
-->
<html>

<head>
  <title>Stocks App - Login/Register</title>
  <!-- Link to the login page stylesheet -->
  <link rel="stylesheet" type="text/css" href="/assets/css/loginpage.css">
</head>

<body>
  <!-- Container for the login and registration form -->
  <div class="container">
    <!-- Main heading of the page -->
    <h1>Stocks App</h1>
    <!-- Container for the login form -->
    <div class="form-container">
      <!-- Heading for the login form -->
      <h2>Login</h2>
      <!-- Form for logging in -->
      <form action="/User/loggedin" method="post">
        <!-- Input field for email -->
        <input type="email" name="email" placeholder="Email" required>
        <!-- Input field for password -->
        <input type="password" name="password" placeholder="Password" required>
        <!-- Submit button for logging in -->
        <button type="submit">Login</button>
      </form>
    </div>
    <!-- Container for the registration form -->
    <div class="form-container">
      <!-- Heading for the registration form -->
      <h2>Register</h2>
      <!-- Form for registering -->
      <form action="/User/register" method="post">
        <!-- Input field for username -->
        <input type="text" name="username" placeholder="Username" required>
        <!-- Input field for email -->
        <input type="email" name="email" placeholder="Email" required>
        <!-- Input field for password -->
        <input type="password" name="password" placeholder="Password" required>
        <!-- Submit button for registering -->
        <button type="submit">Register</button>
      </form>
    </div>
  </div>
</body>

</html>