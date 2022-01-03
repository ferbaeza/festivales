<?= $this->extend('Admin/admin_layout') ?>

<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('assets/Admin/css/homeAdmin.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script type="text/javascript">
        $(document).ready(function(){
        console.log('CATEGORIES__READY!');
        var columnsDefinition = [
                {
                    "targets": 0,
                    "render": function (data, type, row, meta) {
                        return row["id"];
                    }
                },
                {
                    "targets": 1,
                    "render": function (data, type, row, meta) {
                        return row["name"];
                    }
                },
                {
                    "targets": 2,
                    "render": function (data, type, row, meta) {
                        return '<button class="btn-dark deleteBtn"><i class="fa fa-trash"></i></button> <button class="btn-dark editBtn"><i class="fa fa-edit"></i></button>';
                    }
                }
            ]
            $(document).ready( function () {
                let Datatable= $('#datatable').DataTable({
                    "processing": true, //Para mostrar el loading
                    "responsive": true,
                    "serverSide": true, //Activar Ajax
                    "searching": false, //Si queremos que apareza la barra buscador
                    "columnDefs": columnsDefinition, //Array de columnas que hemos definido arriba
                    "fnDrawCallback": function (oSettings) {
                        if (oSettings._DisplayLength >= oSettings.fnRecordsTotal())
                            $(oSettings.nTableWrapper).find('.dataTables_paginated').hide();
                        else 
                            $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
                    },
                    "ajax": {
                        url: "<?= route_to('categories_data') ?>",
                        type: "POST",
                        data: function () {},
                        error: function (data) {
                            console.log(data);
                    }
                    }
                });
                $('#datatable').on('click', '.deleteBtn', function(){
                console.log("Delete_OK");
                //obtener datos de esa fila
                var data = Datatable.row($(this).parents('tr')).data();
                console.log(data);
                console.log(data.id);
                });
                $('#new').on('click',  function(){
                    console.log("New ");
                });            


                $('#datatable tbody').on('click', '.editBtn', function(){
                    console.log("Modify_OK");
                    var data = Datatable.row($(this).parents('tr')).data();
                    console.log(data);
                    console.log(data.id);
                });            

            });

        });
   
    </script>
        <script type="text/javascript" src="<?= base_url('assets/Admin/js/nav.js')  ?>"></script>
<?= $this->endSection() ?>
<?= $this->section('title')?>
 <?= $title?>
<?= $this->endSection() ?>



<?= $this->section('homeAdmin')  ?>
<?php $session=session(); ?>


<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> 
            <i class='bx bx-menu' id="header-toggle"> </i> Categories
            
        </div>        

        <div class="">
        <div class="header_img">
            <img src="<?= base_url('assets/Admin/img/logo.png')?>" alt="logo"> 
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
                    <a href="home_admin" class="nav_link "> 
                        <i class='fas fa-home'></i>
                        <span class="nav_name">Inicio</span> </a> 

                    <a href="<?= route_to("festivals_admin")?>" class="nav_link"> 
                        <i class='fas fa-music'></i> 
                        <span class="nav_name">Festivales</span> </a> 

                    <a href="<?= route_to("categories_admin")?>" class="nav_link active"> 
                        <i class='fas fa-th'></i> 
                        <span class="nav_name">Categorias</span> </a> 

                    <a href="<?= route_to("users_admin")?>" class="nav_link"> 
                        <i class='fas fa-users'></i> 
                        <span class="nav_name">Usuarios</span> </a> 

                    <a href="<?= route_to("roles_admin")?>" class="nav_link"> 
                        <i class='fas fa-user-tag'></i> 
                        <span class="nav_name">Roles</span> </a> 

                    <a href="<?= route_to("config_admin")?>" class="nav_link"> 
                        <i class='fas fa-cogs'></i> 
                        <span class="nav_name">Configuracion</span> </a> 
                </div>
            </div>
            <a href="<?= route_to("logout")?>" class="nav_link"> 
                <i class='bx bx-log-out nav_icon'></i> 
                <span class="nav_name"><?= $session->get("username");  ?>
                
                SignOut</span>
            </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="container">
        <div class="height-100 bg-light m-auto ">
            <h1 class="h1 text-center">Bienvenido <?= $session->get("username");  ?></h1>
            <h1 class="h1 text-center">Categories Panel Admin</h1>
                        <button type="submit" class="btn btn-primary mb-3 mx-3" id="new">New Entry</button>

            <table id="datatable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
    
    
        </table>

        </div>

    </div>
    <!--Container Main end-->




<?= $this->endSection() ?>

