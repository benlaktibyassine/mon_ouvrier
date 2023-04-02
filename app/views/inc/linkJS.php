<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>

(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
<script src="<?php echo URLROOT ?>/wow.js/dist/wow.js"></script>
<script src="<?php echo URLROOT ?>/js/main.js"></script>
<script src="<?php echo URLROOT ?>/js/dashboard.js"></script>
<script src="<?php echo URLROOT ?>/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo URLROOT ?>/js/validation.js"></script>
<script src="<?php echo URLROOT ?>/cities.json"></script>
<script src="<?php echo URLROOT ?>/js/dashboardAdmin.js"></script>
<script src="<?php echo URLROOT ?>/js/getCities.js"></script>

<!-- <script src="<?php echo URLROOT ?>/js/dashboardUser.js"></script> -->

</body>
</html>