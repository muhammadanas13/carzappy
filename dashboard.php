<?php
include 'includes/config.inc.php';
include 'includes/session.inc.php';
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - CarZappy</title>
    <?php include 'includes/head.php';?>
</head>
<body>
<?php include 'includes/navbar.php';?>
<div class="container text-center">
  <h1 class="display-5 py-3">Welcome <span class="theme-font"><?php echo $_SESSION['u_name'];?> </span></h1>
  <img src="assests/img/dashboard.png" width=400>
</div>

<?php include 'includes/footer.php';?>

</body>
</html>