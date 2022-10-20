<?php

include 'includes/config.inc.php';
include 'includes/session.inc.php';
include 'includes/functions.inc.php';

if($_GET['token']=='null'){

    redirect('/?msg=invalid');
    die();

}
elseif(!isset($_GET['token'])){

    redirect('/?msg=invalid');
    die();
}
else{

    $token = mysqli_real_escape_string($conn,$_GET['token']);

        $fetchData = "select * from users where token='{$token}'";
        $execFetech = mysqli_query($conn, $fetchData);
        $showData = mysqli_fetch_assoc($execFetech);

    
            $update = "update users set token = 'null',status='1' where token='{$token}' ";
            $valUpdate = mysqli_query($conn,$update);
            redirect("/project/?msg=account-created");
            die();

    }
    

?>