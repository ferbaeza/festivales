<?= $this->extend('PublicSection/baseLayout') ?>

<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('assets/PublicSection/css/homePublic.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('js') ?>
    <script type="text/javascript">
        $.ajax({
            url:"<?= route_to("test_ajax") ?>",
            type:"GET",
            async: true,
            timeout: 10000,
            dataType: "json",
            beforeSend: (xhr)=>{

            },
            succes: (response)=>{
                let responseJSON = JJSON.parse(response);
                if (responseJSON.status== "OK")
                alert("Petcion correcta")
                else
                alert("La peticion ha ido mal")
            },
            error: (xhr, status, error)=>{
                alert("Ha surgido algun error")
            },
            complete:()=>{

            }
        });
    </script>
<?= $this->endSection() ?>
<?= $this->section('title')?>
Ajax Test
<?= $this->endSection() ?>

<?= $this->section('ajaxTest')  ?>




<?= $this->endSection() ?>
