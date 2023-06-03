<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        if (isset($data['title'])) {
            echo $data['title'];
        } else {
            echo $data[0]["title"];
        }
        ?>
    </title>
    <link rel="icon" href="<?php echo URLROOT; ?>/public/images/logo.svg">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/bootstrap/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/bootstrap/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/wow.js/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/wow.js/css/libs/animate.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        #h3 {
            z-index: 99;
            color: #fbd232;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>