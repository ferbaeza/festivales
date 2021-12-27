<?= $this->extend('Admin/admin_layout') ?>

<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('assets/Admin/css/homeAdmin.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('js') ?>
    <script type="text/javascript">
        $(document).ready(function(){
            console.log('READY!');
        });
    </script>
        <script type="text/javascript" src="<?= base_url('assets/Admin/js/nav.js')  ?>"></script>
<?= $this->endSection() ?>
<?= $this->section('title')?>
Admin Panel
<?= $this->endSection() ?>



<?= $this->section('homeAdmin')  ?>
<?php $session=session(); ?>


<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> 
            <i class='bx bx-menu' id="header-toggle"> </i> 
            
        </div>        
            <h1 class="shadow p-3 mb-5 bg-body rounded ms-1">Hi <?= $session->get("username");  ?></h1>

        <div class="">
        <div class="header_img">
            <img src="<?= base_url('assets/PublicSection/img/pop.jpg')?>" alt="logo"> 
        </div>


        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="#" class="nav_logo"> 
                    <i class='fas fa-solar-panel'></i> 
                    <span class="nav_logo-name">Panel Admin</span> 
                </a>
                <div class="nav_list"> 
                    <a href="#" class="nav_link active"> 
                        <i class='fas fa-home'></i>
                        <span class="nav_name">Inicio</span> </a> 
                    <a href="#" class="nav_link"> 
                        <i class='fas fa-music'></i> 
                        <span class="nav_name">Festivales</span> </a> 
                    <a href="#" class="nav_link"> 
                        <i class='fas fa-th'></i> 
                        <span class="nav_name">Categorias</span> </a> 
                    <a href="#" class="nav_link"> 
                        <i class='fas fa-users'></i> 
                        <span class="nav_name">Usuarios</span> </a> 
                    <a href="#" class="nav_link"> 
                        <i class='fas fa-user-tag'></i> 
                        <span class="nav_name">Roles</span> </a> 
                    <a href="#" class="nav_link"> 
                        <i class='fas fa-cogs'></i> 
                        <span class="nav_name">Configuracion</span> </a> 
                </div>
            </div>
            <a href="<?= route_to("logout")?>" class="nav_link"> 
                <i class='bx bx-log-out nav_icon'></i> 
                <span class="nav_name">
                SignOut</span>
            </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h2>Home Admin</h2>
    </div>
    <!--Container Main end-->




<?= $this->endSection() ?>

