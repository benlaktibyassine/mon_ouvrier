<?php include_once APPROOT . '/views/inc/head.php'; ?>

<body id="body-pd">
  <?php include_once APPROOT . '/views/inc/dashboard/navbar.php'; ?>


  <?php include_once APPROOT . '/views/inc/dashboard/sidebaruser.php';

  ?>


  <!--Container Main start-->
  <div class="container mt-7">
    <?php
    if (isset($_GET['error'])) {
      // Display the error message
      echo '<p class="alert alert-danger">' . htmlspecialchars($_GET['error']) . '</p>';
      echo '<script>
          setTimeout(function() {
            document.querySelector(".alert").style.display = "none";
          }, 7000);
        </script>';
    }
    if (isset($_GET['succes'])) {
      // Display the error message
      echo '<p class="alert alert-success">' . htmlspecialchars($_GET['succes']) . '</p>';
      echo '<script>
          setTimeout(function() {
            document.querySelector(".alert").style.display = "none";
          }, 7000);
        </script>';
    }
    ?>
    <div class="d-flex justify-content-between">
      <!-- <p class="font-weight-bold h5">صور الأعمال</p> -->

      <div>
        <form action="<?php echo URLROOT ?>/TechController/insertMultiplImg/<?php echo $data[1]->Id_tech; ?>" method="POST" enctype="multipart/form-data">
<input type="text" name="description" class="form-control form-control-user nom" required  placeholder="وصف العمل"/>
          <input type="file" name="image" multiple required class="btn btn-primary">
          <button class="btn btn-primary" type="submit" name="submit">إضافة صور</button>
        </form>
      </div>
      <div class="table-responsive contacts list-contacts">


      </div>
    </div>
    <?php if (count($data[2]) != 0) { ?>
      <h2 class="text-center mt-3">: الأعمال</h2>
    <?php
    } else {
    ?>
      <h2 class="text-center mt-3">: لا توجد أعمال مرتبطة معك </h2>
    <?php

    }
    ?>

    <div class="conatiner">
      <div class="row">
        <?php
        // var_dump($data[2]);
        foreach ($data[2] as $imgsrc) {

        ?>
          <div class="col-4" style="height: 150px;">
            <div class=" btn-cat img-hover wow animate__animated animate__bounceInLeft animate__slow  position-relative rounded col-12   mt-3 overflow-hidden" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">

              <img class="img-fluid w-100 h-100" src="<?php echo URLROOT; ?>/public/images/<?php echo $imgsrc->img; ?>">

              <div class=" w-100 hover-section-img text-white px-3 py-1  d-flex flex-column justify-content-center align-items-center position-absolute end-0">
                <h4><?php echo $imgsrc->description ?></h4>


              </div>


            </div>
            <div class="d-flex justify-content-center align-items-center">

              <a class="btn btn-danger" href="<?php echo URLROOT ?>/TechController/deleteWork/<?php echo $imgsrc->id_img ?>">Delete</a>

            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>

  <!--Container Main end-->
  <!--Container Main end-->
  <?php include_once APPROOT . '/views/inc/dashboard/modalDelete.php'; ?>

  <?php include_once APPROOT . '/views/inc/linkJS.php'; ?>