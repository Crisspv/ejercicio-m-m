<!DOCTYPE html>
<html>
<head>
    <title>App Laravel</title>
</head>
<body>
        <h1>Sección: {{ $seccion->nombre }} - {{ $seccion->seccion }}</h1>
        <p>NRC: {{ $seccion->nrc }}</p>

        <h3>Alumnos Inscritos:</h3>
        <ul>
            @forelse($seccion->alumnos as $alumno)
                <li>{{ $alumno->nombre }} ({{ $alumno->correo }})</li>
            @empty
                <li>No hay alumnos inscritos.</li>
            @endforelse
        </ul>

        <h3>Inscribir Alumnos</h3>
        <form action="{{ route('secciones.asignarAlumnos', $seccion->id) }}" method="POST">
            @csrf
            <select name="alumnos[]" multiple>
                @foreach($alumnos as $alumno)
                    <option value="{{ $alumno->id }}">{{ $alumno->nombre }} - {{ $alumno->codigo }}</option>
                @endforeach
            </select>
            <br>
            <button type="submit">Inscribir</button>
        </form>
</body>
</html>