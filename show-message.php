<?php
include 'includes/config.inc.php';
include 'includes/session.inc.php';
include 'includes/functions.inc.php';

if($_SESSION['admin'] == 0){
   redirect('/');
   exit();
}

$sql = "select * from ticket order by id desc";
    $sql_exec = mysqli_query($conn,$sql);
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN - Show Message</title>
    <?php include 'includes/head.php';?>
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">


</head>
<body>
<?php include 'includes/navbar.php';?>


<div class="container mt-3">
<div class="card">
    <div class="card-body">
        <div class="cart-title">
            <h4 class="display-4 card-head text-center text-white">Tickets</h4>
            <div class="mt-2 mb-2 py-2">
            </div>
            <?php
          if(mysqli_num_rows($sql_exec)>0){

            echo '<table id="foodtable" class="table table-striped" style="width:100%">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>EMAIL</th>
                      <th>MOBILE</th>
                      <th>SUBJECT TYPE</th>
                      <th>MESSAGE</th>
                      <th>ADDED ON</th>
                  </tr>
              </thead>
            <tbody>';
              while($row = mysqli_fetch_assoc($sql_exec)){
                  echo '<tr>
                  <td>'.$row['id'].'</td>
                  <td>'.$row['name'].'</td>
                  <td>'.$row['email'].'</td>
                  <td>'.$row['mobile'].'</td>
                  <td>'.$row['subject'].'</td>
                  <td>'.$row['message'].'</td>
                  <td>'.$row['created_on'].'</td>';
                  
      

                }//while close
            echo "</tbody></table>";
          
          }// if close
          else{
            echo "NO Data found!";
          }

        ?>
        </div>
    </div>
</div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
</body>
</html>