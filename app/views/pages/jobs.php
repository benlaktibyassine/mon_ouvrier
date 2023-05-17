<?php include_once APPROOT . '/views/inc/head.php'; ?>

<body id="body-pd" class="body-dash">
  <?php include_once APPROOT . '/views/inc/dashboard/navbar.php'; ?>

  <?php include_once APPROOT . '/views/inc/dashboard/sidebar.php'; ?>

  <!--Container Main start-->
      <?php if (isset($_GET['error'])) {

        echo "<div class='alert alert-danger' role='alert'>
        <p class='text-center'>".$_GET['error']."</p>
      </div>";
      } ?>
  <div class="container mt-2">
    <div class="d-flex justify-content-center">


      <!-- Button trigger modal -->
      <div>
        <h5 class="modal-title" id="exampleModalLabel">Add Job</h5>
        <form action="<?php echo URLROOT ?>/AdminController/Addjob" method="post" enctype="multipart/form-data">
          <div class="m-2"><label for="">Job Name :</label><input class="form-control" type="text" name="job_name" required></div>
          <div class="m-2"><label class="m-2" for="">Job Picture :</label><input type="file" name="img" required></div>
          <div class="text-center">
            <button class="btn btn-success">Submit</button>
          </div>


        </form>
      </div>
    </div>
    <div class="table-responsive contacts list-contacts">
      <p class="font-weight-bold h5">Jobs list</p>
      <table class="table">
        <thead>
          <tr>
            <th></th>
            <th>Job Name</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>

          <?php
          //die(var_dump($data));
          foreach ($data[1] as $job) : ?>
            <tr>
              <td>
                <div class="user-info d-flex align-items-center">
                  <div class="job-info__img">
                    <img class="me-4" src="<?php echo URLROOT . '/public/images/' . $job->img ?>" alt="<?php echo $job->nom ?> Img" width="55">
                  </div>
                  <div class="user-info__basic">
                    <h5 class="mb-0"></h5>
                  </div>
                </div>
              </td>
              <td><?php echo $job->description ?></td>

              <td></td>
              <td>
              </td>
              <td>
                <a class="btn btn-danger btn-sm btnDelete" href="<?php echo URLROOT ?>/AdminController/Deletejob/<?php echo $job->id_cat ?>">Delete</a>



              </td>

            </tr>


          <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>
  <!--Container Main end-->
  <!--Container Main end-->
  <?php include_once APPROOT . '/views/inc/linkJS.php'; ?>