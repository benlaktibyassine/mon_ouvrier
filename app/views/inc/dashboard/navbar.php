<header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <form action="" class="">
      <div class="input-group border-0">
        <input type="text" class="form-control bg-transparent" placeholder="Search" aria-label="Username"
          aria-describedby="basic-addon1">
        <span class="input-group-text btn-yellow " id="basic-addon1"><i class="fas fa-search"></i></span>
      </div>
    </form>
    <div class="d-flex gap-2 align-items-center justify-content-center">
      <div class="notification me-4">
        <!-- <i class="fas fa-bell h5"></i> -->
      </div>
      <span><?php if(isset($_SESSION[ 'username'])){
        echo $_SESSION['username']; 
      } ?></span>
      <div class="header_img"> <img src="<?php 
      
      if($_SESSION['role'] == "admin"){
        echo URLROOT .'/public/images/avatar.svg';
      }
      else{
        echo URLROOT.'/public/upload/'.$data[1]->img;
      } ?>" alt=""> </div>
    </div>

  </header>