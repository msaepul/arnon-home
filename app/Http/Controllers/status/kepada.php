<?php {
    $db_host = "127.0.0.1";
    $db_user = "root";
    $db_pass = "9igywo9430LKaX3n";
    $db_name = "home";

    $koneksi        = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $nomor          = $request->nomor;
    $kepada         = $request->kepada;
    $k_dept         = $request->k_dept;
    $dari           = $request->dari;
    $d_dept         = $request->d_dept;
    $jenis          = strtoupper($request->jenis);
    $dianalisa      = $request->dianalisa;
    $tgl_analisa    = tgl($request->tgl_analisa);
    $target_selesai = tgl($request->target_selesai);
    $randlink       = $request->randlink;
    $id_buat        = $request->id_buat;
}
// URL for request POST /message
$apikey = '0929af6bd1501e22f7d1b73236b1c698af238f4e';


//kepada yang mendapatkan ptpp 1
$tel1 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='$k_dept' AND cabang='$kepada' AND id_kirim=1 AND no_wa !='' AND no_wa !=0  AND no_wa !='+62'");
$row1 = mysqli_fetch_array($tel1);
if (mysqli_num_rows($tel1) == 1) {
    $nama1      = $row1['nama_lengkap'];
    $tujuan1    = $row1['no_wa'];
    $pesan1     = "Halo $nama1, $k_dept $kepada Telah Mendapatkan PTPP dengan detail : \nNomor : \n*$nomor* \nJenis PTPP : $jenis \nStatus Saat Ini adalah : *DRAFT* \nHarap Segera Melakukan tindakan kepada PTPP Tersebut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

    $curl1 = curl_init();

    curl_setopt_array($curl1, array(
        CURLOPT_URL => 'https://starsender.online/api/sendText?message=' . rawurlencode($pesan1) . '&tujuan=' . rawurlencode($tujuan1 . '@s.whatsapp.net'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'apikey: ' . $apikey
        ),
    ));

    $response1 = curl_exec($curl1);

    curl_close($curl1);
}

//kepada yang mendapatkan ptpp 2
$tel2 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='$k_dept' AND cabang='$kepada' AND id_kirim=2 AND no_wa !='' AND no_wa !=0  AND no_wa !='+62'");
$row2 = mysqli_fetch_array($tel2);
if (mysqli_num_rows($tel2) == 1) {
    $nama2      = $row2['nama_lengkap'];
    $tujuan2    = $row2['no_wa'];
    $pesan2     = "Halo $nama2, $k_dept $kepada Telah Mendapatkan PTPP dengan detail : \nNomor : \n*$nomor* \nJenis PTPP : $jenis \nStatus Saat Ini adalah : *DRAFT* \nHarap Segera Melakukan tindakan kepada PTPP Tersebut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

    $curl2 = curl_init();

    curl_setopt_array($curl2, array(
        CURLOPT_URL => 'https://starsender.online/api/sendText?message=' . rawurlencode($pesan2) . '&tujuan=' . rawurlencode($tujuan2 . '@s.whatsapp.net'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'apikey: ' . $apikey
        ),
    ));

    $response2 = curl_exec($curl2);

    curl_close($curl2);
}

//kepada yang mendapatkan ptpp 3
$tel3 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='$k_dept' AND cabang='$kepada' AND id_kirim=3 AND no_wa !='' AND no_wa !=0  AND no_wa !='+62'");
$row3 = mysqli_fetch_array($tel3);
if (mysqli_num_rows($tel3) == 1) {
    $nama3      = $row3['nama_lengkap'];
    $tujuan3    = $row3['no_wa'];
    $pesan3     = "Halo $nama3, $k_dept $kepada Telah Mendapatkan PTPP dengan detail : \nNomor : \n*$nomor* \nJenis PTPP : $jenis \nStatus Saat Ini adalah : *DRAFT* \nHarap Segera Melakukan tindakan kepada PTPP Tersebut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

    $curl3 = curl_init();

    curl_setopt_array($curl3, array(
        CURLOPT_URL => 'https://starsender.online/api/sendText?message=' . rawurlencode($pesan3) . '&tujuan=' . rawurlencode($tujuan3 . '@s.whatsapp.net'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'apikey: ' . $apikey
        ),
    ));

    $response3 = curl_exec($curl3);

    curl_close($curl3);
}

//kepada yang mendapatkan ptpp 4
$tel4 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='$k_dept' AND cabang='$kepada' AND id_kirim=4 AND no_wa !='' AND no_wa !=0  AND no_wa !='+62'");
$row4 = mysqli_fetch_array($tel4);
if (mysqli_num_rows($tel4) == 1) {
    $nama4      = $row4['nama_lengkap'];
    $tujuan4    = $row4['no_wa'];
    $pesan4     = "Halo $nama4, $k_dept $kepada Telah Mendapatkan PTPP dengan detail : \nNomor : \n*$nomor* \nJenis PTPP : $jenis \nStatus Saat Ini adalah : *DRAFT* \nHarap Segera Melakukan tindakan kepada PTPP Tersebut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

    $curl4 = curl_init();

    curl_setopt_array($curl4, array(
        CURLOPT_URL => 'https://starsender.online/api/sendText?message=' . rawurlencode($pesan4) . '&tujuan=' . rawurlencode($tujuan4 . '@s.whatsapp.net'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'apikey: ' . $apikey
        ),
    ));

    $response4 = curl_exec($curl4);

    curl_close($curl4);
}

//kepada yang mendapatkan ptpp 5
$tel5 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='$k_dept' AND cabang='$kepada' AND id_kirim=5 AND no_wa !='' AND no_wa !=0  AND no_wa !='+62'");
$row5 = mysqli_fetch_array($tel5);
if (mysqli_num_rows($tel5) == 1) {
    $nama5      = $row5['nama_lengkap'];
    $tujuan5    = $row5['no_wa'];
    $pesan5     = "Halo $nama5, $k_dept $kepada Telah Mendapatkan PTPP dengan detail : \nNomor : \n*$nomor* \nJenis PTPP : $jenis \nStatus Saat Ini adalah : *DRAFT* \nHarap Segera Melakukan tindakan kepada PTPP Tersebut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

    $curl5 = curl_init();

    curl_setopt_array($curl5, array(
        CURLOPT_URL => 'https://starsender.online/api/sendText?message=' . rawurlencode($pesan5) . '&tujuan=' . rawurlencode($tujuan5 . '@s.whatsapp.net'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'apikey: ' . $apikey
        ),
    ));

    $response5 = curl_exec($curl5);

    curl_close($curl5);
}

//kepada yang mendapatkan ptpp 6
$tel6 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='$k_dept' AND cabang='$kepada' AND id_kirim=6 AND no_wa !='' AND no_wa !=0  AND no_wa !='+62'");
$row6 = mysqli_fetch_array($tel6);
if (mysqli_num_rows($tel6) == 1) {
    $nama6      = $row6['nama_lengkap'];
    $tujuan6    = $row6['no_wa'];
    $pesan6     = "Halo $nama6, $k_dept $kepada Telah Mendapatkan PTPP dengan detail : \nNomor : \n*$nomor* \nJenis PTPP : $jenis \nStatus Saat Ini adalah : *DRAFT* \nHarap Segera Melakukan tindakan kepada PTPP Tersebut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

    $curl6 = curl_init();

    curl_setopt_array($curl6, array(
        CURLOPT_URL => 'https://starsender.online/api/sendText?message=' . rawurlencode($pesan6) . '&tujuan=' . rawurlencode($tujuan6 . '@s.whatsapp.net'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'apikey: ' . $apikey
        ),
    ));

    $response6 = curl_exec($curl6);

    curl_close($curl6);
}

//kepada yang mendapatkan ptpp 7
$tel7 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='$k_dept' AND cabang='$kepada' AND id_kirim=7 AND no_wa !='' AND no_wa !=0  AND no_wa !='+62'");
$row7 = mysqli_fetch_array($tel7);
if (mysqli_num_rows($tel7) == 1) {
    $nama7      = $row7['nama_lengkap'];
    $tujuan7    = $row7['no_wa'];
    $pesan7     = "Halo $nama7, $k_dept $kepada Telah Mendapatkan PTPP dengan detail : \nNomor : \n*$nomor* \nJenis PTPP : $jenis \nStatus Saat Ini adalah : *DRAFT* \nHarap Segera Melakukan tindakan kepada PTPP Tersebut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

    $curl7 = curl_init();

    curl_setopt_array($curl7, array(
        CURLOPT_URL => 'https://starsender.online/api/sendText?message=' . rawurlencode($pesan7) . '&tujuan=' . rawurlencode($tujuan7 . '@s.whatsapp.net'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'apikey: ' . $apikey
        ),
    ));

    $response7 = curl_exec($curl7);

    curl_close($curl7);
}

//kepada yang mendapatkan ptpp 8
$tel8 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='$k_dept' AND cabang='$kepada' AND id_kirim=8 AND no_wa !='' AND no_wa !=0  AND no_wa !='+62'");
$row8 = mysqli_fetch_array($tel8);
if (mysqli_num_rows($tel8) == 1) {
    $nama8      = $row8['nama_lengkap'];
    $tujuan8    = $row8['no_wa'];
    $pesan8     = "Halo $nama8, $k_dept $kepada Telah Mendapatkan PTPP dengan detail : \nNomor : \n*$nomor* \nJenis PTPP : $jenis \nStatus Saat Ini adalah : *DRAFT* \nHarap Segera Melakukan tindakan kepada PTPP Tersebut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

    $curl8 = curl_init();

    curl_setopt_array($curl8, array(
        CURLOPT_URL => 'https://starsender.online/api/sendText?message=' . rawurlencode($pesan8) . '&tujuan=' . rawurlencode($tujuan8 . '@s.whatsapp.net'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'apikey: ' . $apikey
        ),
    ));

    $response8 = curl_exec($curl8);

    curl_close($curl8);
}

//kepada BM yang mendapatkan ptpp
$tel0 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='BM' AND cabang='$kepada' AND cabang!='$dari' AND no_wa !='' AND no_wa !=0  AND no_wa !='+62'");
$row0 = mysqli_fetch_array($tel0);
if (mysqli_num_rows($tel0) == 1) {
    $nama0      = $row0['nama_lengkap'];
    $tujuan0    = $row0['no_wa'];
    $id0        = $row0['id'];
    $pesan0     = "Halo $nama0, Departemen $k_dept Telah *Mendapatkan* PTPP dengan detail : \nNomor:\n*$nomor* \nJenis PTPP : $jenis \nStatus Saat Ini adalah : *DRAFT* \nDetail PTPP bisa dilihat melalui link berikut:\nhttps://sistem.arnonbakery.com/ptpp/xd3r9?Q=$randlink&d1d=$id0 \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

    $curl0 = curl_init();

    curl_setopt_array($curl0, array(
        CURLOPT_URL => 'https://starsender.online/api/sendText?message=' . rawurlencode($pesan0) . '&tujuan=' . rawurlencode($tujuan0 . '@s.whatsapp.net'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'apikey: ' . $apikey
        ),
    ));

    $response0 = curl_exec($curl0);

    curl_close($curl0);
}

if ($k_dept !== 'SIS' && $jenis !== 'INTERNAL') {
    //kepada Sistem yang mendapatkan ptpp 1
    $tel9 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='SIS' AND cabang='$kepada' AND cabang !='HO' AND id_kirim=1 AND no_wa !='' AND no_wa !=0  AND no_wa !='+62'");
    $row9 = mysqli_fetch_array($tel9);
    if (mysqli_num_rows($tel9) == 1) {
        $nama9      = $row9['nama_lengkap'];
        $tujuan9    = $row9['no_wa'];
        $pesan9     = "Halo $nama9, $k_dept $kepada Telah Mendapatkan PTPP dengan detail : \nNomor : \n*$nomor* \nJenis PTPP : $jenis \nStatus Saat Ini adalah : *DRAFT* \nHarap Segera Melakukan tindakan kepada PTPP Tersebut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

        $curl9 = curl_init();

        curl_setopt_array($curl9, array(
            CURLOPT_URL => 'https://starsender.online/api/sendText?message=' . rawurlencode($pesan9) . '&tujuan=' . rawurlencode($tujuan9 . '@s.whatsapp.net'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'apikey: ' . $apikey
            ),
        ));

        $response9 = curl_exec($curl9);

        curl_close($curl9);
    }


    //kepada Sistem yang mendapatkan ptpp 2
    $tel10 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='SIS' AND cabang='$kepada' AND cabang !='HO' AND id_kirim=2 AND no_wa !='' AND no_wa !=0  AND no_wa !='+62'");
    $row10 = mysqli_fetch_array($tel10);
    if (mysqli_num_rows($tel10) == 1) {
        $nama10      = $row10['nama_lengkap'];
        $tujuan10    = $row10['no_wa'];
        $pesan10     = "Halo $nama10, $k_dept $kepada Telah Mendapatkan PTPP dengan detail : \nNomor : \n*$nomor* \nJenis PTPP : $jenis \nStatus Saat Ini adalah : *DRAFT* \nHarap Segera Melakukan tindakan kepada PTPP Tersebut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

        $curl10 = curl_init();

        curl_setopt_array($curl10, array(
            CURLOPT_URL => 'https://starsender.online/api/sendText?message=' . rawurlencode($pesan10) . '&tujuan=' . rawurlencode($tujuan10 . '@s.whatsapp.net'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'apikey: ' . $apikey
            ),
        ));

        $response10 = curl_exec($curl10);

        curl_close($curl10);
    }


    //kepada Sistem yang mendapatkan ptpp 3
    $tel11 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='SIS' AND cabang='$kepada' AND cabang !='HO' AND id_kirim=3 AND no_wa !='' AND no_wa !=0 AND no_wa !='+62'");
    $row11 = mysqli_fetch_array($tel11);
    if (mysqli_num_rows($tel11) == 1) {
        $nama11      = $row11['nama_lengkap'];
        $tujuan11    = $row11['no_wa'];
        $pesan11     = "Halo $nama11, $k_dept $kepada Telah Mendapatkan PTPP dengan detail : \nNomor : \n*$nomor* \nJenis PTPP : $jenis \nStatus Saat Ini adalah : *DRAFT* \nHarap Segera Melakukan tindakan kepada PTPP Tersebut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

        $curl11 = curl_init();

        curl_setopt_array($curl11, array(
            CURLOPT_URL => 'https://starsender.online/api/sendText?message=' . rawurlencode($pesan11) . '&tujuan=' . rawurlencode($tujuan11 . '@s.whatsapp.net'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'apikey: ' . $apikey
            ),
        ));

        $response11 = curl_exec($curl11);

        curl_close($curl11);
    }


    //kepada Sistem yang mendapatkan ptpp 4
    $tel12 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='SIS' AND cabang='$kepada' AND cabang !='HO' AND id_kirim=4 AND no_wa !='' AND no_wa !=0  AND no_wa !='+62'");
    $row12 = mysqli_fetch_array($tel12);
    if (mysqli_num_rows($tel12) == 1) {
        $nama12      = $row12['nama_lengkap'];
        $tujuan12    = $row12['no_wa'];
        $pesan12     = "Halo $nama12, $k_dept $kepada Telah Mendapatkan PTPP dengan detail : \nNomor : \n*$nomor* \nJenis PTPP : $jenis \nStatus Saat Ini adalah : *DRAFT* \nHarap Segera Melakukan tindakan kepada PTPP Tersebut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

        $curl12 = curl_init();

        curl_setopt_array($curl12, array(
            CURLOPT_URL => 'https://starsender.online/api/sendText?message=' . rawurlencode($pesan12) . '&tujuan=' . rawurlencode($tujuan12 . '@s.whatsapp.net'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'apikey: ' . $apikey
            ),
        ));

        $response12 = curl_exec($curl12);

        curl_close($curl12);
    }


    //kepada Sistem yang mendapatkan ptpp 5
    $tel13 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='SIS' AND cabang='$kepada' AND cabang !='HO' AND id_kirim=5 AND no_wa !='' AND no_wa !=0  AND no_wa !='+62'");
    $row13 = mysqli_fetch_array($tel13);
    if (mysqli_num_rows($tel13) == 1) {
        $nama13      = $row13['nama_lengkap'];
        $tujuan13    = $row13['no_wa'];
        $pesan13     = "Halo $nama13, $k_dept $kepada Telah Mendapatkan PTPP dengan detail : \nNomor : \n*$nomor* \nJenis PTPP : $jenis \nStatus Saat Ini adalah : *DRAFT* \nHarap Segera Melakukan tindakan kepada PTPP Tersebut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

        $curl13 = curl_init();

        curl_setopt_array($curl13, array(
            CURLOPT_URL => 'https://starsender.online/api/sendText?message=' . rawurlencode($pesan13) . '&tujuan=' . rawurlencode($tujuan13 . '@s.whatsapp.net'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'apikey: ' . $apikey
            ),
        ));

        $response13 = curl_exec($curl13);

        curl_close($curl13);
    }
}
