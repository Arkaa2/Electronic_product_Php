<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    header("location:login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Arka</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-FQvAHLbOIVoXnJFcIsX6khoQA4DGJHA/zh27Rj0AxGSYcCdk6R9FTQhA6k17cCnm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="container">
    <h3 class="text-center mt-4 mb-5" style="color: blue;"><i class="fas fa-table"></i> Show all data</h3>
    <div class="text-end mb-3">
      <a class="btn btn-danger" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
    <table class="table table-striped table-bordered">
      <!-- ... rest of the code remains unchanged ... -->
      <thead class="table-success">
        <tr>
          <th scope="col">Sr. No</th>
          <th scope="col">Name</th>
          <th scope="col">Mobile</th>
          <th scope="col">Specification</th>
          <th scope="col">Mobile color</th>
          <th scope="col">Payment Terms</th>
          <th scope="col">Image</th>
          <th scope="col">Options</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $i = 0;
          $con = mysqli_connect("localhost", "root", "", "task_sayan");
          $sel = $con->prepare("SELECT * FROM std");
          $sel->execute();
          $rs = $sel->get_result();

          while ($row = $rs->fetch_assoc()) {
        ?>
          <tr>
            <td scope="row"><?php echo ++$i; ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['mobile']); ?></td>
            <td><?php echo htmlspecialchars($row['spec']); ?></td>
            <td><?php echo htmlspecialchars($row['color']); ?></td>
            <td><?php echo htmlspecialchars($row['pay']); ?></td>
            <td><img style="width: 100px;" src="upload/<?php echo htmlspecialchars($row['image']); ?>" alt=""></td>
            <td>
              <a class="btn btn-danger" href="del.php?id=<?php echo htmlspecialchars($row['c_id']); ?>" onclick="return confirm('Are you sure you want to delete?');"><i class="fa-solid fa-trash-can"></i> Delete</a>
              <a class="btn btn-primary" href="edt.php?id=<?php echo htmlspecialchars($row['c_id']); ?>" onclick="return confirm('Are you sure you want to edit?');"><i class="fas fa-edit"></i> Update</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

    <div class="text-center">
      <a class="btn btn-success" href="index.php"><i class="fas fa-plus"></i> Insert</a>
    </div>
  </div>
</body>
</html>











<table class="table table-striped table-bordered">
      
    </table>