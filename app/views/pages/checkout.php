<?php include_once APPROOT . '/views/inc/head.php'; ?>

<style>
  .header {
    background: #00C9FF;
  }

  .bi {
    color: #00C9FF;
  }

  .price {
    color: white;
    font-size: 150px;
    font-weight: 800;
    padding-top: -80% !important;
  }

  /* The flip card container - set the width and height to whatever you want. We have added the border property to demonstrate that the flip itself goes out of the box on hover (remove perspective if you don't want the 3D effect */
  .flip-card {
    background-color: transparent;
    width: auto;
    height: auto;
    perspective: 1000px;
    /* Remove this if you don't want the 3D effect */
  }

  /* This container is needed to position the front and back side */
  .flip-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    text-align: center;
    transition: transform 0.8s;
    transform-style: preserve-3d;
  }

  /* Do an horizontal flip when you move the mouse over the flip box container */
  .flip-card:hover .flip-card-inner {
    transform: rotateY(180deg);
  }

  /* Position the front and back side */
  .flip-card-front,
  .flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    -webkit-backface-visibility: hidden;
    /* Safari */
    backface-visibility: hidden;

  }

  /* Style the front side (fallback if image is missing) */
  .flip-card-front {
    background-color: #D1B000;
    color: white;
    height: auto;
    padding: 50px 0px;
    border-radius: 26px;
    box-shadow: 0px 0px 25px #0000005e;
  }

  /* Style the back side */
  .flip-card-back {
    background-color: white;
    color: black;
    transform: rotateY(180deg);
    border-radius: 26px;
    padding: 50px 0px;
  }
</style>

</head>

<body>





  <body id="body-pd">

    <div class="conatiner">
      <h2 class="text-center text-black">
        Plan d'abonement
      </h2>
      <div class="row align-items-center justify-content-center p-5">
        <div class="col-lg-4 col-md-12 m">
          <div class="h-100 flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">

                <span class="price">$1</span><br>Par mois
               
              </div>
              <div class="flip-card-back">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                      <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                    </svg>Avoir un accées à l'application</li>
                  <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                      <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                    </svg> Accès exclusif aux offres d'emplois</li>
                  <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                      <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                    </svg> Accès à des ressources supplémentaires</li>
                </ul>
                <form action="<?php echo URLROOT ?>/TechController/Abonner" method="POST">
                  <button type="submit" id="checkout-button" class="my-5 btn btn-outline-success btn-lg">Subscribe</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="row">

          <h3 class="text-center text-success">Buy Subscription</h3>

          <div class="col-5 bg-green">
            <div class="product">
              <div class="description">
                <h5>$1.00</h5>
              </div>
              <form action="<?php echo URLROOT ?>/TechController/Abonner" method="POST">
                <button type="submit" id="checkout-button">Checkout</button>
              </form>
            </div>
          </div>
        </div> -->
      </div>
      <script src="https://js.stripe.com/v3/"></script>
  </body>

  </html>