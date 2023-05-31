<?php include_once APPROOT . '/views/inc/head.php'; ?>

<body class="overflow-auto">
  <?php include_once APPROOT . '/views/inc/navbar.php';
  ?>

  <main>

  <div class="home position-relative">
  <div class="container d-flex flex-column-reverse justify-content-between align-items-center flex-md-row">
    <div class="img animate__animated animate__bounceInLeft animate__slow">
      <img src="<?php echo URLROOT; ?>/public/images/pngegg (6).png" alt="img" width="370">
    </div>
    <div class="info animate__animated animate__bounceInRight animate__slow animate__delay-1s d-flex gap-3 flex-column justify-content-center align-items-center">
      <h1 class="h1 text-white"><span class="text-yellow ">الخدمات</span> المهنية</h1>
      <p class="px-5 text-center text-white">
         🙂  موقع الويب الذي يمكنك من ايجاد فرصة عمل جديدة   
      </p>
      <div class="buttonHome">
        <a href="#search" class="btn btn-yellow btn-lg px-3 text-dark">البحث</a>
        <a href="<?php echo URLROOT ?>/pages/register" class="btn btn-yellow btn-lg text-dark">اضافة خدمة</a>
      </div>
      <ul class="social-media d-flex mt-3 animate__animated animate__bounceInLeft animate__delay-2s ">
        <li><a href="https://web.facebook.com/" target="_blank"><i class="fab fa-facebook-f h5 text-black"></i></a>
        </li>
        <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter h5 text-black"></i></a>
        </li>
        <li><a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin-in f h5 text-black"></i></a>
        </li>

      </ul>
    </div>
  </div>
</div>

<div class="mb-3 mt-5 container services d-flex flex-column  justify-content-center align-items-center gap-4">
  <div class="d-flex flex-column flex-lg-row align-items-center gap-5">
    <div class="wow animate__animated animate__bounceInLeft animate__fast d-flex align-items-center justify-content-center gap-4 me-lg-5">
      <span class="poligon bg-blue d-flex justify-content-center align-items-center">
        <i class="fas fa-tools text-white"></i>
      </span>
      <div>
        <h5>فني محترف</h5>
        <hr>
        <p>هدفنا هو تقديم أفضل خدمة فني لك.</p>
      </div>
    </div>

    <div class=" wow animate__animated animate__bounceInRight animate__slow ms-lg-5 d-flex align-items-center justify-content-center flex-row-reverse flex-lg-row gap-3">
      <span class="poligon bg-blue d-flex justify-content-center align-items-center">
        <i class=" text-white fas fa-hand-holding-usd"></i>
      </span>
      <div>
        <h5>أسعار معقولة</h5>
        <hr>
        <p>نقدم خدمة على مدار الساعة 24/7.
          في أي وقت تتصل بنا ، نحن نقدم لك الخدمة.</p>
      </div>
    </div>
  </div>


      <div class="wow animate__bounceInUp wow animate__animated animate__slow d-flex align-items-center justify-content-center gap-3">
        <span class="poligon bg-blue d-flex justify-content-center align-items-center">
          <i class=" text-white fas fa-clock"></i>
        </span>
        <div>
        <h5 id="search">الخدمات على مدار الساعة 24/7</h5>
          <hr>
          <p>نقوم بفحص الأعطال التي تحتاج إلى اهتمام للحفاظ على سلامتك وتوفير المال.</p>
        </div>
      </div>
    </div>

    <div class="search bg-blue">
      <div class="container d-flex flex-column-reverse flex-lg-row align-content-center justify-content-between">
        <div class="d-flex justify-content-center align-items-center">
          <img class="imag-search img-fluid" src="<?php echo URLROOT; ?>/public/images/pngegg (3).png" alt="" width="350">
        </div>
        <div class="d-flex align-items-center justify-content-center">
        <form class="my-5 d-flex flex-column w-100" method="GET" action="<?php echo URLROOT ?>/TechController/searchTech">
    <div class="input-group mb-3 w-100">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
        <select class="form-select form-select-md" aria-label=".form-select-sm example" name="city" id="nom_ville">
            <option selected>....البحث عن المدينة</option>
            <?php foreach ($data[2] as $city) : ?>
                <option value="<?php echo $city->id_ville; ?>"><?php echo $city->nom_ville; ?></option>
            <?php endforeach;  ?>
        </select>
    </div>
    <div class="input-group mb-3 w-100">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
        <select class="form-select form-select-md" aria-label=".form-select-sm example" name="secteur" id="secteurs">
            <option selected>....البحث عن القطاعات</option>
        </select>
    </div>
    <div class="input-group mb-3 text-dark">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span>
        <select class="form-select form-select-md" aria-label=".form-select-sm example" name="job">
            <option selected name="job">....البحث عن التخصص</option>
            <?php foreach ($data[1] as $job) : ?>
                <option value="<?php echo $job->id_cat ?>"><?php echo $job->nom; ?></option>
            <?php endforeach;  ?>
        </select>
    </div>
    <button type="submit" name="search" class="btn btn-yellow btn-md mt-2 text-dark">بحث</button>
</form>

        </div>
      </div>
    </div>

    <div class="metier container my-5" id="services">
      <div>
        <h5 id="searchy">البحث عن طريق الوظيفة</h5>
      </div>

      <div class="row">
        <?php foreach ($data[1] as $job) : ?>
          <div class=" btn-cat img-hover wow animate__animated animate__bounceInLeft animate__slow  position-relative rounded col-12 col-lg-4  mt-3 overflow-hidden" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <span class="d-none"><?php echo $job->id_cat; ?></span>
            <img class="img-fluid w-100 h-100" src="<?php echo URLROOT; ?>/public/images/<?php echo $job->img; ?>">

            <div class=" w-100 hover-section-img text-white px-3 py-1  d-flex flex-column justify-content-center align-items-center position-absolute end-0">
              <h4><?php echo $job->nom ?></h4>
              <p><?php echo $job->description ?> </p>
              <button class="btn btn-yellow text-dark">Consulter</button>

            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>


    <div class=" container">
      <div>
        <h5>أعلى ردود الفعل</h5>
      </div>

      <div class="cards-profile text-dark  d-flex flex-column flex-lg-row gap-4 justify-content-center align-items-center">
        <?php
        // die(var_dump($data[4]));
        foreach ($data[4] as $tech) :
        ?>

          <div data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $tech->Id_tech ?>" class="card-profile shadow p-3 mb-5 bg-body rounded position-relative wow animate__animated animate__fadeInBottomLeft animate__fast">
            <img class=" position-absolute top-0 start-0 w-100" src="<?php echo URLROOT; ?>/public/images/cover-cards.png" alt="card-profile">
            <h4 class="position-absolute metier-card"><?php echo $tech->metier ?></h4>
            <div class="img-card-profile position-absolute rounded-circle">
              <img class="rounded-circle img-fluid p-2 img-responsive h-140" src="<?php echo URLROOT ?>/public/upload/<?php echo $tech->img; ?>" alt="img-profile">
            </div>
            <div class="mt-6 d-flex flex-column justify-content-between align-items-center">
              <h3 id="h3"><?php echo $tech->nom . ' ' . $tech->prenom ?></h3>
              <p class="text-center"><?php echo $tech->description ?></p>
              <a class="btn btn-yellow" href="<?= URLROOT ?>/PagesController/pageProfile/<?= $tech->Id_tech ?>">consult</a>
              <div class="d-flex w-100 justify-content-between">
                <h4><?php echo $tech->ville; ?></h4>
                <span>
                  <?php for ($i = 1; $i < $tech->feedback; $i++) { ?>
                    <i class="fas fa-star text-yellow"></i>
                  <?php } ?>
                </span>
              </div>
            </div>
          </div>

          <!-- Modal view profile-->
          <div class="modal fade" id="exampleModal<?php echo $tech->Id_tech ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="info-ser">info user</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="user-info d-flex align-items-center">
                    <div class="user-info__img">
                      <img class="me-3" src="<?php echo URLROOT ?>/public/upload/<?php echo $tech->img; ?>" alt="User Img" width="55" height="55">
                    </div>
                    <div class="user-info__basic">
                      <h5 class="mb-0"><?php echo $tech->nom . " " . $tech->prenom; ?></h5>
                      <p class="text-muted mb-0"><?php echo $tech->email; ?></p>
                    </div>
                  </div>
                  <div class="mt-5">
                    <table class="table table-hover w-100">
                      <tbody>
                        <tr>
                          <th>phone</th>
                          <td><?php echo $tech->phone ?></td>
                        </tr>
                        <tr>
                          <th>city</th>
                          <td> <?php echo $tech->ville ?></td>
                        </tr>
                        <tr>
                          <th>job</th>
                          <td><?php echo $tech->metier ?></td>
                        </tr>
                        <tr>
                          <th>Adresse</th>
                          <td><?php echo $tech->adresse ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <!-- <button class="btn btn-yellow btn-feed" data-bs-toggle="modal" data-bs-target="#feedback"> <span class="d-none id-tech"><?php echo $tech->Id_tech ?></span> add feedback</button> -->
                </div>
              </div>
            </div>
          </div>



        <?php
        endforeach;
        ?>


        <!-- modal for feedback -->
        <div class="modal fade" id="feedback" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">add feedback</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <span>
                  <?php for ($i = 1; $i <= 5; $i++) { ?>
                    <i class="fas fa-star start-feedback"></i>
                  <?php } ?>
                </span>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button class="btn btn-yellow btn-feedback">add feedback</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>

  <?php include_once APPROOT . '/views/inc/footer.php'; ?>


  <div class="up-top" style="color:aliceblue">
    <i class="fas fa-angle-up" style="color:aliceblue"></i>
  </div>

  <!-- Modal get all city form database -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-7">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ville:</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <?php foreach ($data[2] as $city) : ?>
            <button class="btn btn-yellow btn-city m-1"><?php echo $city->nom_ville; ?></button>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

  <?php include_once APPROOT . '/views/inc/linkJS.php'; ?>
  <script>
    wow = new WOW({
      animateClass: 'animated',
      offset: 100,
      callback: function(box) {
        // console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
      }
    });
    wow.init();
    document.getElementById('moar').onclick = function() {
      var section = document.createElement('section');
      section.className = 'section--purple wow fadeInDown';
      this.parentNode.insertBefore(section, this);
    };
  </script>
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