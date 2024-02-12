<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Electronics Product</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container-fluid {
      margin-top: 50px;
    }
    h2 {
      color: #198754;
      text-align: center;
      margin-bottom: 30px;
    }
    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    label {
      font-weight: bold;
    }
    input[type="text"], input[type="file"], select {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      box-sizing: border-box;
    }
    .btn-success, .btn-warning, .btn-danger {
      width: 45%; /* Decreased button width */
      font-size: 14px;
    }
    img {
      width: 100px;
      border-radius: 5px;
      margin-top: 10px;
    }
    .btn-danger {
      font-size: 12px;
    }
  </style>
</head>
<body>
<?php
$con = mysqli_connect("localhost","root","","task_sayan");

$id= $_GET['id'];

$sel="SELECT * FROM std WHERE c_id='$id'";
$rs=$con->query($sel);
$row=$rs->fetch_assoc();

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="text-center m-4"><i class="bi bi-pencil-square"></i> Update Electronics Product</h2>
        </div>
    
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <form action="upd.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['c_id']; ?>">
            <p><i class="bi bi-person"></i> Name:
           <input type="text" name="name" placeholder="Write your name" value="<?php echo $row['name']; ?>"></p>

            <p><i class="bi bi-phone"></i> Mobile Choose:
                <select name="mobile" id="">
                    <option value="">-Choose Any One-</option>
                    <option <?php if($row['mobile'] == "Apple" ){ echo "selected";} ?> value="Apple">Apple</option>
                    <option <?php if($row['mobile'] == "Lg" ){ echo "selected";} ?> value="Lg">Lg</option>
                    <option <?php if($row['mobile'] == "MI" ){ echo "selected";} ?> value="MI">MI</option>
                </select>
            </p>
            
            <p><i class="bi bi-laptop"></i> Specification:
                <input <?php if($row['spec'] == "4Gb" ){ echo "checked";} ?> type="radio" name="spec" value="4Gb">4Gb
                <input <?php if($row['spec'] == "16gb" ){ echo "checked";} ?> type="radio" name="spec" value="16gb">16gb
                <input <?php if($row['spec'] == "32gb" ){ echo "checked";} ?> type="radio" name="spec" value="32gb">32gb
                
            </p>

            <p><i class="bi bi-palette"></i> Customized Color:
                <input type="text" name="color" value="<?php echo $row['color']; ?>" >
            </p>

            <?php 
                 $subarr= explode(",",$row['pay']);
            ?>

            <p><i class="bi bi-credit-card"></i> Payment Terms:
                <input <?php if(in_array("Cash",$subarr)) {echo "checked";} ?> type="checkbox" name="pay[]" id="" value="Cash">Cash
                <input <?php if(in_array("Upi",$subarr)) {echo "checked";} ?> type="checkbox" name="pay[]" id="" value="Upi">Upi
                <input <?php if(in_array("Card",$subarr)) {echo "checked";} ?> type="checkbox" name="pay[]" id="" value="Card">Card
            </p>

            <p><i class="bi bi-file-earmark-image"></i> Upload Your Image:
                <input type="file" name="img" id="">
            </p>

            <p><img src="upload/<?php echo $row['image']; ?>" alt=""></p>

            <p>
                <input class="btn btn-success" type="submit" name="submit" value="Update"> &nbsp;
                <input class="btn btn-warning" type="reset" name="reset" value="Reset"> 
                <!-- <a class="btn btn-danger" href="delete.php?id=<?php echo $row['c_id']; ?>" role="button">Delete</a> -->
            </p>

            
        </form>
    </div>
    <div class="col-sm-4"></div>
    
</div>
</div>
</body>
</html>
