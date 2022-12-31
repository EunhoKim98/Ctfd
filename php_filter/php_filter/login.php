<?php
//아이디를 prag_match를 통해 막았을 때, admin을 hex로 넣으면 성공
// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Get the username and password from the form
  $username = $_POST['username'];
  $password = $_POST['password'];

  if(preg_match("/\*|\/|=|admin|-|#|;/i",$_POST['username'])) exit("no hack");

  // Check if the username and password are correct
  if ($username == ' 0x61646d696e' && $password == 'admin') {
    // If the username and password are correct, set a session variable
    session_start();
    $_SESSION['logged_in'] = true;

    // Redirect the user to the protected page
    header('Location: ./flag.php');
    exit;
  } else {
    // If the username and password are incorrect, show an error message
    $error = 'Invalid username or password';
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Administrator Login</title>
</head>
<body>
  <?php if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
  <?php endif; ?>
  <form method="post">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Submit" name="submit">
  </form> 
</body>
</html>
