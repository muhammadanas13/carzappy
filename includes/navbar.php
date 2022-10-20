<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="/"><img src="logo.png" height="50" width="auto"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="faqs">FAQs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact-us">Contact Us</a>
        </li>


      
        <?php
          if(isset($_SESSION['u_name'])){
            echo '
            <li class="nav-item">
            <a class="nav-link text-white me-3">'.$_SESSION['u_name'].' </a>
            </li>
        </ul>
          <div class="d-flex">
          <a href="logout"><button class="btn btn-default theme-button rounded-pill me-3">Logout</button></a>
          ';
            
          }else{
            echo '<a href="login"><button class="btn rounded-pill btn-outline-primary ml-3 me-3 btn-white">Login</button></a>
            <a href="register"><button class="btn btn-default theme-button rounded-pill me-3">Register</button></a>';
          }
        ?>
      </div>
        
    </div>
  </div>
</nav>