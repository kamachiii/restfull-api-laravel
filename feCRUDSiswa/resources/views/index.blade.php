<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach ($siswas as $siswa)
    <ol>
        <li>Nis : {{$siswa['nis']}}</li>
        <li>Nama : {{$siswa['nama']}}</li>
        <li>Rombel : {{$siswa['rombel']}}</li>
        <li>
            <form action="{{ route('delete', $siswa['id']) }}" method="post">
                @csrf
                <a href="{{ route('show', $siswa['id']) }}"><button class="btn btn-warning" type="button">Edit</button></a>
                <button class="btn btn-danger" type="submit">Hapus</button>
            </form>
        </li>
    </ol>
    @endforeach
</body>
</html>
