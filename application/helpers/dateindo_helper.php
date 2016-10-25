<?php 


			function dateindo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
			   // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
			    $BulanIndo = array("Januari", "Februari", "Maret",
			               "April", "Mei", "Juni",
			               "Juli", "Agustus", "September",
			               "Oktober", "November", "Desember");
			  
			    $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
			    $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
			    $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
			    
			    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
			    return($result);
			}

			function umur($tgl_lahir,$delimiter='-') {
    
			    list($tahun,$bulan,$hari) = explode($delimiter, $tgl_lahir);
			    
			    $selisih_hari = date('d') - $hari;
			    $selisih_bulan = date('m') - $bulan;
			    $selisih_tahun = date('Y') - $tahun;
			    
			    if ($selisih_hari < 0 || $selisih_bulan < 0) {
			        $selisih_tahun--;
			    }
			    
			    return $selisih_tahun;
			}

?>