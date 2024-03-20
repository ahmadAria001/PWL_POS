<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Level</title>
</head>
<body>
    <h1>Data Level Pengguna</h1>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID Level Pengguna</th>
            <td>Kode Level</td>
            <td>Nama Level</td>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{$d->user_id}}</td>
            <td>{{$d->username}}</td>
            <td>{{$d->nama}}</td>
            <td>{{$d->level_id}}</td>
            <td>{{$d->level->level_kode}}</td>
            <td>{{$d->level->level_nama}}</td>
            <td>
                <a href="/user/ubah/{{$d->user_id}}">Ubah</a> |
                <a href="/user/hapus/{{$d->user_id}}">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
    <h2><a href="tambah"> + Tambahkan User</a></h2>
</body>
</html>
