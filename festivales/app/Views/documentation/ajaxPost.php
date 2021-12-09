<?= $this->extend('PublicSection/baseLayout') ?>

<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('assets/PublicSection/css/homePublic.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('js') ?>
    <script type="text/javascript">
        let dataJSON={
            id: 1,
            type: "admin",
            name: "Miguel"
        }
        $.ajax({
            url:"<?= route_to("test_ajax") ?>",
            type:"POST",
            data: JSON.stringify(dataJSON),
            contentType: "application/json",
            async: true,
            timeout: 10000,
            dataType: "json",
            beforeSend: (xhr)=>{},
            succes: (response)=>{
                alert("Petcion correcta")
            },
            error: (xhr, status, error)=>{
                alert("Ha surgido algun error")
            },
            complete:()=>{}
        });
    </script>
<?= $this->endSection() ?>
<?= $this->section('title')?>
Ajax Test
<?= $this->endSection() ?>

<?= $this->section('ajaxTest')  ?>




<?= $this->endSection() ?>
