<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Noticias</title>
    <link rel="stylesheet" href="/../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome-all.min.css">

</head>
<body>
    <!-- @php var_dump($insectos) @endphp -->
    <h1>Insectos</h1>
    <table>
        <thead>
            <th>Nombre del Insecto</th>
            <th>Ver caracteristicas</th>
        </thead>
        <tbody>
            @foreach ($insectos as $insecto)
                <tr>
                    <td>{{$insecto->nombre}}</td>
                    <td>
                        <a href="{{route('insectos.show' ,$insecto->id)}}">Ver mas</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>