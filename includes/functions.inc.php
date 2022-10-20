<?php

//Function that prevents SQL injection 

function sql_injection_filter($con,$data){
    return htmlentities(mysqli_real_escape_string($con, $data));
}


function show_alert($alert,$alertdata){
    if($alert=="success"){
        $data = '<div class="alert alert-success alert-dismissible fade show mt-2 mb-2" role="alert">'.$alertdata.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        return $data;
    }elseif($alert=="info"){
        $data = '<div class="alert alert-info alert-dismissible fade show mt-2 mb-2" role="alert">'.$alertdata.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        return $data;
    }
    else{
        $data = '<div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert">'.$alertdata.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        return $data;
    }
}

 
  
  $token = bin2hex(random_bytes(16));
  
  include('smtp/PHPMailerAutoload.php');
  
  function smtp_mailer($to,$subject, $msg){
  
      $mail = new PHPMailer(); 
      // $mail->SMTPDebug=3;
      $mail->IsSMTP(); 
      $mail->SMTPAuth = true; 
      $mail->SMTPSecure = 'TLS'; 
      $mail->Host = "smtp.ionos.com";
      $mail->Port = "587"; 
      $mail->IsHTML(true);
      $mail->CharSet = 'UTF-8';
      $mail->Username = "accounts@muhammadanas.net";
      $mail->Password = 'wRB,YC_PHIh[%;O2ko';
      $mail->SetFrom("accounts@muhammadanas.net");
      $mail->Subject = $subject;
      $mail->Body =$msg;
      $mail->AddAddress($to);
      $mail->SMTPOptions=array('ssl'=>array(
          'verify_peer'=>false,
          'verify_peer_name'=>false,
          'allow_self_signed'=>false
      ));
  
      if(!$mail->Send()){
          // echo $mail->ErrorInfo;
      $mailData = false ;
      }else{
          // echo 'Sent';
      $mailData = true;
      }
  
    return $mailData;
  }


  function redirect($url){
      return header("location: $url");
  }

?>