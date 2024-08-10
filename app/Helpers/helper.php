<?php 

function rupiah($angka){
	
	$hasil_rupiah = number_format($angka,0,',','.');
	echo $hasil_rupiah;

}

function getaccesbutton($idsub){
    $id_user= Auth::user()->id;
    $data=DB::select("SELECT tampil,buat,ubah,hapus FROM tb_access_menu WHERE id_user='$id_user' AND id_sub_menu='$idsub'");
    

    $buton=[
        'baru'  => $data[0]->buat,
        'ubah'  => $data[0]->ubah,
        'hapus' => $data[0]->hapus
    ];
    
    return $buton;
}

function aktifbaru($index){
        if($index!='Y'){
            $aktivasi='hidden';
        }else{
            $aktivasi='';
        }
        return $aktivasi;
}

function aktifubah($index){
    if($index!='Y'){
        $aktivasiubah='hidden';
    }else{
        $aktivasiubah='';
    }
    return $aktivasiubah;
}

function aktifhapus($index){
    if($index!='Y'){
        $aktivasihapus='hidden';
    }else{
        $aktivasihapus='';
    }
    return $aktivasihapus;
}

function generatecode($kode){
    $countermu=DB::select("select udf_generateucodemt('$kode')kode");

    return $countermu[0]->kode;
}

function get_kos($urutan){
    $bnb=DB::select("SELECT REPEAT('0', 4-LENGTH($urutan))oke");

    return $bnb[0]->oke;
}
function get_fj($ids,$nano,$urutan,$tgl){
    $ten=DB::select("SELECT CONCAT('$ids.',DATE_FORMAT('$tgl','%y%m%d'),'.','$nano',$urutan)wkwk");

    return $ten[0]->wkwk;
}

function addSpaces($string = '', $valid_string_length = 0) {
    if (strlen($string) < $valid_string_length) {
        $spaces = $valid_string_length - strlen($string);
        for ($index1 = 1; $index1 <= $spaces; $index1++) {
            $string = $string . ' ';
        }
    }

    return $string;
}

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
}

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }     		
    return $hasil;
}

function tglCarbon($tanggal, $display) {
  $date = Carbon\Carbon::parse($tanggal)->locale('id');
  $date->settings(['formatFunction' => 'translatedFormat']);
  
  return $date->format($display);
}