<?php
session_start();
include "../cek.php";
include "../koneksi.php";
//include "fungsi.php";
if (isset($_GET['lokasi'])) {
    $lokasi = $_GET['lokasi'];
} else {
    $operator = $_SESSION['username'];
    $query = "SELECT lokasi FROM operator WHERE username = '$operator'";
    $hasil = mysql_query($query);
    $data = mysql_fetch_array($hasil);
    $lokasi = $data['lokasi'];
}
?>

<style type="text/css" media="print">

    page {
        orientation:landscape;
    }
</style>
<style>
    table
    {
        border-collapse:collapse;
        font-size:14px;
    }


    .page
    {
        size:landscape;
        font-size:15px;
    }

    td
    {
        border-collapse:

            text-align:left;
        padding : 0px 0px 0px 5px;
    }

    td.bersih
    {
        border-bottom:none;
        border-left:none;
        border-right:none;
        border-top:none;
        text-align:center;
    }

    td.pinggir
    {
        text-align:left;
    }
    td.tengah{
        text-align:center;
    }
    tr.tengah
    {
        text-align:center;
    }

    td.kanan
    {
        text-align:right;
    }
</style>
<div class="page">
    <?php
    include "../koneksi.php";
    include "fungsi.php";

    if (empty($_GET[tahap])) {
        $tahap = $tahap;
    } else {
        $tahap = $_GET[tahap];
    }
    $kode = $_GET[kode];
    //echo $kode;
    $materi = materi($kode);
    //$tgl  = tgl_indo(date("Y-m-d"));
    $tgl = tgl_indo(pelaksanaan($tahap, $kode));

    if (empty($kode)) {
        
    } else {
        $q3 = "select * from materi where kode='$kode'";
        //echo $q3;
        $q2 = mysql_query($q3);
        while ($q = mysql_fetch_array($q2)) {
            $isi = strtoupper($q[isi]);
        }
        ?>
        <FORM>
            <!-- <INPUT TYPE="button" value="Cetak" onClick="window.print()"> -->
        </FORM>
        <?php
        if ($lokasi == 'Administrator') {
            $query = "select count(*) as jumData from instruktur_ajar JOIN materi ON instruktur_ajar.materi=materi.kode where tahap='$tahap' and isi='$materi'";
        } else {
            $query = "select count(*) as jumData from instruktur_ajar JOIN materi ON instruktur_ajar.materi=materi.kode where tahap='$tahap' and isi='$materi' and lokasi='$lokasi'";
        }








        if ($kode == 'M06' or $kode == 'M044') {
            ?>
            <table width="100%"  cellspacing="0" cellpadding="0" >
                <tr>
                    <td colspan="10" align="center" class="bersih"><br><br><br>DAFTAR : PENERIMAAN HONORARIUM INSTRUKTUR TEORI <?= $isi ?>      KEGIATAN PLPG SERTIFIKASI GURU DALAM JABATAN</td>
                </tr>
                <tr>
                    <td colspan="10" align="center" class="bersih"><p> RAYON UNIVERSITAS SEBELAS MARET SURAKARTA KUOTA TAHUN 2016 TAHAP <? echo romawi($tahap); ?></p>
                        <p>&nbsp;</p></td>
                </tr>
            </table>
            <table width="100%"  cellspacing="0" cellpadding="0" >

                <tr>
                    <td colspan="5" class="pinggir bersih">Tanggal : <?= $tgl; ?>&nbsp;( <?php
                        if ($lokasi == 'Administrator') {
                            
                        } else {
                            echo $lokasi;
                        }
                        ?> )</td>
                    <? /*   <td colspan="5" class="kanan bersih">Hal.<?= $hal ?>.<?= $isi ?>  Thp.
                    <?= $tahap; ?> Th.<?= date('Y') ?></td> */?>
                </tr>
            </table>
            <table width="100%" border="1"  cellspacing="0" cellpadding="0" >



                <tr class="tengah">
                    <td class="tengah">No.</td>
                    <td class="tengah">Nama</td>
                    <td class="tengah">Gol.</td>
                    <td class="tengah">Bidang Studi</td>
                    <td class="tengah">Jml. JP</td>
                    <td class="tengah">Tarif / jam (Rp)</td>
                    <td class="tengah">Jumlah Bruto (Rp)</td>
                    <td class="tengah">PPh. 5% / 15% (Rp)</td>
                    <td class="tengah">Penerimaan Bersih (Rp)</td>
                    <td class="tengah">Tanda Tangan</td>
                </tr>
                <tr class="tengah">
                    <td width="3%" class="tengah">1</td>
                    <td width="15%" class="tengah">2</td>
                    <td width="3%" class="tengah">3</td>
                    <td width="8%" class="tengah">4</td>
                    <td width="3%" class="tengah">5</td>
                    <td width="11%" class="tengah">6</td>
                    <td width="11%" class="tengah">7</td>
                    <td width="10%" class="tengah">8</td>
                    <td width="11%" class="tengah">9</td>
                    <td width="13%" class="tengah">10</td>
                </tr>
                <?php
                $offset = ($hal - 1) * $dataperpage;
                //echo $offset;
                if ($lokasi == 'Administrator') {
                    $query = "select * from ins_ajar where tahap='$tahap' and isi='$materi' order by rumpun,rombel,nama";
                } else {
                    $query = "select * from ins_ajar where tahap='$tahap' and isi='$materi' and lokasi='$lokasi' order by rumpun,rombel,nama ";
                }
                //echo "$query";
                $dat = mysqL_query($query);
                $i = $offset + 1;
                while ($data = mysql_fetch_array($dat)) {

                    $jumlahjp = jumlahjpfix($data[kode], $tahap, $kode);
                    if ($kode == 'M06' || $kode = 'M044') {
                        $nil1 = 150000 * $data[jp];
                        $tarif1 = rupiah($nil1);
                        $bruto1 = rupiah($nil1);
                        $pot1 = pajak($data[gol]);
                        $pajak1 = rupiah($pot1 * $nil1);
                        $bayar1 = rupiah((1 - $pot1) * $nil1);
                        $letak1 = letak($i);
                        $nilai1 = rupiah(150000);

                        $nil2 = 150000 * ($jumlahjp - 1);
                        $tarif2 = rupiah($nil2);
                        $bruto2 = rupiah($nil2);
                        $pot2 = pajak($data[gol]);
                        $pajak2 = rupiah($pot2 * $nil2);
                        $bayar2 = rupiah((1 - $pot2) * $nil2);
                        $letak2 = letak($i);
                        $nilai2 = rupiah(150000);
                    } else {
                        $nil = $data[nilai] * $jumlahjp;
                        $tarif = rupiah($nil);
                        $bruto = rupiah($nil);
                        $pot = pajak($data[gol]);
                        $pajak = rupiah($pot * $nil);
                        $bayar = rupiah((1 - $pot) * $nil);
                        $letak = letak($i);
                        $nilai = rupiah($data[nilai]);
                    }
                    ?>
                    <tr>
                        <td class="tengah"><?= $i ?></td>
                        <td><?= $data[nama] ?></td>
                        <td><?= $data[gol] ?></td>
                        <td><?= "$data[rumpun] $data[rombel]"; ?></td>
                        <td class="tengah"><?=
                            $data[jp]
                            ?></td>
                        <td class="kanan"><?= $nilai1; ?></td>
                        <td class="kanan"><?= $bruto1; ?></td>
                        <td class="kanan"><?= $pajak1; ?></td>
                        <td class="kanan"><?= $bayar1; ?></td>
                        <td class="kanan"><?= $letak1; ?></td>
                    </tr>
                    <?php
                    $tottarif1 += 150000;
                    $totbruto1 += $nil1;
                    $totjp += $data[jp];
                    $totpajak1 += ($pot1 * $nil1);
                    $totbayar1 += ((1 - $pot1) * $nil1);
                    $i++;
                    $terbilang1 = ucfirst(terbilang($totbruto1));
                }
                $tottarif1 = rupiah($tottarif1);
                $totbruto1 = rupiah($totbruto1);
                $totpajak1 = rupiah((int) $totpajak1);

                $totbayar1 = rupiah($totbayar1);
                ?>
                <tr>
                    <td>&nbsp;</td>
                    <td class="tengah">Jumlah </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="tengah"><?= $totjp ?></td>
                    <td class="kanan"></td>
                    <td class="kanan"><?= $totbruto1; ?></td>
                    <td class="kanan"><?= $totpajak1; ?></td>
                    <td class="kanan"><?= $totbayar1; ?></td>
                    <td class="kanan">&nbsp;</td>
                </tr>
            </table><br>
            Terbilang : <?php echo rupiah2($totbruto1) ?>&nbsp;( <?php echo ucwords($terbilang1); ?><? echo"Rupiah"?> )<br>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="4%">&nbsp;</td>
                    <td width="4%">&nbsp;</td>
                    <td width="9%">&nbsp;</td>
                    <td width="48%">&nbsp;</td>
                    <td width="35%">&nbsp;</td>
                </tr>
                <tr>
                    <td class="kanan">&nbsp;</td>
                    <td class="kanan">&nbsp;</td>
                    <td class="kanan">An.</td>
                    <td>Ketua Rayon.</td>
                    <td>Surakarta, <?//=$tgl?> </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Sekretaris</td>
                    <td>Penanggung Jawab Keuangan,</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Prof. Dr. Joko Nurkamto, M.Pd</td>
                    <td>Dr. Imam Sujadi, M.Si.</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>NIP. 19610124 198702 1 001</td>
                    <td>NIP. 19670915 200604 1 001</td>
                </tr>
            </table>
            <div style="page-break-before: always"></div>
            <br><br><br>
            <table width="100%"  cellspacing="0" cellpadding="0" >
                <tr>
                    <td colspan="10" align="center" class="bersih"><br><br><br>DAFTAR : PENERIMAAN HONORARIUM INSTRUKTUR PRAKTEK <?= $isi ?>      KEGIATAN PLPG SERTIFIKASI GURU DALAM JABATAN</td>
                </tr>
                <tr>
                    <td colspan="10" align="center" class="bersih"><p> RAYON UNIVERSITAS SEBELAS MARET SURAKARTA KUOTA TAHUN 2016 TAHAP <? echo romawi($tahap); ?></p>
                        <p>&nbsp;</p></td>
                </tr>
            </table>
            <table width="100%"  cellspacing="0" cellpadding="0" >

                <tr>
                    <td colspan="5" class="pinggir bersih">Tanggal : <?= $tgl; ?>&nbsp;( <?php
                        if ($lokasi == 'Administrator') {
                            
                        } else {
                            echo $lokasi;
                        }
                        ?> )</td>
                    <? /*   <td colspan="5" class="kanan bersih">Hal.<?= $hal ?>.<?= $isi ?>  Thp.
                    <?= $tahap; ?> Th.<?= date('Y') ?></td> */?>
                </tr>
            </table>
            <table width="100%" border="1"  cellspacing="0" cellpadding="0" >



                <tr class="tengah">
                    <td class="tengah">No.</td>
                    <td class="tengah">Nama</td>
                    <td class="tengah">Gol.</td>
                    <td class="tengah">Bidang Studi</td>
                    <td class="tengah">Jml. JP</td>
                    <td class="tengah">Tarif / jam (Rp)</td>
                    <td class="tengah">Jumlah Bruto (Rp)</td>
                    <td class="tengah">PPh. 5% / 15% (Rp)</td>
                    <td class="tengah">Penerimaan Bersih (Rp)</td>
                    <td class="tengah">Tanda Tangan</td>
                </tr>
                <tr class="tengah">
                    <td width="3%" class="tengah">1</td>
                    <td width="15%" class="tengah">2</td>
                    <td width="3%" class="tengah">3</td>
                    <td width="15%" class="tengah">4</td>
                    <td width="3%" class="tengah">5</td>
                    <td width="11%" class="tengah">6</td>
                    <td width="11%" class="tengah">7</td>
                    <td width="10%" class="tengah">8</td>
                    <td width="11%" class="tengah">9</td>
                    <td width="13%" class="tengah">10</td>
                </tr>
                <?php
                $offset = ($hal - 1) * $dataperpage;
//echo $offset;
                if ($lokasi == 'Administrator') {
                    $query = "select * from instruktur_ajar where tahap='$tahap' and isi='$materi' order by rumpun,rombel,nama";
                } else {
                    $query = "select * from instruktur_ajar where tahap='$tahap' and isi='$materi' and lokasi='$lokasi' order by rumpun,rombel,nama";
                }
//echo "$query";
                $dat = mysqL_query($query);
                $i = $offset + 1;
                while ($data = mysql_fetch_array($dat)) {

                    $jumlahjp = jumlahjpfix($data[kode], $tahap, $kode);
                    if ($kode == 'M06' || 'M044') {
                        $nil1 = 150000 * $data[jp];
                        $tarif1 = rupiah($nil1);
                        $bruto1 = rupiah($nil1);
                        $pot1 = pajak($data[gol]);
                        $pajak1 = rupiah($pot1 * $nil1);
                        $bayar1 = rupiah((1 - $pot1) * $nil);
                        $letak1 = letak($i);
                        $nilai1 = rupiah(150000);

                        $nil2 = 150000 * ($jumlahjp - 2);
                        $tarif2 = rupiah($nil2);
                        $bruto2 = rupiah($nil2);
                        $pot2 = pajak($data[gol]);
                        $pajak2 = rupiah($pot2 * $nil2);
                        $bayar2 = rupiah((1 - $pot2) * $nil2);
                        $letak2 = letak($i);
                        $nilai2 = rupiah(150000);
                    } else {
                        $nil = $data[nilai] * $jumlahjp;
                        $tarif = rupiah($nil);
                        $bruto = rupiah($nil);
                        $pot = pajak($data[gol]);
                        $pajak = rupiah($pot * $nil);
                        $bayar = rupiah((1 - $pot) * $nil);
                        $letak = letak($i);
                        $nilai = rupiah($data[nilai]);
                    }
                    ?>
                    <tr>
                        <td class="tengah"><?= $i ?></td>
                        <td ><?= $data[nama] ?></td>
                        <td><?= $data[gol] ?></td>
                        <td><? echo "$data[rumpun] $data[rombel]" ; ?></td>
                        <td class="tengah"><?
                            echo $jumlahjp-2;
                            ?></td>
                        <td class="kanan"><?= $nilai2; ?></td>
                        <td class="kanan"><?= $bruto2; ?></td>
                        <td class="kanan"><?= $pajak2; ?></td>
                        <td class="kanan"><?= $bayar2; ?></td>
                        <td class="kanan"><?= $letak2; ?></td>
                    </tr>
                    <?php
                    $tottarif2 += 100000;
                    $totbruto2 += $nil2;
                    $totjp2 += 7;
                    $totpajak2 += ($pot2 * $nil2);
                    $totbayar2 += ((1 - $pot2) * $nil2);
                    $i++;
                    $terbilang = ucfirst(terbilang($totbruto2));
                }
                $tottarif2 = rupiah($tottarif2);
                $totbruto2 = rupiah($totbruto2);
                $totpajak2 = rupiah((int) $totpajak2);

                $totbayar2 = rupiah($totbayar2);
                ?>
                <tr>
                    <td>&nbsp;</td>
                    <td class="tengah">Jumlah </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="tengah"><?= $totjp2 ?></td>
                    <td class="kanan">&nbsp;</td>
                    <td class="kanan"><?= $totbruto2; ?></td>
                    <td class="kanan"><?= $totpajak2; ?></td>
                    <td class="kanan"><?= $totbayar2; ?></td>
                    <td class="kanan">&nbsp;</td>
                </tr>
            </table>
            Terbilang : <?php echo rupiah2($totbruto2) ?>&nbsp;( <? echo ucwords($terbilang);?><? echo"Rupiah"?> )<br>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="4%">&nbsp;</td>
                    <td width="4%">&nbsp;</td>
                    <td width="9%">&nbsp;</td>
                    <td width="48%">&nbsp;</td>
                    <td width="35%">&nbsp;</td>
                </tr>
                <tr>
                    <td class="kanan">&nbsp;</td>
                    <td class="kanan">&nbsp;</td>
                    <td class="kanan">An.</td>
                    <td>Ketua Rayon.</td>
                    <td>Surakarta, <?//=$tgl?> </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Sekretaris</td>
                    <td>Penanggung Jawab Keuangan,</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Prof. Dr. Joko Nurkamto, M.Pd</td>
                    <td>Dr. Imam Sujadi, M.Si.</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>NIP. 19610124 198702 1 001</td>
                    <td>NIP. 19670915 200604 1 001</td>
                </tr>
            </table>

            <?php
        } else {
//echo $query;
            $hasil = mysql_query($query);
            $data = mysql_fetch_array($hasil);
            
            $jumData = $data['jumData'];
//echo " JUMLAHNYA $jumData";
            $dataperpage = 30;
            $halaman = ceil($jumData / $dataperpage);
//echo $halaman;

            for ($hal = 1; $hal <= $halaman; $hal++) {
                ?>
                <table width="100%"  cellspacing="0" cellpadding="0" >
                    <tr>
                        <td colspan="10" align="center" class="bersih"><br><br><br>DAFTAR : PENERIMAAN HONORARIUM INSTRUKTUR <?= $isi ?>      KEGIATAN PLPG SERTIFIKASI GURU DALAM JABATAN</td>
                    </tr>
                    <tr>
                        <td colspan="10" align="center" class="bersih"><p> RAYON UNIVERSITAS SEBELAS MARET SURAKARTA KUOTA TAHUN 2016 TAHAP <? echo romawi($tahap); ?></p>
                            <p>&nbsp;</p></td>
                    </tr>
                </table>
                <table width="100%"  cellspacing="0" cellpadding="0" >

                    <tr>
                        <td colspan="5" class="pinggir bersih">Tanggal : <?= $tgl; ?>&nbsp;( <?php
                            if ($lokasi == 'Administrator') {
                                
                            } else {
                                echo $lokasi;
                            }
                            ?> )</td>
                        <? /*   <td colspan="5" class="kanan bersih">Hal.<?= $hal ?>.<?= $isi ?>  Thp.
                        <?= $tahap; ?> Th.<?= date('Y') ?></td> */?>
                    </tr>
                </table>
                <table width="100%" border="1"  cellspacing="0" cellpadding="0" >



                    <tr class="tengah">
                        <td class="tengah">No.</td>
                        <td class="tengah">Nama</td>
                        <td class="tengah">Gol.</td>
                        <td class="tengah">Bidang Studi</td>
                        <td class="tengah">Jml. JP</td>
                        <td class="tengah">Tarif / jam (Rp)</td>
                        <td class="tengah">Jumlah Bruto (Rp)</td>
                        <td class="tengah">PPh. 5% / 15% (Rp)</td>
                        <td class="tengah">Penerimaan Bersih (Rp)</td>
                        <td class="tengah">Tanda Tangan</td>
                    </tr>
                    <tr class="tengah">
                        <td width="3%" class="tengah">1</td>
                        <td width="22%" class="tengah">2</td>
                        <td width="3%" class="tengah">3</td>
                        <td width="8%" class="tengah">4</td>
                        <td width="3%" class="tengah">5</td>
                        <td width="9%" class="tengah">6</td>
                        <td width="10%" class="tengah">7</td>
                        <td width="9%" class="tengah">8</td>
                        <td width="8%" class="tengah">9</td>
                        <td width="13%" class="tengah">10</td>
                    </tr>
                    <?php
                    $offset = ($hal - 1) * $dataperpage;
//echo $offset;
                    if ($lokasi == 'Administrator') {
                        $query = "select * from instruktur_ajar a JOIN instruktur i ON i.kode=a.nia JOIN materi ON a.materi=materi.kode where tahap='$tahap' and isi='$materi' order by rumpun,rombel limit $offset,$dataperpage";
                    } else {
                        $query = "select * from instruktur_ajar a JOIN instruktur i ON i.kode=a.nia JOIN materi ON a.materi=materi.kode where tahap='$tahap' and isi='$materi' and lokasi='$lokasi' order by rumpun,rombel,kelompok limit $offset,$dataperpage";
                    }
//echo "$query";
                    $dat = mysqL_query($query);
                    $i = $offset + 1;
                    while ($data = mysql_fetch_array($dat)) {

                        $jumlahjp = jumlahjpfix($data[kode], $tahap, $kode);
//echo "jumlahnya : $jumlahjp dan $data[kode]";
                        if ($kode == 'M06') {
                            $nil1 = 150000 * 1;
                            $tarif1 = rupiah($nil1);
                            $bruto1 = rupiah($nil1);
                            $pot1 = pajak($data[gol]);
                            $pajak1 = rupiah($pot1 * $nil1);
                            $bayar1 = rupiah((1 - $pot1) * $nil);
                            $letak1 = letak($i);
                            $nilai1 = rupiah(150000);

                            $nil2 = 100000 * ($jumlahjp - 1);
                            $tarif2 = rupiah($nil2);
                            $bruto2 = rupiah($nil2);
                            $pot2 = pajak($data[gol]);
                            $pajak2 = rupiah($pot2 * $nil2);
                            $bayar2 = rupiah((1 - $pot2) * $nil2);
                            $letak2 = letak($i);
                            $nilai2 = rupiah(100000);
                        } else {
                            $nil = $data[nilai] * $jumlahjp;
//echo $data[nilai];echo $jumlahjp;
                            $tarif = rupiah($nil);
                            $bruto = rupiah($nil);
                            $pot = pajak($data[gol]);
                            $pajak = rupiah($pot * $nil);
                            $bayar = rupiah((1 - $pot) * $nil);
                            $letak = letak($i);
                            $nilai = rupiah($data[nilai]);
                        }
                        ?>
                        <tr>
                            <td rowspan=2  class="tengah"><?= $i ?></td>
                            <td><?= $data[nama] ?></td>
                            <td rowspan=2 ><?= $data[gol] ?></td>
                            <td rowspan=2 ><?php
                                if ($kode == 'M09' || $kode == 'M10') {
                                    echo "$data[rumpun] $data[kelompok]";
                                } else {
                                    echo "$data[rumpun] $data[rombel]";
                                }
                                ?></td>
                            <td rowspan=2 class="tengah"><?= $jumlahjp;
                                ?></td>
                            <td rowspan=2 class="kanan"><?= $nilai; ?></td>
                            <td rowspan=2 class="kanan"><?= $bruto; ?> </td>
                            <td rowspan=2 class="kanan"><?= $pajak; ?></td>
                            <td rowspan=2 class="kanan"><?= $bayar ?></td>
                            <td rowspan=2 class="kanan"><?= $letak; ?></td>
                        </tr>

                        <tr>
                            <td>NIK : <?= $data['nik'] ?>
                                <br/>NPWP : <?= $data['npwp'] ?></td>
                        </tr>

                        <?php
                        $tottarif += $data[nilai];
                        $totbruto += $nil;
                        $totjp += $jumlahjp;
                        $totpajak += ($pot * $nil);
                        $totbayar += ((1 - $pot) * $nil);
                        $i++;
                        $terbilang = ucfirst(terbilang($totbruto));
                    }
                    $tottarif = rupiah($tottarif);
                    $totbruto = rupiah($totbruto);
                    $totpajak = rupiah((int) $totpajak);
                    $totbayar = (int) $totbayar;
                    $totbayar = rupiah($totbayar);
                    ?>
                    <tr>
                        <td>&nbsp;</td>
                        <td class="tengah">Jumlah </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="tengah"><?= $totjp ?></td>
                        <td class="kanan">&nbsp;</td>
                        <td class="kanan"><?= $totbruto; ?></td>
                        <td class="kanan"><?= $totpajak; ?></td>
                        <td class="kanan"><?= $totbayar; ?></td>
                        <td class="kanan">&nbsp;</td>
                    </tr>
                </table><br>
                Terbilang : <?= rupiah2($totbruto) ?>&nbsp;( <?= ucwords($terbilang); ?><?= "Rupiah" ?> )<br><br>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="4%">&nbsp;</td>
                        <td width="4%">&nbsp;</td>
                        <td width="9%">&nbsp;</td>
                        <td width="48%">&nbsp;</td>
                        <td width="35%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="kanan">&nbsp;</td>
                        <td class="kanan">&nbsp;</td>
                        <td class="kanan">An.</td>
                        <td>Ketua Rayon.</td>
                        <td>Surakarta, <?//=$tgl?> </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Sekretaris</td>
                        <td>Penanggung Jawab Keuangan,</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Prof. Dr. Joko Nurkamto, M.Pd</td>
                        <td>Dr. Imam Sujadi, M.Si.</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>NIP. 19610124 198702 1 001</td>
                        <td>NIP. 19670915 200604 1 001</td>
                    </tr>
                </table>



                <p><br>
                    <br><br>
                </p>
                <div style="page-break-before: always"></div>
                <?php
            }
        }
    }
    ?>
