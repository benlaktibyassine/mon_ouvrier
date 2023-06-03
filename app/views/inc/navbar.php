<header class="position-sticky top-0" style="z-index: 100;">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
     
      <a class="navbar-brand " href="<?php echo URLROOT ?>">
      <img src="<?php
       if(isset($data['logo'])){
        echo URLROOT . '/public/images/' . $data['logo'][0]->logo_src;
          } else {
            
            echo URLROOT . '/public/images/' . $data[0]['logo'][0]->logo_src;
          }
       ?>" alt="logo" width="50">
    </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-dark" aria-current="page" href="<?php echo URLROOT ?>">الصفحة الرئيسية</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#services">الخدمات</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-dark" aria-current="page" href="<?php echo URLROOT ?>/pages/techSearch">البحث</a>
          </li>
        </ul>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        ?>
          <div class="d-flex">
            <a class="btn btn-primary" href="<?php echo URLROOT ?>/pages/dashboardAdmin">ملفي الشخصي</a>
          </div>
        <?php
        } ?>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'user') {

        ?>
          <div class="d-flex">
            <a class="btn btn-primary" href="<?php echo URLROOT ?>/pages/dashboardUser">ملفي الشخصي</a>
          </div>

        <?php
        } ?>
        <?php if (!$_SESSION) {

        ?>

          <div class="d-flex">
            <a class="btn text-dark " style="background-color: #fbd23287;" href="<?php echo URLROOT ?>/pages/login">تسجيل الدخول</a>
          </div>


        <?php
        } ?>




      </div>
    </div>

  </nav>
</header>