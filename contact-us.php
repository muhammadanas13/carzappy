<?php
include 'includes/config.inc.php';
include 'includes/session.inc.php';
include 'includes/functions.inc.php';


if(isset($_POST['submit'])){
    
    $name = sql_injection_filter($conn,$_POST['name']);
    $email = sql_injection_filter($conn,$_POST['email']);
    $mobile = sql_injection_filter($conn,$_POST['mobile']);
    $subject = sql_injection_filter($conn,$_POST['subject']);
    $message = sql_injection_filter($conn,$_POST['message']);
    
    $insertquery ="insert into ticket(name,email,mobile,subject,message) values ('$name','$email','$mobile','$subject','$message')";  
    $exe_query = mysqli_query($conn,$insertquery);
    if($exe_query){
        redirect('/?=sent');
    }


}


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - CarZappy</title>
    <?php include 'includes/head.php';?>
</head>
<body>
<?php include 'includes/navbar.php';?>


<div class="container d-flex justify-content-center">
    <div class="px-5 py-5 w-100">
        
          <h4>Feel Free to contact us</h4> 
        
        <form method="post" action="">
        <div class="row py-3">
            <div class="col-md-6"> <input type="text" name="name" class="form-control" placeholder="Name" /> </div>
            <div class="col-md-6"> <input type="text" name="mobile" class="form-control" placeholder="Mobile" /> </div>
        </div>
        <div class="row my-3">
            <div class="col-md-6"> <input type="email" name="email" class="form-control" placeholder="Email" /> </div>
            <div class="col-md-6"> <input type="text" name="subject" class="form-control" placeholder="Subject" /> </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12"> 
                <textarea rows="6" class="form-control" name="message"  placeholder="Let us know how can we help you?"></textarea> </div>
            
        </div>
        <div class="pull-left">
           <button class="btn btn-success mt-2 px-5" type="submit" name="submit">Send Message <i class="fa fa-long-arrow-right ml-2 mt-1"></i></button>
        
        </div>
        </form>
    </div>
</div>



<?php include 'includes/footer.php';?>

</body>
</html>