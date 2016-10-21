    <div class="row">
    <div class="col-md-12">
        <hr />
        <?php 
            echo Tb::breadcrumbs(array('links' => array('Home' => site_url(),'Login'))); 
        ?>
        <hr />
    </div>
</div>

<div class="row">
<section class="content-header">
          <h1>
            404 Error Page
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">404 error</li>
          </ol>
        </section>

    <div class="col-md-12">
        <div class="well">
            <div class="error-page">
            <h2 class="headline text-yellow"> 404</h2>
            <div class="error-content">
              <h3><i class="fa fa-warning text-yellow"></i> Oops! Halaman Yang Anda Akses Tidak Ditemukan.</h3>
              <p>
                Sistem Tidak Dapat Menemukan Halaman Yang Anda Akses, Mungkin Terjadi Kesalahan Anda Dengan Mengetik URL Secara Langsung.
                Saran Kami, Anda Harus <a href=<?=base_url("Dashboard");?>>Kembali Ke Menu Awal</a>.
              </p>
            </div><!-- /.error-content -->
          </div><!-- /.error-page -->
        </div>
    <hr />
    </div>
</div>