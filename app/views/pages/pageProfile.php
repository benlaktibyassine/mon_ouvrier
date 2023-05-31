<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo URLROOT; ?>/public/images/logo.svg">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/bootstrap/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/bootstrap/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/wow.js/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/wow.js/css/libs/animate.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        .main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            margin-top: 150px;
        }

        .full-boxer {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .box-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .comment-box:hover {
            margin-top: 12px;
        }

        .comment-box {
            width: 500px;
            background: white;
            padding: 20px;
            margin: 15px;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 3px 3px 25px rgba(0, 0, 0, 0.3);
        }

        .Profile {
            display: flex;
            align-items: center;
        }

        .profile-image {
            width: 70px;
            height: 70px;
            box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            border-radius: 50%;
            margin-right: 10px;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .Name {
            display: flex;
            flex-direction: column;
            margin-left: 10px;
        }

        .Name strong {
            color: black;
            font-size: 18px;
        }

        .Name span {
            color: gray;
            margin-top: 2px;
        }

        .comment p {
            color: black;
        }

        #img {
            width: 250px;

        }

        h4 {
            text-align: center;
        }
    </style>
    <title>Profile</title>
</head>

<body>

    <?php include_once APPROOT . '/views/inc/navbar.php'; ?>
    <main class="m-0 bg-light">


        <div class="container p-3">
            <div class="row d-flex justify-content-center">
                <div class="col d-flex ">

                    <img id="img" class="rounded float-start" src="<?php echo URLROOT ?>/public/upload/<?php echo $data[1]->img; ?>" alt="profile-pic">
                </div>

                <div class="col">
                    <div class="row">
                        <div class="row">
                            <h1 class="text-center text-black" style="text-transform: uppercase;">
                                <?php echo $data[1]->nom . " " . $data[1]->prenom ?>
                            </h1>
                        </div>
                        <div class="col">
                            <div class="row">
                                <ul>
                                    <li class="h4 list-group-item">
                                        <a href="mailto:<?php echo $data[1]->email  ?>"> <i class="fa-solid fa-envelope"></i></a> Email:
                                        <?php echo $data[1]->email;  ?>
                                    </li>

                                    <li class="h4 list-group-item">
                                        <i class="fa-solid fa-briefcase"></i> Metier : <?php echo $data[1]->metier  ?>
                                    </li>

                                    <li class="h4 list-group-item">
                                        <a href="tel:<?php echo $data[1]->phone  ?>"> <i class="fa-solid fa-phone"></i></a> Telphone : <?php echo $data[1]->phone  ?>
                                    </li>

                                    <li class="h4 list-group-item">
                                        <i class="fa-solid fa-location-dot"></i> Ville : <?php echo $data[1]->ville  ?>
                                    </li>
                                    <li class="h4 list-group-item">
                                        <i class="fa-solid fa-location-dot"></i> Description : <?php echo $data[1]->description  ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php if (count($data[2]) != 0) { ?>

        <h3 class="text-center">Works</h3>
    
    <section class="d-flex  flex-wrap container">

        <?php

        foreach ($data[2] as $imgsrc) {
        ?>
            <div class="col-4" style="height: 150px;">
                <div class=" btn-cat img-hover wow animate__animated animate__bounceInLeft animate__slow  position-relative rounded col-12   mt-3 overflow-hidden" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img class="img-fluid w-100 h-100" src="<?php echo URLROOT; ?>/public/images/<?php echo $imgsrc->img; ?>">
                    <div class=" w-100 hover-section-img text-white px-3 py-1  d-flex flex-column justify-content-center align-items-center position-absolute end-0">
                        <h4><?php echo $imgsrc->description ?></h4>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </section>
    <?php  } ?>
    <?php if (count($data[3]) != 0) { ?>


        <h3 class="text-center">Reviews</h3>
   
    <section class="main">
        <hr />
        <div class="full-boxer">
            <?php
            foreach ($data[3] as $review) {

            ?>

                <div class="comment-box">
                    <div class="box-top">
                        <div class="Profile">
                            <div class="profile-image">
                                <img src="<?php echo URLROOT ?>/public/upload/<?php echo $review->img; ?>">
                            </div>
                            <div class="Name">


                                <strong><?php echo $review->nom . " " . $review->prenom ?></strong>
                                <?php if (isset($_SESSION['id']) &&  $_SESSION['id'] == $review->from_id) { ?> <span><a href="<?php echo URLROOT ?>/TechController/deleteReview?rev=<?php echo $review->id_review ?>&id_tech=<?php echo $data[1]->Id_tech ?>"><i class="fa fa-trash"></i></a></span><?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <p>
                            <?php echo $review->content ?>
                        </p>
                    </div>
                </div>
            <?php  }
            ?>

        </div>
    </section>
    <?php  } ?>

    <div class="container my-3">
        <form action="<?php echo URLROOT ?>/TechController/addReview/<?php echo $data[1]->Id_tech; ?>" method="post">
            <div class="row">
                <div class="col">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a review here" id="floatingTextarea2" style="height: 100px ;" name="content"></textarea>
                        <label for="floatingTextarea2">Write your review</label>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col d-flex justify-content-center">
                    <button class="btn btn-primary">Submit review</button>
                </div>
            </div>
        </form>

    </div>

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