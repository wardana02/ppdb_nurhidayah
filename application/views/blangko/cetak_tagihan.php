<?php

  $total = $data_akun->kd_unik + $dt_periode->biaya_pendaftaran;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>-</title>
  <link href=<?=base_url("assets/mpdf_css/mpdfstyletables.css");?> rel="stylesheet" type="text/css" />
</head>

<body class="ft_splh">
<table width="750">
  <tr>
    <td align="center" colspan="2"><h2> TAGIHAN PEMBAYARAN PENDAFTARAN </h2></td>
  </tr>
  <tr>
    <td align="center" class="br_bottom" colspan="2">CALON SISWA BARU SDIT NUR HIDAYAH <?=date("Y")?></td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
    <td width="180"><h4>Status Akun</h4></td>
    <td><h4> Aktif</td></h4>
  </tr>

  <tr>
    <td><h4>Tanggal Pendaftaran</h4></td>
    <td><h4><?php echo dateindo($data_akun->tgl_daftar);?></h4></td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr><td colspan="2" align="left"><h3> Biaya Pendaftaran, </h3></td></tr>
  <tr><td colspan="2" align="justify"> Dengan ini, diinformasikan kepada orang tua calon siswa SDIT NUR HIDAYAH untuk
  melakukan pembayaran biaya pendaftaran yang dapat dilakukan melalui Transfer ATM, via Teller Bank. Nominal pembayaran
  sesuai dengan angka yang tertera pada cetakan berikut ini, harap sesuai dengan nilai yang tertera untuk mempermudah proses verifikasi oleh petugas. <br> Terimakasih </td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>

  <tr>
    <td colspan="2"> 
      <table>
        <tr>
          <td width="130"> Nomor Rekening</td>
          <td width="20"> : </td>
          <td width="280"> <b>Bank Muamalat : 5210072901 </b></td>
        </tr>  
      </table> 
    </td>
  </tr>

    <tr>
    <td colspan="2"> 
      <table>
        <tr>
          <td width="130"> Atas Nama</td>
          <td width="20"> : </td>
          <td width="280"> <b> Ari Puspitowati qq SDIT NUR HIDAYAH</b></td>
        </tr>  
      </table> 
    </td>
  </tr>

    <tr>
    <td colspan="2"> 
      <table>
        <tr>
          <td width="130"> Nama Calon Siswa </td>
          <td width="20"> : </td>
          <td width="280"> <b> <?=$data_akun->namalengkap." / ".$data_akun->namapanggilan?></b></td>
        </tr>  
      </table> 
    </td>
  </tr>

   <tr>
    <td colspan="2"> 
      <table>
        <tr>
          <td width="130"> Nominal Pembayaran</td>
          <td width="20"> : </td>
          <td width="280"> <b>Rp. <?=rupiah($total)?> ,-</b></td>
        </tr>  
      </table> 
    </td>
  </tr>
  <tr>
    <td colspan="2"> 
      <table>
        <tr>
          <td width="130"> </td>
          <td width="20"> : </td>
          <td width="490"> <b><?php echo ucwords(number_to_words($total));?> </b></td>
        </tr>  
      </table> 
    </td>
  </tr>


    <tr><td colspan="2">&nbsp;</td></tr>
      <tr><td colspan="2">&nbsp;</td></tr>
  <tr><td colspan="2" align="center"><h3> Info Call Center : </h3></td></tr>
  <tr><td colspan="2" align="center"> Hot Line : (0271) 788122</td></tr>
  <tr><td colspan="2" align="center"> SMS Tracing : 0857-25-4858-10</td></tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
  <td align="center" colspan="2"> 
	</td>
	
  </tr>
</table>




    
 
</body>
</html>
