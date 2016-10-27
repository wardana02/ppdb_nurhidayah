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
    <td align="center" colspan="2"><h2>PENDAFTARAN AKUN </h2></td>
  </tr>
  <tr>
    <td align="center" class="br_bottom" colspan="2">PPDB ONLINE SDIT NUR HIDAYAH</td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
    <td width="180"><h4>Status Akun</h4></td>
    <td><h4> Aktif</td></h4>
  </tr>

  <tr>
    <td><h4>Tanggal Pendaftaran</h4></td>
    <td><h4><?php echo dateindo($data_akun->tgldaftar);?></h4></td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr><td colspan="2" align="center"><h3> Pendaftaran Akun Anda Berhasil !!</h3></td></tr>
  <tr><td colspan="2" align="center"> Tanda Bukti Pendaftaran ini berisikan Identitas Akun, beserta username dan password untuk login
  kedalam aplikasi PPDB Online SDIT Nur Hidayah yang dapat anda gunakan sebagai berikut,</td></tr>
  <tr><td colspan="2">&nbsp;</td></tr>

  <tr>
    <td colspan="2"> 
      <table>
        <tr>
          <td width="130"> NIK</td>
          <td width="20"> : </td>
          <td width="230"> <b> <?=$data_akun->nik?></b></td>
        </tr>  
      </table> 
    </td>
  </tr>

    <tr>
    <td colspan="2"> 
      <table>
        <tr>
          <td width="130"> Pemilik Akun</td>
          <td width="20"> : </td>
          <td width="230"> <b> <?=$data_akun->namalengkap?></b></td>
        </tr>  
      </table> 
    </td>
  </tr>

    <tr>
    <td colspan="2"> 
      <table>
        <tr>
          <td width="130"> Alamat Email</td>
          <td width="20"> : </td>
          <td width="230"> <b> <?=$data_akun->email?></b></td>
        </tr>  
      </table> 
    </td>
  </tr>

   <tr>
    <td colspan="2"> 
      <table>
        <tr>
          <td width="130"> Nomor HP</td>
          <td width="20"> : </td>
          <td width="230"> <b> <?=$data_akun->nohp?></b></td>
        </tr>  
      </table> 
    </td>
  </tr>
   <tr>
    <td colspan="2"> 
      <table>
        <tr>
          <td width="130"> Username</td>
          <td width="20"> : </td>
          <td width="230"> <b> <?=$data_akun->username?></b></td>
        </tr>  
      </table> 
    </td>
  </tr>
   <tr>
    <td colspan="2"> 
      <table>
        <tr>
          <td width="130"> Password</td>
          <td width="20"> : </td>
          <td width="230"> <b> <?=$data_akun->nohp?></b></td>
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
