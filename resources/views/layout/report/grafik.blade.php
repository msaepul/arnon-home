<table>

    @php
        if (!function_exists('blnz')) {
            function blnz($tanggalz)
            {
                if ($tanggalz == null) {
                    return '-';
                } elseif ($tanggalz == '') {
                    return '-';
                } else {
                    $bulanz = [01 => 'Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    $hasil_tglz = $bulanz[(int) $tanggalz];
        
                    return $hasil_tglz;
                }
            }
        }
        $bulan = @$_GET['bulan'];
        $tahun = @$_GET['tahun'];
        $jenis = @$_GET['jenis'];
        $cabang = cabang();
        $dari1 = ['adf', 'HO-MKT', 'HO-PRC', 'HO-PBL', 'HO-GBB', 'HO-PRO', 'HO-ENG', 'HO-QCT', 'HO-GPJ', 'HO-EKS', 'HO-KND', 'HO-FIN', 'HO-ACC', 'HO-HRD', 'HO-SIS', 'HO-EDP', 'HO-TAX', 'HO-GRR', 'HO-R&D', 'HO-GSP', 'PDL', 'PDL-CBL', 'JTW', 'TGL', 'MDO', 'MKS', 'KDR', 'BDJ', 'BWI', 'LPG', 'DMK', 'PLM', 'BLI', 'PKU', 'MDN', 'LOM', 'PNK', 'LLG', 'PLU', 'AMQ', 'KDI'];
        
        $dari = ['ASD', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'PDL', 'CBL', 'JTW', 'TGL', 'MDO', 'MKS', 'KDR', 'BDJ', 'BWI', 'LPG', 'DMK', 'PLM', 'BLI', 'PKU', 'MDN', 'LOM', 'PNK', 'LLG', 'PLU', 'AMQ', 'KDI'];
        
        $d_dept = ['ASD', 'MKT', 'PRC', 'PBL', 'GBB', 'PRO', 'ENG', 'QCT', 'GPJ', 'EKS', 'KND', 'FIN', 'ACC', 'HRD', 'SIS', 'EDP', 'TAX', 'GRR', 'R&D', 'GSP', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%'];
        
        $kepada = ['ASD', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'HO', 'PDL', 'CBL', 'JTW', 'TGL', 'MDO', 'MKS', 'KDR', 'BDJ', 'BWI', 'LPG', 'DMK', 'PLM', 'BLI', 'PKU', 'MDN', 'LOM', 'PNK', 'LLG', 'PLU', 'AMQ', 'KDI'];
        
        $k_dept = ['ASD', 'MKT', 'PRC', 'PBL', 'GBB', 'PRO', 'ENG', 'QCT', 'GPJ', 'EKS', 'KND', 'FIN', 'ACC', 'HRD', 'SIS', 'EDP', 'TAX', 'GRR', 'R&D', 'GSP', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%', '%%'];
        
        $kolom = ['ASD', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP'];
        
        $db_host = '127.0.0.1';
        $db_user = 'root';
        $db_pass = '9igywo9430LKaX3n';
        $db_name = 'home';
        
        $koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    @endphp

    <thead>
        <tr>
            <th colspan="11"></th>
            <th colspan="20" style="font-weight: bold;">
                REKAP PTPP
            </th>
            <th colspan="9"></th>
            <th colspan="2" style="font-weight: bold;">
                SIS - 12.2
            </th>
        </tr>
        <tr>
            <th colspan="11"></th>
            <th colspan="20" style="font-weight: bold;">
                Periode : {{ strtoupper(blnz($bulan)) }} {{ '20' . $tahun }}
            </th>
            <th colspan="11"></th>
        </tr>

        <tr>
            <th rowspan="2">NO</th>
            <th rowspan="2">DARI</th>
            <th colspan="9"></th>
            <th colspan="20">UNTUK (JUMLAH)</th>
            <th colspan="11"></th>
        </tr>
        <tr>
            @for ($no = 1; $no <= 40; $no++)
                <th>{{ $dari1[$no] }}</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @for ($no = 1; $no <= 40; $no++)
            @php
                $C = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada = '$kepada[1]' AND k_dept = '$k_dept[1]' AND jenis='eksternal' AND status!='cancel'"));
                $D = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada = '$kepada[2]' AND k_dept = '$k_dept[2]' AND jenis='eksternal' AND status!='cancel'"));
                $E = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada = '$kepada[3]' AND k_dept = '$k_dept[3]' AND jenis='eksternal' AND status!='cancel'"));
                $F = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada = '$kepada[4]' AND k_dept = '$k_dept[4]' AND jenis='eksternal' AND status!='cancel'"));
                $G = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada = '$kepada[5]' AND k_dept = '$k_dept[5]' AND jenis='eksternal' AND status!='cancel'"));
                $H = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada = '$kepada[6]' AND k_dept = '$k_dept[6]' AND jenis='eksternal' AND status!='cancel'"));
                $I = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada = '$kepada[7]' AND k_dept = '$k_dept[7]' AND jenis='eksternal' AND status!='cancel'"));
                $J = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada = '$kepada[8]' AND k_dept = '$k_dept[8]' AND jenis='eksternal' AND status!='cancel'"));
                $K = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada = '$kepada[9]' AND k_dept = '$k_dept[9]' AND jenis='eksternal' AND status!='cancel'"));
                $L = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada = '$kepada[10]' AND k_dept = '$k_dept[10]' AND jenis='eksternal' AND status!='cancel'"));
                $M = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada = '$kepada[11]' AND k_dept = '$k_dept[11]' AND jenis='eksternal' AND status!='cancel'"));
                $N = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada = '$kepada[12]' AND k_dept = '$k_dept[12]' AND jenis='eksternal' AND status!='cancel'"));
                $O = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada = '$kepada[13]' AND k_dept = '$k_dept[13]' AND jenis='eksternal' AND status!='cancel'"));
                $P = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada = '$kepada[14]' AND k_dept = '$k_dept[14]' AND jenis='eksternal' AND status!='cancel'"));
                $Q = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada = '$kepada[15]' AND k_dept = '$k_dept[15]' AND jenis='eksternal' AND status!='cancel'"));
                $R = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada = '$kepada[16]' AND k_dept = '$k_dept[16]' AND jenis='eksternal' AND status!='cancel'"));
                $S = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada = '$kepada[17]' AND k_dept = '$k_dept[17]' AND jenis='eksternal' AND status!='cancel'"));
                $T = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada = '$kepada[18]' AND k_dept = '$k_dept[18]' AND jenis='eksternal' AND status!='cancel'"));
                $U = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada = '$kepada[19]' AND k_dept = '$k_dept[19]' AND jenis='eksternal' AND status!='cancel'"));
                $V = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[20]' AND k_dept LIKE '$k_dept[20]' AND jenis='eksternal' AND status!='cancel'"));
                $W = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[21]' AND k_dept LIKE '$k_dept[21]' AND jenis='eksternal' AND status!='cancel'"));
                $X = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[22]' AND k_dept LIKE '$k_dept[22]' AND jenis='eksternal' AND status!='cancel'"));
                $Y = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[23]' AND k_dept LIKE '$k_dept[23]' AND jenis='eksternal' AND status!='cancel'"));
                $Z = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[24]' AND k_dept LIKE '$k_dept[24]' AND jenis='eksternal' AND status!='cancel'"));
                $AA = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[25]' AND k_dept LIKE '$k_dept[25]' AND jenis='eksternal' AND status!='cancel'"));
                $AB = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[26]' AND k_dept LIKE '$k_dept[26]' AND jenis='eksternal' AND status!='cancel'"));
                $AC = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[27]' AND k_dept LIKE '$k_dept[27]' AND jenis='eksternal' AND status!='cancel'"));
                $AD = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[28]' AND k_dept LIKE '$k_dept[28]' AND jenis='eksternal' AND status!='cancel'"));
                $AE = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[29]' AND k_dept LIKE '$k_dept[29]' AND jenis='eksternal' AND status!='cancel'"));
                $AF = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[30]' AND k_dept LIKE '$k_dept[30]' AND jenis='eksternal' AND status!='cancel'"));
                $AG = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[31]' AND k_dept LIKE '$k_dept[31]' AND jenis='eksternal' AND status!='cancel'"));
                $AH = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[32]' AND k_dept LIKE '$k_dept[32]' AND jenis='eksternal' AND status!='cancel'"));
                $AI = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[33]' AND k_dept LIKE '$k_dept[33]' AND jenis='eksternal' AND status!='cancel'"));
                $AJ = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[34]' AND k_dept LIKE '$k_dept[34]' AND jenis='eksternal' AND status!='cancel'"));
                $AK = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[35]' AND k_dept LIKE '$k_dept[35]' AND jenis='eksternal' AND status!='cancel'"));
                $AL = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[36]' AND k_dept LIKE '$k_dept[36]' AND jenis='eksternal' AND status!='cancel'"));
                $AM = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[37]' AND k_dept LIKE '$k_dept[37]' AND jenis='eksternal' AND status!='cancel'"));
                $AN = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[38]' AND k_dept LIKE '$k_dept[38]' AND jenis='eksternal' AND status!='cancel'"));
                $AO = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[39]' AND k_dept LIKE '$k_dept[39]' AND jenis='eksternal' AND status!='cancel'"));
                $AP = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND dari = '$dari[$no]' AND d_dept LIKE '$d_dept[$no]' AND kepada LIKE '$kepada[40]' AND k_dept LIKE '$k_dept[40]' AND jenis='eksternal' AND status!='cancel'"));
                
                $MKT = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'MKT' AND jenis='eksternal' AND status!='cancel'"));
                $PRC = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'PRC' AND jenis='eksternal' AND status!='cancel'"));
                $PBL = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'PBL' AND jenis='eksternal' AND status!='cancel'"));
                $GBB = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'GBB' AND jenis='eksternal' AND status!='cancel'"));
                $PRO = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'PRO' AND jenis='eksternal' AND status!='cancel'"));
                $ENG = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'ENG' AND jenis='eksternal' AND status!='cancel'"));
                $QCT = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'QCT' AND jenis='eksternal' AND status!='cancel'"));
                $GPJ = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'GPJ' AND jenis='eksternal' AND status!='cancel'"));
                $EKS = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'EKS' AND jenis='eksternal' AND status!='cancel'"));
                $KND = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'KND' AND jenis='eksternal' AND status!='cancel'"));
                $FIN = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'FIN' AND jenis='eksternal' AND status!='cancel'"));
                $ACC = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'ACC' AND jenis='eksternal' AND status!='cancel'"));
                $HRD = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'HRD' AND jenis='eksternal' AND status!='cancel'"));
                $SIS = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'SIS' AND jenis='eksternal' AND status!='cancel'"));
                $EDP = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'EDP' AND jenis='eksternal' AND status!='cancel'"));
                $TAX = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'TAX' AND jenis='eksternal' AND status!='cancel'"));
                $GRR = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'GRR' AND jenis='eksternal' AND status!='cancel'"));
                $RND = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'RND' AND jenis='eksternal' AND status!='cancel'"));
                $GSP = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'GSP' AND jenis='eksternal' AND status!='cancel'"));
                $CRT = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_utama WHERE bulan='$tahun$bulan' AND k_dept = 'CRT' AND jenis='eksternal' AND status!='cancel'"));
            @endphp
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $dari1[$no] }}</td>
                <td>{{ $C }}</td>
                <td>{{ $D }}</td>
                <td>{{ $E }}</td>
                <td>{{ $F }}</td>
                <td>{{ $G }}</td>
                <td>{{ $H }}</td>
                <td>{{ $I }}</td>
                <td>{{ $J }}</td>
                <td>{{ $K }}</td>
                <td>{{ $L }}</td>
                <td>{{ $M }}</td>
                <td>{{ $N }}</td>
                <td>{{ $O }}</td>
                <td>{{ $P }}</td>
                <td>{{ $Q }}</td>
                <td>{{ $R }}</td>
                <td>{{ $S }}</td>
                <td>{{ $T }}</td>
                <td>{{ $U }}</td>
                <td>{{ $V }}</td>
                <td>{{ $W }}</td>
                <td>{{ $X }}</td>
                <td>{{ $Y }}</td>
                <td>{{ $Z }}</td>
                <td>{{ $AA }}</td>
                <td>{{ $AB }}</td>
                <td>{{ $AC }}</td>
                <td>{{ $AD }}</td>
                <td>{{ $AE }}</td>
                <td>{{ $AF }}</td>
                <td>{{ $AG }}</td>
                <td>{{ $AH }}</td>
                <td>{{ $AI }}</td>
                <td>{{ $AJ }}</td>
                <td>{{ $AK }}</td>
                <td>{{ $AL }}</td>
                <td>{{ $AM }}</td>
                <td>{{ $AN }}</td>
                <td>{{ $AO }}</td>
                <td>{{ $AP }}</td>
            </tr>
        @endfor

        <tr>
            <td colspan="2">Total</td>
            <td>=SUM(C5:C44)</td>
            <td>=SUM(D5:D44)</td>
            <td>=SUM(E5:E44)</td>
            <td>=SUM(F5:F44)</td>
            <td>=SUM(G5:G44)</td>
            <td>=SUM(H5:H44)</td>
            <td>=SUM(I5:I44)</td>
            <td>=SUM(J5:J44)</td>
            <td>=SUM(K5:K44)</td>
            <td>=SUM(L5:L44)</td>
            <td>=SUM(M5:M44)</td>
            <td>=SUM(N5:N44)</td>
            <td>=SUM(O5:O44)</td>
            <td>=SUM(P5:P44)</td>
            <td>=SUM(Q5:Q44)</td>
            <td>=SUM(R5:R44)</td>
            <td>=SUM(S5:S44)</td>
            <td>=SUM(T5:T44)</td>
            <td>=SUM(U5:U44)</td>
            <td>=SUM(V5:V44)</td>
            <td>=SUM(W5:W44)</td>
            <td>=SUM(X5:X44)</td>
            <td>=SUM(Y5:Y44)</td>
            <td>=SUM(Z5:Z44)</td>
            <td>=SUM(AA5:AA44)</td>
            <td>=SUM(AB5:AB44)</td>
            <td>=SUM(AC5:AC44)</td>
            <td>=SUM(AD5:AD44)</td>
            <td>=SUM(AE5:AE44)</td>
            <td>=SUM(AF5:AF44)</td>
            <td>=SUM(AG5:AG44)</td>
            <td>=SUM(AH5:AH44)</td>
            <td>=SUM(AI5:AI44)</td>
            <td>=SUM(AJ5:AJ44)</td>
            <td>=SUM(AK5:AK44)</td>
            <td>=SUM(AL5:AL44)</td>
            <td>=SUM(AM5:AM44)</td>
            <td>=SUM(AN5:AN44)</td>
            <td>=SUM(AO5:AO44)</td>
            <td>=SUM(AP5:AP44)</td>
        </tr>

        <tr>
            <td></td>
        </tr>

        <tr>
            <td>No</td>
            <td>Departemen</td>
            <td>Jumlah</td>
        </tr>

        <tr>
            <td>1</td>
            <td>MKT</td>
            <td>{{ $MKT }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td>PRC</td>
            <td>{{ $PRC }}</td>
        </tr>
        <tr>
            <td>3</td>
            <td>PBL</td>
            <td>{{ $PBL }}</td>
        </tr>
        <tr>
            <td>4</td>
            <td>GBB</td>
            <td>{{ $GBB }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td>PRO</td>
            <td>{{ $PRO }}</td>
        </tr>
        <tr>
            <td>6</td>
            <td>ENG</td>
            <td>{{ $ENG }}</td>
        </tr>
        <tr>
            <td>7</td>
            <td>QCT</td>
            <td>{{ $QCT }}</td>
        </tr>
        <tr>
            <td>8</td>
            <td>GPJ</td>
            <td>{{ $GPJ }}</td>
        </tr>
        <tr>
            <td>9</td>
            <td>EKS</td>
            <td>{{ $EKS }}</td>
        </tr>
        <tr>
            <td>10</td>
            <td>KND</td>
            <td>{{ $KND }}</td>
        </tr>
        <tr>
            <td>11</td>
            <td>FIN</td>
            <td>{{ $FIN }}</td>
        </tr>
        <tr>
            <td>12</td>
            <td>ACC</td>
            <td>{{ $ACC }}</td>
        </tr>
        <tr>
            <td>13</td>
            <td>HRD</td>
            <td>{{ $HRD }}</td>
        </tr>
        <tr>
            <td>14</td>
            <td>SIS</td>
            <td>{{ $SIS }}</td>
        </tr>
        <tr>
            <td>15</td>
            <td>EDP</td>
            <td>{{ $EDP }}</td>
        </tr>
        <tr>
            <td>16</td>
            <td>TAX</td>
            <td>{{ $TAX }}</td>
        </tr>
        <tr>
            <td>17</td>
            <td>GRR</td>
            <td>{{ $GRR }}</td>
        </tr>

        <tr>
            <td>18</td>
            <td>RND</td>
            <td>{{ $RND }}</td>
        </tr>
        <tr>
            <td>19</td>
            <td>GSP</td>
            <td>{{ $GSP }}</td>
        </tr>
        <tr>
            <td colspan="2">Total</td>
            <td>=SUM(C48:C66)</td>
        </tr>
    </tbody>
</table>
