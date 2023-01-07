<table>
    <thead>
        <tr>
            <th colspan="13" style="font-weight: bold;">
            </th>
            <th colspan="2" style="font-weight: bold;">
                SIS - 12.2
            </th>
        </tr>
        <tr>
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
                $jenis = @$_GET['jenis'];
                $cabang = cabang();
            @endphp
            <th colspan="15" style="font-weight: bold;">LAPORAN PTPP {{ strtoupper($jenis) }} BULAN
                {{ strtoupper(blnz($bulan)) }} @if ($cabang == 'HO')
                    ALL CABANG
                @else
                    CABANG {{ $cabang }}
                @endif
            </th>
        </tr>
        <tr>
            <th>NO</th>
            <th>TANGGAL</th>
            <th>NO PTPP</th>
            <th>KATEGORI</th>
            <th>KEPADA</th>
            <th>DEPT</th>
            <th>DARI</th>
            <th>DEPT</th>
            <th>URAIAN KETIDAK SESUAIAN</th>
            <th>TANGGAL ANALISA</th>
            <th>ANALISA PENYEBAB KETIDAKSESUAIAN</th>
            <th>TINDAKAN PERBAIKAN</th>
            <th>TARGET SELESAI</th>
            <th>PIC</th>
            <th>STATUS</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($invoices as $invoice)
            <tr style="background-color:#fbff00">
                <td>{{ $no }}</td>
                <td>{{ tgl4($invoice->tgl) }}</td>
                <td>{{ $invoice->nomor }}</td>
                <td>{{ kategori($invoice->kategori) }}</td>
                <td>{{ $invoice->kepada }}</td>
                <td>{{ $invoice->k_dept }}</td>
                <td>{{ $invoice->dari }}</td>
                <td>{{ $invoice->d_dept }}</td>
                <td>{{ $invoice->keadaan }}</td>
                <td>{{ tgl4($invoice->tgl_analisa) }}</td>
                <td>{{ htmlspecialchars($invoice->analisa2) }}</td>
                <td>{{ $invoice->tindakan1 }} </td>
                <td>{{ tgl4($invoice->target_selesai) }}</td>
                <td>{{ $invoice->pic }}</td>
                <td>{{ $invoice->status }}</td>
            </tr>
            @php
                $no++;
            @endphp
        @endforeach
    </tbody>
</table>
