<div class="button-add-student">            
              <div class="modal fade" id="modaleUpdate<?php echo $admin->id_admin ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">update Admin</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              <form class="p-3" id="formAdd" method="POST" action="<?php echo URLROOT ?>/AdminController/updateAdmin/<?php echo $admin->id_admin; ?>">
                              <p class="vide-msg alert-danger text-center "></p>
                                <div class="mb-4 d-flex gap-4">
                                  <div class="name">
                                    <label for="full_name" class="form-label">userName</label> <span class="valid text-danger"></span>
                                    <input placeholder="Enter username" type="text" class="form-control" id="full_name" aria-describedby="emailHelp" name="username" value="<?php echo $admin->username; ?>">
                                  </div>
                                  <div class="phone">
                                    <label for="matricule" class="form-label">Phone</label> <span class="valid text-danger"></span>
                                    <input placeholder="Enter phone" type="text" class="form-control" id="matricule" aria-describedby="emailHelp" name="phone" value="<?php echo $admin->phone; ?>">
                                  </div>
                                </div>
                                <div class="mb-4 d-flex gap-4">
                                  <div class="name">
                                    <label for="password" class="form-label">password</label> <span class="valid text-danger"></span>
                                    <input placeholder="Enter password" type="password" class="form-control" id="name" aria-describedby="emailHelp" name="password" value="<?php echo $admin->password; ?>">
                                  </div>
                                  <div class="phone">
                                    <label for="cpassword" class="form-label"> confirmer password</label> <span class="valid text-danger"></span>
                                    <input placeholder="confirm password" type="password" class="form-control" id="cpassword" aria-describedby="emailHelp" name="cpassword">
                                  </div>
                                </div>
                                <div class="button">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="submitContact" class="btn btn-primary">add</button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>