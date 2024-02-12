<?php
session_start();
if(isset($_SESSION['admin_name'])){
  header("location:show.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-FQvAHLbOIVoXnJFcIsX6khoQA4DGJHA/zh27Rj0AxGSYcCdk6R9FTQhA6k17cCnm" crossorigin="anonymous">
</head>
<body style="background-color: #f8f9fa;">

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h3 class="text-center"><i class="fas fa-sign-in-alt"></i> Login</h3>
          </div>
          <div class="card-body">

            <?php if (isset($error_msg) && !empty($error_msg)) { ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $error_msg; ?>
              </div>
            <?php } ?>

            <?php if(!isset($_SESSION['admin_name'])) { ?>
              <form action="lch.php" method="post">

                <div class="mb-3">
                  <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email:</label>
                  <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label"><i class="fas fa-lock"></i> Password:</label>
                  <input type="password" name="password" class="form-control" required>
                </div>

                <div class="d-grid">
                  <button type="submit" name="submit" value="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</button>
                </div>
              </form>
            <?php } else { ?>
              <div class="alert alert-info" role="alert">
                You are already logged in as <?php echo $_SESSION['admin_name']; ?>. <a href="logout.php" class="alert-link">Logout</a>
              </div>
            <?php } ?>
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-eMNha2AJRpU/pVcGRd1ZNScqAu2uDjbg1CPK5f5qhz2xLZ7q6Mz2d6UqVv1t9Wbi" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>
