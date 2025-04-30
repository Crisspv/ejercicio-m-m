<!DOCTYPE html>
<html>
<head>
    <title>App Laravel</title>
</head>
<body>
<h1>Lista de Secciones</h1>
    <ul>
        @foreach($secciones as $seccion)
            <li>
                <a href="{{ route('secciones.show', $seccion->id) }}">
                    {{ $seccion->nombre }} - {{ $seccion->seccion }} (NRC: {{ $seccion->nrc }})
                </a>
            </li>
        @endforeach
    </ul>
</body>
</html>
