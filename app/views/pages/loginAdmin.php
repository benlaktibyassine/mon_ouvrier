<?php include_once APPROOT . '/views/inc/head.php'; ?>

<body class="bg-blue">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-5 col-xl-5">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                                <div class="p-5">
                                    <div class="text-center">
                                    <?php if(isset($_GET['error'])){?>
                                        <span class="alert alert-danger text-center py-1 mb-2">email or password not valid</span>
                                    <?php } ?>
                                        <h4 class="text-dark mb-4">Login Admin</h4>
                                    </div>
                                    <form class="user" method="POST" action="<?php echo URLROOT ?>/AdminController/login">
                                        <div class="mb-3"><input class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter your username..." name="username"></div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password"></div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div><button class="btn btn-yellow d-block btn-user w-100" type="submit">Login</button>
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
