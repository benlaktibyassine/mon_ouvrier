<div class="l-navbar" id="nav-bar">
  <nav class="nav">
    <div> <a href="<?php echo URLROOT ?>" class="nav_logo"> <img src="<?php echo URLROOT . '/public/images/' . $data[0]['logo'][0]->logo_src ?>" alt="logo" width="30"> <span class="nav_logo-name">Dashboard User</span> </a>
      <div class="nav_list"> <a href="<?php echo URLROOT ?>/pages/dashboardUser" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Profile</span> </a>
        <a href="<?php echo URLROOT ?>/pages/profile" class="nav_link"> <i class='bx bx-user nav_icon'></i>
          <span class="nav_name">works</span> </a>
          <a href="<?php echo URLROOT ?>/pages/payement" class="nav_link <?php if ($_GET['url'] == "pages/stripe") {
                                                                          echo 'active';
                                                                        }; ?>"> <i class='bx bx-credit-card'></i><span class="nav_name">S'abonner</span> </a>

      </div>
    </div> <a href="<?php echo URLROOT ?>/TechController/logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Logout</span>
    </a>
  </nav>
</div>