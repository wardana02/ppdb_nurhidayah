<div class="row">
    <div class="col-md-12">
        <hr />
        <?php 
            echo Tb::breadcrumbs(array('links' => array('Home' => site_url(),'Prosedur'))); 
        ?>
        <hr />
    </div>
</div>
 
<div class="row">
    <div class="col-md-12">
        <?php echo !empty($static) ? $static->isi_halaman : '' ?>
        <hr />
    </div>
</div>