<?php include_once APPROOT . '/views/inc/head.php'; ?>

<body id="body-pd" class="body-dash">
  <?php include_once APPROOT . '/views/inc/dashboard/navbar.php'; ?>

  <?php include_once APPROOT . '/views/inc/dashboard/sidebar.php'; ?>

  <!--Container Main start-->
  <div class="container mt-7">
    <div class="d-flex justify-content-between">
      <p class="font-weight-bold h5">Users List</p>

      <!-- Button trigger modal -->
      <div class="position-sticky top-0">
        <span>
        </span>
      </div>
    </div>
    <div class="table-responsive contacts list-contacts">
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>City</th>
            <th>Job</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data[1] as $user) : ?>
            <tr>
              <td>
                <div class="user-info d-flex align-items-center">
                  <div class="user-info__img">
                    <img class="me-3" src="<?php echo URLROOT ?>/public/upload/<?php echo $user->img; ?>" alt="User Img" width="55" height="55">
                  </div>
                  <div class="user-info__basic">
                    <h5 class="mb-0"><?php echo $user->nom . " " . $user->prenom; ?></h5>
                    <p class="text-muted mb-0"><?php echo $user->email; ?></p>
                  </div>
                </div>
              </td>
              <td><?php echo $user->phone; ?></td>
              <td><?php echo $user->ville; ?></td>
              <td><?php echo $user->metier; ?></td>
              <td>
                <button class="btn btn-danger btn-sm btnDelete" data-bs-toggle="modal" data-bs-target="#exampleModal2"><span class="d-none"><?php echo $user->Id_tech ?></span> <span class="d-none"><?php echo 'user'; ?></span> delete</button>
                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $user->Id_tech ?>">Show</button>
              </td>
            </tr>

          <?php endforeach; ?>
          <?php include_once APPROOT . '/views/inc/dashboard/modalDelete.php'; ?>
        </tbody>
      </table>
    </div>







    <?php foreach ($data[1] as $user) : ?>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal<?php echo $user->Id_tech ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">info user</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="user-info d-flex align-items-center">
                <div class="user-info__img">
                  <img class="me-3" src="<?php echo URLROOT ?>/public/upload/<?php echo $user->img; ?>" alt="User Img" width="55" height="55">
                </div>
                <div class="user-info__basic">
                  <h5 class="mb-0"><?php echo $user->nom . " " . $user->prenom; ?></h5>
                  <p class="text-muted mb-0"><?php echo $user->email; ?></p>
                </div>
              </div>
              <div class="mt-5">
                <table class="table table-hover w-100">
                  <tbody>
                    <tr>
                      <th>phone</th>
                      <td><?php echo $user->phone ?></td>
                    </tr>
                    <tr>
                      <th>city</th>
                      <td> <?php echo $user->ville ?></td>
                    </tr>
                    <tr>
                      <th>job</th>
                      <td><?php echo $user->metier ?></td>
                    </tr>
                    <tr>
                      <th>adresse</th>
                      <td><?php echo $user->adresse ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    <?php endforeach; ?>


  </div>
  <!--Container Main end-->
  <!--Container Main end-->
  <?php include_once APPROOT . '/views/inc/linkJS.php'; ?>