<?= $this->extend('Admin/home_admin') ?>
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
 <?= $title?>
<?= $this->endSection() ?>



<?= $this->section('new')  ?>
<?php $session=session(); ?>
<div class="container">
    <h1 class="h1 text-center"> <?= $session->get("username");  ?></h1>

</div>


<?= $this->endSection();?>
