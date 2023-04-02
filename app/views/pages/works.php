<?php include_once APPROOT . '/views/inc/head.php'; ?>

<body id="body-pd">
  <?php include_once APPROOT . '/views/inc/dashboard/navbar.php'; ?>


  <?php include_once APPROOT . '/views/inc/dashboard/sidebaruser.php';

  ?>


  <!--Container Main start-->
  <div class="container mt-7">
    <?php // echo $data[1]->Id_tech; 
    ?>
    <div class="d-flex justify-content-between">
      <p class="font-weight-bold h5">images works</p>

      <div>
        <form action="<?php echo URLROOT ?>/TechController/insertMultiplImg/<?php echo $data[1]->Id_tech; ?>" method="POST" enctype="multipart/form-data">
          <label for="">Wok description<input type="text" name="description" class="form-control form-control-user nom" /> </label>
          <input type="file" name="image" multiple>
          <button class="btn btn-primary" type="submit" name="submit">add images</button>
        </form>
      </div>
      <div class="table-responsive contacts list-contacts">


      </div>
    </div>
    <h2>Works:</h2>
    <div class="conatiner">
    <?php
    // var_dump($data[2]);
    foreach ($data[2] as $imgsrc) {

    ?>
      <div class=" btn-cat img-hover wow animate__animated animate__bounceInLeft animate__slow  position-relative rounded col-12 col-lg-4  mt-3 overflow-hidden" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">

        <img class="img-fluid w-100 h-100" src="<?php echo URLROOT; ?>/public/images/<?php echo $imgsrc->img; ?>">

        <div class=" w-100 hover-section-img text-white px-3 py-1  d-flex flex-column justify-content-center align-items-center position-absolute end-0">
          <h4><?php echo $imgsrc->description ?></h4>
          

        </div>


      </div>
      <div>

        <a class="btn btn-danger" href="<?php echo URLROOT ?>/TechController/deleteWork/<?php echo $imgsrc->id_img ?>">Delete</a>

      </div>
    <?php
    }
    ?>
    </div>
  </div>

  <!--Container Main end-->
  <!--Container Main end-->
  <?php include_once APPROOT . '/views/inc/dashboard/modalDelete.php'; ?>

  <?php include_once APPROOT . '/views/inc/linkJS.php'; ?>