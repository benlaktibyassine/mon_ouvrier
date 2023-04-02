<?php include_once APPROOT . '/views/inc/head.php'; ?>

<body id="body-pd" class="body-dash">
<?php include_once APPROOT . '/views/inc/dashboard/navbar.php'; ?>

<?php include_once APPROOT . '/views/inc/dashboard/sidebar.php'; ?>

  <!--Container Main start-->
  <div class="mt-7">
    <div class="row justify-content-center mt-5">
      <div class="col-md-4 ">
          <div class="stat-card bg-white">
              <div class="stat-card__content">
                  <h4 class="text-uppercase mb-1">Users</h4>
                  <h2><i class="fa fa-dollar"></i><?php echo $data[1]; ?></h2>
                  
              </div>
              <div class="stat-card__icon stat-card__icon--primary">
                  <div class="stat-card__icon-circle">
                      <i class="fa fa-users"></i>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="stat-card bg-white">
              <div class="stat-card__content">
                  <h4 class="text-uppercase mb-1">Admins</h4>
                  <h2><?php echo $data[2]; ?></h2>
              </div>
              <div class="stat-card__icon stat-card__icon--primary">
                  <div class="stat-card__icon-circle">
                      <i class="fa fa-users"></i>
                  </div>
              </div>
          </div>
      </div>

      <div class="col-md-4">
        <div class="stat-card bg-white">
            <div class="stat-card__content">
                <h4 class="text-uppercase mb-1">Categories</h4>
                <h2><?php echo $data[3]; ?></h2>
                
            </div>
            <div class="stat-card__icon stat-card__icon--primary">
                <div class="stat-card__icon-circle">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
    </div>


    <div class="row gap-lg-5">
      <div class="new-users col-12 col-lg-6 shadow-lg p-3 mb-5 bg-body rounded">
        <h5>new Users</h5>
        <hr>
        <div class="users d-flex flex-column gap-3">

        <?php 
        foreach ($data[4] as $lastTech):
           ?>
          <div class="user d-flex gap-3">
            <img class="rounded-circle" src="<?php echo URLROOT ?>/public/upload/<?php echo $lastTech->img; ?>" alt="" width="50">
            <div>
              <h5><?php echo $lastTech->nom.' '.$lastTech->prenom?></h5>
              <!-- <span class="h6">4 hours ago</span> -->
            </div>
          </div>

          <?php endforeach; 
          $cat = [];
          foreach ($data[5] as $nom) {
            $cat[] = $nom->nom;
          }
          ?>
        </div>
      </div>
  
      <div class="categories col-12 col-lg-5 shadow-lg p-3 mb-5 bg-body rounded">
        <canvas id="myChart" width="400" height="300"></canvas>
      </div>
    </div>
  </div>
  
  </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($cat); ?>,
        datasets: [{
            label: '# of techniciens',
            data:<?php echo json_encode($data[6]); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
  <!--Container Main end-->
  <!--Container Main end-->
  <?php include_once APPROOT . '/views/inc/linkJS.php'; ?>
