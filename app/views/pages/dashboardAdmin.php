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
                        foreach ($data[4] as $lastTech) :
                        ?>
                            <div class="user d-flex gap-3">
                                <img class="rounded-circle" src="<?php echo URLROOT ?>/public/upload/<?php echo $lastTech->img; ?>" alt="" width="50">
                                <div>
                                    <h5><?php echo $lastTech->nom . ' ' . $lastTech->prenom ?></h5>

                                </div>
                            </div>
                        <?php endforeach;
                        ?>
                    </div>
                </div>

                <div class="col-12 col-lg-5 shadow-lg p-3 mb-5 bg-body rounded">
                    <canvas id="subsChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        function drawChart(data) {
  const months = [
    'January', 'February', 'March', 'April', 'May', 'June', 'July',
    'August', 'September', 'October', 'November', 'December'
  ];

  const chartData = {
    labels: [],
    datasets: [{
      label: 'Subscriptions',
      data: [],
      backgroundColor: getRandomColor(),
      borderWidth: 1
    }]
  };

  data.forEach((row) => {
    const monthName = months[row.month - 1];
    const year = row.year;
    const subsCount = row.subs_count;

    chartData.labels.push(monthName + ' ' + year);
    chartData.datasets[0].data.push(subsCount);
  });

  const ctx = document.getElementById('subsChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: chartData,
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          precision: 0
        }
      }
    }
  });
}

        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
        var data = <?php echo json_encode($data[7]); ?>;
        drawChart(data)
    </script>
    <!--Container Main end-->
    <!--Container Main end-->
    <?php include_once APPROOT . '/views/inc/linkJS.php'; ?>