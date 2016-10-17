<!-- SLIDER -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img class="img-responsive" src="<?php echo base_url().'assets/images/slideshow/'.$active->gambar ?>" />
        </div>
        <?php
        foreach($slide as $r)
        {
            ?>
            <div class="item">
            <img class="img-responsive" src="<?php echo base_url().'assets/images/slideshow/'.$r->gambar ?>" />
            </div>
            <?php
        }
        ?>
    </div>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
</div>
<!-- END SLIDER -->
<div class="divider">
<hr />
<div class="row">
<?php echo !empty($static) ? $static->isi_halaman : '' ?>
<hr />
</div>                  
