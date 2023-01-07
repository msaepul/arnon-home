<?php {
    $db_host = "127.0.0.1";
    $db_user = "root";
    $db_pass = "9igywo9430LKaX3n";
    $db_name = "home";

    $koneksi        = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $query          = mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE kode='$kode'");
    $data           = mysqli_fetch_array($query);
    $nomor          = $data['nomor'];
    $kepada         = $data['kepada'];
    $k_dept         = $data['k_dept'];
    $dari           = $data['dari'];
    $d_dept         = $data['d_dept'];
    $jenis          = strtoupper($data['jenis']);
    $dianalisa      = $data['dianalisa'];
    $tgl_analisa    = tgl($data['tgl_analisa']);
    $target_selesai = tgl($data['target_selesai']);
    $randlink       = $data['randlink'];
    $id_buat        = $data['id_buat'];
}

// URL for request POST /message
$apikey = '0929af6bd1501e22f7d1b73236b1c698af238f4e';

// Notif Kepada yang membuat PTPP
$tel0 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE id='$id_buat' AND no_wa !='' AND no_wa !=0  AND no_wa !='+62'");
$row0 = mysqli_fetch_array($tel0);
if (mysqli_num_rows($tel0) == 1) {
    $nama0      = $row0['nama_lengkap'];
    $tujuan0    = $row0['no_wa'];
    $pesan0 = "Halo $nama0, PTPP yang anda buat dengan detail : \nNomor : *$nomor* \nJenis PTPP : $jenis \nStatus saat ini : *CONFIRM BM* \nTelah dianalisa oleh : $dianalisa \nPada tanggal : $tgl_analisa \nTarget Selesai : $target_selesai, \nDikonfirmasi Oleh : $userlogin \nHarap segera melakukan tindakan *(Terima atau Tolak Analisa)* pada PTPP tersebut. Anda bisa melakukan Terima atau tolak pada link berikut melalui Handphone tanpa perlu login: https://sistem.arnonbakery.com/ptpp/xd3r9?Q=$randlink&d1d=$id_buat \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

    $curl0 = curl_init();

    curl_setopt_array($curl0, [
        CURLOPT_URL => 'https://starsender.online/api/sendText?message=' . rawurlencode($pesan0) . '&tujuan=' . rawurlencode($tujuan0 . '@s.whatsapp.net'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => ['apikey: ' . $apikey],
    ]);

    $response0 = curl_exec($curl0);

    curl_close($curl0);
}


//Notif Kepada BM yang diPTPP
$tel1 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='BM' AND no_wa !='' AND no_wa !=0  AND no_wa !='+62' AND cabang='$kepada' AND cabang!='$dari'");
$row1 = mysqli_fetch_array($tel1);
if (mysqli_num_rows($tel1) == 1) {
    $nama1      = $row1['nama_lengkap'];
    $tujuan1    = $row1['no_wa'];
    $pesan1     = "Halo $nama1, PTPP yang diberikan kepada $k_dept $kepada dengan detail : \nNomor : *$nomor* \nJenis PTPP : $jenis \nStatus Saat ini : *CONFIRM BM* \nTelah dianalisa oleh : $dianalisa ($k_dept $kepada) \nPada tanggal : $tgl_analisa \nTarget Selesai : $target_selesai, \nDikonfirmasi Oleh : $userlogin \n$d_dept $dari akan segera memberikan tindakan *(Terima atau Tolak Analisa)* pada PTPP tersebut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```"; // Message

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

//Notif Kepada BM yang Membuat PTPP
$tel2 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='BM' AND no_wa !='' AND no_wa !=0  AND no_wa !='+62' AND cabang='$dari'");
$row2 = mysqli_fetch_array($tel2);
if (mysqli_num_rows($tel2) == 1) {
    $nama2      = $row2['nama_lengkap'];
    $tujuan2    = $row2['no_wa'];
    $pesan2     = "Halo $nama2, PTPP yang $d_dept $dari buat dengan detail :\nNomor : *$nomor* \nJenis PTPP : $jenis \nStatus Saat ini : *CONFIRM BM* \nTelah dianalisa oleh : $dianalisa ($k_dept $kepada) \nPada tanggal : $tgl_analisa \nTarget Selesai : $target_selesai, \nDikonfirmasi Oleh : $userlogin \nHarap segera melakukan tindakan *(Terima atau Tolak Analisa)* pada PTPP tersebut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

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


if ($kepada !== 'HO') {
    //notif untuk sistem cabang kepada 1
    $tel8 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='SIS' AND no_wa !='' AND no_wa !=0  AND no_wa !='+62' AND cabang='$kepada' AND cabang!='$dari' AND id_kirim=1 ");
    $row8 = mysqli_fetch_array($tel8);
    if (mysqli_num_rows($tel8) == 1) {
        $nama8      = $row8['nama_lengkap'];
        $tujuan8    = $row8['no_wa'];
        $id8        = $row8['id'];
        $pesan8     = "Halo $nama8, PTPP yang diberikan kepada $k_dept $kepada dengan detail : \nNomor: *$nomor* \nJenis PTPP : $jenis \nStatus Saat ini : *CONFIRM BM* \nTelah dianalisa oleh : $dianalisa ($k_dept $kepada) \nPada tanggal : $tgl_analisa \nTarget Selesai : $target_selesai, \nDikonfirmasi Oleh : $userlogin \n$d_dept $dari harus segera memberikan tindakan *(Terima atau Tolak Analisa)* pada PTPP tersebut. \nAnda bisa melakukan Terima atau tolak pada link berikut melalui Handphone tanpa perlu login:\nhttps://sistem.arnonbakery.com/ptpp/xd3r9?Q=$randlink&d1d=$id8 \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

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

    //notif untuk sistem cabang kepada 2
    $tel9 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='SIS' AND no_wa !='' AND no_wa !=0  AND no_wa !='+62' AND cabang='$kepada' AND cabang!='$dari' AND id_kirim=2 ");
    $row9 = mysqli_fetch_array($tel9);
    if (mysqli_num_rows($tel9) == 1) {
        $nama9      = $row9['nama_lengkap'];
        $tujuan9    = $row9['no_wa'];
        $id9        = $row9['id'];
        $pesan9     = "Halo $nama9, PTPP yang diberikan kepada $k_dept $kepada dengan detail : \nNomor: *$nomor* \nJenis PTPP : $jenis \nStatus Saat ini : *CONFIRM BM* \nTelah dianalisa oleh : $dianalisa ($k_dept $kepada) \nPada tanggal : $tgl_analisa \nTarget Selesai : $target_selesai, \nDikonfirmasi Oleh : $userlogin \n$d_dept $dari harus segera memberikan tindakan *(Terima atau Tolak Analisa)* pada PTPP tersebut. \nAnda bisa melakukan Terima atau tolak pada link berikut melalui Handphone tanpa perlu login:\nhttps://sistem.arnonbakery.com/ptpp/xd3r9?Q=$randlink&d1d=$id9 \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

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

    //notif untuk sistem cabang kepada 3
    $tel10 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='SIS' AND no_wa !='' AND no_wa !=0  AND no_wa !='+62' AND cabang='$kepada' AND cabang!='$dari' AND id_kirim=3 ");
    $row10 = mysqli_fetch_array($tel10);
    if (mysqli_num_rows($tel10) == 1) {
        $nama10      = $row10['nama_lengkap'];
        $tujuan10    = $row10['no_wa'];
        $id10        = $row10['id'];
        $pesan10     = "Halo $nama10, PTPP yang diberikan kepada $k_dept $kepada dengan detail : \nNomor: *$nomor* \nJenis PTPP : $jenis \nStatus Saat ini : *CONFIRM BM* \nTelah dianalisa oleh : $dianalisa ($k_dept $kepada) \nPada tanggal : $tgl_analisa \nTarget Selesai : $target_selesai, \nDikonfirmasi Oleh : $userlogin \n$d_dept $dari harus segera memberikan tindakan *(Terima atau Tolak Analisa)* pada PTPP tersebut. \nAnda bisa melakukan Terima atau tolak pada link berikut melalui Handphone tanpa perlu login:\nhttps://sistem.arnonbakery.com/ptpp/xd3r9?Q=$randlink&d1d=$id10 \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

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
}

if ($dari !== 'HO') {
    //notif untuk sistem cabang dari 1
    $tel11 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='SIS' AND no_wa !='' AND no_wa !=0  AND no_wa !='+62' AND cabang='$dari' AND id_kirim=1 ");
    $row11 = mysqli_fetch_array($tel11);
    if (mysqli_num_rows($tel11) == 1) {
        $nama11      = $row11['nama_lengkap'];
        $tujuan11    = $row11['no_wa'];
        $id11        = $row11['id'];
        $pesan11     = "Halo $nama11, PTPP yang diberikan kepada $k_dept $kepada dengan detail : \nNomor: *$nomor* \nJenis PTPP : $jenis \nStatus Saat ini : *CONFIRM BM* \nTelah dianalisa oleh : $dianalisa ($k_dept $kepada) \nPada tanggal : $tgl_analisa \nTarget Selesai : $target_selesai, \nDikonfirmasi Oleh : $userlogin \n$d_dept $dari akan segera memberikan tindakan *(Terima atau Tolak Analisa)* pada PTPP tersebut. \nAnda bisa melakukan Terima atau tolak pada link berikut melalui Handphone tanpa perlu login:\nhttps://sistem.arnonbakery.com/ptpp/xd3r9?Q=$randlink&d1d=$id11 \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

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

    //notif untuk sistem cabang dari 2
    $tel12 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='SIS' AND no_wa !='' AND no_wa !=0  AND no_wa !='+62' AND cabang='$dari' AND id_kirim=2 ");
    $row12 = mysqli_fetch_array($tel12);
    if (mysqli_num_rows($tel12) == 1) {
        $nama12      = $row12['nama_lengkap'];
        $tujuan12    = $row12['no_wa'];
        $id12        = $row12['id'];
        $pesan12     = "Halo $nama12, PTPP yang diberikan kepada $k_dept $kepada dengan detail : \nNomor: *$nomor* \nJenis PTPP : $jenis \nStatus Saat ini : *CONFIRM BM* \nTelah dianalisa oleh : $dianalisa ($k_dept $kepada) \nPada tanggal : $tgl_analisa \nTarget Selesai : $target_selesai, \nDikonfirmasi Oleh : $userlogin \n$d_dept $dari akan segera memberikan tindakan *(Terima atau Tolak Analisa)* pada PTPP tersebut. \nAnda bisa melakukan Terima atau tolak pada link berikut melalui Handphone tanpa perlu login:\nhttps://sistem.arnonbakery.com/ptpp/xd3r9?Q=$randlink&d1d=$id12 \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

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

    //notif untuk sistem cabang dari 3
    $tel13 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='SIS' AND no_wa !='' AND no_wa !=0  AND no_wa !='+62' AND cabang='$dari' AND id_kirim=3 ");
    $row13 = mysqli_fetch_array($tel13);
    if (mysqli_num_rows($tel13) == 1) {
        $nama13      = $row13['nama_lengkap'];
        $tujuan13    = $row13['no_wa'];
        $id13        = $row13['id'];
        $pesan13     = "Halo $nama13, PTPP yang diberikan kepada $k_dept $kepada dengan detail : \nNomor: *$nomor* \nJenis PTPP : $jenis \nStatus Saat ini : *CONFIRM BM* \nTelah dianalisa oleh : $dianalisa ($k_dept $kepada) \nPada tanggal : $tgl_analisa \nTarget Selesai : $target_selesai, \nDikonfirmasi Oleh : $userlogin \n$d_dept $dari akan segera memberikan tindakan *(Terima atau Tolak Analisa)* pada PTPP tersebut. \nAnda bisa melakukan Terima atau tolak pada link berikut melalui Handphone tanpa perlu login:\nhttps://sistem.arnonbakery.com/ptpp/xd3r9?Q=$randlink&d1d=$id13 \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

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
