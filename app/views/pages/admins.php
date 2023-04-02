<?php include_once APPROOT . '/views/inc/head.php'; ?>

<body id="body-pd" class="body-dash">
<?php include_once APPROOT . '/views/inc/dashboard/navbar.php'; ?>

<?php include_once APPROOT . '/views/inc/dashboard/sidebar.php';?>

  <!--Container Main start-->
  <div class="container mt-7">
    <div class="d-flex justify-content-between">
        <p class="font-weight-bold h5">Admins list</p>
        
        <!-- Button trigger modal -->
        <div>
            <span>
            </span>

            <?php include_once APPROOT . '/views/inc/dashboard/addAdmin.php';
             ?>
        </div>
      </div>
      <div class="table-responsive contacts list-contacts">
        <table class="table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Password</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

            <?php foreach ($data[1] as $admin):?>
                <tr>
                    <td>
                        <div class="user-info d-flex align-items-center">
                            <div class="user-info__img">
                                <img class="me-3" src="<?php echo URLROOT .'/public/images/avatar.svg' ?>" alt="User Img" width="55">
                            </div>
                            <div class="user-info__basic">
                                <h5 class="mb-0"><?php echo $admin->username ?></h5>
                            </div>
                        </div>
                    </td>
                    <td><?php echo $admin->phone ?></td>
                    <td><?php echo $admin->password ?></td>
                    <td></td>
                    <td>
                    </td>
                    <td>
                    <button class="btn btn-danger btn-sm btnDelete" data-bs-toggle="modal" data-bs-target="#exampleModal2"><span class="idAdmin d-none"><?php echo $admin->id_admin ?></span> <span class="d-none"><?php echo 'admin';?></span> delete</button>

                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modaleUpdate<?php echo $admin->id_admin;?>" data-bs-whatever="@mdo"">update</button>

                    </td>
                     
                </tr>


                <!-- modalupdate -->
                <div class="button-add-student">            
              <div class="modal fade" id="modaleUpdate<?php echo $admin->id_admin ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Admin</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              <form class="p-3 g-3 needs-validation" id="formAdd" method="POST" action="<?php echo URLROOT ?>/AdminController/updateAdmin/<?php echo $admin->id_admin; ?>" novalidate>
                              <p class="vide-msg alert-danger text-center "></p>
                                <div class="mb-4 d-flex gap-4">
                                  <div class="name">
                                    <label for="full_name" class="form-label">userName</label> <span class="valid text-danger"></span>
                                    <input placeholder="Enter full_namet" type="text" class="form-control" id="full_name" aria-describedby="emailHelp" name="username" value="<?php echo $admin->username; ?>" required>
                                  </div>
                                  <div class="phone">
                                    <label for="matricule" class="form-label">Phone</label> <span class="valid text-danger"></span>
                                    <input placeholder="Enter matricule" type="text" class="form-control" id="matricule" aria-describedby="emailHelp" name="phone" value="<?php echo $admin->phone; ?>" required>
                                  </div>
                                </div>
                                <div class="mb-4 d-flex gap-4">
                                  <div class="name">
                                    <label for="password" class="form-label">password</label> <span class="valid text-danger"></span>
                                    <input placeholder="Enter Mot de Passe" type="password" class="form-control" id="name" aria-describedby="emailHelp" name="password" value="<?php echo $admin->password; ?>" required>
                                  </div>
                                  <div class="phone">
                                    <label for="cpassword" class="form-label"> confirmer password</label> <span class="valid text-danger"></span>
                                    <input placeholder="Enter Mot de Passe" type="password" class="form-control" id="cpassword" aria-describedby="emailHelp" name="cpassword" required>
                                  </div>
                                </div>
                                <div class="button">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="submitContact" class="btn btn-primary">save</button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>



                <?php endforeach; ?>
                <?php include_once APPROOT . '/views/inc/dashboard/modalDelete.php'; ?> 
            </tbody>
        </table>
    </div>
  </div>
  <!--Container Main end-->
  <!--Container Main end-->
  <?php include_once APPROOT . '/views/inc/linkJS.php'; ?>
