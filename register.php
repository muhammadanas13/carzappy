<?php
$error="";
include 'includes/config.inc.php';
include 'includes/session.inc.php';
include 'includes/functions.inc.php';


if(isset($_POST['submit'])){
    
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);
    
    $hashpass = password_hash($password, PASSWORD_BCRYPT);
    
    $token = bin2hex(random_bytes(24));
    
    $checkemail = "select * from users where email ='$email' ";
    
    $emailquery = mysqli_query($conn,$checkemail);
    
    $emailcount = mysqli_num_rows($emailquery);
    
    if($emailcount>0){
        $error = show_alert("","User already exists!");
    }
    else{
        if($password===$cpassword){
           $otp = mt_rand(100000,999999);
            $insertquery ="insert into users(name,email,mobile,password,token,status,admin) values ('$name','$email','$mobile','$hashpass','$token','0','0')"; 
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                
                $runinsert=mysqli_query($conn,$insertquery);

                if($runinsert){
                                        
                    $verify_url = "https://xenonstack.muhammadanas.in/verify-account?token=$token";
                    $msg ='<!doctype html>
                    <html>
                      <head>
                        <meta name="viewport" content="width=device-width" />
                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                        <title>CarZappy Email Verification</title>
                        <style>
                          /* -------------------------------------
                              GLOBAL RESETS
                          ------------------------------------- */
                          img {
                            border: none;
                            -ms-interpolation-mode: bicubic;
                            max-width: 100%; }
                          body {
                            background-color: #f6f6f6;
                            font-family: sans-serif;
                            -webkit-font-smoothing: antialiased;
                            font-size: 14px;
                            line-height: 1.4;
                            margin: 0;
                            padding: 0; 
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%; }
                          table {
                            border-collapse: separate;
                            mso-table-lspace: 0pt;
                            mso-table-rspace: 0pt;
                            width: 100%; }
                            table td {
                              font-family: sans-serif;
                              font-size: 14px;
                              vertical-align: top; }
                          /* -------------------------------------
                              BODY & CONTAINER
                          ------------------------------------- */
                          .body {
                            background-color: #f6f6f6;
                            width: 100%; }
                          /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
                          .container {
                            display: block;
                            Margin: 0 auto !important;
                            /* makes it centered */
                            max-width: 580px;
                            padding: 10px;
                            width: 580px; }
                          /* This should also be a block element, so that it will fill 100% of the .container */
                          .content {
                            box-sizing: border-box;
                            display: block;
                            Margin: 0 auto;
                            max-width: 580px;
                            padding: 10px; }
                          /* -------------------------------------
                              HEADER, FOOTER, MAIN
                          ------------------------------------- */
                          .main {
                            background: #fff;
                            border-radius: 3px;
                            width: 100%; }
                          .wrapper {
                            box-sizing: border-box;
                            padding: 20px; }
                          .footer {
                            clear: both;
                            padding-top: 10px;
                            text-align: center;
                            width: 100%; }
                            .footer td,
                            .footer p,
                            .footer span,
                            .footer a {
                              color: #999999;
                              font-size: 12px;
                              text-align: center; }
                          /* -------------------------------------
                              TYPOGRAPHY
                          ------------------------------------- */
                          h1,
                          h2,
                          h3,
                          h4 {
                            color: #000000;
                            font-family: sans-serif;
                            font-weight: 400;
                            line-height: 1.4;
                            margin: 0;
                            Margin-bottom: 30px; }
                          h1 {
                            font-size: 35px;
                            font-weight: 300;
                            text-align: center;
                            text-transform: capitalize; }
                          p,
                          ul,
                          ol {
                            font-family: sans-serif;
                            font-size: 14px;
                            font-weight: normal;
                            margin: 0;
                            Margin-bottom: 15px; }
                            p li,
                            ul li,
                            ol li {
                              list-style-position: inside;
                              margin-left: 5px; }
                          a {
                            color: #3498db;
                            text-decoration: underline; }
                          /* -------------------------------------
                              BUTTONS
                          ------------------------------------- */
                          .btn {
                            box-sizing: border-box;
                            width: 100%; }
                            .btn > tbody > tr > td {
                              padding-bottom: 15px; }
                            .btn table {
                              width: auto; }
                            .btn table td {
                              background-color: #ffffff;
                              border-radius: 5px;
                              text-align: center; }
                            .btn a {
                              background-color: #ffffff;
                              border: solid 1px #3498db;
                              border-radius: 5px;
                              box-sizing: border-box;
                              color: #3498db;
                              cursor: pointer;
                              display: inline-block;
                              font-size: 14px;
                              font-weight: bold;
                              margin: 0;
                              padding: 12px 25px;
                              text-decoration: none;
                              text-transform: capitalize; }
                          .btn-primary table td {
                            background-color: #3498db; }
                          .btn-primary a {
                            background-color: #3498db;
                            border-color: #3498db;
                            color: #ffffff; }
                          /* -------------------------------------
                              OTHER STYLES THAT MIGHT BE USEFUL
                          ------------------------------------- */
                          .last {
                            margin-bottom: 0; }
                          .first {
                            margin-top: 0; }
                          .align-center {
                            text-align: center; }
                          .align-right {
                            text-align: right; }
                          .align-left {
                            text-align: left; }
                          .clear {
                            clear: both; }
                          .mt0 {
                            margin-top: 0; }
                          .mb0 {
                            margin-bottom: 0; }
                          .preheader {
                            color: transparent;
                            display: none;
                            height: 0;
                            max-height: 0;
                            max-width: 0;
                            opacity: 0;
                            overflow: hidden;
                            mso-hide: all;
                            visibility: hidden;
                            width: 0; }
                          .powered-by a {
                            text-decoration: none; }
                          hr {
                            border: 0;
                            border-bottom: 1px solid #f6f6f6;
                            Margin: 20px 0; }
                          /* -------------------------------------
                              RESPONSIVE AND MOBILE FRIENDLY STYLES
                          ------------------------------------- */
                          @media only screen and (max-width: 620px) {
                            table[class=body] h1 {
                              font-size: 28px !important;
                              margin-bottom: 10px !important; }
                            table[class=body] p,
                            table[class=body] ul,
                            table[class=body] ol,
                            table[class=body] td,
                            table[class=body] span,
                            table[class=body] a {
                              font-size: 16px !important; }
                            table[class=body] .wrapper,
                            table[class=body] .article {
                              padding: 10px !important; }
                            table[class=body] .content {
                              padding: 0 !important; }
                            table[class=body] .container {
                              padding: 0 !important;
                              width: 100% !important; }
                            table[class=body] .main {
                              border-left-width: 0 !important;
                              border-radius: 0 !important;
                              border-right-width: 0 !important; }
                            table[class=body] .btn table {
                              width: 100% !important; }
                            table[class=body] .btn a {
                              width: 100% !important; }
                            table[class=body] .img-responsive {
                              height: auto !important;
                              max-width: 100% !important;
                              width: auto !important; }}
                          @media all {
                            .ExternalClass {
                              width: 100%; }
                            .ExternalClass,
                            .ExternalClass p,
                            .ExternalClass span,
                            .ExternalClass font,
                            .ExternalClass td,
                            .ExternalClass div {
                              line-height: 100%; }
                            .apple-link a {
                              color: inherit !important;
                              font-family: inherit !important;
                              font-size: inherit !important;
                              font-weight: inherit !important;
                              line-height: inherit !important;
                              text-decoration: none !important; } 
                            .btn-primary table td:hover {
                              background-color: #34495e !important; }
                            .btn-primary a:hover {
                              background-color: #34495e !important;
                              border-color: #34495e !important; } }
                        </style>
                      </head>
                      <body class="">
                        <table border="0" cellpadding="0" cellspacing="0" class="body">
                          <tr>
                            <td>&nbsp;</td>
                            <td class="container">
                              <div class="content">
                                <table class="main">
                    
                                  <!-- START MAIN CONTENT AREA -->
                                  <tr>
                                    <td class="wrapper">
                                      <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td>
                                            <h1>Confirm your email</h1>
                                            <h2>You are just one step away</h2>
                                            <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                                              <tbody>
                                                <tr>
                                                  <td align="left">
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                      <tbody>
                                                        <tr>
                                                          <td> <a href="'.$verify_url.'" target="_blank">Confirm Email</a> </td>
                                                        </tr>
                                                        <tr><td><td></tr>
                                                        <td> <a href="'.$verify_url.'" target="_blank">'.$verify_url.'</a> </td>

                                                      </tbody>
                                                    </table>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                          
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                    
                                <!-- END MAIN CONTENT AREA -->
                                </table>
                    
                                <!-- START FOOTER -->
                                
                                </div>
                                <!-- END FOOTER -->
                                
                              <!-- END CENTERED WHITE CONTAINER -->
                              </div>
                            </td>
                            <td>&nbsp;</td>
                          </tr>
                        </table>
                      </body>
                    </html>';

                    $mailSentInfo = smtp_mailer($email,"Account Verification", $msg);
                            
                    if($mailSentInfo){
                        

                            $_SESSION['u_email'] = $email;
                            $_SESSION['u_name']= $name;
                            redirect('account-verification'); 
                            die();


                    }

                    
                }

              } else {
                 $error = show_alert("","Email is not valid.!");
              }

        }
        else{
            $error = show_alert("info","Your password has not matched with Confirm Password.");
        }
    }
    
    
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - CarZappy</title>
    <?php include 'includes/head.php';?>
</head>
<body>
<?php include 'includes/navbar.php';?>



<div class="container container-vcenter">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                    <h2 class="card-title display-6 text-white text-center rounded py-2 mb-4 card-head">Sign Up</h2>
                        <form class="mt-2" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off">
                            <div class="form-group  mt-2">
                                <label for="name">Enter Full Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Your Full Name" required>
                            </div>
                            <div class="form-group mt-4">
                                <label for="email">Enter Email</label>
                                <input type="email" class="form-control" name="email"  placeholder="YourEmail@gmail.com" required>
                            </div>
                            <div class="form-group  mt-4">
                                <label >Enter Mobile Number</label>
                                <input type="number" minlength="10" maxlength="10" class="form-control" placeholder="9876543210" name="mobile" required>
                            </div>
                            <div class="form-group mt-4">
                                <label>Enter Password</label>
                                <input type="password" class="form-control"  name="password" placeholder="Password" minlength="6" autocomplete="off" required>
                            </div>
                            <div class="form-group mt-4">
                                <label>Confirm Password</label>
                                <input type="password"  minlength="6" autocomplete="off" class="form-control" placeholder="Confirm Password" name="cpassword" required>
                            </div>
                            <center><button type="submit" name="submit" class="btn btn-lg btn-default rounded-pill mt-3 theme-login">Register</button>
                            <p class="text-muted text-center mt-4">Already have account? <a href="signin" class="btn rounded-pill btn-info text-white"> Login</a></p></center>
                            </form>
                            </div>
                            <div class="container"><?php echo $error;?></div>
                            
                </div>
            </div>
        </div>
    </div>



<?php include 'includes/footer.php';?>

</body>
</html>