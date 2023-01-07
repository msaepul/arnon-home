<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Hide</title>
</head>

<body>
    <center>
        <p>
            @if (session('msg'))
                {{ session('msg') }} <br><br>
            @endif

            <button type="button" onclick="window.location='/home/index'">
                &laquo; Kembali
            </button>
        </p>
        <table style="width: 80%; border-collapse: collapse; border:1px solid #000" border="1">
            <thead>
                <th> No </th>
                <th> Dept </th>
                <th> Cabang </th>
                <th> Nama Lengkap </th>
                <th> Aksi </th>
            </thead>

            <tbody>
                @foreach ($dataLogin as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->dept }}</td>
                        <td>{{ $d->cabang }}</td>
                        <td>{{ $d->nama_lengkap }}</td>
                        <td>
                            <button type="button" onclick="restore('{{ $d->id }}')">
                                Restore
                            </button>

                            <form method="POST" action="/home/forceDelete/{{ $d->id }}" style="display: inline"
                                onsubmit="return hapusData()">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    Hapus Permanen
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </center>
    <script>
        function restore(id) {
            pesan = confirm('Yakin Data ini akan di-Restore?');
            if (pesan) {
                window.location = '/home/restore/' + id
            }
        }

        function hapusData() {
            pesan = confirm('Yakin Data ini akan dihapus Permanen?');
            if (pesan)
                return true;
            else return false;
        }
    </script>
</body>

</html>
