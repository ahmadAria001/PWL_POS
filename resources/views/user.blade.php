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
            <th>Total Pengguna</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{$data}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
