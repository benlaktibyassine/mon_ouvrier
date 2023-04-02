<?php include_once APPROOT . '/views/inc/head.php'; ?>


<body>
  <?php include_once APPROOT . '/views/inc/navbar.php';
  ?>

  <main>

    <div class=" container">

      <?php if (empty($data[1])) { ?>
        <div class="my-5 d-flex flex-column justify-content-center align-items-center">
          <div class="alert alert-danger text-center h3">Not result</div>
          <a class="btn btn-yellow" href="<?php echo URLROOT ?>">Search</a>

        </div>
      <?php } else { ?>

        <div class="conatiner">
          <div class="row">
            <div class="cards-profile text-dark  d-flex flex-column flex-lg-row gap-4 justify-content-center align-items-center">
              <?php
              foreach ($data[1] as $tech) :
              ?>
                <div class="col mx-auto">
                  <p class="d-block">
                  <div data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $tech->Id_tech ?>" class="col-4 card-profile shadow p-3 mb-5 bg-body rounded position-relative wow animate__animated animate__fadeInBottomLeft animate__fast">
                    <img class=" position-absolute top-0 start-0 w-100" src="<?php echo URLROOT; ?>/public/images/cover-cards.png" alt="card-profile">
                    <h4 class="position-absolute metier-card"><?php echo $tech->metier ?></h4>
                    <div class="img-card-profile position-absolute rounded-circle">
                      <img class="rounded-circle img-fluid p-2" src="<?php echo URLROOT ?>/public/upload/<?php echo $tech->img; ?>" alt="img-profile">
                    </div>
                    <div class="mt-6 d-flex flex-column justify-content-between align-items-center">
                      <h3><?php echo $tech->nom . ' ' . $tech->prenom ?></h3>
                      <p class="text-center">We let our quality work
                        and commitment to customer
                        satisfaction be our slogan.</p>
                      <button class="btn btn-yellow">consult</button>
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
                    </p>
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
            
          </div>

        <?php } ?>



  </main>

  <?php include_once APPROOT . '/views/inc/footer.php'; ?>

  <div class="up-top" style="color:aliceblue">
    <i class="fas fa-angle-up" style="color:aliceblue"></i>
  </div>


  <?php include_once APPROOT . '/views/inc/linkJS.php'; ?>
  <script>
    wow = new WOW({
      animateClass: 'animated',
      offset: 100,
      callback: function(box) {
        console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
      }
    });
    wow.init();
    document.getElementById('moar').onclick = function() {
      var section = document.createElement('section');
      section.className = 'section--purple wow fadeInDown';
      this.parentNode.insertBefore(section, this);
    };
  </script>