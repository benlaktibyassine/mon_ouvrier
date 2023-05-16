<?php include_once APPROOT . '/views/inc/head.php'; ?>

<body class="bg-blue">
    <?php include_once APPROOT . '/views/inc/navbar.php'; ?>


    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image"></div>
                    </div>

                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>
                            <form class="user form-register" method="POST" action="<?php echo URLROOT ?>/TechController/register" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <input type="file" name="img" id="input" class="d-none">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user nom" type="text" id="exampleFirstName" placeholder="First Name" name="nom">
                                        <div class="alert alert-danger form-control-user py-1 text-center d-none valid">nom not valid</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-control form-control-user prenom" type="text" id="exampleFirstName" placeholder="Last Name" name="prenom">
                                        <div class="alert alert-danger form-control-user py-1 text-center d-none valid">prenom not valid</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user email" type="email" id="exampleFirstName" placeholder="email adresse" name="email">
                                        <div class="alert alert-danger form-control-user py-1 text-center d-none valid">email not valid</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-select form-select-md form-control form-control-user job" aria-label=".form-select-sm example" name="job">
                                            <!-- <option selected>select job</option> -->

                                            <?php foreach ($data[1] as $job) : ?>
                                                <option value="<?php echo $job->id_cat; ?>"><?php echo $job->nom; ?></option>
                                            <?php endforeach;  ?>

                                        </select>
                                        <div class="alert alert-danger form-control-user py-1 text-center d-none valid">job not valid</div>

                                    </div>
                                </div>
                                <div class="row mb-3">

                                    <div class="col-sm-6">
                                        <select class="form-select form-select-md form-control form-control-user job" aria-label=".form-select-sm example" name="city" id="nom_ville">

                                            <option disabled selected hidden>Villes</option>

                                            <?php foreach ($data[2] as $city) : ?>
                                                <option value="<?php echo $city->id_ville; ?>"><?php echo $city->nom_ville; ?></option>
                                            <?php endforeach;  ?>

                                        </select>

                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-select form-select-md form-control form-control-user job" aria-label=".form-select-sm example" name="secteur" id="secteurs">
                                            <option disabled selected hidden>Secteurs</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user pass" type="password" id="examplePasswordInput" placeholder="Password" name="password">
                                        <div class="alert alert-danger form-control-user py-1 text-center d-none valid">password not valid</div>
                                    </div>
                                    <div class="col-sm-6"><input class="form-control form-control-user cpass" type="password" id="exampleRepeatPasswordInput" placeholder="Repeat Password" name="Cpassword">
                                        <div class="alert alert-danger form-control-user py-1 text-center d-none valid">confirmPassword not valid</div>
                                    </div>
                                </div><button type="submit" name="submit" class="btn btn-yellow d-block btn-user w-100 submit">Register Account</button>
                                <hr>


                            </form>
                            <div class="text-center"><a class="small" href="<?php echo URLROOT ?>/pages/login">Already have an account? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      var villeSelect = document.getElementById('nom_ville');
      var secteursSelect = document.getElementById('secteurs');
      villeSelect.addEventListener('change', function() {
        var ville = this.value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo URLROOT ?>/catController/chercherSec', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
          if (this.readyState === 4 && this.status === 200) {
            var options = '';
            // console.log(this.responseText)
            var secteurs = JSON.parse(this.responseText);
            for (var i = 0; i < secteurs.length; i++) {
              options += '<option value="' + secteurs[i].secteur + '">' + secteurs[i].secteur + '</option>';
            }
            secteursSelect.innerHTML = options;
          }
        };
        xhr.send('ville=' + ville);
      });
    });
  </script>
    <?php include_once APPROOT . '/views/inc/linkJS.php'; ?>