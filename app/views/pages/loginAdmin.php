<?php include_once APPROOT . '/views/inc/head.php'; ?>

<body class="bg-blue">
    <?php include_once APPROOT . '/views/inc/navbar.php'; ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-5 col-xl-5">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                                <div class="p-5">
                                    <div class="text-center">
                                    <?php if(isset($_GET['error'])){?>
                                        <span class="alert alert-danger text-center py-1 mb-2"> البريد الإلكتروني أو كلمةالمرور غير صحيحة </span>
                                    <?php } ?>
                                        <h4 class="text-dark mb-4">تسجيل الدخول كمسؤول</h4>
                                    </div>
                                    <form class="user" method="POST" action="<?php echo URLROOT ?>/AdminController/login">
                                        <div class="mb-3"><input class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="...أدخل اسم المستخدم الخاص بك" name="username"></div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="كلمة المرور" name="password"></div>
                                        <button class="btn btn-yellow d-block btn-user w-100" type="submit">تسجيل الدخول</button>
                                        <div class="d-flex flex-column flex-lg-row">
                                        </div>
                                        <hr>
                                    </form>
                                    <!-- <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div> -->
                                </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once APPROOT . '/views/inc/linkJS.php'; ?>
