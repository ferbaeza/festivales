<?= $this->extend('PublicSection/baseLayout') ?>

<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('assets/PublicSection/css/homePublic.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('js') ?>
    <script type="text/javascript">
        $(document).ready(function(){
            console.log('READY!');
        });
    </script>
<?= $this->endSection() ?>
<?= $this->section('title')?>
Public Home
<?= $this->endSection() ?>

<?= $this->section('homePublic')  ?>

<?php $session=session(); ?>

<div class="homePublic">
    <div class="container">
    <div class="btn-group mb-3 rounded ms-1" role="group" aria-label="Basic example">
    <a style="margin-right:30px" href="<?= route_to("logout")?>"><button type="button" class="btn btn-dark rounded ms-1">Logout </button></a>
        <h1 class="shadow p-3 mb-5 bg-body rounded ms-1">Name <?= $session->get("username");  ?></h1>
    </div>

        
        <div class="category">
            <h1>Indie</h1>
            <div class="row ">
                <div id="colFestival" class="festivalGrid shadow p-3 mb-5 bg-body rounded ms-1">
                    <div class="image">
                        <img width="300px" height="250px" id="festi" src="<?= base_url('assets/PublicSection/img/indie.jpg')?>"/>
                    </div>
                    <div class="cardTittle">Title</div>
                    <div class="card">
                        Informacion sobre los distintos eventos II
                    </div>
                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary">Go </button>
                    </div>
                </div>
                <div id="colFestival"class="festivalGrid shadow p-3 mb-5 bg-body rounded ms-1">
                    <div class="image">
                    <img width="300px" height="250px" id="festi" src="<?= base_url('assets/PublicSection/img/indie.jpg')?>"/>
                    </div>
                    <div class="cardTittle">Title</div>
                    <div class="card">
                        Informacion sobre los distintos eventos
                    </div>
                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary">Go </button>
                    </div>

                </div>
                <div id="colFestival"class="festivalGrid shadow p-3 mb-5 bg-body rounded ms-1">
                    <div class="image">
                    <img width="300px" height="250px" id="festi" src="<?= base_url('assets/PublicSection/img/indie.jpg')?>"/>
                    </div>
                    <div class="cardTittle">Title</div>
                    <div class="card">
                        Informacion sobre los distintos eventos
                    </div>
                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary">Go </button>
                    </div>

                </div>
            </div>
        </div>    

        <div class="category">
            <h1>Rock</h1>
            <div class="row">
            <div id="colFestival"class="festivalGrid shadow p-3 mb-5 bg-body rounded ms-1">
                    <div class="image">
                    <img width="300px" height="250px" id="festi" src="<?= base_url('assets/PublicSection/img/rock.png')?>"/>
                    </div>
                    <div class="cardTittle">Title</div>
                    <div class="card">
                        Informacion sobre los distintos eventos
                    </div>
                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary">Go </button>
                    </div>

                </div>
                <div id="colFestival"class="festivalGrid shadow p-3 mb-5 bg-body rounded">
                    <div class="image">
                    <img width="300px" height="250px" id="festi" src="<?= base_url('assets/PublicSection/img/rock.png')?>"/>
                    </div>
                    <div class="cardTittle">Title</div>
                    <div class="card">
                        Informacion sobre los distintos eventos
                    </div>
                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary">Go </button>
                    </div>

                </div>
            </div>
        </div>
        <div class="category">
            <h1>Pop</h1>
            <div class="row ">
            <div id="colFestival"class="festivalGrid shadow p-3 mb-5 bg-body rounded ">
                    <div class="image">
                    <img width="300px" height="250px" id="festi" src="<?= base_url('assets/PublicSection/img/pop.jpg')?>"/>
                    </div>
                    <div class="cardTittle">Title</div>
                    <div class="card">
                        Informacion sobre los distintos eventos
                    </div>
                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary">Go </button>
                    </div>

                </div>
                <div id="colFestival"class="festivalGrid shadow p-3 mb-5 bg-body rounded">
                    <div class="image">
                    <img width="300px" height="250px" src="<?= base_url('assets/PublicSection/img/pop.jpg')?>"/>
                    </div>
                    <div class="cardTittle">Title</div>
                    <div class="card">
                        Informacion sobre los distintos eventos
                    </div>
                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary">Go </button>
                    </div>

                </div>
                <div id="colFestival"class="festivalGrid shadow p-3 mb-5 bg-body rounded">
                    <div class="image">
                    <img width="300px" height="250px" id="festi" src="<?= base_url('assets/PublicSection/img/pop.jpg')?>"/>
                    </div>
                    <div class="cardTittle">Title</div>
                    <div class="card">
                        Informacion sobre los distintos eventos
                    </div>
                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary">Go </button>
                    </div>

                </div>
            </div>
        </div>
        <div class="category">
            <h1>Spanish</h1>
            <div class="row">
            <div id="colFestival"class="festivalGrid shadow p-3 mb-5 bg-body rounded">
                    <div class="image">
                    <img width="300px" height="250px" id="festi" src="<?= base_url('assets/PublicSection/img/latin.png')?>"/>
                    </div>
                    <div class="cardTittle">Title</div>
                    <div class="card">
                        Informacion sobre los distintos eventos
                    </div>
                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary">Go </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="category">
            <h1>Intro</h1>
            <div class="row">
                <div id="colFestival"class="festivalGrid shadow p-3 mb-5 bg-body rounded">
                    <div class="image">
                    <img width="300px" height="250px" id="festi" src="<?= base_url('assets/PublicSection/img/intro.png')?>"/>
                    </div>
                    <div class="cardTittle">Title</div>
                    <div class="card">
                        Informacion sobre los distintos eventos
                    </div>
                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary">Go </button>
                    </div>

                </div>
            </div>
        </div>


</div>

<?= $this->endSection() ?>
