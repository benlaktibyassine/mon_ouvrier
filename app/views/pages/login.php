<?php include_once APPROOT . '/views/inc/head.php'; ?>
<body class="bg-blue">
<?php include_once APPROOT . '/views/inc/navbar.php'; ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1  bg-register-image"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                    <?php if(isset($data['error'])){?>
                                        <span class="alert alert-danger text-center py-1 mb-2">email or password not valid</span>
                                    <?php } ?>
                                        <h4 class="text-dark mb-4">مرحبًا بك مرة أخرى</h4>
                                    </div>

                                    <form class="user g-3 needs-validation" method="POST" action="<?php echo URLROOT ?>/TechController/login" novalidate>
                                        <div class="mb-3"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="...عنوان البريد الإلكتروني" name="email"value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>
                                       </div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="كلمة مرور" name="password" required></div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <!-- <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div> -->
                                            </div>
                                        </div><button class="btn btn-yellow d-block btn-user w-100" type="submit">تسجيل الدخول</button>
                                        <hr>
                                        
                                    </form>
                                    <div class="text-center"><a class="small" href="<?php echo URLROOT ?>/pages/register">!إنشاء حساب</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <?php include_once APPROOT . '/views/inc/linkJS.php'; ?>
