<header class="header" id="header">
  <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>

  <div class="d-flex gap-2 align-items-center justify-content-center">
    <div class="notification me-4">
      <!-- <i class="fas fa-bell h5"></i> -->
    </div>
    <span><?php if (isset($_SESSION['username'])) {
            echo $_SESSION['username'];
          } ?></span>
    <div class="header_img"> <img src="<?php

                                        if ($_SESSION['role'] == "admin") {
                                          echo URLROOT . '/public/images/avatar.svg';
                                        } else {
                                          echo URLROOT . '/public/upload/' . $data[1]->img;
                                        } ?>" alt=""> </div>
                                        <?php if ($_SESSION['role']=='admin') {
                                         ?> <a href="<?php echo URLROOT ?>/adminController/Logout" class="nav_link" style="display: contents;"> <i class='bx bx-log-out nav_icon'></i>
                                         </a><?php 
                                        }?>
   
  </div>

</header>