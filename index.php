<?php
  session_start();
  if(!isset($_SESSION['admin_name'])){
    header("location:login.php");
  }
?>

<style>
  body{
    
  }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attractive Bootstrap Site</title>

  <!-- <style>
    body {
      background-image: url('https://images.unsplash.com/photo-1707420331839-4a55be7a1eb0?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
      background-size: cover;
      background-position: center;
      height: 100vh;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
    }

    .container-fluid {
      background-color: rgba(0, 0, 0, 0.7); /* Add a semi-transparent background color for better text readability */
      padding: 20px;
      border-radius: 10px;
    }
  </style> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-FQvAHLbOIVoXnJFcIsX6khoQA4DGJHA/zh27Rj0AxGSYcCdk6R9FTQhA6k17cCnm" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <!-- <img src="https://images.unsplash.com/photo-1707420331839-4a55be7a1eb0?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""> -->
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><i class="fa-solid fa-spider"></i></a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <?php
              // Check if the user is logged in
              if(isset($_SESSION['admin_name'])) {
            ?>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>


    <!-- Image Section -->
    <!-- <div class="row justify-content-center mt-5">
      <div class="col-sm-8">
        <img src="https://images.unsplash.com/photo-1707420331839-4a55be7a1eb0?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid" alt="Attractive Image">
      </div>
    </div> -->


    <div class="row justify-content-center mt-5">
    <div class="col-sm-8">
        <div class="card">
          <div class="card-header bg-success text-white">
            <h2 class="text-center"><i class="fas fa-mobile-alt"></i> Electronics Product</h2>
          </div>
          <div class="card-body">
            <form action="db.php" method="post" enctype="multipart/form-data">
              <label for="name" class="form-label"><i class="fas fa-user"></i> Name:</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Write your name">

              <label for="mobile" class="form-label"><i class="fas fa-mobile"></i> Mobile Choose:</label>
              <select name="mobile" id="mobile" class="form-select">
                <option value="">-Choose Any One-</option>
                <option value="Apple">Apple</option>
                <option value="Lg">Lg</option>
                <option value="MI">MI</option>
              </select>

              <label class="form-label"><i class="fas fa-cogs"></i> Specification:</label>
              <div class="form-check">
                <input type="radio" name="spec" value="4Gb" class="form-check-input">
                <label class="form-check-label">4Gb</label>
              </div>
              <div class="form-check">
                <input type="radio" name="spec" value="16gb" class="form-check-input">
                <label class="form-check-label">16gb</label>
              </div>
              <div class="form-check">
                <input type="radio" name="spec" value="32gb" class="form-check-input">
                <label class="form-check-label">32gb</label>
              </div>

              <label for="color" class="form-label"><i class="fas fa-paint-brush"></i> Customized Color:</label>
              <input type="text" name="color" id="color" class="form-control" value="">

              <label for="img" class="form-label"><i class="fas fa-file-image"></i> Choose your file:</label>
              <input type="file" name="img" id="img" class="form-control">

              <label class="form-label"><i class="fas fa-money-bill"></i> Payment Terms:</label>
              <div class="form-check">
                <input type="checkbox" name="pay[]" id="cash" value="Cash" class="form-check-input">
                <label class="form-check-label">Cash</label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="pay[]" id="upi" value="Upi" class="form-check-input">
                <label class="form-check-label">Upi</label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="pay[]" id="card" value="Card" class="form-check-input">
                <label class="form-check-label">Card</label>
              </div>

              <p>
                <button class="btn btn-success" type="submit" name="submit"><i class="fas fa-check"></i> Submit</button> &nbsp;
                <button class="btn btn-primary" type="reset" name="reset"><i class="fas fa-sync-alt"></i> Reset</button>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
    




