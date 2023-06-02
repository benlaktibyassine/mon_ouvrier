<?php include_once APPROOT . '/views/inc/head.php'; ?>
<style>
    .drop-container {
        position: relative;
        display: flex;
        gap: 10px;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 200px;
        padding: 20px;
        border-radius: 10px;
        border: 2px dashed #555;
        color: #444;
        cursor: pointer;
        transition: background .2s ease-in-out, border .2s ease-in-out;
    }

    .drop-container:hover {
        background: #eee;
        border-color: #111;
    }

    .drop-container:hover .drop-title {
        color: #222;
    }

    .drop-title {
        color: #444;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        transition: color .2s ease-in-out;
    }

    input[type=file] {
        width: 350px;
        max-width: 100%;
        color: #444;
        padding: 5px;
        background: #fff;
        border-radius: 10px;
        border: 1px solid #555;
    }

    input[type=file]::file-selector-button {
        margin-right: 20px;
        border: none;
        background: #084cdf;
        padding: 10px 20px;
        border-radius: 10px;
        color: #fff;
        cursor: pointer;
        transition: background .2s ease-in-out;
    }

    input[type=file]::file-selector-button:hover {
        background: #0d45a5;
    }
</style>

<body id="body-pd" class="body-dash">
    <?php include_once APPROOT . '/views/inc/dashboard/navbar.php'; ?>

    <?php include_once APPROOT . '/views/inc/dashboard/sidebar.php'; ?>
    <?php if (isset($_GET['error'])) {

        echo "<div class='alert alert-danger' role='alert'>
    <p class='text-center'>" . $_GET['error'] . "</p>
  </div>";
    } ?>
    <div class="
    <div class=" container">
        <div class="row d-felx justify-content-center align-items-center">
            LOGO:
            <img class="me-4" src="<?php echo URLROOT . '/public/images/' . $data[1][0]->logo_src ?>" alt="logo" style="width:30% ;">
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="d-flex justify-content-center py-3">
                <form action="<?php echo URLROOT ?>/AdminController/updateLogo/<?php echo $data[1][0]->id ?>" method="POST" enctype="multipart/form-data">
                    <div class="m-2"><label class="m-2" for="">Job Picture :</label><input type="file" name="img" required></div>
                    <div class="d-flex justify-content-center py-3">
                        <button class="btn btn-primary">Edit logo</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <?php include_once APPROOT . '/views/inc/linkJS.php'; ?>
</body>