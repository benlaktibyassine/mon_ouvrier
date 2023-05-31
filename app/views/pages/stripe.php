<?php include_once APPROOT . '/views/inc/head.php'; ?>
<style>
    .card {
        --primary-clr: #1C204B;
        --dot-clr: #BBC0FF;
        --play: hsl(195, 74%, 62%);
        width: 200px;
        height: 170px;
        border-radius: 10px;
    }

    .card {
        font-family: "Arial";
        color: #fff;
        display: grid;
        cursor: pointer;
        grid-template-rows: 50px 1fr;
    }

    .card:hover .img-section {
        transform: translateY(1em);
    }

    .card-desc {
        border-radius: 10px;
        padding: 15px;
        position: relative;
        top: -10px;
        display: grid;
        gap: 10px;
        background: var(--primary-clr);
    }

    .card-time {
        font-size: 1.7em;
        font-weight: 500;
    }

    .img-section {
        transition: 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        background: hsl(195, 74%, 62%);
    }

    .card-header {
        display: flex;
        align-items: center;
        width: 100%;
    }

    .card-title {
        flex: 1;
        font-size: 0.9em;
        font-weight: 500;
    }

    .card-menu {
        display: flex;
        gap: 4px;
        margin-inline: auto;
    }

    .card svg {
        float: right;
        max-width: 100%;
        max-height: 100%;
    }

    .card .dot {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: var(--dot-clr);
    }

    .card .recent {
        line-height: 0;
        font-size: 0.8em;
    }
</style>

<body id="body-pd" class="body-dash">
    <?php include_once APPROOT . '/views/inc/dashboard/navbar.php'; ?>

    <?php include_once APPROOT . '/views/inc/dashboard/sidebar.php'; ?>
    <div class="conatiner m-3">
        <center class="">
        <div class="card work">
            <div class="img-section">
                <svg xmlns="http://www.w3.org/2000/svg" height="77" width="76">
                    <path fill-rule="nonzero" fill="#3F9CBB" d="m60.91 71.846 12.314-19.892c3.317-5.36 3.78-13.818-2.31-19.908l-26.36-26.36c-4.457-4.457-12.586-6.843-19.908-2.31L4.753 15.69c-5.4 3.343-6.275 10.854-1.779 15.35a7.773 7.773 0 0 0 7.346 2.035l7.783-1.945a3.947 3.947 0 0 1 3.731 1.033l22.602 22.602c.97.97 1.367 2.4 1.033 3.732l-1.945 7.782a7.775 7.775 0 0 0 2.037 7.349c4.49 4.49 12.003 3.624 15.349-1.782Zm-24.227-46.12-1.891-1.892-1.892 1.892a2.342 2.342 0 0 1-3.312-3.312l1.892-1.892-1.892-1.891a2.342 2.342 0 0 1 3.312-3.312l1.892 1.891 1.891-1.891a2.342 2.342 0 0 1 3.312 3.312l-1.891 1.891 1.891 1.892a2.342 2.342 0 0 1-3.312 3.312Zm14.19 14.19a2.343 2.343 0 1 1 3.315-3.312 2.343 2.343 0 0 1-3.314 3.312Zm0 7.096a2.343 2.343 0 0 1 3.313-3.312 2.343 2.343 0 0 1-3.312 3.312Zm7.096-7.095a2.343 2.343 0 1 1 3.312 0 2.343 2.343 0 0 1-3.312 0Zm0 7.095a2.343 2.343 0 0 1 3.312-3.312 2.343 2.343 0 0 1-3.312 3.312Z"></path>
                </svg>
            </div>
            <div class="card-desc">
                <div class="card-header">
                    <div class="card-title">Play</div>
                    <div class="card-menu">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                </div>
                <div class="card-time">Stripe infos</div>
            </div>
        </div></center>
    </div>
    <form action="<?php echo URLROOT . '/AdminController/updateStripe/' . $data[1][0]->id ?>" method="post" class="">
        <div class="conatiner p-4 mt-2">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label" for="last_name"><strong>Stripe secret key</strong></label><input class="form-control" type="text" id="last_name" placeholder="Description" name="secret" value="<?php echo $data[1][0]->secret; ?>" required>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label" for="last_name"><strong>Product price Id</strong></label><input class="form-control" type="text" id="last_name" placeholder="Description" name="price_id" value="<?php echo $data[1][0]->price_id; ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <center>
                    <button class="btn btn-primary">Modifier</button>
                </center>
            </div>
        </div>
    </form>
    <?php include_once APPROOT . '/views/inc/linkJS.php'; ?>