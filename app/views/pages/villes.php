<?php include_once APPROOT . '/views/inc/head.php'; ?>

<body id="body-pd" class="body-dash">
    <?php include_once APPROOT . '/views/inc/dashboard/navbar.php'; ?>

    <?php include_once APPROOT . '/views/inc/dashboard/sidebar.php'; ?>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
            font-size: 14px;
            text-align: center;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .subscribe {
            position: relative;
            height: 100px;
            width: 240px;
            padding: 20px;
            background-color: #FFF;
            border-radius: 4px;
            color: #333;
            box-shadow: 0px 0px 60px 5px rgba(0, 0, 0, 0.4);
        }

        .subscribe:after {
            position: absolute;
            content: "";
            right: -10px;
            bottom: 18px;
            width: 0;
            height: 0;
            border-left: 0px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid #1a044e;
        }

        .subscribe p {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 4px;
            line-height: 28px;
        }

        .subscribe input {
            position: absolute;
            bottom: 30px;
            border: none;
            border-bottom: 1px solid #d4d4d4;
            padding: 10px;
            width: 82%;
            background: transparent;
            transition: all .25s ease;
        }

        .subscribe input:focus {
            outline: none;
            border-bottom: 1px solid #0d095e;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', 'sans-serif';
        }

        .subscribe .submit-btn {
            position: absolute;
            border-radius: 30px;
            border-bottom-right-radius: 0;
            border-top-right-radius: 0;
            background-color: #0f0092;
            color: #FFF;
            padding: 12px 25px;
            display: inline-block;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 5px;
            right: -10px;
            bottom: -20px;
            cursor: pointer;
            transition: all .25s ease;
            box-shadow: -5px 6px 20px 0px rgba(26, 26, 26, 0.4);
        }

        .subscribe .submit-btn:hover {
            background-color: #07013d;
            box-shadow: -5px 6px 20px 0px rgba(88, 88, 88, 0.569);
        }
    </style>
    <div class="container">

        <?php if (isset($_GET['error'])) {

            echo "<div class='alert alert-danger' role='alert'>
        <p class='text-center'>".$_GET['error']."</p>
        </div>";
        } ?>
        <div class="d-flex align-items-center justify-content-center">
            <div class="subscribe mb-5 mt-2">

                <form action="<?php echo URLROOT ?>/AdminController/AddCity" method="POST">
                    <input placeholder="Ville" class="subscribe-input" name="ville" type="text" >
                    <br>
                    <button class="submit-btn" style="border: none;">Ajouter</button>
                </form>
            </div>
        </div>
        <h1 class="text-center">Liste Des Villes</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>City Name</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data[1] as $city) : ?>
                    <tr>
                        <td><?php echo $city->id_ville; ?></td>
                        <td><?php echo $city->nom_ville; ?></td>
                        <td><a class="btn btn-danger btn-sm btnDelete" href="<?php echo URLROOT ?>/AdminController/DeleteCity/<?php echo $city->id_ville ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include_once APPROOT . '/views/inc/linkJS.php'; ?>