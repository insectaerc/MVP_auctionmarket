<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
<?php
if($_SESSION["email"]) {
?>
Welcome <?php echo $_SESSION["email"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.
<?php
}else echo "<h1>Please login first .</h1>";
?>

    <?php 
        include 'mvc/views/frontend/nav.php';
    ?>

<h1 align="center"> List of Customers </h1>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Email</th>
      <th scope="col">Name</th>
      <th scope="col">Password</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php // VỊ TRÍ 02: CODE HIỂN THỊ NGƯỜI DÙNG ?>
        <?php foreach ($data as $entry){ ?>
        <tr>
            <td><?php echo $entry['admin_id']; ?></td>
            <td><?php echo $entry['email']; ?></td>
            <td><?php echo $entry['admin_name']; ?></td>
            <td><?php echo $entry['password']; ?></td>
            <td>   
                <label class="btn btn-outline-primary" for="btnradio1">Delete</label>
                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" >
                <label class="btn btn-outline-primary" for="btnradio2">Edit</label> </td>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</body>

</html>