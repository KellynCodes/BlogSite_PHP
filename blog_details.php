
<?php include 'connection.php';

if(isset($_GET['details'])){
    $id = $_GET['id'];

    $mydatabase = "SELECT * FROM admin where id = '$id'";

    $execute = mysqli_query($conn,$mydatabase) or die (mysqli_error($conn));

    while($row = mysqli_fetch_array($execute)){
        $headline = $row['headline'];
        $publisher = $row['publisher'];
        $image = $row['image'];
        $body = $row['body'];
        $dates = $row['dates'];

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog details</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    
<div class="container mt-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <img src="uploads/<?php echo $image ?>" wdith="100%" height="300" class="mb-4" alt="">

            <small class="mb-3">Author: <?php echo $publisher ?> <span>Date: </span></small>

            <h1 class="mb-3"> <?php echo $headline ?></h1>
        </div>
    </div>
</div>

<script src="bootstrap.bundle.min.js"></script>
</body>
</html>