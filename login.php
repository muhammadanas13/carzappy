<?php
$error="";
include 'includes/config.inc.php';
include 'includes/session.inc.php';
include 'includes/functions.inc.php';


if(isset($_SESSION['u_name'])){
    redirect('dashboard');
}

$error = "";
$username = $email = "";
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    
    $sql = "select * from users where email='{$email}'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            if($row['status']=='0'){
                $error = show_alert("info","<b>Verify Email:</b> Your account has not been verified yet.");
            }else{
            if($row['email']==$email && password_verify($password,$row['password'])){
                $_SESSION['u_id'] = $row['id'];
                $_SESSION['u_name'] = $row['name'];
                $_SESSION['admin'] = $row['admin'];

                if($_SESSION['admin'] == 1){
                    redirect("show-message");

                }else{
                    redirect("dashboard");
                }
            }
            else{
                $error= show_alert("success","Please enter a valid email or password..!");
            }
        }
    }
    }else{
        $error= show_alert("","User is not found..!");
    }
}
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - CarZappy</title>
    <?php include 'includes/head.php';?>
</head>
<body>
<?php include 'includes/navbar.php';?>



<div class="container mt-4 mb-2">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <div class="card vcenter">
                    <div class="card-body">
                    <h2 class="card-title display-6 text-white text-center rounded py-2 mb-4 card-head ">Login</h2>
                        <form class="mt-2" method="POST" action="">
                            <div class="form-group">
                                <label for="email">Enter Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <center><button type="login" name="submit" class="btn btn-default btn-lg theme-button rounded-pill mt-3 theme-login">LOGIN</button>
                            <p class="text-muted text-center mt-4">Do not have account? <a href="register" class="btn btn-info text-white"> Create Account</a></p>
                            </center>
                            </form>

                            <div class="container">
                                <?php echo $error;?>
                            </div>
                            </div>
                </div>
            </div>
        </div>
    </div>








<?php include 'includes/footer.php';?>

</body>
</html>