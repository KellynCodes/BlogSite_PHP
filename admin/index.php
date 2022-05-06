<?php

include '../connection.php';


if (isset($_POST['submit'])){
    $headline = $_POST['headline'];
    $publisher = $_POST['publisher'];
    $body = $_POST['body'];
    $status = $_POST['status'];
    $dates = $_POST['dates'];
   

    //for iserting image to the database
    $featured_image = $_FILES['image'];


    $allowed = array('gif', 'png', 'jpeg', 'jpg', 'jiff', 'mp4');
     $filename = $_FILES['image']['name'];
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
     if (in_array($ext, $allowed)){
         $location = "../uploads/".$filename;
         move_uploaded_file($_FILES['image']['tmp_name'], $location);

         $mydatabase = "INSERT INTO admin(headline,publisher,body,status,dates,image) values('$headline', '$publisher', 
         '$body', '$status', '$dates', '$filename')";

         $execute = mysqli_query($conn,$mydatabase) or die (mysqli_error($conn));

         if($execute){
           $msg = 'Successfully uploaded blog news';
            $msgtype = "success";
         }
     }
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="../bootstrap.min.css">

</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 shadow mt-5 rounded-curve  ">
            <h1 class="mb-3">Admin section for loading news </h1>

            <form method="post" enctype="multipart/form-data">
                <div class="alert alert-<?php echo $msgtype ?>"><?php echo $msg ?></div>
                <label for="">Headline</label>
                <input type="text" name="headline" class="form-control mb-3" required>
                <label for="">Publisher</label>
                <input type="text" name="publisher" class="form-control mb-3" required>
                <label for="">image</label>
                <input type="file" name="image" class="form-control mb-3" required>

                    <!-- hidden input start -->
                    <input type="hidden" name="status" value="active">
                    <input type="hidden" name="dates" value="<?php echo date("Y.m.d: h.m.s") ?>">


                <label for="">Body</label>
                <textarea name="body" rows="5" placeholder="start typing..."  class="form-control mb-5" required></textarea>
            <input type="submit" value="Submit" name="submit" class="form-control bg-primary text-white">

            </form>
        </div>
    </div>
</div>


    <script src="./bootstrap.bundle.min.js"></script>
</body>
</html>