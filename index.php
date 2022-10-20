<?php
include 'includes/config.inc.php';
include 'includes/session.inc.php';
include 'includes/functions.inc.php';


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CarZappy - Car Services</title>
    <?php include 'includes/head.php';?>
</head>
<body>
<?php include 'includes/navbar.php';?>

<section class="">
<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="assests/img/hero1.png" class="d-block mx-lg-auto img-fluid" alt="CarZappy" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="fw-bold lh-1 mb-3">Car<span class="theme-font">Zappy</span> <span class="fs-3">Gets you Covered</span></h1>
        <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus dolore architecto, labore eveniet consequatur placeat cum, quaerat pariatur quasi asperiores corrupti ratione, temporibus dignissimos consequuntur deleniti! Dicta in sapiente rerum error perspiciatis adipisci, expedita nostrum earum exercitationem nemo fugiat!</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          
        </div>
      </div>
    </div>
  </div>
</section>






<?php 

if(isset($_GET['msg'])){
  $alertMSG = $_GET['msg'];
}

if($alertMSG == 'account-created'){
  show_alert("success","Account has been created successfully");
}elseif($alertMSG == 'invalid'){
  show_alert("","Verification URL is Invalid");
}elseif($alertMSG == 'sent'){
  show_alert("success","Your messaged has been sent.");
}elseif($alertMSG == 'logout'){
  show_alert("info","Your account has been logout");
}
else{
  echo "";
}


include 'includes/footer.php';
?>

</body>
</html>