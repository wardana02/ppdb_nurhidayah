<?php if( !defined('BASEPATH')) exit('NO direct allowed');

/**
 * @author Marsono Saputro
 * @copyright 2014
 **/

$pesan = $this->session->flashdata('update_biaya');
if(!empty($pesan)){
?>
<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert"><span class="btn glyphicon glyphicon-remove"></span></button>
  <b><?php echo $pesan; ?></b>
  <div class="pull-right">
    <a href="<?php echo site_url().'member' ?>" class="btn btn-xs glyphicon glyphicon-stop"> SELESAI </a>
  </div>
</div>
<?php } ?>

<br />
<form name="pendaftaran" method="POST" action="<?php echo site_url().'member/update_databiaya' ?>" class="form-horizontal">
  <fieldset>
    <legend>Kesepakatan Pembiayaan</legend>
<div class="table-responsive">
    <table class="table table-bordered table-condensed table-striped">
        <tbody>
            <tr>
                <td colspan="2">
                    Untuk memenuhi kebutuhan minimal operasional SDIT Nur Hidayah setiap siswa dikenakan infak syahriyah (SPP)
                    sebesar minimal  Rp. 450.000,- per bulan. Berapa besar kesanggupan Bapak/Ibu untuk infak syahriyah Ananda?
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="row">
                        <div class="col-md-4">
                            <?php
                            if(!empty($biaya->spp))
                            {
                                if($biaya->spp == '450000'){
                                    $spp = '450000';
                                    $spp2= '';
                                }elseif($biaya->spp == '500000'){
                                    $spp = '500000';
                                    $spp2='';
                                }elseif($biaya->spp == '550000'){
                                    $spp = '550000';
                                    $spp2= '';
                                }elseif($biaya->spp > '500000'){
                                    $spp = '1';
                                    $spp2= number_format($biaya->spp,0,',','.');
                                }
                            }
                            else{
                                $spp = '';
                                $spp2= '';
                            }
                            ?>
                            <?php echo form_dropdown('spp', array(''=>'', '450000'=>'Rp. 450.000,-', '500000'=>'Rp. 500.000,-', '550000'=>'Rp. 550.000,-', '1'=>'Lainnya'), $spp, 'id="spp" class="form-control"') ?>
                        </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">Rp. </span>
                            <?php echo form_input(array('name'=>'spp2', 'value'=>$spp2, 'id'=>'spp2', 'class'=>'form-control')) ?>
                            <span class="input-group-addon">,00</span>
                        </div>
                    </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Untuk melanjutkan proses pengembangan sekolah, setiap siswa dikenakan infak pengembangan minimal sebesar 
                    Rp. 7.000.000,-. Berapa besar kesanggupan Bapak/Ibu untuk infaq pengembangan sekolah?
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="row">
                        <div class="col-md-4">
                            <?php
                            if(!empty($biaya->gedung))
                            {
                                if($biaya->gedung == '7000000'){
                                    $gedung = '7000000';
                                    $gedung2= '';
                                }elseif($biaya->gedung == '7500000'){
                                    $gedung = '7500000';
                                    $gedung2='';
                                }elseif($biaya->gedung == '8000000'){
                                    $gedung = '8000000';
                                    $gedung2= '';
                                }elseif($biaya->gedung > '8000000'){
                                    $gedung = '1';
                                    $gedung2= number_format($biaya->gedung,0,',','.');
                                }
                            }
                            else{
                                $gedung = '';
                                $gedung2= '';
                            }
                            ?>
                            <?php echo form_dropdown('gedung', array(''=>'', '7000000'=>'Rp. 7.000.000,-', '7500000'=>'Rp. 7.500.000,-', '8000000'=>'Rp. 8.000.000,-', '1'=>'Lainnya'), $gedung, 'id="gedung" class="form-control"') ?>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon">Rp. </span>
                                <?php echo form_input(array('name'=>'gedung2', 'value'=>$gedung2, 'id'=>'gedung2', 'class'=>'form-control')) ?>
                                <span class="input-group-addon">,00</span>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Untuk mendukung Gerakan Wakaf Pendidikan (GRAWADI), setiap siswa diwajibkan untuk mengikuti program ini 
                    dengan wakaf minimal 1m<sup>2</sup> (Rp. 300.000,-). Berapa meter wakaf yang akan Bapak/Ibu berikan?
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="row">
                        <div class="col-md-4">
                            <?php
                            if(!empty($biaya->grawadi))
                            {
                                if($biaya->grawadi == '300000'){
                                    $grawadi = '300000';
                                    $grawadi2= '';
                                }elseif($biaya->grawadi == '600000'){
                                    $grawadi = '600000';
                                    $grawadi2='';
                                }elseif($biaya->grawadi == '900000'){
                                    $grawadi = '900000';
                                    $grawadi2= '';
                                }elseif($biaya->grawadi > '900000'){
                                    $grawadi = '1';
                                    $grawadi2= number_format($biaya->grawadi,0,',','.');
                                }
                            }
                            else{
                                $grawadi = '';
                                $grawadi2= '';
                            }
                            ?>
                            <?php echo form_dropdown('grawadi', array(''=>'', '300000'=>'Rp. 300.000,-', '600000'=>'Rp. 600.000,-', '900000'=>'Rp. 900.000,-', '1'=>'Lainnya'), $grawadi, 'id="grawadi" class="form-control"') ?>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                            <span class="input-group-addon">Rp. </span>
                            <?php echo form_input(array('name'=>'grawadi2', 'value'=>$grawadi2, 'id'=>'grawadi2', 'class'=>'form-control')) ?>
                            <span class="input-group-addon">,00</span>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php
            $seragam = 450000;
            $buku    = 200000;
            $kegiatan= 300000;
            $total = $seragam + $buku + $kegiatan + $biaya->spp + $biaya->gedung + $biaya->grawadi;
            ?>
            <tr>
                <td>Biaya seragam (4 Stel) </td>
                <td><b><?php echo number_format($seragam,0,',','.'); ?></b></td>
            </tr>
            <tr>
                <td>Perkiraan Biaya Buku Semester I  </td>
                <td><b><?php echo number_format($buku,0,',','.'); ?></b></td>
            </tr>
            <tr>
                <td>Perkiraan Kegiatan Semester I</td>
                <td><b><?php echo number_format($kegiatan,0,',','.'); ?></b></td>
            </tr>
        </tbody>
        <tfoot>
            <tr style="color:red">
                <th>Total Biaya</th>
                <th><?php echo number_format($total,0,',','.'); ?></th>
            </tr>
        </tfoot>
    </table>
</div>

<div class="pull-right">
    <input type="submit" name="submit" value="Simpan" class="btn btn-info" />
</div>

</fieldset>
</form>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.11.1.min.js' ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        if($("#spp").val() != '1'){
            $("#spp2").prop('disabled', 'disabled');
        }
        if($("#gedung").val() != '1'){
            $("#gedung2").prop('disabled', 'disabled');
        }
        if($("#grawadi").val() != '1'){
            $("#grawadi2").prop('disabled', 'disabled');
        }
        
        $("#spp").change(function(){
            if($("#spp").val() == '1'){
                $("#spp2").removeAttr('disabled');
                $("#spp2").prop('required', 'required');
                $("#spp2").focus();
            }else{
                $("#spp2").prop('disabled', 'disabled');
            }
        });
        $("#gedung").change(function(){
            if($("#gedung").val() == '1'){
                $("#gedung2").removeAttr('disabled');
                $("#gedung2").prop('required', 'required');
                $("#gedung2").focus();
            }else{
                $("#gedung2").prop('disabled', 'disabled');
            }
        });
        $("#grawadi").change(function(){
            if($("#grawadi").val() == '1'){
                $("#grawadi2").removeAttr('disabled');
                $("#grawadi2").prop('required', 'required');
                $("#grawadi2").focus();
            }else{
                $("#grawadi2").prop('disabled', 'disabled');
            }
        });
    });

</script>
