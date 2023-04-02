<?php include_once APPROOT . '/views/inc/head.php'; ?>

<body id="body-pd">
  <?php include_once APPROOT . '/views/inc/dashboard/navbar.php'; ?>


  <?php include_once APPROOT . '/views/inc/dashboard/sidebaruser.php';

  ?>

  <!--Container Main start-->
  <form class="g-3 needs-validation" method="POST" action="<?php echo URLROOT . '/TechController/updateTech/' . $data[1]->Id_tech; ?>" enctype="multipart/form-data" novalidate>
    <div class="mt-7 container">
      <div class="row gap-lg-2">
        <div class="img ms-2 card-body text-center shadow col-12 col-lg-3 bg-body rounded h-50                                                 ">
          <h5>image profile</h5>
          <hr>
          <div class="d-flex flex-column justify-content-center">
            <label for="img"><img class="rounded-circle mb-3 mt-4" src="<?php echo URLROOT ?>/public/upload/<?php echo $data[1]->img; ?>" width="160" height="160"></label>
            <input class="invisible" type="file" name="img" id="img">
            <div>
              <label for="img" class="btn btn-primary btn-sm">change image</label>
            </div>
          </div>
        </div>

        <div class="categories col-12 col-lg-8 shadow-lg p-3 mb-5 bg-body rounded">
          <h5>add all information</h5>
          <hr>

          <div class="row">
            <div class="col">
              <div class="mb-3"><label class="form-label" for="username"><strong>Username</strong></label><input class="form-control" type="text" id="username" placeholder="Username" name="username" value="<?php echo $data[1]->nom . ' ' . $data[1]->prenom  ?>" required></div>
            </div>
            <div class="col">
              <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label><input class="form-control" type="email" id="email" placeholder="Email" name="email" value="<?php echo $data[1]->email; ?>" required></div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="mb-3"><label class="form-label" for="first_name"><strong>First Name</strong></label><input class="form-control" type="text" id="first_name" placeholder="firt name" name="nom" value="<?php echo $data[1]->nom; ?>" required></div>
            </div>
            <div class="col">
              <div class="mb-3"><label class="form-label" for="last_name"><strong>Last Name</strong></label><input class="form-control" type="text" id="last_name" placeholder="Last name" name="prenom" value="<?php echo $data[1]->prenom; ?>" required></div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label class="form-label" for="city"><strong>City</strong></label>

              <select class="form-control select-city" name="ville" id="city" required>
                <option selected value="<?php echo $data[1]->ville ?>"><?php echo $data[1]->ville ?></option>
              </select>
            </div>
            <div class="col">
              <div class="mb-3"><label class="form-label" for="last_name"><strong>phone</strong></label><input class="form-control" type="text" id="last_name" placeholder="Phone" name="phone" value="<?php echo $data[1]->phone; ?>" required></div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="mb-3">
                <label class="form-label" for="metier"><strong>Metier</strong></label>
                <select class="form-control" name="job" id="metier" required>
                  <option selected value="<?php echo $data[1]->metier ?>"><?php echo $data[1]->metier ?></option>
                  <?php foreach ($data[2] as $cat) : ?>
                    <option value="<?php echo $cat->nom ?>"><?php echo $cat->nom ?></option>
                  <?php endforeach; ?>


                </select>
              </div>

            </div>
            <div class="col">
              <div class="mb-3"><label class="form-label" for="last_name"><strong>Adresse</strong></label><input class="form-control" type="text" id="last_name" placeholder="Adresse" name="adresse" value="<?php echo $data[1]->adresse; ?>" required></div>
            </div>
          </div>
          <div class="row">
            <p>
              <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Change password
              </button>
            </p>
            <div class="collapse row w-100" id="collapseExample">
              <div class="col">
                <div class="mb-3"><label class="form-label" for="first_name"><strong>password</strong></label><input class="form-control" type="text" id="first_name" placeholder="password" name="password"></div>
              </div>
              <div class="col">
                <div class="mb-3"><label class="form-label" for="last_name"><strong>confirm password</strong></label><input class="form-control" type="text" id="last_name" placeholder="confirm password" name="last_name"></div>
              </div>
            </div>
          </div>
          <div class="mb-3 d-flex justify-content-end"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button>
            <!-- <button class="btn btn-danger btn-sm btnDelete" data-bs-toggle="modal" data-bs-target="#exampleModal2"><span class="d-none"> <?php echo $data[1]->Id_tech ?></span>delete</button> -->
          </div>
        </div>
      </div>



    </div>
    </div>
    </div>
  </form>
  <!--Container Main end-->
  <!--Container Main end-->
  <?php include_once APPROOT . '/views/inc/dashboard/modalDelete.php'; ?>

  <?php include_once APPROOT . '/views/inc/linkJS.php'; ?>