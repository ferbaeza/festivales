<?= $this->extend('PublicSection/baseLayout') ?>
<?= $this->section('header')  ?>
<header>

	<nav class="nav nav-pills flex-column flex-sm-row">
		<a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="<?= route_to("/home")?>">Home</a>
		<a class="flex-sm-fill text-sm-center nav-link" href="<?= route_to("login")?>">Login</a>
		<a class="flex-sm-fill text-sm-center nav-link" href="<?= route_to("home_admin")?>">Admin</a>
		<a class="flex-sm-fill text-sm-center nav-link" href="<?= route_to("docs")?>">Dosc</a>
		<a class="flex-sm-fill text-sm-center nav-link" href="<?= route_to("contacto")?>">Contacto</a>

	</nav>



</header>
<?= $this->endSection() ?>

