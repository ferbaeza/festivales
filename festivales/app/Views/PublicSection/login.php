<?= $this->extend('PublicSection/baseLayout') ?>
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('assets/PublicSection/css/login.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('js') ?>
  <script type="text/javascript">
    $(document).ready(function(){
      console.log('READY!');
    });

    $('#formLogin').on("submit", function(event){
      event.preventDefault();
      let data = new FormData(this);

      $.ajax({
      url: "<?= route_to("saveForm")  ?>";
      type: "POST",
      data:data,
      processData: false,
      contentType: false,
      async: true,
      timeout: 10000,
      beforeSend: ( xhr ) =>{},
      succes: (response)=>{
        $(this).trigger("reset");
        alert("Petcion OK");
      },
      error: (xhr, status, error)=>{
        alert("Ha habido un error");
      },
      complete: () =>{}

    });

    });



  </script>
<?= $this->endSection() ?>


<?= $this->section('title')?>
  Login
<?= $this->endSection() ?>


<?= $this->section('login')  ?>
<div class="main_login">
  <div class="logo">
      <img id="logo" src="<?= base_url('assets/PublicSection/img/logo.png')?>"/>
</div>
  <form id="formLogin" method="POST">
    <h1 id="signin">Please sign in</h1>
    <div class="mb-3">
      <input name="mail" placeholder="Email adress" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
      <input name="passwd" placeholder="Password" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary" id="subLogin">Submit</button>
  </form>
</div><br>



<div class="backhome">
  <p id="log_p"><i class='fas fa-copyright'></i>2021_<?= date('Y') ?> Fernando Baeza CodeIgniter Project <i class='fas fa-registered'></i></p>
  <a href="<?= route_to("home")?>">Inicio Publico</a>
  <a href="<?= route_to("home_admin")?>">Incio Privado</a>
</div>








<?= $this->endSection() ?>