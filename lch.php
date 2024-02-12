<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $con = mysqli_connect("localhost", "root", "", "task_sayan");
    $a = $_POST['email'];
    $b = $_POST['password'];
    $sel = "SELECT * FROM admin WHERE email='$a'  and password='$b'";
    $rs = $con->query($sel);

    if ($rs->num_rows > 0) {
        $row = $rs->fetch_assoc();
        $_SESSION['admin_name'] = $row['name'];
        header("location:show.php");
        exit();
    } else {
        $error_msg = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h3 class="text-center mt-4 mb-4">Login</h3>

    <?php if (isset($error_msg) && !empty($error_msg)) { ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $error_msg; ?>
      </div>
    <?php } ?>

    <form action="lch.php" method="post">

      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <button type="submit" name="submit" value="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
</body>
</html>
