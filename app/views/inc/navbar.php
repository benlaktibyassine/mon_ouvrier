<header class="position-sticky top-0">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand " href="<?php echo URLROOT ?>"><img src="<?php echo URLROOT; ?>/public/images/logo.svg" alt="logo" width="50"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-dark" aria-current="page" href="<?php echo URLROOT ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#services">Services</a>
          </li>
          <?php if (isset($_SESSION['role'])&& $_SESSION['role'] == 'admin') {

          ?>
            <li class="nav-item">
              <a class="nav-link text-dark" href="<?php echo URLROOT ?>/pages/dashboardAdmin">My Profile</a>
            </li>
          <?php
          } ?>
          <?php if (isset($_SESSION['role'])&& $_SESSION['role'] == 'user') {

          ?>
            <li class="nav-item">
              <a class="nav-link text-dark" href="<?php echo URLROOT ?>/pages/dashboardUser">My Profile</a>
            </li>
          <?php
          } ?>
          <?php if (!$_SESSION) {

          ?>
            <li class="nav-item">
            <a class="nav-link text-dark" href="<?php echo URLROOT ?>/pages/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="<?php echo URLROOT ?>/pages/register">Register</a>
          </li>
          <?php
          } ?>

          
        </ul>
        <div class="d-flex" action="">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          
        </div>
      </div>
    </div>
  </nav>
</header>