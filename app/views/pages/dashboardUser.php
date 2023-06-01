<?php include_once APPROOT . '/views/inc/head.php'; ?>

<body id="body-pd">
  <?php include_once APPROOT . '/views/inc/dashboard/navbar.php'; ?>


  <?php include_once APPROOT . '/views/inc/dashboard/sidebaruser.php';

  ?>

  <!--Container Main start-->
  <form class="g-3 needs-validation" method="POST" action="<?php echo URLROOT . '/TechController/updateTech/' . $data[1]->Id_tech; ?>" enctype="multipart/form-data" novalidate>
    <div class="mt-7 container">
      <?php if ($data[6] == false) {

        echo "<div class='alert alert-danger' role='alert'>
        <p class='text-center'>  
      !!انتهت صلاحية اشتراكك، لن يظهر ملفك الشخصي في موقعنا  
      </p>
      <p class='text-center  mb-0'><a class='btn btn-warning' href='".URLROOT."/pages/payement'>😁اشترك الآن</a></p>
    </div>";
      } ?>
      <div class="row gap-lg-2">
        <div class="img ms-2 card-body text-center shadow col-12 col-lg-3 bg-body rounded h-50                                                 ">
          <h5>صورة الملف الشخصي</h5>
          <hr>
          <div class="d-flex flex-column justify-content-center">
            <label for="img"><img class="rounded-circle mb-3 mt-4" src="<?php echo URLROOT ?>/public/upload/<?php echo $data[1]->img; ?>" width="160" height="160"></label>
            <input class="invisible" type="file" name="img" id="img">
            <div>
              <label for="img" class="btn btn-primary btn-sm"> تغيير الصورة</label>
            </div>
          </div>
        </div>

        <div class="categories col-12 col-lg-8 shadow-lg p-3 mb-5 bg-body rounded">
          <h5>إضافة جميع المعلومات</h5>
          <hr>

          <div class="row">
            <div class="col">
              <div class="mb-3"><label class="form-label" for="username"><strong>اسم المستخدم</strong></label><input class="form-control" type="text" id="username" placeholder="اسم المستخدم" name="username" value="<?php echo $data[1]->nom . ' ' . $data[1]->prenom  ?>" required></div>
            </div>
            <div class="col">
              <div class="mb-3"><label class="form-label" for="email"><strong>عنوان البريد الإلكتروني</strong></label><input class="form-control" type="email" id="email" placeholder="عنوان البريد الإلكتروني" name="email" value="<?php echo $data[1]->email; ?>" required></div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="mb-3"><label class="form-label" for="first_name"><strong>الاسم الأول</strong></label><input class="form-control" type="text" id="first_name" placeholder="الاسم الأول" name="nom" value="<?php echo $data[1]->nom; ?>" required></div>
            </div>
            <div class="col">
              <div class="mb-3"><label class="form-label" for="last_name"><strong>الاسم الأخير</strong></label><input class="form-control" type="text" id="last_name" placeholder="الاسم الأخير" name="prenom" value="<?php echo $data[1]->prenom; ?>" required></div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label class="form-label" for="city"><strong>المدينة</strong></label>

              <select class="form-control select-city" name="ville" id="nom_ville" required>
                <option selected value="<?php echo $data[4]->id_ville ?>"><?php echo $data[4]->nom_ville ?></option>
                <?php foreach ($data[3] as $city) : ?>
                  <option value="<?php echo $city->id_ville ?>"><?php echo $city->nom_ville ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col">
              <div class="mb-3">
                <label class="form-label" for=""><strong>الأحياء </strong></label>
                <select class="form-control" name="secteur" id="secteurs" required>
                  <option value="<?php echo $data[1]->secteur ?>"><?php echo $data[1]->secteur ?></option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="mb-3">
                <label class="form-label" for="last_name"><strong>الهاتف</strong></label><input class="form-control" type="text" id="last_name" placeholder="Phone" name="phone" value="<?php echo $data[1]->phone; ?>" required>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="mb-3">
                <label class="form-label" for="last_name"><strong>الوصف</strong></label><input class="form-control" type="text" id="last_name" placeholder="Description" name="description" value="<?php echo $data[1]->description; ?>" required>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="mb-3">
                <label class="form-label" for="metier"><strong>المهنة</strong></label>
                <select class="form-control" name="job" id="metier" required>
                  <option selected value="<?php echo $data[5]->Fk_cat ?>"><?php echo $data[5]->nom ?></option>
                  <?php foreach ($data[2] as $cat) : ?>
                    <option value="<?php echo $cat->id_cat ?>"><?php echo $cat->nom ?></option>
                  <?php endforeach; ?>


                </select>
              </div>

            </div>
            <div class="col">
              <div class="mb-3"><label class="form-label" for="last_name"><strong>العنوان</strong></label><input class="form-control" type="text" id="last_name" placeholder="Adresse" name="adresse" value="<?php echo $data[1]->adresse; ?>" required></div>
            </div>
          </div>
          <div class="row">
            <p>
              <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              تغيير كلمة المرور
              </button>
            </p>
            <div class="collapse row w-100" id="collapseExample">
              <div class="col">
                <div class="mb-3"><label class="form-label" for="first_name"><strong>كلمة المرور</strong></label><input class="form-control" type="text" id="first_name" placeholder="password" name="password"></div>
              </div>
              <div class="col">
                <div class="mb-3"><label class="form-label" for="last_name"><strong>تأكيد كلمة المرور</strong></label><input class="form-control" type="text" id="last_name" placeholder="confirm password" name="last_name"></div>
              </div>
            </div>
          </div>
          <div class="mb-3 d-flex justify-content-end"><button class="btn btn-primary btn-sm" type="submit"> حفظ الإعدادات</button>
            <!-- <button class="btn btn-danger btn-sm btnDelete" data-bs-toggle="modal" data-bs-target="#exampleModal2"><span class="d-none"> <?php echo $data[1]->Id_tech ?></span>delete</button> -->
          </div>
        </div>
      </div>



    </div>
    </div>
    </div>
  </form>
  <!--Container Main end-->
  <!--Container Main end-->
  <?php include_once APPROOT . '/views/inc/dashboard/modalDelete.php'; ?>

  <?php include_once APPROOT . '/views/inc/linkJS.php'; ?>
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