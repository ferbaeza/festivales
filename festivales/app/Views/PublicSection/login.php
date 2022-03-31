<?= $this->extend('PublicSection/baseLayout') ?>
<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/PublicSection/css/login.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script type="text/javascript">
  $(document).ready(function() {
    //console.log('READY!');


    $('#formLogin').on("submit", function(event) {
      event.preventDefault();
      let data = new FormData(this);

      $.ajax({
        url: "<?= route_to("login") ?>",
        type: "POST",
        data: data,
        processData: false,
        contentType: false,
        async: true,
        timeout: 10000,
        beforeSend: (xhr) => {},
        success: (response) => {
          $('.toast').toast('show')
          let data = JSON.parse(response);
          console.log("Peticion recibida");
          console.log(data);
          console.log(data.data.mail);
          if (data.message == "Password de usuariuo no coincide") {
            console.log(data.message);
            $("#bg-primary").removeClass('toast align-items-center text-white bg-primary border-0').addClass('toast align-items-center text-white bg-danger border-0')
          }
          if (data.message == "Usuario no encontrado") {
            console.log(data.message);
            $("#bg-primary").removeClass('toast align-items-center text-white bg-primary border-0').addClass('toast align-items-center text-white bg-danger border-0')
          }
          toast.innerHTML = data.message;


          if (data.data.rol == "admin") {
            console.log("Admin entry correctly");
            window.location.replace('<?= route_to("home_admin") ?>');
          } else if (data.data.rol == 'app_client') {
            console.log("Public entry correctly");
            window.location.replace('<?= route_to("home") ?>');
          }
          $(this).trigger("reset");
        },
        error: (xhr, status, error) => {
          alert("Ha habido un error en el envio de datos del Form");
        },
        complete: () => {}

      });

    });

  });
</script>
<?= $this->endSection() ?>




<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>





<?= $this->section('login')  ?>
<div class="main_login">
  <div class="logo">
    <img id="logo" src="<?= base_url('assets/PublicSection/img/logo.png') ?>" />
  </div>
  <form id="formLogin" method="POST">
    <h1 id="signin">Please sign in</h1>
    <div class="mb-3">
      <input name="mail" placeholder="Email adress" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
      <input name="passwd" placeholder="Password" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary" id="subLogin">Submit</button>
  </form>
</div><br>




<div class="toast" style=" height: 3em; position: absolute; margin-top: 2em; text-align: right;">
  <div class="toast align-items-center text-white bg-primary border-0" id="bg-primary" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body" id="toast">

      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>
<div class="backhome">
  <p id="log_p"><i class='fas fa-copyright'></i>2021_<?= date('Y') ?> Fernando Baeza CodeIgniter Project <i class='fas fa-registered'></i></p>
  <a href="<?= route_to("home") ?>">Inicio Publico</a>
  <a href="<?= route_to("home_admin") ?>">Incio Privado</a>
</div>








<?= $this->endSection() ?>