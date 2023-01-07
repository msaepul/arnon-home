<?php {
    $db_host = "127.0.0.1";
    $db_user = "root";
    $db_pass = "9igywo9430LKaX3n";
    $db_name = "home";

    $koneksi        = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $query          = mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE kode='$kode'");
    $data           = mysqli_fetch_array($query);
    $today          = tgl(date('Y') . '-' . date('m') . '-' . date('d'));
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
    $alasan         = $data['alasan'];
}

// URL for request POST /message
$apikey = '0929af6bd1501e22f7d1b73236b1c698af238f4e';

// Notif Kepada yang membuat PTPP
$tel0 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE id='$id_buat' AND no_wa !='' AND no_wa !=0  AND no_wa !='+62'");
$row0 = mysqli_fetch_array($tel0);
if (mysqli_num_rows($tel0) == 1) {
    $nama0      = $row0['nama_lengkap'];
    $tujuan0    = $row0['no_wa'];
    $pesan0 = "Halo $nama0, PTPP yang anda buat dengan detail : \nNomor : *$nomor* \nJenis PTPP : $jenis \nStatus saat ini : *CANCEL*. \nPTPP ini Telah dibatalkan oleh : $userlogin \nPada tanggal : $today, \nDengan Alasan : *$alasan*. \nSilahkan buat Ulang PTPP atau hubungi $userlogin untuk informasi lebih lanjut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

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

if ($jenis == 'EKSTERNAL') {
    //notif kepada sistem ho 1
    $tel3 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='SIS' AND cabang='HO' AND id_kirim=1 ");
    $row3 = mysqli_fetch_array($tel3);
    if (mysqli_num_rows($tel3) == 1) {
        $nama3      = $row3['nama_lengkap'];
        $tujuan3    = $row3['no_wa'];
        $id3        = $row3['id'];
        $pesan3     = "Halo $nama3, PTPP yang diberikan kepada $k_dept $kepada dengan detail : \nNomor: *$nomor*\nJenis PTPP : $jenis \nStatus Saat ini : *CANCEL*. \nPTPP ini Telah dibatalkan oleh : $userlogin \nPada tanggal : $today, \nDengan Alasan : *$alasan*. \n$d_dept $dari harus membuat Ulang PTPP atau menghubungi $userlogin untuk informasi lebih lanjut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

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

    //notif kepada sistem ho 2
    $tel4 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='SIS' AND cabang='HO' AND id_kirim=2 ");
    $row4 = mysqli_fetch_array($tel4);
    if (mysqli_num_rows($tel4) == 1) {
        $nama4      = $row4['nama_lengkap'];
        $tujuan4    = $row4['no_wa'];
        $id4        = $row4['id'];
        $pesan4     = "Halo $nama4, PTPP yang diberikan kepada $k_dept $kepada dengan detail : \nNomor: *$nomor* \nJenis PTPP : $jenis \nStatus Saat ini : *CONFIRM*. \nPTPP ini Telah dibatalkan oleh : $userlogin \nPada tanggal : $today, \nDengan Alasan : *$alasan*. \n$d_dept $dari harus membuat Ulang PTPP atau menghubungi $userlogin untuk informasi lebih lanjut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

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

    //notif kepada sistem ho 3
    $tel5 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='SIS' AND cabang='HO' AND id_kirim=3 ");
    $row5 = mysqli_fetch_array($tel5);
    if (mysqli_num_rows($tel5) == 1) {
        $nama5      = $row5['nama_lengkap'];
        $tujuan5    = $row5['no_wa'];
        $id5        = $row5['id'];
        $pesan5     = "Halo $nama5, PTPP yang diberikan kepada $k_dept $kepada dengan detail : \nNomor: *$nomor* \nJenis PTPP : $jenis \nStatus Saat ini : *CONFIRM*. \nPTPP ini Telah dibatalkan oleh : $userlogin \nPada tanggal : $today, \nDengan Alasan : *$alasan*. \n$d_dept $dari harus membuat Ulang PTPP atau menghubungi $userlogin untuk informasi lebih lanjut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

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

    //notif kepada sistem ho 4
    $tel6 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='SIS' AND cabang='HO' AND id_kirim=4 ");
    $row6 = mysqli_fetch_array($tel6);
    if (mysqli_num_rows($tel6) == 1) {
        $nama6      = $row6['nama_lengkap'];
        $tujuan6    = $row6['no_wa'];
        $id6        = $row6['id'];
        $pesan6     = "Halo $nama6, PTPP yang diberikan kepada $k_dept $kepada dengan detail : \nNomor: *$nomor* \nJenis PTPP : $jenis \nStatus Saat ini : *CONFIRM*. \nPTPP ini Telah dibatalkan oleh : $userlogin \nPada tanggal : $today, \nDengan Alasan : *$alasan*. \n$d_dept $dari harus membuat Ulang PTPP atau menghubungi $userlogin untuk informasi lebih lanjut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

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

    //notif kepada sistem ho 5
    $tel7 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='SIS' AND cabang='HO' AND id_kirim=5 ");
    $row7 = mysqli_fetch_array($tel7);
    if (mysqli_num_rows($tel7) == 1) {
        $nama7      = $row7['nama_lengkap'];
        $tujuan7    = $row7['no_wa'];
        $id7        = $row7['id'];
        $pesan7     = "Halo $nama7, PTPP yang diberikan kepada $k_dept $kepada dengan detail : \nNomor: *$nomor* \nJenis PTPP : $jenis \nStatus Saat ini : *CONFIRM*. \nPTPP ini Telah dibatalkan oleh : $userlogin \nPada tanggal : $today, \nDengan Alasan : *$alasan*. \n$d_dept $dari harus membuat Ulang PTPP atau menghubungi $userlogin untuk informasi lebih lanjut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

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
}

if ($kepada !== 'HO') {
    //notif untuk sistem cabang kepada 1
    $tel8 = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE dept='SIS' AND no_wa !='' AND no_wa !=0  AND no_wa !='+62' AND cabang='$kepada' AND cabang!='$dari' AND id_kirim=1 ");
    $row8 = mysqli_fetch_array($tel8);
    if (mysqli_num_rows($tel8) == 1) {
        $nama8      = $row8['nama_lengkap'];
        $tujuan8    = $row8['no_wa'];
        $id8        = $row8['id'];
        $pesan8     = "Halo $nama8, PTPP yang diberikan kepada $k_dept $kepada dengan detail : \nNomor: *$nomor* \nJenis PTPP : $jenis \nStatus Saat ini : *CONFIRM*. \nPTPP ini Telah dibatalkan oleh : $userlogin \nPada tanggal : $today, \nDengan Alasan : *$alasan*. \n$d_dept $dari harus membuat Ulang PTPP atau menghubungi $userlogin untuk informasi lebih lanjut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

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
        $pesan9     = "Halo $nama9, PTPP yang diberikan kepada $k_dept $kepada dengan detail : \nNomor: *$nomor* \nJenis PTPP : $jenis \nStatus Saat ini : *CONFIRM*. \nPTPP ini Telah dibatalkan oleh : $userlogin \nPada tanggal : $today, \nDengan Alasan : *$alasan*. \n$d_dept $dari harus membuat Ulang PTPP atau menghubungi $userlogin untuk informasi lebih lanjut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

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
        $pesan10     = "Halo $nama10, PTPP yang diberikan kepada $k_dept $kepada dengan detail : \nNomor: *$nomor* \nJenis PTPP : $jenis \nStatus Saat ini : *CONFIRM*. \nPTPP ini Telah dibatalkan oleh : $userlogin \nPada tanggal : $today, \nDengan Alasan : *$alasan*. \n$d_dept $dari harus membuat Ulang PTPP atau menghubungi $userlogin untuk informasi lebih lanjut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

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
        $pesan11     = "Halo $nama11, PTPP yang diberikan kepada $k_dept $kepada dengan detail : \nNomor: *$nomor* \nJenis PTPP : $jenis \nStatus Saat ini : *CONFIRM*. \nPTPP ini Telah dibatalkan oleh : $userlogin \nPada tanggal : $today, \nDengan Alasan : *$alasan*. \n$d_dept $dari harus membuat Ulang PTPP atau menghubungi $userlogin untuk informasi lebih lanjut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

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
        $pesan12     = "Halo $nama12, PTPP yang diberikan kepada $k_dept $kepada dengan detail : \nNomor: *$nomor* \nJenis PTPP : $jenis \nStatus Saat ini : *CONFIRM*. \nPTPP ini Telah dibatalkan oleh : $userlogin \nPada tanggal : $today, \nDengan Alasan : *$alasan*. \n$d_dept $dari harus membuat Ulang PTPP atau menghubungi $userlogin untuk informasi lebih lanjut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

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
        $pesan13     = "Halo $nama13, PTPP yang diberikan kepada $k_dept $kepada dengan detail : \nNomor: *$nomor* \nJenis PTPP : $jenis \nStatus Saat ini : *CONFIRM*. \nPTPP ini Telah dibatalkan oleh : $userlogin \nPada tanggal : $today, \nDengan Alasan : *$alasan*. \n$d_dept $dari harus membuat Ulang PTPP atau menghubungi $userlogin untuk informasi lebih lanjut. \n\n\n```Ini adalah pesan otomatis BOT Arnon Bakery```";

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
