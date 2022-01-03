<?= $this->extend('Admin/home_admin') ?>

<?= $this->section('title')?>
 <?= $title?>
<?= $this->endSection() ?>



<?= $this->section('new')  ?>
<?php $session=session(); ?>
<div class="container">
    <h1 class="h1 text-center"> <?= $session->get("username");  ?></h1>

</div>


<?= $this->endSection();?>
