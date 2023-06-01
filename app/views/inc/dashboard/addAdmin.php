<div class="button-add-student">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">add admin</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog mt-5">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">إضافة مسؤول</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              <form class="p-3 g-3 needs-validation" id="formAdd" method="POST" action="<?php echo URLROOT ?>/AdminController/addAdmin" novalidate>
                              <p class="vide-msg alert-danger text-center "></p>
                                <div class="mb-4 d-flex gap-4">
                                  <div class="name">
                                    <label for="full_name" class="form-label"> اسم المستخدم</label> <span class="valid text-danger"></span>
                                    <input placeholder="Enter username" type="text" class="form-control" id="full_name" aria-describedby="emailHelp" name="username" required>
                                  </div>
                                  <div class="phone">
                                    <label for="matricule" class="form-label">الهاتف</label> <span class="valid text-danger"></span>
                                    <input placeholder="Enter phone" type="text" class="form-control" id="matricule" aria-describedby="emailHelp" name="phone" required>
                                  </div>
                                </div>
                                <div class="mb-4 d-flex gap-4">
                                  <div class="name">
                                    <label for="password" class="form-label">كلمة المرور</label> <span class="valid text-danger"></span>
                                    <input placeholder="Enter password" type="password" class="form-control" id="name" aria-describedby="emailHelp" name="password" required>
                                  </div>
                                  <div class="phone">
                                    <label for="cpassword" class="form-label"> تأكيد كلمة المرور</label> <span class="valid text-danger"></span>
                                    <input placeholder="confirm password" type="password" class="form-control" id="cpassword" aria-describedby="emailHelp" name="cpassword" required>
                                  </div>
                                </div>
                                <div class="button">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                    <button type="submit" name="submitContact" class="btn btn-primary">إضافة</button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>