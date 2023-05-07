<div class="l-navbar" id="nav-bar">
  <nav class="nav">
    <div> <a href="<?php echo URLROOT ?>" class="nav_logo"> <img src="<?php echo URLROOT; ?>/public/images/logo.svg" alt="logo" width="30"> <span class="nav_logo-name">Home</span> </a>
      <div class="nav_list"> <a href="<?php echo URLROOT ?>/pages/dashboardAdmin" class="nav_link <?php if ($_GET['url'] == "pages/dashboardAdmin") {
                                                                                                    echo 'active';
                                                                                                  }; ?>"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
        <a href="<?php echo URLROOT ?>/pages/users" class="nav_link <?php if ($_GET['url'] == "pages/users") {
                                                                      echo 'active';
                                                                    }; ?>"> <i class='bx bx-user nav_icon'></i>
          <span class="nav_name">Users</span> </a>
        <a href="<?php echo URLROOT ?>/pages/admins" class="nav_link <?php if ($_GET['url'] == "pages/admins") {
                                                                        echo 'active';
                                                                      }; ?>"> <i class='bx bxs-hard-hat'></i> <span class="nav_name">Admin</span> </a>
        <a href="<?php echo URLROOT ?>/pages/jobs" class="nav_link <?php if ($_GET['url'] == "pages/jobs") {
                                                                      echo 'active';
                                                                    }; ?>"> <i class='bx bxs-briefcase'></i><span class="nav_name">Jobs</span> </a>
<a href="<?php echo URLROOT ?>/pages/villes" class="nav_link <?php if ($_GET['url'] == "pages/villes") {
                                                                      echo 'active';
                                                                    }; ?>"> <i class='bx bx-map'></i><span class="nav_name">Villes</span> </a>
<a href="<?php echo URLROOT ?>/pages/secteurs" class="nav_link <?php if ($_GET['url'] == "pages/secteurs") {
                                                                      echo 'active';
                                                                    }; ?>"> <i class="bx bx-street-view"></i><span class="nav_name">Villes</span> </a>

      </div>
    </div> <a href="<?php echo URLROOT ?>/adminController/Logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Logout</span>
    </a>
  </nav>
</div>