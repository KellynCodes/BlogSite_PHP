
<?php include '../connection.php';

if (isset ($_POST['delete'])){
    $id = $_POST['id'];

}

$mydatabase1 = "DELETE FROM admin where id = '$id'";

$exe = mysqli_query($conn, $mydatabase1) or die (mysqli_error($conn));

if ($exe){
    $msg = 'You have successfully deleted this news';
    $msgtype = 'success';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link rel="stylesheet" href="../bootstrap.min.css">
</head>
<body>
    

<div class="container">
  <h2>Striped Rows</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>SN</th>
        <th>HEADLINE</th>
        <th>PUBLISHER</th>
        <th>IMAGE</th>
        <th>BODY</th>
        <th>STATUS</th>
      </tr>
    </thead>
    <tbody>

<?php 

$sn = 0;

$mydatabase = "SELECT * FROM admin";

$exe = mysqli_query($conn, $mydatabase) or die (mysqli_error($conn));

while ($row = mysqli_fetch_array($exe)){
    $id = $row['id'];
    $headline = $row['headline'];
    $publisher = $row['publisher'];
    $body = $row['body'];
    $status = $row['status'];
    $dates = $row['dates'];
    $image = $row['image'];

  ?>


      <tr>
        <td><?php echo $sn++ ?></td>
        <td><?php echo $headline ?></td>
        <td><?php echo $publisher ?></td>
        <td><?php echo $image ?></td>
        <td><?php echo $dates ?></td>
        <td><?php echo $body ?></td>
        <td><?php echo $status ?></td>
        <td>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php $id ?> ">
                <button class="btn btn-danger" name="delete">Delete</button>
            </form>
        </td>
        
        <?php } ?>

      </tr>
      <tr>
       
    </tbody>
  </table>
</div>


<script src="../bootstrap.bundle.min.js"></script>
</body>
</html>