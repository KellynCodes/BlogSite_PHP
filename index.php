
<?php

include 'connection.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My bog site</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    
</head>

<style>
    a{
        text-decoration: none;
    }

    a:hover{
        color: darkcyan;
        text-decoration: underline;
    }

</style>


<body class="container-fluid">
    
<div class="container shadow-lg p-2 justify-content-center">
    <marquee behavior=""  direction="horizontal">
        <h1>News and media Entertainment blog site</h1>
    </marquee>
</div>

<?php

$mydatabase = "SELECT * from admin where status = 'active'";

$execute = mysqli_query($conn,$mydatabase) or die (mysqli_error($conn));

 while($row = mysqli_fetch_array($execute)){
     $id = $row['id'];
    $headline = $row['headline'];
    $publisher = $row['publisher'];
    $body = $row['body'];
    $status = $row['status'];
    $dates = $row['dates'];
    $image = $row['image'];

?>

<div class="container shadow mt-5">
    <a href="blog_details.php?details=&&id=<?php echo $id ?>">
        <div class="row">
            <div class="col-md-4">
                <img src="uploads/<?php echo $image ?>" height="200" width="200" style="opacity: 1" alt="">
                <small>Author <?php echo $publisher ?> <span class="ms-4"> <?php echo $dates ?> </span> </small>
            </div>

            <div class="col-md-6">
                <h2 class="mb-2"><?php echo $headline ?></h2>
                <p>  <?php echo $body ?> </p>
            </div>

        </div>
    </a>
</div>

<?php } ?>

    <script src="bootstrap.bundle.min.js"></script>
</body>
</html>