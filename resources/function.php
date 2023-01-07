<?php
include 'koneksi.php';

function rupiah1($angka){
	$hasil_rupiah = "Rp " . number_format($angka, 0, ".", ".");
	return $hasil_rupiah;
}
 
function rupiah2($angka){
	$hasil_rupiah = "Rp " . number_format($angka, 1, ",", ".");
	return $hasil_rupiah;
}
 
function rupiah3($angka){
	$hasil_rupiah = "Rp " . number_format($angka, 2, ".", ",");
	return $hasil_rupiah;
}

function fcks($cek)
{
	if ($cek == 1) {
		return 'Ya';
	} else if($cek == 0) {
		return 'Tidak';
	} 	
} 

function fcks2($cek)
{
	if ($cek == 1) {
		return 'Laik';
	} else if($cek == 0) {
		return 'Tidak Laik';
	} 	
} 

function bln($tanggal)
{
	if ($tanggal == NULL) {
		return '-';
} 	else if($tanggal == '') {
		return '-';
} 	else {
		$bulan = array (01 =>   'Januari',
				'Febuari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
		$hasil_tgl = $bulan[(int)$tanggal];

		return $hasil_tgl;
	}
} 

function tgl_id($tanggal)
{
	if ($tanggal == NULL) {
		return '-';
} 	else if($tanggal == '') {
		return '-';
} 	else {
		$bulan = array (1 =>   'I',
				'II',
				'III',
				'IV',
				'V',
				'VI',
				'VII',
				'VIII',
				'IX',
				'X',
				'XI',
				'XII'
			);
		$split = explode('-', $tanggal);
		$hasil_tgl =$bulan[(int)$split[0]];

		return $hasil_tgl;
	}
} 

function tgl($tanggal)
{
	if ($tanggal == NULL) {
		return '-';
} 	else if($tanggal == '') {
		return '-';
} 	else {
		$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
		$split = explode('-', $tanggal);
		$hasil_tgl = $split[2].'-'.$bulan[(int)$split[1]].'-'.$split[0];

		return $hasil_tgl;
	}
} 

function tgl2($tanggal)
{
	if ($tanggal == NULL) {
		return '-';
} 	else if($tanggal == '') {
		return '-';
} 	else {
		$bulan = array (1 =>   '01',
				'02',
				'03',
				'04',
				'05',
				'06',
				'07',
				'08',
				'09',
				'10',
				'11',
				'12'
			);
		$split = explode('-', $tanggal);
		$hasil_tgl = $split[2].'/'.$bulan[(int)$split[1]].'/'.$split[0];

		return $hasil_tgl;
	}
} 

function tgl3($tanggal)
{
	if ($tanggal == NULL) {
		return '-';
} 	else if($tanggal == '') {
		return '-';
} 	else {
		$bulan = array (1 =>   'Jan',
				'Feb',
				'Mar',
				'Apr',
				'Mei',
				'Jun',
				'Jul',
				'Ags',
				'Sept',
				'Okt',
				'Nov',
				'Des'
			);
		$split = explode('-', $tanggal);
		$hasil_tgl = $split[2].'-'.$bulan[(int)$split[1]].'-'.substr($split[0],-2,2);

		return $hasil_tgl;
	}
}

function grafik($grafik)
{
	if ($grafik == NULL) {
		return '';
} 	else if($grafik == '') {
		return '';
} 	else if($grafik == 0) {
		return '';
} 	else {
		return $grafik;
	}
}


function cbg2($kodcab)
{
	if ($kodcab == NULL) {
		return '-';
} 	else if($kodcab == '') {
		return '-';
} 	else {
		$cbg = array (100 =>   'HO',
				'PDL',
				'TGL',
				'MDO',
				'MKS',
				'KDR',
				'BDJ',
				'BWI',
				'LPG',
				'DMK',
				'PLM',
				'BLI',
				'PKU',
				'',
				'',
				'',
				'MDN',
				'LOM',
				'PNK',
				'LLG',
				'CBL',
				'JTW',
				'PLU'					
			);
		$cabang = $cbg[(int)$kodcab];

		return $cabang;
	}
}

function camut($kodcab)
{
	if ($kodcab == NULL) {
		return '-';
} 	else if($kodcab == '') {
		return '-';
} 	else {
		$cbg = array (100 =>   'HO',
				'SIS-08.3',
				'SIS-03',
				'SIS-05.1',
				'SIS-06.2',
				'SIS-03.2',
				'SIS-07.2',
				'SIS-17.1',
				'SIS-07.2',
				'SIS-08',
				'SIS-01.3',
				'SIS-05.1',
				'SIS-01.2',
				'',
				'',
				'',
				'SIS-06.2',
				'SIS-03.1',
				'SIS-01.2',
				'SIS-05.2',
				'SIS-09.2',
				'SIS-07.1',
				'SIS-20'					
			);
		$cabang = $cbg[(int)$kodcab];

		return $cabang;
	}
}

function random_str(
	int $length = 64,
	string $keyspace = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
	if ($length < 1) {
		throw new \RangeException("Length must be a positive integer");
	}
	$pieces = [];
	$max = mb_strlen($keyspace, '8bit') - 1;
	for ($i = 0; $i < $length; ++$i) {
		$pieces []= $keyspace[random_int(0, $max)];
	}
	return implode('', $pieces);
}

function wa($no_wa) {
	if (substr($no_wa,0,1) == "+") { 
	   return substr($no_wa,1);
   } else {
	   return $no_wa;
   }
}
